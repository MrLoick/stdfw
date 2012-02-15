<?

$Sources = array(   'stdConstants.php', 'Prototype.php',
                    'stdCore.php', 'stdEvent.php',
                    'stdDrawing.php', 'stdScreen.php',
                    'stdGame.php', 'stdTexture.php',
                    'stdAnimation.php',
                    'Vectors/Vector.php', 'Vectors/Vector2.php',
                    'Vectors/Vector3.php', 'Objects/stdObject.php', 
                    'Objects/stdSSprite.php', 'Objects/stdASprite.php');

$Path = '../';

foreach((array)$Sources as $Source)
    require $Path.$Source;

require('Game.php');