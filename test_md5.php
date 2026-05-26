<?php
$salt = '0kk45q1nbo61ya4d';
$target = 'ddf28723ec8d1fe2fd736211656d6482';
$words = ['bpsdm', 'password', '123456', '12345678', 'admin', 'admin123', 'qwerty'];
foreach ($words as $w) {
    if (md5($w.$salt) === $target) echo 'Match pwd+salt: ' . $w . PHP_EOL;
    if (md5($salt.$w) === $target) echo 'Match salt+pwd: ' . $w . PHP_EOL;
    if (md5(md5($w).$salt) === $target) echo 'Match md5(pwd)+salt: ' . $w . PHP_EOL;
    if (md5($salt.md5($w)) === $target) echo 'Match salt+md5(pwd): ' . $w . PHP_EOL;
    if (md5($w) === $target) echo 'Match pure md5: ' . $w . PHP_EOL;
}
