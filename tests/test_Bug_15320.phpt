--TEST--
Bug #15320  Charset parameter in Content-Type of mail parts
--SKIPIF--
--FILE--
<?php
require_once "Mail/MimePart2.php";

$part = new Mail_MimePart2('', array(
    'disposition' => 'attachment',
    'charset' => 'ISO-8859-1',
    'filename' => 'file.txt',
));

$msg = $part->encode();
echo $msg['headers']['Content-Type'];
?>
--EXPECT--
text/plain; charset=ISO-8859-1;
 name=file.txt

