<?

/**
 * @name StandardFramework Screen
 * @author DENFER
 * @version 1.0.0
 * @copyright DENFER STUDIO
 */

class stdScreen extends Prototype
{
	private $_Width = 800;
	private $_Height = 600;
	
	public function Get_Width()
	{
		return $this->_Width;	
	}
	
	public function Get_Height()
	{
		return $this->_Height;	
	}
	
	public function Set_Width($Width)
	{
		Screen_Set($Width, $this->_Height);	
	}
	
	public function Set_Height($Height)
	{
		Screen_Set($this->_Width, $Height);	
	}
}