[![Build Status](https://travis-ci.org/andreafiori/symfony2-quiz.svg?branch=master)](https://travis-ci.org/andreafiori/symfony2-quiz)

Quiz and interview questions
=====================================

The database contains question about PHP (Zend certification exam) and other topics.

The quizzes have the correct answer and you can solve all problems. 
No score will be stored. This is only for studying and read informations.

Installation
--------------------------------

Install and use composer:

    composer self-update
    composer install
    composer update --optimize-autoloader (optional)

Database
--------------------------------

The MySQL dump with database and data is on the sql directory. 
Connection parameters are on the app/config/config.yml file.
I've created a database called "quiz" on localhost.

The MySQL tables are InnoDb type with foreign keys.
There are both one-to-many and many-to-many relationships.

Testing
--------------------------------

To run the tests, execute the following command from the project root directory. 
Ensure you have PHPUnit installed.
    
    phpunit -c app/

Backend features
--------------------------------

- Doctrine2 ORM
- Symfony2 with Twig and knpPaginatorBundle for pagination
- Twig Macro for printing topics recursively
- Twig custom class and functions to slugify string\s
- The web directory was deleted so the application can be deployed on a shared hosting
- Netbeans IDE was used for coding and design

Frontend features
--------------------------------

- HTML output compression
- Twitter Bootstrap 3
- JQuery

TODO
--------------------------------

- Fix and complete the Admin area
- Functional testing
- Select users from db
- Always add new records on database

Zend questions resources
--------------------------------

- http://zend-php.appspot.com/questions_list/1
- http://my.safaribooksonline.com/book/certification/zend/0672327090/practice-exam-questions/app01
- Zend PHP study guide and Zend PHP Certification Practice Test Book
