<?

/**
 * @name StandardFramework Core
 * @author DENFER
 * @version 1.0.0
 * @copyright DENFER STUDIO
 */

Abstract Class stdCore
{
    Public Static Function LoadContent(){stdEvent::Call(EVENT_LOAD);}
    Public Static Function Initialize(){stdEvent::Call(EVENT_INIT);}
    Public Static Function Draw($DeltaTime){stdEvent::Call(EVENT_DRAW,array($DeltaTime));}
    Public Static Function Update($DeltaTime){stdEvent::Call(EVENT_UPDATE,array($DeltaTime));}
}