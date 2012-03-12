--TEST--
Bug #3513   Support of RFC2231 in header fields. (UTF-8)
--SKIPIF--
--FILE--
<?php
$test = "Süper gröse tolle tolle grüße.txt";
require_once 'Mail/MimePart2.php';

$part = new Mail_MimePart2('', array(
    'content-type' => 'text/plain',
    'filename' => $test,
    'disposition' => 'attachment',
    'headers_charset' => 'UTF-8',
    'language' => 'de'
));
$msg = $part->encode();
print $msg['headers']['Content-Disposition'];

--EXPECT--
attachment;
 filename*0*=UTF-8'de'S%C3%BCper%20gr%C3%B6se%20tolle%20tolle%20gr%C3%BC;
 filename*1*=%C3%9Fe.txt
