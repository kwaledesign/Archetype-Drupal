<?php	
/**
 * @file 
 * remove <span> wrapper from date and timezone variables, use <time> instead.
 */
function occam_date_display_single($vars) {
  $date = $vars['date'];
  $timezone = $vars['timezone'];

  $vars['attributes']['datetime'] = $vars['dates']['value']['formatted_iso']; 
  $attributes = $vars['attributes'];
 
  return '<time ' . drupal_attributes($attributes) . '>' . $date . $timezone . '</time>';

}
