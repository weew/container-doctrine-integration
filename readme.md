# Integration of doctrine repositories

[![Build Status](https://img.shields.io/travis/weew/container-doctrine-integration.svg)](https://travis-ci.org/weew/container-doctrine-integration)
[![Code Quality](https://img.shields.io/scrutinizer/g/weew/container-doctrine-integration.svg)](https://scrutinizer-ci.com/g/weew/container-doctrine-integration)
[![Test Coverage](https://img.shields.io/coveralls/weew/container-doctrine-integration.svg)](https://coveralls.io/github/weew/container-doctrine-integration)
[![Version](https://img.shields.io/packagist/v/weew/container-doctrine-integration.svg)](https://packagist.org/packages/weew/container-doctrine-integration)
[![Licence](https://img.shields.io/packagist/l/weew/container-doctrine-integration.svg)](https://packagist.org/packages/weew/container-doctrine-integration)

## Table of contents

- [Installation](#installation)
- [Introduction](#introduction)
- [Conventions](#conventions)
- [Usage](#usage)

## Installation

`composer require weew/container-doctrine-integration`

## Introduction

Doctrine repositories are not injectable on their own since they are not easily instantiable. To make it work you'll have to work with factories do some argument parsing and so on. This is exactly what this package does, it makes doctrine repositories injectable trough the [weew/container](https://github.com/weew/container) container.

## Conventions

There are certain conventions that you must follow to be able to inject doctrine repositories. Repositories loader does this kind of repository name to entity name conversion:
`Vendor\Package\Repositories\FooRepository` should map to this entity `Vendor\Package\Entities\Foo`.

If this name matching strategy is not sufficient for you, you may provide your own implementation of the `IRepositoryNameParser` interface.

## Usage

To make repositories injectable simply create a new instance of `IDoctrineRepositoriesLoader`, pass in an instance of `IContainer` and an instance `ObjectManager` and enable it.

```php
$loader = new DoctrineRepositoriesLoader($container, $om);
$loader->enable();
```
