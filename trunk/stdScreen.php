<?

/**
 * @name StandardFramework Screen
 * @author DENFER
 * @version 1.0.0
 * @copyright DENFER STUDIO
 */

Class stdScreen extends Prototype
{
    Private $_Width = 800;
    Private $_Height = 600;
    Private $_Caption = 'Powered By StandardFramework';
    Public Function Get_Caption(){return $this->_Caption;}
    Public Function Set_Caption($Caption){$this->_Caption = $Caption; stdSetCaption($Caption);}
    Public Function Get_Width(){return $this->_Width;}
    Public Function Get_Height(){return $this->_Height;}
    Public Function Set_Width($Width){Screen_Set($Width, $this->_Height);}
    Public Function Set_Height($Height){Screen_Set($this->_Width, $Height);}
}