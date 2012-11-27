//jform_params_client_id
window.addEvent('domready', function(){
//    var clientID = $('jform_params_client_id').value;
//    var clientSecret = $('jform_params_client_secret').value;
//    var redirectURI = $('jform_params_redirect_uri').value;
//    var authCode = $('jform_params_auth_code').value;
//    var catcherURI = $('jform_params_helpers_uri').value + 'catcher.php';

    var clientIdInput = $('jform_params_client_id');
    var clientID = clientIdInput.value;
    var clientSecretInput = $('jform_params_client_secret');
    var clientSecret = clientSecretInput.value;
    var redirectURIInput = $('jform_params_redirect_uri');
    var redirectURI = redirectURIInput.value;
    var authCode = $('jform_params_auth_code').value;
    var authCodeInput = $('jform_params_auth_code');
    var accessTokenInput = $('jform_params_access_token');
    var accessToken = accessTokenInput.value;
    //var catcherURI = $('jform_params_helpers_uri').value + 'catcher.php';
    var catcherURI = $('jform_params_redirect_uri').value;
    var authButton = $('jform_params_authorize');

    var sendVars;
        
    var setLinkHref = function(){
        var link = 'https://api.instagram.com/oauth/authorize/' + 
            '?client_id=' + clientID +
            '&redirect_uri=' + catcherURI +
            '&response_type=code';
        $( 'jform_params_authorize').href = link;
    };
    
    var buttonDisplay = function(){
        if(clientID == '' || clientSecret == '' || redirectURI == ''){
            authButton.setStyle( 'display', 'none');
        }else{
             setLinkHref();
             authButton.setStyle( 'opacity', '0');
             authButton.setStyle( 'display', 'block');
             authButton.fade('in');
        }
    };
    
    var handleResponse = function(response){
        if(!$defined(response.access_token)){
            var errormsg = '(' + response.code + ')' +
                response.error_type + '\n' +
                response.error_message;
                alert(errormsg);
        }else{
            accessTokenInput.value = response.access_token;
            authCodeInput.value = '';        
            alert(MOD_INSTAGRAM_JS_SUCCESS);
        }
    };
    
    var requestAccessToken = function(){
        authCode = authCode;
        var reqUrl = $('jform_params_helpers_uri').value + 'authorizer.php';
        sendVars = 'client_id=' + clientID +
            '&client_secret=' + clientSecret +
            '&grant_type=authorization_code' +
            '&code=' + authCode +
            '&redirect_uri=' + redirectURI;
        var myRequest = new Request.JSON({
            url: reqUrl,
            method: 'post',
            data:{'client_id': clientID,
                'client_secret': clientSecret,
                'grant_type': 'authorization_code',
                'code': authCode,
                'redirect_uri': catcherURI
            },
            onSuccess: function(responseText){
                handleResponse(responseText);
            },
            onFailure: function(responseText){
                alert(MOD_INSTAGRAM_JS_FAILURE + responseText.status);
            }
        });
        
        myRequest.send();    
    };
    
    buttonDisplay();

    $('jform_params_client_id').addEvent('keyup', function(){
        clientID = $('jform_params_client_id').value;
        buttonDisplay();
    });
    
    $('jform_params_client_secret').addEvent('keyup', function(){
        clientSecret = $('jform_params_client_secret').value;
        buttonDisplay();
    });
    
    $('jform_params_redirect_uri').addEvent('change', function(){
        redirectURI = $('jform_params_redirect_uri').value;
        setLinkHref();
        buttonDisplay();
    });
    
    $('jform_params_auth_code').addEvent('change', function(){
        authCode = $('jform_params_auth_code').value;
        requestAccessToken();
    });
        
});