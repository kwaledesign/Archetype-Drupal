<?php

/*
template_preprocess_views_view
options to remove css classes from the view
*/
function occam_preprocess_views_view(&$vars){
// kpr($vars['classes_array']);

  // remove .view class
  $vars['classes_array'] = array_values(array_diff($vars['classes_array'],array('view')));
  
  // remove .view-name class
  // $vars['classes_array'] = array_values(array_diff($vars['classes_array'],array('view-'.$vars['name'])));
  
  // remove .view-id-viewname and .view-display-id-viewname 
  // CAUTION: this will break ajax pagination!
  // $vars['classes_array'] = array_values(array_diff($vars['classes_array'],array('view-id-'.$vars['name'])));
  // $vars['classes_array'] = array_values(array_diff($vars['classes_array'],array('view-display-id-'.$vars['display_id'])));
}

/**
 * View List
 *
 * removes the classes from the list
 */
function occam_preprocess_views_view_list(&$vars){
  // we need to go down to the unformatted preprocess to rip out the individual classes
  occam_preprocess_views_view_unformatted($vars);
}

/**
 * views list css classes
 * options for renaming classes & removing em
*/
function occam_preprocess_views_view_unformatted(&$vars) {
  // renaming classes
  $row_first = "first";
  $row_last  = "last";
  $row_count = "count-";

  $view = $vars['view'];
  $rows = $vars['rows'];

  $vars['classes_array'] = array();
  $vars['classes'] = array();
  // Set up striping values.
  $count = 0;
  $max = count($rows);
  foreach ($rows as $id => $row) {
    $count++;

    // remove .view-row class
    $vars['classes'][$id][] = 'views-row';

    if (!theme_get_setting('occam_classes_view_row_count')) {
      $vars['classes'][$id][] = $row_count . $count;
      if(theme_get_setting('occam_classes_view_row_rename')){
        $vars['classes'][$id][] =  '' . ($count % 2 ? 'odd' : 'even');
      }else{
        $vars['classes'][$id][] = $row_count . ($count % 2 ? 'odd' : 'even');
      }
    }
    if (!theme_get_setting('occam_classes_view_row_first_last')) {
      if ($count == 1) {
        $vars['classes'][$id][] = $row_first;
      }
      if ($count == $max) {
        $vars['classes'][$id][] = $row_last;
      }
    }


    if ($row_class = $view->style_plugin->get_row_class($id)) {
      $vars['classes'][$id][] = $row_class;
    }

   // $vars['classes'][$id][] = '';
    if ( $vars['classes']  && $vars['classes'][$id] ){
      $vars['classes_array'][$id] = implode(' ', $vars['classes'][$id]);
    } else {
      $vars['classes_array'][$id] = '';
    }

    // Flatten the classes to a string for each row for the template file.
   // $vars['classes_array'][$id] = implode(' ', $vars['classes'][$id]);

  }

}

/*
function occam_preprocess_views_view_field(&$vars) {
 // kpr($vars);
 $vars['output'] = $vars['field']->advanced_render($vars['row']);
}
*/

