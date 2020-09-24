# NHTSA-Vehicle-API

[![Latest Version on Packagist][ico-version]][link-packagist]
[![Software License][ico-license]](LICENSE.md)
[![Build Status][ico-travis]][link-travis]
[![Coverage Status][ico-scrutinizer]][link-scrutinizer]
[![Quality Score][ico-code-quality]][link-code-quality]
[![Total Downloads][ico-downloads]][link-downloads]

A package to consume the National Highway Traffic Safety Administration (NHSTA) Vehicles API for decoding VINs and pulling lists of Vehicle Year, Make and Model.

## Install

Via Composer

``` bash
$ composer require biegalski-llc/nhtsa-vehicle-api
```

## Usage

All methods return an alphabetized array of data.

#### Initialize
``` php
use BiegalskiLLC\NHTSAVehicleAPI\VehicleApi;

$vehicles = new VehicleApi();
```

#### Get All Makes
This method will allow you to pull a live listing of all vehicle makes from the NHSTA Vehicles API.

The data will include the *Make Name* and *Make ID*.
```
$vehicles->listAllMakes();
```

#### Get Pre-Loaded List Of Makes
Considering the make list is extremely extensive from the NHSTA Vehicles API we have curated our own pre-loaded list of commonly used makes in the United States.

The data will include the *Make Name* and *Make ID*.
```
$vehicles->listPreloadedMakes();
```

You can review this list at: `biegalski-llc/nhtsa-vehicle-api/config/preloadedList.php`

#### Get Accepted List Of Makes
Considering the make list is extremely extensive from the NHSTA Vehicles API we have another method which accepts an array parameter of all of the makes you would like to pull. The accepted list should be an array of Make ID's from the NHSTA Vehicles API.

The data will include the *Make Name* and *Make ID*.
```
$vehicles->listAcceptedListMakes([6124,9172]);
```

#### Get All Models By Make
This method will allow you to pull a live listing of all vehicle models for a vehicle make. It requires a Make ID integer as a parameter.

The data will include the *Make Name*, *Make ID*, *Model Name* and *Model ID*.
```
$vehicles->listModelsByMake(460);
```

#### Get All Models By Make and Year
This method will allow you to pull a live listing of all vehicle models for a vehicle make by year. It requires a Make ID integer  and Year integer as parameters.

The data will include the *Make Name*, *Make ID*, *Model Name* and *Model ID*.
```
$vehicles->listModelsByMakeYear(460, 2020);
```

#### Use VIN Decoder
This method will allow you to decode a VIN to get information on that particular vehicle.
```
$vehicles->decodeVin('1J4GZ58S7VC697710');
```

## Change log

Please see [CHANGELOG](CHANGELOG.md) for more information on what has changed recently.

## Testing

``` bash
$ composer test
```

## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) and [CODE_OF_CONDUCT](CODE_OF_CONDUCT.md) for details.

## Security

If you discover any security related issues, please email packages@biegalski-llc.com instead of using the issue tracker.

## Credits

- [Michael Biegalski][link-author]

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.

[ico-version]: https://img.shields.io/packagist/v/Biegalski-LLC/NHTSA-Vehicle-API.svg?style=flat-square
[ico-license]: https://img.shields.io/badge/license-MIT-brightgreen.svg?style=flat-square
[ico-travis]: https://img.shields.io/travis/Biegalski-LLC/NHTSA-Vehicle-API/master.svg?style=flat-square
[ico-scrutinizer]: https://img.shields.io/scrutinizer/coverage/g/Biegalski-LLC/NHTSA-Vehicle-API.svg?style=flat-square
[ico-code-quality]: https://img.shields.io/scrutinizer/g/Biegalski-LLC/NHTSA-Vehicle-API.svg?style=flat-square
[ico-downloads]: https://img.shields.io/packagist/dt/Biegalski-LLC/NHTSA-Vehicle-API.svg?style=flat-square

[link-packagist]: https://packagist.org/packages/Biegalski-LLC/NHTSA-Vehicle-API
[link-travis]: https://travis-ci.org/Biegalski-LLC/NHTSA-Vehicle-API
[link-scrutinizer]: https://scrutinizer-ci.com/g/Biegalski-LLC/NHTSA-Vehicle-API/code-structure
[link-code-quality]: https://scrutinizer-ci.com/g/Biegalski-LLC/NHTSA-Vehicle-API
[link-downloads]: https://packagist.org/packages/Biegalski-LLC/NHTSA-Vehicle-API
[link-author]: https://github.com/Biegalski-LLC
[link-contributors]: ../../contributors
