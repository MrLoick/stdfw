<?php

/**
 * @name StandardFramework stdCamera
 * @author Inlife
 * @copyright DENFER STUDIO
 */

Class stdCamera extends stdObject 
{   
    Protected $_Type = TYPE_CAMERA;
    Protected $_Flags = FLAG_UPDATE;
    Protected $_Camera;
    Protected $_Scale;
    Protected $_Target = null;
    
    Public Function Get_Target(){return $this->_Target;}
    Public Function Set_Target(IObject $Target){$this->_Target = $Target;}
    Public Function Set_Position(Vector2 $Position){$this->_Position = $Position; $this->CFG();}
    Public Function Set_Angle($Angle) {$this->_Angle = $Angle; $this->CFG();}
    Public Function Get_Scale(){return $this->_Scale;}
    Public Function Set_Scale($Scale){$this->_Scale = $Scale; $this->CFG();}
    
    Public Function __construct(Vector2 $Position, $Angle = 0, $Scale = 1, $Instance = null)
    {
        parent::__construct();
        $this->_Position = $Position;
        $this->_Angle = $Angle;
        $this->_Scale = $Scale;
        IF($Instance > -1)
            $this->_Camera = $Instance;
        ELSE
            $this->_Camera = stdCam($Position->X, $Position->Y, $Angle, $Scale);
    }
    
    Protected Function CFG()
    {
        stdCamCFG($this->_Camera, $this->_Position->X, $this->_Position->Y, $this->_Angle, $this->_Scale);
    }
    
    Public Function Update($DeltaTime)
    {
        IF($this->_Target)
        {
            $Target = $this->_Target->Center;
            $this->Position = vec2( $Target->X - stdGame::Current()->Screen->Width / 2,
                                    $Target->Y - stdGame::Current()->Screen->Height / 2 );
        }
    }
}

?>