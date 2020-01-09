###Data Wilayah Indonesia

Modul Laravel ini berisi data Provinsi, Kabupaten/Kota, Kecamatan dan Kelurahan/Desa di seluruh Indonesia. 
Data wilayah yang ada pada modul ini diambil dari laravolt/indonesia yang bersumber dari edwardsamuel/Wilayah-Administratif-Indonesia.


Requirements
- Laravel
- https://github.com/nwidart/laravel-modules
- https://github.com/joshbrw/laravel-module-installer

Instalation

Install Package Via Composer
`composer require novay/wilayah-module`


Usage

- `php artisan module:migrate Wilayah`
- `php artisan module:seed Wilayah`

Linked Helpers
`
"autoload": {
	"psr-4": {
            ...
        },
        "classmap": [
            ...
        ], 
        "files": [
            "Modules/Wilayah/Helpers/helpers.php"
	]
},
`

Helpers

- `provinsi()->get()`
- `kota()->find($id)`
- `kecamatan()->whereNama('Sungai Kunjang')->first()`
- `kelurahan()->paginate(10)`
- `logo($id) ` Untuk full url logo. *$id* adalah id provinsi atau kota..


Enable Logo Provinsi dan Kabupaten/Kota

- Daftarkan command berikut kedalam aplikasi Anda di `app/Console/Kernel.php`
	
	protected $commands = [
	    \Modules\Wilayah\Console\LinkLogo::class
	];

- Jalankan perintah artisan berikut melalui command prompt atau terminal:

	php artisan wilayah:logo


Tested on Laravel 6+.
