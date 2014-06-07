[![Build Status](https://travis-ci.org/andreafiori/symfony2-quiz.svg?branch=master)](https://travis-ci.org/andreafiori/symfony2-quiz)

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
Connection parameters are on the app/config/config.yml file.
I've created a database called "quiz" on localhost.

Features
----------------

I have used Doctrine2 QueryBuilder component to interact with database and knpPaginatorBundle for pagination.
I have created models to abstract SQL and taking away all interaction from the controller.
The application uses the bundle on the root and the pagination bundle adds some GET parameters automatically.
Neteans is the IDE used to edit and run tests.
HTML output is compressed. Bootstrap 3 and JQuery functions are used on the frontend too.

Testing
----------------

A test suite is available for the QuiBundle. Run it with the following command:
    
    phpunit -c app/

Resources
----------------

- http://zend-php.appspot.com/questions_list/1
- http://my.safaribooksonline.com/book/certification/zend/0672327090/practice-exam-questions/app01
- Zend PHP study guide
