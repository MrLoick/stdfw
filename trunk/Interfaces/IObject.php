<?

/**
 * @name StandardFramework Object Interface
 * @author DENFER
 * @copyright DENFER STUDIO
 */

interface IObject extends IMovable, ISizeable
{
    Public Function Get_Type();
    Public Function Get_FX();
    Public Function Set_FX($FX);
    Public Function Get_Color();
    Public Function Set_Color($Color);
    Public Function Get_Alpha();
    Public Function Set_Alpha($Alpha);
    Public Function Get_Angle();
    Public Function Set_Angle($Angle);
    Public Function Get_Visible();
    Public Function Set_Visible($Visible);
    Public Function Get_Flags();
    Public Function Set_Flags($Flags);
    Public Function Get_X();
    Public Function Get_Y();
    Public Function Set_X($X);
    Public Function Set_Y($Y);
    Public Function Get_Width();
    Public Function Get_Height();
    Public Function Set_Width($X);
    Public Function Set_Height($Y);
}