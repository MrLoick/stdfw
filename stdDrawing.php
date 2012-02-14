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
	
	public static function Reg($Object)
	{
		array_push(self::$Objects,$Object);
	}
	
	public static function UnReg($Item)
	{
		unset(self::$Objects[$Item]);
	}
	
	public static function Draw($DeltaTime)
	{
		foreach(self::$Objects as $Object)
		{
			SSprite_Draw($Object->Texture->Texture, $Object->Position->X, $Object->Position->Y, $Object->Size->X, $Object->Size->Y, $Object->Angle, $Object->Alpha, $Object->FX);
		}
	}
	
	public static function Update($DeltaTime)
	{
		
	}
}

stdEvent::Reg( EVENT_DRAW, 'stdDrawing::Draw' );
stdEvent::Reg( EVENT_UPDATE, 'stdDrawing::Update' );