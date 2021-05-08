<?php
include'function.php';
include 'connect.php';


if(!empty($_REQUEST['submit'])) {
    $to = $_REQUEST['email'];
    $to = mysqli_real_escape_string($conn, $to);

    $q = "select * from customer where email='$to' LIMIT 1";
    $res = mysqli_query($conn, $q);
    $count = mysqli_num_rows($res);
    if ($count == 1) {
        $row = mysqli_fetch_assoc($res);
        $id = $row['id'];
        $q="update customer set verified='0' where id='$id'";
        mysqli_query($conn,$q);
        $subject = "Email Verification";
        $message = "<a href='http://localhost/bootstrap/sss/forget_update_password.php?id=$id'>reset password</a>";
        $headers = "From:zizoo4949@yahoo.com" . "\r\n";
        $headers .= "MIME-Version: 1.0" . "\r\n";
        $headers .= "Content-Type: text/html; charset=UTF-8" . "\r\n";
        if (mail($to, $subject, $message, $headers)) {
            header("location:thankyou.php");
        } else {
           header("location:tryagain1.php");
        }
    }
}


?>

<!DOCTYPE html>
<html lang="en-US" class="cmsmasters_html">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <meta name="format-detection" content="telephone=no" />
    <link rel="profile" href="https://gmpg.org/xfn/11" />
    <link rel="pingback" href="https://hotel-lux.cmsmasters.net/xmlrpc.php" />
    <title>Forget password &#8211;Habibi Hotel</title>
    <link rel='dns-prefetch' href='//fonts.googleapis.com' />
    <link rel='dns-prefetch' href='//s.w.org' />
    <link rel="alternate" type="application/rss+xml" title="Hotel LUX &raquo; Feed" href="https://hotel-lux.cmsmasters.net/feed/" />
    <link rel="alternate" type="application/rss+xml" title="Hotel LUX &raquo; Comments Feed" href="https://hotel-lux.cmsmasters.net/comments/feed/" />
    <link rel="alternate" type="text/calendar" title="Hotel LUX &raquo; iCal Feed" href="https://hotel-lux.cmsmasters.net/events/?ical=1" />
    <script type="text/javascript">
        window._wpemojiSettings = {"baseUrl":"https:\/\/s.w.org\/images\/core\/emoji\/11\/72x72\/","ext":".png","svgUrl":"https:\/\/s.w.org\/images\/core\/emoji\/11\/svg\/","svgExt":".svg","source":{"concatemoji":"https:\/\/hotel-lux.cmsmasters.net\/wp-includes\/js\/wp-emoji-release.min.js?ver=5.0.7"}};
        !function(a,b,c){function d(a,b){var c=String.fromCharCode;l.clearRect(0,0,k.width,k.height),l.fillText(c.apply(this,a),0,0);var d=k.toDataURL();l.clearRect(0,0,k.width,k.height),l.fillText(c.apply(this,b),0,0);var e=k.toDataURL();return d===e}function e(a){var b;if(!l||!l.fillText)return!1;switch(l.textBaseline="top",l.font="600 32px Arial",a){case"flag":return!(b=d([55356,56826,55356,56819],[55356,56826,8203,55356,56819]))&&(b=d([55356,57332,56128,56423,56128,56418,56128,56421,56128,56430,56128,56423,56128,56447],[55356,57332,8203,56128,56423,8203,56128,56418,8203,56128,56421,8203,56128,56430,8203,56128,56423,8203,56128,56447]),!b);case"emoji":return b=d([55358,56760,9792,65039],[55358,56760,8203,9792,65039]),!b}return!1}function f(a){var c=b.createElement("script");c.src=a,c.defer=c.type="text/javascript",b.getElementsByTagName("head")[0].appendChild(c)}var g,h,i,j,k=b.createElement("canvas"),l=k.getContext&&k.getContext("2d");for(j=Array("flag","emoji"),c.supports={everything:!0,everythingExceptFlag:!0},i=0;i<j.length;i++)c.supports[j[i]]=e(j[i]),c.supports.everything=c.supports.everything&&c.supports[j[i]],"flag"!==j[i]&&(c.supports.everythingExceptFlag=c.supports.everythingExceptFlag&&c.supports[j[i]]);c.supports.everythingExceptFlag=c.supports.everythingExceptFlag&&!c.supports.flag,c.DOMReady=!1,c.readyCallback=function(){c.DOMReady=!0},c.supports.everything||(h=function(){c.readyCallback()},b.addEventListener?(b.addEventListener("DOMContentLoaded",h,!1),a.addEventListener("load",h,!1)):(a.attachEvent("onload",h),b.attachEvent("onreadystatechange",function(){"complete"===b.readyState&&c.readyCallback()})),g=c.source||{},g.concatemoji?f(g.concatemoji):g.wpemoji&&g.twemoji&&(f(g.twemoji),f(g.wpemoji)))}(window,document,window._wpemojiSettings);
    </script>
    <style type="text/css">
        img.wp-smiley,
        img.emoji {
            display: inline !important;
            border: none !important;
            box-shadow: none !important;
            height: 1em !important;
            width: 1em !important;
            margin: 0 .07em !important;
            vertical-align: -0.1em !important;
            background: none !important;
            padding: 0 !important;
        }
    </style>
    <link rel='stylesheet' id='layerslider-css'  href='https://hotel-lux.cmsmasters.net/wp-content/plugins/LayerSlider/static/layerslider/css/layerslider.css?ver=6.7.6' type='text/css' media='all' />
    <link rel='stylesheet' id='ls-google-fonts-css'  href='https://fonts.googleapis.com/css?family=Herr+Von+Muellerhoff:regular&#038;subset=latin%2Clatin-ext' type='text/css' media='all' />
    <link rel='stylesheet' id='wp-block-library-css'  href='https://hotel-lux.cmsmasters.net/wp-includes/css/dist/block-library/style.min.css?ver=5.0.7' type='text/css' media='all' />
    <link rel='stylesheet' id='wc-block-style-css'  href='https://hotel-lux.cmsmasters.net/wp-content/plugins/woocommerce/assets/css/blocks/style.css?ver=3.6.2' type='text/css' media='all' />
    <link rel='stylesheet' id='contact-form-7-css'  href='https://hotel-lux.cmsmasters.net/wp-content/plugins/contact-form-7/includes/css/styles.css?ver=5.1.1' type='text/css' media='all' />
    <link rel='stylesheet' id='cookie-law-info-css'  href='https://hotel-lux.cmsmasters.net/wp-content/plugins/cookie-law-info/public/css/cookie-law-info-public.css?ver=1.7.6' type='text/css' media='all' />
    <link rel='stylesheet' id='cookie-law-info-gdpr-css'  href='https://hotel-lux.cmsmasters.net/wp-content/plugins/cookie-law-info/public/css/cookie-law-info-gdpr.css?ver=1.7.6' type='text/css' media='all' />
    <link rel='stylesheet' id='rs-plugin-settings-css'  href='https://hotel-lux.cmsmasters.net/wp-content/plugins/revslider/public/assets/css/rs6.css?ver=6.0.8' type='text/css' media='all' />
    <style id='rs-plugin-settings-inline-css' type='text/css'>
        #rs-demo-id {}
    </style>
    <style id='woocommerce-inline-inline-css' type='text/css'>
        .woocommerce form .form-row .required { visibility: visible; }
    </style>
    <link rel='stylesheet' id='wp-postratings-css'  href='https://hotel-lux.cmsmasters.net/wp-content/plugins/wp-postratings/css/postratings-css.css?ver=1.86.2' type='text/css' media='all' />
    <link rel='stylesheet' id='hotel-lux-theme-style-css'  href='https://hotel-lux.cmsmasters.net/wp-content/themes/hotel-lux/style.css?ver=1.0.0' type='text/css' media='screen, print' />
    <link rel='stylesheet' id='hotel-lux-style-css'  href='https://hotel-lux.cmsmasters.net/wp-content/themes/hotel-lux/theme-framework/theme-style/css/style.css?ver=1.0.0' type='text/css' media='screen, print' />
    <style id='hotel-lux-style-inline-css' type='text/css'>

        .header_mid .header_mid_inner .logo_wrap {
            width : 200px;
        }

        .header_mid_inner .logo .logo_retina {
            width : 200px;
        }
        .row {
            display: -webkit-box;
            display: -ms-flexbox;
            display: flex;
            -ms-flex-wrap: wrap;
            flex-wrap: wrap;
            margin-right: 200px;
            margin-left: 250px;
            align-items: center;
        }
        .custom-select-wrapper {
            position: relative;
            user-select: none;
            width: 100%;
        }
        .custom-select {
            position: relative;
            display: flex;
            flex-direction: column;
            border-width: 0 2px 0 2px;
            border-style: solid;
            border-color: #394a6d;
        }
        .custom-select__trigger {
            position: relative;
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 0 22px;
            font-size: 20px;
            font-weight: 300;
            color: #3b3b3b;
            height: 60px;
            line-height: 60px;
            background: #ffffff;
            cursor: pointer;
            border-width: 2px 0 2px 0;
            border-style: solid;
            border-color: #394a6d;
        }
        .custom-options {
            position: absolute;
            display: block;
            top: 100%;
            left: 0;
            right: 0;
            border: 2px solid #394a6d;
            border-top: 0;
            background: #fff;
            transition: all 0.5s;
            opacity: 0;
            visibility: hidden;
            pointer-events: none;
            z-index: 2;
        }
        .custom-select.open .custom-options {
            opacity: 1;
            visibility: visible;
            pointer-events: all;
        }
        .custom-option {
            position: relative;
            display: block;
            padding: 0 22px 0 22px;
            font-size: 22px;
            font-weight: 300;
            color: #3b3b3b;
            line-height: 60px;
            cursor: pointer;
            transition: all 0.5s;
        }
        .custom-option:hover {
            cursor: pointer;
            background-color: #b2b2b2;
        }
        .custom-option.selected {
            color: #ffffff;
            background-color: #305c91;
        }

        .col-lg-12 {
            -webkit-box-flex: 0;
            -ms-flex: 0 0 100%;
            flex: 0 0 100%;
            max-width: 100%; }
        .modal-body {
            position: relative;
            -webkit-box-flex: 1;
            -ms-flex: 1 1 auto;
            flex: 1 1 auto;
            padding: 1rem; }
        .modal-footer {
            display: -webkit-box;
            display: -ms-flexbox;
            display: flex;
            -webkit-box-align: center;
            -ms-flex-align: center;
            align-items: center;
            -webkit-box-pack: end;
            -ms-flex-pack: end;
            justify-content: flex-end;
            padding: 1rem;
            border-top: 1px solid #dee2e6;
            border-bottom-right-radius: 0.3rem;
            border-bottom-left-radius: 0.3rem; }
        .modal-footer > :not(:first-child) {
            margin-left: .25rem; }
        .modal-footer > :not(:last-child) {
            margin-right: .25rem; }

        .form-group {
            margin-bottom: 1rem; }

        .form-control {
            height: 52px !important;
            background: #fff !important;
            color: #000000 !important;
            font-size: 18px;
            border-radius: 5px;
            -webkit-box-shadow: none !important;
            box-shadow: none !important; }
        .form-control:focus, .form-control:active {
            border-color: #000000; }




        .headline_outer {
            background-image:url(https://hotel-lux.cmsmasters.net/wp-content/uploads/2015/12/1.jpg);
            background-repeat:no-repeat;
            background-attachment:scroll;
            background-size:cover;
        }

        .headline_aligner,
        .cmsmasters_breadcrumbs_aligner {
            min-height:450px;
        }


        .header_top {
            height : 32px;
        }

        .header_mid {
            height : 70px;
        }

        .header_bot {
            height : 60px;
        }

        #page.cmsmasters_heading_after_header #middle,
        #page.cmsmasters_heading_under_header #middle .headline .headline_outer {
            padding-top : 70px;
        }

        #page.cmsmasters_heading_after_header.enable_header_top #middle,
        #page.cmsmasters_heading_under_header.enable_header_top #middle .headline .headline_outer {
            padding-top : 102px;
        }

        #page.cmsmasters_heading_after_header.enable_header_bottom #middle,
        #page.cmsmasters_heading_under_header.enable_header_bottom #middle .headline .headline_outer {
            padding-top : 130px;
        }

        #page.cmsmasters_heading_after_header.enable_header_top.enable_header_bottom #middle,
        #page.cmsmasters_heading_under_header.enable_header_top.enable_header_bottom #middle .headline .headline_outer {
            padding-top : 162px;
        }

        @media only screen and (max-width: 1024px) {
            .header_top,
            .header_mid,
            .header_bot {
                height : auto;
            }

            .header_mid .header_mid_inner > div {
                height : 70px;
            }

            .header_bot .header_bot_inner > div {
                height : 60px;
            }

            #page.cmsmasters_heading_after_header #middle,
            #page.cmsmasters_heading_under_header #middle .headline .headline_outer,
            #page.cmsmasters_heading_after_header.enable_header_top #middle,
            #page.cmsmasters_heading_under_header.enable_header_top #middle .headline .headline_outer,
            #page.cmsmasters_heading_after_header.enable_header_bottom #middle,
            #page.cmsmasters_heading_under_header.enable_header_bottom #middle .headline .headline_outer,
            #page.cmsmasters_heading_after_header.enable_header_top.enable_header_bottom #middle,
            #page.cmsmasters_heading_under_header.enable_header_top.enable_header_bottom #middle .headline .headline_outer {
                padding-top : 0 !important;
            }
        }

        @media only screen and (max-width: 768px) {
            .header_mid .header_mid_inner > div,
            .header_bot .header_bot_inner > div {
                height:auto;
            }
        }

    </style>
    <link rel='stylesheet' id='hotel-lux-adaptive-css'  href='https://hotel-lux.cmsmasters.net/wp-content/themes/hotel-lux/theme-framework/theme-style/css/adaptive.css?ver=1.0.0' type='text/css' media='screen, print' />
    <link rel='stylesheet' id='hotel-lux-retina-css'  href='https://hotel-lux.cmsmasters.net/wp-content/themes/hotel-lux/theme-framework/theme-style/css/retina.css?ver=1.0.0' type='text/css' media='screen' />
    <style id='hotel-lux-retina-inline-css' type='text/css'>
        #cmsmasters_row_9269cb290a {
            background-color:#f9f9f9;
        }

        #cmsmasters_row_9269cb290a .cmsmasters_row_outer_parent {
            padding-top: 125px;
        }

        #cmsmasters_row_9269cb290a .cmsmasters_row_outer_parent {
            padding-bottom: 40px;
        }



        #cmsmasters_heading_c26a058b3e {
            text-align:center;
            margin-top:0px;
            margin-bottom:0px;
        }

        #cmsmasters_heading_c26a058b3e .cmsmasters_heading {
            text-align:center;
        }

        #cmsmasters_heading_c26a058b3e .cmsmasters_heading, #cmsmasters_heading_c26a058b3e .cmsmasters_heading a {
            font-family:'Herr Von Muellerhoff';
            font-size:140px;
            line-height:160px;
            font-style:normal;
            color:rgba(11,12,15,0.2);
        }

        #cmsmasters_heading_c26a058b3e .cmsmasters_heading a:hover {
        }

        #cmsmasters_heading_c26a058b3e .cmsmasters_heading_divider {
        }

        @media (max-width: 768px) {

            #cmsmasters_heading_c26a058b3e .cmsmasters_heading, #cmsmasters_heading_c26a058b3e .cmsmasters_heading a {
                font-size:100px;
                line-height:120px;
            }

        }



        #cmsmasters_heading_49e43a231d {
            text-align:center;
            margin-top:-72px;
            margin-bottom:0px;
        }

        #cmsmasters_heading_49e43a231d .cmsmasters_heading {
            text-align:center;
        }

        #cmsmasters_heading_49e43a231d .cmsmasters_heading, #cmsmasters_heading_49e43a231d .cmsmasters_heading a {
            font-size:60px;
            line-height:60px;
        }

        #cmsmasters_heading_49e43a231d .cmsmasters_heading a:hover {
        }

        #cmsmasters_heading_49e43a231d .cmsmasters_heading_divider {
        }

        @media (max-width: 768px) {

            #cmsmasters_heading_49e43a231d .cmsmasters_heading, #cmsmasters_heading_49e43a231d .cmsmasters_heading a {
                font-size:40px;
                line-height:46px;
            }

        }


        #cmsmasters_row_83f7b2ac42 {
            background-color:#f9f9f9;
        }

        #cmsmasters_row_83f7b2ac42 .cmsmasters_row_outer_parent {
            padding-top: 0px;
        }

        #cmsmasters_row_83f7b2ac42 .cmsmasters_row_outer_parent {
            padding-bottom: 0px;
        }




        #cmsmasters_fb_0f52b100cf {
            padding-top:0px;
            padding-bottom:0px;
            background-color:rgba(255,255,255,0);
        }

        #cmsmasters_fb_0f52b100cf .featured_block_inner {
            width: 100%;
            text-align: center;
            margin:0 auto;
        }

        #cmsmasters_fb_0f52b100cf .featured_block_text {
            text-align: center;
        }



        #cmsmasters_row_fcb76a0f78 {
            background-color:#f9f9f9;
        }

        #cmsmasters_row_fcb76a0f78 .cmsmasters_row_outer_parent {
            padding-top: 0px;
        }

        #cmsmasters_row_fcb76a0f78 .cmsmasters_row_outer_parent {
            padding-bottom: 0px;
        }




        #cmsmasters_divider_e8727ea668 {
            border-bottom-width:1px;
            border-bottom-style:solid;
            margin-top:25px;
            margin-bottom:65px;
        }

        #cmsmasters_row_883603364a {
            background-color:#f9f9f9;
        }

        #cmsmasters_row_883603364a .cmsmasters_row_outer_parent {
            padding-top: 0px;
        }

        #cmsmasters_row_883603364a .cmsmasters_row_outer_parent {
            padding-bottom: 0px;
        }



        #cmsmasters_heading_9b30430c56 {
            text-align:center;
            margin-top:0px;
            margin-bottom:35px;
        }

        #cmsmasters_heading_9b30430c56 .cmsmasters_heading {
            text-align:center;
        }

        #cmsmasters_heading_9b30430c56 .cmsmasters_heading, #cmsmasters_heading_9b30430c56 .cmsmasters_heading a {
        }

        #cmsmasters_heading_9b30430c56 .cmsmasters_heading a:hover {
        }

        #cmsmasters_heading_9b30430c56 .cmsmasters_heading_divider {
        }


        #cmsmasters_row_752cf9cc3a {
            background-color:#f9f9f9;
        }

        #cmsmasters_row_752cf9cc3a .cmsmasters_row_outer_parent {
            padding-top: 0px;
        }

        #cmsmasters_row_752cf9cc3a .cmsmasters_row_outer_parent {
            padding-bottom: 110px;
        }





    </style>
    <link rel='stylesheet' id='hotel-lux-icons-css'  href='https://hotel-lux.cmsmasters.net/wp-content/themes/hotel-lux/css/fontello.css?ver=1.0.0' type='text/css' media='screen' />
    <link rel='stylesheet' id='hotel-lux-icons-custom-css'  href='https://hotel-lux.cmsmasters.net/wp-content/themes/hotel-lux/theme-vars/theme-style/css/fontello-custom.css?ver=1.0.0' type='text/css' media='screen' />
    <link rel='stylesheet' id='animate-css'  href='https://hotel-lux.cmsmasters.net/wp-content/themes/hotel-lux/css/animate.css?ver=1.0.0' type='text/css' media='screen' />
    <link rel='stylesheet' id='ilightbox-css'  href='https://hotel-lux.cmsmasters.net/wp-content/themes/hotel-lux/css/ilightbox.css?ver=2.2.0' type='text/css' media='screen' />
    <link rel='stylesheet' id='ilightbox-skin-dark-css'  href='https://hotel-lux.cmsmasters.net/wp-content/themes/hotel-lux/css/ilightbox-skins/dark-skin.css?ver=2.2.0' type='text/css' media='screen' />
    <link rel='stylesheet' id='hotel-lux-fonts-schemes-css'  href='https://hotel-lux.cmsmasters.net/wp-content/uploads/cmsmasters_styles/hotel-lux.css?ver=1.0.0' type='text/css' media='screen' />
    <link rel='stylesheet' id='google-fonts-css'  href='//fonts.googleapis.com/css?family=Dosis%3A300%2C400%2C500%2C700%7CCormorant%3A400%2C400i&#038;ver=5.0.7' type='text/css' media='all' />
    <link rel='stylesheet' id='hotel-lux-theme-vars-style-css'  href='https://hotel-lux.cmsmasters.net/wp-content/themes/hotel-lux/theme-vars/theme-style/css/vars-style.css?ver=1.0.0' type='text/css' media='screen, print' />
    <link rel='stylesheet' id='hotel-lux-gutenberg-frontend-style-css'  href='https://hotel-lux.cmsmasters.net/wp-content/themes/hotel-lux/gutenberg/cmsmasters-framework/theme-style/css/frontend-style.css?ver=1.0.0' type='text/css' media='screen' />
    <link rel='stylesheet' id='hotel-lux-woocommerce-style-css'  href='https://hotel-lux.cmsmasters.net/wp-content/themes/hotel-lux/woocommerce/cmsmasters-framework/theme-style/css/plugin-style.css?ver=1.0.0' type='text/css' media='screen' />
    <link rel='stylesheet' id='hotel-lux-woocommerce-adaptive-css'  href='https://hotel-lux.cmsmasters.net/wp-content/themes/hotel-lux/woocommerce/cmsmasters-framework/theme-style/css/plugin-adaptive.css?ver=1.0.0' type='text/css' media='screen' />
    <link rel='stylesheet' id='hotel-lux-tribe-events-style-css'  href='https://hotel-lux.cmsmasters.net/wp-content/themes/hotel-lux/tribe-events/cmsmasters-framework/theme-style/css/plugin-style.css?ver=1.0.0' type='text/css' media='screen' />
    <link rel='stylesheet' id='hotel-lux-tribe-events-adaptive-css'  href='https://hotel-lux.cmsmasters.net/wp-content/themes/hotel-lux/tribe-events/cmsmasters-framework/theme-style/css/plugin-adaptive.css?ver=1.0.0' type='text/css' media='screen' />
    <link rel='stylesheet' id='theme-cmsmasters-rating-style-css'  href='https://hotel-lux.cmsmasters.net/wp-content/themes/hotel-lux/cmsmasters-wp-postratings/cmsmasters-framework/theme-style/css/plugin-style.css?ver=1.0.0' type='text/css' media='screen' />
    <link rel='stylesheet' id='tribe-events-bootstrap-datepicker-css-css'  href='https://hotel-lux.cmsmasters.net/wp-content/plugins/the-events-calendar/vendor/bootstrap-datepicker/css/bootstrap-datepicker.standalone.min.css?ver=4.9.5' type='text/css' media='all' />
    <script>if (document.location.protocol != "https:") {document.location = document.URL.replace(/^http:/i, "https:");}</script><script type='text/javascript'>
        /* <![CDATA[ */
        var LS_Meta = {"v":"6.7.6"};
        /* ]]> */
    </script>
    <script type='text/javascript' src='https://hotel-lux.cmsmasters.net/wp-content/plugins/LayerSlider/static/layerslider/js/greensock.js?ver=1.19.0'></script>
    <script type='text/javascript' src='https://hotel-lux.cmsmasters.net/wp-includes/js/jquery/jquery.js?ver=1.12.4'></script>
    <script type='text/javascript' src='https://hotel-lux.cmsmasters.net/wp-includes/js/jquery/jquery-migrate.min.js?ver=1.4.1'></script>
    <script type='text/javascript' src='https://hotel-lux.cmsmasters.net/wp-content/plugins/LayerSlider/static/layerslider/js/layerslider.kreaturamedia.jquery.js?ver=6.7.6'></script>
    <script type='text/javascript' src='https://hotel-lux.cmsmasters.net/wp-content/plugins/LayerSlider/static/layerslider/js/layerslider.transitions.js?ver=6.7.6'></script>
    <script type='text/javascript'>
        /* <![CDATA[ */
        var Cli_Data = {"nn_cookie_ids":[],"cookielist":[]};
        var log_object = {"ajax_url":"https:\/\/hotel-lux.cmsmasters.net\/wp-admin\/admin-ajax.php"};
        /* ]]> */
    </script>
    <script type='text/javascript' src='https://hotel-lux.cmsmasters.net/wp-content/plugins/cookie-law-info/public/js/cookie-law-info-public.js?ver=1.7.6'></script>
    <script type='text/javascript' src='https://hotel-lux.cmsmasters.net/wp-content/plugins/revslider/public/assets/js/revolution.tools.min.js?ver=6.0'></script>
    <script type='text/javascript' src='https://hotel-lux.cmsmasters.net/wp-content/plugins/revslider/public/assets/js/rs6.min.js?ver=6.0.8'></script>
    <script type='text/javascript' src='https://hotel-lux.cmsmasters.net/wp-content/themes/hotel-lux/js/debounced-resize.min.js?ver=1.0.0'></script>
    <script type='text/javascript' src='https://hotel-lux.cmsmasters.net/wp-content/themes/hotel-lux/js/modernizr.min.js?ver=1.0.0'></script>
    <script type='text/javascript' src='https://hotel-lux.cmsmasters.net/wp-content/themes/hotel-lux/js/respond.min.js?ver=1.0.0'></script>
    <script type='text/javascript' src='https://hotel-lux.cmsmasters.net/wp-content/themes/hotel-lux/js/jquery.iLightBox.min.js?ver=2.2.0'></script>
    <meta name="generator" content="Powered by LayerSlider 6.7.6 - Multi-Purpose, Responsive, Parallax, Mobile-Friendly Slider Plugin for WordPress." />
    <!-- LayerSlider updates and docs at: https://layerslider.kreaturamedia.com -->
    <link rel='https://api.w.org/' href='https://hotel-lux.cmsmasters.net/wp-json/' />
    <link rel="EditURI" type="application/rsd+xml" title="RSD" href="https://hotel-lux.cmsmasters.net/xmlrpc.php?rsd" />
    <link rel="wlwmanifest" type="application/wlwmanifest+xml" href="https://hotel-lux.cmsmasters.net/wp-includes/wlwmanifest.xml" />
    <meta name="generator" content="WordPress 5.0.7" />
    <meta name="generator" content="WooCommerce 3.6.2" />
    <link rel="canonical" href="https://hotel-lux.cmsmasters.net/reservation/" />
    <link rel='shortlink' href='https://hotel-lux.cmsmasters.net/?p=11843' />
    <link rel="alternate" type="application/json+oembed" href="https://hotel-lux.cmsmasters.net/wp-json/oembed/1.0/embed?url=https%3A%2F%2Fhotel-lux.cmsmasters.net%2Freservation%2F" />
    <link rel="alternate" type="text/xml+oembed" href="https://hotel-lux.cmsmasters.net/wp-json/oembed/1.0/embed?url=https%3A%2F%2Fhotel-lux.cmsmasters.net%2Freservation%2F&#038;format=xml" />
    <script>if (document.location.protocol != "https:") {document.location = document.URL.replace(/^http:/i, "https:");}</script><meta name="tec-api-version" content="v1"><meta name="tec-api-origin" content="https://hotel-lux.cmsmasters.net"><link rel="https://theeventscalendar.com/" href="https://hotel-lux.cmsmasters.net/wp-json/tribe/events/v1/" />	<noscript><style>.woocommerce-product-gallery{ opacity: 1 !important; }</style></noscript>
    <script type="text/javascript">
        var cli_flush_cache=2;
    </script>
    <meta name="generator" content="Powered by Slider Revolution 6.0.8 - responsive, Mobile-Friendly Slider Plugin for WordPress with comfortable drag and drop interface." />
    <link rel="icon" href="https://hotel-lux.cmsmasters.net/wp-content/uploads/2017/05/cropped-favicon-7-1-50x50.png" sizes="32x32" />
    <link rel="icon" href="https://hotel-lux.cmsmasters.net/wp-content/uploads/2017/05/cropped-favicon-7-1-300x300.png" sizes="192x192" />
    <link rel="apple-touch-icon-precomposed" href="https://hotel-lux.cmsmasters.net/wp-content/uploads/2017/05/cropped-favicon-7-1-300x300.png" />
    <meta name="msapplication-TileImage" content="https://hotel-lux.cmsmasters.net/wp-content/uploads/2017/05/cropped-favicon-7-1-300x300.png" />
    <script type="text/javascript">function setREVStartSize(a){try{var b,c=document.getElementById(a.c).parentNode.offsetWidth;if(c=0===c||isNaN(c)?window.innerWidth:c,a.tabw=void 0===a.tabw?0:parseInt(a.tabw),a.thumbw=void 0===a.thumbw?0:parseInt(a.thumbw),a.tabh=void 0===a.tabh?0:parseInt(a.tabh),a.thumbh=void 0===a.thumbh?0:parseInt(a.thumbh),a.tabhide=void 0===a.tabhide?0:parseInt(a.tabhide),a.thumbhide=void 0===a.thumbhide?0:parseInt(a.thumbhide),a.mh=void 0===a.mh||""==a.mh?0:a.mh,"fullscreen"===a.layout||"fullscreen"===a.l)b=Math.max(a.mh,window.innerHeight);else{for(var d in a.gw=Array.isArray(a.gw)?a.gw:[a.gw],a.rl)(void 0===a.gw[d]||0===a.gw[d])&&(a.gw[d]=a.gw[d-1]);for(var d in a.gh=void 0===a.el||""===a.el||Array.isArray(a.el)&&0==a.el.length?a.gh:a.el,a.gh=Array.isArray(a.gh)?a.gh:[a.gh],a.rl)(void 0===a.gh[d]||0===a.gh[d])&&(a.gh[d]=a.gh[d-1]);var e,f=Array(a.rl.length),g=0;for(var d in a.tabw=a.tabhide>=c?0:a.tabw,a.thumbw=a.thumbhide>=c?0:a.thumbw,a.tabh=a.tabhide>=c?0:a.tabh,a.thumbh=a.thumbhide>=c?0:a.thumbh,a.rl)f[d]=a.rl[d]<window.innerWidth?0:a.rl[d];for(var d in e=f[0],f)e>f[d]&&0<f[d]&&(e=f[d],g=d);var h=c>a.gw[g]+a.tabw+a.thumbw?1:(c-(a.tabw+a.thumbw))/a.gw[g];b=a.gh[g]*h+(a.tabh+a.thumbh)}void 0===window.rs_init_css&&(window.rs_init_css=document.head.appendChild(document.createElement("style"))),document.getElementById(a.c).height=b,window.rs_init_css.innerHTML+="#"+a.c+"_wrapper { height: "+b+"px }"}catch(a){console.log("Failure at Presize of Slider:"+a)}};</script>
