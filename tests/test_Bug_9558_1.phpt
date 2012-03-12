--TEST--
Bug #9558   Broken multiline headers
--SKIPIF--
--FILE--
<?php
require_once "Mail/MimePart2.php";

$input = "received by me
    at some point
    from some server";

$encoded = Mail_MimePart2::encodeHeader('', $input);
echo $encoded;
--EXPECT--
received by me
    at some point
    from some server
