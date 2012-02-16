<?

/**
 * @name StandardFramework Object
 * @author DENFER
 * @copyright DENFER STUDIO
 */

Class stdObject extends Prototype implements IObject
{
    Protected $_Type = TYPE_OBJECT;
    Protected $_Flags = FLAG_NONE;
    Protected $_Visible = true;
    Protected $_Position;
    Protected $_Size;
    Protected $_Angle = 0;
    Protected $_Alpha = 255;
    Protected $_Color = clWhite;
    Protected $_FX = FX_BLEND;
    
    Public Function Get_Type(){return $this->_Type;}
    Public Function Get_Position(){return $this->_Position;}
    Public Function Set_Position(Vector2 $Position){$this->_Position = $Position;}
    Public Function Get_Size(){return $this->_Size;}
    Public Function Set_Size(Vector2 $Size){$this->_Size = $Size;}
    Public Function Get_FX(){return $this->_FX;}
    Public Function Set_FX($FX){$this->_FX = $FX;}
    Public Function Get_Color(){return $this->_Color;}
    Public Function Set_Color($Color){$this->_Color = $Color;}
    Public Function Get_Alpha(){return $this->_Alpha;}
    Public Function Set_Alpha($Alpha){$this->_Alpha = $Alpha;}
    Public Function Get_Angle(){return $this->_Angle;}
    Public Function Set_Angle($Angle){$this->_Angle = $Angle;}
    Public Function Get_Visible(){return $this->_Visible;}
    Public Function Set_Visible($Visible){$this->_Visible = $Visible;}
    Public Function Get_Flags(){return $this->_Flags;}
    Public Function Set_Flags($Flags){$this->_Flags = $Flags;}
    Public Function Get_X(){return $this->Position->X;}
    Public Function Get_Y(){return $this->Position->Y;}
    Public Function Set_X($X){$this->Position = vec2($X, $this->_Position->Y);}
    Public Function Set_Y($Y){$this->Position = vec2($this->_Position->X, $Y);}
    Public Function Get_Width(){return $this->Size->X;}
    Public Function Get_Height(){return $this->Size->Y;}
    Public Function Set_Width($X){$this->Size->X = $X;}
    Public Function Set_Height($Y){$this->Size->Y = $Y;}
    Public Function Update($DeltaTime){}
    Public Function Draw($DeltaTime){}
    Public Function SetAngleTowardPosition(Vector2 $Position)
    {
        $this->_Angle = AngleTowardPos( $this->_Position->X, $this->_Position->Y, $Position->X, $Position->Y );
    }
    /*Public Function SetAngleTowardObject(IObject )
    {
        $this->_Angle = $this->SetAngleTowardPosition($Position);
    }*/
    Public Function __construct()
    {
        $this->_Position = vec2();
        $this->_Size = vec2();	
    }
}