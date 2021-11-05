<?php include $_SERVER['DOCUMENT_ROOT']."/eventboard/db.php"; ?> 
    <!--DOCUMENT-ROOT는 현재 실행되고있는 index.php 위치를 말하며
    여기를 기준으로 /eventboard/db.php 를 서버함수로써 불러옴-->
<!DOCTYPE html>
    <head>
        <meta charset="UTF-8">
        <title>모란희 웹 포트폴리오</title>
        <link rel="stylesheet" type="text/css" href="/eventboard/css/style.css"/>
    </head>
    <body>
        <div id="BoardArea">
            <a href="/eventboard/index.php"><h1>사건게시판</h1></a>
            <h4>당신에겐 지금 무슨 일이 생겼나요?</h4>
            <h5>더 자세한 개발 이력을 알고 싶으시다면 <a href="https://github.com/norangmoran/eventboard"target="_blank">깃허브저장소</a>를 방문해 주세요!</h5>
            <table class="ListTable">
                <thead>
                    <tr>
                        <th width="50">No.</th>
                        <th width="500">사건</th>
                        <th width="70">기분</th>
                        <th width="100">시간</th>
                        <th width="70">조회수</th>
                    </tr>
                </thead>
                <?php
                $sql = SQLsyn("select * from board order by no desc limit 5;");
                //  쿼리 -> board 테이블에서 내림차순으로 5개 레코드를 전부 표시하라
                    while($board = $sql->fetch_array()) {
                        $title = $board["title"];
                        if(strlen($title)>30) { //제목이 30자 이상아면 ...으로 간소화해주는 작업 실행
                            $title = str_replace($board["title"],mb_substr($board["title"],0,30,"utf-8")."...",$board["title"]);
                        } ?>
                        <tbody>
                            <tr>
                                <td width="70"><?php echo $board['no']; ?></td>
                                <td width="500"><a href="/eventboard/page/board/read.php?no=<?php echo $board["no"];?>"><?php echo $title; ?></a></td>
                                <td width="120"><?php echo $board['fill']; ?></td>
                                <td width="100"><?php echo $board['time']; ?></td>
                                <td width="100"><?php echo $board['cnt']; ?></td>
                            </tr>
                        </tbody>
                    <?php } ?>
            </table>
            <div id="writer_btn">
                <a href="/eventboard/page/board/write.php"><button>글쓰기</button></a>
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