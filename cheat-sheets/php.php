<?php

/**
 * Figure out how to write better docblock & a function docblock
 * classes and functions with versions, since, params and all that properl
 * same for classes and loops?
 */

// Special data types
$null = null;
$resource = mysqli_connect('localhost', 'root', 'pass', 'db');

/**
 * Constants
 * Can be booleans, strings, numbers, html or whatever you like. There are 2 formats
 */
const SOMETHING = 'something';
define('SOMETHING', 'something');

/**
 * Loop syntax
 */
for ( $i = 0; $i < 10; $i++ ) {
    // statement here
}

foreach ( $array as $key => $value ) {
    // statement here
}

do {
    // code...
} while ($a <= 10);

switch ( $expression ) {
	case 0:
		// do things
		break;
	case 1:
		// do things
		break;
	case 3:
		// do things
		break;
	default:
		// do something
}

break; // break out of current for, foreach, while, do-while or switch structure
continue; // Halts current loop but continues to next iteration
continue 2; // breaks out of nested loops

/**
 * Objects
 */
class className extends existingClass {

	var $variablename = 'value';

	function functionName() {
		// do stuff
	}
}

$obj = new className;
$obj->variablename;
$obj->functionName();


/**
 * Arithmetic Operators
 */
+$a; # converts $a to int or float as appropriate
-$a; # opposite of $a

/**
 * Array Operators
 */
$a + $b; # union of $a and $b
$a == $b; # true if $a and $b have the same key/value pairs
$a === $b; # true if $a and $b have the same key/value pairs in the same order and of the same types
$a != $b; # True if $a not equal to $b
$a <> $b; # True if $a not equal to $b

/**
 * Assignment Operators
 */
$a += $b; # $a = $a + $b
$a -= $b; # $a = $a - $b
$a *= $b; # $a = $a * $b
$a /= $b; # $a = $a / $b
$a %= $b; # $a = $a % $b

/**
 * Comparison Operators
 */
$a == $b; # True if $a = $b after type juggling
$a != $b; # True if $a and $b are not equal after type juggling
$a <> $b; # True if $a and $b are not equal after type juggling
$a === $b; # True if $a = $b and are same type
$a !== $b; # True if $a and $b are not equal or not of same type
$a <=> $b; # An integer less than, equal to or greeater than 0 when $a is respectively less than, equal to or greeater than $b (PHP 7)

/**
 * Increment & Decrement Operators
 */
++$a; # Increment $a by 1 then return $a
$a++; # Returns $a then increments $a by 1
--$a; # Decrements $a by 1 then return $a
$a--; # Returns $a then decrements $a by 1

/**
 * Logical Operators
 */
$a and $b; # true if $a and $b are both true
$a && $b; # true if $a and $b are both true
$a or $b; # true if eithrr $a or $b are true
$a || $b; # true if either $a or $b are true
$a xor $b; # true if either $a or $b is true, but not both
