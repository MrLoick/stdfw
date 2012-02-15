<?

/**
 * @name StandardFramework Primitive: Pixel
 * @author Inlife
 * @version 1.0.0
 * @copyright DENFER STUDIO
 */

Class stdPixel extends stdObject
{
    Public $Type = TYPE_PPIXEL;


    Public Function __construct(Vector2 $Position, $Color = clWhite, $Alpha = 255)
    {
        $this->Position = $Position;
        $this->Size = vec2(1, 1);
        $this->Color = $Color;
        $this->Alpha = $Alpha;	
    }
}