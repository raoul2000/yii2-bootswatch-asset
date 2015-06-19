yii2-bootswatch-asset
==========================
Asset bunlde around the Bootswatch theme suite. Visit [Bootswatch](http://bootswatch.com/) for more.

[![Latest Stable Version](https://poser.pugx.org/raoul2000/yii2-bootswatch-asset/v/stable.svg)](https://packagist.org/packages/raoul2000/yii2-bootswatch-asset) [![Total Downloads](https://poser.pugx.org/raoul2000/yii2-bootswatch-asset/downloads.svg)](https://packagist.org/packages/raoul2000/yii2-bootswatch-asset) 


Installation
------------

The preferred way to install this extension is through [composer](http://getcomposer.org/download/).

Either run

```
php composer.phar require --prefer-dist raoul2000/yii2-bootswatch-asset "*"
```

or add

```
"raoul2000/yii2-bootswatch-asset": "*"
```

to the require section of your `composer.json` file.


Usage
-----
To use a bootswatch theme in your Yii2 application add the BootswatchAsset bundle to your main AppAsset bundle:

```php

// ./assets/AppAsset.php

class AppAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'css/site.css',
    ];
    public $js = [
    ];
    public $depends = [
        'yii\web\YiiAsset',
    	'raoul2000\bootswatch\BootswatchAsset',
    ];
}
?>
```

Then at some point you must select the theme name you want to use. In the example below, the theme 'cosmo' is set in the main layout.

```php

// ./views/layouts/main.php

raoul2000\bootswatch\BootswatchAsset::$theme = 'cosmo';
AppAsset::register($this);

```


License
-------

**yii2-bootswatch-asset** is released under the BSD 3-Clause License. See the bundled `LICENSE.md` for details.
