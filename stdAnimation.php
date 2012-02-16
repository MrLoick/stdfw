<?

/**
 * @name StandardFramework Animation
 * @author DENFER
 * @copyright DENFER STUDIO
 */

Class stdAnimation extends Prototype
{
    Public $Row = 1;
    Public $Col = 1;

    Public $Speed = 1;

    Public $_Frame = 1;

    Private $Delay = 100;
    Private $Tick = 0;
    Private $_Play = True;

    Private $TextureInfo;

    Public Function __construct(stdTexture $Texture)
    {
        $this->TextureInfo = $Texture->Info;
    }

    Public Function Get_Play()
    {
        return $this->_Play;
    }

    Public Function Stop()
    {
        $this->Reset();
        $this->Pause();
    }

    Public Function Play()
    {
        $this->Stop();
        $this->Resume();
    }

    Public Function Resume()
    {
        $this->_Play = true;
    }

    Public Function Pause()
    {
        $this->_Play = false;
    }

    Public Function Reset()
    {
        $this->_Frame = 1;
        $this->Tick = 0;
    }

    Public Function Calculate( $W, $R, $C )
    {
        return $W * ($R - 1) + $C;
    }

    Public Function Get_Frame( $Row = NULL, $Col = NULL )
    {
        IF( !$this->_Play ) return $this->_Frame;
        
        IF( $Row != NULL )
            $this->Row = $Row;
        IF( $Col != NULL )
            $this->Col = $Col;
        
        IF( $this->Col > $this->TextureInfo->FramesX or $this->Col < 1 )
                $this->Col = 1;
        IF( $this->Row > $this->TextureInfo->FramesY or $this->Row < 1 )
                $this->Row = 1;

        $this->_Frame = $this->Calculate( $this->TextureInfo->FramesX, $this->Row, $this->Col );

        IF( $this->Tick >= $this->Delay )
        {
            $this->Tick = 0;
            $this->Col++;
        }
        ELSE
            $this->Tick += normalize($this->Speed);

        return $this->_Frame;
    }
}