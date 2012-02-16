<?

/**
 * @name StandardFramework Primitive: Rectangle
 * @author InlIFe
 * @version 1.0.0
 * @copyright DENFER STUDIO
 */

Class stdRect extends stdLine
{
    Protected $Type = TYPE_PRECT;
    Protected $_Flags = FLAG_DRAW;
    
    Public Function Draw($DeltaTime)
    {
        pr2d_Rect( $this->_Position->X, $this->_Position->Y, $this->_Size->X, $this->_Size->Y, $this->Color, $this->_Alpha, $this->_FX );
    }
}