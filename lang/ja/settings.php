<?php

/**
 * @license    GPL 2 (http://www.gnu.org/licenses/gpl.html)
 * 
 * @author Hideaki SAWADA <chuno@live.jp>
 * @author hideaki SAWADA <chuno@live.jp>
 */
$lang['smtp_host']             = '送信 SMTP サーバー';
$lang['smtp_port']             = 'SMTP サーバーのポート。通常は 25。SSL の場合は 465。';
$lang['smtp_ssl']              = 'SMTP サーバーと通信する時、使用する暗号化方式は？';
$lang['smtp_ssl_o_8']          = 'なし';
$lang['smtp_ssl_o_4']          = 'SSL';
$lang['smtp_ssl_o_2']          = 'TLS';
$lang['auth_user']             = '認証が必要な場合のユーザー名';
$lang['auth_pass']             = '上記ユーザーのパスワード';
$lang['pop3_host']             = '認証に POP-before-SMTP を使用している場合、POP3 に上記の権限を与え、ここに POP3サーバーを入力します。SMTP認証の場合、このフィールドは空のままにします。';
$lang['localdomain']           = 'SMTP の HELO フェーズ中に使用される名前。DokuWiki が稼働している Web サーバーの FQDN です。自動検出させる場合、空のままにします。';
$lang['debug']                 = '送信が失敗した場合、完全なエラーログを印刷しますか？稼働確認後、無効にして下さい！';
