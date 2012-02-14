<?

/**
 * @name StandardFramework stdGame
 * @author DENFER
 * @version 1.0.0
 * @copyright DENFER STUDIO
 */

class stdGame
{
	public function __construct()
	{
		
	}
	
	public function Run()
	{
		stdCore_Init( 800, 600, false, false, true );	
	}
}

$game = new stdGame;
$game->Run();