</head>
<body data-rsssl=1 class="page-template-default page page-id-11843 woocommerce-no-js tribe-no-js">

<div class="cmsmasters_header_search_form">
    <span class="cmsmasters_header_search_form_close cmsmasters_theme_icon_cancel"></span><form method="get" action="https://hotel-lux.cmsmasters.net/">
        <div class="cmsmasters_header_search_form_field">
            <button type="submit" class="cmsmasters_theme_icon_search"></button>
            <input type="search" name="s" placeholder="Search..." value="" />
        </div>
    </form></div>
<!-- Start Page -->
<div id="page" class="csstransition chrome_only cmsmasters_liquid fixed_header cmsmasters_heading_after_header hfeed site">

    <!-- Start Main -->
    <div id="main">

        <!-- Start Header -->
        <header id="header" class="header_fullwidth">
            <div class="header_mid" data-height="70"><div class="header_mid_outer"><div class="header_mid_inner"><div class="logo_wrap"><a href="index.php" title="Habibi" class="logo">

                                <img class="logo_retina"src="habibi.jpg" alt="Habibi" width="200" height="70" />
                            </a>
                            <a href="index.php" title="Habibi" class="logo logo_small">
                                <img src="https://hotel-lux.cmsmasters.net/wp-content/themes/hotel-lux/theme-vars/theme-style/img/logo_small.png" alt="Habibi" />
                                <img class="logo_retina logo_small" src="https://hotel-lux.cmsmasters.net/wp-content/themes/hotel-lux/theme-vars/theme-style/img/logo_small_retina.png"
                                     alt="Habibi" width="200" height="70" />
                            </a>
                        </div>
                        <div class="cmsmasters_header_button_wrap"><a href="login.php" class="cmsmasters_header_button">
                                <span>LOGIN</span></a></div>
                        <div class="cmsmasters_dynamic_cart_wrap"><div class="cmsmasters_dynamic_cart">
                                <div class="cmsmasters_dynamic_cart_button_hide">
                                </div><div class="widget_shopping_cart_content"></div></div></div><div class="mid_search_but_wrap">
                            <a href="javascript:void(0)" class="mid_search_but cmsmasters_header_search_but cmsmasters_theme_icon_search"></a></div>
                        <div class="resp_mid_nav_wrap"><div class="resp_mid_nav_outer"><a class="responsive_nav resp_mid_nav" href="javascript:void(0)"><span></span></a></div></div>


                        <!-- Start Navigation -->
                        <div class="mid_nav_wrap"><nav><div class="menu-primary-navigation-container"><ul id="navigation" class="mid_nav navigation">
                                        <?php $res=getHeader(); ?>
                                        <?php while($row=mysqli_fetch_assoc($res)) { ?>
                                            <li id="menu-item-13035" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-home current-menu-item page_item page-item-7366 current_page_item current-menu-ancestor current-menu-parent current_page_parent current_page_ancestor menu-item-has-children menu-item-13035 menu-item-depth-0">
                                                <a href=<?php echo $row['ref'];?>><span class="nav_item_wrap"><span class="nav_title"> <?php echo $row['content'];?></span></span></a>
                                            </li>
                                        <?php } ?>

                            </nav></div><!-- Finish Navigation --></div></div></div></header>
        <!-- Finish Header -->

        <!-- Start Middle -->

        <!-- Start Content -->
        <div class="middle_content entry"></div></div><div id="cmsmasters_row_9269cb290a" class="cmsmasters_row cmsmasters_color_scheme_default cmsmasters_row_top_default cmsmasters_row_bot_default cmsmasters_row_boxed">
        <div class="cmsmasters_row_outer_parent">
            <div class="cmsmasters_row_outer">
                <div class="cmsmasters_row_inner">
                    <div class="cmsmasters_row_margin">
                        <div id="cmsmasters_column_11b707bf2a" class="cmsmasters_column one_first">
                            <div class="cmsmasters_column_inner"><div id="cmsmasters_heading_c26a058b3e" class="cmsmasters_heading_wrap cmsmasters_heading_align_center">
                                    <h3 class="cmsmasters_heading"></h3>
                                </div><div id="cmsmasters_heading_49e43a231d" class="cmsmasters_heading_wrap cmsmasters_heading_align_center">
                                    <h2 class="cmsmasters_heading">forget password</h2>
                                </div>
                            </div></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div id="page-wrapper">

        <div class="row">
            <div class="col-lg-12">
                <form role="form" method="post" action="forget.php">
                    <div class="modal-body">
                        <div class="form_info cmsmasters_input one_half">
                            <label for="cmsmasters_name_2">Enter your email <span class="color_2">*</span></label>

                            <div class="form_field_wrap">
                                <input type="email" name="email"  placeholder="email" size="35"
                                       required/>

                            </div>


                            <div class="form_field_wrap">
                                <br><br><br>
                                <input type="submit" name="submit"  value="send verification" size="35" >
                                <br>
                                <br><br><br>
                            </div>

                        </div>
                    </div>
                </form>
                <br>

            </div>
            </div>





            <script>
                document.getElementById('timehere').valueAsDate = new Date();
                document.getElementById('timehere1').valueAsDate = new Date();


            </script>




        </div>
    </div>
