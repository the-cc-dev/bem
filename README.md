# BEM

![mail](https://user-images.githubusercontent.com/499192/37464248-1282c40a-2858-11e8-801c-571c1dedf310.png)

> A [BEM](https://csswizardry.com/2013/01/mindbemding-getting-your-head-round-bem-syntax/) (Block Element Modifier) plugin for [WordPlate](https://wordplate.github.io/).

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

To print a menu you may use the built-in WordPress [`wp_nav_menu`](https://developer.wordpress.org/reference/functions/wp_nav_menu/) function:

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

## License

[MIT](LICENSE) © [Vincent Klaiber](https://vinkla.com)
