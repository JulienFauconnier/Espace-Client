<?php

/*
 * @desc sellsy Connect, offer stuff to use the api. Singleton class
 */
class sellsyConnect {
	
	/*
	 * the api urls
	 */

	private static $api_url			= "https://apifeed.sellsy.com/0/";
	private static $req_token_url	= "https://apifeed.sellsy.com/0/request_token";
	private static $acc_token_url	= "https://apifeed.sellsy.com/0/access_token";

	/*
	 * enabling oauth debug mode
	 */
	private static $debug = true;
	
	/*
	 * your consumer token/secret (consumer is your application)
	 */
	private static $consumer_key = 'c6766edc712babd80519b1b0535a2d63d641294d';
	private static $consumer_Secret = '1653d3d19abcbdb2e36a7122c99b8dfe278e8167';	
	/*
	 * singleton stuff
	 */
	private static $instance;
	private static $oauth_client;

	/**
	 * @desc load new oauth instance
	 */
	private function __construct() {
		$oauth_client = new Oauth(self::$consumer_key, self::$consumer_Secret, PLAINTEXT, OAUTH_AUTH_TYPE_FORM);
		if (self::$debug){ $oauth_client->enableDebug(); }
		self::$oauth_client = $oauth_client;
	}
	
	/**
	 * @desc singleton
	 * @return type 
	 */
	public static function load() {
		if (!isset(self::$instance)) {
			$c = __CLASS__;
			self::$instance = new $c;
		}
		return self::$instance;
    }
	
	/**
	 * @desc check for token in storage or redirect to the loggin page
	 * @return type 
	 */
	public function checkApi() {
		
		if (!isset($_REQUEST['oauth_token']) && !sellsyTools::storageGet('step')) { 
			sellsyTools::storageSet('step', 'getRequestToken');
		}
		
		try {	 
		
			if (sellsyTools::storageGet('step') == "getRequestToken"){	
				$oauth_datas = self::$oauth_client->getRequestToken(self::$req_token_url."?oauth_callback=http://www.google.com");
				sellsyTools::storageSet('oauth_token_secret', $oauth_datas['oauth_token_secret']);
				sellsyTools::storageSet('step', 'getAccessToken');
				header('Location: '.$oauth_datas['authentification_url']."?oauth_token=".$oauth_datas['oauth_token']);
				exit;
			}
			
			if (sellsyTools::storageGet('step') == "getAccessToken"){
				self::$oauth_client->setToken($_REQUEST['oauth_token'], sellsyTools::storageGet('oauth_token_secret'));
				$oauth_datas = self::$oauth_client->getAccessToken(self::$acc_token_url, null, $_REQUEST['oauth_verifier']);
				sellsyTools::storageSet('oauth_token', $oauth_datas['oauth_token']);
				sellsyTools::storageSet('oauth_token_secret', $oauth_datas['oauth_token_secret']);
				sellsyTools::storageSet('step', 'accessApi');
			}

			if (!sellsyTools::storageGet('step')) {
				sellsyTools::storageSet('step', 'getRequestToken');
				header('Location : index.php');
			}

		} catch(OAuthException $E){
			sellsyTools::storageSet('step', 'getRequestToken');
			sellsyTools::storageSet('oauth_error', self::$oauth_client->getLastResponse());
		}
	}
	
	/**
	 * @desc request the api
	 * @param type $requestSettings
	 * @return type 
	 */
	public function requestApi($requestSettings, $showJSON=false) {
		
		try {
			if (sellsyTools::storageGet('step') == 'accessApi'){
				self::$oauth_client->setToken(
						sellsyTools::storageGet('oauth_token'), 
						sellsyTools::storageGet('oauth_token_secret'));
				self::$oauth_client->fetch(
						self::$api_url, array( 
							'request' => 1, 
							'io_mode' =>  'json', 
							'do_in' => json_encode($requestSettings)), 
							OAUTH_HTTP_METHOD_POST
						);
				
				$back = json_decode(self::$oauth_client->getLastResponse());
				if ($showJSON){
					self::debug(self::$oauth_client->getLastResponse()); exit;
				}
				if ($back->status == 'error'){
					sellsyTools::storageSet('process_error', $back->error);
				} 
				return $back;
			}
		} catch(OAuthException $E){
			sellsyTools::storageSet('step', 'getRequestToken');
			sellsyTools::storageSet('oauth_error', self::$oauth_client->getLastResponse());
		}
		
	}
	