</div>
<!-- Finish Middle -->
<!-- Start Bottom -->
<div id="bottom" class="cmsmasters_color_scheme_first">
    <div class="bottom_bg">
        <div class="bottom_outer">
            <div class="bottom_inner sidebar_layout_14141414">

                <aside id="custom-contact-info-3" class="widget widget_custom_contact_info_entries">
                    <h3 class="widgettitle">Info</h3>
                    <?php $res=getInfo();?>
                    <?php $row=mysqli_fetch_assoc($res); ?>
                    <div class="adr adress_wrap cmsmasters_theme_icon_user_address">

                        <span class="street-address contact_widget_address"><?php echo $row['address']; ?></span>
                    </div>
                    <span class="contact_widget_email cmsmasters_theme_icon_user_mail">
                            <a class="email" href=<?php echo $row['email']; ?> ><?php echo $row['email']; ?></a>
                        </span>

                    <span class="contact_widget_phone cmsmasters_theme_icon_user_phone">
                            <span class="tel"><?php echo $row['tell']; ?></span></span>

                </aside>
                <aside id="text-3" class="widget widget_text"><h3 class="widgettitle">About</h3>
                    <div class="textwidget">
                        <ul>
                            <?php $res=getQuick();?>
                            <?php while($row=mysqli_fetch_assoc($res)) { ?>
                                <li>
                                    <a href="<?php echo $row['link']; ?>"> <?php echo $row['name']; ?> </a>
                                </li>
                            <?php } ?>
                        </ul>
                    </div>

                </aside>
                <aside id="text-2" class="widget widget_text"><h3 class="widgettitle">Quick Links</h3>
                    <div class="textwidget">
                        <ul>
                            <?php $res=getSocial();?>
                            <?php while($row=mysqli_fetch_assoc($res)) { ?>

                                <li>
                                    <a href= <?php echo $row['link']; ?> > <?php echo $row['name']; ?> </a>
                                </li>
                            <?php } ?>
                        </ul>
                    </div>
                </aside>  <aside id="mailpoet_form-2" class="widget widget_mailpoet_form">


                    <div id="mailpoet_form_1" class="mailpoet_form mailpoet_form_widget">
                        <style type="text/css">.mailpoet_hp_email_label{display:none;}#mailpoet_form_1 .mailpoet_form {  }
                            #mailpoet_form_1 .mailpoet_paragraph { line-height: 20px; }
                            #mailpoet_form_1 .mailpoet_segment_label, #mailpoet_form_1 .mailpoet_text_label, #mailpoet_form_1 .mailpoet_textarea_label, #mailpoet_form_1 .mailpoet_select_label, #mailpoet_form_1 .mailpoet_radio_label, #mailpoet_form_1 .mailpoet_checkbox_label, #mailpoet_form_1 .mailpoet_list_label, #mailpoet_form_1 .mailpoet_date_label { display: block; font-weight: bold; }
                            #mailpoet_form_1 .mailpoet_text, #mailpoet_form_1 .mailpoet_textarea, #mailpoet_form_1 .mailpoet_select, #mailpoet_form_1 .mailpoet_date_month, #mailpoet_form_1 .mailpoet_date_day, #mailpoet_form_1 .mailpoet_date_year, #mailpoet_form_1 .mailpoet_date { display: block; }
                            #mailpoet_form_1 .mailpoet_text, #mailpoet_form_1 .mailpoet_textarea { width: 200px; }
                            #mailpoet_form_1 .mailpoet_checkbox {  }
                            #mailpoet_form_1 .mailpoet_submit input {  }
                            #mailpoet_form_1 .mailpoet_divider {  }
                            #mailpoet_form_1 .mailpoet_message {  }
                            #mailpoet_form_1 .mailpoet_validate_success { color: #468847; }
                            #mailpoet_form_1 .mailpoet_validate_error { color: #b94a48; }</style>
                        <form
                            target="_self"
                            method="post"
                            action="https://hotel-lux.cmsmasters.net/wp-admin/admin-post.php?action=mailpoet_subscription_form"
                            class="mailpoet_form mailpoet_form_widget"
                            novalidate
                        >
                            <input type="hidden" name="data[form_id]" value="1" />
                            <input type="hidden" name="token" value="a62ce25945" />
                            <input type="hidden" name="api_version" value="v1" />
                            <input type="hidden" name="endpoint" value="subscribers" />
                            <input type="hidden" name="mailpoet_method" value="subscribe" />

                            <label class="mailpoet_hp_email_label">Please leave this field empty<input type="email" name="data[email]"></label><p class="mailpoet_paragraph"><input type="email" class="mailpoet_text" name="data[form_field_ZW1haWw=]" title="Enter Your Email..." value="" data-automation-id="form_email"  placeholder="Enter Your Email... *" data-parsley-required="true" data-parsley-minlength="6" data-parsley-maxlength="150" data-parsley-error-message="Please specify a valid email address." data-parsley-required-message="This field is required."/></p>
                            <p class="mailpoet_paragraph"><input type="submit" class="mailpoet_submit" value="Subscribe" data-automation-id="subscribe-submit-button" /><span class="mailpoet_form_loading"><span class="mailpoet_bounce1"></span><span class="mailpoet_bounce2"></span><span class="mailpoet_bounce3"></span></span></p>

                            <div class="mailpoet_message">
                                <p class="mailpoet_validate_success"
                                   style="display:none;"
                                >Check your inbox or spam folder to confirm your subscription.
                                </p>
                                <p class="mailpoet_validate_error"
                                   style="display:none;"
                                >        </p>
                            </div>
                        </form>
                    </div>
                </aside>
            </div>
        </div>
    </div>
