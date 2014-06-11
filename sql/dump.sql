-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Versione server:              5.5.36 - MySQL Community Server (GPL)
-- S.O. server:                  Win32
-- HeidiSQL Versione:            8.3.0.4771
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

-- Dump della struttura di tabella quiz.quiz_answers
CREATE TABLE IF NOT EXISTS `quiz_answers` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `answer` text,
  `correct` enum('1','0') DEFAULT '0',
  `question_id` bigint(20) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `question_id` (`question_id`),
  CONSTRAINT `fk_question_id` FOREIGN KEY (`question_id`) REFERENCES `quiz_questions` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=125 DEFAULT CHARSET=latin1;

-- Dump dei dati della tabella quiz.quiz_answers: ~124 rows (circa)
/*!40000 ALTER TABLE `quiz_answers` DISABLE KEYS */;
INSERT INTO `quiz_answers` (`id`, `answer`, `correct`, `question_id`) VALUES
	(1, '<SCRIPT LANGUAGE="php">', '1', 1),
	(2, '<!', '0', 1),
	(3, '<%', '1', 1),
	(4, '<?php', '1', 1),
	(5, '<?', '1', 1),
	(6, '@$foo', '1', 2),
	(7, '&$variable', '1', 2),
	(8, '${0x0}', '1', 2),
	(9, '$variable', '1', 2),
	(10, '$0x0', '0', 2),
	(11, 'You cannot modify an array during iteration', '0', 3),
	(12, ' for($i = 0; $i < count($array); $i++) { /* ... */ }', '0', 3),
	(13, 'foreach($array as $key => &$val) { /* ... */ }', '1', 3),
	(14, 'foreach($array as $key => $val) { /* ... */ }', '0', 3),
	(15, 'while(list($key, $val) = each($array)) { /* ... */}', '0', 3),
	(16, 'FOO', '0', 4),
	(17, '100', '0', 4),
	(18, '200', '1', 4),
	(19, '20', '0', 4),
	(20, '10', '0', 4),
	(21, '643.75', '1', 5),
	(22, '432', '0', 5),
	(23, '643', '0', 5),
	(24, '257', '0', 5),
	(25, '432.75', '0', 5),
	(26, 'false, true, true, true', '0', 6),
	(27, 'true, false, true, false', '1', 6),
	(28, 'true, true, false, false', '0', 6),
	(29, ' false, true, true, false', '0', 6),
	(30, 'false, false, true, false', '0', 6),
	(31, '312211', '1', 7),
	(32, '3312212', '0', 7),
	(33, ' 11221221', '0', 7),
	(34, '221131', '0', 7),
	(35, '3211122', '0', 7),
	(36, 'function myfunction(stdClass $a)', '1', 8),
	(37, 'function myfunciton($a = stdClass)', '0', 8),
	(38, 'Use is_object() within the function', '0', 8),
	(39, 'There is no way to ensure the parameter will be an object', '0', 8),
	(40, 'function myfunction(Object $a)', '0', 8),
	(41, 'Loops infinitely', '0', 9),
	(42, 'Switches the values of $p and $q', '0', 9),
	(43, ' Determines if they are both even or odd', '0', 9),
	(44, 'Determines the greatest common divisor between them', '1', 9),
	(45, 'Calculates the modulus between the two', '0', 9),
	(46, '!==', '0', 10),
	(47, 'instanceof', '0', 10),
	(48, '=', '0', 10),
	(49, '==', '0', 10),
	(50, ' ===', '1', 10),
	(51, 'quit();', '0', 11),
	(52, 'die();', '1', 11),
	(53, ' stop();', '0', 11),
	(54, '__halt_compiler();', '1', 11),
	(55, 'exit();', '1', 11),
	(56, '20', '1', 12),
	(57, '22', '0', 12),
	(58, '18', '0', 12),
	(59, '$a is an invalid value', '0', 12),
	(60, '2', '0', 12),
	(61, '120', '1', 13),
	(62, 'Syntax Error', '0', 13),
	(63, '60', '0', 13),
	(64, '70', '0', 13),
	(65, 'There is no way to do this', '0', 14),
	(66, '$string = $argv[1];', '0', 14),
	(67, '$string = $_ARGV[0];', '0', 14),
	(68, 'list($string) = func_get_args();', '1', 14),
	(69, '$string = get_function_args()', '0', 14),
	(70, '1: 2, 2: 20, 3: 15', '0', 15),
	(71, '1: 3, 2:21, 3:16', '0', 15),
	(72, '1: 2, 2:21, 3:15', '0', 15),
	(73, '1: 3, 2: 20, 3: 15', '0', 15),
	(74, '1: 2, 2: 20, 3: 16', '1', 15),
	(75, 'if(strpos($mystring, "PHP") !== false)', '1', 16),
	(76, ' if(!strpos($mystring,"PHP"))', '0', 16),
	(77, 'if(strpos($mystring, "PHP") === true)', '0', 16),
	(78, 'if(strloc($mystring, "PHP") == true)', '0', 16),
	(79, 'if(strloc($mystring, "PHP") === false)', '0', 16),
	(80, '10,20', '0', 17),
	(81, 'You cannot modify private member variables of a different class', '0', 17),
	(82, '20,20', '1', 17),
	(83, '10,10', '0', 17),
	(84, '20,10', '0', 17),
	(85, 'protected', '1', 18),
	(86, 'public', '1', 18),
	(87, 'static', '0', 18),
	(88, 'private', '1', 18),
	(89, 'final', '0', 18),
	(90, 'if($obj1->equals($obj2) && ($obj1 instanceof $obj2))', '0', 19),
	(91, 'if($obj1->equals($obj2))', '0', 19),
	(92, 'if($obj1 === $obj2)', '1', 19),
	(93, 'if($obj1 instanceof $obj2)', '0', 19),
	(94, 'if($obj1 == $obj2)', '0', 19),
	(95, 'instanceof, is_a', '0', 20),
	(96, 'instanceof, type-hinting', '1', 20),
	(97, 'type, instanceof', '0', 20),
	(98, '===, type-hinting', '0', 20),
	(99, '===, is_a', '0', 20),
	(100, 'You must use return &$newObj instead', '0', 21),
	(101, 'There is nothing wrong with this code', '0', 21),
	(102, 'duplicate() must accept its parameter by reference', '0', 21),
	(103, 'You must use the clone operator to make a copy of an object', '1', 21),
	(104, 'duplicate() must return a reference', '0', 21),
	(105, 'Put the logic in the object\'s constructor to alter the values', '0', 22),
	(106, 'Implment your own function to do object copying', '0', 22),
	(107, ' Implement the object\'s __clone() method', '1', 22),
	(108, 'Implement __get() and __set() methods with the correct logic', '0', 22),
	(109, 'Implement the __copy() method with the correct logic', '0', 22),
	(110, ' Static methods can only be called using the :: syntax and never from an instance', '0', 23),
	(111, 'Static methods do not provide a reference to $this', '1', 23),
	(112, 'Static methods cannot be called from within class instances', '0', 23),
	(113, 'Static methods don\'t have access to the self keyword', '0', 23),
	(114, 'There is no functional difference between a static and non-static method', '0', 23),
	(115, 'a: 30, b: 30', '0', 24),
	(116, 'a: 30, b: 20', '0', 24),
	(117, 'a: 30, b: 10', '1', 24),
	(118, 'a: 20, b: 20', '0', 24),
	(119, ' a: 10, b: 10', '0', 24),
	(120, 'final', '0', 25),
	(121, 'protected', '0', 25),
	(122, 'incomplete', '0', 25),
	(123, 'abstract', '1', 25),
	(124, 'implements', '0', 25);
