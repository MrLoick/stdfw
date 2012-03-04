<?

$Sources = Array (  
                    'Utils.php', 
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
                    'Objects/stdTileMap.php',
                    'Objects/stdPixel.php',
                    'Objects/stdLine.php', 
                    'Objects/stdRect.php',
                    'Objects/stdCircle.php', 
                    'Objects/stdEllipse.php'
                  );

$Path = '../';

foreach((array)$Sources as $Source)
    require_once $Path.$Source;

require('Game.php');