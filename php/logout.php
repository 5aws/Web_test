<?php
    session_start();
    session_destroy();   // 세션파기
    echo "<script>alert(\"로그아웃 성공\");</script>";
    echo "<script>location.replace('../index.html');</script>";    
?>







