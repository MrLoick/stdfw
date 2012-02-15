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
	
	public static function Add($Object)
	{
		self::$Objects[] = $Object;
		return sizeof( self::$Objects ) - 1;
	}
	
	public static function Del($Id)
	{
		unset(self::$Objects[$Id]);
	}
	
	public static function Reg()
	{
		$ids = array();
		foreach((array)func_get_args() as $Object)
			$ids[] = self::Add($Object);
		return $ids;
	}
	
	public static function UnReg($Ids)
	{
		foreach((array)$Ids as $Id)
			self::Del($Id);
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