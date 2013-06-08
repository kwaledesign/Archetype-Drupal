<?php

/**
 * Override or insert variables into the maintenance page template.
 *
 * @param $variables
 *   An array of variables to pass to the theme template.
 * @param $hook
 *   The name of the template being rendered ("maintenance_page" in this case.)
 */
/* -- Delete this line if you want to use this function
function THEME_preprocess_maintenance_page(&$variables, $hook) {
  // When a variable is manipulated or added in preprocess_html or
  // preprocess_page, that same work is probably needed for the maintenance page
  // as well, so we can just re-use those functions to do that work here.
  THEME_preprocess_html($variables, $hook);
  THEME_preprocess_page($variables, $hook);
}
// */

/**
 * Override or insert variables into the html templates.
 *
 * @param $variables
 *   An array of variables to pass to the theme template.
 * @param $hook
 *   The name of the template being rendered ("html" in this case.)
 */
/* -- Delete this line if you want to use this function
function THEME_preprocess_html(&$variables, $hook) {
  $variables['sample_variable'] = t('Lorem ipsum.');

  // The body tag's classes are controlled by the $classes_array variable. To
  // remove a class from $classes_array, use array_diff().
  //$variables['classes_array'] = array_diff($variables['classes_array'], array('class-to-remove'));

  // mothership additions start 
  // ---------------------------------------------
  
  // add modernizr.js CDN - (be sure to change to custom build before production)
  drupal_add_js('http://cdnjs.cloudflare.com/ajax/libs/modernizr/2.0.6/modernizr.min.js', 'external');
  
  // nuke's everything by default, comment out anything you want to keep

  // remove .html class from body
  $variables['classes_array'] = array_values(array_diff($variables['classes_array'],array('html')));
  // remove .logged-in and .not-logged-in classes 
  $variables['classes_array'] = array_values(array_diff($variables['classes_array'],array('logged-in')));
  $variables['classes_array'] = array_values(array_diff($variables['classes_array'],array('not-logged-in')));
  // remove .front and .not-front classes 
  $variables['classes_array'] = array_values(array_diff($variables['classes_array'],array('not-front')));
  $variables['classes_array'] = array_values(array_diff($variables['classes_array'],array('front')));
  // remove layout classes
  $variables['classes_array'] = array_values(array_diff($variables['classes_array'],array('two-sidebars')));
  $variables['classes_array'] = array_values(array_diff($variables['classes_array'],array('one-sidebar sidebar-first')));
  $variables['classes_array'] = array_values(array_diff($variables['classes_array'],array('one-sidebar sidebar-second')));
  $variables['classes_array'] = array_values(array_diff($variables['classes_array'],array('no-sidebars')));
  // remove .page-node class
  $variables['classes_array'] = preg_grep('/^page-node/', $variables['classes_array'], PREG_GREP_INVERT);
  // remove .node-type class
  $variables['classes_array'] = preg_grep('/^node-type/', $variables['classes_array'], PREG_GREP_INVERT);
  // remove .toolbar and .toolbar-drawer classes
  $variables['classes_array'] = array_values(array_diff($variables['classes_array'],array('toolbar')));
  $variables['classes_array'] = array_values(array_diff($variables['classes_array'],array('toolbar-drawer')));

  // add url path alias as .path-$alias class to body
  // $path_all = drupal_get_path_alias($_GET['q']);
  // $variables['classes_array'][] = drupal_html_class('path-' . $path_all);
  
  // add only the first path of the url alias as .pathone-$alias (ex: for sitename.com/foo/bar  $alias=foo, class="pathone-foo")
  // $path = explode('/', $_SERVER['REQUEST_URI']);
  //  if($path['1']){
  //    $variables['classes_array'][] = drupal_html_class('pathone-' . $path['1']);
  //  }

  // add a class to the body
  // $variables['classes_array'][] = "class-to-add";
  // ---------------------------------------------
  // mothership additions end
}
// */

/**
 * Override or insert variables into the page templates.
 *
 * @param $variables
 *   An array of variables to pass to the theme template.
 * @param $hook
 *   The name of the template being rendered ("page" in this case.)
 */
/* -- Delete this line if you want to use this function
function THEME_preprocess_page(&$variables, $hook) {
  $variables['sample_variable'] = t('Lorem ipsum.');

  // mothership additions start 
  // ---------------------------------------------


  // ---------------------------------------------
  // mothership additions end
}
// */

/**
 * Override or insert variables into the node templates.
 *
 * @param $variables
 *   An array of variables to pass to the theme template.
 * @param $hook
 *   The name of the template being rendered ("node" in this case.)
 */
