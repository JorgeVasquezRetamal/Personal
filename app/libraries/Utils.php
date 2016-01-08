<?php
class Utils{
	
	public static function left($str, $lenght){
		return substr($str, 0, $lenght);
	}

	public static function right($str, $lenght){
		return substr($str, -$lenght);
	}

	public static function modelToSelect($rs, $showEmpty = false, $emptyMessage = '-seleccione-', $value = 'id', $name = 'name'){

		$data = array();
		$env = app()->environment();

		if($showEmpty === true)
			$data[''] = $emptyMessage;

		foreach ($rs as $model):
			$encoding = mb_detect_encoding($model->{$name});

			//$data[$model->{$value}] = (($env=='production' and $encoding=='UTF-8') ? utf8_decode($model->{$name}) : $model->{$name}) . $encoding;
			$data[$model->{$value}] = $model->{$name};
		endforeach;

		return $data;
	}

	public static function modelImplode($rs, $sep = ', ', $name = 'name'){
		$string = '';
		foreach ($rs as $model):
			$string .= ($string!='' ? $sep : '') . $model->{$name};
		endforeach;

		return $string;
	}

	public static function date_en_to_es($date){
		if($date=='') return '';

		$format = 'd/m/Y';

		if($date instanceof Datetime)
			return $date->format($format);
		
		return date($format, strtotime($date));
	}

	public static function datetime_en_to_es($date, $showSeconds = false){
		if($date=='') return '';
		
		$format = 'd/m/Y H:i' . (($showSeconds) ? ':s' : '');

		if($date instanceof Datetime)
			return $date->format($format);
		
		return date($format, strtotime($date));
	}

	public static function date_es_to_en($date){
		$format = 'Y-m-d';

		if($date instanceof Datetime)
			return $date->format($format);
		
		return date($format, strtotime(str_replace("/", "-", $date)));
	}

	public static function datetime_es_to_en($date, $showSeconds = false){
		$format = 'Y-m-d H:i:s' . (($showSeconds) ? ':s' : '');

		if($date instanceof Datetime)
			return $date->format($format);
		
		return date($format, strtotime(str_replace("/", "-", $date)));
	}

	public static function time($date, $showSeconds = false){
		$format = 'H:i' . (($showSeconds) ? ':s' : '');

		if($date instanceof Datetime)
			return $date->format($format);

		return date($format, strtotime(str_replace("/", "-", $date)));
	}

	public static function seconds_to_time_format($seconds){
		$hours = intval($seconds / 3600);
		$seconds = $seconds - ($hours * 3600);

		$minutes = intval($seconds / 60);
		$seconds = $seconds - ($minutes * 60);

		$hours = ($hours<9) ? "0".$hours : $hours;
		$minutes = ($minutes<9) ? "0".$minutes : $minutes;
		$seconds = ($seconds<9) ? "0".$seconds : $seconds;

		return "{$hours}:{$minutes}:{$seconds}";
	}


	public static function encodeData($data){
		if(is_array($data)):
			foreach($data as $key => $value):
				$data[$key] = self::encodeData($value);
			endforeach;

			return $data;
		else:
			return utf8_encode($data);
		endif;
	}

	public static function decodeData($data){
		if(is_array($data)):
			foreach($data as $key => $value):
				$data[$key] = self::decodeData($value);
			endforeach;

			return $data;
		else:
			return utf8_decode($data);
		endif;
	}

	public static function iconvDataUTF8($data){
		if(is_array($data)):
			foreach($data as $key => $value):
				$data[$key] = self::iconvDataUTF8($value);
			endforeach;

			return $data;
		else:
			return iconv('ISO-8859-1', 'UTF-8', $data);
		endif;
	}

	public static function iconvDataISO($data){
		if(is_array($data)):
			foreach($data as $key => $value):
				$data[$key] = self::iconvDataISO($value);
			endforeach;

			return $data;
		else:
			return iconv('UTF-8', 'ISO-8859-1', $data);
		endif;
	}

	public static function printvariable($var, $text = null)
	{
		$arrDebug = debug_backtrace();
		$nomFunction = $arrDebug[1]['function'];
		$linFunction = $arrDebug[0]['line'];
		$nomClase = (isset($arrDebug[1]['class']) ? $arrDebug[1]['class'] : null);

		$html = '';

		if(is_array($var) || is_object($var))
		{
			$html .= ('<code>');
				$html .= ('<strong>Class: </strong>' . $nomClase);
				$html .= (' | <strong>Method: </strong>' . $nomFunction);
				$html .= (' | <strong>Line: </strong>' . $linFunction);
				$html .= (' | <strong>Type: </strong>' .gettype($var));
				$html .= (' | <strong>Count: </strong>' .count($var));
				if (!is_null($text)) $html .= (' | <strong>Text: </strong>'. $text);
				$html .= ('<pre style="text-align:left;">' . print_r($var,1) . '</pre>');
			$html .= ('</code>');

		} else {

			$html .= ('<code>');
				$html .= ('<strong>Class: </strong>' . $nomClase);
				$html .= (' | <strong>Method: </strong>' . $nomFunction);
				$html .= (' | <strong>Line: </strong>' . $linFunction);
				$html .= (' | <strong>Type: </strong>' .gettype($var));
				$html .= (' | <strong>Length: </strong>' .strlen($var));
				if (is_bool($var)) $html .= ($var ? ' | <strong>Value: </strong>True' : ' | <strong>Value: </strong>False');
				else
					if (!is_null($text)) $html .= ('<pre style="text-align:left;"><strong>'. $text.'</strong> = ' . $var . '</pre>');
					else $html .= ('<pre style="text-align:left;">'. $var . '</pre>');
			$html .= ('</code>');
		}

		$html .= ('<hr />') ;

		echo $html;
	}

	public static function date_to_spanish($date)
	{
		$months = array('January'=>'Enero', 
						'February'=>'Febrero', 
						'March'=>'Marzo', 
						'April'=>'Abril', 
						'May'=>'Mayo', 
						'June'=>'Junio', 
						'July'=>'Julio', 
						'August'=>'Agosto', 
						'September'=>'Septiembre', 
						'October'=>'Octubre', 
						'November'=>'Noviembre', 
						'December'=>'Diciembre');

		return $months[$date];
	}

}