--TEST--
Bug #9725   multipart/related & alternative wrong order
--SKIPIF--
--FILE--
<?php
require_once "Mail/mime2.php";

$mime = new Mail_Mime2();
$mime->setTXTBody("test");
$mime->setHTMLBody("test");
$mime->addHTMLImage("test", 'application/octet-stream', '', false);
$body = $mime->get();
$head = $mime->headers();
$headCT = $head['Content-Type'];
$headCT = explode(";", $headCT);
$headCT = $headCT[0];

$ct = preg_match_all('|Content-Type: ([^;\r\n]+)|', $body, $matches);
print($headCT);
print("\n");
foreach ($matches[1] as $match){
    print($match);
    print("\n");
}
--EXPECT--
multipart/alternative
text/plain
multipart/related
text/html
application/octet-stream
