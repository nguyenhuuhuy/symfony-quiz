[![Build Status](https://travis-ci.org/andreafiori/symfony2-quiz.svg?branch=master)](https://travis-ci.org/andreafiori/symfony2-quiz)

Quiz system
========================

Quiz with questions and answer. The database contains question about PHP (Zend certification exam).
All questions are reviewed and corrected.

Installation
------------------------

Install and use composer:

    composer self-update
    composer install --optimize-autoloader
    composer update --optimize-autoloader (this command is optional)

The MySQL dump with database and data is on the sql directory. 
Connection parameters are on the app/config/config.yml file.
I've created a database called "quiz" on localhost (I use XAMPP on Windows).

Features
------------------------

- Doctrine2 QueryBuilder
- knpPaginatorBundle for pagination
- HTML output compression
- Twitter Bootstrap 3
- JQuery
- The web directory was deleted so the application can be deployed on a shared hosting
- Netbeans IDE was used

Testing
------------------------

A test suite is available for the QuiBundle. Run the following command from the project root directory. Ensure you have PHPUnit installed.
    
    phpunit -c app/

Resources
------------------------

- http://zend-php.appspot.com/questions_list/1
- http://my.safaribooksonline.com/book/certification/zend/0672327090/practice-exam-questions/app01
- Zend PHP study guide and Zend PHP Certification Practice Test Book