function THEME_preprocess_node(&$variables, $hook) {
  //$variables['sample_variable'] = t('Lorem ipsum.');

  // remove .node class
  $variables['classes_array'] = array_values(array_diff($variables['classes_array'],array('node')));
  
  // remove .node- prefix from promoted/sticky/unpublished classes
  $vars['classes_array'] = array_values(array_diff($vars['classes_array'],array('node-sticky','node-unpublished', 'node-promoted')));
    if($vars['promoted']){
      $vars['classes_array'][] = 'is-promoted';
    }
    if($vars['sticky']){
      $vars['classes_array'][] = 'is-sticky';
    }
    if($vars['status'] =="0"){
      $vars['classes_array'][] = 'is-unpublished';
    }
 
  // remove .inline class from links
  if isset($vars['content']['links']['#attributes']['class'])) {
      $vars['content']['links']['#attributes']['class'] = array_values(array_diff($vars['content']['links']['#attributes']['class'],array('inline')));
    }
    
  // remove .links class from links
  if (isset($vars['content']['links']['#attributes']['class']))) {
    $vars['content']['links']['#attributes']['class'] = array_values(array_diff($vars['content']['links']['#attributes']['class'],array('links')));
    }

  //  remove the class attribute if its empty
  if(isset($vars['content']['links']['#attributes']['class'])){
    if(isset($vars['content']['links']['#attributes']['class']) && !$vars['content']['links']['#attributes']['class']){
      unset($vars['content']['links']['#attributes']['class']);
    }
  }


  // Optionally, run node-type-specific preprocess functions, like
  // THEME_preprocess_node_page() or THEME_preprocess_node_story().
  $function = __FUNCTION__ . '_' . $variables['node']->type;
  if (function_exists($function)) {
    $function($variables, $hook);
  }
}
// */

/**
 * Override or insert variables into the comment templates.
 *
 * @param $variables
 *   An array of variables to pass to the theme template.
 * @param $hook
 *   The name of the template being rendered ("comment" in this case.)
 */
/* -- Delete this line if you want to use this function
function THEME_preprocess_comment(&$variables, $hook) {
  $variables['sample_variable'] = t('Lorem ipsum.');
}
// */

/**
 * Override or insert variables into the region templates.
 *
 * @param $variables
 *   An array of variables to pass to the theme template.
 * @param $hook
 *   The name of the template being rendered ("region" in this case.)
 */
/* -- Delete this line if you want to use this function
function THEME_preprocess_region(&$variables, $hook) {
  // Don't use Zen's region--sidebar.tpl.php template for sidebars.
  //if (strpos($variables['region'], 'sidebar_') === 0) {
  //  $variables['theme_hook_suggestions'] = array_diff($variables['theme_hook_suggestions'], array('region__sidebar'));
  //}

  // remove the .region-[name] class from the region wrapper 
  $variables['classes_array'] = array_values(array_diff($variables['classes_array'],array('region')));
}
// */

/**
 * Override or insert variables into the block templates.
 *
 * @param $variables
 *   An array of variables to pass to the theme template.
 * @param $hook
 *   The name of the template being rendered ("block" in this case.)
 */
/* -- Delete this line if you want to use this function
function THEME_preprocess_block(&$variables, $hook) {
  // Add a count to all the blocks in the region.
  // $variables['classes_array'][] = 'count-' . $variables['block_id'];

  // By default, Zen will use the block--no-wrapper.tpl.php for the main
  // content. This optional bit of code undoes that:
  //if ($variables['block_html_id'] == 'block-system-main') {
  //  $variables['theme_hook_suggestions'] = array_diff($variables['theme_hook_suggestions'], array('block__no_wrapper'));
  //}

    }

  // remove .block class from wrapper (if using wrapper...see above)
  $variables['classes_array'] = array_values(array_diff($variables['classes_array'],array('block')));
  // remove #block-id from wrapper
  $variables['id_block'] = ' id="' . $variables['block_html_id'] . '"';
  // add .block-id as class to wrapper
  $variables['classes_array'][] = $variables['block_html_id'];
  
  // add title class to the block
  $variables['title_attributes_array']['class'][] = 'title';
  $variables['content_attributes_array']['class'][] = 'block-content';
  // add a theme suggestion to block--menu.tpl so we dont have create a ton of blocks with <nav>
  if(
    ($variables['elements']['#block']->module == "system" AND $variables['elements']['#block']->delta == "navigation") OR
    ($variables['elements']['#block']->module == "system" AND $variables['elements']['#block']->delta == "main-menu") OR
    ($variables['elements']['#block']->module == "system" AND $variables['elements']['#block']->delta == "user-menu") OR
    ($variables['elements']['#block']->module == "admin" AND $variables['elements']['#block']->delta == "menu") OR
     $variables['elements']['#block']->module == "menu_block"
  ){
    $variables['theme_hook_suggestions'][] = 'block__menu';
  }
}// */
