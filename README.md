Yii2-gii-plus
========================
It add theming generator and new template for crud.It based on [yiisoft/yii2-gii](https://github.com/yiisoft/yii2-gii)

Installation
------------

The preferred way to install this extension is through [composer](http://getcomposer.org/download/).

Either run

```
php composer.phar require-dev myzero1/yii2-gii-plus：1.*
```

or add

```
"myzero1/yii2-gii-plus": "~2.0.0"
```

to the require-dev section of your `composer.json` file.


Setting
-----

Once the extension is installed, simply modify your application configuration as follows:

```php
return [
    'bootstrap' => ['yii2giiplus'],
    'modules' => [
        'yii2giiplus' => [
            'class' => 'myzero1\yii2giiplus\Module',
            'allowedIPs' => ['*']
        ],
        // ...
    ],
    // ...
];
```


Usage
-----

You can then access Gii through the following URL:

```
http://localhost/path/to/index.php?r=yii2giiplus
```

or if you have enabled pretty URLs, you may use the following URL:

```
http://localhost/path/to/index.php/yii2giiplus
```
