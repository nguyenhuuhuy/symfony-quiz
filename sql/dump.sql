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
) ENGINE=InnoDB AUTO_INCREMENT=41 DEFAULT CHARSET=latin1;

-- Dump dei dati della tabella quiz.quiz_answers: ~40 rows (circa)
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
	(40, 'function myfunction(Object $a)', '0', 8);
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
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

-- Dump dei dati della tabella quiz.quiz_questions: ~10 rows (circa)
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
	(10, 'The ____ operator is used to test if two values are identical in every way.', NULL, 1, 1);
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