</div>
<!-- Finish Bottom -->
<a href="javascript:void(0)" id="slide_top" class="cmsmasters_theme_icon_slide_top"><span></span></a>
</div>
<!-- Finish Main -->

<!-- Start Footer -->
<footer id="footer" class="cmsmasters_color_scheme_footer cmsmasters_footer_default">
    <div class="footer_inner">
        <div class="footer_in_inner">

            <div class="social_wrap">
                <div class="social_wrap_inner">
                    <ul>
                        <?php $res=getSocial();?>
                        <?php while($row=mysqli_fetch_assoc($res)) { ?>
                            <li>
                                <a href="<?php echo $row['link']; ?> " class="cmsmasters_social_icon cmsmasters_social_icon_1 cmsmasters-icon-linkedin"
                                   title="<?php echo $row['name']; ?> " target="_blank"></a>
                            </li>
                        <?php } ?>
                    </ul>
                </div>
            </div>
            <div class="footer_logo_wrap"><a href="https://hotel-lux.cmsmasters.net/" title="Habibi Hotel" class="footer_logo">
                    <img src="habibi.jpg" alt="Habibi Hotel" />
                    <img class="footer_logo_retina" src="habibi.jpg" alt="Habibi Hotel" width="200" height="70" />
                </a>
            </div>		<span class="footer_copyright copyright">
			<a class="privacy-policy-link" href="#">Privacy Policy</a>      All Rights Reserved  © 2019		</span>
        </div>
    </div></footer>
