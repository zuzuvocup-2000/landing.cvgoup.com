<?php
//trả về: chuỗi bị cắt từ 0 tới kí tự thứ n
//đầu vào: $str chuỗi bị cắt, $n cắt bn kí tự
if(!function_exists('cutnchar')){
	function cutnchar($str = NULL, $n = 320){
		if(strlen($str) < $n) return $str;
		$html = substr($str, 0, $n);
		$html = substr($html, 0, strrpos($html,' '));
		return $html.'...';
	}
}

if (! function_exists('pre')){
	function pre($param, $flag = true){
		echo '<pre>';
		print_r($param);
		if($flag == true){
			die();
		}

	}
}

// tạo thông báo
if(!function_exists('show_flashdata')){
	function show_flashdata($body = TRUE){;
		$result = [];
		$session = session();
		$message = $session->getFlashdata('message-success');
		$result['message'] = $message;
		if(isset($message)){
			$result['flag'] = 0;
			return $result;
		}
		$message = $session->getFlashdata('message-danger');
		$result['message'] = $message;
		if(isset($message)){
			$result['flag'] = 1;
		}

		return $result;
	}
}

if (! function_exists('currentTime')){
	function currentTime(){
		return gmdate('Y-m-d H:i:s', time() + 7*3600);
	}
}

if (! function_exists('convert_array')){
	function convert_array($param){
		$array[0] = 'Chọn '.$param['text'].'';
		if(isset($param['data']) && is_array($param['data']) && count($param['data'])){
			foreach($param['data'] as $key => $val){
				$array[$val[$param['field']]] = $val[$param['value']];
			}
		}

		return $array;
	}
}

if(!function_exists('removeutf8')){
	function removeutf8($value = NULL){
		$chars = array(
			'a'	=>	array('ấ','ầ','ẩ','ẫ','ậ','Ấ','Ầ','Ẩ','Ẫ','Ậ','ắ','ằ','ẳ','ẵ','ặ','Ắ','Ằ','Ẳ','Ẵ','Ặ','á','à','ả','ã','ạ','â','ă','Á','À','Ả','Ã','Ạ','Â','Ă'),
			'e' =>	array('ế','ề','ể','ễ','ệ','Ế','Ề','Ể','Ễ','Ệ','é','è','ẻ','ẽ','ẹ','ê','É','È','Ẻ','Ẽ','Ẹ','Ê'),
			'i'	=>	array('í','ì','ỉ','ĩ','ị','Í','Ì','Ỉ','Ĩ','Ị'),
			'o'	=>	array('ố','ồ','ổ','ỗ','ộ','Ố','Ồ','Ổ','Ô','Ộ','ớ','ờ','ở','ỡ','ợ','Ớ','Ờ','Ở','Ỡ','Ợ','ó','ò','ỏ','õ','ọ','ô','ơ','Ó','Ò','Ỏ','Õ','Ọ','Ô','Ơ'),
			'u'	=>	array('ứ','ừ','ử','ữ','ự','Ứ','Ừ','Ử','Ữ','Ự','ú','ù','ủ','ũ','ụ','ư','Ú','Ù','Ủ','Ũ','Ụ','Ư'),
			'y'	=>	array('ý','ỳ','ỷ','ỹ','ỵ','Ý','Ỳ','Ỷ','Ỹ','Ỵ'),
			'd'	=>	array('đ','Đ'),
		);
		foreach ($chars as $key => $arr)
			foreach ($arr as $val)
				$value = str_replace($val, $key, $value);
		return $value;
	}
}

if(!function_exists('slug')){
	function slug($value = NULL){
		$value = removeutf8($value);
		$value = str_replace('-', ' ', trim($value));
		$value = preg_replace('/[^a-z0-9-]+/i', ' ', $value);
		$value = trim(preg_replace('/\s\s+/', ' ', $value));
		return strtolower(str_replace(' ', '-', trim($value)));
	}
}
?>
