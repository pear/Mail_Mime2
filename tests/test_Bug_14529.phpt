--TEST--
Bug #14529  basename() workaround
--SKIPIF--
--FILE--
<?php
include "Mail/Mime2.php";
$m = new Mail_Mime2;
// some text with polish Unicode letter at the beginning
$filename = base64_decode("xZtjaWVtYQ==");
$m->addAttachment('testfile', "text/plain", $filename, FALSE, 'base64', 'attachment', 'ISO-8859-1');
$msg = $m->get();

if (strpos($msg, "filename*=ISO-8859-1''%C5%9Bciema;")) {
    echo "OK";
}
?>
--EXPECT--
OK
