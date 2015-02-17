<div id="catpdf-wrap" class="wrap">
  <div class="icon32" id="icon-tools"><br>
  </div>
  <h2><?php echo CATPDF_NAME; ?></h2>
  <?php if( isset($message) && $message!='' ) echo $message; ?>
  <p class="desc-text">
    <?php _e( "The Concatenated PDFs (`<span class='code'>[catpdf]</span>`) plugin allows downloading posts from the site. This form is filling the values that you would find simular to the shortcodes. You can also use the shortcode '<span class='code'>[catpdf]</span>' for frontend implementation. This shortcode display a download link. You can also add parameters on it EX: '<span class='code'>[catpdf text='Download' cat='1' template='1']</span>'." );?>
  </p>
  <div id="form-wrap">
    <form id="catpdf_form" method="post" action="<?php echo $option_url;?>">
      <div class="field-wrap">
        <div class="field">
          <label><?php echo _e( "Time Span" ); ?></label>
          <span class="sept-mar"><?php echo _e( 'From' ); ?></span>
          <input type="text" class="datepicker" id="from" name="from" value="" >
          <span class="sept-mar"><?php echo _e( 'To' ); ?></span>
          <input type="text" class="datepicker" id="to" name="to" value="" >
        </div>
      </div>
      <div class="field-wrap">
        <div class="field">
        
          <div class="wd200 fl">
            <label><?php _e( "Types" ); ?></label>
            <?php echo $select_types; ?>
            <input class="all-btn sept-mar" type="button" value="Select All">
          </div>
           <div class="wd200 fl">
            <label><?php _e( "Tags" ); ?></label>
            <?php echo $select_tags; ?>
            
          </div>       
        
        
          <div class="wd200 fl">
            <label><?php _e( "Category" ); ?></label>
            <?php echo $select_cats; ?>
            
          </div>
          <div class="wd200 fl">
            <label><?php _e( "Author" ); ?></label>
            <?php echo $select_author; ?>
            <input class="all-btn sept-mar" type="button" value="Select All">
          </div>
          <div class="wd200 fl">
            <label class="marb5">
              <?php _e( "Status" ); ?></label>
            <select id="status" name="status[]" multiple="multiple">
				<option selected="selected" value="any"><?php _e( 'Any' );?></option>
				<?php foreach(get_post_statuses() as $key=>$name):?>
				<option value="<?=$key?>"><?=$name?></option>
				<?php endforeach;?>
            </select>
          </div>
          <div class="clr"></div>
        </div>
        <div class="clr"></div>
        <div class="note"> <span>(
          <?php _e("Select parameters to download. Will download all if each set to blank."); ?>
          )</span> </div>
      </div>
      <div class="field-wrap"><a href="#" class="help" title="View Help"><span class="dashicons dashicons-editor-help"></span></a>
        <div class="field">

		<label><?=_e( "Paper size." )?> </label>
		<select id="papersize" name="papersize">
			<?php foreach($select_sizes as $name=>$spec): ?>
			<option value="<?=$name?>"><?=( $name."   - <span>( ".implode(", ",$spec)." )</span>" )?></option>
			<?php endforeach;?>
		</select>
		  
		  
		  
        </div>
		 <div class="note block"><div class="note_block"><?=_e("Dimensions of paper sizes in points.  The format is top left point coordinate to bottom right point coordinate (TLy,TLx,BRy,BRx). North America standard is 'letter'; other countries generally 'a4'")?></div></div>
		  
      </div>
		<div class="field-wrap"><a href="#" class="help" title="View Help"><span class="dashicons dashicons-editor-help"></span></a>
			<div class="field">
				<label><?=_e( "Media view rendered into pdf" )?> </label>
				<select name="media_type" id="media_type" >
					<?php foreach($media_types as $name): ?>
					<option><?=$name?></option>
					<?php endforeach;?>
				</select>
			</div>
			<div class="note block"><div class="note_block"><?=_e("Note, even though the generated pdf file is intended for print output, the desired content might be different (e.g. screen or projection view of html file).  Therefore allow specification of content here.")?></div></div>
		</div>
	  
	  
      <div class="field-wrap"><a href="#" class="help" title="View Help"><span class="dashicons dashicons-editor-help"></span></a>
        <div class="field">
          <label><?php _e( "Orientation" ); ?></label>
          <select id="orientation" name="orientation">
            <?php foreach( $select_ors as $select_or ) : ?>
            <option value="<?php echo $select_or; ?>"><?php echo $select_or; ?></option>
            <?php endforeach; ?>
          </select>
        </div>
		  <div class="note block"><div class="note_block"><?=_e("Select paper orientation.")?></div></div>
      </div>
      <!--<div class="field-wrap">
        <div class="field">
          <label><?php _e( "Template" ); ?></label>
          <select name="template">
            <option value="def">Default</option>
            <?php if( count( $templates ) ) : ?>
            <?php foreach( $templates as $template ) :?>
            <option value="<?php echo $template->template_id;?>"><?php echo $template->template_name;?></option>
            <?php endforeach; ?>
            <?php endif; ?>
          </select>
        </div>
        <div class="note"> <span>(
          <?php _e("Select paper orientation."); ?>
          )</span> </div>
      </div>-->
      <p class="submit">
        <input type="submit" id="catpdf-export" name="catpdf_export" class="button-primary" value="<?php echo _e('Download'); ?>"> | <input type="submit" id="catpdf-shortcode" name="catpdf_shortcode" class="button-secondary" value="<?php echo _e('Build Shortcode'); ?>">
      </p>
    </form>
  </div>
</div>