<?

/**
 * @name StandardFramework Drawing
 * @author DENFER
 * @version 1.0.0
 * @copyright DENFER STUDIO
 */

Abstract Class stdDrawing
{
    Public Static $Game = null;
    Protected Static $Objects = array();

    Public Static Function Add($Object)
    {
        self::$Objects[] = $Object;
        return sizeof( self::$Objects ) - 1;
    }

    Public Static Function Del($Id)
    {
        unset(self::$Objects[$Id]);
    }

    Public Static Function Reg()
    {
        $ids = array();
        foreach((array)func_get_args() as $Object)
            $ids[] = self::Add($Object);
        return $ids;
    }

    Public Static Function UnReg($Ids)
    {
        foreach((array)$Ids as $Id)
            self::Del($Id);
    }

    Public Static Function Draw($DeltaTime)
    {
        foreach(self::$Objects as $Object)
        {
            if($Object->Flags & FLAG_DRAW)
                if($Object->Visible)
                    $Object->Draw();
            /*switch($Object->Type)
            {
                case TYPE_SSPRITE:
                    SSprite_Draw( $Object->Texture->Id, $Object->Position->X, $Object->Position->Y, $Object->Size->X, $Object->Size->Y, $Object->Angle, $Object->Alpha, $Object->FX ); break;
                case TYPE_ASPRITE:
                    ASprite_Draw( $Object->Texture->Id, $Object->Position->X, $Object->Position->Y, $Object->Size->X, $Object->Size->Y, $Object->Angle, $Object->Animation->Frame, $Object->Alpha, $Object->FX ); break;
                case TYPE_PPIXEL:
                    pr2d_Pixel( $Object->Position->X, $Object->Position->Y, $Object->Color, $Object->Alpha ); break;
                case TYPE_PLINE:
                    pr2d_Line( $Object->Position->X, $Object->Position->Y, $Object->Size->X, $Object->Size->Y, $Object->Color, $Object->Alpha, $Object->FX ); break;
                case TYPE_PRECT:
                    pr2d_Rect( $Object->Position->X, $Object->Position->Y, $Object->Size->X, $Object->Size->Y, $Object->Color, $Object->Alpha, $Object->FX ); break;
                case TYPE_PCIRCLE:
                    pr2d_Circle( $Object->Position->X, $Object->Position->Y, $Object->Radius, $Object->Color, $Object->Alpha, $Object->Quality, $Object->FX ); break;
                case TYPE_PELLIPSE:
                    pr2d_Ellipse( $Object->Position->X, $Object->Position->Y, $Object->Radius->X, $Object->Radius->Y, $Object->Color, $Object->Alpha, $Object->Quality, $Object->FX ); break;
            }*/
            if($Object->Flags & FLAG_UPDATE)
                $Object->Update($DeltaTime);
        }
    }
}

stdEvent::Reg( EVENT_DRAW, 'stdDrawing::Draw' );