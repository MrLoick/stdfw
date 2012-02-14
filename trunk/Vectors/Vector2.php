<?

/**
 * @name StandardFramework Vector2
 * @author DENFER
 * @version 1.0.0
 * @copyright DENFER STUDIO
 */


/**
 * Instance Vector2 Object
 *
 * @param integer $x
 * @param integer $y
 * @return Vector2 Vector2 Object
 *
 */

function vec2($x=0, $y=0)
{
	return new Vector2($x,$y);
}

class Vector2 extends Vector
{
	public $X;
	public $Y;
	
	public function __construct($x=0, $y=0)
	{
		$this->X = $x;
		$this->Y = $y;
	}
}