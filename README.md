Data Wilayah Indonesia

Modul Laravel ini berisi data Provinsi, Kabupaten/Kota, Kecamatan dan Kelurahan/Desa di seluruh Indonesia. 
Data wilayah yang ada pada modul ini diambil dari laravolt/indonesia yang bersumber dari edwardsamuel/Wilayah-Administratif-Indonesia.


Requirements
- Laravel
- https://github.com/nwidart/laravel-modules


Instalation

Install Package Via Composer
`composer require novay/wilayah-module`


Usage




Enable Logo Provinsi dan Kabupaten/Kota

- Daftarkan command berikut kedalam aplikasi Anda di `app/Console/Kernel.php`
	
	protected $commands = [
	    \Modules\Wilayah\Console\LinkLogo::class
	];

- Jalankan perintah artisan berikut melalui command prompt atau terminal:

	php artisan wilayah:logo


Tested on Laravel 6+.