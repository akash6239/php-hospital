<?php
 $db_pass = '$argon2i$v=19$m=65536,t=4,p=1$SlZKMEZ1d1hlVnVtaTFYYg$t1bsaF3JXp4/s+rFhu1hoV007UA9eOojajnFbfqDe6M';
//  $encrpyt_password = password_hash(123,PASSWORD_BCRYPT);
//  $encrpyt_password2 = password_hash(123,PASSWORD_BCRYPT);
    $pass = 123343;
    $test = password_verify($pass,$db_pass);
    var_dump($test);
?>