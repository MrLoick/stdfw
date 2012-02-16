<?

/**
 * @name StandardFramework Animated Sprite
 * @author DENFER
 * @version 1.0.0
 * @copyright DENFER STUDIO
 */

Class stdASprite extends stdSSprite
{
    Public $Type = TYPE_ASPRITE;
    
    Public $Flags = FLAG_DRAW;
    
    Public $Animation;
    
    Public Function __construct(stdTexture $Texture, $W=4, $H=4, $CutMethod = CUT_COUNT)
    {
        parent::__construct($Texture);
        $this->Size = $Texture->Cut($W,$H,$CutMethod);
        $this->Animation = new stdAnimation($Texture);
    }
    
    Public Function Draw($DeltaTime)
    {
        ASprite_Draw( $this->Texture->Id, $this->Position->X, $this->Position->Y, $this->Size->X, $this->Size->Y, $this->Angle, $this->Animation->Frame, $this->Alpha, $this->FX );
    }
}