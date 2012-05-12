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
    
    static public function isSettingsEntered($params){
        $id = $params->get('client_id');
        $secr = $params->get('client_secret');
        $tok = $params->get('access_token');
        $uri = $params->get('redirect_uri');
        if($id=='' || $secr=='' || $tok=='' ||$uri==''){
            return false;
        }
        return true;
    }
    
    static public function getInstagramObject($params){
        if(!self::isSettingsEntered($params)){
            JError::RaiseNotice('0', JText::_('MOD_INSTAGRAM_ERROR_MISS_SETTINGS'));
        }
        $clientID = $params->get('client_id');
        $clientSecret = $params->get('client_secret');
        $accessToken = $params->get('access_token');
        $redirec_uri = $params->get('redirect_uri');
        $config = array(
            'redirectURI'   =>  $redirec_uri
        );
        $instagram = new jInstaClass($clientID, $clientSecret,'',$accessToken ,$config);
        return $instagram;
    }
    
    static public function getAuthorizeURL(){
        $params = &JComponentHelper::getParams( 'mod_instagram' );
        var_dump($params);exit;
        $myvariable=$params->get('client_id');
        var_dump($myvariable);exit;
        $app = JFactory::getApplication();
        $mycom_params =  & $app->getParams('mod_instagram');
        var_dump($mycom_params);exit;
        $module =& JModuleHelper::getModule('instagram');
        $params = new JForm($module->params);
        $params->loadString($module->params); 
        print $clientID = $params->get('client_id');exit;
        $clientSecret = $params->get('client_secret');
        $authCode = $params->get('auth_code');
        $accessToken = $params->get('access_token');
        $redirec_uri = $params->get('redirect_uri');
        $config = array(
            'redirectURI'   =>  $redirec_uri
        );
        $instagram = new jInstaClass($clientID, $clientSecret,'','',$config);
        return $instagram->authURL();
    }
}