[![Build Status](https://travis-ci.org/andreafiori/symfony2-quiz.svg?branch=master)](https://travis-ci.org/andreafiori/symfony2-quiz)

Quiz and interview questions
=====================================

The database contains question about PHP (Zend certification exam) and other topics.

The quizzes have the correct answer and you can solve all problems.

Installation
--------------------------------

Install and use composer:

    composer self-update
    composer install --optimize-autoloader
    composer update --optimize-autoloader (optional)

The MySQL dump with database and data is on the sql directory. 
Connection parameters are on the app/config/config.yml file.
I've created a database called "quiz" on localhost.

Database
--------------------------------

The tables has InnoDb tables with relationships. There's an intermediary table
for quiz questions, topics and one for questions and tags.
This adds some complexity but I've tried to keep all as simple as I can.

Testing
--------------------------------

To run the tests, execute the following command from the project root directory. 
Ensure you have PHPUnit installed.
    
    phpunit -c app/

Frontend and Backend features
--------------------------------

- Doctrine2 ORM
- Symfony2 with Twig and knpPaginatorBundle for pagination
- Twig Macro for printing topics recursively
- Twig custom class and functions to slugify string\s
- HTML output compression
- Twitter Bootstrap 3
- JQuery
- The web directory was deleted so the application can be deployed on a shared hosting
- Netbeans IDE was used for coding and design

Zend questions resources
--------------------------------

- http://zend-php.appspot.com/questions_list/1
- http://my.safaribooksonline.com/book/certification/zend/0672327090/practice-exam-questions/app01
- Zend PHP study guide and Zend PHP Certification Practice Test Book
