<?php
    include $_SERVER['DOCUMENT_ROOT']."/eventboard/db.php"; ?>
<!doctype html>
<head>
    <meta charset="UTF-8">
    <title>모란희 웹 포트폴리오</title>
    <link rel="stylesheet" type="text/css" href="/eventboard/css/style.css" />
</head>
<body>
    <?php
    $num = $_GET['no'];
    $hit = mysqli_fetch_array(SQLsyn("select * from board where no = '".$num."'"));
    $hit = $hit['cnt'] + 1;
    $fet = SQLsyn("update board set `cnt` = '".$hit."' where no = '".$num."'");
    $sql = SQLsyn("select * from board where no = '".$num."'");
    $board = $sql->fetch_array();
    ?>

    <div id="board_read">
        <h1><a href="/eventboard/index.php">사건게시판</a></h1>
        <h4>글을 읽는 공간입니다.</h4>
        <div id="read_area">
            <div id="AR_top">
                <h2 id="lockpage_icon">
                    <?php $lockimg="<img src='/eventboard/img/lock.png' alt='비공개' width='30' height='30'>";
                    if($board['lock']==1){
                        echo $lockimg;
                        if(isset($_POST['pw_chk'])) {
                            if(password_verify($_POST['pw_chk'],$board['pw'])) {
                                echo "";
                            } else { ?>
                                <script type="text/javascript">alert('비밀번호가 틀립니다.');</script>
                                <script type="text/javascript">location.replace("locker.php?no=<?php echo $board["no"]; ?>");</script>
                            <?php }
                        } else { ?> <!-- 주소창에 직접 no를 써서 부정접속할 경우를 대비해 입력한pw가 없으면 비밀번호 입력으로 돌아감 -->
                            <script type="text/javascript">alert('부정접속입니다.');</script>
                            <script type="text/javascript">location.replace("locker.php?no=<?php echo $board["no"]; ?>");</script>
                        <?php }
                    } else {echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";} ?>
                <h2 id="title_coll"><?php echo $board['title']; ?></h2>
                <h2 id="fill_coll"><?php echo $board['fill']; ?></h2>
            </div>
            
            <div class="wi_line"></div>

            <div id="user_info">
                <?php echo $board['writer']; ?>  |  <?php echo $board['time']; ?>  |  조회수: <?php echo $board['cnt']; ?>
            </div>

            <div id="bo_content">
                <?php echo nl2br("$board[content]"); ?> <!--nl2br을 안 하면 아무리 띄워쓰기가 있어도 한 줄로만 출력됨-->
            </div>
            <!--목록, 수정, 삭제-->
            <div id="bo_ser">
                <ul>
                    <a href="/eventboard/page/board/locker.php?no=<?php echo $board['no']; ?>&act=mod"><button>수정</button></a>
                    <a href="/eventboard/page/board/locker.php?no=<?php echo $board['no']; ?>&act=del"><button>삭제</button></a>
                </ul>
            </div>
        </div>
    </div>
    <?php include "footer.php"; ?>
</body>
</html>