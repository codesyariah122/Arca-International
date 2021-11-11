### Arca International Backend::Test  
##### Konfigurasi local environment  

>Setelah melakukan clone seluruh repository ini.  

**Buka terminal(CMD / git bash)akses directory ```Arca-International``` kemudian akses direktori**  
```
cd Arca-Backend-Test/
```
Masih di terminal(CMD / git bash)  
```
composer install
```
Requirements dari composer
- Passport Auth JWT (use Laravel\Passport\HasApiTokens;) ---> App/Models/User.php  

**Selanjutnya konfigurasi file ```.env``` di root folder ```Arca-Backend-Test```**  
Jika menggunakan environment PC(windows), lakukan seperti ini :
>buat file baru di root directory ```Arca-Backend-Test``` Kemduian duplicate seluruh data yang ada di file ```env.example``` dan paste di file ```.env``` yang telah dibuat sebelumnya.  

jika menggunakan terminal (CMD / git bash)  
```
cp .env.example .env
```

Setelah file ```.env``` dibuat edit bagian berikut ini :  
```
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=webdev_arca
DB_USERNAME=root
DB_PASSWORD=
```

>sebagai tambahan di file ```.env``` tambahkan konfigurasi email service yang di peruntukan sebagai email konfirmasi untuk user register setelah menambahkan konfigurasi database diatas :  
```
MAIL_MAILER=smtp
MAIL_HOST=smtp.gmail.com
MAIL_PORT=587
MAIL_USERNAME=email_opportunity_anda@email.com
MAIL_PASSWORD=***(Password email opportunity anda)
MAIL_ENCRYPTION=tls
MAIL_FROM_ADDRESS=email_opportunity_anda@email.com
MAIL_FROM_NAME="${APP_NAME}"
```

**Setelah file .env di konfigurasi selanjutnya :**  
buka kembali terminal (CMD / git bash)  
```
php artisan key:generate
```
lanjut lagi masih di terminal (CMD / git bash)  
jalankan migrasi database :  
```
# php artisan migrate --seed
# php artisan passport:install 
# php artisan passport:keys
# php artisan vendor:publish --tag=passport-config
```

Jika ada error di tahap migrasi database, lakukan hal berikut :  
```
# php artisan db:seed
```
Code diatas untuk membuat field baru data user untuk role ***admin***  

Untuk data user login bisa di lihat di link berikut :  
[Data User Login](https://raw.githubusercontent.com/codesyariah122/Arca-International/main/Arca-Backend-Test/database/seeders/AdministratorSeeder.php)




<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400"></a></p>

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## About Laravel

Laravel is a web application framework with expressive, elegant syntax. We believe development must be an enjoyable and creative experience to be truly fulfilling. Laravel takes the pain out of development by easing common tasks used in many web projects, such as:

- [Simple, fast routing engine](https://laravel.com/docs/routing).
- [Powerful dependency injection container](https://laravel.com/docs/container).
- Multiple back-ends for [session](https://laravel.com/docs/session) and [cache](https://laravel.com/docs/cache) storage.
- Expressive, intuitive [database ORM](https://laravel.com/docs/eloquent).
- Database agnostic [schema migrations](https://laravel.com/docs/migrations).
- [Robust background job processing](https://laravel.com/docs/queues).
- [Real-time event broadcasting](https://laravel.com/docs/broadcasting).

Laravel is accessible, powerful, and provides tools required for large, robust applications.

## Learning Laravel

Laravel has the most extensive and thorough [documentation](https://laravel.com/docs) and video tutorial library of all modern web application frameworks, making it a breeze to get started with the framework.

If you don't feel like reading, [Laracasts](https://laracasts.com) can help. Laracasts contains over 1500 video tutorials on a range of topics including Laravel, modern PHP, unit testing, and JavaScript. Boost your skills by digging into our comprehensive video library.

## Laravel Sponsors

We would like to extend our thanks to the following sponsors for funding Laravel development. If you are interested in becoming a sponsor, please visit the Laravel [Patreon page](https://patreon.com/taylorotwell).

### Premium Partners

- **[Vehikl](https://vehikl.com/)**
- **[Tighten Co.](https://tighten.co)**
- **[Kirschbaum Development Group](https://kirschbaumdevelopment.com)**
- **[64 Robots](https://64robots.com)**
- **[Cubet Techno Labs](https://cubettech.com)**
- **[Cyber-Duck](https://cyber-duck.co.uk)**
- **[Many](https://www.many.co.uk)**
- **[Webdock, Fast VPS Hosting](https://www.webdock.io/en)**
- **[DevSquad](https://devsquad.com)**
- **[Curotec](https://www.curotec.com/services/technologies/laravel/)**
- **[OP.GG](https://op.gg)**
- **[CMS Max](https://www.cmsmax.com/)**
- **[WebReinvent](https://webreinvent.com/?utm_source=laravel&utm_medium=github&utm_campaign=patreon-sponsors)**
- **[Lendio](https://lendio.com)**

## Contributing

Thank you for considering contributing to the Laravel framework! The contribution guide can be found in the [Laravel documentation](https://laravel.com/docs/contributions).

## Code of Conduct

In order to ensure that the Laravel community is welcoming to all, please review and abide by the [Code of Conduct](https://laravel.com/docs/contributions#code-of-conduct).

## Security Vulnerabilities

If you discover a security vulnerability within Laravel, please send an e-mail to Taylor Otwell via [taylor@laravel.com](mailto:taylor@laravel.com). All security vulnerabilities will be promptly addressed.

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
