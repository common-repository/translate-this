<?php
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
?>
<?php
	define(ABSPATH,'../../../');
	require_once( ABSPATH . 'wp-config.php' );
	wp_admin_css_color('classic', __('Blue'), admin_url("css/colors-classic.css"), array('#073447', '#21759B', '#EAF3FA', '#BBD8E7'));
	wp_admin_css_color('fresh', __('Gray'), admin_url("css/colors-fresh.css"), array('#464646', '#6D6D6D', '#F1F1F1', '#DFDFDF'));
	wp_enqueue_script( 'common' );
	wp_enqueue_script( 'jquery-color' );
	@header('Content-Type: ' . get_option('html_type') . '; charset=' . get_option('blog_charset'));
	load_plugin_textdomain('translate', '/');
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" <?php do_action('admin_xml_ns'); ?> <?php language_attributes(); ?>>
<head>
	<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php echo get_option('blog_charset'); ?>" />
	<title><?php bloginfo('name') ?> &rsaquo; Translate This! &#8212; <?php _e('WordPress'); ?></title>
	<?php
		wp_enqueue_style( 'global' );
		wp_enqueue_style( 'wp-admin' );
		wp_enqueue_style( 'colors' );
		wp_enqueue_style( 'media' );
	?>
	<script type="text/javascript">
	//<![CDATA[
		function addLoadEvent(func) {if ( typeof wpOnload!='function'){wpOnload=func;}else{ var oldonload=wpOnload;wpOnload=function(){oldonload();func();}}}
	//]]>
	</script>
	<?php
		do_action('admin_print_styles');
		do_action('admin_print_scripts');
	?>
	<script type="text/javascript" src="http://www.google.com/jsapi"></script>
        <script type="text/javascript">
		google.load("language", "1");
		function initialize() {
			var text = parent.tinyMCE.get('content').getContent();
			google.language.detect(text, function(result) {
				if (!result.error && result.language) {
					google.language.translate(text, result.language, "en",
                                    	function(result) {
            					var translated = document.getElementById("translated-text");
            					if (result.translation) {
							tempVar = result.translation;
              						translated.innerHTML = result.translation;
            					}
          				});
        			}
      			});
 		}
		function tnsChangelang(lang) {
			var text = parent.tinyMCE.get('content').getContent();
                        google.language.detect(text, function(result) {
                                if (!result.error && result.language) {
                                        google.language.translate(text, result.language, lang,
                                        function(result) {
                                                var translated = document.getElementById("translated-text");
                                                if (result.translation) {
                                                        tempVar = result.translation;
                                                        translated.innerHTML = result.translation;
                                                }
                                        });
                                }
                        });
		}
    		google.setOnLoadCallback(initialize);
	</script>
	<style>
		th.label {
			text-align:left;
		}
		td.field {
			text-align:right;
		}
		td.field select {
			background-color:#FFFFFF;
			border-color:#8CBDD5;
			font-size:10px;
			height:20px;
			margin:0;
			padding:0;
		}
		select.flagged option {
			background-repeat:no-repeat;
			background-position:left;
			padding-left:20px;
		}
		div#translated-text {
			border:1px solid #8CBDD5;
			background-color:#FFF;
			padding:5px;
			margin-bottom:20px;
		}
		body {
			height:95% !important;
		}
	</style>
