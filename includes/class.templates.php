<?php

/*
	Still needs a good refactor
	- sections should be abstracted to subplugin style
*/


// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) exit;

class catpdf_templates {
    public $title = '';
	public $current_template = NULL;
    function __construct() {
		global $_params;
        if (is_admin()) {
			if (isset($_params)) {
				// Check if template save is performed
				if (isset($_params['catpdf_save'])) {
					if ($_params['templateid'] == '') {
						// Add save template action hook
						add_action('init', array($this, 'add_template' ));
					} else {
						// Add update template action hook
						add_action('init', array( $this, 'update_template' ));
					}
				}
			}
		}  
    }

	public function get_default_render_order(){
		$sections = array(
			'cover'=>"",
			'index'=>"",
			'content'=>"",
			'appendix'=>"",
		);
		return $sections;
	}
	
	public function get_default_template_sections(){
		$sections = array(
			'cover'=>"",
			'index'=>"",
			'content'=>"",
			'appendix'=>"",
		);
		return $sections;
	}

	/**
     * @todo set this up to accept inserted parts
	 */
	public function get_template_sections(){
		return $this->get_default_template_sections();
	}
	
	public function get_section_content(){	
		global $catpdf_output;
		
		$catpdf_output->_html_structure();
		$content 		= $catpdf_output->filter_shortcodes('body');
		$contentHtml	= "<div id='catpdf_content'>{$content}</div>\n";	
		//var_dump($contentHtml);die();
		return $contentHtml;
	}	
	public function get_section_cover(){
		$cover			= "<h1 class='CoverTitle'>Cover Letter</h1>\n";
		$coverHtml 		= "<div id='catpdf_cover'>{$cover}</div>\n";	
		return $coverHtml;
	}
	
	public function get_section_index(){
		global $posts,$catpdf_output;
		$index='<script type="text/php">$GLOBALS["indexpage"]=$pdf->get_page_number(); $GLOBALS["backside"]=$pdf->open_object();</script>'."\n";
		$table = $this->resolve_template("index-table.php");
		$index.=$catpdf_output->filter_shortcodes('index',$table);
		$index.='<script type="text/php">$pdf->close_object(); </script>'."\n";
		$indexHtml="<div id='catpdf_index'>{$index}</div>";
		
		//var_dump($indexHtml);die();
		
		return $indexHtml;
	}	
	public function get_section_appendix(){	
		$appendix			= "<h1 class='CoverTitle'>appendix</h1>";
		$appendixHtml 		= "<div id='catpdf_appendix'>{$appendix}</div>";	
		return $appendixHtml;
	}
	
	/**
     * return template object
	 * 
	 * @return object
	 */
	public function get_current_tempate($type=NULL){
		if($this->current_template==NULL)$this->set_current_tempate($type);
		return $this->current_template;
	}
	/**
     * set template object
	 */
	public function set_current_tempate($type=NULL){
		global $_params,$catpdf_templates,$catpdf_data;
		$curr_temp = isset($_params['template'])?$_params['template']:null;
		
		$options   = $catpdf_data->get_options();
		
		if($curr_temp==null){
			if ($type == 'single') {
				$curr_temp = $options['single']['dltemplate'];
			}else{
				$curr_temp = $options['concat']['dltemplate'];
			}
		}

        if ($curr_temp == 'default') {
            $template = $catpdf_templates->get_default_template();
        } else {
            $template = $catpdf_templates->get_template($curr_temp);
        }
		$this->current_template = $template;
	}

	public function resolve_template($file){
		$html = "";
		if ( $overridden_template = locate_template( $file ) ) {
			// locate_template() returns path to file
			// if either the child theme or the parent theme have overridden the template
			$html = file_get_contents( $overridden_template );
		} else {
			// If neither the child nor parent theme have overridden the template,
			// we load the template from the 'templates' sub-directory of the directory this file is in
			$html = file_get_contents( CATPDF_PATH . '/templates/'.$file );
		}
		return $html;
	}

    /**
     * Return default template structure
	 * 
	 * @return array
     */
    public function construct_default_template($type = 'all') {
        $temp         = array();
        $temp['name'] = 'Default';

		// Construct template loop
		$pageheadertemplate = $this->resolve_template("pageheadertemplate.php");
		$pagefootertemplate = $this->resolve_template("pagefootertemplate.php");

		// Construct template loop
		$looptemplate = $this->resolve_template($type."-loop.php");
		// Construct template body
		$bodytemplate = $this->resolve_template($type."-body.php");

        $temp['loop'] = $looptemplate;
        $temp['body'] = $bodytemplate;
		$temp['pageheader'] = $pageheadertemplate;
		$temp['pagefooter'] = $pagefootertemplate;
        return $temp;
    }
    /**
     * Return default template
	 *
	 * @return object
     */
    public function get_default_template() {
        if (isset($_GET['catpdf_dl'])) {
            $default_template = $this->construct_default_template('single');
        } else {
            $default_template = $this->construct_default_template();
        }
        $arr = array();
        $arr = array(
            'template_name' => 'Default',
            'template_loop' => $default_template['loop'],
            'template_body' => $default_template['body'],
			'template_pageheader' => $default_template['pageheader'],
			'template_pagefooter' => $default_template['pagefooter']
        );
        return (object) $arr;
    }

}
?>