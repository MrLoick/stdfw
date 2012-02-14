<?

/**
 * @name StandardFramework Object
 * @author DENFER
 * @version 1.0.0
 * @copyright DENFER STUDIO
 */

class stdTexture extends Prototype
{
	protected $TextureId = null;
	public $Texture;
	public function Get_Texture(){return $this->TextureId;}
	
	public function __contruct( $File = null, $Background = clRed, $FX = TEX_DEFAULT_2D )
	{
		$this->Load($File);
	}
	
	public function Load($File, $Background = clRed, $FX = TEX_DEFAULT_2D)
	{
		if(!$File) return false;
		if(file_exists($File))
			$this->TextureId = stdLoadTexture($File, $Background, $FX);
		else
			return false;
		return true;
	}
}