--TEST--
Bug #13962  Multiple header support
--SKIPIF--
--FILE--
<?php
require_once 'Mail/Mime2.php';

$mime = new Mail_Mime2();

$mime->setFrom('user@from.example.com');
$r = $mime->txtHeaders(array('Received' => array('Received 1', 'Received 2')));

print_r($r); 
?>
--EXPECT--
Received: Received 1
Received: Received 2
MIME-Version: 1.0
From: user@from.example.com
