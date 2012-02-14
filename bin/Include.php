<?

function requireAll ( $Path = '' )
{
	foreach((array)glob($Path.'/*') as $File)
	{
		if(is_file($File))
		{
			$ext = explode('.', $File);
			$ext = strtolower($ext[ sizeof($ext)-1 ]);
			if($ext == 'php' or $ext == 'inc' or $ext == 'phb')
				require($File);
		}
	}
}

requireAll('../Core');
requireAll('../Utils');
requireAll('../Vectors');
requireAll('../Display');
requireAll('..');