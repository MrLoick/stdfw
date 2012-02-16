<?

/**
 * @name StandardFramework Animated Sprite
 * @author DENFER
 * @copyright DENFER STUDIO
 */

Class stdASprite extends stdSSprite
{
    Protected $_Type = TYPE_ASPRITE;
    Public $Animation;
    
    Public Function __construct(stdTexture $Texture, $W=4, $H=4, $CutMethod = CUT_COUNT)
    {
        parent::__construct($Texture);
        $this->_Size = $Texture->Cut($W,$H,$CutMethod);
        $this->Animation = new stdAnimation($Texture);
    }
    
    Public Function Draw($DeltaTime)
    {
        ASprite_Draw( $this->_Texture->Id, $this->_Position->X, $this->_Position->Y, $this->_Size->X, $this->_Size->Y, $this->_Angle, $this->Animation->Frame, $this->_Alpha, $this->_FX );
    }
}