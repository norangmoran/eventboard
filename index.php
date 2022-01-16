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
                if(isset($_GET['page'])) {$page = $_GET['page'];
                } else {$page = 1;}

                $sql = SQLsyn("select * from board");
                $row_num = mysqli_num_rows($sql); //총 레코드 수
                $list = 5; //한 페이지에 보여줄 개수
                $block_ct = 5; //블록당 보여줄 페이지 개수

                $block_num = ceil($page/$block_ct); //현 페이지 블록
                $block_start = (($block_num - 1) * $block_ct) + 1; //블록 시작
                $block_end = $block_start + $block_ct - 1; //블록 끝

                $total_page = ceil($row_num / $list); //페이징한 페이지 수
                if($block_end > $total_page) $block_end = $total_page; //이후 몇 페이지까지 있는지 보여줌
                $total_block = ceil($total_page / $block_ct); //블럭 총 개수
                $start_num = ($page - 1) * $list; //불러올 레코드의 limit 제한 시작점

                $sql2 = SQLsyn("select * from board order by no desc limit $start_num, $list");
                
                while($board = $sql2->fetch_array()) {
                    $row_num -= 1;
                    $title = $board["title"];
                    if(strlen($title)>30) { //제목이 30자 이상아면 ...으로 간소화
                        $title = str_replace($board["title"],mb_substr($board["title"],0,30,"utf-8")."...",$board["title"]);}
                    $sql3 = SQLsyn("select * from reply where con_num='".$board['no']."'"); //보드no와 연결된 레코드들 호출
                    $rep_count = mysqli_num_rows($sql3); ?> <!--결과 레코드 갯수 도출-->

                    <tbody>
                        <tr>
                            <td width="70"><?php echo ($row_num+1-(($page-1)*5)); ?></td>
                            <td width="500">
                                <?php $lockimg="<img src='/eventboard/img/lock.png' alt='비공개' width='20' height='17'>";
                                if($board['lock'] == 1) { ?>
                                    <a href="/eventboard/page/board/locker.php?no=<?php echo $board["no"];?>"><?php echo $title,"&nbsp;&nbsp;", $lockimg; ?></a>
                                <?php } else { ?>
                                <a href="/eventboard/page/board/read.php?no=<?php echo $board["no"];?>"><?php echo $title;
                                } ?> <span class="re_ct">[<?php echo $rep_count; ?>]</span></a>
                            </td>
                            <td width="120"><?php echo $board['fill']; ?></td>
                            <td width="100"><?php echo $board['time']; ?></td>
                            <td width="100"><?php echo $board['cnt']; ?></td>
                        </tr>
                    </tbody>
                <?php } ?>
            </table>
            
            <div id="page_num"> <!-- 페이징 -->
                <div id="page_F"> <?php
                    if($page <= 1) { //이전 페이지로
                        echo "<div class='FGboldRED'>이전</div>";
                    } else {
                        $pre = $page - 1; //이전페이지 번호
                        echo "<div><a href='?page=$pre'>이전</a></div>";
                    }

                    if($page <= 1) { //처음으로 표시
                        echo "<div class='FGboldRED'>처음</div>";
                    } else { //아니면 1번 페이지로 가도록 링크
                        echo "<div><a href='?page=1'>처음</a></div>";
                    } ?>
                </div>
                <div id="page_C"> <?php
                    for($i = $block_start; $i <= $block_end; $i++) { //for문으로 페이지 뱉기
                        if($page == $i) { //현제 페이지에 해당하는 숫자를 빨간색
                            echo "<div class='FGboldRED'>[$i]</div>";
                        } else { //그 외 페이지들 링크걸어 표시
                            echo "<div><a href='?page=$i'>[$i]</a></div>";
                        }
                    } ?>
                </div>
                <div id="page_E"> <?php
                    if($block_num >= $total_block) { //다음 페이지로
                        echo "<div class='FGboldRED'>다음</div>";
                    } else {
                        $next = $page + 1; //다음 페이지 번호
                        echo "<div><a href='?page=$next'>다음</a></div>";
                    }

                    if($page >= $total_page) { //마지막으로 표시
                        echo "<div class='FGboldRED'>마지막</div>";
                    } else {
                        echo "<div><a href='?page=$total_page'>마지막</a></div>";
                    } ?>
                </div>
            </div>
            <div id="writer_btn">
                <a href="/eventboard/page/board/write.php"><button>글쓰기</button></a>
            </div>
        </div>
        <?php include "footer.php"; ?>
    </body>
</html>