<!-- Finish Footer -->
</div>
<span class="cmsmasters_responsive_width"></span>
<!-- Finish Page -->

<div id="cookie-law-info-bar"><span>This website uses cookies to improve your experience. We'll assume you're ok with this, but you can opt-out if you wish. <a  data-cli_action="accept" id="cookie_action_close_header"  class="medium cli-plugin-button cli-plugin-main-button cookie_action_close_header cli_action_button" style="display:inline-block; ">Accept</a></span></div><div id="cookie-law-info-again" style="display:none;"><span id="cookie_hdr_showagain">Privacy & Cookies Policy</span></div><div class="cli-modal-backdrop cli-fade cli-settings-overlay"></div>
<div class="cli-modal-backdrop cli-fade cli-popupbar-overlay"></div>
<script type="text/javascript">
    /* <![CDATA[ */
    cli_cookiebar_settings='{"animate_speed_hide":"500","animate_speed_show":"500","background":"#FFF","border":"#b1a6a6c2","border_on":false,"button_1_button_colour":"#000","button_1_button_hover":"#000000","button_1_link_colour":"#fff","button_1_as_button":true,"button_1_new_win":false,"button_2_button_colour":"#333","button_2_button_hover":"#292929","button_2_link_colour":"#444","button_2_as_button":false,"button_2_hidebar":false,"button_3_button_colour":"#000","button_3_button_hover":"#000000","button_3_link_colour":"#fff","button_3_as_button":true,"button_3_new_win":false,"button_4_button_colour":"#000","button_4_button_hover":"#000000","button_4_link_colour":"#fff","button_4_as_button":true,"font_family":"inherit","header_fix":false,"notify_animate_hide":true,"notify_animate_show":false,"notify_div_id":"#cookie-law-info-bar","notify_position_horizontal":"right","notify_position_vertical":"bottom","scroll_close":false,"scroll_close_reload":false,"accept_close_reload":false,"reject_close_reload":false,"showagain_tab":true,"showagain_background":"#fff","showagain_border":"#000","showagain_div_id":"#cookie-law-info-again","showagain_x_position":"100px","text":"#000","show_once_yn":false,"show_once":"10000","logging_on":false,"as_popup":false,"popup_overlay":true,"bar_heading_text":"","cookie_bar_as":"banner","popup_showagain_position":"bottom-right","widget_position":"left"}';
    /* ]]> */
</script>		<script>
    ( function ( body ) {
        'use strict';
        body.className = body.className.replace( /\btribe-no-js\b/, 'tribe-js' );
    } )( document.body );
</script>
<script> /* <![CDATA[ */var tribe_l10n_datatables = {"aria":{"sort_ascending":": activate to sort column ascending","sort_descending":": activate to sort column descending"},"length_menu":"Show _MENU_ entries","empty_table":"No data available in table","info":"Showing _START_ to _END_ of _TOTAL_ entries","info_empty":"Showing 0 to 0 of 0 entries","info_filtered":"(filtered from _MAX_ total entries)","zero_records":"No matching records found","search":"Search:","all_selected_text":"All items on this page were selected. ","select_all_link":"Select all pages","clear_selection":"Clear Selection.","pagination":{"all":"All","next":"Next","previous":"Previous"},"select":{"rows":{"0":"","_":": Selected %d rows","1":": Selected 1 row"}},"datepicker":{"dayNames":["Sunday","Monday","Tuesday","Wednesday","Thursday","Friday","Saturday"],"dayNamesShort":["Sun","Mon","Tue","Wed","Thu","Fri","Sat"],"dayNamesMin":["S","M","T","W","T","F","S"],"monthNames":["January","February","March","April","May","June","July","August","September","October","November","December"],"monthNamesShort":["January","February","March","April","May","June","July","August","September","October","November","December"],"monthNamesMin":["Jan","Feb","Mar","Apr","May","Jun","Jul","Aug","Sep","Oct","Nov","Dec"],"nextText":"Next","prevText":"Prev","currentText":"Today","closeText":"Done","today":"Today","clear":"Clear"}};/* ]]> */ </script>	<script type="text/javascript">
    var c = document.body.className;
    c = c.replace(/woocommerce-no-js/, 'woocommerce-js');
    document.body.className = c;
</script>
<link rel='stylesheet' id='google-fonts-herr-von-muellerhoff-css'  href='//fonts.googleapis.com/css?family=Herr+Von+Muellerhoff&#038;ver=5.0.7' type='text/css' media='all' />
<link rel='stylesheet' id='dashicons-css'  href='https://hotel-lux.cmsmasters.net/wp-includes/css/dashicons.min.css?ver=5.0.7' type='text/css' media='all' />
<link rel='stylesheet' id='nf-display-css'  href='https://hotel-lux.cmsmasters.net/wp-content/plugins/ninja-forms/assets/css/display-structure.css?ver=5.0.7' type='text/css' media='all' />
<link rel='stylesheet' id='pikaday-responsive-css'  href='https://hotel-lux.cmsmasters.net/wp-content/plugins/ninja-forms/assets/css/pikaday-package.css?ver=5.0.7' type='text/css' media='all' />
<link rel='stylesheet' id='mailpoet_public-css'  href='https://hotel-lux.cmsmasters.net/wp-content/plugins/mailpoet/assets/dist/css/public.82ef7cbc.css?ver=5.0.7' type='text/css' media='all' />
<script type='text/javascript' src='https://hotel-lux.cmsmasters.net/wp-content/plugins/cmsmasters-mega-menu/js/jquery.megaMenu.js?ver=1.2.9'></script>
<script type='text/javascript'>
    /* <![CDATA[ */
    var wpcf7 = {"apiSettings":{"root":"https:\/\/hotel-lux.cmsmasters.net\/wp-json\/contact-form-7\/v1","namespace":"contact-form-7\/v1"}};
    /* ]]> */
