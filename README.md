# Quiz and interview questions

[![Build Status](https://travis-ci.org/andreafiori/symfony2-quiz.svg?branch=master)](https://travis-ci.org/andreafiori/symfony2-quiz)

The database contains question about PHP (Zend certification exam) and other topics.
The quizzes have the correct answer and you can solve all problems. 
No score will be stored. When you will solve a quiz, sometimes there's an additional comment to explain more about the question and its solution.
Question interview are about PHP, HTTP and web development. I will add more important questions.

[Demo available here](http://andreafiori.net/quiz)

## Installation

Installation with composer:

    composer self-update
    composer install

## Database

The MySQL dump with database and data is on the sql directory. 
Connection parameters are on the app/config/config.yml file.
I've created a database called "quiz" on localhost.

The MySQL tables are InnoDb type with foreign keys.
There are both one-to-many and many-to-many relationships.

## Testing

To run the tests, execute the following command from the project root directory. 
Ensure you have PHPUnit installed.

    phpunit --stop-on-failure

## Backend features

- Doctrine2 ORM
- Symfony2 with Twig and knpPaginatorBundle for pagination
- Twig Macro for printing topics recursively
- Twig custom class and functions to slugify string\s
- The web directory was deleted so the application can be deployed on a shared hosting
- Netbeans IDE was used for coding and design
- The admin area is under construction. I've used and updated CRUD generated code but it's not enough to manage database tables with many to many relationships

## Frontend features

- HTML output compression
- Twitter Bootstrap 3
- JQuery

## Zend questions resources

- [AppSpot](http://zend-php.appspot.com/questions_list/1)
- [Safari Book online](http://my.safaribooksonline.com/book/certification/zend/0672327090/practice-exam-questions/app01)
- Zend PHP study guide and Zend PHP Certification Practice Test Book

## TODO

- User loginFOSUserBundle login
- Fix the admin area
- Add functional testing
- Recover and try [data fixture](http://symfony.com/doc/current/bundles/DoctrineFixturesBundle/index.html)
- Always add new records on database
