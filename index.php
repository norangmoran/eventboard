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
            <h6><a href='https://kor.pngtree.com/so/%ec%9e%a0%ea%b8%88'>잠금 이미지 출처는 .pngtree.com/입니다.</a></h6>
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
                if(isset($_GET['page'])){
                    $page = $_GET['page'];
                } else {
                    $page = 1;
                }

                $sql = SQLsyn("select * from board");
                $row_num = mysqli_num_rows($sql);
                $list = 5;
                $block_ct = 5;

                $block_num = ceil($page/$block_ct);
                $block_start = (($block_num - 1) * $block_ct) + 1;
                $block_end = $block_start + $block_ct - 1;

                $total_page = ceil($row_num / $list);
                if($block_end > $total_page) $block_end = $total_page;
                $total_block = ceil($total_page / $block_ct);
                $start_num = ($page - 1) * $list;

                $sql2 = SQLsyn("select * from board order by no desc limit $start_num, $list");
                
                    while($board = $sql2->fetch_array()) {
                        $title = $board["title"];
                        if(strlen($title)>30) { //제목이 30자 이상아면 ...으로 간소화해주는 작업 실행
                            $title = str_replace($board["title"],mb_substr($board["title"],0,30,"utf-8")."...",$board["title"]);
                        } ?>
                        <tbody>
                            <tr>
                                <td width="70"><?php echo $board['no']; ?></td>
                                <td width="500">
                                    <?php $lockimg="<img src='/eventboard/img/lock.png' alt='비공개' width='20' height='17'>";
                                    if($board['lock']==1){ ?>
                                        <a href="/eventboard/page/board/locker.php?no=<?php echo $board["no"];?>"><?php echo $title,"&nbsp;&nbsp;", $lockimg; ?></a>
                                    <?php } else { ?>
                                    <a href="/eventboard/page/board/read.php?no=<?php echo $board["no"];?>"><?php echo $title; ?></a>
                                    <?php } ?>
                                </td>
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
        <?php include "footer.php"; ?>
    </body>
</html>