</script>
<script type='text/javascript' src='https://hotel-lux.cmsmasters.net/wp-content/plugins/contact-form-7/includes/js/scripts.js?ver=5.1.1'></script>
<script type='text/javascript' src='https://hotel-lux.cmsmasters.net/wp-content/plugins/woocommerce/assets/js/jquery-blockui/jquery.blockUI.min.js?ver=2.70'></script>
<script type='text/javascript'>
    /* <![CDATA[ */
    var wc_add_to_cart_params = {"ajax_url":"\/wp-admin\/admin-ajax.php","wc_ajax_url":"\/?wc-ajax=%%endpoint%%","i18n_view_cart":"View cart","cart_url":"https:\/\/hotel-lux.cmsmasters.net\/cart\/","is_cart":"","cart_redirect_after_add":"no"};
    /* ]]> */
</script>
<script type='text/javascript' src='https://hotel-lux.cmsmasters.net/wp-content/plugins/woocommerce/assets/js/frontend/add-to-cart.min.js?ver=3.6.2'></script>
<script type='text/javascript' src='https://hotel-lux.cmsmasters.net/wp-content/plugins/woocommerce/assets/js/js-cookie/js.cookie.min.js?ver=2.1.4'></script>
<script type='text/javascript'>
    /* <![CDATA[ */
    var woocommerce_params = {"ajax_url":"\/wp-admin\/admin-ajax.php","wc_ajax_url":"\/?wc-ajax=%%endpoint%%"};
    /* ]]> */
</script>
<script type='text/javascript' src='https://hotel-lux.cmsmasters.net/wp-content/plugins/woocommerce/assets/js/frontend/woocommerce.min.js?ver=3.6.2'></script>
<script type='text/javascript'>
    /* <![CDATA[ */
    var wc_cart_fragments_params = {"ajax_url":"\/wp-admin\/admin-ajax.php","wc_ajax_url":"\/?wc-ajax=%%endpoint%%","cart_hash_key":"wc_cart_hash_9cc0b05a0aabba49d52cffc16cd1dfb3","fragment_name":"wc_fragments_9cc0b05a0aabba49d52cffc16cd1dfb3","request_timeout":"5000"};
    /* ]]> */
</script>
<script type='text/javascript' src='https://hotel-lux.cmsmasters.net/wp-content/plugins/woocommerce/assets/js/frontend/cart-fragments.min.js?ver=3.6.2'></script>
<script type='text/javascript' src='https://hotel-lux.cmsmasters.net/wp-content/themes/hotel-lux/js/cmsmasters-hover-slider.min.js?ver=1.0.0'></script>
<script type='text/javascript' src='https://hotel-lux.cmsmasters.net/wp-content/themes/hotel-lux/js/easing.min.js?ver=1.0.0'></script>
<script type='text/javascript' src='https://hotel-lux.cmsmasters.net/wp-content/themes/hotel-lux/js/easy-pie-chart.min.js?ver=1.0.0'></script>
<script type='text/javascript' src='https://hotel-lux.cmsmasters.net/wp-content/themes/hotel-lux/js/mousewheel.min.js?ver=1.0.0'></script>
<script type='text/javascript' src='https://hotel-lux.cmsmasters.net/wp-content/themes/hotel-lux/js/owlcarousel.min.js?ver=1.0.0'></script>
<script type='text/javascript' src='https://hotel-lux.cmsmasters.net/wp-includes/js/imagesloaded.min.js?ver=3.2.0'></script>
<script type='text/javascript' src='https://hotel-lux.cmsmasters.net/wp-content/themes/hotel-lux/js/request-animation-frame.min.js?ver=1.0.0'></script>
<script type='text/javascript' src='https://hotel-lux.cmsmasters.net/wp-content/themes/hotel-lux/js/scrollspy.js?ver=1.0.0'></script>
<script type='text/javascript' src='https://hotel-lux.cmsmasters.net/wp-content/themes/hotel-lux/js/scroll-to.min.js?ver=1.0.0'></script>
<script type='text/javascript' src='https://hotel-lux.cmsmasters.net/wp-content/themes/hotel-lux/js/stellar.min.js?ver=1.0.0'></script>
<script type='text/javascript' src='https://hotel-lux.cmsmasters.net/wp-content/themes/hotel-lux/js/waypoints.min.js?ver=1.0.0'></script>
<script type='text/javascript'>
    /* <![CDATA[ */
    var cmsmasters_script = {"theme_url":"https:\/\/hotel-lux.cmsmasters.net\/wp-content\/themes\/hotel-lux","site_url":"https:\/\/hotel-lux.cmsmasters.net\/","ajaxurl":"https:\/\/hotel-lux.cmsmasters.net\/wp-admin\/admin-ajax.php","nonce_ajax_like":"685c16a903","nonce_ajax_view":"495c336d2a","project_puzzle_proportion":"1.55","gmap_api_key":"AIzaSyBIyWpcN4BzUQduapNmX5kb2DruMvy2KMc","gmap_api_key_notice":"Please add your Google Maps API key","gmap_api_key_notice_link":"read more how","primary_color":"#b99470","ilightbox_skin":"dark","ilightbox_path":"vertical","ilightbox_infinite":"0","ilightbox_aspect_ratio":"1","ilightbox_mobile_optimizer":"1","ilightbox_max_scale":"1","ilightbox_min_scale":"0.2","ilightbox_inner_toolbar":"0","ilightbox_smart_recognition":"0","ilightbox_fullscreen_one_slide":"0","ilightbox_fullscreen_viewport":"center","ilightbox_controls_toolbar":"1","ilightbox_controls_arrows":"0","ilightbox_controls_fullscreen":"1","ilightbox_controls_thumbnail":"1","ilightbox_controls_keyboard":"1","ilightbox_controls_mousewheel":"1","ilightbox_controls_swipe":"1","ilightbox_controls_slideshow":"0","ilightbox_close_text":"Close","ilightbox_enter_fullscreen_text":"Enter Fullscreen (Shift+Enter)","ilightbox_exit_fullscreen_text":"Exit Fullscreen (Shift+Enter)","ilightbox_slideshow_text":"Slideshow","ilightbox_next_text":"Next","ilightbox_previous_text":"Previous","ilightbox_load_image_error":"An error occurred when trying to load photo.","ilightbox_load_contents_error":"An error occurred when trying to load contents.","ilightbox_missing_plugin_error":"The content your are attempting to view requires the <a href='{pluginspage}' target='_blank'>{type} plugin<\\\/a>."};
    /* ]]> */
</script>
<script type='text/javascript' src='https://hotel-lux.cmsmasters.net/wp-content/themes/hotel-lux/js/jquery.script.js?ver=1.0.0'></script>
<script type='text/javascript'>
    /* <![CDATA[ */
    var cmsmasters_theme_script = {"primary_color":"#b99470"};
    /* ]]> */
</script>
<script type='text/javascript' src='https://hotel-lux.cmsmasters.net/wp-content/themes/hotel-lux/theme-framework/theme-style/js/jquery.theme-script.js?ver=1.0.0'></script>
<script type='text/javascript' src='https://hotel-lux.cmsmasters.net/wp-content/themes/hotel-lux/js/jquery.tweet.min.js?ver=1.3.1'></script>
<script type='text/javascript' src='https://hotel-lux.cmsmasters.net/wp-content/themes/hotel-lux/js/smooth-sticky.min.js?ver=1.0.2'></script>
<script type='text/javascript' src='https://hotel-lux.cmsmasters.net/wp-includes/js/comment-reply.min.js?ver=5.0.7'></script>
<script type='text/javascript'>
    /* <![CDATA[ */
    var cmsmasters_woo_script = {"currency_symbol":"\u00a3","thumbnail_image_width":"64","thumbnail_image_height":"64"};
    /* ]]> */
</script>
<script type='text/javascript' src='https://hotel-lux.cmsmasters.net/wp-content/themes/hotel-lux/woocommerce/cmsmasters-framework/theme-style/js/jquery.plugin-script.js?ver=1.0.0'></script>
<script type='text/javascript' src='https://hotel-lux.cmsmasters.net/wp-includes/js/wp-embed.min.js?ver=5.0.7'></script>
<script type='text/javascript'>
    /* <![CDATA[ */
    var ratingsL10n = {"plugin_url":"https:\/\/hotel-lux.cmsmasters.net\/wp-content\/plugins\/wp-postratings","ajax_url":"https:\/\/hotel-lux.cmsmasters.net\/wp-admin\/admin-ajax.php","text_wait":"Please rate only 1 item at a time.","image":"stars(png)","image_ext":"png","max":"5","show_loading":"1","show_fading":"1","custom":"0"};
    var ratings_mouseover_image=new Image();ratings_mouseover_image.src="https://hotel-lux.cmsmasters.net/wp-content/plugins/wp-postratings/images/stars(png)/rating_over.png";;
    var ratingsL10n = {"plugin_url":"https:\/\/hotel-lux.cmsmasters.net\/wp-content\/themes\/hotel-lux\/cmsmasters-wp-postratings\/cmsmasters-framework\/theme-style","ajax_url":"https:\/\/hotel-lux.cmsmasters.net\/wp-admin\/admin-ajax.php","text_wait":"Please rate only 1 post at a time.","image":"stars(png)","image_ext":"png","max":"5","show_loading":"1","show_fading":"1","custom":"0"};
    var ratings_mouseover_image=new Image();ratings_mouseover_image.src=ratingsL10n.plugin_url+"/images/"+ratingsL10n.image+"/rating_over."+ratingsL10n.image_ext;;
    var ratingsL10n = {"plugin_url":"https:\/\/hotel-lux.cmsmasters.net\/wp-content\/themes\/hotel-lux\/cmsmasters-wp-postratings\/cmsmasters-framework\/theme-style","ajax_url":"https:\/\/hotel-lux.cmsmasters.net\/wp-admin\/admin-ajax.php","text_wait":"Please rate only 1 post at a time.","image":"stars(png)","image_ext":"png","max":"5","show_loading":"1","show_fading":"1","custom":"0"};
    var ratings_mouseover_image=new Image();ratings_mouseover_image.src=ratingsL10n.plugin_url+"/images/"+ratingsL10n.image+"/rating_over."+ratingsL10n.image_ext;;
    /* ]]> */
