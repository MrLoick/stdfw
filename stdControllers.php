<?php

/**
 * @name StandardFramework stdControllers
 * @author Inlife
 * @version 1.0.0
 * @copyright DENFER STUDIO
 */

abstract class Key
{
    public static function Down($Key) {return Key_Down($Key);}
    public static function Up($Key) {return Key_Up($Key);}
}

abstract class Mouse
{
    public static function X() {return mouse_x();}
    public static function Y() {return mouse_y();}
    public static function Down($Key) {return mouse_down($Key);}
    public static function Up($Key) {return mouse_up($Key);}
    public static function Click($Key) {return mouse_click($Key);}
}

?>
