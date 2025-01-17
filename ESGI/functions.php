<?php
//for the styles
add_action('wp_enqueue_scripts', 'esgi_enqueue_scripts');
function esgi_enqueue_scripts() {
    wp_enqueue_script('menu-script', get_template_directory_uri() . '/assets/menu.js', array('jquery'), null, true);
    wp_enqueue_style('main', get_stylesheet_uri());
    wp_enqueue_style('font-awesome', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css');

    wp_localize_script('menu-script', 'esgiIcons', [
        'menuOpen' => esgi_get_icon('menu_open'),
        'menuClose' => esgi_get_icon('menu_close'),
        'logo' => esgi_get_icon('logo'),
        'originalLogo' => get_custom_logo(),
        'menuOpenWhite' => esgi_get_icon('menu_open_white')
    ]);
}

//for the admin styles
add_action('admin_enqueue_scripts', 'esgi_enqueue_admin_styles');
function esgi_enqueue_admin_styles() {
    wp_enqueue_style('admin-styles', get_template_directory_uri() . '/admin-styles.css');
}


add_action('after_setup_theme', 'esgi_register_nav_menu');
function esgi_register_nav_menu()
{
    register_nav_menus([
        'primary_menu' => __('Primary Menu', 'esgi-theme'),
        'footer_menu' => __('Footer Menu', 'esgi-theme')
    ]);
}

// add support for custom logo and post thumbnails
add_action('after_setup_theme', 'esgi_theme_setup');
function esgi_theme_setup()
{
    add_theme_support('custom-logo');
    add_theme_support('post-thumbnails');
}

function esgi_get_icon($name)
{
    $facebook = '<svg width="11" height="20" viewBox="0 0 11 20" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M2.99609 20V11.0547H0V7.5H2.99609V4.69922C2.99609 1.65625 4.85547 0 7.57031 0C8.87109 0 9.98828 0.0976562 10.3125 0.140625V3.32031H8.42969C6.95312 3.32031 6.66797 4.02344 6.66797 5.05078V7.5H10L9.54297 11.0547H6.66797V20" fill="white"/></svg>';
    $linkedin = '<svg width="21" height="20" viewBox="0 0 21 20" fill="none" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" clip-rule="evenodd" d="M2.40179 4.82589C1.07589 4.82589 0 3.72768 0 2.40179C0 1.07589 1.07589 0 2.40179 0C3.72768 0 4.80357 1.07589 4.80357 2.40179C4.80357 3.72768 3.72768 4.82589 2.40179 4.82589ZM4.47768 20H0.330357V6.64732H4.47768V20ZM15.8616 20H20H20.0045V12.6652C20.0045 9.07589 19.2321 6.3125 15.0357 6.3125C13.0179 6.3125 11.6652 7.41964 11.1116 8.46875H11.0536V6.64732H7.07589V20H11.2188V13.3884C11.2188 11.6473 11.5491 9.96429 13.7054 9.96429C15.8304 9.96429 15.8616 11.9509 15.8616 13.5V20Z" fill="white"/></svg>';
    $menu_open = '<svg width="40" height="10" viewBox="0 0 40 10" fill="none" xmlns="http://www.w3.org/2000/svg"><rect width="40" height="3" fill="#050A3A"/><rect x="19" y="7" width="21" height="3" fill="#050A3A"/></svg>';
    $menu_close = '<svg width="17" height="17" viewBox="0 0 17 17" fill="none" xmlns="http://www.w3.org/2000/svg"><rect x="2.13605" y="0.0147705" width="21" height="3" transform="rotate(45 2.13605 0.0147705)" fill="white"/><rect x="16.9706" y="2.12134" width="21" height="3" transform="rotate(135 16.9706 2.12134)" fill="white"/></svg>';
    $menu_open_white = '<svg width="40" height="10" viewBox="0 0 40 10" fill="none" xmlns="http://www.w3.org/2000/svg"><rect width="40" height="3" fill="white"/><rect x="19" y="7" width="21" height="3" fill="white"/></svg>';
    $logo = '<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="150" height="150" version="1.0" viewBox="0 0 112.5 112.5"><image xlink:href="data:image/jpeg;base64,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" width="150" height="150" transform="scale(.74668)"/></svg>';
    return isset($$name) ? $$name : '';
}


// Add customizer options
if (class_exists('WP_Customize_Control')) {
    class WP_Customize_Heading_Control extends WP_Customize_Control {
        public $type = 'heading';

        public function render_content() {
            if (isset($this->label)) {
                echo '<h2 style="margin: 15px 0; border-bottom: 1px solid #ccc;">' . esc_html($this->label) . '</h2>';
            }
            if (isset($this->description)) {
                echo '<p>' . esc_html($this->description) . '</p>';
            }
        }
    }
}

add_action('customize_register', 'esgi_customize_register');
function esgi_customize_register($wp_customize) {
    // Ajout de la section Paramètres ESGI
    $wp_customize->add_section('esgi_section', [
        'title' => __('Paramètres ESGI'),
        'description' => __('Personnalisez votre thème ESGI'),
        'panel' => '',
        'priority' => 160,
        'capability' => 'edit_theme_options',
        'theme_supports' => '',
    ]);


    $wp_customize->add_setting('main_color', [
        'type' => 'theme_mod',
        'capability' => 'edit_theme_options',
        'theme_supports' => '',
        'default' => '',
        'transport' => 'refresh',
        'sanitize_callback' => 'sanitize_hex_color',
        'sanitize_js_callback' => '',
    ]);

    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'main_color', [
        'label' => __('Couleur principale', 'ESGI'),
        'section' => 'esgi_section',
    ]));

    $wp_customize->add_control('is_dark', [
        'type' => 'checkbox',
        'priority' => 0,
        'section' => 'esgi_section',
        'label' => __('Dark mode'),
        'description' => __('Black is beautiful.'),
    ]);


    $wp_customize->add_setting('is_dark', [
        'type' => 'theme_mod',
        'capability' => 'edit_theme_options',
        'theme_supports' => '',
        'default' => '',
        'transport' => 'refresh',
        'sanitize_callback' => 'esgi_sanitize_bool',
        'sanitize_js_callback' => '',
    ]);

    $wp_customize->add_control('is_dark', [
        'type' => 'checkbox',
        'priority' => 0,
        'section' => 'esgi_section',
        'label' => __('Dark mode'),
        'description' => __('Black is beautiful.'),
    ]);

    // section partners
    $wp_customize->add_section('esgi_partners', array(
        'title' => __('Partenaires', 'esgi'),
        'description' => __('Personnaliser les partenaires', 'esgi'),
        'priority' => 1,
    ));

    $num_partners = 6; // nombre de partenaires

    for ($i = 1; $i <= $num_partners; $i++) {
        // Ajout du parametre logo partner
        $wp_customize->add_setting('esgi_partners_logo_' . $i, array(
            'default' => get_template_directory_uri() . '/assets/images/svg/partner-' . $i . '.svg',
            'description' => __('Logo du partenaire ' . $i, 'esgi'),
            'sanitize_callback' => 'esc_url_raw',
        ));
        // Ajour d'un controle logo partner
        $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'esgi_partners_logo_' . $i, array(
            'label' => __('Logo du partenaire ' . $i, 'esgi'),
            'section' => 'esgi_partners',
            'settings' => 'esgi_partners_logo_' . $i,
        )));
    }

    // section team members
    $wp_customize->add_section('esgi_team', array(
        'title' => __('Membres de L\'équipe', 'esgi'),
        'description' => __('Ajouter les membres de l\'équipe', 'esgi'),
        'priority' => 2,
    ));

    $members = 5; // number of team members

    for ($i = 1; $i <= $members; $i++) {

        // Add a heading for each team member
        $wp_customize->add_control(new WP_Customize_Heading_Control($wp_customize, 'esgi_member_heading_' . $i, array(
            'label' => __('Membre ' . $i, 'esgi'),
            'section' => 'esgi_team',
            'settings' => array(),
        )));

        // Name
        $wp_customize->add_setting('esgi_member_name_' . $i, array(
            'description' => __('Name du membre ' . $i, 'esgi'),
            'sanitize_callback' => 'sanitize_text_field',
        ));

        $wp_customize->add_control('esgi_member_name_' . $i, array(
            'label' => __('Name du membre ' . $i, 'esgi'),
            'section' => 'esgi_team',
            'settings' => 'esgi_member_name_' . $i,
            'type' => 'text',
        ));

        // Photo
        $wp_customize->add_setting('esgi_member_photo_' . $i, array(
            'description' => __('Photo du membre ' . $i, 'esgi'),
            'sanitize_callback' => 'esc_url_raw',
        ));

        $wp_customize->add_control(new WP_Customize_Image_control($wp_customize, 'esgi_member_photo_' . $i, array(
            'label' => __('Photo du membre ' . $i, 'esgi'),
            'section' => 'esgi_team',
            'settings' => 'esgi_member_photo_' . $i,
        )));

        // Email
        $wp_customize->add_setting('esgi_member_email_' . $i, array(
            'description' => __('Email du membre ' . $i, 'esgi'),
            'sanitize_callback' => 'sanitize_email',
        ));

        $wp_customize->add_control('esgi_member_email_' . $i, array(
            'label' => __('Email du membre ' . $i, 'esgi'),
            'section' => 'esgi_team',
            'settings' => 'esgi_member_email_' . $i,
            'type' => 'email',
        ));

        // Phone
        $wp_customize->add_setting('esgi_member_number_' . $i, array(
            'description' => __('Numéro du membre ' . $i, 'esgi'),
            'sanitize_callback' => 'sanitize_text_field',
        ));

        $wp_customize->add_control('esgi_member_number_' . $i, array(
            'label' => __('Numéro du membre ' . $i, 'esgi'),
            'section' => 'esgi_team',
            'settings' => 'esgi_member_number_' . $i,
            'type' => 'text',
        ));

        // Position
        $wp_customize->add_setting('esgi_member_position_' . $i, array(
            'description' => __('Position du membre ' . $i, 'esgi'),
            'sanitize_callback' => 'sanitize_text_field',
        ));

        $wp_customize->add_control('esgi_member_position_' . $i, array(
            'label' => __('Position du membre ' . $i, 'esgi'),
            'section' => 'esgi_team',
            'settings' => 'esgi_member_position_' . $i,
            'type' => 'text',
        ));
    }

    // section team members
    $wp_customize->add_section('esgi_location', array(
        'title' => __('Adresse', 'esgi'),
        'description' => __('Ajouter l\'adresse de l\'entreprise', 'esgi'),
        'priority' => 3,
    ));


        $wp_customize->add_control(new WP_Customize_Heading_Control($wp_customize, 'esgi_location_heading', array(
            'label' => __('Adresse', 'esgi'),
            'section' => 'esgi_location',
            'settings' => array(),
        )));

        // Rue
        $wp_customize->add_setting('esgi_location_street', array(
            'description' => __('Rue ', 'esgi'),
            'sanitize_callback' => 'sanitize_text_field',
        ));

        $wp_customize->add_control('esgi_location_street', array(
            'label' => __('Rue', 'esgi'),
            'section' => 'esgi_location',
            'settings' => 'esgi_location_street',
            'type' => 'text',
        ));


        // Code Postal
        $wp_customize->add_setting('esgi_location_code', array(
            'description' => __('Code Postal ', 'esgi'),
            'sanitize_callback' => 'sanitize_text_field',
        ));

        $wp_customize->add_control('esgi_location_code', array(
            'label' => __('Code Postal', 'esgi'),
            'section' => 'esgi_location',
            'settings' => 'esgi_location_code',
            'type' => 'text',
        ));

    // Add a section for the sidebar settings
    $wp_customize->add_section( 'esgi_sidebar_section', array(
        'title'    => __( 'Sidebar Settings', 'esgi' ),
        'priority' => 30,
    ) );

    // Add setting for sidebar visibility
    $wp_customize->add_setting('has_sidebar', [
        'type' => 'theme_mod',
        'capability' => 'edit_theme_options',
        'theme_supports' => '',
        'default' => '',
        'transport' => 'refresh',
        'sanitize_callback' => 'esgi_sanitize_bool',
        'sanitize_js_callback' => '',
    ]);

    // Add control for sidebar visibility
    $wp_customize->add_control('has_sidebar', [
        'type' => 'checkbox',
        'priority' => 20,
        'section' => 'esgi_sidebar_section',
        'label' => __('Afficher la sidebar'),
        'description' => __(''),
    ]);

    // Add setting for sidebar background color
    $wp_customize->add_setting( 'sidebar_bg_color', array(
        'default'           => '#ffffff',
        'sanitize_callback' => 'sanitize_hex_color',
        'transport'         => 'refresh',
    ) );

    // Add control for sidebar background color
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'sidebar_bg_color_control', array(
        'label'    => __( 'Sidebar Background Color', 'esgi' ),
        'section'  => 'esgi_sidebar_section',
        'settings' => 'sidebar_bg_color',
    ) ) );

    // Add setting for sidebar text color
    $wp_customize->add_setting( 'sidebar_text_color', array(
        'default'           => '#000000',
        'sanitize_callback' => 'sanitize_hex_color',
        'transport'         => 'refresh',
    ) );

    // Add control for sidebar text color
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'sidebar_text_color_control', array(
        'label'    => __( 'Sidebar Text Color', 'esgi' ),
        'section'  => 'esgi_sidebar_section',
        'settings' => 'sidebar_text_color',
    ) ) );

}

