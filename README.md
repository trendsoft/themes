# Themes

> 主题管理,读取指定目录下的主题目录,并通过简单的方式获取对应主题的资源文件.

[![Build Status](https://travis-ci.org/trendsoft/themes.svg?branch=master)](https://travis-ci.org/trendsoft/themes)
[![Latest Stable Version](https://poser.pugx.org/trendsoft/themes/v/stable)](https://packagist.org/packages/trendsoft/themes)
[![Latest Unstable Version](https://poser.pugx.org/trendsoft/themes/v/unstable)](https://packagist.org/packages/trendsoft/themes)
[![StyleCI](https://styleci.io/repos/115180981/shield?branch=master)](https://styleci.io/repos/115180981)
[![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/trendsoft/themes/badges/quality-score.png?b=master)](https://scrutinizer-ci.com/g/trendsoft/themes/?branch=master)
[![Code Coverage](https://scrutinizer-ci.com/g/trendsoft/themes/badges/coverage.png?b=master)](https://scrutinizer-ci.com/g/trendsoft/themes/?branch=master)
[![Build Status](https://scrutinizer-ci.com/g/trendsoft/themes/badges/build.png?b=master)](https://scrutinizer-ci.com/g/trendsoft/themes/build-status/master)
[![License](https://poser.pugx.org/trendsoft/themes/license)](https://packagist.org/packages/trendsoft/themes)
[![Total Downloads](https://poser.pugx.org/trendsoft/themes/downloads)](https://packagist.org/packages/trendsoft/themes)
[![Monthly Downloads](https://poser.pugx.org/trendsoft/themes/d/monthly)](https://packagist.org/packages/trendsoft/themes)
[![Daily Downloads](https://poser.pugx.org/trendsoft/themes/d/daily)](https://packagist.org/packages/trendsoft/themes)

# 要求

- PHP >= 7.0
- Composer

# 安装
```
$ composer require "trendsoft/themes" -vvv
```

# 使用示例
```php
$theme = new Theme($config);
$theme->asset('app.js'); //获取资源
$theme->all(); //获取所有主题列表
$theme->path('assets/app.css'); //获取主题目录assets目录下的app.css文件
```
## 配置文件
```php
return array('active' => 'default', 'paths'  => [ 'absolute' => $this->getAbsolute(), 'base' => 'themes', 'assets' => 'assets' ]);
```

- active:默认使用的主题slug
- paths:
  - absolute:绝对路径
  - base:主题目录uri相对路径
  - assets:资源目录
  
## 创建主题

在absolute对应的目录中创建一个以主题slug命名的目录，并在此目录中创建theme.json文件，theme.json文件格式如下：

```json
{
  "slug": "bootstrap",
  "name": "Bootstrap",
  "author": "Jabber",
  "description": "is a bootstrap theme",
  "version": "0.1.0"
}
```

## 主题列表

```php
$theme->all();
```
## 应用主题

```php
$theme->active('vue'); //or $theme->setCurrent('vue');
```

# Contribution
[Contribution Guide](.github/CONTRIBUTING.md)

# License
MIT
