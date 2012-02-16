<?

/**
 * @name StandardFramework Static Sprite
 * @author DENFER
 * @version 1.0.0
 * @copyright DENFER STUDIO
 */

Class stdSSprite extends stdObject
{
    Protected $_Type = TYPE_SSPRITE;

    Protected $_Flags = FLAG_DRAW;
    
    Protected $_Texture;

    Public Function __construct(stdTexture $Texture)
    {
        parent::__construct();
        $this->_Texture = $Texture;
        $Info = $Texture->Info();
        $this->_Size->X = $Info->Width;
        $this->_Size->Y = $Info->Height;
    }
    
    Public Function Draw($DeltaTime)
    {
        SSprite_Draw( $this->_Texture->Id, $this->_Position->X, $this->_Position->Y, $this->_Size->X, $this->_Size->Y, $this->_Angle, $this->_Alpha, $this->_FX );
    }
}