--TEST--
Bug #16539  Headers longer than 998 characters
--SKIPIF--
--FILE--
<?php
require_once "Mail/Mime2.php";

$headers['From'] = 'aaaaaaaaaabbbbbbbbbbccccccccccddddddddddeeeeeeeeeeffffffffffgggggggggghhhhhhhhhh';
# over than 76 chars
$mime = new Mail_Mime2();
$hdrs = $mime->headers($headers);
print_r($hdrs['From']); 
?>
--EXPECT--
aaaaaaaaaabbbbbbbbbbccccccccccddddddddddeeeeeeeeeeffffffffffgggggggggghhhhhhhhhh
