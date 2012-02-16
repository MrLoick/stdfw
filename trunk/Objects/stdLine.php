<?

/**
 * @name StandardFramework Primitive: Line
 * @author Inlife
 * @version 1.0.0
 * @copyright DENFER STUDIO
 */

Class stdLine extends stdObject
{
    Protected $Type = TYPE_PLINE;


    Public Function __construct(Vector2 $Position, Vector2 $Size, $Color = clWhite, $Alpha = 255, $FX = FX_BLEND)
    {
        $this->Position = $Position; 
        $this->Size = $Size;
        $this->Color = $Color;
        $this->Alpha = $Alpha;
        $this->FX = $FX;	
    }
}