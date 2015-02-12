<?php

$options = $catpdf_data->get_options();
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

require_once(DOMPDF_INC_DIR . "/functions.inc.php");
def("DOMPDF_ADMIN_USERNAME", "user");
def("DOMPDF_ADMIN_PASSWORD", "password");
def("DOMPDF_FONT_DIR", DOMPDF_DIR . "/lib/fonts/");
def("DOMPDF_FONT_CACHE", DOMPDF_FONT_DIR);
def("DOMPDF_TEMP_DIR", DOMPDF_DIR.'/tmp/');
def("DOMPDF_CHROOT", realpath(DOMPDF_DIR));
def("DOMPDF_LOG_OUTPUT_FILE", DOMPDF_DIR. "/logs/log.htm");

def("DOMPDF_UNICODE_ENABLED", $options["DOMPDF_UNICODE_ENABLED"]!=0);
def("DOMPDF_ENABLE_FONTSUBSETTING", $options["DOMPDF_ENABLE_FONTSUBSETTING"]!=0);
def("DOMPDF_PDF_BACKEND", $options["DOMPDF_PDF_BACKEND"]);
def("DOMPDF_DEFAULT_MEDIA_TYPE", $options["DOMPDF_DEFAULT_MEDIA_TYPE"]);
def("DOMPDF_DEFAULT_PAPER_SIZE", $options["DOMPDF_DEFAULT_PAPER_SIZE"]);
def("DOMPDF_DEFAULT_FONT", $options["DOMPDF_DEFAULT_FONT"]);
def("DOMPDF_DPI", (int)$options["DOMPDF_DPI"]);
def("DOMPDF_ENABLE_PHP", $options["DOMPDF_ENABLE_PHP"]!=0);
def("DOMPDF_ENABLE_JAVASCRIPT", $options["DOMPDF_ENABLE_JAVASCRIPT"]!=0);
def("DOMPDF_ENABLE_REMOTE", $options["DOMPDF_ENABLE_REMOTE"]!=0);
def("DOMPDF_FONT_HEIGHT_RATIO", (float)$options["DOMPDF_FONT_HEIGHT_RATIO"]);
def("DOMPDF_ENABLE_CSS_FLOAT", $options["DOMPDF_ENABLE_CSS_FLOAT"]!=0);
def("DOMPDF_ENABLE_AUTOLOAD", true);
def("DOMPDF_AUTOLOAD_PREPEND", false);
def("DOMPDF_ENABLE_HTML5PARSER", $options["DOMPDF_ENABLE_HTML5PARSER"]!=0);



require_once(DOMPDF_LIB_DIR . "/html5lib/Parser.php");
if (DOMPDF_ENABLE_AUTOLOAD) {
    require_once(DOMPDF_INC_DIR . "/autoload.inc.php");
    require_once(DOMPDF_LIB_DIR . "/php-font-lib/classes/font.cls.php");
}
mb_internal_encoding('UTF-8');
global $_dompdf_warnings;
$_dompdf_warnings = array();

global $_dompdf_show_warnings;
$_dompdf_show_warnings = $options["_dompdf_show_warnings"]!=0;

global $_dompdf_debug;
$_dompdf_debug = $options["_dompdf_debug"]!=0;

global $_DOMPDF_DEBUG_TYPES;
$_DOMPDF_DEBUG_TYPES = array();
def('DEBUGPNG', $options["DEBUGPNG"]!=0);
def('DEBUGKEEPTEMP', $options["DEBUGKEEPTEMP"]!=0);
def('DEBUGCSS', $options["DEBUGCSS"]!=0);
def('DEBUG_LAYOUT', $options["DEBUG_LAYOUT"]!=0);
def('DEBUG_LAYOUT_LINES', $options["DEBUG_LAYOUT_LINES"]!=0);
def('DEBUG_LAYOUT_BLOCKS', $options["DEBUG_LAYOUT_BLOCKS"]!=0);
def('DEBUG_LAYOUT_INLINE', $options["DEBUG_LAYOUT_INLINE"]!=0);
def('DEBUG_LAYOUT_PADDINGBOX', $options["DEBUG_LAYOUT_PADDINGBOX"]!=0);
