<div class="wrap">
	<h2>Starter plugin admin</h2>
	
	<?php if(!empty($status)): ?>
		<div class="updated notice notice-success">
			<p><?=esc_html($unescaped_status)?></p>
		</div>
	<?php endif; ?>
	
	<form action="<?=admin_url( "admin.php?page=mbw_starter&mbw_starter_action=save")?>" method="post">
		<?=$nonce?>
		
		<div class="postbox">
			<div class="inside">
				<p><input type="checkbox" name="mbw_starter_display" id="mbw_starter_display" value="1" <?php checked($unescaped_display, 1); ?>/> <label for="mbw_starter_display">Display text</label></p>
							
				<p><label for="mbw_starter_sample_text">Sample text</label></p>
				<p><input type="text" name="mbw_starter_sample_text" id="mbw_starter_sample_text" value="<?=esc_attr($unescaped_sample_text)?>" style="width:80%;" /></p>
			</div>
		</div>
		
		<div class="postbox" style="margin-top:20px;">
			<div class="inside">
				<input type="submit" value="Save changes" class="button button-primary button-large" />
			</div>
		</div>
	</form>
</div>