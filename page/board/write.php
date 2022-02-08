<!doctype html>
<head>
<meta charset="UTF-8">
<title>글쓰기</title>
<link rel="stylesheet" type="text/css" href="/css/style.css?ver=1"/>
</head>
<body>
    <div id="board_write">
        <a href="/index.php"><h1>사건게시판</h1></a>
        <h4>글을 작성하는 공간입니다.</h4>
            <div id="write_area">
                <form action="/writeON.php" method="post">
                    <div id="AR_top">
                        <div id="in_title">
                            <textarea name="title" id="utitle" rows="1" cols="55" placeholder="제목" maxlength="100" required></textarea>
                        </div>
                        <div id="filling">
                            <select name="fill">
                                <option value="보통" selected="selected">보통</option>
                                <option value="기쁨">기쁨</option>
                                <option value="슬픔">슬픔</option>
                                <option value="화남">화남</option>
                                <option value="놀람">놀람</option>
                                <option value="혼란">혼란</option>
                            </select>
                        </div>
                    </div>

                    <div class="wi_line"></div>

                    <div id="in_name">
                        <textarea name="writer" id="uname" rows="1" cols="25" placeholder="글쓴이" maxlength="50" required></textarea>
                    </div>

                    <div id="in_content">
                        <textarea name="content" id="ucontent" placeholder="내용" required></textarea>
                    </div>

                    <div id="in_pw">
                        <input type="password" name="pw" id="upw"  placeholder=" 비밀번호" required />  
                    </div>

                    <div id="Locker">
                        <input type="radio" value="0" name="postlock" checked>공개 &nbsp;
                        <input type="radio" value="1" name="postlock">비공개
                    </div>
                    
                    <div id="bt_se">
                        <button type="submit">글 작성</button>
                    </div>
                </form>
            </div>
        </div>
        <?php include "footer.php"; ?>
    </body>
</html>