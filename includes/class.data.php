<?php

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) exit;

class catpdf_data {
    function __construct() { }

	public function get_dompdf_options(){
		$plugin_option = get_option('catpdf_dompdf_options',array(
			"DOMPDF_UNICODE_ENABLED"=>true,
			"DOMPDF_ENABLE_FONTSUBSETTING"=>false,
			"DOMPDF_PDF_BACKEND"=>"CPDF",
			"DOMPDF_DEFAULT_MEDIA_TYPE"=>"screen",
			"DOMPDF_DEFAULT_PAPER_SIZE"=>"letter",
			"DOMPDF_DEFAULT_FONT"=>"serif",
			"DOMPDF_DPI"=>96,
			"DOMPDF_ENABLE_PHP"=>true,
			"DOMPDF_ENABLE_JAVASCRIPT"=>true,
			"DOMPDF_ENABLE_REMOTE"=> true,
			"DOMPDF_FONT_HEIGHT_RATIO"=>1.1,
			"DOMPDF_ENABLE_CSS_FLOAT"=>false,
			"DOMPDF_ENABLE_AUTOLOAD"=>true,
			"DOMPDF_AUTOLOAD_PREPEND"=>false,
			"DOMPDF_ENABLE_HTML5PARSER"=>true,
			"_dompdf_show_warnings" => false,
			"_dompdf_debug" => false,
			'DEBUGPNG'=>false,
			'DEBUGKEEPTEMP'=>false,
			'DEBUGCSS'=>false,
			'DEBUG_LAYOUT'=>false,
			'DEBUG_LAYOUT_LINES'=>false,
			'DEBUG_LAYOUT_BLOCKS'=>false,
			'DEBUG_LAYOUT_INLINE'=>false,
			'DEBUG_LAYOUT_PADDINGBOX'=>false
        ));	
		return $plugin_option;
	}




	public function get_options(){
		$plugin_option = get_option('catpdf_options',array(
            'enablecss' => 'off',
            'title' => 'Report %mm-%yyyy',
            'dltemplate' => 'def',
            'postdl' => 'on'
        ));	
		return $plugin_option;
	}

	public function getAllPostTypes(){ }

    /*
     * Get post data
     * @id - int
	 * It's worth noting that any out put here will print into the pdf.  If the PDF can't be 
	 * read then look at it in a text editor like Notepad, where you will see the php errors
	 * 
     */
    public function query_posts($id = NULL) {
		global $_params;
		$type = isset($_params['type'])?$_params['type']:"post";

		$args = array(
			'posts_per_page'   => 5,
			'offset'           => 0,
			//'category'         => '',
			//'category_name'    => '',
			'orderby'          => 'post_date',
			'order'            => 'DESC',
			'include'          => '',
			//'exclude'          => '',
			//'meta_key'         => '',
			//'meta_value'       => '',
			//'post_type'        => 'post',
			//'post_mime_type'   => '',
			//'post_parent'      => '',
			//'suppress_filters' => true 
		);
				
		// $args['post_type']=$type;
		 $args['posts_per_page']=-1;
		 $args['order']='DESC';
		 
		
        if ($id !== NULL) {
            $args['include'] = $id;
        }
        if (isset($_params['user']) && count($_params['user']) > 0) {
            //$args['author'] = implode(',',$_params['user']);
        }
        if (isset($_params['status']) && count($_params['status']) > 0) {
			$args['post_status'] = implode(',',$_params['status']);
        }else{
			$args['post_status']= implode(',',array_keys(get_post_statuses()));	
		}
        if (isset($_params['cat']) && count($_params['cat']) > 0) {
            //$args['cat'] = implode(',',$_params['cat']);
        }

		//var_dump($args);
		//var_dump(get_posts( array('include'=>array($id))));

		$posts_array = get_posts( $args );
		
		
		
		
        //$result = new WP_Query($args);
		
        return $posts_array;//$result->posts;
    }
    /*
     * Return query filter
     * @where - string
     */
    public function filter_where($where = '') {
        global $_params;
        if (isset($_params['from']) && $_params['from'] != '') {
            $from = date('Y-m-d', strtotime($_params['from']));
            $where .= ' AND DATE_FORMAT( post_date , "%Y-%m-%d" ) >= "' . $from . '"';
        }
        if (isset($_params['to']) && $_params['to'] != '') {
            $to = date('Y-m-d', strtotime($_params['to']));
            $where .= ' AND DATE_FORMAT( post_date , "%Y-%m-%d" ) <= "' . $to . '"';
        }
        return $where;
    }


}
?>