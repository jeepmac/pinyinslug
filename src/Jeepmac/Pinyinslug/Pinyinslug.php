<?php namespace Jeepmac\Pinyinslug;

use Jeepmac\Pinyinslug\Lib\Pinyin;
use Jeepmac\Pinyinslug\Lib\AccessTokenAuthentication;
use Jeepmac\Pinyinslug\Lib\HTTPTranslator;
use Config;


class Pinyinslug {

	function ats_pinyin($slug) {
		
		$engine = Config::get('pinyinslug::engine');
		if ($engine == 'pinyin') {
			$pinyinObj = new Pinyin();

			$slug_after = $pinyinObj->stringToPinyin($slug);
			$slug_end = preg_replace('/-$/', '', preg_replace('/[^a-z0-9-]/i', '', $slug_after));
			return $slug_end;
		} else {
			try {
			    //Client ID of the application.
			    $clientID       = Config::get('pinyinslug::clientID');
			    //Client Secret key of the application.
			    $clientSecret = Config::get('pinyinslug::clientSecret');
			    //OAuth Url.
			    $authUrl      = "https://datamarket.accesscontrol.windows.net/v2/OAuth2-13/";
			    //Application Scope Url
			    $scopeUrl     = "http://api.microsofttranslator.com";
			    //Application grant type
			    $grantType    = "client_credentials";

			    //Create the AccessTokenAuthentication object.
			    $authObj      = new AccessTokenAuthentication();
			    //Get the Access token.
			    $accessToken  = $authObj->getTokens($grantType, $scopeUrl, $clientID, $clientSecret, $authUrl);
			    //Create the authorization Header string.
			    $authHeader = "Authorization: Bearer ". $accessToken;

			    //Set the params.//
			    $fromLanguage = "zh-CHS";
			    $toLanguage   = "en";
			    $inputStr     = $slug;
			    $contentType  = 'text/plain';
			    $category     = 'general';
			    
			    $params = "text=".urlencode($inputStr)."&to=".$toLanguage."&from=".$fromLanguage;
			    $translateUrl = "http://api.microsofttranslator.com/v2/Http.svc/Translate?$params";
			    
			    //Create the Translator Object.
			    $translatorObj = new HTTPTranslator();
			    
			    //Get the curlResponse.
			    $curlResponse = $translatorObj->curlRequest($translateUrl, $authHeader);
			    
			    //Interprets a string of XML into an object.
			    $xmlObj = simplexml_load_string($curlResponse);
			    foreach((array)$xmlObj[0] as $val){
			        $translatedStr = $val;
			    }
			    // echo "<table border=2px>";
			    // echo "<tr>";
			    // echo "<td><b>From $fromLanguage</b></td><td><b>To $toLanguage</b></td>";
			    // echo "</tr>";
			    // echo "<tr><td>".$inputStr."</td><td>".$translatedStr."</td></tr>";
			    // echo "</table>";
			    return $translatedStr;
			} catch (Exception $e) {
			    echo "Exception: " . $e->getMessage() . PHP_EOL;
			}
		}
		
	}

}