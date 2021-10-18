<!doctype html>
<head>
<meta charset="UTF-8">
<title>글쓰기</title>
<link rel="stylesheet" type="text/css" href="/eventboard/css/style.css?ver=1"/>
</head>
<body>
    <div id="board_write">
        <h1><a href="/eventboard/index.php">사건게시판</a></h1>
        <h4>글을 작성하는 공간입니다.</h4>
            <div id="write_area">
                <form action="/eventboard/writeON.php" method="post">
                    <div id="in_title">
                        <textarea name="title" id="utitle" rows="1" cols="55" placeholder="제목" maxlength="100" required></textarea>
                    </div>

                    <div class="wi_line"></div>

                    <div id="in_name">
                        <textarea name="writer" id="uname" rows="1" cols="25" placeholder="글쓴이" maxlength="50" required></textarea>
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

                    <div class="wi_line"></div>

                    <div id="in_content">
                        <textarea name="content" id="ucontent" placeholder="내용" required></textarea>
                    </div>

                    <div id="in_pw">
                        <input type="password" name="pw" id="upw"  placeholder="비밀번호" required />  
                    </div>
                    
                    <div class="bt_se">
                        <button type="submit">글 작성</button>
                    </div>
                </form>
            </div>
        </div>
    </body>
</html>