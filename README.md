Recipes is an app where amateur chefs can show what food they can make for people to order. People can leave reviews for
a specific recipe made by a a specific chef. Chefs can pick recipes they are able to make(well) from a list of recipes; these will be called entrées.

API calls implemented:


API calls to be implemented:
GET chefs
GET recipes
POST entree
POST review



In order to run locally:

Must have docker and docker-compose installed.

1. Clone the repository.
2. Using a terminal, cd into the laradock directory and type "docker-compose up -d nginx mysql
3. Check if the site is running by going to localhost:8300


Extenstions to this app:
1. User authentication for API calls.
2. Simple front-end for viewing chef's portfolios and place to leave reviews.
3. A way to order an entree via the application
