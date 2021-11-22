<?php
    include $_SERVER['DOCUMENT_ROOT']."/eventboard/db.php";

    $num = $_GET['no'];
    
    $username = $_POST['writer'];
    $userpw = password_hash($_POST['pw'], PASSWORD_DEFAULT);
    $title = $_POST['title'];
    $content = $_POST['content'];
    $fill = $_POST['fill'];
    $lock = $_POST['postlock'];

    $sql = SQLsyn("update board set `writer`='".$username."', `pw`='".$userpw."', `title`='".$title."', `content`='".$content."', `fill`='".$fill."', `lock`='".$lock."' where no='".$num."'"); ?>
    <!-- lock 컬럼의 경우 커멘트와 햇갈리는지 구문오류가 뜸. ``를 씌워주니까 문제 사라짐 -->
    <script type="text/javascript">alert("수정되었습니다."); </script>
    <meta http-equiv="refresh" content="0 url=/eventboard/page/board/read.php?no=<?php echo $num; ?>">