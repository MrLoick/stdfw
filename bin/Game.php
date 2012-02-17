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
        $Miku = new stdTexture('Content/player.png', RGB(255, 0, 255));
        $Tux = new stdTexture('Content/tux.png');
    }
    
    Public Function Initialize()
    {
        global $Miku, $Tux, $Sprite, $Sprite2, $Point, $a;
        
        debug_set(Miku2, "Hello World!!!");
        
        stdMaxFPS(true);
        $this->Screen->Caption = 'My firts game.';
        
        $Sprite = new stdASprite($Miku,4,4);
        $Sprite2 = new stdSSprite($Tux);
        $Prim = new stdEllipse(vec2(500, 300), vec2(100,50));
        //pre(function_exists ( "pr2d_TriList" ));
        $this->Camera->Target = $Sprite;
        
        stdEvent::Reg(EVENT_TIMER, 'debug_update');
        
        $Point[0] = new stdCircle(vec2(0,0), 5);
        $Point[1] = new stdCircle(vec2(0,0), 5);
        
        debug_write("Hello World!");
        
        debug_show();
        debug_remove('Dyn1');
        debug_add($Sprite);
        debug_add($Miku->Size);
        debug_add($Sprite, 'Player');
        debug_add($Sprite2);
        
        $Sprite->Debug('My Super Player!!!');
        
        debug_add('t');
        
        $a = array();
        
        //stdDrawing::Reg($Sprite,$Sprite2,$Prim,$Point[0],$Point[1],$this->Camera);
    }
    
    Public Function Update($DeltaTime)
    {
        global $Sprite, $Sprite2, $Point, $Miku, $a;
        //$this->Camera->X -= normalize(0.1);
        /*$Sprite->X += normalize(0.1);
        $Sprite->Y += normalize(0.1);*/
        $Sprite->X = mouse_x() + 30;
        $Sprite->Y = mouse_y() + 30;
        $this->Screen->Caption = 'FPS: '.$this->FPS;
        
        IF(key_down(K_ENTER))
        {
            $a[] = new stdASprite($Miku,4,4); $a[sizeof($a)-1]->Position = vec2(rand(0,800),rand(0,600));
            $a[sizeof($a)-1]->Alpha = rand(50,255);
            debug_write("Sprite's: ".sizeof($a));
        }
        elseIf(key_down(K_DELETE))
        {
            if(sizeof($a)>0) $a[rand(0,sizeof($a)-1)]->Visible = false;
        }
        
        $Point[0]->Position = $Sprite2->Center;
        $Point[1]->Position = $Sprite->Center;
        
        //$Sprite->SetAngleTowardObject($Sprite2,90);
        
        IF(key_down(74))
            $Sprite->Animation->Speed -= normalize(0.001);
        IF(key_down(78))
            $Sprite->Animation->Speed += normalize(0.001);
    }
}

$Game = new Game();
$Game->Run();