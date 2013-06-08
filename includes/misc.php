<?php
//alternatvie to field when we need some goddamn clean content
//use it in a tpl file like
//$content['field_NAME']['#theme'] = "nomarkup";
function theme_nomarkup($variables) {
  $output = '';
  // Render the items.
  foreach ($variables['items'] as $delta => $item) {
    $output .=  drupal_render($item);
  }

  return $output;
}

