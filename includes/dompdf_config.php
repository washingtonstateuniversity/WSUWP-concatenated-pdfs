<?php

$options = $catpdf_data->get_dompdf_options();
//var_dump($options);die();

PHP_VERSION >= 5.0 or die("DOMPDF requires PHP 5.0+");
define("DOMPDF_DIR", str_replace(DIRECTORY_SEPARATOR, '/', realpath(dirname(__FILE__))).'/dompdf/');
define("DOMPDF_INC_DIR", DOMPDF_DIR . "/include");
define("DOMPDF_LIB_DIR", DOMPDF_DIR . "/lib");
if (!isset($_SERVER['DOCUMENT_ROOT'])) {
    $path = "";
    if (isset($_SERVER['SCRIPT_FILENAME']))
        $path = $_SERVER['SCRIPT_FILENAME'];
    elseif (isset($_SERVER['PATH_TRANSLATED']))
        $path = str_replace('\\\\', '\\', $_SERVER['PATH_TRANSLATED']);
    $_SERVER['DOCUMENT_ROOT'] = str_replace('\\', '/', substr($path, 0, 0 - strlen($_SERVER['PHP_SELF'])));
}
if (file_exists(DOMPDF_DIR . "/dompdf_config.custom.inc.php")) {
    require_once(DOMPDF_DIR . "/dompdf_config.custom.inc.php");
}
require_once(DOMPDF_INC_DIR . "/functions.inc.php");
def("DOMPDF_ADMIN_USERNAME", "user");
def("DOMPDF_ADMIN_PASSWORD", "password");
def("DOMPDF_FONT_DIR", DOMPDF_DIR . "/lib/fonts/");
def("DOMPDF_FONT_CACHE", DOMPDF_FONT_DIR);
def("DOMPDF_TEMP_DIR", DOMPDF_DIR.'/tmp/');
def("DOMPDF_CHROOT", realpath(DOMPDF_DIR));
def("DOMPDF_LOG_OUTPUT_FILE", DOMPDF_DIR. "/logs/log.htm");

def("DOMPDF_UNICODE_ENABLED", $options["DOMPDF_UNICODE_ENABLED"]);
def("DOMPDF_ENABLE_FONTSUBSETTING", $options["DOMPDF_ENABLE_FONTSUBSETTING"]);
def("DOMPDF_PDF_BACKEND", $options["DOMPDF_PDF_BACKEND"]);
def("DOMPDF_DEFAULT_MEDIA_TYPE", $options["DOMPDF_DEFAULT_MEDIA_TYPE"]);
def("DOMPDF_DEFAULT_PAPER_SIZE", $options["DOMPDF_DEFAULT_PAPER_SIZE"]);
def("DOMPDF_DEFAULT_FONT", $options["DOMPDF_DEFAULT_FONT"]);
def("DOMPDF_DPI", $options["DOMPDF_DPI"]);
def("DOMPDF_ENABLE_PHP", $options["DOMPDF_ENABLE_PHP"]);
def("DOMPDF_ENABLE_JAVASCRIPT", $options["DOMPDF_ENABLE_JAVASCRIPT"]);
def("DOMPDF_ENABLE_REMOTE", $options["DOMPDF_ENABLE_REMOTE"]);
def("DOMPDF_FONT_HEIGHT_RATIO", $options["DOMPDF_FONT_HEIGHT_RATIO"]);
def("DOMPDF_ENABLE_CSS_FLOAT", $options["DOMPDF_ENABLE_CSS_FLOAT"]);
def("DOMPDF_ENABLE_AUTOLOAD", $options["DOMPDF_ENABLE_AUTOLOAD"]);
def("DOMPDF_AUTOLOAD_PREPEND", $options["DOMPDF_AUTOLOAD_PREPEND"]);
def("DOMPDF_ENABLE_HTML5PARSER", $options["DOMPDF_ENABLE_HTML5PARSER"]);

require_once(DOMPDF_LIB_DIR . "/html5lib/Parser.php");
if (DOMPDF_ENABLE_AUTOLOAD) {
    require_once(DOMPDF_INC_DIR . "/autoload.inc.php");
    require_once(DOMPDF_LIB_DIR . "/php-font-lib/classes/font.cls.php");
}
mb_internal_encoding('UTF-8');
global $_dompdf_warnings;
$_dompdf_warnings = array();

global $_dompdf_show_warnings;
$_dompdf_show_warnings = $options["_dompdf_show_warnings"];

global $_dompdf_debug;
$_dompdf_debug = $options["_dompdf_debug"];

global $_DOMPDF_DEBUG_TYPES;
$_DOMPDF_DEBUG_TYPES = array();
def('DEBUGPNG', $options["DEBUGPNG"]);
def('DEBUGKEEPTEMP', $options["DEBUGKEEPTEMP"]);
def('DEBUGCSS', $options["DEBUGCSS"]);
def('DEBUG_LAYOUT', $options["DEBUG_LAYOUT"]);
def('DEBUG_LAYOUT_LINES', $options["DEBUG_LAYOUT_LINES"]);
def('DEBUG_LAYOUT_BLOCKS', $options["DEBUG_LAYOUT_BLOCKS"]);
def('DEBUG_LAYOUT_INLINE', $options["DEBUG_LAYOUT_INLINE"]);
def('DEBUG_LAYOUT_PADDINGBOX', $options["DEBUG_LAYOUT_PADDINGBOX"]);
