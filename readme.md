# EnumManager

[![Latest Version on Packagist][ico-version]][link-packagist]
[![Total Downloads][ico-downloads]][link-downloads]
[![Build Status][ico-travis]][link-travis]
[![StyleCI][ico-styleci]][link-styleci]

This is where your description should go. Take a look at [contributing.md](contributing.md) to see a to do list.

## Installation

Via Composer

``` bash
$ composer require omenejoseph/enummanager
```

## Usage
To create an Enum class
``` bash
$ php artisan make:enum gender_enum
```
This command would create a class GenderEnum in an Enum directory on App folder.
This clas just contains constants that are your actual enums.
```
<?php

namespace App\Enums;
use OmeneJoseph\EnumManager\EnumManager;


class GenderEnum extends EnumManager
{
   const FOO = 'foo';
   const BAR = 'bar';
}
```
Replace the dummy constants on the class with the actual enums you require like so
```
<?php

namespace App\Enums;
use OmeneJoseph\EnumManager\EnumManager;


class GenderEnum extends EnumManager
{
   const MALE = 'male';
   const FEMALE = 'female';
}
```
This sums up all you need to do for setting up.

Avaialable Methods:
1. EnumManager::enumValues()
  - This accepts the class part of an enum class that extends OmeneJoseph\EnumManager\EnumManager as argument
  - This returns a comma seperated value of the various constants in that class.
  - Sample use case is validations
    validations like:
    ```
    <?php
    
    $validation_array = [
    "name" => ["string", "required"], 
    "gender" => ["required", "in:male,female"]
    ];
    can now be:
    $validation_array = [
    "name" => ["string", "required"], 
    "gender" => ["required", "in:".EnumManager::enumValues(GenderEnum::class)]
    ];
    ```
    This can really be helpful if you have a lot of enums
   
  
2. EnumManager::enumValuesArray()
  - This accepts the class part of an enum class that extends OmeneJoseph\EnumManager\EnumManager as argument
  - This returns an array of the various constants in that class.  
  Sample use case
  Checking if a certain string exists in your enum list
  ```
  <?php 
  
  $needle = "needle";
  if(in_array($needle, EnumManager::enumValuesArray(GenderEnum::class))){
    // cool do stuff
  } else {
    // do other stuff
  }
  ```
  
  
Apart from these methods, this library provides you with a neat way to store and track your enums, this helps 
during collaboration, so thesame enum would not be created seperately in different classes.

Please drop a star if you enjoy using this library, feel free to email me with features you would like to be added. 
If you also like to contribute, contact me.

As more use cases come up, we would be updating and populating the documentation.
  
## Change log

Please see the [changelog](changelog.md) for more information on what has changed recently.

## Testing

``` bash
$ composer test
```

## Contributing

Please see [contributing.md](contributing.md) for details and a todolist.

## Security

If you discover any security related issues, please email author email instead of using the issue tracker.

## Credits

- [author name][link-author]
- [All Contributors][link-contributors]

## License

license. Please see the [license file](license.md) for more information.

[ico-version]: https://img.shields.io/packagist/v/omenejoseph/enummanager.svg?style=flat-square
[ico-downloads]: https://img.shields.io/packagist/dt/omenejoseph/enummanager.svg?style=flat-square
[ico-travis]: https://img.shields.io/travis/omenejoseph/enummanager/master.svg?style=flat-square
[ico-styleci]: https://styleci.io/repos/12345678/shield

[link-packagist]: https://packagist.org/packages/omenejoseph/enummanager
[link-downloads]: https://packagist.org/packages/omenejoseph/enummanager
[link-travis]: https://travis-ci.org/omenejoseph/enummanager
[link-styleci]: https://styleci.io/repos/12345678
[link-author]: https://github.com/omenejoseph
[link-contributors]: ../../contributors
