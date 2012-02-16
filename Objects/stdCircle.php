<?

/**
 * @name StandardFramework Primitive: Circle
 * @author Inlife
 * @version 1.0.0
 * @copyright DENFER STUDIO
 */

Class stdCircle extends stdObject
{
    Protected $Type = TYPE_PCIRCLE;
    Public $Radius = 1;
    Public $Quality = 32;


    Public Function __construct(Vector2 $Position, $Radius = 1,  $Color = clWhite, $Alpha = 255, $Quality = 32, $FX = FX_BLEND)
    {
        $this->Position = $Position; 
        $this->Radius = $Radius;
        $this->Color = $Color;
        $this->Alpha = $Alpha;
        $this->Quality = $Quality;
        $this->FX = $FX;	
    }
}