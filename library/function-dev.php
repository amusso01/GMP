<?php 

/**
 * Functions used for development purposes.
 *
 * @author      Andrea Musso
 *
 */


 /*=======================================================
Table of Contents:
–––––––––––––––––––––––––––––––––––––––––––––––––––––––––
  1.0 CODING TOOLKIT
    1.1 debug / dump'n die
    1.2 Return svg from ACF file field
    1.3 variables
    1.4 string shortener
    1.5 browser check
    1.6 environment check

  2.0 OUTPUT TOOLKIT
    2.1 google tag manager

  3.0 ACCESS TOOLKIT
    3.1 login page
    3.2 logged-in-only
=======================================================*/

/*==================================================================================
  1.0 CODING TOOLKIT
==================================================================================*/


/* 1.1 DEBUG / DUMP'N DIE
/––––––––––––––––––––––––*/
function debug($var) {
  echo '<pre>'.var_dump($var).'</pre>';
}
function dd($var) {
  echo '<pre>'.var_dump($var).'</pre>';
  die();
}


/* 1.2 Return svg from ACF file field
/––––––––––––––––––––––––*/
function acfFile_toSvg($file){
	if($file)
    return str_replace('\'', '',  var_export(file_get_contents($file), true));
}


/* 1.3 VARIABLES
/––––––––––––––––––––––––*/


/* 1.4 STRING SHORTENER
/––––––––––––––––––––––––*/
// shorten strings and append ...
function shorten($string,$length,$append="...") {
    $string = trim($string);
    if(strlen($string) > $length) {
      $string  = substr($string, 0, $length);
      $string .= $append;
    }
    return $string;
}


/* 1.5 BROWSER CHECK
/------------------------*/
function get_browser_name() {
    $user_agent = $_SERVER['HTTP_USER_AGENT'];
    if (strpos($user_agent, 'Chrome')) return 'Chrome';
    elseif (strpos($user_agent, 'Safari')) return 'Safari';
    elseif (strpos($user_agent, 'Firefox')) return 'Firefox';
    elseif (strpos($user_agent, 'Opera') || strpos($user_agent, 'OPR/')) return 'Opera';
    elseif (strpos($user_agent, 'Edge')) return 'Edge';
    elseif (strpos($user_agent, 'MSIE') || strpos($user_agent, 'Trident/7')) return 'InternetExplorer';
    return 'Other';
}


/*==================================================================================
  2.0 OUTPUT TOOLKIT
==================================================================================*/

/* 2.1 GOOGLE TAG MANAGER
/––––––––––––––––––––––––*/
// outputs one of the two parts of the Google Tag Manager scripts
// Usage: gtm('head', 'GTM-1234567) and gtm('body', 'GTM-1234567)
function WPSeed_gtm($type) {

    GLOBAL $GTM_id;
    if ($GTM_id) {
        if ($type == 'head') {
        echo "<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
            new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
            j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
            'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
            })(window,document,'script','dataLayer',' $GTM_id ');</script>";

        }elseif ($type == 'body') {
    
        echo ' <!-- Google Tag Manager (noscript) -->
        <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=<?= $GTM_id ?>"
        height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>';
        
        }
    }
    
}


/*==================================================================================
  3.0 IMAGE
==================================================================================*/


 // Print the image's srcset for lazyload
 function bml_the_image_srcset( $image_id, $echo = true ) {

  if ( !$image_id ) return;

  $image_labels = [ 'size_400', 'size_600', 'size_800', 'size_1000', 'size_1200', 'size_1400', 'size_1600', 'size_1800', 'full' ];
  $image_set = [];

  foreach ( $image_labels as $image_label ) {

    $image = wp_get_attachment_image_src( $image_id, $image_label );
    $image_url = $image[0];
    $image_width = $image[1] <= 300 ? 301 : $image[1];

    $image_set[] =  $image_url . ' ' . ( $image_width - 300 ) . 'w' ;
  }

  $image_set = array_unique( $image_set );

  if ( $echo ) {
    echo implode( ', ', $image_set );
  } else {
    return implode( ', ', $image_set );
  }
  
}


// <figure>
// <img data-sizes="auto"
// data-srcset="bml_the_image_srcset($author['image']) "
// data-parent-fit="cover"
// style="max-width: 100%; max-height: 100%;"
// class="lazyload" alt="author image" />
// </figure>
