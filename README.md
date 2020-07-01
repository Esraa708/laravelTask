# How to use the app:-
as I was requested to handel the backend here are steps to make the app work 
- you should create database name at phpMyAdmin and then put the name at .env file
- Run php artisan migrate
- composer dump-autoload
- php artisan db:seed --class=class CategorySeeder
- php artisan serve
# Steps with screen shots to make it work
-  ### Register
    url:-http://localhost:8000/register
    method:-post
    body:-
    ```sh   
      {
          "name":"esraa",  
          "email":"test.test174@gmail.com",
         "password":"12345678",
         "password_confirmation":"12345678"
      }
      ```
    
-  ### To get all the articles paginated with their categories
     url:-http://localhost:8000/articles
    method:get
-  ### To Add an article 
      url:-http://localhost:8000/articles
    method:-post
    body:-
    ```sh   
      {
         "name":"hello ",
        "content":"hello world",
        "category_id":"1"
      }
      ```
-  ### To delete an article 
      url:-http://localhost:8000/articles/1
    method:-delete
-  ### To edit an article 
     url:-http://localhost:8000/articles/1
    method:-put
    body:-
    ```sh   
      {
         "name":"hello ",
        "content":"hello world",
        "category_id":"1"
      }
      ```
-  ###The category view contains paginated newest articles.
     url:http://localhost:8000/categories/1
    method:get

    



 