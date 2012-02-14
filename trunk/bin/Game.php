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
		
	}
	
	public function Init()
	{
		$this->Screen->Caption = 'My firts game.';
	}
	
	public function Update($DeltaTime)
	{
		
	}
}

$Game = new Game();
$Game->Run();