--TEST--
Bug #9558   Broken multiline headers
--SKIPIF--
--FILE--
<?php
require_once "Mail/Mime2.php";

$encoder = new Mail_Mime2();
$input[] = "received by me
    at some point
    from some server";

$encoded = $encoder->_encodeHeaders($input, array('head_encoding' => 'quoted-printable'));
print_r($encoded);
--EXPECT--
Array
(
    [0] => received by me
    at some point
    from some server
)
