<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>
        <?php
        if (is_home ()) { bloginfo('name'); }
        elseif ( is_category()) { single_cat_title();}
        elseif (is_single()) { single_post_title(); }
        elseif (is_page()) { single_post_title(); }
        else { wp_title('',true); }
        ?>
    </title>
    <?php wp_head(); ?>

    
    <script src="<?php bloginfo('template_url'); ?>/js/parsinumber.min.js"></script>
    <script>
        function toPersianNum( num, dontTrim ) {
            var i = 0,
                dontTrim = dontTrim || false,
                num = dontTrim ? num.toString() : num.toString().trim(),
                len = num.length,
                res = '',
                pos,
                persianNumbers = typeof persianNumber == 'undefined' ?
                    ['۰', '۱', '۲', '۳', '۴', '۵', '۶', '۷', '۸', '۹'] :
                    persianNumbers;
            for (; i < len; i++)
                if (( pos = persianNumbers[num.charAt(i)] ))
                    res += pos;
                else
                    res += num.charAt(i);
            return res;
        }
    </script>


</head>