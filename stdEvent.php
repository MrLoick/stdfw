<?

/**
 * @name StandardFramework Events System
 * @author DENFER
 * @version 1.0.0
 * @copyright DENFER STUDIO
 */

Abstract Class stdEvent
{
    Public Static $Events = array();

    Public Static Function Reg ($Event, $Func)
    {
        self::$Events[$Event][] = $Func;
        return sizeof(self::$Events[$Event])-1;
    }

    Public Static Function Call ($Event, $Arguments = array())
    {
        foreach((array)self::$Events[$Event] as $Func)
                if(is_callable($Func))
                        @call_user_func_array($Func, $Arguments);
    }
}