// Add customizer styles
function esgi_get_partners()
{
    $partners = array();
    $num_partners = 6;
    for ($i = 1; $i <= $num_partners; $i++) {
        $partners['logo_' . $i] = get_theme_mod('esgi_partners_logo_' . $i);
    }
    return $partners;
}

function esgi_get_team()
{
    $team = array();
    $members = 5;
    for ($i = 1; $i <= $members; $i++) {
        $team[] = array(
            'name' => get_theme_mod('esgi_member_name_' . $i),
            'photo' => get_theme_mod('esgi_member_photo_' . $i),
            'email' => get_theme_mod('esgi_member_email_' . $i),
            'number' => get_theme_mod('esgi_member_number_' . $i),
            'position' => get_theme_mod('esgi_member_position_' . $i),
        );
    }
    return $team;
}

function esgi_get_location()
{
    $location = array();
    $location[] = array(
        'street' => get_theme_mod('esgi_location_street'),
        'code' => get_theme_mod('esgi_location_code'),
    );
    return $location;
}

// Sanitization callback function
function esgi_sanitize_bool($checked) {
    return ( ( isset( $checked ) && true == $checked ) ? true : false );
}

add_action('add_meta_boxes', 'esgi_add_custom_meta_boxes');
function esgi_add_custom_meta_boxes() {
    global $post;
    $template_file = get_post_meta($post->ID, '_wp_page_template', true);
    if ($template_file == 'page-about-us.php') { // Only add meta boxes if the template is 'page-about-us.php'
        add_meta_box(
            'custom_section_meta_box', // Unique ID
            'Custom Section', // Box title
            'custom_section_meta_box_html', // Content callback, must be of type callable
            'page', // Post type
            'side', // Context
            'high' // Priority
        );
    }
}

