**Recipes** is an app where amateur chefs can show what food they can make for people to order (think Uber for cooking). People can leave reviews for
a specific recipe made by a a specific chef. Chefs can register recipes they are able to make (well) from a list of recipes; these will be called entrées.

In order to run locally:

Must have docker and docker-compose installed.

1. Clone the repository.
2. If no .env files present - CD into the laravel directory and type cp .env.example .env | CD into the laradock directory and type cp env-example .env
3. Using a terminal, cd into the laradock directory and type "docker-compose up -d nginx mysql
4. Using a command line tool, get into the docker container with the laravel app by typing ```docker-compose exec -it laradock_workspace_1 bash```
5. cd into the laravel directory and run ```composer install```
6. Run ```php artisan migrate``` and ```php artisan key:generate``` and if you want to add some mock data ```php artisan db:seed```
7. Check if the site is running by going to localhost:8300
8. Using an API application or your browser address bar, access one of the endpoint addresses of the api (e.g. localhost:8300/api/recipes)



**API calls implemented:**
- GET recipes  **list** (GET *localhost:8300/api/recipes*)  **single** (GET *localhost:8300/api/recipes/{id}*)
- GET chefs    **list** (GET *localhost:8300/api/chefs*)    **single** (GET *localhost:8300/api/chefs/{id}*)
- POST recipes (POST *localhost:8300/api/recipes*) json request body: ```["name":"name of recipe", "description":"text about recipe" , "hours_to_make", "estimated hours to make this"]```
- PUT recipes (PUT *localhost:8300/api/recipes/{id}*) json request body: ```["name":"name of recipe", "description":"text about recipe" , "hours_to_make", "estimated hours to make this"]```

**API calls to be implemented:**
- POST entree
- POST review
- POST chefs
- PUT entree

*Resources used:*

- Setting up laradock on Windows: https://blog.nojaf.com/2016/08/19/laradock-on-windows-10/
- Creating api with laravel 5.5:  https://medium.com/@dinotedesco/using-laravel-5-5-resources-to-create-your-own-json-api-formatted-api-2c6af5e4d0e8
- General info for tests:         https://laravel.com/docs/5.5/http-tests
- Laravel RESTful Back End 5.5:   https://code.tutsplus.com/tutorials/build-a-react-app-with-laravel-restful-backend-part-1-laravel-5-api--cms-29442


*Ways to expand app:*
1. Create test database
2. User authentication and roles for API calls.
3. Simple front-end for viewing chef's portfolios and place to leave reviews.
4. A way to order an entree as a customer via the application