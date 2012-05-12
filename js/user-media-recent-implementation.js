/**
 * @version     $Id$
 * @copyright   Copyright 2011 Stilero AB. All rights re-served.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */
window.addEvent('domready', function(){
    var mediaCall = new UserMediaRecent({
        parameters: {
            'access_token': access_token
        }
    });
});