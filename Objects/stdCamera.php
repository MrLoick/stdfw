<?php

/**
 * @name StandardFramework stdCamera
 * @author Inlife
 * @version 1.0.0
 * @copyright DENFER STUDIO
 */

Class stdCamera extends stdObject 
{
    
    Protected $_Type = TYPE_CAMERA;
    Protected $_Camera;
    Protected $_Scale;
    
    Protected Function CameraConfig()
    {
        stdCamCFG($this->_Camera, $this->_Position->X, $this->_Position->Y, $this->_Angle, $this->_Scale);
    }
    
    Public Function __construct(Vector2 $Position, $Angle = 0, $Scale = 1)
    {
        $this->_Position = $Position;
        $this->_Angle = $Angle;
        $this->_Scale = $Scale;
        $this->_Camera = stdCam($Position->X, $Position->Y, $Angle, $Scale);
    }
    
    Public Function Set_Position($Position) 
    {
        $this->_Position = $Position;
        $this->CameraCofing();
    }
    
    Public Function Get_Scale(){return $this->_Scale;}
    Public Function Set_Scale($Scale)
    {
        $this->_Scale = $Scale;
        $this->CameraCofing();
    }
}

?>
