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
    $fet = SQLsyn("update board set cnt = '".$hit."' where no = '".$num."'");
    $sql = SQLsyn("select * from board where no = '".$num."'");
    $board = $sql->fetch_array();
    ?>

    <div id="board_read">
        <h1><a href="/eventboard/index.php">사건게시판</a></h1>
        <h4>글을 읽는 공간입니다.</h4>
        <div id="read_area">
            <div id="AR_top">
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
                    <a href="/eventboard/page/board/modify.php?no=<?php echo $board['no']; ?>"><button>수정</button></a>
                    <a href="/eventboard/page/board/delete.php?no=<?php echo $board['no']; ?>"><button>삭제</button></a>
                </ul>
            </div>
        </div>
    </div>
    <footer>
            <a href="https://url.kr/psb46e"target="_blank">
                <button>
                    차세대 사물인터넷(Iot)<br>개발자 양성반에서<br>무엇을 학습했는지<br>궁금하신가요?<br>
                    <img src="/eventboard/img/Iot수업내용.png" Width="100">
                </button>
            </a>
            <a href="https://url.kr/ryd9el"target="_blank">
                <button>
                    과거 기계공학 분야의<br>경력이 궁금하신가요?<br>
                    <img src="/eventboard/img/기계공학 이력서.png" Width="100">
                </button>
            </a>
    </footer>
</body>
</html>