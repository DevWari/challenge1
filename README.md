### install
- install xampp 
- move the project to `c:/xampp/htdocs/`

### create a database and a table in MySQL Admin
- database name: `db_customer`
- tabel name: `tbl_customer`
    columns: `id, first_name, last_name, email, gender, company, city, title, latitude, longitude`
    private key: `id` (auto increment)

### handling `customers.csv`
- remove the first row of the file (`id, first_name, last_name, email, gender, company, city, title`) and save it.
- create a new folder called `csv` in `app/public` folder of project root.
- move the changed file to `app/public/csv` of project root.

### run a command for importing csv file to database
- run a command called `php artisan insert:csv` in the project root or the folder which exists php.exe.

### call a API in the browser for updating the longitude and latitude of db.
- call the `localhost:8000/v1/add-geolocation`
- This API is a `GET` method and you can easily call in any browser.
   Note: It takes some time for updating db when you call this API. I think it takes about 20 mins.

### Getting a customer by `id` and all customers

- `localhost:8000/v1/customers/{id}`: getting a customer by `id`
- `localhost:8000/v1/customers`:  getting all customers

### !!!Important
- You need to change some values in `php.ini`
    max_input_time=1800         (default: 120)
    max_execution_time=1800     (default: 120)
- After changing them, you should restart the server.

