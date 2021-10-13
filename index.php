<?php include $_SERVER['DOCUMENT_ROOT']."/eventboard/db.php"; ?> 
    <!--DOCUMENT-ROOT는 현재 실행되고있는 위치를 말하며
    현재 실행중인 위치를 기준으로 /db.php 를 서버 기본경로로 지정-->
<!DOCTYPE html>
    <head>
        <meta charset="UTF-8">
        <title>모란희 웹 포트폴리오</title>
        <link rel="stylesheet" type="text/css" href="/eventboard/css/style.css?ver=1"/>
    </head>
    <body>
        <div id="BoardArea">
            <h1><a href="/eventboard/index.php">사건게시판</a></h1>
            <h4>지금 당신에겐 무슨 일이 생겼나요?</h4>
            <h5>자세한 개발 이력을 알고 싶으시다면 <a href="https://github.com/norangmoran/eventboard"target="_blank">깃허브저장소</a>를 방문해 주세요!</h5>
            <table class="ListTable">
                <thead>
                    <tr>
                        <th width="70">No.</th>
                        <th width="500">사건</th>
                        <th width="120">기분</th>
                        <th width="100">시간</th>
                        <th width="100">조회수</th>
                    </tr>
                </thead>
                <?php
                //board테이블에서 idx기준으로 내림차순 5개까지 표시
                $sql = SQLsyn("select * from board order by no desc limit 5;");
                    while($board = $sql->fetch_array()) {
                        $title = $board["title"];
                        if(strlen($title)>30) {
                            $title = str_replace($board["title"],mb_substr($board["title"],0,30,"utf-8")."...",$board["title"]);
                        } ?>
                    <tbody>
                        <tr>
                            <td width="70"><?php echo $board['no']; ?></td>
                            <td width="500"><a href=""><?php echo $title; ?></a></td>
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
    </body>
</html>