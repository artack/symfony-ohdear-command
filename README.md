artack/symfony-ohdear-command
============

> Oh Dear Symfony Abscract Command


[![Latest Release](https://img.shields.io/packagist/v/artack/symfony-ohdear-command.svg)](https://packagist.org/packages/artack/symfony-ohdear-command)
[![MIT License](https://img.shields.io/packagist/l/artack/symfony-ohdear-command.svg)](http://opensource.org/licenses/MIT)
[![Total Downloads](https://img.shields.io/packagist/dt/artack/symfony-ohdear-command.svg)](https://packagist.org/packages/artack/symfony-ohdear-command)

Developed by [artack](https://www.artack.ch) in Zurich, Switzerland.


Features
--------

- Provides out of the box functinoality for Scheduled tasks


Installation
------------

You can install this color library through [Composer](https://getcomposer.org):

```shell
$ composer require artack/symfony-ohdear-command
```

Usage
-----
Creating a Symfony Command extending the abstract `OhDearCommand` class:
```php
class YourNewSymfonyCommand extends OhDearCommand
```

If you configure your Command with the `` method make sure you run the parent method as well.
```php
protected function configure(): void
{
    parent::configure();

    # following your own configurations
}
```

Instead of the `execute` method you need to use `doExecute` for the actual implementation of your command. The rest of the signature of that method is identical to the `execute` method.
```php
protected function doExecute(InputInterface $input, OutputInterface $output): int {...}
```
