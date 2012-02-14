<?

/**
 * @name StandardFramework
 * @author DENFER
 * @version 1.0.0
 * @copyright DENFER STUDIO
 */

/**
 * ����������� �������� ����� ����������
 *
 * @param string $Path ���� � ����� �������� �����
 * @return bool ��������� �����������
 *
 */

function stdIncludeSource ( $Path = '' )
{
	$Source = array("stdCore.php");
	try
	{
		foreach($Source as $File)
			if(is_file($Path.$File))
				include $Path.$File;
			elseif(is_dir($Path.$File))
				foreach((array)glob($Path.$File.'/*') as $File)
					include $Path.$File;
		return true;
	}catch ( Exception $e ){}
	return false;
}

?>