--TEST--
Test str_repeat() function	
--INI--
precision=14
--FILE--
<?php
/* Prototype: string str_repeat ( string $input, int $multiplier );
   Description: Returns input repeated multiplier times. multiplier has to be 
     greater than or equal to 0. If the multiplier is set to 0, the function 
     will return an empty string. 
*/

echo "*** Testing str_repeat() with possible strings ***";
$variations = array(
  'a',
  'foo',
  'barbazbax',
  "\x00",
  '\0', 
  NULL, 
  TRUE,
  4,
  1.23,
  "",
  " "
);

/* variations in string and multiplier as an integer */
foreach($variations as $input) {
  echo "\n--- str_repeat() of '$input' ---\n" ;
  for($n=0; $n<4; $n++) {
    echo "-- after repeating $n times is => ";
    echo str_repeat($input, $n)."\n";
  }
}

/* variations in multiplier as well as string to be repeated. Same variant 
   values are used as string to be repeated as well as multiplier */
echo "\n\n*** Testing str_repeat() with various strings & multiplier value ***";
foreach ( $variations as $input ) {
  echo "\n--- str_repeat() of '$input' ---\n" ;
  foreach ( $variations as $multiplier ) {
    echo "-- after repeating '$multiplier' times is => ";
    var_dump( str_repeat($input, $multiplier) );
  }
}


echo "\n*** Testing str_repeat() with complex strings containing 
       other than 7-bit chars ***\n";
$str = chr(0).chr(128).chr(129).chr(234).chr(235).chr(254).chr(255);
var_dump(str_repeat($str, chr(51)));  // ASCII value of '3' given
var_dump(str_repeat($str, 3));


echo "\n\n*** Testing error conditions ***";
var_dump( str_repeat() );  // Zero args
var_dump( str_repeat($input[0]) );  // args < expected
var_dump( str_repeat($input[0], 3, 4) );  // args > expected
var_dump( str_repeat($input[0], -1) );  // Invalid arg for multiplier

echo "Done\n";
?>
--EXPECTF--
*** Testing str_repeat() with possible strings ***
--- str_repeat() of 'a' ---
-- after repeating 0 times is => 
-- after repeating 1 times is => a
-- after repeating 2 times is => aa
-- after repeating 3 times is => aaa

--- str_repeat() of 'foo' ---
-- after repeating 0 times is => 
-- after repeating 1 times is => foo
-- after repeating 2 times is => foofoo
-- after repeating 3 times is => foofoofoo

--- str_repeat() of 'barbazbax' ---
-- after repeating 0 times is => 
-- after repeating 1 times is => barbazbax
-- after repeating 2 times is => barbazbaxbarbazbax
-- after repeating 3 times is => barbazbaxbarbazbaxbarbazbax

--- str_repeat() of ' ' ---
-- after repeating 0 times is => 
-- after repeating 1 times is =>  
-- after repeating 2 times is =>   
-- after repeating 3 times is =>    

--- str_repeat() of '\0' ---
-- after repeating 0 times is => 
-- after repeating 1 times is => \0
-- after repeating 2 times is => \0\0
-- after repeating 3 times is => \0\0\0

--- str_repeat() of '' ---
-- after repeating 0 times is => 
-- after repeating 1 times is => 
-- after repeating 2 times is => 
-- after repeating 3 times is => 

--- str_repeat() of '1' ---
-- after repeating 0 times is => 
-- after repeating 1 times is => 1
-- after repeating 2 times is => 11
-- after repeating 3 times is => 111

--- str_repeat() of '4' ---
-- after repeating 0 times is => 
-- after repeating 1 times is => 4
-- after repeating 2 times is => 44
-- after repeating 3 times is => 444

--- str_repeat() of '1.23' ---
-- after repeating 0 times is => 
-- after repeating 1 times is => 1.23
-- after repeating 2 times is => 1.231.23
-- after repeating 3 times is => 1.231.231.23

--- str_repeat() of '' ---
-- after repeating 0 times is => 
-- after repeating 1 times is => 
-- after repeating 2 times is => 
-- after repeating 3 times is => 

--- str_repeat() of ' ' ---
-- after repeating 0 times is => 
-- after repeating 1 times is =>  
-- after repeating 2 times is =>   
-- after repeating 3 times is =>    


