--TEST--
Bug #12165  Dot at the end of the line disappeared
--SKIPIF--
--FILE--
<?php
require_once "Mail/Mime2.php";
$string='http://aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa.com';
$mime = new Mail_Mime2();
$mime->setHTMLBody($string);
print_r($mime->get());
    
--EXPECT--
http://aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa=
=2Ecom
