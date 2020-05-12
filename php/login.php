<?php
    require_once("./db_con.php");
    $userid=$_POST["login_id"];
    $userpw=$_POST["login_pw"];
    $match=0;

    $sql_check="SELECT * FROM member WHERE ID='$userid' and PW='$userpw'";
    
    $result=$conn->query($sql_check);
    $num = $result->num_rows;
    

/*
    if(preg_match(' ', $userpw, $match)){  // 패스워드 복잡성(공백 불가)
    } else {   
        echo "<script>alert(\"패스워드에는 공백이 들어갈 수 없습니다.\");</script>";
        echo "<script>window.history.back();</script>";
        exit;
    } */

    if(preg_match('/[1-9]/', $userpw, $match)){  // 패스워드 복잡성(숫자)
    } else {   
        echo "<script>alert(\"패스워드는 숫자, 영문, 특수문자 포함 6~12자를 만족해야 합니다.\");</script>";
        echo "<script>window.history.back();</script>";
        exit;
    } 

    if(preg_match('/[!@#$%^&*]/', $userpw, $match)){  // 패스워드 복잡성(영문)
    } else {   
        echo "<script>alert(\"패스워드는 숫자, 영문, 특수문자 포함 6~12자를 만족해야 합니다.\");</script>";
        echo "<script>window.history.back();</script>";
        exit;
    } 

    if(preg_match('/[a-zA-Z]/', $userpw, $match)){ // 패스워드 복잡성 (특수문자)
    } else {   
        echo "<script>alert(\"패스워드는 숫자, 영문, 특수문자 포함 6~12자를 만족해야 합니다.\");</script>";
        echo "<script>window.history.back();</script>";
        exit;
    }
    
    if(strlen($userpw) < 6 || strlen($userpw) > 12) // 패스워드 길이
    {   
        echo "<script>alert(\"패스워드는 숫자, 영문, 특수문자 포함 6~12자를 만족해야 합니다.\");</script>";
        echo "<script>window.history.back();</script>";
        exit;
    }


    if($num > 0) {
        session_start(); // 새로운 세션 만들고,
        $_SESSION["userid"] = $userid; //연결정보를 기록한다는 의미 즉 다른 페이지로 넘어가도 로그인 유지
        echo "<script>alert(\"환영합니다\");</script>";
        echo "<script>location.replace('../index_auth.html');</script>";

    } else {
        echo "<script>alert(\"인증실패\");</script>";
        echo "<script>window.history.back();</script>";
    }
?>

