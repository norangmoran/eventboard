<?php
include $_SERVER['DOCUMENT_ROOT']."/eventboard/db.php";
$rno = $_POST['rno'];
$sql = SQLsyn("SELECT * from reply where no='".$rno."'");
$reply = $sql->fetch_array();

$num = $_POST['b_no'];
$sql2 = SQLsyn("SELECT * from board where no='".$num."'");
$board = $sql2->fetch_array();

$sql3 = SQLsyn("UPDATE reply set content='".$_POST['content']."' where no='".$rno."'");
?>
<script type="text/javascript">alert('수정되었습니다.');
location.replace("read.php?no=<?php echo $num; ?>"); </script>