<?

/**
 * @name StandardFramework stdGame
 * @author DENFER
 * @version 1.0.0
 * @copyright DENFER STUDIO
 */

class stdGame
{
	public $Physics = false;
	public $VSync = false;
	public $FullScreen = false;
	
	public $Screen;
	
	public function __construct()
	{
		$this->Screen = new stdScreen;
		
		stdEvent::Reg( EVENT_LOAD, array($this,LoadContent) );
		stdEvent::Reg( EVENT_INIT, array($this,Init) );
		stdEvent::Reg( EVENT_DRAW, array($this,Draw) );
		stdEvent::Reg( EVENT_UPDATE, array($this,Update) );
		stdEvent::Reg( EVENT_QUIT, array($this,Quit) );
	}
	
	public function LoadContent(){}
	public function Init(){}
	public function Draw($DeltaTime){}
	public function Update($DeltaTime){}
	public function Quit(){}
	
	public function Run()
	{
		stdCore_Init( $this->Screen->Width, $this->Screen->Height, $this->FullScreen, $this->VSync, $this->Physics );	
	}
}