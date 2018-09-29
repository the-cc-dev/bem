# BEM

![bem](https://user-images.githubusercontent.com/499192/46089793-918a5600-c1af-11e8-9728-cdcf15991b48.png)

> A [BEM](https://csswizardry.com/2013/01/mindbemding-getting-your-head-round-bem-syntax/) (Block Element Modifier) plugin for [WordPlate](https://wordplate.github.io/).

This plugin will clean up the HTML attributes from WordPress's `wp_list_pages` and `wp_nav_menu` functions. It will convert WordPress element classes with BEM flavoured ones.

**Before:**

```html
<div class="menu-navigation-container">
    <ul id="menu-navigation" class="menu">
        <li id="menu-item-93" class="menu-item menu-item-type-post_type menu-item-object-page current-menu-ancestor current-menu-parent current_page_parent current_page_ancestor menu-item-has-children menu-item-93">
            <a href="https://wordplate.com/sample-page/">Acme</a>
            <ul class="sub-menu">
                <li id="menu-item-88" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-88">
                    <a href="https://wordplate.com/sample-page/">About</a>
                </li>
                <li id="menu-item-87" class="menu-item menu-item-type-custom menu-item-object-custom current-menu-item current_page_item menu-item-home menu-item-87">
                    <a href="https://wordplate.com/">Pricing</a>
                </li>
            </ul>
        </li>
    </ul>
</div>
```

**After:**

```html
<ul class="navigation__list">
    <li class="navigation__item navigation__item--parent navigation__item--top-level">
        <a href="https://wordplate.com/sample-page/" class="navigation__link navigation__link--ancestor navigation__link--top-level">Acme</a>
        <ul class="navigation__children">
            <li class="navigation__item">
                <a href="https://wordplate.com/sample-page/" class="navigation__link">About</a>
            </li>
            <li class="navigation__item">
                <a href="https://wordplate.com/" class="navigation__link navigation__link--active">Pricing</a>
            </li>
        </ul>
    </li>
</ul>
```

[![Total Downloads](https://badgen.net/packagist/dt/wordplate/bem)](https://packagist.org/packages/wordplate/bem)
[![Latest Version](https://badgen.net/github/release/wordplate/bem)](https://github.com/wordplate/bem/releases)
[![License](https://badgen.net/packagist/license/wordplate/bem)](https://packagist.org/packages/wordplate/bem)

## Installation

Require the [BEM package](https://github.com/wordplate/bem#readme), with [Composer](https://getcomposer.org), in the root directory of your project.

```sh
$ composer require wordplate/bem
```

Then login to the WordPress administrator dashboard and active the BEM plugin.

## Usage

### `wp_nav_menu`

To print a navigation menu you may use the built-in WordPress [`wp_nav_menu`](https://developer.wordpress.org/reference/functions/wp_nav_menu/) function:

```php
<nav class="navigation">
    <?php wp_nav_menu([
        'container' => false,
        'items_wrap' => '<ul class="navigation__list">%3$s</ul>',
        'menu_class' => 'navigation',
        'theme_location' => 'primary-menu',
    ]); ?>
</nav>
```

### `wp_list_pages`

To print a pages menu you may use the built-in WordPress [`wp_list_pages`](https://developer.wordpress.org/reference/functions/wp_list_pages/) function:

```php
<ul class="sidebar__list">
  <?php wp_list_pages([
      'title_li' => '',
      'menu_class' => 'sidebar',
  ]); ?>
</ul>
```

## License

[MIT](LICENSE) © [Vincent Klaiber](https://vinkla.com)
