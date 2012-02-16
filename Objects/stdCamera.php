<?php

/**
 * @name StandardFramework stdCamera
 * @author Inlife
 * @version 1.0.0
 * @copyright Inlife Software
 */
class stdCamera extends stdObject {
    
    protected $_Type = TYPE_CAMERA;
    protected $_Camera;
    protected $_Scale;
    
    public function __construct(Vector2 $Position, $Angle = 0, $Scale = 1)
    {
        $this->_Position = $Position;
        $this->_Angle = $Angle;
        $this->_Scale = $Scale;
        $this->_Camera = stdCam($Position->X, $Position->Y, $Angle, $Scale);
    }
    
    protected function CameraConfig()
    {
        stdCamCFG($this->Camera, $this->_Position->X, $this->_Position->Y, $this->_Angle, $this->_Scale);
    }
    
    public function Set_Position($Position) 
    {
        $this->_Position = $Position;
        $this->CameraCofing();
    }
    
    public function Get_Scale(){return $this->_Scale;}
    public function Set_Scale($Scale)
    {
        $this->_Scale = $Scale;
        $this->CameraCofing();
    }
}

?>
