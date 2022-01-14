<?php
$phone = "0372526147";

$kq = preg_match('/^0[0-9]{9}$/', $phone);
$username = "Nguyen TaMM1";

$kq = preg_match('/[a-z]*[A-Z][0-9]/', $username);


echo $kq;