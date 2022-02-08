<?php
include $_SERVER['DOCUMENT_ROOT']."/db.php";

$time = date('Y-m-d H:i:s'); //date함수가 자동으로 날짜 생성
$cnt = 0;

$username = $_POST['writer'];
$userpw = password_hash($_POST['pw'],PASSWORD_DEFAULT);
$title = $_POST['title'];
$content = $_POST['content'];
$fill = $_POST['fill'];
$lock = $_POST['postlock'];

if($username && $userpw && $title && $content) {
    $resetno = SQLsyn("alter table board auto_increment = 1");
    
    $sql = SQLsyn("insert into board(`writer`,`pw`,`title`,`content`,`time`,`cnt`,`fill`,`lock`) 
        values('".$username."','".$userpw."','".$title."','".$content."','".$time."','".$cnt."','".$fill."','".$lock."');");
    echo "<script> alert('게시물이 등록되었습니다.');
        location.href='/index.php';</script>";
} else {
    echo "<script> alert('빈 항목을 채워주세요.');
        history.back();</script>";
} ?>