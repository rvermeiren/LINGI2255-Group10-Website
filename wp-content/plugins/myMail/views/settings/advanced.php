<?php
/**
 *
 *
 * @author Xaver Birsak (https://revaxarts.com)
 * @package
 */


?>
<p class="description"><?php _e( 'Some of these settings may affect your website. In normal circumstance it is not required to change anything on this page.', 'mymail' )?></p>

<table class="form-table">
	<tr valign="top">
		<th scope="row"><?php _e( 'Disable Cache', 'mymail' )?></th>
		<td><label><input type="checkbox" name="mymail_options[disable_cache]" value="1" <?php checked( mymail_option( 'disable_cache' ) );?>> <?php _e( 'Disable Object Cache for MyMail', 'mymail' )?> <p class="description"><?php echo __( 'If enabled MyMail doesn\'t use cache anymore. This causes an increase in page load time! This option is not recommended!', 'mymail' ); ?></p></label>
		</td>
	</tr>
	<tr valign="top">
		<th scope="row"><?php _e( 'remove Data', 'mymail' )?></th>
		<td><label><input type="checkbox" name="mymail_options[remove_data]" value="1" <?php checked( mymail_option( 'remove_data' ) );?>> <?php _e( 'remove all data on plugin deletion', 'mymail' )?> <p class="description"><?php echo __( 'MyMail will remove all it\'s data if you delete the plugin via the plugin page.', 'mymail' ); ?></p></label>
		</td>
	</tr>
	<tr valign="top">
		<th scope="row"><?php _e( 'PHP Mailer', 'mymail' )?></th>
		<td>
		<?php $phpmailerversion = mymail_option( 'php_mailer' );?>
		<label><?php _e( 'use version', 'mymail' )?>
		<select name="mymail_options[php_mailer]">
			<option value="0" <?php selected( !$phpmailerversion );?>><?php _e( 'included in WordPress', 'mymail' )?></option>
			<option value="5.2.7" <?php selected( '5.2.7', $phpmailerversion );?>>5.2.7</option>
			<option value="5.2.10" <?php selected( '5.2.10', $phpmailerversion );?>>5.2.10</option>
			<option value="5.2.14" <?php selected( '5.2.14', $phpmailerversion );?>>5.2.14</option>
		</select></label>
		</td>
	</tr>
	<tr valign="top">
		<th scope="row"><?php _e( 'Send Test', 'mymail' )?></th>
		<td>
		<input type="text" value="<?php echo $current_user->user_email ?>" autocomplete="off" class="form-input-tip" id="mymail_testmail">
		<input type="button" value="<?php _e( 'Send Test', 'mymail' )?>" class="button mymail_sendtest" data-role="basic">
		<div class="loading test-ajax-loading"></div>
		</td>
	</tr>
</table>
