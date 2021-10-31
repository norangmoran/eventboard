<?php
    include $_SERVER['DOCUMENT_ROOT']."/eventboard/db.php";

    $num = $_GET['no'];
    $sql = SQLsyn("select * from board where no='".$num."';");
    $board = $sql->fetch_array();
?>
<!doctype html>
<head>
    <meta charset="UTF-8">
    <title>모란희 웹 포트폴리오</title>
    <link rel="stylesheet" href="/eventboard/css/style.css" />
</head>
<body>
    <div id="board_write">
        <h1><a href="/eventboard/index.php">사건게시판</a></h1>
        <h4>글을 수정하는 공간입니다.</h4>
        <div id="write_area">
            <form action="/eventboard/modifyON.php?no=<?php echo $num; ?>" method="post">
                <div id="AR_top">    
                    <div id="in_title">
                        <textarea name="title" id="utitle" rows="1" cols="55" placeholder="제목" maxlength="100" required><?php echo $board['title']; ?></textarea>
                    </div>
                    <div id="filling">
                        <select name="fill">
                            <option value="보통" <?php if($board['fill']=="보통") {echo "selected";} ?>>보통</option>
                            <option value="기쁨" <?php if($board['fill']=="기쁨") {echo "selected";} ?>>기쁨</option>
                            <option value="슬픔" <?php if($board['fill']=="슬픔") {echo "selected";} ?>>슬픔</option>
                            <option value="화남" <?php if($board['fill']=="화남") {echo "selected";} ?>>화남</option>
                            <option value="놀람" <?php if($board['fill']=="놀람") {echo "selected";} ?>>놀람</option>
                            <option value="혼란" <?php if($board['fill']=="혼란") {echo "selected";} ?>>혼란</option>
                        </select>
                    </div>
                </div>

                <div class="wi_line"></div>

                <div id="in_name">
                    <textarea name="writer" id="uname" rows="1" cols="25" placeholder="글쓴이" maxlength="50" required><?php echo $board['writer']; ?></textarea>
                </div>

                <div id="in_content">
                    <textarea name="content" id="ucontent" placeholder="내용" required><?php echo $board['content']; ?></textarea>
                </div>

                <div id="in_pw">
                    <input type="password" name="pw" id="upw" placeholder="비밀번호" required>
                </div>

                <div id="bt_se">
                    <button type="submit">글 작성</button>
                </div>
            </form>
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