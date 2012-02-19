<?

$Sources = Array (  
                    'stdConstants.php',
                    'Prototype.php',
                    'stdNetwork/Server/Connection.php',
                    'stdNetwork/Server/Protocol.php',
                    'stdNetwork/Server/Protocols/HTTP_Protocol.php',
                    'stdNetwork/Server/stdServer.php'
                  );

$Path = '../../';

foreach((array)$Sources as $Source)
    require_once $Path.$Source;

$Server = new stdServer;
$Server->Attach(new HTTP_Protocol)->Listen();