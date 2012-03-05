<?

Class stdTileMap extends stdASprite
{
    Protected $MAP = Array();
    
    Public Function __construct( $MAP, stdTexture $Texture, $W = 4, $H = 4, $CutMethod = CUT_COUNT )
    {
        parent::__construct($Texture, $W, $H, $CutMethod);
        $this->MAP = json_decode($MAP);
        $this->Animation->Stop();
    }
    
    Public Function Draw($DeltaTime)
    {
        ForEach( (Array) $this->MAP As $Y => $Region )
        {
            ForEach( (Array) $Region As $X => $Frame )
            {
                $this->Position->X = $X * $this->Size->X;
                $this->Position->Y = $Y * $this->Size->Y;
                $this->Frame = $Frame;
                parent::Draw($DeltaTime);
            }
        }
    }
}