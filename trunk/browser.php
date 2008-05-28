<?php session_start(); ?>
<?php include('config.php'); ?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html>
<head>
<title>WebAnywhere Browser Frame</title>
<script type="text/javascript">
/* <![CDATA[ */

// Global variables used by WebAnywhere.
var hasConsole = (typeof console != 'undefined' && typeof console.log != 'undefined');
top.webanywhere_domain='<?php echo $webanywhere_domain; ?>';
top.webanywhere_location = String(document.location).replace(/^(https?:\/\/[^\/]*)\/.*$/, '$1');
top.webanywhere_url=top.webanywhere_location+'<?php echo $root_path; ?>';

top.sound_url_base='<?php echo $sound_url_base; ?>';
top.web_proxy_url='<?php echo $wp_path; ?>';
top.cross_domain_security = '<?php echo $cross_domain_security; ?>';

if(hasConsole) console.log(top.sound_url_base + ' ' + top.web_proxy_url);
/* ]]> */
</script>
<script language="Javascript" src="/<?php echo $script_path; ?>/keymapping.php"></script>
<?php
// It's about a million times easier to debug Javascript when your source files
// haven't been messed with.  Unfortunately, it's also slower and causes the
// browser to issue many more requests.
if($_REQUEST[embed]!=='true') { ?>
<?php
}

// Array of scripts used by the system.
// In the future, this may calculate dependencies and only include those
// scripts which are actually needed.
$scripts =
  array('/vars.js',
        '/utils/utils.js',
        '/utils/base64.js',
        '/nodes.js',
        '/sound/sounds.js',
        '/sound/prefetch.js',
        '/input/keyboard.js',
        '/wa.js'
        );

// Depending on the type of sound player used, include the appropriate
// set of routines for playing sounds.
if($_REQUEST[embed]==='true') {
  array_unshift($scripts, '/sound/sound_embed.js');
} else {
  // Include either the regular or minified soundmanager2.js.
  if($_REQUEST[debug]==='true') {
    array_unshift($scripts, '/sound/soundmanager2.js');
  } else {
    array_unshift($scripts, '/sound/soundmanager2-mini.js');  
  }
}

// Depending on whether we're in debug mode, either include
// each script separately (better for debugging), or
// combined script using the script minimizer.
if($_REQUEST[debug]==='true') {
  $start = '<script language="Javascript" src="/' . $script_path;
  $end = '"></script>';
  
  // Output script tags individually.
  echo $start . implode($end . "\n" . $start, $scripts) . $end . "\n";
} else {
  echo '<script language="Javascript" src="';
  echo $min_script_path . '/scripts.php?files=';

  // Concatenate the individual scripts used into one long string.
  echo $script_path . implode(',' . $script_path, $scripts) . '"></script>';
}
?>

<style>
body {font-family: Georgia, "Times New Roman", Times, serif;}
#input {font-size: 2em;}
#body {font-family: arial;}
</style>
</head>
<?php
// Flush what we have so far so the browser can start downloading/processing the scripts.
flush();
?>
<body bgcolor="#CCCCFF">
<div align="center" valign="bottom" style="font-size: 1em;">
<form onSubmit="javascript:navigate(this);return false;">
<label for="location">Location</label>: <input type="text" size="50" id="location" value="http://webinsight.cs.washington.edu/wa/content.php"/>
<input name="go" type="submit" value="Go" id="location_go" onclick='navigate(this); return false;'/>
</form>
<form>
<input type="text" name="finder_field" id="finder_field" />
<label for="finder"/><input name="find_button" type="submit" value="Find Next" onclick='nextNodeContentFinder(this); return false;'/></label>
<label for="finder"/><input name="find_button" type="submit" value="Find Previous" onclick='prevNodeContentFinder(this); return false;'/></label>
</form>
</div>
<div <?php if($_REQUEST[debug] === 'true') { echo 'style="visibility: display;"'; } else { echo 'style="visibility: hidden"'; } ?>>Playing: <span id="playing_div"></span> Features: <span id="sound_div"></span></div>
<div <?php if($_REQUEST[debug] === 'true') { echo 'style="visibility: hidden;"'; } else { echo 'style="visibility: hidden"'; }?>><span id="test_div"></span></div>
<div <?php if($_REQUEST[debug] === 'true') { echo 'style="visibility: hidden;"'; } else { echo 'style="visibility: hidden"'; }?>><span id="debug_div"></span></div>
<?php if($_REQUEST[debug]==='true') { ?>
<p>
<form name="recorder_form" method="post" action="recorder.php"><br/>
<input name="submit" type="submit" value="submit">
<textarea id="recording" name="recording" rows="30" cols="150"></textarea>
</form>
</p>
<?php } ?>
</body>
</html>