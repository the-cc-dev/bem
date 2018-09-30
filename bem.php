<?php

/*
 * This file is part of WordPlate.
 *
 * (c) Vincent Klaiber <hello@vinkla.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

/*
 * Plugin Name: BEM
 * Description: A BEM (Block Element Modifier) plugin for WordPlate.
 * Author: WordPlate
 * Author URI: https://wordplate.github.io
 * Version: 0.1.0
 * Plugin URI: https://github.com/wordplate/bem#readme
 */

 declare(strict_types=1);

 // Filter navigation elements class attribute.
 add_filter('nav_menu_css_class', function ($classes, $item, $args, $depth) {
     $items = [
         $args->menu_class.'__item',
     ];

     if (in_array('menu-item-has-children', $classes, true)) {
         $items[] = $args->menu_class.'__item--parent';
     }

     if ($depth === 0) {
         $items[] = $args->menu_class.'__item--top-level';
     }

     return $items;
 }, 10, 4);

 // Filter navigation submenu class attribute.
 add_filter('nav_menu_submenu_css_class', function ($classes, $args, $depth) {
     return [
         $args->menu_class.'__children',
     ];
 }, 10, 3);

 // Filters navigation menu link class attribute.
 add_filter('nav_menu_link_attributes', function ($atts, $item, $args, $depth) {
     $atts['class'] = $args->menu_class.'__link';

     if (
         in_array('current-page-ancestor', $item->classes, true) ||
         in_array('current-menu-ancestor', $item->classes, true)
     ) {
         $atts['class'] .= ' '.$args->menu_class.'__link--ancestor';
     }

     if (in_array('current-menu-item', $item->classes, true)) {
         $atts['class'] .= ' '.$args->menu_class.'__link--active';
     }

     if ($depth === 0) {
         $atts['class'] .= ' '.$args->menu_class.'__link--top-level';
     }

     return $atts;
 }, 10, 4);

 // Remove id attribute from navigation links.
 add_filter('nav_menu_item_id', '__return_false', 10, 3);

 // Filter wp_list_pages list items class attribute.
 add_filter('page_css_class', function ($classes, $page, $depth, $args, $current_page) {
     $menuClass = $args['menu_class'] ?? 'menu';

     $items = [$menuClass.'__item'];

     if (in_array('page_item_has_children', $classes, true)) {
         $items[] = $menuClass.'__item--parent';
     }

     if (in_array('current_page_ancestor', $classes, true)) {
         $items[] = $menuClass.'__item--ancestor';
     }

     if ($depth === 0) {
         $items[] = $menuClass.'__item--top-level';
     }

     return $items;
 }, 10, 5);

 // Filter wp_list_pages anchors class attribute.
 add_filter('page_menu_link_attributes', function ($atts, $page, $depth, $args, $currentPage) {
     $menuClass = $args['menu_class'] ?? 'menu';

     $atts['class'] = $menuClass.'__link';

     if ($currentPage === $page->ID) {
         $atts['class'] .= ' '.$menuClass.'__link--active';
     }

     if ($args['has_children']) {
         $atts['class'] .= ' '.$menuClass.'__link--parent';
     }

     if ($depth === 0) {
         $atts['class'] .= ' '.$menuClass.'__link--top-level';
     }

     return $atts;
 }, 10, 5);