*** Testing str_repeat() with various strings & multiplier value ***
--- str_repeat() of 'a' ---
-- after repeating 'a' times is => 
Warning: str_repeat() expects parameter 2 to be integer, string given in %s on line %d
NULL
-- after repeating 'foo' times is => 
Warning: str_repeat() expects parameter 2 to be integer, string given in %s on line %d
NULL
-- after repeating 'barbazbax' times is => 
Warning: str_repeat() expects parameter 2 to be integer, string given in %s on line %d
NULL
-- after repeating ' ' times is => 
Warning: str_repeat() expects parameter 2 to be integer, string given in %s on line %d
NULL
-- after repeating '\0' times is => 
Warning: str_repeat() expects parameter 2 to be integer, string given in %s on line %d
NULL
-- after repeating '' times is => string(0) ""
-- after repeating '1' times is => string(1) "a"
-- after repeating '4' times is => string(4) "aaaa"
-- after repeating '1.23' times is => string(1) "a"
-- after repeating '' times is => 
Warning: str_repeat() expects parameter 2 to be integer, string given in %s on line %d
NULL
-- after repeating ' ' times is => 
Warning: str_repeat() expects parameter 2 to be integer, string given in %s on line %d
NULL

--- str_repeat() of 'foo' ---
-- after repeating 'a' times is => 
Warning: str_repeat() expects parameter 2 to be integer, string given in %s on line %d
NULL
-- after repeating 'foo' times is => 
Warning: str_repeat() expects parameter 2 to be integer, string given in %s on line %d
NULL
-- after repeating 'barbazbax' times is => 
Warning: str_repeat() expects parameter 2 to be integer, string given in %s on line %d
NULL
-- after repeating ' ' times is => 
Warning: str_repeat() expects parameter 2 to be integer, string given in %s on line %d
NULL
-- after repeating '\0' times is => 
Warning: str_repeat() expects parameter 2 to be integer, string given in %s on line %d
NULL
-- after repeating '' times is => string(0) ""
-- after repeating '1' times is => string(3) "foo"
-- after repeating '4' times is => string(12) "foofoofoofoo"
-- after repeating '1.23' times is => string(3) "foo"
-- after repeating '' times is => 
Warning: str_repeat() expects parameter 2 to be integer, string given in %s on line %d
NULL
-- after repeating ' ' times is => 
Warning: str_repeat() expects parameter 2 to be integer, string given in %s on line %d
NULL

--- str_repeat() of 'barbazbax' ---
-- after repeating 'a' times is => 
Warning: str_repeat() expects parameter 2 to be integer, string given in %s on line %d
NULL
-- after repeating 'foo' times is => 
Warning: str_repeat() expects parameter 2 to be integer, string given in %s on line %d
NULL
-- after repeating 'barbazbax' times is => 
Warning: str_repeat() expects parameter 2 to be integer, string given in %s on line %d
NULL
-- after repeating ' ' times is => 
Warning: str_repeat() expects parameter 2 to be integer, string given in %s on line %d
NULL
-- after repeating '\0' times is => 
Warning: str_repeat() expects parameter 2 to be integer, string given in %s on line %d
NULL
-- after repeating '' times is => string(0) ""
-- after repeating '1' times is => string(9) "barbazbax"
-- after repeating '4' times is => string(36) "barbazbaxbarbazbaxbarbazbaxbarbazbax"
-- after repeating '1.23' times is => string(9) "barbazbax"
-- after repeating '' times is => 
Warning: str_repeat() expects parameter 2 to be integer, string given in %s on line %d
NULL
-- after repeating ' ' times is => 
Warning: str_repeat() expects parameter 2 to be integer, string given in %s on line %d
NULL

--- str_repeat() of ' ' ---
-- after repeating 'a' times is => 
Warning: str_repeat() expects parameter 2 to be integer, string given in %s on line %d
NULL
-- after repeating 'foo' times is => 
Warning: str_repeat() expects parameter 2 to be integer, string given in %s on line %d
NULL
-- after repeating 'barbazbax' times is => 
Warning: str_repeat() expects parameter 2 to be integer, string given in %s on line %d
NULL
-- after repeating ' ' times is => 
Warning: str_repeat() expects parameter 2 to be integer, string given in %s on line %d
NULL
-- after repeating '\0' times is => 
Warning: str_repeat() expects parameter 2 to be integer, string given in %s on line %d
NULL
-- after repeating '' times is => string(0) ""
-- after repeating '1' times is => string(1) " "
-- after repeating '4' times is => string(4) "    "
-- after repeating '1.23' times is => string(1) " "
-- after repeating '' times is => 
Warning: str_repeat() expects parameter 2 to be integer, string given in %s on line %d
NULL
-- after repeating ' ' times is => 
Warning: str_repeat() expects parameter 2 to be integer, string given in %s on line %d
NULL

