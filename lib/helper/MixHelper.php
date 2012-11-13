<?php
/**
* My Helpers
*
* @category Helpers
* @author rich alaba
*/

function set_time($set,$time=''){
	if(!$time){
		$time = time();
	}
	if(is_numeric($time)){
		return strtotime($set,$time);
	}else{
		return strtotime($set,strtotime($time));
	}	
}

/**
	* get File extension without "." and lower the case.
	* 
	* @return <string> 
	*  ex) jpg
	*/ 
function getFileExtension($fileName) {
	return @strtolower(end(explode(".", basename($fileName))));
}

function is_mobile(){
  $mobiles = array("mobile","android");
  $agent = strtolower($_SERVER['HTTP_USER_AGENT']);
  $i = '';

  foreach($mobiles as $mobile) {
   if(strpos($agent, $mobile) !== false) {
    $i += 1;
   }
  }
  if($i >= 1) {
    return true;
  }
}

function get_orientation($file){
  if(is_file($file)){
    $size = getimagesize($file);
    if($size[0] > $size[1]){
      return 'portrait';
    }else{
      return 'landscape';
    }
  }else{
    return 'landscape';
  }
}

function base_url(){
  $protocol = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] != "off") ? "https" : "http";
  return $protocol."://".$_SERVER['HTTP_HOST'].'/';
}

function app_date_format($date){
  return date(sfConfig::get('app_date_format'),strtotime($date));
}

function app_date_format_full($date){
  return date(sfConfig::get('app_date_format_full'),strtotime($date));
}

function mytruncate($string, $length = 80, $etc = '...', $charset='UTF-8',$break_words = false, $middle = false){
    if ($length == 0)
        return '';
 
    if (mb_strlen($string) > $length) {
        $length -= min($length, mb_strlen($etc));
        if (!$break_words && !$middle) {
            $string = preg_replace('/\s+?(\S+)?$/u', '', mb_substr($string, 0, $length+1, $charset));
        }
        if(!$middle) {
            return mb_substr($string, 0, $length, $charset) . $etc;
        } else {
            return mb_substr($string, 0, $length/2, $charset) . $etc . mb_substr($string, -$length/2, (mb_strlen($string)-$length/2), $charset);
        }
    } else {
        return $string;
    }
}

function shorten($text, $limit=20, $end='...') {
	$encoding = mb_detect_encoding($text);
	$len = mb_strlen($text, $encoding);
	$return = '';

	if ($len <= $limit) {
		$return = $text;
	} else {
		$return = mb_substr(strip_tags($text), 0, $limit, $encoding) . $end;
// sfContext::getInstance()->getLogger()->log($len.'-'.$return);
	}
	return $return;
}

function cut($string, $max_length, $roffset=0){
		$ostring = $string;
		if (strlen($string) > $max_length){
			$string = substr($string, 0, $max_length);
			$pos = strrpos($string, " ");
			if($pos === false) {
					return substr( $string, 0, $max_length )."...".substr( $ostring, (strlen($ostring)-$roffset) );
			}
				return substr( $string, 0, $pos )."...".substr( $ostring, (strlen($ostring)-$roffset) );
		}else{
			return $string;
		}
}

function get_ext($filename){
  return trim(strrchr($filename, '.'),'.');
}

function get_url($page){
  if($_SERVER['SERVER_NAME'] == '192.168.1.180'){
    return '/index.php/'.$page;
  }else{
    return $page;
  }
}

function verifyLogin(){
  $user = getSession('user');
  if(!$user){
    $this->redirect('login');
  }
  exit();
}

function find($keyword,$subject){
	if(strrpos($subject,$keyword)===false){
		return false;
	}else{
		return true;
	}
}

// ------------------------------------------------------------------------

function decimal($number){
  if(is_numeric($number)){
    return number_format($number, 2, '.', '');
  }
}

// ------------------------------------------------------------------------

function url_title($val,$sep='-'){
  return str_replace(' ',$sep,strtolower(trim($val)));
}

// ------------------------------------------------------------------------

function unsetSession($var){
  sfContext::getInstance()->getUser()->setAttribute($var,null,'ns_user');
}

// ------------------------------------------------------------------------

function setSession($var,$val){
  if(is_array($val)){
    $data = getSession($var);
    if(is_array($data)){
      $val = array_merge($data,$val);
    }
    sfContext::getInstance()->getUser()->setAttribute($var,$val,'ns_user');
  }else{
    sfContext::getInstance()->getUser()->setAttribute($var,$val,'ns_user');
  }
}

// ------------------------------------------------------------------------

function getSession($var){
  return sfContext::getInstance()->getUser()->getAttribute($var,null,'ns_user');
}

// ------------------------------------------------------------------------

function display($varr, $return=false){
	$find = array(" ","\r\n","\r","\n");
	$replace = array("&nbsp;","<br />\r\n","<br />\r","<br />\n");

	if($varr){
		if(is_array($varr)){
			$data = str_replace($find,$replace,print_r($varr,true));
			if($return){
				return $data;
			}else{
				echo $data;
			}
		}else{
			if($return){
				return $varr;
			}else{
				echo $varr;
			}
		}
	}
}

// ------------------------------------------------------------------------

function md5hash($var, $key=''){
	if(!$key){
		$key = sfConfig::get('app_system_salt');
	}
	return md5(md5($var).$key);
}

// ------------------------------------------------------------------------

