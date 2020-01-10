<?php
/**
 * Cheat sheet: PHP operators
 */

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
