--TEST--
Bug #16539  Headers longer than 998 characters
--SKIPIF--
--FILE--
<?php
require_once "Mail/Mime2.php";
$mime = new Mail_Mime2();

$headers = array(
array('To', 'jskibbie@schawk.com,jskibbie@schawk.com,jskibbie@schawk.com,jskibbie@schawk.com,jskibbie@schawk.com,jskibbie@schawk.com,jskibbie@schawk.com,jskibbie@schawk.com,jskibbie@schawk.com,jskibbie@schawk.com,jskibbie@schawk.com,jskibbie@schawk.com,jskibbie@schawk.com,jskibbie@schawk.com,jskibbie@schawk.com,jskibbie@schawk.com,jskibbie@schawk.com,jskibbie@schawk.com,jskibbie@schawk.com,jskibbie@schawk.com,jskibbie@schawk.com,jskibbie@schawk.com,jskibbie@schawk.com,jskibbie@schawk.com,jskibbie@schawk.com,jskibbie@schawk.com,jskibbie@schawk.com,jskibbie@schawk.com,jskibbie@schawk.com,jskibbie@schawk.com,jskibbie@schawk.com,jskibbie@schawk.com,jskibbie@schawk.com,jskibbie@schawk.com,jskibbie@schawk.com,jskibbie@schawk.com,jskibbie@schawk.com,jskibbie@schawk.com,jskibbie@schawk.com,jskibbie@schawk.com,jskibbie@schawk.com,jskibbie@schawk.com,jskibbie@schawk.com,jskibbie@schawk.com,jskibbie@schawk.com,jskibbie@schawk.com,jskibbie@schawk.com,jskibbie@schawk.com,jskibbie@schawk.com,jskibbie@schawk.com,jskibbie@schawk.com,jskibbie@schawk.com,jskibbie@schawk.com,jskibbie@schawk.com,jskibbie@schawk.com,jskibbie@schawk.com,jskibbie@schawk.com,jskibbie@schawk.com,jskibbie@schawk.com,jskibbie@schawk.com,jskibbie@schawk.com,jskibbie@schawk.com,jskibbie@schawk.com,jskibbie@schawk.com,jskibbie@schawk.com,jskibbie@schawk.com,jskibbie@schawk.com,jskibbie@schawk.com,jskibbie@schawk.com,jskibbie@schawk.com,jskibbie@schawk.com,jskibbie@schawk.com,jskibbie@schawk.com,jskibbie@schawk.com,jskibbie@schawk.com,jskibbie@schawk.com,jskibbie@schawk.com,jskibbie@schawk.com,jskibbie@schawk.com,jskibbie@schawk.com,jskibbie@schawk.com,jskibbie@schawk.com,jskibbie@schawk.com,jskibbie@schawk.com,jskibbie@schawk.com,jskibbie@schawk.com,jskibbie@schawk.com,jskibbie@schawk.com,jskibbie@schawk.com'),
array('Subject', 'jskibbie@schawk.com,jskibbie@schawk.com,jskibbie@schawk.com,jskibbie@schawk.com,jskibbie@schawk.com,jskibbie@schawk.com,jskibbie@schawk.com,jskibbie@schawk.com,jskibbie@schawk.com,jskibbie@schawk.com,jskibbie@schawk.com,jskibbie@schawk.com,jskibbie@schawk.com,jskibbie@schawk.com,jskibbie@schawk.com,jskibbie@schawk.com,jskibbie@schawk.com,jskibbie@schawk.com,jskibbie@schawk.com,jskibbie@schawk.com,jskibbie@schawk.com,jskibbie@schawk.com,jskibbie@schawk.com,jskibbie@schawk.com,jskibbie@schawk.com,jskibbie@schawk.com,jskibbie@schawk.com,jskibbie@schawk.com,jskibbie@schawk.com,jskibbie@schawk.com,jskibbie@schawk.com,jskibbie@schawk.com,jskibbie@schawk.com,jskibbie@schawk.com,jskibbie@schawk.com,jskibbie@schawk.com,jskibbie@schawk.com,jskibbie@schawk.com,jskibbie@schawk.com,jskibbie@schawk.com,jskibbie@schawk.com,jskibbie@schawk.com,jskibbie@schawk.com,jskibbie@schawk.com,jskibbie@schawk.com,jskibbie@schawk.com,jskibbie@schawk.com,jskibbie@schawk.com,jskibbie@schawk.com,jskibbie@schawk.com,jskibbie@schawk.com,jskibbie@schawk.com,jskibbie@schawk.com,jskibbie@schawk.com,jskibbie@schawk.com,jskibbie@schawk.com,jskibbie@schawk.com,jskibbie@schawk.com,jskibbie@schawk.com,jskibbie@schawk.com,jskibbie@schawk.com,jskibbie@schawk.com,jskibbie@schawk.com,jskibbie@schawk.com,jskibbie@schawk.com,jskibbie@schawk.com,jskibbie@schawk.com,jskibbie@schawk.com,jskibbie@schawk.com,jskibbie@schawk.com,jskibbie@schawk.com,jskibbie@schawk.com,jskibbie@schawk.com,jskibbie@schawk.com,jskibbie@schawk.com,jskibbie@schawk.com,jskibbie@schawk.com,jskibbie@schawk.com,jskibbie@schawk.com,jskibbie@schawk.com,jskibbie@schawk.com,jskibbie@schawk.com,jskibbie@schawk.com,jskibbie@schawk.com,jskibbie@schawk.com,jskibbie@schawk.com,jskibbie@schawk.com,jskibbie@schawk.com,jskibbie@schawk.com'),
);

