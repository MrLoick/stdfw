<?

/**
 * @name StandardFramework Prototype
 * @author DENFER
 * @version 1.0.0
 * @copyright DENFER STUDIO
 */

Class Prototype
{
    Public Function __get($Key)
    {
        $Property = array($this,'Get_'.$Key);
        IF(is_callable($Property))
            return call_user_func($Property);
        ELSE
            return $this->{$Key};
    }

    Public Function __set($Key, $Value)
    {
        $Property = array($this,'Set_'.$Key);
        IF(is_callable($Property))
            call_user_func($Property, $Value);
        ELSE
            $this->{$Key} = $Value;
    }
}