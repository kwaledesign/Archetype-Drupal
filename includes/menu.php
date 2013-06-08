<?php

/*archetype---------------- */

// remove the .menu class from all menus..wrapper is changed to <nav> tag in menu-block-wrapper.tpl.php
function occam_menu_tree($variables) {
  /* here's where you can add class="horizontal-nav flydown-right" directly on the <ul> in menu-block-wrapper-[menu-name].tpl.php */
  return '<ul>' . $variables['tree'] . '</ul>'; 
}

// remove Drupal's menu link classes
function occam_menu_link(array $variables) {

  unset($variables['element']['#attributes']['class']);
  
  $element = $variables['element'];
  $sub_menu = '';

  if ($element['#below']) {
    $sub_menu = drupal_render($element['#below']);
  }
  // dpr($variables['element']['#attributes']);

  $output = l($element['#title'], $element['#href'], $element['#localized_options']);
  return '<li' . drupal_attributes($element['#attributes']) . '>' . $output . $sub_menu . "</li>\n";
}

/* /archetype ----------------- */


// TODO remove classes from the <a>   -->  ? theme_menu_item_link() --> not in D7?? WTF?? test this...def don't want any classes on <a> right?



/*
**** Menu_Block - uses Drupal core's menu theme functions, as well as its own theme hook suggestions (see: http://drupal.org/node/748022)
*/

/* these should be preprocess functions!!:   template_preprocess_menu_block_wrapper()  */

// override theme_menu_tree()
function occam_menu_tree__menu_block(&$variables) {
  // kpr($variables);
  
  // http://atendesigngroup.com/blog/adding-css-classes-blocks-drupal 
  // set shortcut variables
  $block_id = $vars['block']->module . '-' . $vars['block']->delta;  //how to target menu_blocks by menu-name?????
  $classes = &$vars['classes_array'];
  // optionally add global classes to all menu blocks
  // $classes = array(); /* setting $classes equal to an empty array will remove all classes  ---> this should have already been done by above! 

  // Uncomment the line below to see variables you can use to target a field 
  // print $block_id . '<br/>';
 
  // Add classes based on the block delta. 
  switch ($block_id) {
    // primary-links menu block
    case 'primary-links':
      $classes[] = 'primary-links-test-class';
      break;
    // secondary-links menu block
    case 'secondary-links':
      $classes[] = 'secondary-links-test-class';
      break;
  }
}

// override theme_menu_tree() for specific menu name 
/* -- Delete this line if you want to use this function
function occam_menu_tree__menu_block__[menu name]() {

} // */


// override theme_menu_item()
/* -- Delete this line if you want to use this function
function occam_menu_item__menu_block() {

} // */


// override theme_menu_item() for specific menu
/* -- Delete this line if you want to use this function
function occam_menu_item__menu_block__[menu name]() {

} // */


// override theme_menu_item_link()
/* -- Delete this line if you want to use this function
function occam_menu_item_link__menu_block() {

} // */


// override theme_menu_item_link() for specific menu
/* -- Delete this line if you want to use this function
function occam_menu_item_link__menu_block__[menu name]() {

} // */





/**
 * the non saying item-list class haw now added an -daddy element
 * so if the theme that calls the itemlist adds an 'daddy' => '-pager' to the theme call
 * the item list haves an idea of what it is
*/

function occam_item_list($variables) {
  $items = $variables['items'];
  $title = $variables['title'];
  $type  = $variables['type'];
  $attributes = $variables['attributes'];

  //get the daddy if its set and add it is item-list-$daddy
  if(isset($variables['daddy'])){
    $wrapperclass = "item-list-" . $variables['daddy'];
  }else{
    $wrapperclass = "item-list";
  }

  $output = '<div class="'. $wrapperclass .'">';
  if (isset($title)) {
    $output .= '<h3>' . $title . '</h3>';
  }

  if (!empty($items)) {
    $output .= "<$type" . drupal_attributes($attributes) . '>';
    $num_items = count($items);
    foreach ($items as $i => $item) {
      $attributes = array();
      $children = array();
      $data = '';
      if (is_array($item)) {
        foreach ($item as $key => $value) {
          if ($key == 'data') {
            $data = $value;
          }
          elseif ($key == 'children') {
            $children = $value;
          }
          else {
            $attributes[$key] = $value;
          }
        }
      }
      else {
        $data = $item;
      }
      if (count($children) > 0) {
        // Render nested list.
        $data .= theme_item_list(array('items' => $children, 'title' => NULL, 'type' => $type, 'attributes' => $attributes));
      }
      if ($i == 0) {
        //TODO remove first
        $attributes['class'][] = 'first';
      }
      if ($i == $num_items - 1) {
        //TODO remove last
        $attributes['class'][] = 'last';
      }
      $output .= '<li' . drupal_attributes($attributes) . '>' . $data . "</li>\n";
    }
    $output .= "</$type>";
  }
  $output .= '</div>';
  return $output;
}

