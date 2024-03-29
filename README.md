# Data Wilayah Indonesia

[![Total Downloads](https://poser.pugx.org/novay/wilayah-module/d/total.svg)](https://packagist.org/packages/novay/wilayah-module)
[![Build Status](https://travis-ci.org/novay/wilayah-module.svg?branch=master)](http://travis-ci.org/novay/wilayah-module)
[![Latest Stable Version](https://poser.pugx.org/novay/wilayah-module/v/stable.svg)](https://packagist.org/packages/novay/wilayah-module)
[![Latest Unstable Version](https://poser.pugx.org/novay/wilayah-module/v/unstable.svg)](https://packagist.org/packages/novay/wilayah-module)
[![License](https://poser.pugx.org/novay/wilayah-module/license.svg)](https://raw.githubusercontent.com/novay/wilayah-module/LICENSE)

**Modul Laravel** ini berisi data Provinsi, Kabupaten/Kota, Kecamatan dan Kelurahan/Desa di seluruh Indonesia. 
Data wilayah yang ada pada modul ini diambil dari **laravolt/indonesia** yang bersumber dari **edwardsamuel/Wilayah-Administratif-Indonesia**.

- [Requirements](#requirements)
- [Installation](#installation)
    - [Install Package via Composer](#install-package-via-composer)
- [Usage](#usage)
- [Linked Helpers](#linked)
- [Helpers](#helpers)
- [Enable Logo](#enable-logo)
- [License](#license)


### Requirements
* [Laravel](https://laravel.com/docs/installation)
* [Modules by nwidart](https://github.com/nwidart/laravel-modules)
* [Modules Installer by joshbrw](https://github.com/joshbrw/laravel-module-installer)


### Installation

##### Install Package Via Composer

```bash
composer require novay/wilayah-module
```


### Usage

* `php artisan module:migrate Wilayah`
* `php artisan module:seed Wilayah`

### Linked Helpers

Gak tau kenapa helpers bawaan Modules gak fungsi, jadi mesti di register manual.

```php
// composer.json

"autoload": {
    "psr-4": {
            ...
        },
        "classmap": [
            ...
        ], 
        "files": [
            "Modules/Wilayah/Helpers/Function.php"
    ]
},
```


### Helpers

- `provinsi()->get()`
- `kota()->find($id)`
- `kecamatan()->whereNama('Sungai Kunjang')->first()`
- `kelurahan()->paginate(10)`
- `logo($id) ` Untuk full url logo. `$id` adalah id provinsi atau kota.


### Enable Logo

Karena masalah waktu download package yang terlalu lama. Untuk versi terbaru tidak di includekan file logo. Tetapi dipanggil melalui CDN.

Bila ingin menggunakan package sekaligus file Logonya bisa install package versi 2.0 :

```bash
composer require novay/wilayah-module "2.0"
```

* Lalu jalankan perintah artisan berikut melalui command prompt atau terminal:

```bash
php artisan wilayah:logo
```

## License
Wilayah Modules is licensed under the MIT license for both personal and commercial products. Enjoy!

**Last Tested on Laravel 8**
