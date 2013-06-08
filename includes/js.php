<?php

function occam_js_alter(&$js) {
/* 
  // Nuke js from core modules
  foreach ($js as $file => $value) {
    if (strpos($file, 'modules/') !== FALSE) {
      unset($js[$file]);
    }
  }
  // Nuke js from contrib
  foreach ($js as $file => $value) {
    if (strpos($file, '/modules/') !== FALSE) {
      unset($js[$file]);
    }
  }
  // Nuke js from misc folder
  foreach ($js as $file => $value) {
    if (strpos($file, 'misc/') !== FALSE) {
      unset($js[$file]);
    }
  }
*/
  // update and include jquery from external CDN
  //http://www.metaltoad.com/blog/mobile-drupal-optimization-results  
  if (isset($js['misc/jquery.js'])) {
    $js['misc/jquery.js']['data'] ='//ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js';
    $js['misc/jquery.js']['type'] = 'external';
    $js['misc/jquery.js']['weight'] = -100;
  }  


/*
function THEME_preprocess_page(&$vars) {
  // Remove unnecessary js from mobile site
  $js = drupal_add_js();
  // unset($js['core']); // Unset all core js
  unset($js['module']['sites/all/modules/yourmodule/yourjs.js']); // unset specific module js
  unset($js['module']); // Or unset all module js
  $vars['scripts'] = $js;
}
*/


/*
  // concatinate all js into one file
  uasort($js, 'drupal_sort_css_js');
  $i = 0;
  foreach ($js as $name => $script) {
    $js[$name]['weight'] = $i++;
    $js[$name]['group'] = JS_DEFAULT;
    $js[$name]['every_page'] = FALSE;
  }
*/

}
