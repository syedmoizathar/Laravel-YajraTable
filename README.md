# Laravel-YajraTable
 Yajra Table Implementation using laravel with relation


//installing yajra table
composer require yajra/laravel-datatables:^9.0

//publishing providers for datatable
Open the file config/app.php and then add following service provider.

'providers' => [
    // ...
    Yajra\DataTables\DataTablesServiceProvider::class,
],

After completing the step above, use the following command to publish configuration & assets:

php artisan vendor:publish --tag=datatables

run command 
php artisan migrate

Add css and js datatable cdns 


Files Used

1. App -> Controller
2. View -> blades
3. Routes -> web
4. Database -> db -> yajra db.

Thank You 
Please update me if you have any suggestion