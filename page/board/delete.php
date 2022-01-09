<?php
    include $_SERVER['DOCUMENT_ROOT']."/eventboard/db.php";

    

    $sql =SQLsyn("select * from board where no='".$_GET['no']."';");
    $board = $sql -> fetch_array();

    if(isset($_POST['pw_chk'])) {
        if(password_verify($_POST['pw_chk'],$board['pw'])) {
            $sql = SQLsyn("DELETE FROM board WHERE no = '".$_GET['no']."';"); ?>
            <script type="text/javascript">alert("삭제되었습니다.");</script>
            <meta http-equiv="refresh" content="0 url=/eventboard/index.php">
        <?php } else { ?>
            <script type="text/javascript">alert("비밀번호가 틀립니다.");</script>
            <script type="text/javascript">history.back();</script>
        <?php }
    } else { ?>
        <script type="text/javascript">alert('부정접속입니다.');</script>
        <script type="text/javascript">location.replace("locker.php?no=<?php echo $board["no"]; ?>&act=del");</script>
    <?php } ?>