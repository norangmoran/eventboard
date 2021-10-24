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
        <h2><?php echo $board['title']; ?></h2>
        <div id="user_info">
            <?php echo $board['writer']; ?>  |  <?php echo $board['time']; ?>  |  <?php echo $board['fill']; ?>  |  조회수: <?php echo $board['cnt']; ?>
            <div id="bo_line"></div>
        </div>
        <div id="bo_content">
            <?php echo nl2br("$board[content]"); ?> <!--nl2br을 안 하면 아무리 띄워쓰기가 있어도 한 줄로만 출력됨-->
        </div>

        <!--목록, 수정, 삭제-->
        <div id="bo_ser">
            <ul>
                <li><a href="/eventboard/index.php">[목록으로]</a></li>
                <li><a href="/eventboard/page/board/modify.php?no=<?php echo $board['no']; ?>">[수정]</a></li>
                <li><a href="/eventboard/page/board/delete.php?no=<?php echo $board['no']; ?>">[삭제]</a></li>
            </ul>
        </div>
    </div> 
</body>
</html>