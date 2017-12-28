**Recipes** is an app where amateur chefs can show what food they can make for people to order (think Uber for cooking). People can leave reviews for
a specific recipe made by a a specific chef. Chefs can register recipes they are able to make (well) from a list of recipes; these will be called entrées.

In order to run locally:

Must have docker and docker-compose installed.

1. Clone the repository.
2. If no .env files present - CD into the laravel directory and type cp .env.example .env | CD into the laradock directory and type cp env-example .env
3. Using a terminal, cd into the laradock directory and type "docker-compose up -d nginx mysql
4. Check if the site is running by going to localhost:8300
5. Run ```php artisan migrate``` and ```php artisan key:generate```
6. Using an API application or your browser address bar, access one of the endpoint addresses of the api (e.g. localhost:8300/api/recipes)



**API calls implemented:**
- GET recipes  **list** (GET *localhost:8300/api/recipes*)  **single** (GET *localhost:8300/api/recipes/{id}*)
- GET chefs    **list** (GET *localhost:8300/api/chefs*)    **single** (GET *localhost:8300/api/chefs/{id}*)
- POST recipes (POST *localhost:8300/api/recipes*) format: ```["name":"*name of recipe*", "description":"*text about recipe*" , "hours_to_make", "*estimated hours to make this*"]```

**API calls to be implemented:**
- POST entree
- POST review
- POST chefs
- PUT recipes
- PUT entree

*Resources used:*

- Setting up laradock on Windows: https://blog.nojaf.com/2016/08/19/laradock-on-windows-10/
- Creating api with laravel 5.5:  https://medium.com/@dinotedesco/using-laravel-5-5-resources-to-create-your-own-json-api-formatted-api-2c6af5e4d0e8
- General info for tests:         https://laravel.com/docs/5.5/http-tests


*Ways to expand app:*
1. Create test databbase
2. User authentication and roles for API calls.
3. Simple front-end for viewing chef's portfolios and place to leave reviews.
4. A way to order an entree as a customer via the application


**note:** *I could not get seeding/fixtures to work so in order to pass tests, a data entry must be made into the recipes and chefs table such as:*
```
INSERT INTO `default`.chefs
(name, city, available, contact_info, created_at, updated_at)
VALUES('Kirk Knight', 'Rotterdam', 1, 'email:kirkskookies@gmail.com', '2017-12-24 17:56:33.000', '2017-12-24 17:56:33.000');
```
```
INSERT INTO `default`.recipes
(name, description, hours_to_make, created_at, updated_at)
VALUES('Risotto', 'Rice with a creamy mushroom and white wine sauce', 2, '2017-12-24 09:09:23.000', '2017-12-24 09:09:23.000');
```