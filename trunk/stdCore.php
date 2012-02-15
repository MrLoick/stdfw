<?

/**
 * @name StandardFramework Core
 * @author DENFER
 * @version 1.0.0
 * @copyright DENFER STUDIO
 */

abstract class stdCore
{
    public static function LoadContent(){stdEvent::Call(EVENT_LOAD);}
    public static function Initialize(){stdEvent::Call(EVENT_INIT);}
    public static function Draw($DeltaTime){stdEvent::Call(EVENT_DRAW,array($DeltaTime));}
    public static function Update($DeltaTime){stdEvent::Call(EVENT_UPDATE,array($DeltaTime));}
}