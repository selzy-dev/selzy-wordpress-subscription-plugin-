<?php
/**
 * @var $post_id string
 * @var $post WPSELZY_Form
 */

// don't load directly
if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}

function wpselzy_admin_save_button( $post_id ) {
	static $button = '';

	if ( ! empty( $button ) ) {
		echo $button;

		return;
	}

	$nonce = wp_create_nonce( 'wpselzy-save-form_' . $post_id );

	$onclick = sprintf(
		"this.form._wpnonce.value = '%s';"
		. " this.form.action.value = 'save';"
		. " return true;",
		$nonce );

	$button = sprintf(
		'<input type="submit" class="button-primary" name="wpselzy-save" value="%1$s" onclick="%2$s" />',
		esc_attr( __( 'Save', 'selzy' ) ),
		$onclick );

	echo $button;
}

?>
    <div class="wrap" id="wpselzy-form-editor">

        <h1 class="wp-heading-inline"><?php
			if ( $post->initial() ) {
				echo esc_html( __( 'Add new form', 'selzy' ) );
			} else {
				echo esc_html( __( 'Edit form', 'selzy' ) );
			}
			?></h1>

		<?php
		if ( ! $post->initial()
		     and current_user_can( 'wpselzy_edit_forms' ) ) {
			echo wpselzy_link(
				menu_page_url( 'wpselzy-new', false ),
				__( 'Add new', 'selzy' ),
				array( 'class' => 'page-title-action' )
			);
		}
		?>

        <hr class="wp-header-end">

		<?php
		do_action( 'wpselzy_admin_warnings',
			$post->initial() ? 'wpselzy-new' : 'wpselzy',
			wpselzy_current_action(),
			$post
		);

		do_action( 'wpselzy_admin_notices',
			$post->initial() ? 'wpselzy-new' : 'wpselzy',
			wpselzy_current_action(),
			$post
		);
		?>

		<?php
		if ( $post ) :

			if ( current_user_can( 'wpselzy_edit_form', $post_id ) ) {
				$disabled = '';
			} else {
				$disabled = ' disabled="disabled"';
			}
			?>

            <form method="post" novalidate
                  action="<?php echo esc_url( add_query_arg( array( 'post' => $post_id ),
				      menu_page_url( 'wpselzy', false ) ) ); ?>"
                  id="wpselzy-admin-form-element"<?php do_action( 'wpselzy_post_edit_form_tag' ); ?>>
				<?php
				if ( current_user_can( 'wpselzy_edit_form', $post_id ) ) {
					wp_nonce_field( 'wpselzy-save-form_' . $post_id );
				}
				?>
                <input type="hidden" id="post_ID" name="post_ID" value="<?php echo (int) $post_id; ?>"/>
                <input type="hidden" id="wpselzy-locale" name="wpselzy-locale"
                       value="<?php echo esc_attr( $post->locale() ); ?>"/>
                <input type="hidden" id="hiddenaction" name="action" value="save"/>

                <div id="poststuff">
                    <div id="post-body" class="metabox-holder columns-2">
                        <div id="post-body-content">
                            <div id="titlediv">
                                <div id="titlewrap">
                                    <label class="screen-reader-text" id="title-prompt-text"
                                           for="title"><?php echo esc_html( __( 'Enter name here',
											'selzy' ) ); ?></label>
									<?php
									$posttitle_atts = [
										'type'         => 'text',
										'name'         => 'post_title',
										'size'         => 30,
										'value'        => $post->initial() ? '' : $post->title(),
										'id'           => 'title',
										'spellcheck'   => 'true',
										'autocomplete' => 'off',
										'disabled'     =>
											current_user_can( 'wpselzy_edit_form', $post_id ) ? '' : 'disabled',
									];

									echo sprintf( '<input %s />', wpselzy_format_atts( $posttitle_atts ) );
									?>
                                </div><!-- #titlewrap -->

                                <div class="inside">
									<?php
									if ( ! $post->initial() ) :
										?>
                                        <p class="description">
                                            <label for="wpselzy-shortcode"><?php echo esc_html( __( "Copy this shortcode and paste it into your post, page or text widget:",
													'selzy' ) ); ?></label>
                                            <span class="shortcode wp-ui-highlight"><input type="text"
                                                                                           id="wpselzy-shortcode"
                                                                                           onfocus="this.select();"
                                                                                           readonly="readonly"
                                                                                           class="large-text code"
                                                                                           value="<?php echo esc_attr( $post->shortcode() ); ?>"/></span>
                                        </p>
									<?php
									endif;
									?>
                                    <div id="metadiv">
                                        <table class="form-table">
                                            <tbody>
                                            <tr>
                                                <th scope="row"><?php echo esc_html( __( 'Link to Selzy list:', 'selzy' ) ) ?></th>
                                                <td>
													<?php
													$contact_lists         = $post->get_contact_lists();
													$contact_list_selected = esc_attr( $post->prop( 'contact_list' ) ); ?>
                                                    <select name="wpselzy-contact-list"
                                                            id="wpselzy-contact-list">
                                                        <option value=""></option>
														<?php foreach ( $contact_lists as $contact_list ) : ?>
                                                            <option <?php if ( $contact_list['id'] == $contact_list_selected ) {
																echo 'selected="selected"';
															} ?> value="<?= $contact_list['id'] ?>"><?= $contact_list['title'] ?></option>
														<?php endforeach; ?>
                                                    </select>
                                                </td>
                                            </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div><!-- #titlediv -->
                        </div><!-- #post-body-content -->

                        <div id="postbox-container-1" class="postbox-container">
							<?php if ( current_user_can( 'wpselzy_edit_form', $post_id ) ) : ?>
                                <div id="submitdiv" class="postbox">
                                    <h3><?php echo esc_html( __( 'Status', 'selzy' ) ); ?></h3>
                                    <div class="inside">
                                        <div class="submitbox" id="submitpost">

                                            <div id="minor-publishing-actions">

                                                <div class="hidden">
                                                    <input type="submit" class="button-primary" name="wpselzy-save"
                                                           value="<?php echo esc_attr( __( 'Save', 'selzy' ) ); ?>"/>
                                                </div>

												<?php
												if ( ! $post->initial() ) :
													$copy_nonce = wp_create_nonce( 'wpselzy-copy-form_' . $post_id );
													?>
                                                    <input type="submit" name="wpselzy-copy" class="copy button"
                                                           value="<?php echo esc_attr( __( 'Duplicate',
														       'selzy' ) ); ?>" <?php echo "onclick=\"this.form._wpnonce.value = '$copy_nonce'; this.form.action.value = 'copy'; return true;\""; ?> />
												<?php endif; ?>
                                            </div><!-- #minor-publishing-actions -->

                                            <div id="misc-publishing-actions">
												<?php do_action( 'wpselzy_admin_misc_pub_section', $post_id ); ?>
                                            </div><!-- #misc-publishing-actions -->

                                            <div id="major-publishing-actions">

												<?php
												if ( ! $post->initial() ) :
													$delete_nonce = wp_create_nonce( 'wpselzy-delete-form_' . $post_id );
													?>
                                                    <div id="delete-action">
                                                        <input type="submit" name="wpselzy-delete"
                                                               class="delete submitdelete"
                                                               value="<?php echo esc_attr( __( 'Delete',
															       'selzy' ) ); ?>" <?php echo "onclick=\"if (confirm('" . esc_js( __( "Are you sure your want to delete this form?",
																'selzy' ) ) . "')) {this.form._wpnonce.value = '$delete_nonce'; this.form.action.value = 'delete'; return true;} return false;\""; ?> />
                                                    </div><!-- #delete-action -->
												<?php endif; ?>

                                                <div id="publishing-action">
                                                    <span class="spinner"></span>
													<?php wpselzy_admin_save_button( $post_id ); ?>
                                                </div>
                                                <div class="clear"></div>
                                            </div><!-- #major-publishing-actions -->
                                        </div><!-- #submitpost -->
                                    </div>
                                </div><!-- #submitdiv -->
							<?php endif; ?>

                        </div><!-- #postbox-container-1 -->

                        <div id="postbox-container-2" class="postbox-container">

                            <div id="form-editor">
                                <!--                        <textarea id="wpselzy-form" name="wpselzy-form" cols="100" rows="24"-->
                                <!--                                  class="large-text code">-->
								<?php //echo esc_textarea($post->prop('form'));
								?><!--</textarea>-->
								<?php
								$api_key = get_option( 'wpselzy_api_key' );
								$api     = new \Selzy\ApiWrapper\SelzyApi( $api_key );
								$fields  = json_decode( $api->getFields() );
                                $language = substr( determine_locale(), 0, 2);
								if ( ! empty( get_option( 'wpselzy_lang' ) ) ) {
									$language = get_option( 'wpselzy_lang' );
								}
								?>
                                <script>
                                    const SELZY_ADDITIONAL_FIELDS = '<?= json_encode( $fields->result, JSON_HEX_APOS ) ?>';
                                </script>
                                <input type="hidden" id="wpselzy-form" name="wpselzy-form"
                                       data-selzy-hidden-field
                                       data-lang="<?= $language ?>"
                                       value="<?php echo esc_textarea( $post->prop( 'form' ) ); ?>">
                                <div id="selzy-form-builder"></div>
                            </div><!-- #form-editor -->

							<?php if ( current_user_can( 'wpselzy_edit_form', $post_id ) ) : ?>
                                <p class="submit"><?php wpselzy_admin_save_button( $post_id ); ?></p>
							<?php endif; ?>

                        </div><!-- #postbox-container-2 -->

                    </div><!-- #post-body -->
                    <br class="clear"/>
                </div><!-- #poststuff -->
            </form>

		<?php endif; ?>

    </div><!-- .wrap -->

<?php

do_action( 'wpselzy_admin_footer', $post );
