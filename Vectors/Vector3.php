<?

/**
 * @name StandardFramework Vector3
 * @author DENFER
 * @version 1.0.0
 * @copyright DENFER STUDIO
 */


/**
 * Instance Object of Vector3
 *
 * @param integer $X
 * @param integer $Y
 * @param integer $Z
 * @return Vector3 Vector3 Object
 *
 */

function vec3( $X = 0, $Y = 0, $Z = 0 )
{
    return new Vector3($X,$Y,$Z);
}

class Vector3 extends Vector2
{
    public $Z;

    public function __construct( $X = 0, $Y = 0, $Z = 0 )
    {
        $this->X = $X;
        $this->Y = $Y;
        $this->Z = $Z;
    }
}