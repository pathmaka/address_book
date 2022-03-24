# Customer Address Bbook
This app is a simple web-based customer address book developed with Laravel and Vue.js. 


> Technologies:<br />
Laravel PHP Framework (v8.6.11) for API<br />
Frontend: Vue.js (v2.6.12) | Bootstrap 4 | HTML | CSS<br />
Database: MySQL (v7.4)<br />
(Laravel & Vue.js mix build)<br />


## API
```
+--------+-----------+------------------------------+------------------+------------------------------------------------------------+------------------------------------------+
| Domain | Method    | URI                          | Name             | Action                                                     | Middleware
|
+--------+-----------+------------------------------+------------------+------------------------------------------------------------+------------------------------------------+
|        | GET|HEAD  | /                            |                  | Closure                                                    | web
|
|        | GET|HEAD  | api/customer                 | customer.index   | App\Http\Controllers\AddressController@index               | api
|
|        | POST      | api/customer                 | customer.store   | App\Http\Controllers\AddressController@store               | api
|
|        | GET|HEAD  | api/customer/create          | customer.create  | App\Http\Controllers\AddressController@create              | api
|
|        | GET|HEAD  | api/customer/{customer}      | customer.show    | App\Http\Controllers\AddressController@show                | api
|
|        | PUT|PATCH | api/customer/{customer}      | customer.update  | App\Http\Controllers\AddressController@update              | api
|
|        | DELETE    | api/customer/{customer}      | customer.destroy | App\Http\Controllers\AddressController@destroy             | api
|
|        | GET|HEAD  | api/customer/{customer}/edit | customer.edit    | App\Http\Controllers\AddressController@edit                | api
|
|
+--------+-----------+------------------------------+------------------+------------------------------------------------------------+---------------------------------------

```

## Installation
1. Clone the repository
2. create database and update `.env` with the new DB credencials 
3. Run the migration
4. Install/Update all the dependencies
5. Run the Laravel project `php artisan serve`


## References
[Laravel docs](https://laravel.com/docs/4.2/)<br />
[Vue.js](https://vuejs.org/guide/introduction.html/)<br />
[Composer (A Dependency Manager )](https://getcomposer.org/)<br />




 
