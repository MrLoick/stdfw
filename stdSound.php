<?php

/**
 * @name StandardFramework stdSound
 * @author Inlife
 * @copyright DENFER STUDIO
 */
class stdSound extends Prototype 
{
    Protected $_Type = TYPE_SOUND;
    Protected $_Flags = FLAG_UPDATE;
    Protected $_Position;
    Protected $_Self;
    Protected $_Pointer = null;
    Protected $_Loop = false;
    Protected $_Active = false;
    
    Public Function Get_Self(){return $this->_Self;}
    Public Function Get_Type(){return $this->_Type;}
    Public Function Get_Position(){return $this->_Position;}
    Public Function Set_Position(Vector3 $Position){$this->_Position = $Position;}
    Public Function Get_Flags(){return $this->_Flags;}
    Public Function Set_Flags($Flags){$this->_Flags = $Flags;}
    Public Function Get_Loop(){return $this->_Loop;}
    Public Function Set_Loop($Loop){$this->_Loop = $Loop;}
    Public Function Get_Active(){return $this->_Active;}
    Public Function Set_Active($Active){$this->_Active = $Active;}
    
    Public Function Update($DeltaTime)
    {
        if ($this->_Active)
        {
            $this->_Active = false;
            stdPlaySound($this->_Pointer, $this->_Loop, $this->_Position->X, $this->_Position->Y, $this->_Position->Z);
        }
    }
    
    Public Function __construct($FileName, Vector3 $Position, $Number = 1, $Loop = false)
    {
        $this->_Self = md5(microtime(1).rand(0,1000000).rand(0,1000000));
        $this->_Position = vec3();
        $this->_Loop = $Loop;
        IF(file_exists($FileName))
                $this->_Pointer = stdLoadSound($FileName, $Number);
        stdEvent::Reg(EVENT_UPDATE, array($this,Update));
    }
}

?>
