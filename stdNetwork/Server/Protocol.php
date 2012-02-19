<?

/**
 * @name StandardFramework Network Protocol
 * @author DENFER
 * @copyright DENFER STUDIO
 */


Class Protocol extends Prototype
{
    Protected $_SERVER = null;
    Public Function Get_Clients(){return $this->_SERVER->Clients;}
    Public Function Get_SERVER(){return $this->_SERVER;}
    Public Function Set_SERVER($SERVER){IF(!$this->_SERVER) $this->_SERVER = $SERVER;}
    
    Public Function Broadcast($Buffer)
    {
        ForEach( (Array)$this->_SERVER->Clients As $Connection )
            $Connection->Write($Buffer);
        return $this;
    }
    
    Public Function Get($ConnectionId)
    {
        IF(isset($this->_SERVER->Clients[$ConnectionId]))
            return $this->_SERVER->Clients[$ConnectionId];
        return null;
    }
    
    Public Function Send($ConnectionId, $Buffer){$this->Write($ConnectionId, $Buffer);}
    Public Function Write($ConnectionId, $Buffer)
    {
        $Client = $this->Get($ConnectionId);
        IF($Client) 
            $Client->Write($Buffer);
        ELSE
            return null;
        return $Client;
    }
    
    Public Function Kick($ConnectionId = 0)
    {
        $Client = $this->Get($ConnectionId);
        IF($Client) 
            $Client->Kick();
        ELSE
            return null;
        return $Client;
    }
    
    Public Function OnConnect(Connection $Connection){}
    Public Function OnData(Connection $Connection, $Data){}
    Public Function OnDisconnect(Connection $Connection){}
}