<?php
if ( defined( 'ABSPATH' ) ) { ?>
<aside class="widget widget_meta">
	<h2 class="widget-title"><?php esc_html_e( $title ) ?></h2>
	<p class="site-description"><?php esc_html_e( $description ) ?></p>
	<form action="<?php echo get_site_url() . '/index.php?my-plugin=sarbacane' ?>" method="POST" id="sarbacane_desktop_widget_form_<?php echo $list_type . $rand ?>" autocomplete="off">
		<?php foreach ( $fields as $field ) {
			if ( !isset( $field->placeholder ) ) {
				$field->placeholder = '';
			}
			if ( strtolower( $field->label ) == 'email' ) {
				$label = esc_html( __( 'Email', 'sarbacane-desktop' ) );
				$field_type = 'email';
				$name = 'email';
				$id = 'email' . '_' . $list_type . $rand;
			} else {
				$label = esc_html( $field->label );
				$field_type = 'text';
				$name = esc_attr( $field->label );
				$id = esc_attr( $field->label ) . '_' . $list_type . $rand;
			}
			?>
			<p>
				<label><?php echo $label ?><?php if ( $field->mandatory ) { ?> *<?php } ?></label>
				<br />
				<input type="<?php echo $field_type ?>" id="<?php echo $id ?>" name="<?php echo $name ?>" placeholder="<?php esc_attr_e( $field->placeholder ) ?>"<?php if ( $field->mandatory ) { ?> required class="required"<?php } ?>/>
			</p>
		<?php } ?>
		<p><?php esc_html_e( $registration_mandatory_fields ) ?></p>
		<?php wp_nonce_field( 'newsletter_registration', 'sarbacane_form_token' ) ?>
		<input type="hidden" name="sarbacane_form_value" class="sarbacane_form_value" value=""/>
		<input type="button" value="<?php esc_attr_e( $registration_button ) ?>" onclick="sarbacaneSubmitWidget( '<?php echo $list_type . $rand ?>' )"/>
	</form>
</aside>
<?php } ?>
