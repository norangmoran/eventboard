<?php
include $_SERVER['DOCUMENT_ROOT']."/eventboard/db.php";

$username = $_POST['writer'];
$userpw = password_hash($_POST['pw'],PASSWORD_DEFAULT);
//비밀번호 암호화. PHP5버전 이상부터 내장되어있고 이하 버전엔 password.php파일을 insclude해서 씀.
//password_hash가 있고 password_default가 있음
$title = $_POST['title'];
$content = $_POST['content'];
$time = date('Y-m-d H:i:s'); //date함수가 자동으로 날짜 생성
if($username && $userpw && $title && $content) {
    $sql = SQLsyn("insert into board(writer,pw,title,content,time) 
        values('".$username."','".$userpw."','".$title."','".$content."','".$date."')");
    echo "<script> alert('게시물이 등록되었습니다.');
        location.href='/eventboard/index.php';</script>";
} else {
    echo "<script> alert('빈 항목을 채워주세요.');
        history.back();</script>";
} ?>