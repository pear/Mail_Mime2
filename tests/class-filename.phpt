--TEST--
Test class filename (bug #24)
--SKIPIF--
<?php
echo "skip This will be broken until Mail_Mime2";
?>
--FILE--
<?php
require_once 'Mail/Mime2.php';
echo class_exists('Mail_Mime2') ? 'Include OK' : 'Include failed';
?>
--EXPECT--
Include OK
