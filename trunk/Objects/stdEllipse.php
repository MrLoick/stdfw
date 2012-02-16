<?

/**
 * @name StandardFramework Primitive: Circle
 * @author Inlife
 * @version 1.0.0
 * @copyright DENFER STUDIO
 */

Class stdEllipse extends stdObject
{
    Protected $Type = TYPE_PELLIPSE;
    Protected $_Flags = FLAG_DRAW;
    Protected $_Radius;
    Protected $_Quality = 32;

    Public Function Get_Radius(){return $this->_Radius;}
    Public Function Set_Radius(Vector2 $Radius){$this->_Radius = $Radius;}

    Public Function __construct(Vector2 $Position, Vector2 $Radius, $Color = clWhite, $Alpha = 255, $Quality = 32, $FX = FX_BLEND)
    {
        $this->_Position = $Position; 
        $this->_Radius = $Radius;
        $this->_Color = $Color;
        $this->_Alpha = $Alpha;
        $this->_Quality = $Quality;
        $this->_FX = $FX;	
    }
    
    Public Function Draw($DeltaTime)
    {
        pr2d_Ellipse( $this->_Position->X, $this->_Position->Y, $this->_Radius->X, $this->_Radius->Y, $this->_Color, $this->_Alpha, $this->_Quality, $this->_FX );
    }
}