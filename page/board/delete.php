<?php
    include $_SERVER['DOCUMENT_ROOT']."/eventboard/db.php";

    $sql = SQLsyn("DELETE FROM board WHERE no = '".$_GET['no']."';");
?>
<script type="text/javascript">alert("삭제되었습니다.");</script>
<meta http-equiv="refresh" content="0 url=/eventboard/index.php">