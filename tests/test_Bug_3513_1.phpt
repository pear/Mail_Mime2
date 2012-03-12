--TEST--
Bug #3513   Support of RFC2231 in header fields. (ISO-8859-1)
--SKIPIF--
--FILE--
<?php
$test = "Fóóbær.txt";
require_once 'Mail/MimePart2.php';

$part = new Mail_MimePart2('', array(
    'content-type' => 'text/plain',
    'filename' => $test,
    'disposition' => 'attachment',
    'headers_charset' => 'ISO-8859-1',
));

$msg = $part->encode();
print $msg['headers']['Content-Disposition'];

--EXPECT--
attachment;
 filename*=ISO-8859-1''F%F3%F3b%E6r.txt
