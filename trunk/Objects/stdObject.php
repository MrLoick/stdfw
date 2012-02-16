<?

/**
 * @name StandardFramework Object
 * @author DENFER
 * @version 1.0.0
 * @copyright DENFER STUDIO
 */

Class stdObject extends Prototype
{
    Private $_Type = TYPE_OBJECT;
    Private $_Flags = FLAG_NONE;
    Private $_Visible = true;
    Private $_Position;
    Private $_Size;
    Private $_Angle = 0;
    Private $_Alpha = 255;
    Private $_Color = clWhite;
    Private $_FX = FX_BLEND;
    
    Public Function Get_Type(){return $this->_Type;}
    Public Function Get_FX(){return $this->_FX;}
    Public Function Set_FX($FX){$this->_FX = $FX;}
    Public Function Get_Color(){return $this->_Color;}
    Public Function Set_Color($Color){$this->_Color = $Color;}
    Public Function Get_Alpha(){return $this->_Alpha;}
    Public Function Set_Alpha($Alpha){$this->_Alpha = $Alpha;}
    Public Function Get_Angle(){return $this->_Angle;}
    Public Function Set_Angle($Angle){$this->_Angle = $Angle;}
    Public Function Get_Visible(){return $this->Visible;}
    Public Function Set_Visible($Visible){$this->_Visible = $Visible;}
    Public Function Get_Flags(){return $this->_Flags;}
    Public Function Set_Flags($Flags){$this->_Flags = $Flags;}
    Public Function Get_X(){return $this->_Position->X;}
    Public Function Get_Y(){return $this->_Position->Y;}
    Public Function Set_X($X){$this->_Position->X = $X;}
    Public Function Set_Y($Y){$this->_Position->Y = $Y;}
    Public Function Get_Width(){return $this->_Size->X;}
    Public Function Get_Height(){return $this->_Size->Y;}
    Public Function Set_Width($X){$this->_Size->X = $X;}
    Public Function Set_Height($Y){$this->_Size->Y = $Y;}
    Public Function Update($DeltaTime){}
    Public Function Draw($DeltaTime){}
    Public Function __construct()
    {
        $this->_Position = vec2();
        $this->_Size = vec2();	
    }
}