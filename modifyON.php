<?php
    include $_SERVER['DOCUMENT_ROOT']."/eventboard/db.php";

    $num = $_GET['no'];
    $username = $_POST['writer'];
    $userpw = password_hash($_POST['pw'], PASSWORD_DEFAULT);
    $title = $_POST['title'];
    $content = $_POST['content'];
    $fill = $_POST['fill'];

    $sql = SQLsyn("update board set writer='".$username."', pw='".$userpw."', title='".$title."', content='".$content."', fill='".$fill."' where no='".$num."'"); ?>
    <script type="text/javascript">alert("수정되었습니다."); </script>
    <meta http-equiv="refresh" content="0 url=/eventboard/page/board/read.php?no=<?php echo $num; ?>">

    <!-- if($username && $userpw && $title && $content) {
        $sql = SQLsyn("update board set writer='".$username."', pw='".$userpw."', title='".$title."', content='".$content."', fill='".$fill."' where no='".$num."'");
        echo "<script> alert('수정이 완료되었습니다.');
                location.href='/eventboard/index.php';</script>";
    } else {
        echo "<script> alert('빈 항목을 채워주세요.');
            history.back();</script>";
    }
?> -->