function encode($string, $key=''){
	if(!$key){
		$key = sfConfig::get('app_system_salt');
	}else{
    $key = $key.sfConfig::get('app_system_salt');
  }
	$result = '';
	for($i=0; $i<strlen($string); $i++){
		$char = substr($string, $i, 1);
		$keychar = substr($key, ($i % strlen($key))-1, 1);
		$char = chr(ord($char)+ord($keychar));
		$result.=$char;
	}
	return rtrim(strtr(base64_encode($result),'+/', '-_'), '=');
}

// ------------------------------------------------------------------------

function decode($string, $key='') {
	if(!$key){
		$key = sfConfig::get('app_system_salt');
	}else{
    $key = $key.sfConfig::get('app_system_salt');
  }
	$result = '';
	$string = base64_decode(str_pad(strtr($string, '-_', '+/'), strlen($string) % 4, '=', STR_PAD_RIGHT));
	for($i=0; $i<strlen($string); $i++) {
		$char = substr($string, $i, 1);
		$keychar = substr($key, ($i % strlen($key))-1, 1);
		$char = chr(ord($char)-ord($keychar));
		$result.=$char;
	}
	return $result;
}

// ------------------------------------------------------------------------

function now($timestamp='',$date_format=''){
	$format = 'Y-m-d H:i:s';
	if($date_format == 1){
		$format = 'Y-m-d';
	}
	if(empty($timestamp)){
		return date($format,time());
	}else{
		return date($format,$timestamp);
	}
}

// ------------------------------------------------------------------------

function escape($str){
	if(is_array($str)){ 
		foreach($str as $x => $value){
			$var[escape($x)] = escape($value);
		}
		return $var;
	}else{
		$search=array("\\","\0","\n","\r","\x1a","'",'"');
		$replace=array("\\\\","\\0","\\n","\\r","\Z","\'",'\"');
		return str_replace($search,$replace,trim($str));
	}
}

// ------------------------------------------------------------------------

function file_write($title,$body){
	if($fh = fopen($title, 'w')){
		fwrite($fh, $body);
		fclose($fh);
		return 1;
	}else{
		return 0;
	}
}

// ------------------------------------------------------------------------

function numval($varay){
	if(!is_numeric($varay)){
		return 0;
	}else{
		return $varay;
	}
}

// ------------------------------------------------------------------------

function is_email($email){
	return preg_match("/^(?!.{255,})(?!.{65,}@)(?:(?:\"[^\"]{1,62}\")|(?:[a-z0-9!#$%&'*+\/=?^_`{|}~-]+(?:\.[a-z0-9!#$%&'*+\/=?^_`{|}~-]+)*))@(?:(?:\[(?:(?:25[0-5]|2[0-4][0-9]|[01]?[0-9]{1,2})\.){3}(?:25[0-5]|2[0-4][0-9]|[01]?[0-9]{1,2})\])|(?:(?!.*[^.]{64,})(?:(?:xn--)?[a-z0-9]+(?:-[a-z0-9]+)*\.){1,127}(?:xn--)?[a-z0-9]+(?:-[a-z0-9]+)*))$/i", $email);
}


/* danilo here */
function pb_convert_status_code ( $status_id = 0 )
{
  if ($status_id == 0)
    return '承認待ち';
  else if ($status_id == 1)
    return '承認済み';
  else if ($status_id == 2)
    return '削除済み';
  else
    return '';
}

/* TIME HELPERS */
/**
 * Returns a formatted string representation of the given datetime string.
 *
 * @param string $strDatetime Datetime to be formatted.
 * @param string $toFormat
 * @return string h:i if date is current. M j, g:i a if date is in current date. M j, Y otherwise.
 */
function display_datetime($strDatetime, $toFormat = '')
{
  if ('' == $toFormat) {
    $toFormat = 'M j, Y';
    
    $time = strtotime($strDatetime);
    $now = time();
    
    // if current date
    if (date('M j, Y', $now) == date('M j, Y', $time)) {
      $toFormat = 'g:i a';
    }
    // if in current year
    else if (date('Y', $now) == date('Y', $time)) {
      $toFormat = 'M j g:i a';
    }
  }
  
  return date_format(date_create($strDatetime), $toFormat);
}


/* social helper */

// ------------------------------------------------------------------------

function postFb($params = array()) {

  try {
    $fb = new myFacebook(array(
      'appId' => sfConfig::get('app_facebook_app_id'),
      'secret' => sfConfig::get('app_facebook_secret'),
      'cookie' => true
    ));
    $access_token = $fb->getAccessToken();
    $attachment = array(
      'access_token' => $access_token
    );
    if (0 < count($params)) {
      $attachment = $attachment + $params;
    }
    $fb->api('/me/feed', 'POST', $attachment);
  } catch (Exception $e) {
    //
  }
      
}
// ------------------------------------------------------------------------

function postTwitter($message = "" , $image = null ) {
  try {

    $consumer_key = sfConfig::get('app_twitter_key');
    $consumer_secret = sfConfig::get('app_twitter_secret');
    $connection = new TwitterOAuth($consumer_key, $consumer_secret);
    $callback = sfConfig::get('app_twitter_callback');
    $request_token = $connection->getRequestToken($callback);

    $access_token  = $request_token['oauth_token'];
    $access_token_secret = $request_token['oauth_token_secret'];

    $connection2 = new TwitterOAuth($consumer_key, $consumer_secret, $access_token, $access_token_secret);

    $apiUrl = "http://api.twitter.com/1/statuses/update.xml";
    $method = "POST";
    if($image){
      $req = $connection2->OAuthRequest($apiUrl,$method , array("status"=>urlencode($message) , 'media[]' => $image ) );
    }else{
      $req = $connection2->OAuthRequest($apiUrl,$method , array("status"=>urlencode($message) ) );
    }
  } catch (Exception $e) {
    //print_r($e);
  }
      
}