Quiz system
========================

Quiz with questions and answer. The database contains question about PHP (Zend certification exam).

Installation
----------------

Install and use composer:

composer self-update
composer install

and if you want: composer update

The MySQL dump with database and data is on the sql directory.

Features
----------------

I have used Doctrine2 QueryBuilder component to interact with database and knpPaginatorBundle for pagination.
I have created models to abstract SQL and taking away all interaction from the controller.
The application uses the bundle on the root and the pagination bundle adds some GET parameters automatically.
Neteans is the IDE used to edit and run tests.
HTML compression, Bootstrap 3 and JQuery functions are used on the frontend.

Testing
----------------

A test suite is available for the QuiBundle. Run it with the following command:
    
    phpunit -c app/

TODO
----------------

- Add question topics
- Store point for correct answers?
- Add more questions :)

Resources
----------------

This project is inspired by some pages and I'm gathering more and more questions. 

- http://zend-php.appspot.com/questions_list/1
- http://my.safaribooksonline.com/book/certification/zend/0672327090/practice-exam-questions/app01