function custom_section_meta_box_html($post) {
    $information_title1 = get_post_meta($post->ID, '_information_title1', true);
    $information_content1 = get_post_meta($post->ID, '_information_content1', true);
    $information_title2 = get_post_meta($post->ID, '_information_title2', true);
    $information_content2 = get_post_meta($post->ID, '_information_content2', true);
    $information_title3 = get_post_meta($post->ID, '_information_title3', true);
    $information_content3 = get_post_meta($post->ID, '_information_content3', true);
    $information_photo = get_post_meta($post->ID, '_information_photo', true);

    // Add nonce for security and authentication
    wp_nonce_field('save_custom_meta_box_data', 'custom_meta_box_nonce');

    ?>
    <label for="information_title1"><?php _e('Information Title 1', 'textdomain'); ?></label>
    <input type="text" id="information_title1" name="information_title1" value="<?php echo esc_attr($information_title1); ?>" />

    <label for="information_content1"><?php _e('Information Content 1', 'textdomain'); ?></label>
    <textarea id="information_content1" name="information_content1" rows="4" cols="50"><?php echo esc_textarea($information_content1); ?></textarea>

    <label for="information_title2"><?php _e('Information Title 2', 'textdomain'); ?></label>
    <input type="text" id="information_title2" name="information_title2" value="<?php echo esc_attr($information_title2); ?>" />

    <label for="information_content2"><?php _e('Information Content 2', 'textdomain'); ?></label>
    <textarea id="information_content2" name="information_content2" rows="4" cols="50"><?php echo esc_textarea($information_content2); ?></textarea>

    <label for="information_title3"><?php _e('Information Title 3', 'textdomain'); ?></label>
    <input type="text" id="information_title3" name="information_title3" value="<?php echo esc_attr($information_title3); ?>" />

    <label for="information_content3"><?php _e('Information Content 3', 'textdomain'); ?></label>
    <textarea id="information_content3" name="information_content3" rows="4" cols="50"><?php echo esc_textarea($information_content3); ?></textarea>

    <label for="information_photo"><?php _e('Information Photo', 'textdomain'); ?></label>
    <input type="file" id="information_photo" name="information_photo" />

    <?php if ($information_photo) : ?>
        <img src="<?php echo esc_url($information_photo); ?>" alt="<?php _e('Uploaded photo', 'textdomain'); ?>" style="max-width: 100%; height: auto;" />
    <?php endif; ?>
    <?php //image type should be changed
}

