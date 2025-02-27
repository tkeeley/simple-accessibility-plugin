<?php
/**
 * Plugin Name: Cup O Code Accessibility Tools Plugin
 * Description: Adds an accessibility icon on the bottom left that opens a panel with options: Increase/Decrease Text, Grayscale, High Contrast, Negative Contrast, Light Background, Links Underline, Readable Font, and Reset.
 * Version: 1.1
 * Author: Cup O Code
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

function atp_add_accessibility_panel() {
    ?>
    <!-- Inline CSS for Accessibility Panel -->
    <style>
        /* Disable transitions on the content wrapper so font-size changes are instant */
        #atp-accessibility-content, #atp-accessibility-content * {
            transition: none !important;
        }
        
        /* Accessibility Icon and Panel: fixed and not affected by filters */
        #atp-accessibility-icon,
        #atp-accessibility-panel {
            position: fixed;
            z-index: 10000;
            filter: none !important;
            transform: translateZ(0);
        }
        #atp-accessibility-icon {
            bottom: 20px;
            left: 20px;
            cursor: pointer;
            background: #fff;
    		padding: 2px;
    		border-radius: 100px;
            transition: transform 0.3s ease;
        }
        #atp-accessibility-icon:hover {
            transform: scale(1.1);
        }
        #atp-accessibility-icon img {
            width: 40px;
            height: 40px;
        }
        #atp-accessibility-panel {
            display: none;
            bottom: 80px;
            left: 20px;
            background: #ffffff;
            border-radius: 8px;
            padding: 20px;
            box-shadow: 0 4px 12px rgba(0,0,0,0.15);
            width: 260px;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            transition: opacity 0.3s ease;
        }
        #atp-accessibility-panel h4 {
            margin: 0 0 15px;
            font-size: 18px;
            color: #333;
        }
        #atp-accessibility-panel button {
            margin: 6px 0;
            padding: 10px 15px;
            font-size: 15px;
            width: 100%;
            text-align: left;
            border: none;
            border-radius: 4px;
            background: #0073aa;
            color: #fff;
            transition: background 0.3s ease;
        }
        #atp-accessibility-panel button:hover {
            background: #005177;
        }
        #atp-reset {
            background: #d63638;
        }
        #atp-reset:hover {
            background: #a72b2f;
        }
        /* Accessibility States applied to the main content container */
        #atp-accessibility-content.atp-high-contrast {
            background-color: #000 !important;
            color: #fff !important;
        }
        #atp-accessibility-content.atp-negative-contrast {
            filter: invert(100%);
        }
        #atp-accessibility-content.atp-grayscale {
            filter: grayscale(100%);
        }
        #atp-accessibility-content.atp-light-background {
            background-color: #fefefe !important;
            color: #000 !important;
        }
        #atp-accessibility-content.atp-links-underline a {
            text-decoration: underline !important;
        }
        #atp-accessibility-content.atp-readable-font {
            font-family: Arial, Helvetica, sans-serif !important;
        }
    </style>

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

    <!-- Inline JavaScript for Accessibility Options -->
    <script>
        (function($) {
            $(document).ready(function() {
                // Wrap all body children except the accessibility panel and icon
                if($('#atp-accessibility-content').length === 0) {
                    $('body').children(':not(#atp-accessibility-panel, #atp-accessibility-icon)')
                             .wrapAll('<div id="atp-accessibility-content"></div>');
                }

                // Toggle the accessibility panel when the icon is clicked.
                $('#atp-accessibility-icon').on('click', function() {
                    $('#atp-accessibility-panel').fadeToggle(200);
                });

                // Increase text size instantly
                $('#atp-increase-text').on('click', function() {
                    var currentSize = parseInt($('#atp-accessibility-content').css('font-size'));
                    $('#atp-accessibility-content').css('font-size', (currentSize + 2) + 'px');
                });

                // Decrease text size instantly
                $('#atp-decrease-text').on('click', function() {
                    var currentSize = parseInt($('#atp-accessibility-content').css('font-size'));
                    $('#atp-accessibility-content').css('font-size', (currentSize - 2) + 'px');
                });

                // Toggle Grayscale on the content container
                $('#atp-grayscale').on('click', function() {
                    $('#atp-accessibility-content').toggleClass('atp-grayscale');
                });

                // Toggle High Contrast on the content container
                $('#atp-high-contrast').on('click', function() {
                    $('#atp-accessibility-content').toggleClass('atp-high-contrast');
                });

                // Toggle Negative Contrast on the content container
                $('#atp-negative-contrast').on('click', function() {
                    $('#atp-accessibility-content').toggleClass('atp-negative-contrast');
                });

                // Toggle Light Background on the content container
                $('#atp-light-background').on('click', function() {
                    $('#atp-accessibility-content').toggleClass('atp-light-background');
                });

                // Toggle Links Underline on the content container
                $('#atp-links-underline').on('click', function() {
                    $('#atp-accessibility-content').toggleClass('atp-links-underline');
                });

                // Toggle Readable Font on the content container
                $('#atp-readable-font').on('click', function() {
                    $('#atp-accessibility-content').toggleClass('atp-readable-font');
                });

                // Reset all changes: remove classes and inline font-size from the content container
                $('#atp-reset').on('click', function() {
                    $('#atp-accessibility-content').removeClass('atp-grayscale atp-high-contrast atp-negative-contrast atp-light-background atp-links-underline atp-readable-font');
                    $('#atp-accessibility-content').css('font-size', '');
                });
            });
        })(jQuery);
    </script>
    <?php
}
add_action( 'wp_footer', 'atp_add_accessibility_panel' );
?>
