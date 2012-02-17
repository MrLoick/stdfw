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
        ELSE
            $this->{$Key} = $Value;
    }
    
    Public Function __isset($Key)
    {
        $Property = array($this,'IsSet_'.$Key);
        IF(is_callable($Property))
            return call_user_func($Property);
        return false;
    }
    
    Public Function __unset($Key)
    {
        $Property = array($this,'UnSet_'.$Key);
        IF(is_callable($Property))
            call_user_func($Property);
    }
    
    Public Function toArray( $Object = null )
    {
        $Array = Array();
        IF(!$Object)
            $Object = $this;
        ForEach( $Object As $Key => $Value )
        {
            IF(is_object($Value))
                $Array[$Key] = $this->toArray($Value);
            ELSE
                $Array[$Key] = $Value;
        }
        return $Array;
    }
    
    Public Function toString( $Object = null, $Index = '' )
    {
        $String = '';
        IF(!$Object)
            $Object = $this->toArray();
        ForEach( $Object As $Key => $Value )
        {
            IF(is_array($Value))
                $String .= $Index.'['.$Key.']:'.RN.$this->toString($Value,$Index.'     ').RN;
            ELSE
                $String .= $Index.$Key . ': ' . $Value.' '.RN;
        }
        return $String;
    }
    
    Public Function toDebug( $Object = null )
    {
        IF(!$Object)
            $Object = $this;
        return json_encode( $this->toArray() );
    }
    
    Public Function toJSON( $Object = null )
    {
        IF(!$Object)
            $Object = $this;
        return json_encode($Object);
    }
}