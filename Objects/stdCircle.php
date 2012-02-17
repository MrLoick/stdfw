<?

/**
 * @name StandardFramework Primitive: Circle
 * @author Inlife
 * @copyright DENFER STUDIO
 */

Class stdCircle extends stdObject
{
    Protected $_Type = TYPE_PCIRCLE;
    Protected $_Flags = FLAG_DRAW;
    Protected $_Radius = 1;
    Protected $_Quality = 32;
    
    Public Function Get_Radius(){return $this->_Radius;}
    Public Function Set_Radius($Radius){$this->_Radius = $Radius;}

    Public Function __construct(Vector2 $Position, $Radius = 1,  $Color = clWhite, $Alpha = 255, $Quality = 32, $FX = FX_BLEND)
    {
        parent::__construct();
        $this->_Position = $Position; 
        $this->_Radius = $Radius;
        $this->_Color = $Color;
        $this->_Alpha = $Alpha;
        $this->_Quality = $Quality;
        $this->_FX = $FX;	
    }
    
    Public Function Draw($DeltaTime)
    {
        IF($this->_Visible)
            pr2d_Circle( $this->_Position->X, $this->_Position->Y, $this->_Radius, $this->_Color, $this->_Alpha, $this->_Quality, $this->_FX );
    }
}