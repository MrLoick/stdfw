<?

Function Register($self, $name)
{
	return Timer::setInterval(function($t) use ($self,$name,$args)
	{
		IF(is_callable(array($self,Update)))
			call_user_func( array($self,$name), stdElapsed() );
	},1);
}