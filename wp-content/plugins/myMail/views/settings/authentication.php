<?php
/**
 *
 *
 * @author Xaver Birsak (https://revaxarts.com)
 * @package
 */


?>
	<?php
$spf = mymail_option( 'spf' );
$dkim = mymail_option( 'dkim' );
$spf_domain = mymail_option( 'spf_domain' );
?>
<p class="description"><?php _e( 'You need to change the namespace records of your domain if you would like to use one of these methods. Ask your provider how to add "TXT namespace records". Changes take some time to get published on all DNS worldwide.', 'mymail' );?></p>

<table class="form-table no-margin">
	<tr valign="top">
		<th scope="row">SPF Domain</th>
		<td><input type="text" name="mymail_options[spf_domain]" id="spf-domain" value="<?php echo esc_attr( $spf_domain ); ?>" class="regular-text dkim">
		<span class="description"><?php _e( 'The domain you would like to add a SPF record', 'mymail' );?></span>
		</td>
	</tr>
<?php if ( $spf_domain ): ?>
	<tr valign="top">
		<th scope="row">&nbsp;</th>
		<td>
<?php

	$records = mymail( 'helper' )->dns_query( $spf_domain, 'TXT' );

	$found = false;
	if ( $records ) {
		foreach ( $records as $r ) {
			if ( $r->type === 'TXT' && preg_match( '#v=spf1 #', $r->txt ) ) {
				$found = $r;
				break;
			}
		}
	}

	if ( $found ): ?>

						<div class="verified">
						<p><?php echo sprintf( __( 'Domain %s', 'mymail' ), '<strong>' . $spf_domain . '</strong>' ) . ': ' . __( 'TXT record found', 'mymail' ); ?>: <code><?php echo $found->txt ?></code></p>
						</div>

			<?php else: ?>
						<div class="not-verified"><p><?php echo sprintf( __( 'Domain %s', 'mymail' ), '<strong>' . $spf_domain . '</strong>' ) . ': ' . __( 'no TXT record found', 'mymail' ); ?></p>
						<p><?php echo sprintf( __( 'No or wrong record found for %s. Please adjust the namespace records and add these lines:', 'mymail' ), '<strong>' . $spf_domain . '</strong>' ); ?>
						</p>
						<?php
	$records = mymail( 'helper' )->dns_query( $spf_domain, 'A' );

	$ips = wp_list_pluck( (array) $records, 'ip' );
?>
					<dl>
						<dt><strong><?php echo $spf_domain; ?></strong> IN TXT</dt>
							<dd><textarea class="widefat" rows="1" id="spf-record">v=spf1 mx a ip4:<?php echo implode( ' ip4:', $ips ) ?> ~all</textarea></dd>
					</dl>
					</div>

	<?php endif;?>
			<p class="description"><?php echo sprintf( __( 'SPF doesn\'t require any configuration on this settings page. This should give you some help to set it up correctly. If this SPF configuration doesn\'t work or your mails returned as spam you should ask your provider for help or change your delivery method or try %s', 'mymail' ), '<a href="http://www.openspf.org/FAQ/Common_mistakes" class="external">' . __( 'to get help here', 'mymail' ) . '</a>' ); ?></p>
		</td>
	</tr>
	<?php endif;?>
</table>
<table class="form-table">
	<tr valign="top">
		<th scope="row"><h4>DKIM</h4></th>
		<td><label><input type="checkbox" name="mymail_options[dkim]" id="mymail_dkim" value="1" <?php checked( $dkim )?>> <?php _e( 'Use DomainKeys Identified Mail', 'mymail' )?>. <a href="http://en.wikipedia.org/wiki/DomainKeys_Identified_Mail" class="external"><?php _e( 'read more', 'mymail' )?></a></label> </td>
	</tr>
</table>
<div class="dkim-info" <?php if ( !$dkim ) {
	echo ' style="display:none"';
}
?>>
<table class="form-table no-margin">
<?php if ( $dkim && mymail_option( 'dkim_private_key' ) && mymail_option( 'dkim_public_key' ) ): ?>
	<tr valign="top">
		<th scope="row">&nbsp;</th>
		<td>
<?php

	$pubkey = trim( str_replace( array( '-----BEGIN PUBLIC KEY-----', '-----END PUBLIC KEY-----', "\n", "\r" ), '', mymail_option( 'dkim_public_key' ) ) );
	$record = 'k=rsa;t=y;' . "\n" . 'p=' . $pubkey;

	$dkim_domain = mymail_option( 'dkim_selector' ) . '._domainkey.' . mymail_option( 'dkim_domain' );
	$records = mymail( 'helper' )->dns_query( $dkim_domain, 'TXT' );

	$found = false;
	foreach ( (array) $records as $r ) {
		if ( $r->type === 'TXT' && preg_replace( '#[^a-zA-Z0-9]#s', '', $r->txt ) == preg_replace( '#[^a-zA-Z0-9]#s', '', $record ) ) {
			$found = $r;
			break;
		}
	}

	if ( $found ): ?>

		<div class="verified">
		<p><?php echo sprintf( __( 'Domain %s', 'mymail' ), '<strong>' . mymail_option( 'dkim_domain' ) . '</strong>' ) . ', Selector: <strong>' . mymail_option( 'dkim_selector' ) . '</strong>: ' . __( 'verified', 'mymail' ); ?></p>
		</div>

	<?php else: ?>

			<div class="not-verified"><p><?php echo sprintf( __( 'Domain %s', 'mymail' ), '<strong>' . mymail_option( 'dkim_domain' ) . '</strong>' ) . ': ' . __( 'not verified', 'mymail' ); ?></p>
				<p><?php echo sprintf( __( 'No or wrong record found for %s. Please adjust the namespace records and add these lines:', 'mymail' ), '<strong>' . $spf_domain . '</strong>' ); ?>
				</p>
				<dl>
					<dt><strong><?php echo '_domainkey.' . mymail_option( 'dkim_domain' ); ?></strong> IN TXT</dt>
						<dd><textarea class="widefat" rows="1" disabled>t=y;0=~</textarea></dd>
					<dt><strong><?php echo mymail_option( 'dkim_selector' ) . '._domainkey.' . mymail_option( 'dkim_domain' ) ?></strong> IN TXT</dt>
						<dd><textarea class="widefat" rows="4" disabled><?php echo $record ?></textarea></dd>
				</dl>
			</div>

	<?php endif;?>
		</td>
	</tr>

