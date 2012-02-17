<?

/**
 * @name StandardFramework Primitive: Pixel
 * @author Inlife
 * @copyright DENFER STUDIO
 */

Class stdPixel extends stdObject
{
    Protected $_Type = TYPE_PPIXEL;
    Protected $_Flags = FLAG_DRAW;
    
    Public Function __construct(Vector2 $Position, $Color = clWhite, $Alpha = 255)
    {
        parent::__construct();
        $this->Position = $Position;
        $this->Size = vec2(1, 1);
        $this->Color = $Color;
        $this->Alpha = $Alpha;	
    }
    
    Public Function Draw($DeltaTime)
    {
        IF($this->_Visible)
            pr2d_Pixel( $this->_Position->X, $this->_Position->Y, $this->_Color, $this->_Alpha );
    }
}