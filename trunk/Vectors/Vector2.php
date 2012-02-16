<?

/**
 * @name StandardFramework Vector2
 * @author DENFER
 * @version 1.0.0
 * @copyright DENFER STUDIO
 */


/**
 * Instance Object of Vector2
 *
 * @param integer $X
 * @param integer $Y
 * @return Vector2 Vector2 Object
 *
 */

Function vec2( $X = 0, $Y = 0 )
{
    return new Vector2($X,$Y);
}

Class Vector2 extends Vector
{
    Public $X;
    Public $Y;

    Public Function __construct( $X = 0, $Y = 0 )
    {
        $this->X = $X;
        $this->Y = $Y;
    }
}