add_action('save_post', 'esgi_save_custom_meta_box_data');
function esgi_save_custom_meta_box_data($post_id) {
    // Check if our nonce is set.
    if (!isset($_POST['custom_meta_box_nonce'])) {
        return;
    }
    // Verify that the nonce is valid.
    if (!wp_verify_nonce($_POST['custom_meta_box_nonce'], 'save_custom_meta_box_data')) {
        return;
    }
    // If this is an autosave, our form has not been submitted, so we don't want to do anything.
    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
        return;
    }
    // Check the user's permissions.
    if (!current_user_can('edit_post', $post_id)) {
        return;
    }

    // Save or update each field
    if (array_key_exists('information_title1', $_POST)) {
        update_post_meta(
            $post_id,
            '_information_title1',
            sanitize_text_field($_POST['information_title1'])
        );
    }
    if (array_key_exists('information_content1', $_POST)) {
        update_post_meta(
            $post_id,
            '_information_content1',
            sanitize_textarea_field($_POST['information_content1'])
        );
    }
    if (array_key_exists('information_title2', $_POST)) {
        update_post_meta(
            $post_id,
            '_information_title2',
            sanitize_text_field($_POST['information_title2'])
        );
    }
    if (array_key_exists('information_content2', $_POST)) {
        update_post_meta(
            $post_id,
            '_information_content2',
            sanitize_textarea_field($_POST['information_content2'])
        );
    }
    if (array_key_exists('information_title3', $_POST)) {
        update_post_meta(
            $post_id,
            '_information_title3',
            sanitize_text_field($_POST['information_title3'])
        );
    }
    if (array_key_exists('information_content3', $_POST)) {
        update_post_meta(
            $post_id,
            '_information_content3',
            sanitize_textarea_field($_POST['information_content3'])
        );
    }
    if (!empty($_FILES['information_photo']['name'])) {
        $supported_types = array('image/jpeg', 'image/png', 'image/gif');
        $arr_file_type = wp_check_filetype(basename($_FILES['information_photo']['name']));
        $uploaded_type = $arr_file_type['type'];

        if (in_array($uploaded_type, $supported_types)) {
            $upload = wp_upload_bits($_FILES['information_photo']['name'], null, file_get_contents($_FILES['information_photo']['tmp_name']));
            if (isset($upload['url']) && $upload['url'] != '') {
                update_post_meta($post_id, '_information_photo', esc_url($upload['url']));
            }
        }
    }
}

