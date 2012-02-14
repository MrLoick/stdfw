<?

/**
 * Стандартный Объект
 * @name StandardFramework Object
 * @author DENFER
 * @version 1.0.0
 * @copyright DENFER STUDIO
 */

class stdObject extends Prototype
{
	public $Position;
	public $Size;
	public $X;
	public $Y;
	public $Width;
	public $Height;
	public function Get_X(){return $this->Position->X;}
	public function Get_Y(){return $this->Position->Y;}
	public function Set_X($X){$this->Position->X = $X;}
	public function Set_Y($Y){$this->Position->Y = $Y;}
	public function Get_Width(){return $this->Size->X;}
	public function Get_Height(){return $this->Size->Y;}
	public function Set_Width($X){$this->Size->X = $X;}
	public function Set_Height($Y){$this->Size->Y = $Y;}
	public $Alpha = 255;
	public $Color = clWhite;
	public $FX = FX_BLEND;
}