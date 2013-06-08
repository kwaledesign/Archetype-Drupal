<?php

function occam_css_alter(&$css) {
  // set a variable to tell Drupal the path to our core and contrib css overrides
  $occam_csscore_path = drupal_get_path('theme', 'occam') . '/drupal-core-css/';
  $occam_cssmodules_path = drupal_get_path('theme', 'occam') . '/drupal-contrib-css/';


  // Nuke CSS from Drupal Core Modules so we can override in theme layer
  foreach ($css as $file => $value) {
    unset($css[$file]);
  }

  // add core module css from theme layer

  // openid
  if(module_exists('openid')){
    $css = drupal_add_css($occam_csscore_path . 'openid.css', array('group' => CSS_SYSTEM));
  }

  // overlay
  if(module_exists('overlay')){
    $css = drupal_add_css($occam_csscore_path . 'overlay-parent.css', array('group' => CSS_SYSTEM));
    $css = drupal_add_css($occam_csscore_path . 'overlay-child.css', array('group' => CSS_SYSTEM));
  }

  // poll
  if(module_exists('poll')){
    $css = drupal_add_css($occam_csscore_path . 'poll.css', array('group' => CSS_SYSTEM));
  }

  // profile
  if(module_exists('profile')){
    $css = drupal_add_css($occam_csscore_path . 'profile.css', array('group' => CSS_SYSTEM));
  }

  // search
  if(module_exists('search')){
    $css = drupal_add_css($occam_csscore_path . 'search.css', array('group' => CSS_SYSTEM));
  }

  // shortcut
  if(module_exists('shortcut')){
    $css = drupal_add_css($occam_csscore_path . 'shortcut.admin.css', array('group' => CSS_SYSTEM));
    $css = drupal_add_css($occam_csscore_path . 'shortcut.css', array('group' => CSS_SYSTEM));
  }

  // simpletest
  if(module_exists('simpletest')){
    $css = drupal_add_css($occam_csscore_path . 'simpletest.css', array('group' => CSS_SYSTEM));
  }

  // system
  if(module_exists('system')){
    $css = drupal_add_css($occam_csscore_path . 'system.base.css', array('group' => CSS_SYSTEM));
    $css = drupal_add_css($occam_csscore_path . 'system.admin.css', array('group' => CSS_SYSTEM));
    $css = drupal_add_css($occam_csscore_path . 'system.theme.css', array('group' => CSS_SYSTEM));
    $css = drupal_add_css($occam_csscore_path . 'system.menus.css', array('group' => CSS_SYSTEM));
    $css = drupal_add_css($occam_csscore_path . 'system.messages.css', array('group' => CSS_SYSTEM));
    $css = drupal_add_css($occam_csscore_path . 'system.maintenance.css', array('group' => CSS_SYSTEM));
  }

  // taxonomy
  if(module_exists('taxonomy')){
    $css = drupal_add_css($occam_csscore_path . 'taxonomy.css', array('group' => CSS_SYSTEM));
  }

  // toolbar
  if(module_exists('toolbar')){
    $css = drupal_add_css($occam_csscore_path . 'toolbar.css', array('group' => CSS_SYSTEM));
  }

  // traker
  if(module_exists('tracker')){
    $css = drupal_add_css($occam_csscore_path . 'tracker.css', array('group' => CSS_SYSTEM));
  }

  // update
  if(module_exists('update')){
    $css = drupal_add_css($occam_csscore_path . 'update.css', array('group' => CSS_SYSTEM));
  }

  // user
  if(module_exists('user')){
    $css = drupal_add_css($occam_csscore_path . 'user.css', array('group' => CSS_SYSTEM));
  }

  // aggregator 
  if(module_exists('aggregator')){
    $css = drupal_add_css($occam_csscore_path . 'aggregator.css', array('group' => CSS_SYSTEM));
  }

  // block
  if(module_exists('block')){
    $css = drupal_add_css($occam_csscore_path . 'block.css', array('group' => CSS_SYSTEM));
  }

  // book
  if(module_exists('book')){
    $css = drupal_add_css($occam_csscore_path . 'book.css', array('group' => CSS_SYSTEM));
  }

  // color
  if(module_exists('color')){
    $css = drupal_add_css($occam_csscore_path . 'color.css', array('group' => CSS_SYSTEM));
  }

  // comment
  if(module_exists('comment')){
    $css = drupal_add_css($occam_csscore_path . 'comment.css', array('group' => CSS_SYSTEM));
  }

  // contextual
  if(module_exists('contextual')){
    $css = drupal_add_css($occam_csscore_path . 'contextual.css', array('group' => CSS_SYSTEM));
  }

  // dashboard
  if(module_exists('dashboard')){
    $css = drupal_add_css($occam_csscore_path . 'dashboard.css', array('group' => CSS_SYSTEM));
  }

  // dblog
  if(module_exists('dblog')){
    $css = drupal_add_css($occam_csscore_path . 'dblog.css', array('group' => CSS_SYSTEM));
  }

  // field
  if(module_exists('field')){
    $css = drupal_add_css($occam_csscore_path . 'field.css', array('group' => CSS_SYSTEM));
  }

  // field ui
  if(module_exists('field_ui')){
    $css = drupal_add_css($occam_csscore_path . 'field_ui.css', array('group' => CSS_SYSTEM));
  }

  // file
  if(module_exists('file')){
    $css = drupal_add_css($occam_csscore_path . 'file.css', array('group' => CSS_SYSTEM));
  }

  // filter
  if(module_exists('filter')){
    $css = drupal_add_css($occam_csscore_path . 'filter.css', array('group' => CSS_SYSTEM));
  }

  // forum
  if(module_exists('forum')){
    $css = drupal_add_css($occam_csscore_path . 'forum.css', array('group' => CSS_SYSTEM));
  }

  // help
  if(module_exists('help')){
    $css = drupal_add_css($occam_csscore_path . 'help.css', array('group' => CSS_SYSTEM));
  }

  // image
  if(module_exists('image')){
    $css = drupal_add_css($occam_csscore_path . 'image.admin.css', array('group' => CSS_SYSTEM));
    $css = drupal_add_css($occam_csscore_path . 'image.css', array('group' => CSS_SYSTEM));
  }

  // locale
  if(module_exists('locale')){
    $css = drupal_add_css($occam_csscore_path . 'locale.css', array('group' => CSS_SYSTEM));
  }

  // menu
  if(module_exists('menu')){
    $css = drupal_add_css($occam_csscore_path . 'menu.css', array('group' => CSS_SYSTEM));
  }

  // node
  if(module_exists('node')){
    $css = drupal_add_css($occam_csscore_path . 'node.css', array('group' => CSS_SYSTEM));
  }



  // Nuke CSS from Contrib Modules so we can override in theme layer
  foreach ($css as $file => $value) {
    // only remove those files we excplicitly target
    if (
      //strpos($file, 'file-name1.css') == TRUE AND
      //strpos($file, 'file-name2.css') == TRUE
    ) {
      if (strpos($file, 'modules/') == TRUE) {
        unset($css[$file]);
      }
    }
  }


/*
function yourthemename_preprocess(&$vars) {
  // Remove unnecessary CSS
  $css = $vars['css'];
  // unset($css['all']['module']); // Unset all module css
  unset($css['all']['module']['path to module css'); // Unset specific module css
  $vars['styles'] = drupal_get_css($css);
}
*/


  // concatinate all css into one file 
  if(theme_get_setting('occam_css_onefile')){
    $theme = drupal_get_path('theme', 'occam');
    //its all screen honey all screen
    foreach ($css as $path => $value) {
      if ($css[$path]['media'] == 'all') {
        $css[$path]['media'] = 'screen';
      }
    }

    //credits to metaltoad http://www.metaltoad.com/blog/drupal-7-taking-control-css-and-js-aggregation
    uasort($css, 'drupal_sort_css_js');
    $i = 0;
    foreach ($css as $name => $style) {
      $css[$name]['weight'] = $i++;
      $css[$name]['group'] = CSS_DEFAULT;
      $css[$name]['every_page'] = FALSE;
    }
  }

}

