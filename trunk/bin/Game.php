<?

/**
 * @name StandardFramework Demo Game
 * @author DENFER
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
        global $Miku, $Tux, $Sprite, $Sprite2, $Point;

        stdMaxFPS(true);
        $this->Screen->Caption = 'My firts game.';

        $Sprite = new stdASprite($Miku,4,4);
        $Sprite2 = new stdSSprite($Tux);
        $Prim = new stdEllipse(vec2(500, 300), vec2(100,50));
        //pre(function_exists ( "pr2d_TriList" ));
        $this->Camera->Target = $Sprite;
        
        pre($this->Camera->toString());
        
        $Point[0] = new stdCircle(vec2(0,0), 5);
        $Point[1] = new stdCircle(vec2(0,0), 5);
        
        stdDrawing::Reg($Sprite,$Sprite2,$Prim,$Point[0],$Point[1],$this->Camera);
    }
    
    Public Function Update($DeltaTime)
    {
        global $Sprite, $Sprite2, $Point;
        //$this->Camera->X -= normalize(0.1);
        /*$Sprite->X += normalize(0.1);
        $Sprite->Y += normalize(0.1);*/
        $Sprite->X = mouse_x() + 30;
        $Sprite->Y = mouse_y() + 30;
        $this->Screen->Caption = 'FPS: '.$this->FPS;
        
        $Point[0]->Position = $Sprite2->Center;
        $Point[1]->Position = $Sprite->Center;
        
        $Sprite->SetAngleTowardObject($Sprite2,90);
        
        IF(key_down(74))
            $Sprite->Animation->Speed -= normalize(0.001);
        IF(key_down(78))
            $Sprite->Animation->Speed += normalize(0.001);
    }
}

$Game = new Game();
$Game->Run();