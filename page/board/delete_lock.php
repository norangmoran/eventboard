<?php include $_SERVER['DOCUMENT_ROOT']."/eventboard/db.php"; ?>

<link rel="stylesheet" type="text/css" href="/eventboard/css/jquery-ui.css">
<script type="text/javascript" src="/eventboard/js/jquery-3.2.1.min.js"></script>
<script type="text/javascript" src="/eventboard/js/jquery-ui.js"></script>
<script type="text/javascript">
  $(function(){
    $("#writepass").dialog({
      modal:true,
      title:'비밀번호를 입력하세요.',
      width:400,
    });
  });
</script>

<div id='writepass'>
  <form action="/eventboard/page/board/delete.php?no=<?php echo $_GET["no"]; ?>" method="post">
    <p>비밀번호: &nbsp; <input type="password" name="pw_chk"> &nbsp; <input type="submit" value="확인"></p>
  </form>
</div>