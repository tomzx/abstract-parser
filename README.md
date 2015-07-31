# Abstract parser

[![License](https://poser.pugx.org/tomzx/abstract-parser/license.svg)](https://packagist.org/packages/tomzx/abstract-parser)
[![Latest Stable Version](https://poser.pugx.org/tomzx/abstract-parser/v/stable.svg)](https://packagist.org/packages/tomzx/abstract-parser)
[![Latest Unstable Version](https://poser.pugx.org/tomzx/abstract-parser/v/unstable.svg)](https://packagist.org/packages/tomzx/abstract-parser)
[![Build Status](https://img.shields.io/travis/tomzx/abstract-parser.svg)](https://travis-ci.org/tomzx/abstract-parser)
[![Code Quality](https://img.shields.io/scrutinizer/g/tomzx/abstract-parser.svg)](https://scrutinizer-ci.com/g/tomzx/abstract-parser/code-structure)
[![Code Coverage](https://img.shields.io/scrutinizer/coverage/g/tomzx/abstract-parser.svg)](https://scrutinizer-ci.com/g/tomzx/abstract-parser)
[![Total Downloads](https://img.shields.io/packagist/dt/tomzx/abstract-parser.svg)](https://packagist.org/packages/tomzx/abstract-parser)

An abstract parser written in PHP. Based on [nikic's PHP Parser](https://github.com/nikic/PHP-Parser).

## Getting started

`Abstract parser` offers 2 interfaces which you'll want to implement:

* `NodeInterface`: A basic interface for all of the elements of your tree structured data structure.
* `NodeVisitorInterface`: Actions to execute when entering/exiting a `NodeInterface` element or at the beginning/end of a traversal.

Once you have implemented the `NodeInterface` for your data elements, you can walk through them using something like the following:

```php
<?php

$rootElement = ...; // Root element of your data structure

$traverser = new NodeTraverser();
$traverser->addVisitor(new MyVisitor());

$traverser->traverse([$rootElement]);
```

## License

The code is licensed under the [MIT license](http://choosealicense.com/licenses/mit/). See [LICENSE](LICENSE).
