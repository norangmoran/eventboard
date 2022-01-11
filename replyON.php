<?php
  include $_SERVER['DOCUMENT_ROOT']."/eventboard/db.php";

  $num=$_GET['no'];
  $userpw=password_hash($_POST['dat_pw'], PASSWORD_DEFAULT);

  if($num && $_POST['dat_user'] && $userpw && $_POST['content']) {
    $sql = SQLsyn("insert into reply(con_num,name,pw,content) values('".$num."','".$_POST['dat_user']."','".$userpw."','".$_POST['content']."')");
    echo "<script>alert('댓글이 등록되었습니다.');
    location.href='/eventboard/page/board/read.php?no=$num';</script>";
  } else {
    echo "<script>alert('빈칸을 채워주세요.');
    history.back();</script>";
  }
?>