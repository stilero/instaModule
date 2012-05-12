/**
 * @version     $Id$
 * @copyright   Copyright 2011 Stilero AB. All rights re-served.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */
var UserMediaRecent = new Class({
    Extends: InstaAPI,
    options: {
        apiPath : 'users/self/'
    },
    initialize : function(options, parameters){
        this.parent(options);
        this.parent(parameters);
    }
});