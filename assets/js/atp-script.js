(function($) {
    $(document).ready(function() {
        // Logic to wrap content if needed, or identify existing wrapper
        var $content = $();

        // Check if there are common wrappers already
        if ($('#page').length) {
            $content = $('#page');
            $content.addClass('atp-accessibility-wrapper'); // Add our class for targeting
            $content.attr('id', ($content.attr('id') || 'atp-accessibility-content')); // Ensure logical ID if missing logic overlap, but usually keep existing ID.
            // Actually, better to just assign the ID if it doesn't conflict, or use a class.
            // For now, let's keep the logic simple: if #atp-accessibility-content doesn't exist, we try to wrap.
        } 
        
        if($('#atp-accessibility-content').length === 0) {
            // Try to find a common main wrapper to give the ID to, instead of wrapping everything
            var $potentialWrapper = $('.site, #page, .wrapper, #wrapper').first();
            if ($potentialWrapper.length) {
                $potentialWrapper.attr('id', 'atp-accessibility-content');
            } else {
                // Wrap all body children except the accessibility panel and icon
                $('body').children(':not(#atp-accessibility-panel, #atp-accessibility-icon, script, style)')
                        .wrapAll('<div id="atp-accessibility-content"></div>');
            }
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