<?php endif;?>

	<tr valign="top">
		<th scope="row">DKIM Domain</th>
		<td><input type="text" name="mymail_options[dkim_domain]" value="<?php echo esc_attr( mymail_option( 'dkim_domain' ) ); ?>" class="regular-text dkim">
		<span class="description"><?php _e( 'The domain you have set the TXT namespace records', 'mymail' );?></span>
		</td>
	</tr>
	<tr valign="top">
		<th scope="row">DKIM Selector</th>
		<td><input type="text" name="mymail_options[dkim_selector]" value="<?php echo esc_attr( mymail_option( 'dkim_selector' ) ); ?>" class="regular-text dkim">
		<span class="description"><?php _e( 'The selector is used to identify the keys used to attach a token to the email', 'mymail' );?></span>
		</td>
	</tr>
	<tr valign="top">
		<th scope="row">DKIM Identity</th>
		<td><input type="text" name="mymail_options[dkim_identity]" value="<?php echo esc_attr( mymail_option( 'dkim_identity' ) ); ?>" class="regular-text dkim">
		<span class="description"><?php _e( 'You can leave this field blank unless you know what you do', 'mymail' );?></span>
		</td>
	</tr>
	<tr valign="top">
		<th scope="row">DKIM Pass Phrase</th>
		<td><input type="text" name="mymail_options[dkim_passphrase]" value="<?php echo esc_attr( mymail_option( 'dkim_passphrase' ) ); ?>" class="regular-text dkim">
		<span class="description"><?php _e( 'You can leave this field blank unless you know what you do', 'mymail' );?></span>
		</td>
	</tr>
</table>
<table class="form-table">
	<tr valign="top">
		<th scope="row"><h4><?php _e( 'Keys', 'mymail' );?></h4></th>
		<td>
		<p class="description">
		<?php _e( 'If you have defined the domain and a selector you have to generate a public and a private key. Once created you have to add some TXT namespace records at your mail provider', 'mymail' );?>.
		<?php _e( "DKIM often doesn't work out of the box. You may have to contact your email provider to get more information", 'mymail' );?>.
		<?php _e( "Changing namespace entries can take up to 48 hours to take affect around the world.", 'mymail' );?>.
		<?php _e( "It's recommend to change the keys occasionally", 'mymail' );?>.
		<?php _e( "If you change one of the settings above new keys are required", 'mymail' );?>.
		<?php _e( "Some providers don't allow TXT records with a specific size. Choose less bits in this case", 'mymail' );?>.
		</p>
		</td>
	</tr>
</table>
<?php if ( $dkim && mymail_option( 'dkim_private_key' ) && mymail_option( 'dkim_public_key' ) ): ?>
<table class="form-table" id="dkim_keys_active">
	<tr valign="top">
		<th scope="row">DKIM Public Key</th>
		<td><textarea name="mymail_options[dkim_public_key]" rows="10" cols="40" class="large-text code"><?php echo esc_attr( mymail_option( 'dkim_public_key' ) ); ?></textarea>
	</tr>
	<tr valign="top">
		<th scope="row">DKIM Private Key
			<p class="description">
		<?php _e( 'Private keys should be kept private. Don\'t share them or post it somewhere', 'mymail' );?>
		</p>
		</th>
		<td><textarea name="mymail_options[dkim_private_key]" rows="10" cols="40" class="large-text code"><?php echo esc_attr( mymail_option( 'dkim_private_key' ) ); ?></textarea>
		<input type="hidden" name="mymail_options[dkim_private_hash]" value="<?php echo esc_attr( mymail_option( 'dkim_private_hash' ) ); ?>" class="regular-text dkim"></td>
	</tr>
</table>
<?php endif;?>
<table class="form-table">
	<tr valign="top">
		<th scope="row"><?php _e( 'new Keys', 'mymail' );?></th>
		<td>
		<p class="dkim-create-keys">
			<?php $bitsize = mymail_option( 'dkim_bitsize', 512 );?>
			<?php _e( 'Bit Size', 'mymail' );?>:
			<label> <input type="radio" name="mymail_options[dkim_bitsize]" value="512" <?php checked( $bitsize, 512 )?>> 512</label>&nbsp;
			<label> <input type="radio" name="mymail_options[dkim_bitsize]" value="768" <?php checked( $bitsize, 768 )?>> 768</label>&nbsp;
			<label> <input type="radio" name="mymail_options[dkim_bitsize]" value="1024" <?php checked( $bitsize, 1024 )?>> 1024</label>&nbsp;
			<label> <input type="radio" name="mymail_options[dkim_bitsize]" value="2048" <?php checked( $bitsize, 2048 )?>> 2048</label>&nbsp;
			<input type="submit" class="button-primary" value="<?php _e( 'generate Keys', 'mymail' )?>" name="mymail_generate_dkim_keys" id="mymail_generate_dkim_keys" />
		</p>
		</td>
	</tr>
</table>
</div>
