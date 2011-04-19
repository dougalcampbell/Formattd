<?php
/**
 * This is actually just a shim that will load the regular format
 * template as a fallback. The idea here is that you can create
 * archive format templates like 'format-archive-status.php' or
 * 'format-archive-link.php'. If those templates don't actually 
 * exist, this code will instead attempt to load the regular
 * template ('format-status.php' or 'format-link.php'). And of
 * course, those will fall back to 'format.php'.
 */
 
$format = get_post_format();

get_template_part('format', $format);

/** yes, that's all **/