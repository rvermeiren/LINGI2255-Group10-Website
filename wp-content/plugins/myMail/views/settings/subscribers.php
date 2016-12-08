<?php
/**
 *
 *
 * @author Xaver Birsak (https://revaxarts.com)
 * @package
 */


?>
<table class="form-table">
	<tr valign="top">
		<th scope="row"><?php _e( 'Notification', 'mymail' )?></th>
		<td>
		<p><label><input type="checkbox" name="mymail_options[subscriber_notification]" value="1" <?php checked( mymail_option( 'subscriber_notification' ) );?>> <?php _e( 'Send a notification of new subscribers to following receivers (comma separated)', 'mymail' )?> <input type="text" name="mymail_options[subscriber_notification_receviers]" value="<?php echo esc_attr( mymail_option( 'subscriber_notification_receviers' ) ); ?>" class="regular-text"></label>
		<br>&nbsp;&nbsp;<?php _e( 'use', 'mymail' );?> <select name="mymail_options[subscriber_notification_template]">
		<?php
$selected = mymail_option( 'subscriber_notification_template', 'notification.html' );
foreach ( $templatefiles as $slug => $filedata ) {
	if ( $slug == 'index.html' ) {
		continue;
	}

?>
			<option value="<?php echo $slug ?>"<?php selected( $slug == $selected )?>><?php echo esc_attr( $filedata['label'] ) ?> (<?php echo $slug ?>)</option>
		<?php
}
?>
		</select>
		<br>&nbsp;&nbsp;<?php _e( 'send', 'mymail' );?> <select name="mymail_options[subscriber_notification_delay]">
		<?php
$selected = mymail_option( 'subscriber_notification_delay' );
?>
			<option value="0"<?php selected( !$selected )?>><?php _e( 'immediately', 'mymail' );?></option>
			<option value="day"<?php selected( 'day' == $selected )?>><?php _e( 'daily', 'mymail' );?></option>
			<option value="week"<?php selected( 'week' == $selected )?>><?php _e( 'weekly', 'mymail' );?></option>
			<option value="month"<?php selected( 'month' == $selected )?>><?php _e( 'monthly', 'mymail' );?></option>
		</select>
		</p>
		</td>
	</tr>
</table>
<table class="form-table">
	<tr valign="top">
		<th scope="row">&nbsp;</th>
		<td>

		<p>
		<label><input type="checkbox" name="mymail_options[unsubscribe_notification]" value="1" <?php checked( mymail_option( 'unsubscribe_notification' ) );?>> <?php _e( 'Send a notification if subscribers cancel their subscription to following receivers (comma separated)', 'mymail' )?> <input type="text" name="mymail_options[unsubscribe_notification_receviers]" value="<?php echo esc_attr( mymail_option( 'unsubscribe_notification_receviers' ) ); ?>" class="regular-text"></label>
		<br>&nbsp;&nbsp;<?php _e( 'use', 'mymail' );?> <select name="mymail_options[unsubscribe_notification_template]">
		<?php
$selected = mymail_option( 'unsubscribe_notification_template', 'notification.html' );
foreach ( $templatefiles as $slug => $filedata ) {
	if ( $slug == 'index.html' ) {
		continue;
	}

?>
			<option value="<?php echo $slug ?>"<?php selected( $slug == $selected )?>><?php echo esc_attr( $filedata['label'] ) ?> (<?php echo $slug ?>)</option>
		<?php
}
?>
		</select>
		<br>&nbsp;&nbsp;<?php _e( 'send', 'mymail' );?> <select name="mymail_options[unsubscribe_notification_delay]">
		<?php
$selected = mymail_option( 'unsubscribe_notification_delay' );
?>
			<option value="0"<?php selected( !$selected )?>><?php _e( 'immediately', 'mymail' );?></option>
			<option value="day"<?php selected( 'day' == $selected )?>><?php _e( 'daily', 'mymail' );?></option>
			<option value="week"<?php selected( 'week' == $selected )?>><?php _e( 'weekly', 'mymail' );?></option>
			<option value="month"<?php selected( 'month' == $selected )?>><?php _e( 'monthly', 'mymail' );?></option>
		</select>
		</p>
		</td>
	</tr>
	<tr valign="top">
		<th scope="row"><?php _e( 'Save Subscriber IP', 'mymail' )?></th>
		<td><label><input type="checkbox" name="mymail_options[track_users]" value="1" <?php checked( mymail_option( 'track_users' ) )?>> <?php _e( 'Save IP address and time of new subscribers', 'mymail' )?></label>
		<p class="description"><?php _e( 'In some countries it\'s required to save the IP address and the sign up time for legal reasons. Please add a note in your privacy policy if you save users data', 'mymail' )?></p>
		</td>
	</tr>
	<tr valign="top">
		<th scope="row">Do Not Track</th>
		<td><label><input type="checkbox" name="mymail_options[do_not_track]" value="1" <?php checked( mymail_option( 'do_not_track' ) )?>> <?php _e( 'Respect users "Do Not Track" option', 'mymail' )?></label>
		<p class="description"><?php echo sprintf( __( 'If enabled MyMail will respect users option for not getting tracked. Read more on the %s', 'mymail' ), '<a href="http://donottrack.us/" class="external">' . __( 'official website', 'mymail' ) . '</a>' ) ?></p>
		</td>
	</tr>
	<tr>
		<th scope="row"><?php _e( 'Single-Opt-Out', 'mymail' )?></th>
		<td><label><input type="checkbox" name="mymail_options[single_opt_out]" value="1" <?php checked( mymail_option( 'single_opt_out' ) )?>> <?php _e( 'Subscribers instantly signed out after clicking the unsubscribe link in mails', 'mymail' )?></label>
		</td>
	</tr>
	<tr>
		<th scope="row"><?php _e( 'Name Order', 'mymail' )?></th>
		<td>
		<select name="mymail_options[name_order]">
			<option value="0"<?php selected( !mymail_option( 'name_order' ) );?>><?php echo __( 'Firstname', 'mymail' ) . ' ' . __( 'Lastname', 'mymail' ) ?></option>
			<option value="1"<?php selected( mymail_option( 'name_order' ) );?>><?php echo __( 'Lastname', 'mymail' ) . ' ' . __( 'Firstname', 'mymail' ) ?></option>
		</select>
		<p class="description"><?php printf( __( 'Define in which order names appear in your language or country. This is used for the %s tag.', 'mymail' ), '<code>{fullname}</code>' );?></p>
		</td>
	</tr>
	<tr valign="top">
		<th scope="row"><?php _e( 'Custom Fields', 'mymail' )?>:
			<p class="description"><?php _e( 'Custom field tags are individual tags for each subscriber. You can ask for them on subscription and/or make it a required field.', 'mymail' );?></p>
			<p class="description"><?php _e( 'You have to enable Custom fields for each form:', 'mymail' );?> <a href="#forms"><?php _e( 'Forms', 'mymail' );?></a></p>
		</th>
		<td>
		<input type="hidden" name="mymail_options[custom_field][0]" value="empty">
			<div class="customfields">
		<?php
