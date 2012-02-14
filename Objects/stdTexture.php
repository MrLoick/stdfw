<?

/**
 * @name StandardFramework Texture
 * @author DENFER
 * @version 1.0.0
 * @copyright DENFER STUDIO
 */

class stdTexture extends Prototype
{
	public $Id = -1;
	
	public function __construct( $File = null, $Background = clRed, $FX = TEX_DEFAULT_2D )
	{
		$this->Load($File,$Background,$FX);
	}
	
	public function Load($File, $Background = clRed, $FX = TEX_DEFAULT_2D)
	{
		if(!$File) return false;
		if(file_exists($File))
		{
			$this->Id = stdLoadTexture($File, $Background, $FX);
			return $this->Id;
		}
		return false;
	}
}