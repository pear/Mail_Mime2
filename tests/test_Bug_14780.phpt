--TEST--
Bug #14780  Invalid Content-Type when headers() is called before get()
--SKIPIF--
--FILE--
<?php
require_once "Mail/Mime2.php";

$mime = new Mail_Mime2();
$mime->setTXTBody("test");
$mime->setHTMLBody("test");

$head1 = $mime->headers();
$body = $mime->get();
$head2 = $mime->headers();

if ($head1 === $head2) {
    echo "OK";
}

?>
--EXPECT--
OK
