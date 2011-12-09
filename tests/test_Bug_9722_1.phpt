--TEST--
Bug #9722   _quotedPrintableEncode does not encode dot at start of line on Windows platform
--SKIPIF--
--FILE--
<?php
require_once  "Mail/MimePart2.php.";
$part = new Mail_MimePart2('', array('eol'=>"\n"));
$text = "This
is a
test
...
    It is 
//really fun//
to make :(";

print_r($part->_quotedPrintableEncode($text));

--EXPECT--
This
is a
test
=2E..
    It is=20
//really fun//
to make :(
