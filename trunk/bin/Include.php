<?

$Sources = Array (  
                    'stdConstants.php', 
                    'stdControllers.php',
                    'stdColor.php',
                    'Prototype.php',
                    'stdCore.php',
                    'stdEvent.php',
                    'stdScreen.php',
                    'stdSound.php', 
                    'Interfaces/IColorable.php',
                    'Interfaces/IMovable.php',
                    'Interfaces/ISizeable.php',
                    'Interfaces/IObject.php',
                    'Objects/stdObject.php',
                    'Objects/stdCamera.php',
                    'stdGame.php',
                    'stdTexture.php',
                    'stdAnimation.php',
                    'Vectors/Vector.php', 
                    'Vectors/Vector2.php',
                    'Vectors/Vector3.php', 
                    'Objects/stdSSprite.php', 
                    'Objects/stdASprite.php',
                    'Objects/stdPixel.php',
                    'Objects/stdLine.php', 
                    'Objects/stdRect.php',
                    'Objects/stdCircle.php', 
                    'Objects/stdEllipse.php',
    
                    'stdNetwork/Server/Connection.php',
                    'stdNetwork/Server/Protocol.php',
                    'stdNetwork/Server/Protocols/HTTP_Protocol.php',
                    'stdNetwork/Server/stdServer.php'
                  );

$Path = '../';

foreach((array)$Sources as $Source)
    require_once $Path.$Source;

$Server = new stdServer;
$Server->Attach(new HTTP_Protocol)->Listen();

//require('Game.php');