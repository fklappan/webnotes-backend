**Abandoned**

This project is no longer maintained.


# Webnotes Backend

This is the PHP Server Backend for the Webnotes App.

## Configuration

To run the server it is necessary to 
* Create a MySQL Database schema
* Create a config.ini.php file

### Create a MySQL database schema

At the current state, the application is not able to create the database schema on their own, so it needs to be created otherwise (think phpMyAdmin).

#### Table Notes

| Name      | Type              | Note      |
|------     |------             |------     |
| id        | integer           | auto increment  
|title      | varchar(255)      ||
|content    | text              ||

#### Table Users

| Name      | Type              | Note      |
|------     |------             |------     |
| id        | integer           | auto increment  
|name       | varchar(255)      ||
|password   | varchar(255)      ||


### Create a config.ini.php file

File has to be placed in root with the following content (which should be self explanatory):

```
;<?php die(); ?>


[database]
db_host         = localhost
db_name         = database
db_user         = user
db_password     = secret
```
