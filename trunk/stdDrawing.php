<?

/**
 * Класс отрисовки спрайтов
 * @name StandardFramework Drawing
 * @author DENFER
 * @version 1.0.0
 * @copyright DENFER STUDIO
 */

abstract class stdDrawing
{
	protected static $Objects = array();
	
	public static function Reg()
	{
		foreach((array)func_get_args() as $Object)
			self::$Objects[] = $Object;
	}
	
	public static function UnReg($Item)
	{
		unset(self::$Objects[$Item]);
	}
	
	public static function Draw($DeltaTime)
	{
		foreach(self::$Objects as $Object)
		{
			switch($Object->Type)
			{
				case TYPE_SPRITE:
					if($Object->Visible && $Object->Texture->Id > -1)
						SSprite_Draw($Object->Texture->Id, $Object->Position->X, $Object->Position->Y, $Object->Size->X, $Object->Size->Y, $Object->Angle, $Object->Alpha, $Object->FX); break;
			}
			
			if($Object->Flags & FLAG_UPDATE)
				$Object->Update($DeltaTime);
		}
	}
}

stdEvent::Reg( EVENT_DRAW, 'stdDrawing::Draw' );