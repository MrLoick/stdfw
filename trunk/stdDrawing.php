<?

/**
 * @name StandardFramework Drawing
 * @author DENFER
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
            IF($Object->Flags & FLAG_DRAW)
                IF($Object->Visible)
                    $Object->Draw($DeltaTime);
            IF($Object->Flags & FLAG_UPDATE)
                $Object->Update($DeltaTime);
        }
    }
}

stdEvent::Reg( EVENT_DRAW, 'stdDrawing::Draw' );