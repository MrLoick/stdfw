<?

/**
 * @name StandardFramework stdGame
 * @author DENFER
 * @copyright DENFER STUDIO
 */

Class stdGame extends Prototype
{
    Private Static $Current;
    
    Public $Physics = false;
    Public $VSync = false;
    Public $FullScreen = false;
    
    Public $Camera;
    Public $Screen;

    Public Static Function Current(){return self::$Current;}
    
    Public Function Get_FPS(){return stdFPS();}

    Public Function __construct()
    {
        $this->Camera = new stdCamera( vec2(), 0, 1, MAIN_CAM );
        $this->Screen = new stdScreen;
        
        self::$Current = $this;
        
        stdEvent::Reg( EVENT_LOAD, array($this,LoadContent) );
        stdEvent::Reg( EVENT_INIT, array($this,Initialize) );
        stdEvent::Reg( EVENT_DRAW, array($this,Draw) );
        //stdEvent::Reg( EVENT_UPDATE, array($this,Update) );
        //stdEvent::Reg( EVENT_UPDATE, array($this,DefaultUpdate) );
        stdEvent::Reg( EVENT_QUIT, array($this,Quit) );
	Register($this,DefaultUpdate);
    }

    Public Function LoadContent(){}
    Public Function Initialize(){}
    Public Function Draw($DeltaTime){}
    Public Function Update($DeltaTime){}
    Public Function DefaultUpdate($DeltaTime)
    {
		$this->Update($DeltaTime);
		update_state();
        IF($this->Physics)
            cpSpaceStep(MAIN_SPACE, normalize(0.002));
    }
    Public Function Quit(){}

    Public Function Run()
    {
        stdCore_Init( $this->Screen->Width, $this->Screen->Height, $this->FullScreen, $this->VSync, $this->Physics );	
    }
}