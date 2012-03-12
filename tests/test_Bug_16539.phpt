--TEST--
Bug #16539  Headers longer than 998 characters
--SKIPIF--
--FILE--
<?php
require_once "Mail/MimePart2.php";

$headers = array(
array('To', 'jskibbie@schawk.com,jskibbie@schawk.com,jskibbie@schawk.com,jskibbie@schawk.com,jskibbie@schawk.com,jskibbie@schawk.com,jskibbie@schawk.com,jskibbie@schawk.com,jskibbie@schawk.com,jskibbie@schawk.com,jskibbie@schawk.com,jskibbie@schawk.com,jskibbie@schawk.com,jskibbie@schawk.com,jskibbie@schawk.com,jskibbie@schawk.com,jskibbie@schawk.com,jskibbie@schawk.com,jskibbie@schawk.com,jskibbie@schawk.com,jskibbie@schawk.com,jskibbie@schawk.com,jskibbie@schawk.com,jskibbie@schawk.com,jskibbie@schawk.com,jskibbie@schawk.com,jskibbie@schawk.com,jskibbie@schawk.com,jskibbie@schawk.com,jskibbie@schawk.com,jskibbie@schawk.com,jskibbie@schawk.com,jskibbie@schawk.com,jskibbie@schawk.com,jskibbie@schawk.com,jskibbie@schawk.com,jskibbie@schawk.com,jskibbie@schawk.com,jskibbie@schawk.com,jskibbie@schawk.com,jskibbie@schawk.com,jskibbie@schawk.com,jskibbie@schawk.com,jskibbie@schawk.com,jskibbie@schawk.com,jskibbie@schawk.com,jskibbie@schawk.com,jskibbie@schawk.com,jskibbie@schawk.com,jskibbie@schawk.com,jskibbie@schawk.com,jskibbie@schawk.com,jskibbie@schawk.com,jskibbie@schawk.com,jskibbie@schawk.com,jskibbie@schawk.com,jskibbie@schawk.com,jskibbie@schawk.com,jskibbie@schawk.com,jskibbie@schawk.com,jskibbie@schawk.com,jskibbie@schawk.com,jskibbie@schawk.com,jskibbie@schawk.com,jskibbie@schawk.com,jskibbie@schawk.com,jskibbie@schawk.com,jskibbie@schawk.com,jskibbie@schawk.com,jskibbie@schawk.com,jskibbie@schawk.com,jskibbie@schawk.com,jskibbie@schawk.com,jskibbie@schawk.com,jskibbie@schawk.com,jskibbie@schawk.com,jskibbie@schawk.com,jskibbie@schawk.com,jskibbie@schawk.com,jskibbie@schawk.com,jskibbie@schawk.com,jskibbie@schawk.com,jskibbie@schawk.com,jskibbie@schawk.com,jskibbie@schawk.com,jskibbie@schawk.com,jskibbie@schawk.com,jskibbie@schawk.com,jskibbie@schawk.com'),
array('Subject', 'jskibbie@schawk.com,jskibbie@schawk.com,jskibbie@schawk.com,jskibbie@schawk.com,jskibbie@schawk.com,jskibbie@schawk.com,jskibbie@schawk.com,jskibbie@schawk.com,jskibbie@schawk.com,jskibbie@schawk.com,jskibbie@schawk.com,jskibbie@schawk.com,jskibbie@schawk.com,jskibbie@schawk.com,jskibbie@schawk.com,jskibbie@schawk.com,jskibbie@schawk.com,jskibbie@schawk.com,jskibbie@schawk.com,jskibbie@schawk.com,jskibbie@schawk.com,jskibbie@schawk.com,jskibbie@schawk.com,jskibbie@schawk.com,jskibbie@schawk.com,jskibbie@schawk.com,jskibbie@schawk.com,jskibbie@schawk.com,jskibbie@schawk.com,jskibbie@schawk.com,jskibbie@schawk.com,jskibbie@schawk.com,jskibbie@schawk.com,jskibbie@schawk.com,jskibbie@schawk.com,jskibbie@schawk.com,jskibbie@schawk.com,jskibbie@schawk.com,jskibbie@schawk.com,jskibbie@schawk.com,jskibbie@schawk.com,jskibbie@schawk.com,jskibbie@schawk.com,jskibbie@schawk.com,jskibbie@schawk.com,jskibbie@schawk.com,jskibbie@schawk.com,jskibbie@schawk.com,jskibbie@schawk.com,jskibbie@schawk.com,jskibbie@schawk.com,jskibbie@schawk.com,jskibbie@schawk.com,jskibbie@schawk.com,jskibbie@schawk.com,jskibbie@schawk.com,jskibbie@schawk.com,jskibbie@schawk.com,jskibbie@schawk.com,jskibbie@schawk.com,jskibbie@schawk.com,jskibbie@schawk.com,jskibbie@schawk.com,jskibbie@schawk.com,jskibbie@schawk.com,jskibbie@schawk.com,jskibbie@schawk.com,jskibbie@schawk.com,jskibbie@schawk.com,jskibbie@schawk.com,jskibbie@schawk.com,jskibbie@schawk.com,jskibbie@schawk.com,jskibbie@schawk.com,jskibbie@schawk.com,jskibbie@schawk.com,jskibbie@schawk.com,jskibbie@schawk.com,jskibbie@schawk.com,jskibbie@schawk.com,jskibbie@schawk.com,jskibbie@schawk.com,jskibbie@schawk.com,jskibbie@schawk.com,jskibbie@schawk.com,jskibbie@schawk.com,jskibbie@schawk.com,jskibbie@schawk.com,jskibbie@schawk.com'),
);

foreach ($headers as $header) {
    $hdrs = Mail_MimePart2::encodeHeader($header[0], $header[1]);
    echo $hdrs."\n";
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
