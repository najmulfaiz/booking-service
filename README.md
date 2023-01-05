## QuickFix Back End
QuickFix adalah tugas akhir mata kuliah MAD. Aplikasi ini memiliki fitur sebagai berikut :
1. Booking Service
2. Order Part & Accessories
3. Tips & Trick Perawatan Kendaraan
4. Emergency Hotline

Anggota Kelompok :
- 201953107 - Ragil Candra W
- 201953040 - Moh Wildan Habibi
- 201953118 - Suryadi Alfian D
- 201953032 - Muhammad Najmul Faiz
- 201953104 - Marlina Oktaviani


#### Installation :fire:

After clone or download this repository, next step is install all dependency required by laravel.

```shell
# install composer-dependency
$ composer install
```

Before we start web server make sure we already generate app key, configure `.env` file and do migration.

```shell
# create copy of .env
$ cp .env.example .env
# create laravel key
$ php artisan key:generate
# laravel migrate
$ php artisan migrate
# laravel link up storage files
$ php artisan storage:link
```
