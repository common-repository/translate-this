<?php

/*
Plugin Name: Translate This
Plugin URI: http://blog.andreaolivato.net/software/translate-this-wordpress-plugin
Description: <strong>Translate text as you type</strong>! If you don't know how to use this, please take a look at the <a href="http://docs.andreaolivato.net/translate-this-usage-guide">instructions</a>. This plugins uses Google Language APIs to translate your text directly while you create your posts/page. Just click on the icon and the script will translate your entire post!
Version: 9.03.12
Author: Andrea Olivato
Author URI: http://blog.andreaolivato.net/
*/

/*
    Translate This - Wordpress Plugin
    Copyright (C) 2009 Andrea Olivato

    This program is free software: you can redistribute it and/or modify
    it under the terms of the GNU General Public License as published by
    the Free Software Foundation, either version 3 of the License, or
    (at your option) any later version.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with this program. If not, see <http://www.gnu.org/licenses/>.
*/

function wp_tns_add_media_button() {
	echo '<a 
		href="'.get_bloginfo('wpurl').'/wp-content/plugins/translate-this/translate-form.php?TB_iframe=true&amp;height=500&amp;width=640" 
		class="thickbox" 
		title="'.__('Translate This','wp-translate').'"
		id="translate-this-flag"
		><img 
			src="'.get_bloginfo('wpurl').'/wp-content/plugins/translate-this/media-button-translate.gif" 
			alt="'.__('Translate This','wp-translate').'" 
		></a>
		<script>
			function addEvent(obj,type,fn) {

				if (obj.addEventListener) {
					obj.addEventListener(type,fn,false);
					return true;
				} else if (obj.attachEvent) {
					obj[\'e\'+type+fn] = fn;
					obj[type+fn] = function() { obj[\'e\'+type+fn]( window.event );}
					var r = obj.attachEvent(\'on\'+type, obj[type+fn]);
					return r;
				} else {
					obj[\'on\'+type] = fn;
					return true;
				}

			}

			function hideTranslate(){
				$("translate-this-flag").style.display="none";
			}
			function showTranslate(){
                                $("translate-this-flag").style.display="inline";
                        }

			addEvent($("edButtonHTML"),"click",hideTranslate);
			addEvent($("edButtonPreview"),"click",showTranslate);

		</script>
		';
}

add_action('media_buttons', 'wp_tns_add_media_button', 20);

?>
