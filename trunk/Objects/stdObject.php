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
	public $Type = TYPE_OBJECT;
	public $Position;
	public $Size;
	public function Get_X(){return $this->Position->X;}
	public function Get_Y(){return $this->Position->Y;}
	public function Set_X($X){$this->Position->X = $X;}
	public function Set_Y($Y){$this->Position->Y = $Y;}
	public function Get_Width(){return $this->Size->X;}
	public function Get_Height(){return $this->Size->Y;}
	public function Set_Width($X){$this->Size->X = $X;}
	public function Set_Height($Y){$this->Size->Y = $Y;}
	public $Angle = 0;
	public $Alpha = 255;
	public $Color = clWhite;
	public $FX = FX_BLEND;
	public function Update($DeltaTime){}
		
	public function __construct()
	{
		$this->Position = vec2();
		$this->Size = vec2();	
	}
}