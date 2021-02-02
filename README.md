# Laravel LetterXpress

This package connects Laravel to the LetterXpress API.

## Install

Install this package via Composer:

```
composer require ctsoft/laravel-letter-xpress
```

Add the following lines to your .env file and insert your own API credentials:

```
LETTER_XPRESS_API_USER=[username]
LETTER_XPRESS_API_KEY=[apikey]
```

If you want to use the sandbox add this line to your .env file:

```
LETTER_XPRESS_API_URL=https://sandbox.letterxpress.de/v1/
```

## Usage

To set a new job:

```php
use CTSoft\Laravel\LetterXpress\Facades\LetterXpress;
use CTSoft\Laravel\LetterXpress\Models\Letter;

$letter = (new Letter())
    ->setFile('document.pdf')           // Use one of this functions
    ->setDocument('PDF BINARY STRING')  // to set the document
    ->setColor(true)
    ->setDuplex(true);
...

$letter = LetterXpress::setJob($letter);
echo $letter->getJobId();
echo $letter->getPrice();
...
```

## Notes

- Currently only set of a new job is supported
- Feel free to make a PR for additional features or ask for it via an issue

## Security

If you discover any security related issues, please email [security@ctsoft.de](mailto:security@ctsoft.de) instead of using the issue tracker.

## License

This package is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
