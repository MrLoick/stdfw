<?

/**
 * @name StandardFramework stdGame
 * @author DENFER
 * @version 1.0.0
 * @copyright DENFER STUDIO
 */

class stdGame extends Prototype
{
    public $Physics = false;
    public $VSync = false;
    public $FullScreen = false;

    public $Screen;

    public function Get_FPS()
    {
        return stdFPS();	
    }

    public function __construct()
    {
        $this->Screen = new stdScreen;

        stdEvent::Reg( EVENT_LOAD, array($this,LoadContent) );
        stdEvent::Reg( EVENT_INIT, array($this,Initialize) );
        stdEvent::Reg( EVENT_DRAW, array($this,Draw) );
        stdEvent::Reg( EVENT_UPDATE, array($this,Update) );
        stdEvent::Reg( EVENT_QUIT, array($this,Quit) );
    }

    public function LoadContent(){}
    public function Initialize(){}
    public function Draw($DeltaTime){}
    public function Update($DeltaTime){}
    public function Quit(){}

    public function Run()
    {
        stdCore_Init( $this->Screen->Width, $this->Screen->Height, $this->FullScreen, $this->VSync, $this->Physics );	
    }
}