add_action('add_meta_boxes', 'esgi_add_custom_meta_description');
function esgi_add_custom_meta_description() {
    global $post;
    $template_file = get_post_meta($post->ID, '_wp_page_template', true);
    if ($template_file == 'page-about-us.php') {
        add_meta_box(
            'description_meta_box',
            'Description and Slogan',
            'description_meta_box_html',
            'page',
            'normal',
            'default'
        );
    }
}

function description_meta_box_html($post) {
    $description = get_post_meta($post->ID, '_custom_page_description', true);
    $slogan = get_post_meta($post->ID, '_custom_page_slogan', true);
    wp_nonce_field('save_custom_page_description', 'custom_page_description_nonce');
    ?>
    <label for="custom_page_description"><?php _e('Page Description', 'textdomain'); ?></label>
    <textarea name="custom_page_description" id="custom_page_description" rows="4" style="width: 100%;"><?php echo esc_textarea($description); ?></textarea>

    <label for="custom_page_slogan"><?php _e('Page Slogan', 'textdomain'); ?></label>
    <input type="text" name="custom_page_slogan" id="custom_page_slogan" value="<?php echo esc_attr($slogan); ?>" style="width: 100%;" />
    <?php
}

add_action('save_post', 'save_custom_page_description');
function save_custom_page_description($post_id) {
    if (!isset($_POST['custom_page_description_nonce']) || !wp_verify_nonce($_POST['custom_page_description_nonce'], 'save_custom_page_description')) {
        return;
    }

    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
        return;
    }

    if (!current_user_can('edit_post', $post_id)) {
        return;
    }

    if (isset($_POST['custom_page_description'])) {
        update_post_meta($post_id, '_custom_page_description', sanitize_textarea_field($_POST['custom_page_description']));
    }

    if (isset($_POST['custom_page_slogan'])) {
        update_post_meta($post_id, '_custom_page_slogan', sanitize_text_field($_POST['custom_page_slogan']));
    }
}

