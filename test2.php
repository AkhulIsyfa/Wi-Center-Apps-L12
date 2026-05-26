<?php
$salt = '0vy6ungsk7v2zp64';
$pass = '199605152019031001';
echo 'md5(md5(pass).salt): ' . md5(md5($pass).$salt) . PHP_EOL;
echo 'md5(salt.md5(pass)): ' . md5($salt.md5($pass)) . PHP_EOL;
echo 'pure md5: ' . md5($pass) . PHP_EOL;
