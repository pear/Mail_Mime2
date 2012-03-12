--TEST--
Bug #9722   Quoted-printable does not encode dot at start of line on Windows platform
--SKIPIF--
--FILE--
<?php
require_once  "Mail/MimePart2.php";
$text = "This
is a
test
...
    It is 
//really fun//
to make :(";

$part = new Mail_MimePart2($text, array(
    'eol'=>"\n",
    'encoding' => 'quoted-printable'
));

$msg = $part->encode();
print_r($msg['body']);

--EXPECT--
This
is a
test
=2E..
    It is=20
//really fun//
to make :(
