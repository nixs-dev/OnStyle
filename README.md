# User Interface


Welcome Page

![index](/readme/index.png)

User Profile

![profile](/readme/profile.png)

Home

![home](/readme/home.png)

Products

![products](/readme/products.png)

Auth

![auth](/readme/auth.png)


# Getting started

Define your database server and configuration in "/config/database.php", create a database with the chosen name, then:

```php artisan migrate```

Create a file named ".env" in project root and set the following keys:

APP_KEY=\
PAGSEGURO_EMAIL=\
PAGSEGURO_TOKEN=\
PAGSEGURO_AMBIENTE=sandbox

For getting a APP_KEY you can run ```php artisan key:generate```. However, for the others keys, you need have a PagSeguro sandbox account. Create one and get those values.

# Running

Install dependencies

```composer install```

Install dependencies

```php artisan serve```
