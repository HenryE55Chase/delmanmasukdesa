<?php
function ambil_gambar($kw) {
	$query = urlencode($kw);

	$cache_filename = dirname(__FILE__) . "/cache/".md5($kw).".json";
	if (file_exists($cache_filename)) {
		$json = file_get_contents($cache_filename);
		$array = json_decode($json, true);
		return $array;
	}
	else {
		require_once ("simple_html_dom.php");
		$url = 'https://images.search.yahoo.com/search/images?p='.$query.'&imgsz=large';
		$fetch = eksekusi($url);
		$grab = new simple_html_dom();
		$grab->load($fetch);
		$gambar = $grab->find('li[class=ld]');
		if (!empty($gambar)) {
			$hasil = array();
			for($i = 0; $i < count($gambar); $i++) {
				$gbr_url = explode('"iurl":"', $gambar[$i]);
				$gbr_url2 = explode('"', $gbr_url[1]);
				$jdl_gbr = explode('"alt":"', $gambar[$i]);
				$jdl_gbr2 = explode('"', $jdl_gbr[1]);
				$thumb = explode("src='", $gambar[$i]);
				$thumb2 = explode("'", $thumb[1]);
				$link = stripslashes($gbr_url2[0]);
				//if(exists($link)) {
					$hasil[] = array(
					'judul' => bersihin($jdl_gbr2[0]),
					'link' => $link,
					'thumb' => $thumb2[0]);
				//}
			}
			$content = json_encode($hasil, true);
			buat_json($content, $cache_filename);
			$array = json_decode($content, true);
			return $array;
		}
		else {
			return false;
		}
		$grab->clear();
		unset($grab);
	}
}
function exists($url) {
	if(!getimagesize($url)){
		return FALSE;
	}
	else {
		return TRUE;
	}
/*
	$headers = get_headers($url)[0];
	$status = substr($headers, 9, 3 );
	if($statusCode != 200 ) {
		return false;
	}
	else {
        	return true;
	}
*/
}