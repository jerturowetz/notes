# VS code with PHP Codesniffer & the Wordpress rule set

This is a method to install phpcs & wpcs on a per-project basis. This method is unique to vscode projects as you wont have phpcs available from the command line (add nothing to $PATH)

## Requirements

The vscode phpcs plugin must be installed for this to work

## How to

    composer create-project wp-coding-standards/wpcs --no-dev

    composer require --dev "squizlabs/php_codesniffer=*"
    composer require --dev dealerdirect/phpcodesniffer-composer-installer

Here's an example `.vscode/settings.json` to make it work:

    {
        "php.suggest.basic": false,
        "phpcs.enable": true,
        "phpcs.standard": "WordPress-Extra",
        "files.exclude": {
            "**/node_modules": true,
            "wordpress": true,
            "vendor": true,
            "wpcs": true
        }
    }
