<?php include $_SERVER['DOCUMENT_ROOT']."/eventboard/db.php"; ?>

<link rel="stylesheet" type="text/css" href="/eventboard/css/jquery-ui.css">
<script type="text/javascript" src="/eventboard/js/jquery-3.2.1.min.js"></script>
<script type="text/javascript" src="/eventboard/js/jquery-ui.js"></script>
<script type="text/javascript">
  $(function(){
    $("#writepass").dialog({
      modal:true,
      title:'비밀글입니다.',
      width:400,
    });
  });
</script>
<?php
$gno = $_GET['no'];
$sql = SQLsyn("select * from board where no = '".$gno."'");
$board = $sql -> fetch_array();
?>

<div id='writepass'>
  <form action="/eventboard/page/board/read.php?no=<?php echo $board["no"]; ?>" method="post">
    <p>비밀번호: &nbsp; <input type="password" name="pw_chk"> &nbsp; <input type="submit" value="확인"></p>
  </form>
</div>