	/**
	 * @desc logout the current user
	 */
	public function logout(){
		sellsyTools::storageReset();
		$this->checkApi();
		header('Location: index.php');
	}
	
	/**
	 * @desc get the api infos
	 */
	public function getInfos(){
			$requestSettings = array(
			'method' => 'Infos.getInfos',
			'params' => array(),
		);
		return $this->requestApi($requestSettings);
	}
		
	/**
	 * @desc gift, debug function.
	 * @param type $value
	 * @param type $message 
	 */
	public static function debug($value=NULL, $message=null) {

		$trace = debug_backtrace();
		$fichier = basename($trace[0]["file"]);
		$ligne = $trace[0]["line"];
		$print_trace = create_function('$trace','
		  unset($trace[0]);
		  $disp = null;
		  if (count($trace) > 0) {
			 $disp = "<ul class=\"caller\">";
			 foreach ($trace as $entry) {
				$disp .= "<li class=\"caller\">Call : <b>";
				if (isset($entry["class"])) {
				   $disp .= $entry["class"] . "::" . $entry["function"];
				} else {
				   $disp .= $entry["function"];
				}
				$disp .= "()</b>";
				if (isset($entry["file"])) {
				   $disp .= "<br>Into : <i>";
				   $disp .= $entry["file"];
				   $disp .= " on line " . $entry["line"];
				   $disp .= "</i>";
				}
				$disp .= "</li>";
			 }
			 $disp .= "</ul>";
		  }
		  return $disp;
		');

		$intro = '<div class="file">Into : ' . $fichier . " on line " . $ligne . "</div>";

		$disp = ''
			. PHP_EOL . '<style>'
			. PHP_EOL . 'div.Debug {text-align:left; }'
			. PHP_EOL . 'div.Debug pre {padding:10px; color:#333333; background-color:#DDDDDD; font-family: mono; font-size: 9pt; line-height:10pt;}'
			. PHP_EOL . 'div.Debug .file {color:#060606; font-style:italic; padding-bottom:5px;}'
			. PHP_EOL . 'div.Debug .message {color:#006600;}'
			. PHP_EOL . 'div.Debug .stabilo {background-color:yellow; padding-left:3px; padding-right:3px;}'
			. PHP_EOL . 'div.Debug .caller {color:#C0222A; list-style:square; margin:5px; line-height:9pt;}'
			. PHP_EOL . 'div.Debug pre strong em {color:#993300;}'
			. PHP_EOL . '/* fin styles pour Debug */'
			. PHP_EOL . '</style>'
			. PHP_EOL;

		$disp .= PHP_EOL . PHP_EOL . '<!-- START DEBUG -->' . PHP_EOL . '<div class="Debug">' . PHP_EOL . '<pre>' . PHP_EOL;

		if (is_object($value)) {
			$disp .= $intro . '<span class="message">' . $message . '</span> => ';
			$disp .= print_r($value, true);
			$disp .= $print_trace($trace);
		} elseif (is_array($value)) {
			$disp .= $intro . '<span class="message">' . $message . '</span> => ';
			$disp .= print_r($value, true);
			$disp .= $print_trace($trace);
		} elseif (is_bool($value)){
			$disp .= $intro . '<span class="message">' . $message . '</span> => ' . ucfirst(gettype($value)) . PHP_EOL;
			if ($value) {
				$value = 'True'.PHP_EOL;
			} else{
				$value = 'False'.PHP_EOL;
			}
			$disp .= '{' . PHP_EOL . '    [] => ' . $value . '}' . PHP_EOL;
			$disp .= $print_trace($trace);
		} elseif (is_null($value)){
			$disp .= $intro . '<span class="stabilo">' . $message . '</span>';
			$disp .= $print_trace($trace);
		} elseif (is_string($value) && is_file($value)) {
			$disp .= $intro . '<span class="message">' . $message . '</span> => File' . PHP_EOL;
			$disp .= '{' . PHP_EOL . '    [] => ' . $value . PHP_EOL . '}' . PHP_EOL;
		} else {
			$disp .= $intro . '<span class="message">' . $message . '</span> => ' . ucfirst(gettype($value)) . PHP_EOL;
			$disp .= '{' . PHP_EOL . '    [] => ' . $value . PHP_EOL . '}' . PHP_EOL;
			$disp .= $print_trace($trace);
		}
		$disp .= '</pre>' . PHP_EOL . '</div>' . PHP_EOL . '<!-- END DEBUG -->' . PHP_EOL . PHP_EOL;
		echo $disp;

	}
	
}

?>