--- str_repeat() of '\0' ---
-- after repeating 'a' times is => 
Warning: str_repeat() expects parameter 2 to be integer, string given in %s on line %d
NULL
-- after repeating 'foo' times is => 
Warning: str_repeat() expects parameter 2 to be integer, string given in %s on line %d
NULL
-- after repeating 'barbazbax' times is => 
Warning: str_repeat() expects parameter 2 to be integer, string given in %s on line %d
NULL
-- after repeating ' ' times is => 
Warning: str_repeat() expects parameter 2 to be integer, string given in %s on line %d
NULL
-- after repeating '\0' times is => 
Warning: str_repeat() expects parameter 2 to be integer, string given in %s on line %d
NULL
-- after repeating '' times is => string(0) ""
-- after repeating '1' times is => string(2) "\0"
-- after repeating '4' times is => string(8) "\0\0\0\0"
-- after repeating '1.23' times is => string(2) "\0"
-- after repeating '' times is => 
Warning: str_repeat() expects parameter 2 to be integer, string given in %s on line %d
NULL
-- after repeating ' ' times is => 
Warning: str_repeat() expects parameter 2 to be integer, string given in %s on line %d
NULL

--- str_repeat() of '' ---
-- after repeating 'a' times is => 
Warning: str_repeat() expects parameter 2 to be integer, string given in %s on line %d
NULL
-- after repeating 'foo' times is => 
Warning: str_repeat() expects parameter 2 to be integer, string given in %s on line %d
NULL
-- after repeating 'barbazbax' times is => 
Warning: str_repeat() expects parameter 2 to be integer, string given in %s on line %d
NULL
-- after repeating ' ' times is => 
Warning: str_repeat() expects parameter 2 to be integer, string given in %s on line %d
NULL
-- after repeating '\0' times is => 
Warning: str_repeat() expects parameter 2 to be integer, string given in %s on line %d
NULL
-- after repeating '' times is => string(0) ""
-- after repeating '1' times is => string(0) ""
-- after repeating '4' times is => string(0) ""
-- after repeating '1.23' times is => string(0) ""
-- after repeating '' times is => 
Warning: str_repeat() expects parameter 2 to be integer, string given in %s on line %d
NULL
-- after repeating ' ' times is => 
Warning: str_repeat() expects parameter 2 to be integer, string given in %s on line %d
NULL

--- str_repeat() of '1' ---
-- after repeating 'a' times is => 
Warning: str_repeat() expects parameter 2 to be integer, string given in %s on line %d
NULL
-- after repeating 'foo' times is => 
Warning: str_repeat() expects parameter 2 to be integer, string given in %s on line %d
NULL
-- after repeating 'barbazbax' times is => 
Warning: str_repeat() expects parameter 2 to be integer, string given in %s on line %d
NULL
-- after repeating ' ' times is => 
Warning: str_repeat() expects parameter 2 to be integer, string given in %s on line %d
NULL
-- after repeating '\0' times is => 
Warning: str_repeat() expects parameter 2 to be integer, string given in %s on line %d
NULL
-- after repeating '' times is => string(0) ""
-- after repeating '1' times is => string(1) "1"
-- after repeating '4' times is => string(4) "1111"
-- after repeating '1.23' times is => string(1) "1"
-- after repeating '' times is => 
Warning: str_repeat() expects parameter 2 to be integer, string given in %s on line %d
NULL
-- after repeating ' ' times is => 
Warning: str_repeat() expects parameter 2 to be integer, string given in %s on line %d
NULL

--- str_repeat() of '4' ---
-- after repeating 'a' times is => 
Warning: str_repeat() expects parameter 2 to be integer, string given in %s on line %d
NULL
-- after repeating 'foo' times is => 
Warning: str_repeat() expects parameter 2 to be integer, string given in %s on line %d
NULL
-- after repeating 'barbazbax' times is => 
Warning: str_repeat() expects parameter 2 to be integer, string given in %s on line %d
NULL
-- after repeating ' ' times is => 
Warning: str_repeat() expects parameter 2 to be integer, string given in %s on line %d
NULL
-- after repeating '\0' times is => 
Warning: str_repeat() expects parameter 2 to be integer, string given in %s on line %d
NULL
-- after repeating '' times is => string(0) ""
-- after repeating '1' times is => string(1) "4"
-- after repeating '4' times is => string(4) "4444"
-- after repeating '1.23' times is => string(1) "4"
-- after repeating '' times is => 
Warning: str_repeat() expects parameter 2 to be integer, string given in %s on line %d
NULL
-- after repeating ' ' times is => 
Warning: str_repeat() expects parameter 2 to be integer, string given in %s on line %d
NULL