</script>
<script type='text/javascript' src='https://hotel-lux.cmsmasters.net/wp-content/plugins/wp-postratings/js/postratings-js.js?ver=1.86.2'></script>
<script src='https://hotel-lux.cmsmasters.net/wp-content/plugins/the-events-calendar/common/src/resources/js/underscore-before.js'></script>
<script type='text/javascript' src='https://hotel-lux.cmsmasters.net/wp-includes/js/underscore.min.js?ver=1.8.3'></script>
<script src='https://hotel-lux.cmsmasters.net/wp-content/plugins/the-events-calendar/common/src/resources/js/underscore-after.js'></script>
<script type='text/javascript' src='https://hotel-lux.cmsmasters.net/wp-includes/js/backbone.min.js?ver=1.2.3'></script>
<script type='text/javascript' src='https://hotel-lux.cmsmasters.net/wp-content/plugins/ninja-forms/assets/js/min/front-end-deps.js?ver=3.3.20'></script>
<script type='text/javascript'>
    /* <![CDATA[ */
    var nfi18n = {"ninjaForms":"Ninja Forms","changeEmailErrorMsg":"Please enter a valid email address!","changeDateErrorMsg":"Please enter a valid date!","confirmFieldErrorMsg":"These fields must match!","fieldNumberNumMinError":"Number Min Error","fieldNumberNumMaxError":"Number Max Error","fieldNumberIncrementBy":"Please increment by ","fieldTextareaRTEInsertLink":"Insert Link","fieldTextareaRTEInsertMedia":"Insert Media","fieldTextareaRTESelectAFile":"Select a file","formErrorsCorrectErrors":"Please correct errors before submitting this form.","validateRequiredField":"This is a required field.","honeypotHoneypotError":"Honeypot Error","fileUploadOldCodeFileUploadInProgress":"File Upload in Progress.","fileUploadOldCodeFileUpload":"FILE UPLOAD","currencySymbol":"","fieldsMarkedRequired":"Fields marked with an <span class=\"ninja-forms-req-symbol\">*<\/span> are required","thousands_sep":",","decimal_point":".","dateFormat":"m\/d\/Y","startOfWeek":"1","of":"of","previousMonth":"Previous Month","nextMonth":"Next Month","months":["January","February","March","April","May","June","July","August","September","October","November","December"],"monthsShort":["Jan","Feb","Mar","Apr","May","Jun","Jul","Aug","Sep","Oct","Nov","Dec"],"weekdays":["Sunday","Monday","Tuesday","Wednesday","Thursday","Friday","Saturday"],"weekdaysShort":["Sun","Mon","Tue","Wed","Thu","Fri","Sat"],"weekdaysMin":["Su","Mo","Tu","We","Th","Fr","Sa"]};
    var nfFrontEnd = {"adminAjax":"https:\/\/hotel-lux.cmsmasters.net\/wp-admin\/admin-ajax.php","ajaxNonce":"30e40fe03c","requireBaseUrl":"https:\/\/hotel-lux.cmsmasters.net\/wp-content\/plugins\/ninja-forms\/assets\/js\/","use_merge_tags":{"user":{"address":"address","textbox":"textbox","button":"button","checkbox":"checkbox","city":"city","confirm":"confirm","date":"date","email":"email","firstname":"firstname","html":"html","hidden":"hidden","lastname":"lastname","listcheckbox":"listcheckbox","listcountry":"listcountry","listmultiselect":"listmultiselect","listradio":"listradio","listselect":"listselect","liststate":"liststate","note":"note","number":"number","password":"password","passwordconfirm":"passwordconfirm","product":"product","quantity":"quantity","recaptcha":"recaptcha","shipping":"shipping","spam":"spam","starrating":"starrating","submit":"submit","terms":"terms","textarea":"textarea","total":"total","unknown":"unknown","zip":"zip","hr":"hr"},"post":{"address":"address","textbox":"textbox","button":"button","checkbox":"checkbox","city":"city","confirm":"confirm","date":"date","email":"email","firstname":"firstname","html":"html","hidden":"hidden","lastname":"lastname","listcheckbox":"listcheckbox","listcountry":"listcountry","listmultiselect":"listmultiselect","listradio":"listradio","listselect":"listselect","liststate":"liststate","note":"note","number":"number","password":"password","passwordconfirm":"passwordconfirm","product":"product","quantity":"quantity","recaptcha":"recaptcha","shipping":"shipping","spam":"spam","starrating":"starrating","submit":"submit","terms":"terms","textarea":"textarea","total":"total","unknown":"unknown","zip":"zip","hr":"hr"},"system":{"address":"address","textbox":"textbox","button":"button","checkbox":"checkbox","city":"city","confirm":"confirm","date":"date","email":"email","firstname":"firstname","html":"html","hidden":"hidden","lastname":"lastname","listcheckbox":"listcheckbox","listcountry":"listcountry","listmultiselect":"listmultiselect","listradio":"listradio","listselect":"listselect","liststate":"liststate","note":"note","number":"number","password":"password","passwordconfirm":"passwordconfirm","product":"product","quantity":"quantity","recaptcha":"recaptcha","shipping":"shipping","spam":"spam","starrating":"starrating","submit":"submit","terms":"terms","textarea":"textarea","total":"total","unknown":"unknown","zip":"zip","hr":"hr"},"fields":{"address":"address","textbox":"textbox","button":"button","checkbox":"checkbox","city":"city","confirm":"confirm","date":"date","email":"email","firstname":"firstname","html":"html","hidden":"hidden","lastname":"lastname","listcheckbox":"listcheckbox","listcountry":"listcountry","listmultiselect":"listmultiselect","listradio":"listradio","listselect":"listselect","liststate":"liststate","note":"note","number":"number","password":"password","passwordconfirm":"passwordconfirm","product":"product","quantity":"quantity","recaptcha":"recaptcha","shipping":"shipping","spam":"spam","starrating":"starrating","submit":"submit","terms":"terms","textarea":"textarea","total":"total","unknown":"unknown","zip":"zip","hr":"hr"},"calculations":{"html":"html","hidden":"hidden","note":"note","unknown":"unknown"}},"opinionated_styles":""};
    /* ]]> */
</script>
<script type='text/javascript' src='https://hotel-lux.cmsmasters.net/wp-content/plugins/ninja-forms/assets/js/min/front-end.js?ver=3.3.20'></script>
<script type='text/javascript' src='https://hotel-lux.cmsmasters.net/wp-content/plugins/ninja-forms/assets/js/min/front-end--datepicker.min.js?ver=3.3.20'></script>
<script type='text/javascript' src='https://hotel-lux.cmsmasters.net/wp-content/plugins/mailpoet/assets/dist/js/vendor.62c0b27e.js?ver=3.24.0'></script>
<script type='text/javascript'>
    /* <![CDATA[ */
    var MailPoetForm = {"ajax_url":"https:\/\/hotel-lux.cmsmasters.net\/wp-admin\/admin-ajax.php","is_rtl":""};
    /* ]]> */
</script>
<script type='text/javascript' src='https://hotel-lux.cmsmasters.net/wp-content/plugins/mailpoet/assets/dist/js/public.70d9ace1.js?ver=3.24.0'></script>
<script type='text/javascript'>
    function initMailpoetTranslation() {
        if (typeof MailPoet !== 'undefined') {
            MailPoet.I18n.add('ajaxFailedErrorMessage', 'An error has happened while performing a request, please try again later.')
        } else {
            setTimeout(initMailpoetTranslation, 250);
        }
    }
    setTimeout(initMailpoetTranslation, 250);
</script>
<script id="tmpl-nf-layout" type="text/template">
    <span id="nf-form-title-{{{ data.id }}}" class="nf-form-title">
		{{{ ( 1 == data.settings.show_title ) ? '<h3>' + data.settings.title + '</h3>' : '' }}}
	</span>
    <div class="nf-form-wrap ninja-forms-form-wrap">
        <div class="nf-response-msg"></div>
        <div class="nf-debug-msg"></div>
        <div class="nf-before-form"></div>
        <div class="nf-form-layout"></div>
        <div class="nf-after-form"></div>
    </div>
</script>

<script id="tmpl-nf-empty" type="text/template">

</script>
<script id="tmpl-nf-before-form" type="text/template">
    {{{ data.beforeForm }}}
</script><script id="tmpl-nf-after-form" type="text/template">
    {{{ data.afterForm }}}
</script><script id="tmpl-nf-before-fields" type="text/template">
    <div class="nf-form-fields-required">{{{ data.renderFieldsMarkedRequired() }}}</div>
    {{{ data.beforeFields }}}
</script><script id="tmpl-nf-after-fields" type="text/template">
    {{{ data.afterFields }}}
    <div id="nf-form-errors-{{{ data.id }}}" class="nf-form-errors" role="alert"></div>
    <div class="nf-form-hp"></div>
