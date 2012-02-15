<?

/**
 * @name StandardFramework Object
 * @author DENFER
 * @version 1.0.0
 * @copyright DENFER STUDIO
 */

Class stdObject extends Prototype
{
    Public $Type = TYPE_OBJECT;
    Public $Flags = FLAG_NONE;
    Public $Visible = true;
    Public $Position;
    Public $Size;
    Public Function Get_X(){return $this->Position->X;}
    Public Function Get_Y(){return $this->Position->Y;}
    Public Function Set_X($X){$this->Position->X = $X;}
    Public Function Set_Y($Y){$this->Position->Y = $Y;}
    Public Function Get_Width(){return $this->Size->X;}
    Public Function Get_Height(){return $this->Size->Y;}
    Public Function Set_Width($X){$this->Size->X = $X;}
    Public Function Set_Height($Y){$this->Size->Y = $Y;}
    Public $Angle = 0;
    Public $Alpha = 255;
    Public $Color = clWhite;
    Public $FX = FX_BLEND;
    Public Function Update($DeltaTime){}

    Public Function __construct()
    {
        $this->Position = vec2();
        $this->Size = vec2();	
    }
}