<?php
/**
 * Plugin Name: Cup O Code Accessibility Tools Plugin
 * Description: Adds an accessibility icon on the bottom left that opens a panel with options: Increase/Decrease Text, Grayscale, High Contrast, Negative Contrast, Light Background, Links Underline, Readable Font, and Reset.
 * Version: 1.1
 * Author: Cup O Code | Tim Keeley
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

/**
 * Enqueue scripts and styles.
 */
function atp_enqueue_assets() {
    wp_enqueue_style( 'atp-style', plugin_dir_url( __FILE__ ) . 'assets/css/atp-style.css', array(), '1.1' );
    wp_enqueue_script( 'atp-script', plugin_dir_url( __FILE__ ) . 'assets/js/atp-script.js', array( 'jquery' ), '1.1', true );
}
add_action( 'wp_enqueue_scripts', 'atp_enqueue_assets' );

/**
 * Add accessibility panel HTML to footer.
 */
function atp_add_accessibility_panel() {
    ?>
    <!-- Accessibility Icon -->
    <div id="atp-accessibility-icon">
        <img src="<?php echo plugin_dir_url( __FILE__ ) . 'accessibility-icon.png'; ?>" alt="Accessibility Tools">
    </div>

    <!-- Accessibility Panel -->
    <div id="atp-accessibility-panel">
        <h4>Accessibility Tools</h4>
        <button id="atp-increase-text">Increase Text</button>
        <button id="atp-decrease-text">Decrease Text</button>
        <button id="atp-grayscale">Grayscale</button>
        <button id="atp-high-contrast">High Contrast</button>
        <button id="atp-negative-contrast">Negative Contrast</button>
        <button id="atp-light-background">Light Background</button>
        <button id="atp-links-underline">Links Underline</button>
        <button id="atp-readable-font">Readable Font</button>
        <button id="atp-reset">Reset</button>
    </div>
    <?php
}
add_action( 'wp_footer', 'atp_add_accessibility_panel' );
?>
