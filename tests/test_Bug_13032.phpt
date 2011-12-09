--TEST--
Bug #13032  Proper (different) boundary for nested parts
--SKIPIF--
--FILE--
<?php
require_once "Mail/Mime2.php";
$mime = new Mail_Mime2("\r\n");
$mime->setHTMLBody('html');
$mime->setTXTBody('text');
$mime->addAttachment('file.pdf', 'application/pdf', 'file.pdf', false, 'base64', 'inline');
$msg = $mime->getMessage();

if (preg_match_all('/boundary="([^"]+)"/', $msg, $matches)) {
    if (count($matches) == 2 && count($matches[1]) == 2 &&
        $matches[1][0] != $matches[1][1]) {
            print('OK');
    }
}
?>
--EXPECT--
OK
