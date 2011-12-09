--TEST--
Bug #12466  Content-Transfer-Encoding checking
--SKIPIF--
--FILE--
<?php
require_once "Mail/Mime2.php";

$params = array(
    'text_encoding' => '7bit',
    'html_encoding' => '7bit',
);
$mime = new Mail_Mime2($params);
$mime->setTXTBody("ż");
$mime->setHTMLBody("z");
$body = $mime->getMessage();

preg_match_all('/Content-Transfer-Encoding: (.*)/', $body, $m);
echo trim($m[1][0])."\n".trim($m[1][1]);

?>
--EXPECT--
quoted-printable
7bit
