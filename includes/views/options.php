<div id="catpdf-wrap" class="wrap">
  <div class="icon32" id="icon-options-general"><br>
  </div>
  <h2><?php echo CATPDF_NAME.' '.__('Options'); ?></h2>
  <?php if( isset($message) && $message!='' ) echo $message; ?>
  <div id="form-wrap">
    <form id="catpdf_form" method="post">
      <div class="field-wrap">
        <div class="field">
          <label><?php echo _e( "Use theme's CSS?" ); ?> </label>
          <input type="checkbox" name="enablecss" id="enablecss" <?php echo ( ( isset( $options['enablecss'] ) && $options['enablecss'] == 'on' ) ? 'checked="checked"' : '' );?> >
        </div>
        <div class="note"> <span>(
          <?php _e("Tick this checkbox if you want to enable your theme's main CSS in the PDF."); ?>
          )</span> </div>
      </div>
      <div class="field-wrap">
        <div class="field">
          <label>
            <?php _e( "Export PDF Title" ); ?>
          </label>
          <input type="text" name="title" id="title" value="<?php echo ( ( isset( $options['title'] ) ) ? $options['title'] : '' );?>">
        </div>
        <div class="note"> <span>(
          <?php _e("Put % plus date format(dd,mm,yyyy) to display export date. Ex: Report %dd-%mm-%yyyy.Put keyword '%template' to display the template name. EX: Repost %template."); ?>
          )</span> </div>
      </div>
      <div class="field-wrap">
        <div class="field">
          <label>
            <?php _e( "Enable single post download"); ?>
          </label>
          <input type="checkbox" name="postdl" id="postdl" <?php echo ( ( isset( $options['postdl'] ) && $options['postdl'] == 'on' ) ? 'checked="checked"' : '' );?> >
        </div>
        <div class="note"> <span>(
          <?php _e("Tick this checkbox if you want to enable PDF download on each post."); ?>
          )</span> </div>
      </div>
      <div class="field-wrap">
        <div class="field">
          <label>
            <?php _e( "Post download template" ); ?>
          </label>
          <select name="dltemplate">
            <option <?php selected('def', $options['dltemplate']); ?> value="def"> <?php _e('Default');?> </option>
            <?php if( count( $templates ) ) : ?>
            <?php foreach( $templates as $template ) :?>
            <option <?php selected($template->template_id, $options['dltemplate']); ?> value="<?php echo $template->template_id;?>"><?php echo $template->template_name;?></option>
            <?php endforeach; ?>
            <?php endif; ?>
          </select>
        </div>
        <div class="note"> <span>(
          <?php _e("Select template for single post download. The download will only take the loop part from the selected template."); ?>
          )</span> </div>
      </div>
      <div class="field-wrap">
        <div class="field">
          <label>
            <?php _e( "Custom style" ); ?>
          </label>
          <textarea name="customcss" id="customcss"><?php echo ( ( isset( $options['customcss'] ) ) ? $options['customcss'] : '' );?></textarea>
        </div>
        <div class="note"> <span>(
          <?php _e("Apply your custom styles here. Do not include style tag( &lt;style&gt; , &lt;/style&gt; )."); ?>
          )</span> </div>
      </div>
	  
	  
	  
	  
	  
	  
	  
	  
	  
	  
	  
	  <h3>PDF generation defaults</h3>
	  
		<div class="field-wrap">
			<div class="field">
				<label><?=_e( "DOMPDF_UNICODE_ENABLED" )?></label>
				<input type="checkbox" name="DOMPDF_UNICODE_ENABLED" id="DOMPDF_UNICODE_ENABLED" <?=checked($dompdf_options['DOMPDF_UNICODE_ENABLED'],true)?>>
			</div>
			<div class="note"><span>(<?=_e("")?>)</span></div>
		</div>  
		<div class="field-wrap">
			<div class="field">
				<label><?=_e( "Use DOMPDF_ENABLE_FONTSUBSETTING?" )?></label>
				<input type="checkbox" name="DOMPDF_ENABLE_FONTSUBSETTING" id="DOMPDF_ENABLE_FONTSUBSETTING" <?=checked($dompdf_options['DOMPDF_ENABLE_FONTSUBSETTING'],true)?>>
			</div>
			<div class="note"><span>(<?=_e("")?>)</span></div>
		</div>
		<div class="field-wrap">
			<div class="field">
				<label><?=_e( "DOMPDF_PDF_BACKEND" )?> </label>
				<input type="text" name="DOMPDF_PDF_BACKEND" id="DOMPDF_PDF_BACKEND" value="<?=$dompdf_options['DOMPDF_PDF_BACKEND']?>">
			</div>
			<div class="note"> <span>(<?=_e("")?>)</span> </div>
		</div>	  
		<div class="field-wrap">
			<div class="field">
				<label><?=_e( "DOMPDF_DEFAULT_MEDIA_TYPE" )?> </label>
				<input type="text" name="DOMPDF_DEFAULT_MEDIA_TYPE" id="DOMPDF_DEFAULT_MEDIA_TYPE" value="<?=$dompdf_options['DOMPDF_DEFAULT_MEDIA_TYPE']?>">
			</div>
			<div class="note"> <span>(<?=_e("")?>)</span> </div>
		</div>
		<div class="field-wrap">
			<div class="field">
				<label><?=_e( "DOMPDF_DEFAULT_PAPER_SIZE" )?> </label>
				<input type="text" name="DOMPDF_DEFAULT_PAPER_SIZE" id="DOMPDF_DEFAULT_PAPER_SIZE" value="<?=$dompdf_options['DOMPDF_DEFAULT_PAPER_SIZE']?>">
			</div>
			<div class="note"> <span>(<?=_e("")?>)</span> </div>
		</div>	  
		<div class="field-wrap">
			<div class="field">
				<label><?=_e( "DOMPDF_DEFAULT_FONT" )?> </label>
				<input type="text" name="DOMPDF_DEFAULT_FONT" id="DOMPDF_DEFAULT_FONT" value="<?=$dompdf_options['DOMPDF_DEFAULT_FONT']?>">
			</div>
			<div class="note"> <span>(<?=_e("")?>)</span> </div>
		</div>	  	  
		<div class="field-wrap">
			<div class="field">
				<label><?=_e( "DOMPDF_DPI" )?> </label>
				<input type="text" name="DOMPDF_DPI" id="DOMPDF_DPI" value="<?=$dompdf_options['DOMPDF_DPI']?>">
			</div>
			<div class="note"> <span>(<?=_e("")?>)</span> </div>
		</div>
		<div class="field-wrap">
			<div class="field">
				<label><?=_e( "DOMPDF_FONT_HEIGHT_RATIO" )?> </label>
				<input type="text" name="DOMPDF_FONT_HEIGHT_RATIO" id="DOMPDF_FONT_HEIGHT_RATIO" value="<?=$dompdf_options['DOMPDF_FONT_HEIGHT_RATIO']?>">
			</div>
			<div class="note"> <span>(<?=_e("")?>)</span> </div>
		</div>
				
		<div class="field-wrap">
			<div class="field">
				<label><?=_e( "DOMPDF_ENABLE_PHP" )?></label>
				<input type="checkbox" name="DOMPDF_ENABLE_PHP" id="DOMPDF_ENABLE_PHP" <?=checked($dompdf_options['DOMPDF_ENABLE_PHP'],true)?>>
			</div>
			<div class="note"><span>(<?=_e("")?>)</span></div>
		</div> 
		<div class="field-wrap">
			<div class="field">
				<label><?=_e( "DOMPDF_ENABLE_JAVASCRIPT" )?></label>
				<input type="checkbox" name="DOMPDF_ENABLE_JAVASCRIPT" id="DOMPDF_ENABLE_JAVASCRIPT" <?=checked($dompdf_options['DOMPDF_ENABLE_JAVASCRIPT'],true)?>>
			</div>
			<div class="note"><span>(<?=_e("")?>)</span></div>
		</div> 
		<div class="field-wrap">
			<div class="field">
				<label><?=_e( "DOMPDF_ENABLE_REMOTE" )?></label>
				<input type="checkbox" name="DOMPDF_ENABLE_REMOTE" id="DOMPDF_ENABLE_REMOTE" <?=checked($dompdf_options['DOMPDF_ENABLE_REMOTE'],true)?>>
			</div>
			<div class="note"><span>(<?=_e("")?>)</span></div>
		</div> 


		<div class="field-wrap">
			<div class="field">
				<label><?=_e( "DOMPDF_ENABLE_CSS_FLOAT" )?></label>
				<input type="checkbox" name="DOMPDF_ENABLE_CSS_FLOAT" id="DOMPDF_ENABLE_CSS_FLOAT" <?=checked($dompdf_options['DOMPDF_ENABLE_CSS_FLOAT'],true)?>>
			</div>
			<div class="note"><span>(<?=_e("")?>)</span></div>
		</div> 

		<div class="field-wrap">
			<div class="field">
				<label><?=_e( "DOMPDF_ENABLE_AUTOLOAD" )?></label>
				<input type="checkbox" name="DOMPDF_ENABLE_AUTOLOAD" id="DOMPDF_ENABLE_AUTOLOAD" <?=checked($dompdf_options['DOMPDF_ENABLE_AUTOLOAD'],true)?>>
			</div>
			<div class="note"><span>(<?=_e("")?>)</span></div>
		</div> 

		<div class="field-wrap">
			<div class="field">
				<label><?=_e( "DOMPDF_AUTOLOAD_PREPEND" )?></label>
				<input type="checkbox" name="DOMPDF_AUTOLOAD_PREPEND" id="DOMPDF_AUTOLOAD_PREPEND" <?=checked($dompdf_options['DOMPDF_AUTOLOAD_PREPEND'],true)?>>
			</div>
			<div class="note"><span>(<?=_e("")?>)</span></div>
		</div> 
		<div class="field-wrap">
			<div class="field">
				<label><?=_e( "DOMPDF_ENABLE_HTML5PARSER" )?></label>
				<input type="checkbox" name="DOMPDF_ENABLE_HTML5PARSER" id="DOMPDF_ENABLE_HTML5PARSER" <?=checked($dompdf_options['DOMPDF_ENABLE_HTML5PARSER'],true)?>>
			</div>
			<div class="note"><span>(<?=_e("")?>)</span></div>
		</div> 
		<div class="field-wrap">
			<div class="field">
				<label><?=_e( "_dompdf_show_warnings" )?></label>
				<input type="checkbox" name="_dompdf_show_warnings" id="_dompdf_show_warnings" <?=checked($dompdf_options['_dompdf_show_warnings'],true)?>>
			</div>
			<div class="note"><span>(<?=_e("")?>)</span></div>
		</div> 
		<div class="field-wrap">
			<div class="field">
				<label><?=_e( "_dompdf_debug" )?></label>
				<input type="checkbox" name="_dompdf_debug" id="_dompdf_debug" <?=checked($dompdf_options['_dompdf_debug'],true)?>>
			</div>
			<div class="note"><span>(<?=_e("")?>)</span></div>
		</div> 
		<div class="field-wrap">
			<div class="field">
				<label><?=_e( "DEBUGPNG" )?></label>
				<input type="checkbox" name="DEBUGPNG" id="DEBUGPNG" <?=checked($dompdf_options['DEBUGPNG'],true)?>>
			</div>
			<div class="note"><span>(<?=_e("")?>)</span></div>
		</div>
		<div class="field-wrap">
			<div class="field">
				<label><?=_e( "DEBUGKEEPTEMP" )?></label>
				<input type="checkbox" name="DEBUGKEEPTEMP" id="DEBUGKEEPTEMP" <?=checked($dompdf_options['DEBUGKEEPTEMP'],true)?>>
			</div>
			<div class="note"><span>(<?=_e("")?>)</span></div>
		</div>
		<div class="field-wrap">
			<div class="field">
				<label><?=_e( "DEBUGCSS" )?></label>
				<input type="checkbox" name="DEBUGCSS" id="DEBUGCSS" <?=checked($dompdf_options['DEBUGCSS'],true)?>>
			</div>
			<div class="note"><span>(<?=_e("")?>)</span></div>
		</div>
		<div class="field-wrap">
			<div class="field">
				<label><?=_e( "DEBUG_LAYOUT" )?></label>
				<input type="checkbox" name="DEBUG_LAYOUT" id="DEBUG_LAYOUT" <?=checked($dompdf_options['DEBUG_LAYOUT'],true)?>>
			</div>
			<div class="note"><span>(<?=_e("")?>)</span></div>
		</div>
		<div class="field-wrap">
			<div class="field">
				<label><?=_e( "DEBUG_LAYOUT_LINES" )?></label>
				<input type="checkbox" name="DEBUG_LAYOUT_LINES" id="DEBUG_LAYOUT_LINES" <?=checked($dompdf_options['DEBUG_LAYOUT_LINES'],true)?>>
			</div>
			<div class="note"><span>(<?=_e("")?>)</span></div>
		</div>
		<div class="field-wrap">
			<div class="field">
				<label><?=_e( "DEBUG_LAYOUT_BLOCKS" )?></label>
				<input type="checkbox" name="DEBUG_LAYOUT_BLOCKS" id="DEBUG_LAYOUT_BLOCKS" <?=checked($dompdf_options['DEBUG_LAYOUT_BLOCKS'],true)?>>
			</div>
			<div class="note"><span>(<?=_e("")?>)</span></div>
		</div>
		<div class="field-wrap">
			<div class="field">
				<label><?=_e( "DEBUG_LAYOUT_INLINE" )?></label>
				<input type="checkbox" name="DEBUG_LAYOUT_INLINE" id="DEBUG_LAYOUT_INLINE" <?=checked($dompdf_options['DEBUG_LAYOUT_INLINE'],true)?>>
			</div>
			<div class="note"><span>(<?=_e("")?>)</span></div>
		</div>
		<div class="field-wrap">
			<div class="field">
				<label><?=_e( "DEBUG_LAYOUT_PADDINGBOX" )?></label>
				<input type="checkbox" name="DEBUG_LAYOUT_PADDINGBOX" id="DEBUG_LAYOUT_PADDINGBOX" <?=checked($dompdf_options['DEBUG_LAYOUT_PADDINGBOX'],true)?>>
			</div>
			<div class="note"><span>(<?=_e("")?>)</span></div>
		</div>

	  
	  
	  
	  
	  
	  
      <p class="submit">
        <input type="submit" name="catpdf_save_option" class="button-primary" value="Save Changes">
      </p>
    </form>
  </div>
</div>