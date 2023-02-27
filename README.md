# User Interface


Welcome Page

![index](https://user-images.githubusercontent.com/57874746/221682487-11b89162-b5e7-4d16-b3c2-8590139d90cf.png)

User Profile

![profile](https://user-images.githubusercontent.com/57874746/221682544-92fb0df1-8f3e-4934-97cc-4ce13bbab601.png)

Home

![home](https://user-images.githubusercontent.com/57874746/221682559-3372b23d-4f2b-45df-9010-d90165caee13.png)

Products

![products](https://user-images.githubusercontent.com/57874746/221682725-e978e60e-ba95-4a20-947e-b808cedff21e.png)

Auth

![auth](https://user-images.githubusercontent.com/57874746/221682566-40c9be8e-b57d-4e31-92d1-7801e0605bd1.png)


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
