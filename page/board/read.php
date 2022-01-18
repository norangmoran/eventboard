<?php
    include $_SERVER['DOCUMENT_ROOT']."/eventboard/db.php"; ?>
<!doctype html>
<head>
    <meta charset="UTF-8">
    <title>모란희 웹 포트폴리오</title>
    <link rel="stylesheet" type="text/css" href="/eventboard/css/style.css" />
    <link rel="stylesheet" type="text/css" href="/eventboard/css/jquery-ui.css" />
    <script type="text/javascript" src="/eventboard/js/jquery-3.2.1.min.js"></script>
    <script type="text/javascript" src="/eventboard/js/jquery-ui.js"></script>
    <script type="text/javascript" src="/eventboard/js/common.js"></script>
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
            <!--수정, 삭제-->
            <div id="bo_ser">
                <ul>
                    <a href="/eventboard/page/board/locker.php?no=<?php echo $board['no']; ?>&act=mod"><button>수정</button></a>
                    <a href="/eventboard/page/board/locker.php?no=<?php echo $board['no']; ?>&act=del"><button>삭제</button></a>
                </ul>
            </div>
        </div>
        <div class="reply_view"> <!--댓글 불러오기-->
            <h3 style="margin-left: 20px;">댓글목록</h3>
            <?php
            $sql3=SQLsyn("select * from reply where con_num='".$num."' order by no desc");
            while($reply = $sql3 -> fetch_array()) { ?>
                <div class = "dap_lo">
                    <div style="font-size:14px;"><b><?php echo $reply['name']; ?></b></div>
                    <div class="dap_to comt_edit"><?php echo nl2br("$reply[content]"); ?></div>
                    <div class="rep_me dap_to"><?php echo $reply['time']; ?></div>
                    <div class="rep_me rep_menu">
                        <a class="dat_edit_bt" href="#">수정</a>
                        <a class="dat_delete_bt" href="#">삭제</a>
                    </div>
                    <div class="dat_edit"> <!--댓글 수정폼-->
                        <form method="post" action="reply_modify.php">
                            <input type="hidden" name="rno" value="<?php echo $reply['no']; ?>" />
                            <input type="hidden" name="b_no" value="<?php echo $num; ?>">
                            <input type="password" name="pw" class="dap_sm" placeholder="비밀번호" />
                            <textarea name="content" class="dap_edit_t"><?php echo $reply['content']; ?></textarea>
                            <input type="submit" value="수정하기" class="re_mo_bt">
                        </form>
                    </div>
                    <div class="dat_delete"> <!--댓글삭제 비번확인-->
                        <form action="reply_delete.php" method="post">
                            <input type="hidden" name="rno" value="<?php echo $reply['no']; ?>" />
                            <input type="hidden" name="b_no" value="<?php echo $num; ?>">
                            <p>비밀번호<input type="password" name="pw" />
                            <input type="supmit" value="확인"></p>
                        </form>
                    </div>
                </div>
            <?php } ?>
            <div class="dat_fm"> <!--댓글입력 폼-->
                <form action="/eventboard/replyON.php?no=<?php echo $num; ?>" method="post">
                    <div class="dat_fm_inf">
                        <input type="text" name="dat_user" id="dat_user" class="dat_usre" size="15" placeholder="아이디">
                        <input type="password" name="dat_pw" id="dat_pw" class="dat_pw" size="15" placeholder="비밀번호" style="margin-left:7px;">
                    </div>
                    <div class="dat_fm_con" style="margin-top:10px; margin-right:110px;" >
                        <textarea name="content" class="reply_content" id="re_content"></textarea>
                        <button id="rep_bt" class="re_bt" style="margin-left:10px;">댓글</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <?php include "footer.php"; ?>
</body>
</html>