<?php
    require_once("./db_con.php"); 
    session_start();
  /*  $userid=$_POST["id"];*/
    $userpw=$_POST["pw"];
    $userpw2=$_POST["pw2"];
    $phone=$_POST["phone"];
    $addr=$_POST["addr"];
    $mail=$_POST["mail"];

/*
    if(preg_match(' ', $userpw, $match)){  // 패스워드 복잡성(공백 불가)
    } else {   
        echo "<script>alert(\"패스워드에는 공백이 들어갈 수 없습니다.\");</script>";
        echo "<script>window.history.back();</script>";
        exit;
    } */
    
    if(preg_match('/[1-9]/', $userpw, $match)){  // 패스워드 복잡성(숫자)
    } else {   
        echo "<script>alert(\"패스워드는 영문과 특수문자 포함 6~12자를 만족해야 합니다.\");</script>";
        echo "<script>window.history.back();</script>";
        exit;
    } 

    if(preg_match('/[!@#$%^&*]/', $userpw, $match)){  // 패스워드 복잡성(특수문자)
    } else {   
        echo "<script>alert(\"패스워드는 영문과 특수문자 포함 6~12자를 만족해야 합니다.\");</script>";
        echo "<script>window.history.back();</script>";
        exit;
    } 

    if(preg_match('/[a-zA-Z]/', $userpw, $match)){ // 패스워드 복잡성 (영문)
    } else {   
        echo "<script>alert(\"패스워드는 영문과 특수문자 포함 6~12자를 만족해야 합니다.\");</script>";
        echo "<script>window.history.back();</script>";
        exit;
    }
    
    if (strlen($userpw) < 6 || strlen($userpw) > 12) {    // 패스워드 길이 (6~12)
        echo "<script>alert(\"패스워드는 6 ~ 12자를 만족해야 합니다.\");</script>";
        echo "<script>window.history.back();</script>";
        exit;
    } 

    
    if ( $userpw != $userpw2 ){
        echo "<script>alert(\"패스워드가 일치하지 않습니다.\");</script>";
         echo "<script>window.history.back();</script>";
        exit;
    }


	$strSQL = "update member set PW='$userpw'";
		if($phone) $strSQL .= ", Phone='$phone'";
		if($addr) $strSQL .= ", Addr='$addr'";
		if($mail) $strSQL .= ", Mail='$mail'"; 
         $strSQL .= " where ID='$_SESSION[userid]'"; 
      


    if (mysqli_query($conn,$strSQL)){
        echo "<script>alert(\"개인정보가 수정되었습니다.\");</script>";
	    echo "<script>location.replace('../index_auth.html');</script>"; 
        exit;
    } else { 
	    echo "<script>alert(\"오류 발생 : 관리자에게 문의하세요.\");</script>";
        echo "<script>location.replace('../index_auth.html');</script>";
        exit;
    }
?>
