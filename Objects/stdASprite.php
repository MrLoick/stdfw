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
    
    Public $Animation;
    
    Public Function __construct(stdTexture $Texture, $W=4, $H=4, $CutMethod = CUT_COUNT)
    {
        parent::__construct($Texture);
        $this->Size = $Texture->Cut($W,$H,$CutMethod);
        $this->Animation = new stdAnimation($Texture);
    }
}