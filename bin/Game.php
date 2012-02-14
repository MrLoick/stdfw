<?

/**
 * Главный класс игры
 * @name StandardFramework Demo Game
 * @author DENFER
 * @version 1.0.0
 * @copyright DENFER STUDIO
 */

class Game extends stdGame
{
	public function LoadContent()
	{
		global $Tex;
		$Tex = new stdTexture;
		$Tex->Load('Content/miku.png');
	}
	
	public function Initialize()
	{
		global $Tex, $Sprite;
		
		stdMaxFPS(true);
		$this->Screen->Caption = 'My firts game.';
		
		$Sprite = new stdSSprite($Tex);
		
		stdDrawing::Reg($Sprite);
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