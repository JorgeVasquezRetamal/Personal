<?php
class Asset{
	
	public static function add($url, $attributes = array()){

		if(Str::endsWith($url, '.js')):
			$url .= '?v='  . rand(0, 999);
			$asset = \HTML::script($url, $attributes);
			$nscript = array('url'=>$url, 'html'=>$asset);

			$am = Session::get('asset_manager_js', array());

			foreach ($am as $script):
				if($url == $script['url'])
					return false;
			endforeach;

			$am[] = $nscript;

			Session::put('asset_manager_js', $am);

		elseif(Str::endsWith($url, '.css')):
			$url .= '?v=' . rand(0, 999);

			$asset = \HTML::style($url, $attributes);
			$nstyle = array('url'=>$url, 'html'=>$asset);

			$am = Session::get('asset_manager_css', array());

			foreach ($am as $style):
				if($url == $style['url'])
					return false;
			endforeach;

			$am[] = $nstyle;

			Session::put('asset_manager_css', $am);
			return true;

		endif;

	}

	public static function styles(){

		$am = \Session::get('asset_manager_css', array());
		$html = '';
		if(is_array($am)):
			foreach($am as $url => $style):
				$html .= $style['html'];
			endforeach;
		endif;

		return $html;
	}

	public static function scripts(){

		$am = \Session::get('asset_manager_js', array());
		$html = '';
		if(is_array($am)):
			foreach($am as $url => $script):
				$html .= $script['html'];
			endforeach;
		endif;

		return $html;
	}


}