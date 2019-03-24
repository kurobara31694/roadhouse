# roadhouse

## Setup

Download and install Composer: https://getcomposer.org/download/

Download PHPUnit: https://phpunit.de/getting-started/phpunit-8.html

## Some crap about folder structure

Rest of crap. Will add later.

## Unit Test
Open up bash terminal and make sure you are in the root of the folder.

```bash
./vendor/bin/phpunit 
```

## Code Coverage
You need to make sure you have Xdebug installed and enabled. Open up bash terminal in the root of the project folder and run the command below.

```bash
php -ini|grep 'xdebug support'
```

If it is enabled you will get the `xdebug support => enabled` success message.

After that, run the command below.

```bash
./vendor/bin/phpunit --coverage-html target --whitelist=tests
```