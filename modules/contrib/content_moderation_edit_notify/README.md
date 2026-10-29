# Contents of this file

* Introduction
* Requirements
* Installation
* Configuration
* Maintainers

[![pipeline status](https://gitlab.com/mog33/content_moderation_edit_notify/badges/8.x-1.x/pipeline.svg)](https://gitlab.com/mog33/content_moderation_edit_notify/commits/8.x-1.x)

## Introduction

Notify users if a new revision is saved when editing a moderated node.

For a full description visit [project page](https://www.drupal.org/project/content_moderation_edit_notify).

Bug reports, feature suggestions and latest developments on [issue page](https://www.drupal.org/project/issues/content_moderation_edit_notify)

## Requirements

Drupal core module [Content Moderation](https://www.drupal.org/docs/8/core/modules/content-moderation).

## Installation

* Install as you would normally install a contributed Drupal module. Visit
   <https://www.drupal.org/node/1897420> for further information.

## Configuration

* Enable content moderation for any content type
* Configure from `/admin/config/system/content_moderation_edit_notify`

## Test and QA

### Javascript

From Drupal configuration:

```shell
curl -fsSL https://git.drupalcode.org/project/drupal/-/raw/9.5.x/core/.eslintrc.json -o .eslintrc.json
curl -fsSL https://git.drupalcode.org/project/drupal/-/raw/9.5.x/core/package.json -o package.json
npm install
node_modules/.bin/eslint -c .eslintrc.json js/*.js
node_modules/.bin/eslint -c .eslintrc.json *.yml
```

### PHP

```shell
composer require --dev edgedesign/phpqa:^1.26 drupal/coder dealerdirect/phpcodesniffer-composer-installer mglaman/phpstan-drupal:^1.1 phpstan/phpstan-deprecation-rules:^1 phpstan/extension-installer:^1.1 php-parallel-lint/php-parallel-lint nette/neon
cp .phpqa.yml.dist .phpqa.yml
vendor/bin/phpqa
```

## Maintainers

Current Maintainers:

* [Jean Valverde](https://www.drupal.org/u/mogtofu33) - [developpeur-drupal.com](https://developpeur-drupal.com/en)

This project has been sponsored by:

* [Catalyst](https://www.catalyst.net.nz)

Catalyst is a global team of skilled open source technologists. We
specialize in developing, designing and supporting enterprise grade
systems using open source technologies.

Visit: [catalyst.net.nz](https://www.catalyst.net.nz) for more information.
