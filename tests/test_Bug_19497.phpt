--TEST--
Bug #19497  Attachment filenames with a slash character
--SKIPIF--
--FILE--
<?php

include "Mail/MimePart2.php";

$part = new Mail_MimePart2('', array(
    'content-type' => 'text/plain',
    'filename' => "test/file.txt",
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
 name="test/file.txt"
attachment;
 filename="test/file.txt"
