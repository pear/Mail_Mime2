--TEST--
Bug #3513   Support of RFC2231 in header fields. (ISO-2022-JP)
--SKIPIF--
--FILE--
<?php
mb_internal_encoding('ISO-2022-JP');
$testEncoded="GyRCRnxLXDhsGyhCLnR4dA==";
$test = base64_decode($testEncoded); // Japanese filename in ISO-2022-JP charset.

require_once 'Mail/MimePart2.php';

$part = new Mail_MimePart2('', array(
    'content-type' => 'text/plain',
    'filename' => $test,
    'disposition' => 'attachment',
    'headers_charset' => 'iso-2022-jp',

));

$msg = $part->encode();
print $msg['headers']['Content-Disposition'];

?>
--EXPECT--
attachment;
 filename*=iso-2022-jp''%1B$BF|K%5C8l%1B%28B.txt

