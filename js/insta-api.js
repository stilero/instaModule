/**
 * @version     $Id$
 * @copyright   Copyright 2011 Stilero AB. All rights re-served.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */
var InstaAPI = new Class({
    Implements : [Options],
    options : {
        apiURI : 'https://api.instagram.com/v1/',
        apiPath : '',
        accessToken : '',
        parameters : ''
    },
    initialize : function(options){
        this.setOptions(options);
    },
    query : function(){
        var paramsAsQueryString='?';
        $each(this.options.parameters, function(val, key){
            paramsAsQueryString += key + '=' + val + '&';
        });
        var queryURI = this.operions.apiURI + this.options.apiPath + parametersAsQueryString;
        var apiQuery = new Request.JSONP({
            url: queryURI,
            method: 'get',
            onSuccess: function(response){
                this.handleResponse(response);
            },
            onFailure: function(response){
                alert('MOD_INSTAGRAM_JS_FAILURE' + response.status);
            }
        }).send();
    },
    handleResponse : function(response){
        if(!$defined(response.data) && $defined(response.code)){
            var errormsg = '(' + response.code + ')' +
                response.error_type + '\n' +
                response.error_message;
                alert(errormsg);
        }else{
            $('instagram-laceholder').set('html', response.data);
            alert('MOD_INSTAGRAM_JS_SUCCESS');
        }
    }
});