add_action('add_meta_boxes', 'esgi_add_hp_about_us_title_meta_box');
function esgi_add_hp_about_us_title_meta_box() {
    global $post;
    $template_file = get_post_meta($post->ID, '_wp_page_template', true);
    if ($template_file == 'page-about-us.php') { // Only add meta boxes if the template is 'page-about-us.php'
        add_meta_box(
            'hp_about_us_title_meta_box', // Unique ID
            'About Us Title for Home Page', // Box title
            'hp_about_us_title_meta_box_html', // Content callback, must be of type callable
            'page', // Post type
            'normal', // Context
            'default' // Priority
        );
    }
}

function hp_about_us_title_meta_box_html($post) {
    $about_us_title = get_post_meta($post->ID, '_hp_about_us_title', true);
    wp_nonce_field('save_hp_about_us_title', 'hp_about_us_title_nonce');
    ?>
    <label for="hp_about_us_title"><?php _e('About Us Section Title', 'textdomain'); ?></label>
    <input type="text" name="hp_about_us_title" id="hp_about_us_title" value="<?php echo esc_attr($about_us_title); ?>" style="width: 100%;" />
    <?php
}

add_action('save_post', 'save_hp_about_us_title');
function save_hp_about_us_title($post_id) {
    if (!isset($_POST['hp_about_us_title_nonce']) || !wp_verify_nonce($_POST['hp_about_us_title_nonce'], 'save_hp_about_us_title')) {
        return;
    }

    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
        return;
    }

    if (!current_user_can('edit_post', $post_id)) {
        return;
    }

    if (isset($_POST['hp_about_us_title'])) {
        update_post_meta($post_id, '_hp_about_us_title', sanitize_text_field($_POST['hp_about_us_title']));
    }
}

add_shortcode('custom_image_section', 'esgi_custom_image_section_shortcode');
function esgi_custom_image_section_shortcode() {
    ob_start(); // Start output buffering

    if (function_exists('get_field') && get_field('show_service_section')) {
        $image_1 = get_field('image_1');
        $image_2 = get_field('image_2');
        $image_3 = get_field('image_3');
        $text_box = get_field('text_box');
        $text_box_position = get_field('text_box_position');
        $title = get_field('service_section_title');

        $images = [
            1 => $image_1,
            2 => $image_2,
            3 => $image_3
        ];

        // Adjust the array to insert the text box in the correct position
        $output = [];
        for ($i = 1; $i <= 4; $i++) {
            if ($i == $text_box_position) {
                $output[] = ['type' => 'text', 'content' => $text_box];
            } else {
                $image_index = $i > $text_box_position ? $i - 1 : $i;
                $output[] = ['type' => 'image', 'content' => $images[$image_index]];
            }
        }

        ?>
        <section class="services-section">
            <?php if ($title) : ?>
                <h2><?php echo esc_html($title); ?></h2>
            <?php endif; ?>
                <div class="custom-image-section">
                    <?php foreach($output as $item): ?>
                        <div class="image-box <?php echo $item['type'] == 'text' ? 'text-box' : ''; ?>">
                            <?php if($item['type'] == 'text'): ?>
                                <h4 class="text-content"><?php echo esc_html($item['content']); ?></h4>
                            <?php else: ?>
                                <img src="<?php echo esc_url($item['content']['url']); ?>" alt="<?php echo esc_attr($item['content']['alt']); ?>">
                            <?php endif; ?>
                        </div>
                    <?php endforeach; ?>
                </div>
                            <?php
                        }?>

    </section>

    <?php
    return ob_get_clean();
}

