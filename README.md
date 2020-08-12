# Api_blog
**What does this REPO do?**
This is an MVC modelled system,ued to perform basic CRUD operations,using API calls
and mysQL or PDA querys on a rrelational database

**Task to be completed**
It is able to Perform CRUD operations on a database with categories and post
tables ,individually or in relation to one another

**How  should it be tested**

1. Clone repo into your local severs,www directory(wampp) or htdocs(xampp),
2. import the sql fie in the root directory to your database system (name=> api_blog_db.sql)
3. making use of post man you can make calls to each files within the sub folders of the api_front_end folder,

**Read exammples and corresponding input syntax below**

**Get all post**= (GET) http://localhost/Api_blog/api_front_end/post/read.php 
**Get specific post**=(GET) http://localhost/Api_blog/api_front_end/post/read_single.php?id=id_of_post_to_get
**insert post**= (POST) http://localhost/Api_blog/api_front_end/post/create.php
                syntax for body parameter
                {
                         "category_id":"2",
                          "id":"21",
                          "title":"test",
                          "body":"test test",
                          "author":"owner"


                      }
                      
                   Headers has a key of content-type and value is application/json
                  
**Delete a post**= (DELETE) http://localhost/Api_blog/api_front_end/post/delete.php
                         syntax for body parameter,requires an id,
                {
                        
                          "id":"21",
            }
 **Update a post**=(PATCH) http://localhost/Api_blog/api_front_end/post/update.php
  syntax for body parameter,requires the whole body ,then we can update however we want,
                                   {
            "id": "22",
             "title": "test",
            "body": "test update",
            "author": "owner",
            "category_id": "2",
            "category_name": "Gaming"
           
        }

**NOTE**
Basic knowledge of how to use the post man API would help you navigate the calls 
better.
