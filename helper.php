<?php
/**
 * @version		$Id: helper.php 96 2011-08-11 06:59:32Z michel $
 * @copyright	Copyright (C) 2012 Open Source Matters, Inc. All rights reserved.
 * @license		http://www.gnu.org/licenses/gpl-2.0.html GNU/GPL
 */

// no direct access
defined('_JEXEC') or die('Restricted access');
JLoader::register( 'instaClass', dirname(__FILE__).DS.'instaClass.php');

class jInstaClass extends instaClass{
    public function __construct($clientId, $clientSecret, $authCode = '', $accessToken = '', $config = '') {
        parent::__construct($clientId, $clientSecret, $authCode, $accessToken, $config);
    }
    
    public function authenticate(){
        $authURL = $this->config['authURL'].
                '?client_id=' . $this->clientId.
                '&redirect_uri='.$this->config['redirectURI'].
                '&response_type=code';
        $app = JFactory::getApplication();
        $app->redirect( $authURL );
        return;
    }
}

class modInstagramHelper{
    static public function getItem($params) {
        $css_class = $params->get('classname');
        return "";
    }

    static public function connectToInstagram($params){
        $clientID = $params->get('client_id');
        $clientSecret = $params->get('client_secret');
        $authCode = $params->get('auth_code');
        $accessToken = $params->get('access_token');
        $redirec_uri = $params->get('redirect_uri');
        $config = array(
            'redirectURI'   =>  $redirec_uri
        );
        $instagram = new jInstaClass($clientID, $clientSecret,'','',$config);
        if($accessToken == ''){
            if($authCode == ''){
                $instagram->authenticate();
            }else{
                $response = $instagram->requestAccessToken($authCode);
                $ResponseJSON = json_decode($response);
                print $accessToken = $ResponseJSON->access_token;exit;
            }
        }
        $instagram = new jInstaClass($clientID, $clientSecret,$authCode,$accessToken,$config);
        return $instagram;
    }
}