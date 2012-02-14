<?

function requireAll ( $path = '' )
{
	foreach((array)glob($path.'/*') as $path)
	{
		if(is_dir($path))
			requireAll($path);
		else
		{
			$ext = explode('.', $path);
			$ext = strtolower($ext[ sizeof($ext)-1 ]);
			if($ext == 'php' or $ext == 'inc' or $ext == 'phb')
				require($path);
		}
	}
}

requireAll('../Utils');
requireAll('../Vectors');
requireAll('../Core');