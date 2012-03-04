<?

/**
 * @name StandardFramework Controllers
 * @author Inlife
 * @copyright DENFER STUDIO
 */

Abstract Class Key
{
    Public Static Function Down($Key) {return Key_Down($Key);}
    Public Static Function Up($Key) {return Key_Up($Key);}
}

Abstract Class Mouse
{
    Public Static Function X() {return mouse_x();}
    Public Static Function Y() {return mouse_y();}
    Public Static Function DX(){return mouse_dx();}
    Public Static Function DY(){return mouse_dy();}
    Public Static Function RX(){return mouse_x() + stdGame::$Current->Camera->X;}
    Public Static Function RY(){return mouse_y() + stdGame::$Current->Camera->Y;}
    Public Static Function Lock(){return mouse_Lock();}
    Public Static Function Down($Key) {return mouse_down($Key);}
    Public Static Function Up($Key) {return mouse_up($Key);}
    Public Static Function Click($Key) {return mouse_click($Key);}
}