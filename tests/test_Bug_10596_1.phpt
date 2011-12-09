--TEST--
Bug #10596  Incorrect handling of text and html '0' bodies
--SKIPIF--
--FILE--
<?php
require_once "Mail/Mime2.php";
$mime = new Mail_Mime2();
$mime->setTxtBody('0');
$mime->setHTMLBody('0');
$body = $mime->get();
if ($body){
    print("OK");
}else{
    print("NO BODY FOUND");
}
--EXPECT--
OK
