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
		
	}
	
	public function Initialize()
	{
		stdMaxFPS(true);
		$this->Screen->Caption = 'My firts game.';
	}
	
	public function Update($DeltaTime)
	{
		$this->Screen->Caption = 'FPS: '.$this->FPS;
	}
}

$Game = new Game();
$Game->Run();