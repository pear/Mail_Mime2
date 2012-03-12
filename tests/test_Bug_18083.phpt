--TEST--
Bug #18083  Separate charset for attachment's content and headers
--SKIPIF--
--FILE--
<?php
include "Mail/MimePart2.php";

$part = new Mail_MimePart2('', array(
    'content-type' => 'text/plain',
    'filename' => base64_decode("xZtjaWVtYQ=="),
    'disposition' => 'attachment',
    'headers_charset' => 'UTF-8',
    'charset' => 'ISO-8859-1',
    'name_encoding' => 'quoted-printable',
    'filename_encoding' => 'base64',
));
$msg = $part->encode();

echo $msg['headers']['Content-Type'];
echo "\n";
echo $msg['headers']['Content-Disposition'];

?>
--EXPECT--
text/plain; charset=ISO-8859-1;
 name="=?UTF-8?Q?=C5=9Bciema?="
attachment;
 filename="=?UTF-8?B?xZtjaWVtYQ==?="
