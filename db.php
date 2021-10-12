<?php
    header('Content-Type: text/html; charset=UTP-8');

    // localhost = DB주소, web=DB계정아이디, 1234=DB계정비밀번호, post_board="DB이름"
    $db = new mysqli("localhost","ran","1234","eventboard","3306");
    //예전엔 mysql을 썼으나 기술이 점점 복잡해짐에 따라 확장형인 mysqli를 쓰게됨
    $db -> set_charset("utf-8");

    function SQLsyn($sql) {
        global $db;
        return $db -> query($sql);
    }
?>