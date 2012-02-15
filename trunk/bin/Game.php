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
        $Miku = new stdTexture('Content/miku.png');
        $Tux = new stdTexture('Content/tux.png');
    }

    Public Function Initialize()
    {
        global $Miku, $Tux, $Sprite;

        stdMaxFPS(true);
        $this->Screen->Caption = 'My firts game.';

        $Sprite = new stdASprite($Miku,4,2);
        $Sprite2 = new stdSSprite($Tux);
        $Prim = new stdEllipse(vec2(500, 300), vec2(100,50)); /* тест примитивов */
        //pre(function_exists ( "pr2d_TriList" ));   /* проверка функций которые ты перенес, а которые нет */
        stdDrawing::Reg($Sprite,$Sprite2,$Prim);
    }

    Public Function Update($DeltaTime)
    {
        global $Sprite;
        /*$Sprite->X += normalize(0.1);
        $Sprite->Y += normalize(0.1);*/
        $Sprite->X = mouse_x();
        $Sprite->Y = mouse_y();
        $this->Screen->Caption = 'FPS: '.$this->FPS;
        
        if(key_down(74))
            $Sprite->Animation->Speed -= 0.0001;
        if(key_down(78))
            $Sprite->Animation->Speed += 0.0001;
    }
}

$Game = new Game();
$Game->Run();