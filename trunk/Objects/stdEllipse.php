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
    Public $Radius;
    Public $Quality = 32;


    Public Function __construct(Vector2 $Position, Vector2 $Radius,  $Color = clWhite, $Alpha = 255, $Quality = 32, $FX = FX_BLEND)
    {
        $this->Position = $Position; 
        $this->Radius = $Radius;
        $this->Color = $Color;
        $this->Alpha = $Alpha;
        $this->Quality = $Quality;
        $this->FX = $FX;	
    }
}