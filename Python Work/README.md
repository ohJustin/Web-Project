# p1 - phpSelectOneTable

## Submission Instructions

Upload your `hs11-PHP PDO-CIS` folder to [Moodle](classes.cs.siue.edu).

## Problem Description

In this assignment you are to use `PDO` to access the `world` database and
execute a `SELECT` query to retrieve some data.

The provided file `phpSelectOneTable.php` consists of a partially completed
**HTML** section and an incomplete **PHP** block. You are to complete the PHP
block as instructed below.

The HTML section uses the *W3.CSS* framework to style the page for improved
readability. The page displays the results of the computations performed in the
*PHP* block and which you are to code.

Notice the use of the **PHP drop-ins**, i.e. the use of the `<?php` and `?>`
tags to execute *PHP* code from within the *HTML* elements.

The *PHP* block starts off by turning on error handling so debugging the code
can become a bit easier.

## Problem Instructions

1. Move the file `phpSelectOneTable.php` to the `htdocs\hs11-PHP PDO-CIS\p1` folder. This
file is the web page you will be using in this assignment.

1. Move the batch file `world.sql` to the `htdocs\hs11-PHP PDO-CIS\p1` folder. This file is
the batch file you will import to load the database `world` with data.

1. Run `MAMP` to start the web server. Use your chosen browser to render the
page. As you code the page make sure you refresh the browser to verify your
efforts as you progress. **DO NOT** wait until you code the entire page to test.

## Import the batch file

Import the batch file provided `world.sql` to import the data for the `world`
database. If you do not have the `world` database already in your database
server, then create it first.

## Update the `<footer>` element

Type your name in the copyright line inside the `<footer>` element.

## Variable definition(s)

Define the variable `$year` and initialize it with the value returned from the
call to the built-in function `date('Y')`. The function returns the *year*
component of the current date and time on your system. This value is displayed
in the copyright inside the footer.

## Function definitions

You will implement a number of short functions to carry out each needed step.
This *modular* approach will make it easier to write and ultimately debug the application.

## `getDSN()` function defintion

Define the function `getDSN()` that does not take any parameters. The function
creates and returns the **Data Source Name** string that will allow the app to
connect to the server successfully. Return a **DSN** string consisting of the
following components:

```php
prefix: 'mysql'
host: 'localhost'
port: 8889
dbname: 'world'
```

## `getUsername()` function defintion

Define the function `getUsername()` that does not take any parameters. The
function returns `'root'` as the username.

## `getPassword()` function defintion

Define the function `getPassword()` that does not take any parameters. The
function returns `'root'` as the password.

## `getPDO()` function defintion

Define the function `getPDO()` that does not take any parameters. The function
returns a new `PDO` instance.

## `sqlSelectQuery()` function definition

Define the function `sqlSelectQuery()` that does not take any parameters. The
function returns the `SELECT` query used to access the database:

```sql
SELECT Name, Population 
FROM City 
WHERE CountryCode='USA' 
AND Population > 1000000 
ORDER BY Population DESC
```

## `displayRecords()` function definition

Define the function `displayRecords()` that does not take any parameters. The
function establishes a PDO connection with the database server, executes the
above `SELECT` query and lists the results using `echo` statements.

A sample output is shown below:

```text
New York - 8,008,278
Los Angeles - 3,694,820
Chicago - 2,896,016
```

1. Call the `getPDO()` function to creaate a connection to the database and
assign the `PDO` instance returned to the variable `$pdo`.

1. Use the `setAttribute()` method of the `PDO` instance to specify exceptions
as the error handling mode.

1. Use the `number_format()` function to display the population with commas.

1. After displaying the data disconnect from the database by setting the `PDO`
instance to `null`, i.e. `$pdo = null;`

## Test your code thoroughly before you submit
