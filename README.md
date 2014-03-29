pinyinslug
==========
Tags: Chinese, Pinyin, tag, slug, URL, rewrite, Bing, permalink, SEO, 标签, 别名, PHP, Laravel

Generate URL-friendly slug, post title. Chinese to Pinyin. Tested on Laravel. 

Due to 'PinyinBundle' in Packagist doesn't work on Laravel, I tried to porting it with Laravel. 

## Installation

The Pinyinslug service provider can be installed via [composer](http://getcomposer.org) by requiring the `jeepmac/pinyinslug` package in your project's `composer.json`.

```json
{
    "require": {
        "jeepmac/pinyinslug": "dev-master"
    }
}
```

Next, add the service provider to `app/config/app.php`.

```php
'providers' => [
    //..
    'Jeepmac\Pinyinslug\PinyinslugServiceProvider',
]
```

That's it! You're good to go.

Here is a little example:
```php
$str = Pinyinslug::ats_pinyin('生活 in Shanghai');
```
$str will turn to be 'sheng-huo--in-shanghai'.

Then I added Bing Translation function. You need to apply client id from Microsoft if you want to 'English' instead of 'pinyin'. 