add_action( 'widgets_init', 'esgi_widgets_init' );
function esgi_widgets_init() {
    register_sidebar( array(
        'name'          => __( 'Blog Sidebar', 'esgi' ),
        'id'            => 'blog-sidebar',
        'description'   => __( 'Sidebar for blog pages', 'esgi' ),
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h2 class="widget-title">',
        'after_title'   => '</h2>',
    ) );
}

add_action('add_meta_boxes', 'esgi_subtitle_contact_meta_box');
function esgi_subtitle_contact_meta_box() {
    global $post;
    $template_file = get_post_meta($post->ID, '_wp_page_template', true);
    if ($template_file == 'page-contacts.php') { // Only add meta boxes if the template is 'page-contacts.php'
        add_meta_box(
            'subtitle_contact_meta_box', // Unique ID
            'Subtitle', // Box title
            'esgi_subtitle_meta_box_html', // Content callback, must be of type callable
            'page', // Post type
            'side', // Context
            'default' // Priority
        );
    }
}

function esgi_subtitle_meta_box_html($post) {
    $subtitle = get_post_meta($post->ID, '_esgi_contact_subtitle', true);
    wp_nonce_field('save_esgi_contact_subtitle', 'esgi_contact_subtitle_nonce');
    ?>
    <label for="esgi_contact_subtitle"><?php _e('Contact Page Subtitle', 'esgi-theme'); ?></label>
    <input type="text" name="esgi_contact_subtitle" id="esgi_contact_subtitle" value="<?php echo esc_attr($subtitle); ?>" style="width: 100%;" />
    <?php
}


add_action('save_post', 'save_esgi_contact_subtitle');
function save_esgi_contact_subtitle($post_id) {
    if (!isset($_POST['esgi_contact_subtitle_nonce']) || !wp_verify_nonce($_POST['esgi_contact_subtitle_nonce'], 'save_esgi_contact_subtitle')) {
        return;
    }

    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
        return;
    }

    if (!current_user_can('edit_post', $post_id)) {
        return;
    }

    if (isset($_POST['esgi_contact_subtitle'])) {
        update_post_meta($post_id, '_esgi_contact_subtitle', sanitize_text_field($_POST['esgi_contact_subtitle']));
    }
}

function esgi_comment( $comment, $args, $depth ) {
    $GLOBALS['comment'] = $comment; ?>

    <li <?php comment_class(); ?> id="comment-<?php comment_ID(); ?>">
        <article id="div-comment-<?php comment_ID(); ?>" class="comment-body">
                <div class="comment-author vcard">
                    <?php
                    printf( '<b class="fn">%s</b>', get_comment_author_link() );
                    ?>
                </div><!-- .comment-author -->

            <div class="comment-content">
                <?php comment_text(); ?>
            </div><!-- .comment-content -->

            <div class="reply">
                <?php
                comment_reply_link(
                    array_merge(
                        $args,
                        array(
                            'add_below' => 'div-comment',
                            'depth'     => $depth,
                            'max_depth' => $args['max_depth'],
                            'before'    => '<div class="reply-link"><i class="fa-solid fa-reply fa-sm" style="color: #050a3a;"></i>',
                            'after'     => '</div>'
                        )
                    )
                );
                ?>
            </div>
        </article>
    </li>
    <?php
}

add_filter('get_the_date', 'modify_post_date_format');
function modify_post_date_format($the_date) {
    return date('F j, Y', strtotime($the_date));
}
