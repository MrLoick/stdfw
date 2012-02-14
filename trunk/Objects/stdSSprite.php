<?

/**
 * Статический объект
 * @name StandardFramework Static Sprite
 * @author DENFER
 * @version 1.0.0
 * @copyright DENFER STUDIO
 */

class stdSSprite extends stdObject
{
	public $Texture;
	
	public function __construct(stdTexture $Texture)
	{
		parent::__construct();
		
		$Info = stdTextureInfo($Texture->Id);
		
		$this->Size->X = $Info->Width;
		$this->Size->Y = $Info->Height;
	}
}