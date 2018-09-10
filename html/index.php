<?php
require_once __DIR__.'/../vendor/autoload.php';
$loader = new Twig_Loader_Filesystem('./view');
$twig = new Twig_Environment($loader);
$test = "bbbb";
echo date("Y/m/d H:i:s");
echo $twig->render('hello.html', array('name' => 'Twig'));
phpinfo();
/*mb_language("Japanese");
mb_internal_encoding("UTF-8");
mb_send_mail('yamanaka@meme.ne.jp', 'テスト送信テスト送信', "テスト送信テスト送信テスト送信テスト送信");*/

?>

