<?

/**
 * @name StandardFramework Constants
 * @author DENFER
 * @version 1.0.0
 * @copyright DENFER STUDIO
 */

define ( "INFINITY", 1e+1000 );

define ( "nil", null );

define ( "TEX_DEFAULT_2D", 1074 );

define ( "SCREEN_WIDTH", 1 );
define ( "SCREEN_HEIGHT", 2 );

define ( "DEFAULT_INDEX", 0 );

define ( "MAIN_CAM", DEFAULT_INDEX );
define ( "MAIN_SPACE", DEFAULT_INDEX );

define ( "EVENT_CORE", 0xff );
define ( "EVENT_INIT", 0 + EVENT_CORE );
define ( "EVENT_LOAD", 1 + EVENT_CORE );
define ( "EVENT_DRAW", 2 + EVENT_CORE );
define ( "EVENT_UPDATE", 3 + EVENT_CORE );
define ( "EVENT_QUIT", 4 + EVENT_CORE );

define ( "TYPE_OBJECT",  1 );
define ( "TYPE_SSPRITE", 2 );
define ( "TYPE_ASPRITE", 3 );  
define ( "TYPE_PPIXEL", 10 ); 
define ( "TYPE_PLINE", 11 ); 
define ( "TYPE_PRECT",  12 );  
define ( "TYPE_PCIRCLE",  13 );
define ( "TYPE_PELLIPSE",  14 );

define ( "PR2D_FILL", 0 );      //я не знаю правильно ли я сделал, но так как они не работают значит нет =)
define ( "PR2D_SMOOTH", 1 );    //

define ( "FLAG_NONE", 0 );
define ( "FLAG_UPDATE", 1 );

define ( "FX_BLEND_NORMAL", 0 );
define ( "FX_BLEND_ADD", 1 );
define ( "FX_BLEND_MULT", 2 );
define ( "FX_BLEND_BLACK", 3 );
define ( "FX_BLEND_WHITE", 4 );
define ( "FX_BLEND_MASK", 5 );
define ( "FX_BLEND", 1048576 );
define ( "FX_COLOR", 2097152 );

define ( "CUT_COUNT", 1 );
define ( "CUT_SIZE", 2 );