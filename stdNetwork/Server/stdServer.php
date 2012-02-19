<?

/**
 * @name StandardFramework Network Server
 * @author DENFER
 * @copyright DENFER STUDIO
 */

Class stdServer extends Connection
{
    Protected $_Port;
    Protected $_Protocols = Array();
    Protected $_Connections = Array();
    
    Protected $_Listening = false;
    
    Public $MaxConnections = 0;
    Public $MaxDataLength = 1024;
    
    Public Function Get_Port(){return $this->_Port;}
    Public Function Get_Clients(){return $this->_Connections;}
    Public Function Get_ClientsCount(){return sizeof($this->_Connections);}
    
    Public Function __construct( $Port = NETWORK_PORT, $IP = NETWORK_ADDR )
    {
        set_time_limit(0);
        IF(!$IP) $IP = NETWORK_ADDR;
        IF(!$Port) $Port = NETWORK_PORT;
        
        $this->Attach(new Protocol);
        
        parent::__construct($this->Create($IP,$Port)->_Socket,false);
    }
    
    Public Function Attach()
    {
        ForEach( (Array)func_get_args() As $Protocol )
            IF( is_subclass_of( $Protocol, Protocol ) )
                $this->_Protocols[get_class($Protocol)][] = $Protocol;
        return $this;
    }
    
    Public Function Detach($Protocol)
    {
        IF(isset($this->_Protocols[$Protocol]))
            unset($this->_Protocols[$Protocol]);
        return $this;
    }
    
    Public Function Emit($Type, $Arguments = Array())
    {
        ForEach( (Array) $this->_Protocols As $Protocols )
            ForEach( (Array) $Protocols As $Protocol )
                IF( is_subclass_of( $Protocol, Protocol ) )
                    IF( is_callable( Array($Protocol,$Type) ) )
                        @call_user_func_array( Array($Protocol,$Type), $Arguments );
        return $this;
    }
    
    Protected Function Init()
    {
        ForEach( (Array) $this->_Protocols As $Protocols )
            ForEach( (Array) $Protocols As $Protocol )
                $Protocol->SERVER = $this;
        return $this;
    }
    
    Protected Function Create( $IP = NETWORK_ADDR, $Port = NETWORK_PORT )
    {
        try
        {
            $this->_Socket = @socket_create( AF_INET, SOCK_STREAM, SOL_TCP );
            @socket_set_option( $this->_Socket, SOL_SOCKET, SO_KEEPALIVE, 0 );
            @socket_set_option( $this->_Socket, SOL_SOCKET, SO_REUSEADDR, 1 );
            $this->Bind( $IP, $Port );
            @socket_getsockname( $this->_Socket, $this->_IP, $this->_Port );
            @socket_listen( $this->_Socket );
            @socket_set_nonblock( $this->_Socket );
        } catch ( Exception $e ){}
        
        return $this;
    }
    
    Public Function Stop()
    {
        $this->_Listening = false;
        return $this;
    }
    
    Public Function Bind( $IP = NETWORK_ADDR, $Port = NETWORK_PORT )
    {
        @socket_bind( $this->_Socket, $IP, $Port );
        return $this;
    }
    
    Protected Function Accept()
    {
        $Socket = @socket_accept($this->_Socket);
        IF($Socket)
        {
            $Connection = new Connection($Socket);
            $this->_Connections[$Connection->ID] = $Connection;
            $this->Emit(OnConnect, Array($Connection));
        }
        return $this;
    }
    
    Public Function Disconnect()
    {
        IF($this->_Socket)
            @socket_shutdown($this->_Socket, 2);
        parent::Disconnect();
        return $this;
    }
    
    Public Function Kick( Connection $Connection )
    {
        IF( isset($this->_Connections[$Connection->ID]) )
        {
            $this->_Connections[$Connection->ID]->Disconnect();
            unset($this->_Connections[$Connection->ID]);
        }
        return $this;
    }
    
    Protected Function Step()
    {
        IF(!$this->_Socket) $this->Stop();
        
        $Sockets = Array($this->_Socket);
        
        ForEach( (Array) $this->_Connections As $Connection )
        {
            IF($Connection->Socket)
            {
                IF(socket_last_error($Connection->Socket) > 10000)
                {
                    $this->Kick ($Connection);
                }
                ELSE
                    $Sockets[] = $Connection->Socket;
            }
            ELSE
                $this->Kick ($Connection);
        }

        IF( @socket_select($Sockets, $write = NULL, $except = NULL, $tv_sec = 5 ) < 1 )
            return true;
        
        IF( in_array($this->_Socket, $Sockets) )
            IF( sizeof($this->_Connections) < $this->MaxConnections Or !$this->MaxConnections Or $this->MaxConnections < 1 )
                $this->Accept();
        
        ForEach( (Array) $this->_Connections As $Connection )
        {
            IF(in_array($Connection->Socket, $Sockets))
            {
                $Data = @socket_read( $Connection->Socket, $this->MaxDataLength );
                
                IF($Data != NULL)
                    $this->Emit(OnData, Array( $Connection, $Data ));
                ELSE
                {
                    $this->Emit(OnDisconnect, Array( $Connection ));
                    $this->Kick ($Connection);
                }
            }
        }
        
        return true;
    }
    
    Public Function Listen()
    {
        $this->Init();
        $this->_Listening = true;
        Do
        {
            $this->Step();
        } while($this->_Listening);
        return $this;
    }
}