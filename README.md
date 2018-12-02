# ACF Random Value Field

Display a hidden field with a random generated value. 
It's useful if you use Flexible ACF Field and need unique generated ID's for dynamic flexible rows


### Installation

####Composer

Recommend method/s;

[Symbiotic Theme](https://github.com/symbioticwp) or any other theme with uses Composer packages
```shell
$ composer require soberwp/acf-field-hidden-randomvalue:1.0.0-p
```

[Roots Bedrock](https://roots.io/bedrock/) and [WP-CLI](http://wp-cli.org/) (as plugin)
```shell
$ composer require symbioticwp/acf-field-hidden-randomvalue
$ wp plugin activate acf-field-hidden-randomvalue
```

####Manual

1. Download. Unzip. Copy the `acf-field-hidden-randomvalue` folder into your `wp-content/plugins` or if you use
bedrock copy the plugin into `app/plugins`.
2. Activate via Wordpress

#### Requirements

* ACF 5
* [PHP](http://php.net/manual/en/install.php) >= 5.6

#### Compatibility

* Compatible with [Wordplate ACF](https://github.com/wordplate/acf)


### Changelog

1.0.0 Initial