foreach ($headers as $header) {
    $hdrs = $mime->_encodeHeaders(array($header[0] => $header[1]));
    print($hdrs[$header[0]]."\n");
}
?>
--EXPECT--
jskibbie@schawk.com, jskibbie@schawk.com, jskibbie@schawk.com,
 jskibbie@schawk.com, jskibbie@schawk.com, jskibbie@schawk.com,
 jskibbie@schawk.com, jskibbie@schawk.com, jskibbie@schawk.com,
 jskibbie@schawk.com, jskibbie@schawk.com, jskibbie@schawk.com,
 jskibbie@schawk.com, jskibbie@schawk.com, jskibbie@schawk.com,
 jskibbie@schawk.com, jskibbie@schawk.com, jskibbie@schawk.com,
 jskibbie@schawk.com, jskibbie@schawk.com, jskibbie@schawk.com,
 jskibbie@schawk.com, jskibbie@schawk.com, jskibbie@schawk.com,
 jskibbie@schawk.com, jskibbie@schawk.com, jskibbie@schawk.com,
 jskibbie@schawk.com, jskibbie@schawk.com, jskibbie@schawk.com,
 jskibbie@schawk.com, jskibbie@schawk.com, jskibbie@schawk.com,
 jskibbie@schawk.com, jskibbie@schawk.com, jskibbie@schawk.com,
 jskibbie@schawk.com, jskibbie@schawk.com, jskibbie@schawk.com,
 jskibbie@schawk.com, jskibbie@schawk.com, jskibbie@schawk.com,
 jskibbie@schawk.com, jskibbie@schawk.com, jskibbie@schawk.com,
 jskibbie@schawk.com, jskibbie@schawk.com, jskibbie@schawk.com,
 jskibbie@schawk.com, jskibbie@schawk.com, jskibbie@schawk.com,
 jskibbie@schawk.com, jskibbie@schawk.com, jskibbie@schawk.com,
 jskibbie@schawk.com, jskibbie@schawk.com, jskibbie@schawk.com,
 jskibbie@schawk.com, jskibbie@schawk.com, jskibbie@schawk.com,
 jskibbie@schawk.com, jskibbie@schawk.com, jskibbie@schawk.com,
 jskibbie@schawk.com, jskibbie@schawk.com, jskibbie@schawk.com,
 jskibbie@schawk.com, jskibbie@schawk.com, jskibbie@schawk.com,
 jskibbie@schawk.com, jskibbie@schawk.com, jskibbie@schawk.com,
 jskibbie@schawk.com, jskibbie@schawk.com, jskibbie@schawk.com,
 jskibbie@schawk.com, jskibbie@schawk.com, jskibbie@schawk.com,
 jskibbie@schawk.com, jskibbie@schawk.com, jskibbie@schawk.com,
 jskibbie@schawk.com, jskibbie@schawk.com, jskibbie@schawk.com,
 jskibbie@schawk.com, jskibbie@schawk.com, jskibbie@schawk.com,
 jskibbie@schawk.com, jskibbie@schawk.com
jskibbie@schawk.com,jskibbie@schawk.com,jskibbie@schawk.com,jskibbie@schawk.com,jskibbie@schawk.com,jskibbie@schawk.com,jskibbie@schawk.com,jskibbie@schawk.com,jskibbie@schawk.com,jskibbie@schawk.com,jskibbie@schawk.com,jskibbie@schawk.com,jskibbie@schawk.com,jskibbie@schawk.com,jskibbie@schawk.com,jskibbie@schawk.com,jskibbie@schawk.com,jskibbie@schawk.com,jskibbie@schawk.com,jskibbie@schawk.com,jskibbie@schawk.com,jskibbie@schawk.com,jskibbie@schawk.com,jskibbie@schawk.com,jskibbie@schawk.com,jskibbie@schawk.com,jskibbie@schawk.com,jskibbie@schawk.com,jskibbie@schawk.com,jskibbie@schawk.com,jskibbie@schawk.com,jskibbie@schawk.com,jskibbie@schawk.com,jskibbie@schawk.com,jskibbie@schawk.com,jskibbie@schawk.com,jskibbie@schawk.com,jskibbie@schawk.com,jskibbie@schawk.com,jskibbie@schawk.com,jskibbie@schawk.com,jskibbie@schawk.com,jskibbie@schawk.com,jskibbie@schawk.com,jskibbie@schawk.com,jskibbie@schawk.com,jskibbie@schawk.com,jskibbie@schawk.com,jskibbie@schawk.com,jskibbie@schawk.co
 m,jskibbie@schawk.com,jskibbie@schawk.com,jskibbie@schawk.com,jskibbie@schawk.com,jskibbie@schawk.com,jskibbie@schawk.com,jskibbie@schawk.com,jskibbie@schawk.com,jskibbie@schawk.com,jskibbie@schawk.com,jskibbie@schawk.com,jskibbie@schawk.com,jskibbie@schawk.com,jskibbie@schawk.com,jskibbie@schawk.com,jskibbie@schawk.com,jskibbie@schawk.com,jskibbie@schawk.com,jskibbie@schawk.com,jskibbie@schawk.com,jskibbie@schawk.com,jskibbie@schawk.com,jskibbie@schawk.com,jskibbie@schawk.com,jskibbie@schawk.com,jskibbie@schawk.com,jskibbie@schawk.com,jskibbie@schawk.com,jskibbie@schawk.com,jskibbie@schawk.com,jskibbie@schawk.com,jskibbie@schawk.com,jskibbie@schawk.com,jskibbie@schawk.com,jskibbie@schawk.com,jskibbie@schawk.com,jskibbie@schawk.com,jskibbie@schawk.com,jskibbie@schawk.com
