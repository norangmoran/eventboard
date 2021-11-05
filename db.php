<?php
    header('Content-Type: text/html; charset=UTF-8');
    //                 DB 주소    계정  계정비번   DB이름   PORT번호
    $db = new mysqli("localhost","ran","1234","eventboard","3306");
    //MySQL에 접속하기위한 정보를 매개변수로 mysqli함수에 new키워드로 객체 생성
    //db변수에 할당
    $db -> set_charset("utf-8");
    //db 내부에 set_charset함수에 utf-8부여. 문자셋 설정

    function SQLsyn($sql) { //쿼리 실행을 위한 함수SQLsyn을 만듬
        global $db;
        return $db -> query($sql);
    }
?>