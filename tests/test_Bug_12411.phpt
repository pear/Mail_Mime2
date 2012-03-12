--TEST--
Bug #12411  RFC2047 encoded attachment filenames
--SKIPIF--
--FILE--
<?php
include "Mail/MimePart2.php";

// some text with polish Unicode letter at the beginning
$filename = base64_decode("xZtjaWVtYQ==");
/*
$m->addAttachment('testfile', "text/plain", $filename, FALSE,
    'base64', 'attachment', 'ISO-8859-1', 'pl', '',
    'quoted-printable', 'base64');
*/
$part = new Mail_MimePart2('', array(
    'filename' => $filename,
    'disposition' => 'attachment',
    'charset' => 'ISO-8859-1',
    'name_encoding' => 'quoted-printable',
    'filename_encoding' => 'base64'
));

$msg = $part->encode();
echo $msg['headers']['Content-Type'];
echo "\n";
echo $msg['headers']['Content-Disposition'];
?>
--EXPECT--
text/plain; charset=ISO-8859-1;
 name="=?ISO-8859-1?Q?=C5=9Bciema?="
attachment;
 filename="=?ISO-8859-1?B?xZtjaWVtYQ==?="
