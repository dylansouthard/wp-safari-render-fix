<?php

/**
 * Applies a temporary fix for Safari 18 rendering issues with negative margins and floats.
 * This fix targets `.postbox-container` elements in the WordPress admin area to resolve layout issues
 * by applying specific `clear` rules.
 *
 * The fix works around Safari 18 bugs that affect floats and negative margins,
 * and is implemented using CSS rules targeting the relevant elements.
 *
 * @see https://bugs.webkit.org/show_bug.cgi?id=280063
 * @see https://core.trac.wordpress.org/ticket/62082
 */
function safari_18_postbox_container_fix()
{
    // Output CSS to apply fixes for Safari 18.
    echo '<style id="safari-18-temp-fix-postbox">
        /* Fix for Safari 18 issue with negative horizontal margin affecting floats */
        _::-webkit-full-page-media, _:future, :root .postbox-container {
            clear: left;
        }

        /* Ensure right-hand column (#postbox-container-1) is cleared right */
        #post-body.columns-2 #postbox-container-1 {
            clear: right;
        }
    </style>';
}
add_action('admin_head', 'safari_18_postbox_container_fix');
