<?

/**
 * @name StandardFramework Primitive: Line
 * @author InlIFe
 * @version 1.0.0
 * @copyright DENFER STUDIO
 */

Class stdLine extends stdObject
{
    Protected $Type = TYPE_PLINE;
    Protected $_Flags = FLAG_DRAW;
    
    Public Function __construct(Vector2 $Position, Vector2 $Size, $Color = clWhite, $Alpha = 255, $FX = FX_BLEND)
    {
        $this->Position = $Position; 
        $this->Size = $Size;
        $this->Color = $Color;
        $this->Alpha = $Alpha;
        $this->FX = $FX;	
    }
    
    Public Function Draw($DeltaTime)
    {
        pr2d_Line( $this->_Position->X, $this->_Position->Y, $this->_Size->X, $this->_Size->Y, $this->_Color, $this->_Alpha, $this->_FX );
    }
}