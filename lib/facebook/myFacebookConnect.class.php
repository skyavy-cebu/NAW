<?php

/**
 * 1. Pass in constructor a API KEY, API SECRET KEY, CALLBACK URL
 * 2. Generate a token and pass to getAuthorizeUrl()
 * 3. Redirect user to authorize url
 * 4. In callback URL verify the saved token and $_REQUEST['state']
 * 5. retrive an access token with getAccessToken()
 * 6. use a graph method to retrieve FB profile info using access token
 * 
 * @author Mikhail Menshinskiy
 *
 */
class myFacebookConnect {

	protected $api_key = '';
	protected $api_secret = '';
	protected $redirect_uri = '';

	function __construct($api_key, $api_secret, $callback_url = '') {
		$this->api_key = $api_key;
		$this->api_secret = $api_secret;
		$this->redirect_uri = $callback_url;
	}

	/**
	 * Get access token for the application
	 * 
	 * @param string $redirect_uri
	 */
	function getAccessToken($code) {
		$token_url = "https://graph.facebook.com/oauth/access_token?client_id=" . urlencode($this->api_key) . "&redirect_uri=" . urlencode($this->redirect_uri) . "&client_secret=" . urlencode($this->api_secret) . "&code=" . urlencode($code);

		$ch = curl_init($token_url);
		curl_setopt($ch, CURLOPT_FOLLOWLOCATION, TRUE);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
		curl_setopt($ch, CURLOPT_HEADER, FALSE);
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
		$response = curl_exec($ch);

		$params = NULL;
		parse_str($response, $params);

		if (!isset($params['access_token'])) {
			$response = json_decode($response, TRUE);
			throw new myFacebookException('Error: ' . $response['error']['message']);
		}

		return $params['access_token'];
	}

	/**
	 * Get info using Facebook Graph
	 * 
	 * @param $method
	 * @param $access_token
	 */
	function graph($method = 'me', $access_token = NULL, $fields = array('id', 'first_name', 'last_name', 'email', 'picture', 'link', 'website')) {
		$graph_url = 'https://graph.facebook.com/' . urlencode($method) . '?fields=' . urlencode(implode(',', $fields)) . '&type=large&access_token=' . urlencode($access_token);
		$ch = curl_init($graph_url);
		curl_setopt($ch, CURLOPT_HEADER, FALSE);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
		curl_setopt($ch, CURLOPT_FOLLOWLOCATION, TRUE);
		curl_setopt($ch, CURLOPT_CAINFO, dirname(__FILE__) . '/fb_ca_chain_bundle.crt');

		$c = json_decode(curl_exec($ch), TRUE);
		$info = curl_getinfo($ch);

		if ($info['http_code'] !== 200) {
			if (isset($c['error']['message'])) {
				throw new myFacebookException($c['error']['message']);
			} else {
				throw new myFacebookException('Couldn\'t connect to the facebook server. Http code: ' . $info['http_code']);
			}
		}

		return $c;
	}

	/**
	 * Return URL to authorize an application
	 * 
	 * @param string $callback_url
	 * @param string $state - CSRF token
	 * @param array $scope - default is a 'email','user_website','offline_access'
	 */
	public function getAuthorizeUrl($token, array $scope = array()) {
		//default required permissions for the our aplication
		$default_scope = array('email', 'user_website', 'offline_access', 'status_update', 'publish_actions', 'publish_stream');

		$scope = array_merge($default_scope, $scope);

		return "http://www.facebook.com/dialog/oauth?client_id=" . urlencode($this->api_key) . "&redirect_uri=" . urlencode($this->redirect_uri) . "&state=" . urlencode($token) . '&scope=' . urlencode(implode(',', $scope));
	}

}

class myFacebookException extends Exception {
	
}
