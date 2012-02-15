<?

/**
 * @name StandardFramework Prototype
 * @author DENFER
 * @version 1.0.0
 * @copyright DENFER STUDIO
 */

class Prototype
{
    public function __get($Key)
    {
        $Property = array($this,'Get_'.$Key);
        if(is_callable($Property))
            return call_user_func($Property);
        else
            return $this->{$Key};
    }

    public function __set($Key, $Value)
    {
        $Property = array($this,'Set_'.$Key);
        if(is_callable($Property))
            call_user_func($Property, $Value);
        else
            $this->{$Key} = $Value;
    }
}