--- str_repeat() of '1.23' ---
-- after repeating 'a' times is => 
Warning: str_repeat() expects parameter 2 to be integer, string given in %s on line %d
NULL
-- after repeating 'foo' times is => 
Warning: str_repeat() expects parameter 2 to be integer, string given in %s on line %d
NULL
-- after repeating 'barbazbax' times is => 
Warning: str_repeat() expects parameter 2 to be integer, string given in %s on line %d
NULL
-- after repeating ' ' times is => 
Warning: str_repeat() expects parameter 2 to be integer, string given in %s on line %d
NULL
-- after repeating '\0' times is => 
Warning: str_repeat() expects parameter 2 to be integer, string given in %s on line %d
NULL
-- after repeating '' times is => string(0) ""
-- after repeating '1' times is => string(4) "1.23"
-- after repeating '4' times is => string(16) "1.231.231.231.23"
-- after repeating '1.23' times is => string(4) "1.23"
-- after repeating '' times is => 
Warning: str_repeat() expects parameter 2 to be integer, string given in %s on line %d
NULL
-- after repeating ' ' times is => 
Warning: str_repeat() expects parameter 2 to be integer, string given in %s on line %d
NULL

--- str_repeat() of '' ---
-- after repeating 'a' times is => 
Warning: str_repeat() expects parameter 2 to be integer, string given in %s on line %d
NULL
-- after repeating 'foo' times is => 
Warning: str_repeat() expects parameter 2 to be integer, string given in %s on line %d
NULL
-- after repeating 'barbazbax' times is => 
Warning: str_repeat() expects parameter 2 to be integer, string given in %s on line %d
NULL
-- after repeating ' ' times is => 
Warning: str_repeat() expects parameter 2 to be integer, string given in %s on line %d
NULL
-- after repeating '\0' times is => 
Warning: str_repeat() expects parameter 2 to be integer, string given in %s on line %d
NULL
-- after repeating '' times is => string(0) ""
-- after repeating '1' times is => string(0) ""
-- after repeating '4' times is => string(0) ""
-- after repeating '1.23' times is => string(0) ""
-- after repeating '' times is => 
Warning: str_repeat() expects parameter 2 to be integer, string given in %s on line %d
NULL
-- after repeating ' ' times is => 
Warning: str_repeat() expects parameter 2 to be integer, string given in %s on line %d
NULL

--- str_repeat() of ' ' ---
-- after repeating 'a' times is => 
Warning: str_repeat() expects parameter 2 to be integer, string given in %s on line %d
NULL
-- after repeating 'foo' times is => 
Warning: str_repeat() expects parameter 2 to be integer, string given in %s on line %d
NULL
-- after repeating 'barbazbax' times is => 
Warning: str_repeat() expects parameter 2 to be integer, string given in %s on line %d
NULL
-- after repeating ' ' times is => 
Warning: str_repeat() expects parameter 2 to be integer, string given in %s on line %d
NULL
-- after repeating '\0' times is => 
Warning: str_repeat() expects parameter 2 to be integer, string given in %s on line %d
NULL
-- after repeating '' times is => string(0) ""
-- after repeating '1' times is => string(1) " "
-- after repeating '4' times is => string(4) "    "
-- after repeating '1.23' times is => string(1) " "
-- after repeating '' times is => 
Warning: str_repeat() expects parameter 2 to be integer, string given in %s on line %d
NULL
-- after repeating ' ' times is => 
Warning: str_repeat() expects parameter 2 to be integer, string given in %s on line %d
NULL

*** Testing str_repeat() with complex strings containing 
       other than 7-bit chars ***
string(21) " ������ ������ ������"
string(21) " ������ ������ ������"


*** Testing error conditions ***
Warning: str_repeat() expects exactly 2 parameters, 0 given in %s on line %d
NULL

Warning: str_repeat() expects exactly 2 parameters, 1 given in %s on line %d
NULL

Warning: str_repeat() expects exactly 2 parameters, 3 given in %s on line %d
NULL

Warning: str_repeat(): Second argument has to be greater than or equal to 0 in %s on line %d
NULL
Done