</head>
<body id="translate">
<form method="post" action="#" id="translate-form" onsubmit="return false">
	<h3>Translate This</h3>
	<table class="describe" style="width:65%;margin-left:auto;margin-right:auto;">
	<tbody>
	<tr>
		<th valign="top" scope="row" class="label" >
			<label for="tns-lang">Translate To:</label>
			<abbr title="required" class="required">*</abbr>
			<br /><br />
		</th>
		<td class="field">
			<select name="tns-lang" id="tns-lang" onchange="tnsChangelang(this.value)" class="flagged">
				<option value="sq" style="background-image:url(/wp-content/plugins/translate-this/flags/sq.png)">Albanian</option>
				<option value="ar" style="background-image:url(/wp-content/plugins/translate-this/flags/ar.png)">Arabic</option>
				<option value="bg" style="background-image:url(/wp-content/plugins/translate-this/flags/bg.png)">Bulgarian</option>
				<option value="ca" style="background-image:url(/wp-content/plugins/translate-this/flags/ca.png)">Catalan</option>
				<option value="zh-CN" style="background-image:url(/wp-content/plugins/translate-this/flags/zh-CN.png)">Chinese (Simplified)</option>
				<option value="zh-TW" style="background-image:url(/wp-content/plugins/translate-this/flags/zh-TW.png)">Chinese (Traditional)</option>
				<option value="hr" style="background-image:url(/wp-content/plugins/translate-this/flags/hr.png)">Croatian</option>
				<option value="cs" style="background-image:url(/wp-content/plugins/translate-this/flags/cs.png)">Czech</option>
				<option value="da" style="background-image:url(/wp-content/plugins/translate-this/flags/da.png)">Danish</option>
				<option value="nl" style="background-image:url(/wp-content/plugins/translate-this/flags/nl.png)">Dutch</option>
				<option selected="" value="en" style="background-image:url(/wp-content/plugins/translate-this/flags/en.png)">English</option>
				<option value="et" style="background-image:url(/wp-content/plugins/translate-this/flags/et.png)">Estonian</option>
				<option value="tl" style="background-image:url(/wp-content/plugins/translate-this/flags/tl.png)">Filipino</option>
				<option value="fi" style="background-image:url(/wp-content/plugins/translate-this/flags/fi.png)">Finnish</option>
				<option value="fr" style="background-image:url(/wp-content/plugins/translate-this/flags/fr.png)">French</option>
				<option value="gl" style="background-image:url(/wp-content/plugins/translate-this/flags/gl.png)">Galician</option>
				<option value="de" style="background-image:url(/wp-content/plugins/translate-this/flags/de.png)">German</option>
				<option value="el" style="background-image:url(/wp-content/plugins/translate-this/flags/el.png)">Greek</option>
				<option value="iw" style="background-image:url(/wp-content/plugins/translate-this/flags/iw.png)">Hebrew</option>
				<option value="hi" style="background-image:url(/wp-content/plugins/translate-this/flags/hi.png)">Hindi</option>
				<option value="hu" style="background-image:url(/wp-content/plugins/translate-this/flags/hu.png)">Hungarian</option>
				<option value="id" style="background-image:url(/wp-content/plugins/translate-this/flags/id.png)">Indonesian</option>
				<option value="it" style="background-image:url(/wp-content/plugins/translate-this/flags/it.png)">Italian</option>
				<option value="ja" style="background-image:url(/wp-content/plugins/translate-this/flags/ja.png)">Japanese</option>
				<option value="ko" style="background-image:url(/wp-content/plugins/translate-this/flags/ko.png)">Korean</option>
				<option value="lv" style="background-image:url(/wp-content/plugins/translate-this/flags/lv.png)">Latvian</option>
				<option value="lt" style="background-image:url(/wp-content/plugins/translate-this/flags/lt.png)">Lithuanian</option>
				<option value="mt" style="background-image:url(/wp-content/plugins/translate-this/flags/mt.png)">Maltese</option>
				<option value="no" style="background-image:url(/wp-content/plugins/translate-this/flags/no.png)">Norwegian</option>
				<option value="pl" style="background-image:url(/wp-content/plugins/translate-this/flags/pl.png)">Polish</option>
				<option value="pt" style="background-image:url(/wp-content/plugins/translate-this/flags/pt.png)">Portuguese</option>
				<option value="ro" style="background-image:url(/wp-content/plugins/translate-this/flags/ro.png)">Romanian</option>
				<option value="ru" style="background-image:url(/wp-content/plugins/translate-this/flags/ru.png)">Russian</option>
				<option value="sr" style="background-image:url(/wp-content/plugins/translate-this/flags/sr.png)">Serbian</option>
				<option value="sk" style="background-image:url(/wp-content/plugins/translate-this/flags/sk.png)">Slovak</option>
				<option value="sl" style="background-image:url(/wp-content/plugins/translate-this/flags/sl.png)">Slovenian</option>
				<option value="es" style="background-image:url(/wp-content/plugins/translate-this/flags/es.png)">Spanish</option>
				<option value="sv" style="background-image:url(/wp-content/plugins/translate-this/flags/sv.png)">Swedish</option>
				<option value="th" style="background-image:url(/wp-content/plugins/translate-this/flags/th.png)">Thai</option>
				<option value="tr" style="background-image:url(/wp-content/plugins/translate-this/flags/tr.png)">Turkish</option>
				<option value="uk" style="background-image:url(/wp-content/plugins/translate-this/flags/uk.png)">Ukrainian</option>
				<option value="vi" style="background-image:url(/wp-content/plugins/translate-this/flags/vi.png)">Vietnamese</option>
			</select><br /><br />
		</td> 
	</tr>
	<tr>
		<td colspan="2" style="padding:5px;text-align:right;">
			<input id="tns-cancel" class="button-primary" type="submit" value="Cancel" accesskey="p" tabindex="5" name="Cancel" onclick="parent.tb_remove()" />
			<input id="tns-send" class="button-primary" type="submit" value="Send & close" accesskey="p" tabindex="5" name="Send & Close"/ onclick="parent.tinyMCE.get('content').setContent(tempVar);parent.tb_remove()" />
			<br/><br/>
		</td>
	</tr>
	<tr>
		<th valign="top" scope="row" class="label" colspan="2">Translated Text Preview</th> 
	</tr>
		<td colspan="2">
			<div id="translated-text"></div>
		</td>
        </tr>
	<tr>
		<td colspan="2" style="padding:5px;text-align:right;">
                        <input id="tns-cancel" class="button-primary" type="submit" value="Cancel" accesskey="p" tabindex="5" name="Cancel" onclick="parent.tb_remove()" />
			<input id="Send & Close" class="button-primary" type="submit" value="Send & close" accesskey="p" tabindex="5" name="Send & Close"/ onclick="parent.tinyMCE.get('content').setContent(tempVar);parent.tb_remove()" />
		</td>
	</tr>
	</table>
	</form>
</body>
</html>
