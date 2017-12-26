# Themes

> 主题管理，读取指定目录下的主题目录，并通过简单的方式获取对应主题的资源文件。

[![Build Status](https://travis-ci.org/trendsoft/themes.svg?branch=master)](https://travis-ci.org/trendsoft/themes)
[![StyleCI](https://styleci.io/repos/115180981/shield?branch=master)](https://styleci.io/repos/115180981)

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