</script>
<script id="tmpl-nf-before-field" type="text/template">
    {{{ data.beforeField }}}
</script><script id="tmpl-nf-after-field" type="text/template">
    {{{ data.afterField }}}
</script><script id="tmpl-nf-form-layout" type="text/template">
    <form>
        <div>
            <div class="nf-before-form-content"></div>
            <div class="nf-form-content {{{ data.element_class }}}"></div>
            <div class="nf-after-form-content"></div>
        </div>
    </form>
</script><script id="tmpl-nf-form-hp" type="text/template">
    <label for="nf-field-hp-{{{ data.id }}}" aria-hidden="true">
        {{{ nfi18n.formHoneypot }}}
        <input id="nf-field-hp-{{{ data.id }}}" name="nf-field-hp" class="nf-element nf-field-hp" type="text" value=""/>
    </label>
</script>
<script id="tmpl-nf-field-layout" type="text/template">
    <div id="nf-field-{{{ data.id }}}-container" class="nf-field-container {{{ data.type }}}-container {{{ data.renderContainerClass() }}}">
        <div class="nf-before-field"></div>
        <div class="nf-field"></div>
        <div class="nf-after-field"></div>
    </div>
</script>
<script id="tmpl-nf-field-before" type="text/template">
    {{{ data.beforeField }}}
</script><script id="tmpl-nf-field-after" type="text/template">
    <#
    /*
    * Render our input limit section if that setting exists.
    */
    #>
    <div class="nf-input-limit"></div>
    <#
    /*
    * Render our error section if we have an error.
    */
    #>
    <div id="nf-error-{{{ data.id }}}" class="nf-error-wrap nf-error" role="alert"></div>
    <#
    /*
    * Render any custom HTML after our field.
    */
    #>
    {{{ data.afterField }}}
</script>
<script id="tmpl-nf-field-wrap" type="text/template">
    <div id="nf-field-{{{ data.id }}}-wrap" class="{{{ data.renderWrapClass() }}}" data-field-id="{{{ data.id }}}">
        <#
        /*
        * This is our main field template. It's called for every field type.
        * Note that must have ONE top-level, wrapping element. i.e. a div/span/etc that wraps all of the template.
        */
        #>
        <#
        /*
        * Render our label.
        */
        #>
        {{{ data.renderLabel() }}}
        <#
        /*
        * Render our field element. Uses the template for the field being rendered.
        */
        #>
        <div class="nf-field-element">{{{ data.renderElement() }}}</div>
        <#
        /*
        * Render our Description Text.
        */
        #>
        {{{ data.renderDescText() }}}
    </div>
</script>
<script id="tmpl-nf-field-wrap-no-label" type="text/template">
    <div id="nf-field-{{{ data.id }}}-wrap" class="{{{ data.renderWrapClass() }}}" data-field-id="{{{ data.id }}}">
        <div class="nf-field-label"></div>
        <div class="nf-field-element">{{{ data.renderElement() }}}</div>
        <div class="nf-error-wrap"></div>
    </div>
</script>
<script id="tmpl-nf-field-wrap-no-container" type="text/template">

    {{{ data.renderElement() }}}

    <div class="nf-error-wrap"></div>
</script>
<script id="tmpl-nf-field-label" type="text/template">
    <div class="nf-field-label"><label for="nf-field-{{{ data.id }}}"
                                       id="nf-label-field-{{{ data.id }}}"
                                       class="{{{ data.renderLabelClasses() }}}">{{{ data.label }}} {{{ ( 'undefined' != typeof data.required && 1 == data.required ) ? '<span class="ninja-forms-req-symbol">*</span>' : '' }}} {{{ data.maybeRenderHelp() }}}</label></div>
</script>
<script id="tmpl-nf-field-error" type="text/template">
    <div class="nf-error-msg nf-error-{{{ data.id }}}">{{{ data.msg }}}</div>
</script><script id="tmpl-nf-form-error" type="text/template">
    <div class="nf-error-msg nf-error-{{{ data.id }}}">{{{ data.msg }}}</div>
</script><script id="tmpl-nf-field-input-limit" type="text/template">
    {{{ data.currentCount() }}} {{{ nfi18n.of }}} {{{ data.input_limit }}} {{{ data.input_limit_msg }}}
</script><script id="tmpl-nf-field-null" type="text/template">
</script><script id="tmpl-nf-field-firstname" type="text/template">
    <input
        type="text"
        value="{{{ data.value }}}"
        class="{{{ data.renderClasses() }}} nf-element"

        id="nf-field-{{{ data.id }}}"
    <# if( ! data.disable_browser_autocompletes ){ #>
    name="{{ data.custom_name_attribute || 'nf-field-' + data.id + '-' + data.type }}"
    autocomplete="given-name"
    <# } else { #>
    name="{{ data.custom_name_attribute || 'nf-field-' + data.id }}"
    {{{ data.maybeDisableAutocomplete() }}}
    <# } #>
    {{{ data.renderPlaceholder() }}}

    aria-invalid="false"
    aria-describedby="nf-error-{{{ data.id }}}"
    aria-labelledby="nf-label-field-{{{ data.id }}}"

    {{{ data.maybeRequired() }}}
    >
</script>
<script id='tmpl-nf-field-input' type='text/template'>
    <input id="nf-field-{{{ data.id }}}" name="nf-field-{{{ data.id }}}" aria-invalid="false" aria-describedby="nf-error-{{{ data.id }}}" class="{{{ data.renderClasses() }}} nf-element" type="text" value="{{{ data.value }}}" {{{ data.renderPlaceholder() }}} {{{ data.maybeDisabled() }}}
           aria-labelledby="nf-label-field-{{{ data.id }}}"

           {{{ data.maybeRequired() }}}
    >
</script>
<script id="tmpl-nf-field-email" type="text/template">
    <input
        type="email"
        value="{{{ data.value }}}"
        class="{{{ data.renderClasses() }}} nf-element"

        id="nf-field-{{{ data.id }}}"
    <# if( ! data.disable_browser_autocompletes ){ #>
    name="{{ data.custom_name_attribute || 'nf-field-' + data.id + '-' + data.type }}"
    autocomplete="email"
    <# } else { #>
    name="{{ data.custom_name_attribute || 'nf-field-' + data.id }}"
    {{{ data.maybeDisableAutocomplete() }}}
    <# } #>
    {{{ data.renderPlaceholder() }}}
    {{{ data.maybeDisabled() }}}

    aria-invalid="false"
    aria-describedby="nf-error-{{{ data.id }}}"
    aria-labelledby="nf-label-field-{{{ data.id }}}"

    {{{ data.maybeRequired() }}}
    >
</script>
<script id="tmpl-nf-field-listselect" type="text/template">
    <select id="nf-field-{{{ data.id }}}" name="nf-field-{{{ data.id }}}" aria-invalid="false" aria-describedby="nf-error-{{{ data.id }}}" class="{{{ data.renderClasses() }}} nf-element" {{{ data.renderOtherAttributes() }}}
            aria-labelledby="nf-label-field-{{{ data.id }}}"

            {{{ data.maybeRequired() }}}
    >
        {{{ data.renderOptions() }}}
    </select>
    <div for="nf-field-{{{ data.id }}}"></div>
</script>

<script id="tmpl-nf-field-listselect-option" type="text/template">
    <# if ( ! data.visible ) { return ''; } #>
    <option value="{{{ data.value }}}" {{{ ( 1 == data.selected ) ? 'selected="selected"' : '' }}} >{{{ data.label }}}</option>
</script>
<script id="tmpl-nf-field-date" type="text/template">
    <input id="nf-field-{{{ data.id }}}" name="nf-field-{{{ data.id }}}" aria-invalid="false" aria-describedby="nf-error-{{{ data.id }}}" class="{{{ data.renderClasses() }}} nf-element datepicker"
           aria-labelledby="nf-label-field-{{{ data.id }}}"
           {{{ data.maybeRequired() }}}
           type="date" value="{{{ data.value }}}" {{{ data.renderPlaceholder() }}}>
</script>
<script id="tmpl-nf-field-textbox" type="text/template">
    <input
        type="text"
        value="{{{ data.value }}}"
        class="{{{ data.renderClasses() }}} nf-element"
        {{{ data.renderPlaceholder() }}}
        {{{ data.maybeDisabled() }}}
        {{{ data.maybeInputLimit() }}}

        id="nf-field-{{{ data.id }}}"
    <# if( ! data.disable_browser_autocomplete && -1 < [ 'city', 'zip' ].indexOf( data.type ) ){ #>
    name="{{ data.custom_name_attribute || 'nf-field-' + data.id + '-' + data.type }}"
    autocomplete="on"
    <# } else { #>
    name="{{ data.custom_name_attribute || 'nf-field-' + data.id }}"
    {{{ data.maybeDisableAutocomplete() }}}
    <# } #>

    aria-invalid="false"
    aria-describedby="nf-error-{{{ data.id }}}"
    aria-labelledby="nf-label-field-{{{ data.id }}}"

    {{{ data.maybeRequired() }}}
    >
</script>
<script id="tmpl-nf-field-submit" type="text/template">
    <input id="nf-field-{{{ data.id }}}" class="{{{ data.renderClasses() }}} nf-element " type="button" value="{{{ data.label }}}" {{{ ( data.disabled ) ? 'disabled' : '' }}}>
</script><script id='tmpl-nf-field-button' type='text/template'>
    <button id="nf-field-{{{ data.id }}}" name="nf-field-{{{ data.id }}}" class="{{{ data.classes }}} nf-element">
        {{{ data.label }}}
    </button>
</script>        <script>
    var post_max_size = '256';
    var upload_max_filesize = '256';
    var wp_memory_limit = '64';
</script>
</body>
</html>