if ( $customfields ) {
	$types = array(
		'textfield' => __( 'Textfield', 'mymail' ),
		'textarea' => __( 'Textarea', 'mymail' ),
		'dropdown' => __( 'Dropdown Menu', 'mymail' ),
		'radio' => __( 'Radio Buttons', 'mymail' ),
		'checkbox' => __( 'Checkbox', 'mymail' ),
		'date' => __( 'Date', 'mymail' ),
	);
	foreach ( $customfields as $id => $data ) {
?>
				<div class="customfield">
				<a class="customfield-move-up" title="<?php _e( 'move up', 'mymail' );?>">&#9650;</a>
				<a class="customfield-move-down" title="<?php _e( 'move down', 'mymail' );?>">&#9660;</a>
				<div><span class="label"><?php _e( 'Field Name', 'mymail' );?>:</span><label><input type="text" name="mymail_options[custom_field][<?php echo $id ?>][name]" value="<?php echo esc_attr( $data['name'] ) ?>" class="regular-text customfield-name"></label></div>
				<div><span class="label"><?php _e( 'Tag', 'mymail' );?>:</span><span><code>{</code><input type="text" name="mymail_options[custom_field][<?php echo $id ?>][id]" value="<?php echo sanitize_key( $id ); ?>" class="code"><code>}</code></span></div>
				<div><span class="label"><?php _e( 'Type', 'mymail' );?>:</span><select class="customfield-type" name="mymail_options[custom_field][<?php echo $id ?>][type]">
				<?php
		foreach ( $types as $value => $name ) {
			echo '<option value="' . $value . '" ' . selected( $data['type'], $value, false ) . '>' . $name . '</option>';

		}

?>
				</select></div>
					<ul class="customfield-additional customfield-dropdown customfield-radio" <?php if ( in_array( $data['type'], array( 'dropdown', 'radio' ) ) ) {
			echo ' style="display:block"';
		}
		?>>
						<li>
							<ul class="customfield-values">
						<?php
		$values = !empty( $data['values'] ) ? $data['values'] : array( '' );
		foreach ( $values as $value ) {
?>
							<li><span>&nbsp;</span> <span class="customfield-value-box"><input type="text" name="mymail_options[custom_field][<?php echo $id ?>][values][]" class="regular-text customfield-value" value="<?php echo $value; ?>"> <label><input type="radio" name="mymail_options[custom_field][<?php echo $id ?>][default]" value="<?php echo $value ?>" title="<?php _e( 'this field is selected by default', 'mymail' );?>" <?php if ( isset( $data['default'] ) ) {
				checked( $data['default'], $value );
			}
			?><?php if ( !in_array( $data['type'], array( 'dropdown', 'radio' ) ) ) {
				echo ' disabled';
			}
			?>> <?php _e( 'default', 'mymail' );?></label> &nbsp; <a class="customfield-value-remove" title="<?php _e( 'remove field', 'mymail' );?>">&#10005;</a></span></li>
						<?php }?>
							</ul>
						<span>&nbsp;</span> <a class="customfield-value-add"><?php _e( 'add field', 'mymail' );?></a>
						</li>
					</ul>
					<div class="customfield-additional customfield-checkbox" <?php if ( in_array( $data['type'], array( 'checkbox' ) ) ) {
			echo ' style="display:block"';
		}
		?>>
						<span>&nbsp;</span> <label><input type="checkbox" name="mymail_options[custom_field][<?php echo $id ?>][default]" value="1" title="<?php _e( 'this field is selected by default', 'mymail' );?>" <?php if ( isset( $data['default'] ) ) {
			checked( $data['default'], true );
		}
		?> <?php if ( !in_array( $data['type'], array( 'checkbox' ) ) ) {
			echo ' disabled';
		}
		?>> <?php _e( 'checked by default', 'mymail' );?></label>
					</div>
					<a class="customfield-remove"><?php _e( 'remove field', 'mymail' );?></a>
					<br>
				</div>
				 <?php
	}
}
?>
			</div>
			<input type="button" value="<?php _e( 'add', 'mymail' )?>" class="button" id="mymail_add_field">
		</td>
	</tr>
</table>
