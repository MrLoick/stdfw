<?

/**
 * @name StandardFramework Static Sprite
 * @author DENFER
 * @version 1.0.0
 * @copyright DENFER STUDIO
 */

Class stdSSprite extends stdObject
{
    Public $Type = TYPE_SSPRITE;

    Public $Texture;

    Public Function __construct(stdTexture $Texture)
    {
        parent::__construct();
        $this->Texture = $Texture;
        $Info = $Texture->Info();
        $this->Size->X = $Info->Width;
        $this->Size->Y = $Info->Height;
    }
}