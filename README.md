[![Latest Version on Packagist](https://img.shields.io/packagist/v/storewid/safaricom-mpesa-stk-push.svg?style=flat-square)](https://packagist.org/packages/storewid/safaricom-mpesa-stk-push)
[![Total Downloads](https://img.shields.io/packagist/dt/storewid/safaricom-mpesa-stk-push.svg?style=flat-square)](https://packagist.org/packages/storewid/safaricom-mpesa-stk-push)
![GitHub Actions](https://github.com/storewid/safaricom-mpesa-stk-push/actions/workflows/main.yml/badge.svg)

Php Library created by Storewid Technologies for safaricom mpesa payments.

Curren Version supports STK-PUSH-API

## Installation

You can install the package via composer:

```bash
composer require storewid/safaricom-mpesa-stk-push
```

## Usage

```php

//for stk-push

//on instatiating third argument either sandbox or live
$mpesa=new Mpesa($key,$secret,"sandbox"); 

$response=$mpesa->stk_push($business_shortcode, $amount, $customer_msisdn, $callbackurl, $account_reference,  "CustomerPayBillOnline", "Paying Merchant 72434 for order id 984");

// once you call stk_push a your customer will get a ussd push to confirm payment by entering their PIN number.


```

### Testing

```bash
composer test
```

### Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information what has changed recently.

## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) for details.

### Security

If you discover any security related issues, please email devs@storewid.com instead of using the issue tracker.

## Credits

-   [Storewid](https://github.com/storewid)
-   [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.