<?

/**
 * @name StandardFramework Network HTTP Protocol
 * @author DENFER
 * @copyright DENFER STUDIO
 */


Class HTTP_Protocol extends Protocol
{
    Public Function OnConnect(Connection $Connection)
    {
        
    }
    Public Function OnData(Connection $Connection, $Data)
    {
        $Connection->Write("HTTP/1.1 200 OK\r\nContenth-type: text/html; charset=UTF-8\r\n\r\n".$Data)->Close();
    }
    Public Function OnDisconnect(Connection $Connection)
    {
        
    }
}