<?

/**
 * События фреймворка
 * @name StandardFramework Events System
 * @author DENFER
 * @version 1.0.0
 * @copyright DENFER STUDIO
 */

abstract class stdEvent
{
	public static $Events = array();
	
	public static function Reg ($Event, $Func)
	{
		self::$Events[$Event][] = $Func;
		return sizeof(self::$Events[$Event])-1;
	}
	
	public static function Call ($Event, $Arguments = array())
	{
		foreach((array)self::$Events[$Event] as $Func)
			if(is_callable($Func))
				@call_user_func_array($Func, $Arguments);
	}
}