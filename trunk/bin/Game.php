<?

/**
 * @name StandardFramework Demo Game
 * @author DENFER
 * @version 1.0.0
 * @copyright DENFER STUDIO
 */

class Game extends stdGame
{
	public function LoadContent()
	{
		global $Miku, $Tux;
		$Miku = new stdTexture('Content/miku.png');
		$Tux = new stdTexture('Content/tux.png');
	}
	
	public function Initialize()
	{
		global $Miku, $Tux, $Sprite;
		
		stdMaxFPS(true);
		$this->Screen->Caption = 'My firts game.';
		
		$Sprite = new stdSSprite($Miku);
		$Sprite2 = new stdSSprite($Tux);
		
		stdDrawing::Reg($Sprite,$Sprite2);
	}
	
	public function Update($DeltaTime)
	{
		global $Sprite;
		$Sprite->X += normalize(0.1);
		$this->Screen->Caption = 'FPS: '.$this->FPS;
	}
}

$Game = new Game();
$Game->Run();