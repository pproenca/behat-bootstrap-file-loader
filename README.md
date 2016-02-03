1. [System Requirements](#system-requirements)
2. [Installation - Using Composer](#installation---using-composer)
3. [Configuration](#configuration)

## Introduction

[![Latest Stable Version](https://poser.pugx.org/naspers/behat-bootstrap-file-loader/v/stable)](https://packagist.org/packages/naspers/behat-bootstrap-file-loader) [![Total Downloads](https://poser.pugx.org/naspers/behat-bootstrap-file-loader/downloads)](https://packagist.org/packages/naspers/behat-bootstrap-file-loader) [![Latest Unstable Version](https://poser.pugx.org/naspers/behat-bootstrap-file-loader/v/unstable)](https://packagist.org/packages/naspers/behat-bootstrap-file-loader) [![License](https://poser.pugx.org/naspers/behat-bootstrap-file-loader/license)](https://packagist.org/packages/naspers/behat-bootstrap-file-loader)

Introduces a new configuration option, in Behat, to include a custom bootstrap file.

Inspired by bootstrap configuration in phpunit.xml

_This option is commonly used to include `vendor/autoloader.php`_

## System Requirements

This extension requires Behat 3.0. Later versions are not supported.

## Installation - Using Composer

Add our project as a dependency in your `composer.json`.

```json
{
    "require": {
        "pproenca/behat-bootstrap-file-loader": "~1.0"
    }
}
```

Update your dependencies by running `composer update`, inside the project directory.

## Configuration

Open your `behat.yml`, and activate our extension.

```yml
default:
  extensions:
    Pproenca\Behat\BootstrapFileLoader:
        bootstrap_path: "<path_to_my_file>/bootstrap.php"
```

The `bootstrap_path` is required, and must contain the full or relative path to your bootstrap file.