/*!40000 ALTER TABLE `quiz_answers` ENABLE KEYS */;


-- Dump della struttura di tabella quiz.quiz_questions
CREATE TABLE IF NOT EXISTS `quiz_questions` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `question` text,
  `question_code_part` text,
  `number_correct_answers` int(11) DEFAULT NULL,
  `topic_id` bigint(20) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `topic_id` (`topic_id`)
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=latin1;

-- Dump dei dati della tabella quiz.quiz_questions: ~25 rows (circa)
/*!40000 ALTER TABLE `quiz_questions` DISABLE KEYS */;
INSERT INTO `quiz_questions` (`id`, `question`, `question_code_part`, `number_correct_answers`, `topic_id`) VALUES
	(1, 'Which of the following tags are an acceptable way to begin a PHP Code block?', NULL, 4, 1),
	(2, 'Which of the following are valid PHP variables?', NULL, 4, 1),
	(3, 'What is the output of the following PHP code?', NULL, 1, 1),
	(4, 'What is the output of the following PHP script?', NULL, 1, 1),
	(5, 'What is the output of the following PHP code?', '<?php\r\n\r\ndefine(\'FOO\', 10);\r\n\r\n$array = array(10 => FOO,\r\n               "FOO" => 20);\r\n\r\nprint $array[$array[FOO]] * $array["FOO"];\r\n\r\n?>', 1, 1),
	(6, 'What combination of boolean values for $a, $b, $c, and $d will result in the variable $number being equal to 3?', '<?php\r\n\r\n$a = null;\r\n$b = null;\r\n$c = null;\r\n$d = null;\r\n\r\nif($a && !$b) {\r\n  if(!!$c && !$d) {\r\n    if($d && ($a || $c)) {\r\n      if(!$d && $b) {\r\n        $number = 1;\r\n      } else {\r\n        $number = 2;\r\n      }\r\n    } else {\r\n      $number = 3;\r\n    }\r\n  } else {\r\n    $number = 4;\r\n  }\r\n} else {\r\n  $number = 5;\r\n}\r\n?>', 1, 1),
	(7, 'What is the output of the following code?', '<?php\r\n\r\n$string = "111221";\r\n\r\nfor($i = 0; $i < strlen($string); $i++) {\r\n	\r\n	$current = $string[$i];\r\n	$count = 1;\r\n	\r\n	while(isset($string[$i + $count]) && ($string[$i + $count] == $current)) $count++;\r\n	\r\n	$newstring .= "$count{$current}";\r\n	\r\n	$i += $count-1;\r\n}\r\n\r\nprint $newstring;\r\n?>', 1, 1),
	(8, 'What is the best way to ensure that a user-defined function is always passed an object as its single parameter?', NULL, 1, 1),
	(9, 'What does the following function do, when passed two integer values for $p and $q?', '<?php\r\nfunction magic($p, $q) {\r\n  return ($q == 0)\r\n    ? $p\r\n    : magic($q, $p % $q);\r\n}\r\n?>', 1, 1),
	(10, 'The ____ operator is used to test if two values are identical in every way.', NULL, 1, 1),
	(11, 'What would go in place of ?????? below to make this script execute without a fatal error?', '<?php\r\n\r\n$a = 1;\r\n$b = 0;\r\n\r\n??????\r\n\r\n$c = $a / $b;\r\n?>', 3, 1),
	(12, 'What is the output of the following?', '<?php\r\n\r\n$a = 010;\r\n$b = 0xA;\r\n$c = 2;\r\n\r\nprint $a + $b + $c;\r\n\r\n?>', 1, 1),
	(13, 'What is the output of the following?', '<?php\r\n\r\n$a = 20;\r\n\r\nfunction myfunction($b) {\r\n	$a = 30;\r\n	\r\n	global $a, $c;\r\n	return $c = ($b + $a);\r\n}\r\n\r\nprint myfunction(40) + $c;\r\n\r\n?>', 1, 1),
	(14, 'What would you replace ??????? with, below, to make the string Hello, World! be displayed?', '<?php\r\n\r\nfunction myfunction() {\r\n        ???????\r\n	print $string;\r\n}\r\n\r\nmyfunction("Hello, World!");\r\n\r\n?>', 1, 1),
	(15, 'What is the output of the following function?', '<?php\r\n\r\nfunction &find_variable(&$one, &$two, &$three) {\r\n	\r\n	if($one > 10 && $one < 20) return $one;\r\n	if($two > 10 && $two < 20) return $two;\r\n	if($three > 10 && $three < 20) return $three;\r\n}\r\n\r\n$one = 2;\r\n$two = 20;\r\n$three = 15;\r\n\r\n$var = &find_variable($one, $two, $three);\r\n\r\n$var++;\r\n\r\nprint "1: $one, 2: $two, 3: $three";\r\n\r\n?>', 1, 1),
	(16, 'For an arbitrary string $mystring, which of the following checks will correctly determine if the string PHP exists within it?', NULL, 1, 1),
	(17, 'What are the values of $a in $obj_one and $obj_two when this script is executed?', '<?php\r\nclass myClass {\r\n  private $a;\r\n\r\n  public function __construct() {\r\n    $this->a = 10;\r\n  }\r\n\r\n  public function printValue() {\r\n    print "The Value is: {$this->a}\\n";\r\n  }\r\n\r\n  public function changeValue($val, $obj = null) {\r\n    if(is_null($obj)) {\r\n      $this->a = $val;\r\n    } else {\r\n      $obj->a = $val;\r\n    }\r\n  }\r\n\r\n  public function getValue() {\r\n    return $this->a;\r\n  }\r\n}\r\n\r\n$obj_one = new myClass();\r\n$obj_two = new myClass();\r\n\r\n$obj_one->changeValue(20, $obj_two);\r\n$obj_two->changeValue($obj_two->getValue(), $obj_one);\r\n\r\n$obj_two->printValue();\r\n$obj_one->printValue();\r\n\r\n?>', 1, 1),
	(18, 'What are the three access modifiers that you can use in PHP objects?', NULL, 3, 1),
	(19, 'When checking to see if two variables contain the same instance of an object, which of the following comparisons should be used?', '', 1, 1),
	(20, 'In PHP 5 you can use the ______ operator to ensure that an object is of a particular type. You can also use _______ in the function declaration.', NULL, 1, 1),
	(21, 'What is wrong with the following code?', '<?php\r\n\r\nfunction duplicate($obj) {\r\n	$newObj = $obj;\r\n	return $newObj;\r\n}\r\n\r\n$a = new MyClass();\r\n\r\n$a_copy = duplicate($a);\r\n\r\n$a->setValue(10);\r\n$a_copy->setValue(20);\r\n\r\n?>', 1, 1),
	(22, 'How can you modify the copy of an object during a clone operation?', '', 1, 1),
	(23, 'What is the primary difference between a method declared as static and a normal method?', NULL, 1, 1),
	(24, 'What is the output of the following script?', '<?php\r\n\r\nclass ClassOne {\r\n  protected $a = 10;\r\n\r\n  public function changeValue($b) {\r\n    $this->a = $b;\r\n  }\r\n}\r\n\r\nclass ClassTwo extends ClassOne {\r\n\r\n  protected $b = 10;\r\n\r\n  public function changeValue($b) {\r\n    $this->b = 10;\r\n    parent::changeValue($this->a + $this->b);\r\n  }\r\n\r\n  public function displayValues() {\r\n    print "a: {$this->a}, b: {$this->b}\\n";\r\n  }\r\n}\r\n\r\n$obj = new ClassTwo();\r\n\r\n$obj->changeValue(20);\r\n$obj->changeValue(10);\r\n\r\n$obj->displayValues();\r\n\r\n?>', 1, 1),
	(25, 'The ______ keyword is used to indicate an incomplete class or method, which must be further extended and/or implemented in order to be used.', '', 1, 1);
/*!40000 ALTER TABLE `quiz_questions` ENABLE KEYS */;


-- Dump della struttura di tabella quiz.quiz_topics
CREATE TABLE IF NOT EXISTS `quiz_topics` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) DEFAULT NULL,
  `description` varchar(80) DEFAULT NULL,
  `parent_id` bigint(20) DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `parent_id` (`parent_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

-- Dump dei dati della tabella quiz.quiz_topics: ~4 rows (circa)
/*!40000 ALTER TABLE `quiz_topics` DISABLE KEYS */;
INSERT INTO `quiz_topics` (`id`, `name`, `description`, `parent_id`) VALUES
	(1, 'PHP (generic)', NULL, 0),
	(2, 'Array', NULL, 0),
	(3, 'OOP', NULL, 0),
	(4, 'Database', NULL, 0);
/*!40000 ALTER TABLE `quiz_topics` ENABLE KEYS */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
