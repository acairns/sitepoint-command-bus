# Example Usage of a Command Bus

The article is currently being written.

I'll add more details here soon!

## Setup

The only thing you need to get up-an-running is to pull the codebase down and install the dependencies:

```bash
$ composer install
```

You are now good to go!

## Tests

Run the tests:

```bash
$ ./vendor/bin/phpunit
```

## Examples

There are [several examples included](https://github.com/acairns/sitepoint-command-bus/tree/master/examples) to show how
a command can be passed into a command bus.

You can run these directly from the console:

```bash
$ php examples/CreateDeckExample.php
$ php examples/DrawCardExample.php
$ php examples/ShuffleDeckExample.php
```
