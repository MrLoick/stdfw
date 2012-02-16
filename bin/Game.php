<?

/**
 * @name StandardFramework Demo Game
 * @author DENFER
 * @version 1.0.0
 * @copyright DENFER STUDIO
 */

Class Game extends stdGame
{
    Public Function LoadContent()
    {
        global $Miku, $Tux;
        $Miku = new stdTexture('Content/player.png');
        $Tux = new stdTexture('Content/tux.png');
    }
    
    Public Function Initialize()
    {
        global $Miku, $Tux, $Sprite;

        stdMaxFPS(true);
        $this->Screen->Caption = 'My firts game.';

        $Sprite = new stdASprite($Miku,4,4);
        $Sprite2 = new stdSSprite($Tux);
        $Prim = new stdEllipse(vec2(500, 300), vec2(100,50));
        //pre(function_exists ( "pr2d_TriList" ));
        stdDrawing::Reg($Sprite,$Sprite2,$Prim);
    }
    
    Public Function Update($DeltaTime)
    {
        global $Sprite;
        $this->Camera->X -= normalize(0.1);
        /*$Sprite->X += normalize(0.1);
        $Sprite->Y += normalize(0.1);*/
        $Sprite->X = mouse_x() + 30;
        $Sprite->Y = mouse_y() + 30;
        $this->Screen->Caption = 'FPS: '.$this->FPS;
        
        IF(key_down(74))
            $Sprite->Animation->Speed -= 0.001;
        IF(key_down(78))
            $Sprite->Animation->Speed += 0.001;
    }
}

$Game = new Game();
$Game->Run();