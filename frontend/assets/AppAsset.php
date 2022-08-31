<?php

namespace frontend\assets;

use yii\web\AssetBundle;

/**
 * Main frontend application asset bundle.
 */
class AppAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'css/owl.carousel.min.css',
        'css/flaticon.css',
        'css/price_rangs.css',
        'css/slicknav.css',
        'css/animate.min.css',
        'css/themify-icons.css',
        'css/slick.css',
        'css/nice-select.css',
        'css/style.css',
        'css/magnific-popup.css',
        'css/responsive.css',
        'css/site.css',
        'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css'
    ];
    public $js = [
        'js/vendor/modernizr-3.5.0.min.js',
        'js/popper.min.js',
        'js/jquery.slicknav.min.js',
        'js/owl.carousel.min.js',
        'js/slick.min.js',
        'js/price_rangs.js',
        'js/wow.min.js',
        'js/animated.headline.js',
        'js/jquery.magnific-popup.js',
        'js/jquery.scrollUp.min.js',
        'js/jquery.nice-select.min.js',
        'js/jquery.sticky.js',
        'js/contact.js',
        'js/jquery.form.js',
        'js/jquery.validate.min.js',
        'js/mail-script.js',
        'js/jquery.ajaxchimp.min.js',
        'js/plugins.js',
        'js/main.js',



    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap4\BootstrapAsset',
    ];
}
