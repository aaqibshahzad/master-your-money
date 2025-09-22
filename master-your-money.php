<?php
/**
 * Plugin Name:       Master Your Money
 * Plugin URI:        https://master-your-money
 * Description:       Add a calculator to your website to calculate investment.
 * Version:           2.0.0
 * Author:            Muhammad Aqib Shahzad
 * Author URI:        https://muhammadaqibshahzad.com/
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       master-your-money
 * Domain Path:       /languages
 *
 * @package MasterYourMoney
 */

 // If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
    wp_die(); // WordPress standard error handling
}

/**
 * Currently plugin version.
 */
define( 'MASTER_YOUR_MONEY_VERSION', '1.0.0' );

/**
 * Add scripts and styles for jQuery UI Tabs
 */
function master_your_money_admin_scripts() {
    //master-your-money-color-picker
    wp_enqueue_script('wp-color-picker');
    wp_enqueue_style('wp-color-picker');

    wp_enqueue_script('master-your-money-script', plugins_url('assets/js/master-your-money-color-picker.js', __FILE__), array('jquery', 'wp-color-picker'), '', true);
    wp_enqueue_style('master-your-money-admin-style', plugins_url('assets/css/master-your-money-admin.css', __FILE__), '1.0', true);

    wp_enqueue_script('master-your-money-admin-script');
}
add_action('admin_enqueue_scripts', 'master_your_money_admin_scripts');

/**
 * Enqueue scripts and styles.
 */
function master_your_money_enqueue_scripts() {
    $initialInvestmentColor = get_option('mym_hostplus_index_balanced');
    $investmentGrowthColor = get_option('mym_industry_super_fund_high_growth');
    $glasshouseWealthColor = get_option('mym_glasshouse_wealth_turbo_growth_fund');
    // Register the script like this for a plugin:
    wp_register_script('master-your-money-script', plugin_dir_url( __FILE__ ) . 'assets/js/master-your-money-script.js', array( 'jquery' ), MASTER_YOUR_MONEY_VERSION, true);

    wp_register_script('chart-js-script', 'https://cdn.jsdelivr.net/npm/chart.js', array( 'jquery' ), '4.4.1', true);

    // Enqueue the script
    wp_enqueue_script( 'chart-js-script' );
    wp_enqueue_script( 'master-your-money-script' );

    $graphColors = array(
        'initialInvestmentColor' => $initialInvestmentColor,
        'investmentGrowthColor' => $investmentGrowthColor,
        'glasshouseWealthColor' => $glasshouseWealthColor,
    );

    // Pass the data
    wp_localize_script('master-your-money-script', 'MYMScriptData', $graphColors);
    wp_localize_script('master-your-money-script', 'pluginUrl', plugins_url());

    // Optionally enqueue styles
    wp_register_style('master-your-money-style', plugin_dir_url( __FILE__ ) . 'assets/css/master-your-money-style.css', array(), MASTER_YOUR_MONEY_VERSION);

    wp_enqueue_style( 'master-your-money-style' );

    // DYNAMIC CSS FOR Master your Money
    include_once plugin_dir_path(__FILE__) . 'includes/master-your-money-dynamic-css.php';
}

add_action( 'wp_enqueue_scripts', 'master_your_money_enqueue_scripts' );

function master_your_money_create_menu() {
    // Create new top-level menu
    add_menu_page('Master Your Money', 'Master Your Money', 'manage_options', 'master-your-money', 'master_your_money_admin_page');
}

add_action('admin_menu', 'master_your_money_create_menu');

function defult_settings() {
    update_option('mym_hostplus_index_balanced', '#2a8e20');
    update_option('mym_industry_super_fund_high_growth', '#2a721a');
    update_option('mym_glasshouse_wealth_turbo_growth_fund', '#17661e');
}

// Hook the activation function to the activation hook
register_activation_hook(__FILE__, 'defult_settings');

function master_your_money_admin_page() {
    require plugin_dir_path( __FILE__ ) . 'settings/admin-setting-page.php';
}

// Register Settings
function mym_register_settings() {
    register_setting('master_your_money_settings_group', 'mym_hostplus_index_balanced');
    register_setting('master_your_money_settings_group', 'mym_industry_super_fund_high_growth');
    register_setting('master_your_money_settings_group', 'mym_glasshouse_wealth_turbo_growth_fund');
    register_setting('master_your_money_settings_group', 'mym_calculate_button_color');
    register_setting('master_your_money_settings_group', 'mym_calculate_button_text_color');
    register_setting('master_your_money_settings_group', 'mym_calculator_fields_label_color');
}

add_action('admin_init', 'mym_register_settings');

/**
 * Shortcode for the investment calculator.
 */
function master_your_money_shortcode() {
    ob_start();
    require plugin_dir_path( __FILE__ ) . 'includes/show-calculator.php';
    return ob_get_clean();
}

add_shortcode( 'master_your_money', 'master_your_money_shortcode' );