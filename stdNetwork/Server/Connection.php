<?

/**
 * @name StandardFramework Network Connection
 * @author DENFER
 * @copyright DENFER STUDIO
 */


Class Connection extends Prototype
{
    Protected $_Socket = NULL;
    Protected $_ID = NULL;
    Protected $_IP = NETWORK_ADDR;
    Public Function Get_Socket(){return $this->_Socket;}
    Public Function Get_ID(){return $this->_ID;}
    Public Function Get_IP(){return $this->_IP;}
    
    Public Function __construct($Socket, $GetPeerName = true)
    {
        $this->_ID = strtoupper(md5(sha1(uniqid('',true))));
        
        IF($Socket)
        {
            $this->_Socket = $Socket;
            IF($GetPeerName)
                @socket_getpeername( $Socket, $this->_IP );
        }
    }
    
    Public Function Send($Buffer){return $this->Write($Buffer);}
    Public Function Write($Buffer)
    {
        IF($this->_Socket)
            @socket_write($this->_Socket, $Buffer, strlen($Buffer));
        return $this;
    }
    
    Public Function Kick(){$this->Disconnect();}
    Public Function Close(){$this->Disconnect();}
    Public Function Disconnect()
    {
        IF($this->_Socket)
            @socket_close($this->_Socket);
        $this->_Socket = null;
    }
}