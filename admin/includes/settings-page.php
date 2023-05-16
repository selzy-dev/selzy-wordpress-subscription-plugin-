<?php
// create custom plugin settings menu
add_action( 'admin_menu', 'selzy_create_menu' );

function selzy_create_menu() {

	add_submenu_page( 'wpselzy',
		__( 'Selzy Settings', 'selzy' ),
		__( 'Settings', 'selzy' ),
		'wpselzy_manage_options',
		'wpselzy-settings',
		'selzy_settings_page'
	);

	//call register settings function
	add_action( 'admin_init', 'register_selzy_settings' );
}


function register_selzy_settings() {
	//register our settings
	register_setting( 'selzy-settings-group', 'wpselzy_api_key' );
	register_setting( 'selzy-settings-group', 'wpselzy_lang' );
}

function selzy_settings_page() {
	?>
    <div class="wrap">
        <h1><?php echo __( 'Selzy Settings', 'selzy' ) ?></h1>

        <form method="post" action="options.php">
			<?php settings_fields( 'selzy-settings-group' ); ?>
			<?php do_settings_sections( 'selzy-settings-group' ); ?>
            <table class="form-table">
                <tr valign="top">
                    <th scope="row">API key</th>
                    <td>
                        <input type="text" name="wpselzy_api_key"
                               value="<?php echo esc_attr( get_option( 'wpselzy_api_key' ) ); ?>" class="large-text"/>
                        <a href="https://selzy.com/ua/support/api/common/api-key/" target="_blank"
                           style="display: inline-block; margin-top: 10px;"><?php echo esc_attr( __( 'Where to get Selzy\'s API key', 'selzy') ); ?></a>
                    </td>
                </tr>
                <tr valign="top">
                    <th scope="row">Default Language</th>
                    <td>
                        <select name="wpselzy_lang" id="wpselzy_lang">
                            <option value=""<?php echo esc_attr( get_option( 'wpselzy_lang' ) ) === '' ? ' selected' : ''; ?>></option>
                            <option value="en"<?php echo get_option( 'wpselzy_lang' ) === 'en' ? ' selected' : ''; ?>>English</option>
                            <option value="pt"<?php echo get_option( 'wpselzy_lang' ) === 'pt' ? ' selected' : ''; ?>>Português</option>
                            <option value="uk"<?php echo get_option( 'wpselzy_lang' ) === 'uk' ? ' selected' : ''; ?>>Українська</option>
                            <option value="ru"<?php echo get_option( 'wpselzy_lang' ) === 'ru' ? ' selected' : ''; ?>>Русский</option>
                        </select>
                    </td>
                </tr>
            </table>

			<?php submit_button(); ?>

        </form>
    </div>
    <div id="wpselzy-form" data-lang="en"></div>
<?php } ?>