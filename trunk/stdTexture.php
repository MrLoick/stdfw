<?

/**
 * @name StandardFramework Texture
 * @author DENFER
 * @version 1.0.0
 * @copyright DENFER STUDIO
 */

Class stdTexture extends Prototype
{
    Public $Id = -1;
    Public $Info = null;
    Public $Size;
    
    Public Function __construct( $File = null, $Background = clRed, $FX = TEX_DEFAULT_2D )
    {
        $this->Size = vec2();
        $this->Load($File,$Background,$FX);
    }

    Public Function Load($File, $Background = clRed, $FX = TEX_DEFAULT_2D)
    {
        IF(!$File) return false;
        IF(file_exists($File))
        {
            $this->Id = stdLoadTexture($File, $Background, $FX);
            return $this->Id;
        }
        return false;
    }
    
    Public Function Info()
    {
        $this->Info = stdTextureInfo($this->Id);
        return $this->Info;
    }
    
    Public Function Cut($W = 4, $H = 4, $CutMethod = CUT_COUNT)
    {
        $Width = $W;
        $Height = $H;
        
        IF( $CutMethod == CUT_COUNT )
        {
            $Width = Ceil ( $this->Info->Width / $W );
            $Height = Ceil ( $this->Info->Height / $H );
        }
        IF($this->Id > -1)
            stdCut($this->Id,$Width,$Height);
        $this->Size = vec2($Width,$Height);
        $this->Info();
        return $this->Size;
    }
}