<?php
include $_SERVER['DOCUMENT_ROOT']."/eventboard/db.php";

$username = $_POST['writer'];
$userpw = password_hash($_POST['pw'],PASSWORD_DEFAULT);
$title = $_POST['title'];
$content = $_POST['content'];
$fill = $_POST['fill'];
$time = date('Y-m-d H:i:s'); //date함수가 자동으로 날짜 생성
$cnt = 0;
if($username && $userpw && $title && $content) {
    $sql = SQLsyn("insert into board(`writer`,`pw`,`title`,`content`,`time`,`cnt`,`fill`) 
        values('".$username."','".$userpw."','".$title."','".$content."','".$time."','".$cnt."','".$fill."');");
    echo "<script> alert('게시물이 등록되었습니다.');
        location.href='/eventboard/index.php';</script>";
} else {
    echo "<script> alert('빈 항목을 채워주세요.');
        history.back();</script>";
} ?>