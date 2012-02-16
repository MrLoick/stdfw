<?

/**
 * @name StandardFramework Prototype
 * @author DENFER
 * @copyright DENFER STUDIO
 */

Class Prototype
{
    Public Function __get($Key)
    {
        $Property = array($this,'Get_'.$Key);
        IF(is_callable($Property))
            return call_user_func($Property);
        return null;
    }

    Public Function __set($Key, $Value)
    {
        $Property = array($this,'Set_'.$Key);
        IF(is_callable($Property))
            call_user_func($Property, $Value);
    }
    
    Public Function __isset($Key)
    {
        $Property = array($this,'IsSet_'.$Key);
        IF(is_callable($Property))
            return call_user_func($Property);
        return false;
    }
    
    public function __unset($Key)
    {
        $Property = array($this,'UnSet_'.$Key);
        IF(is_callable($Property))
            call_user_func($Property);
    }
}