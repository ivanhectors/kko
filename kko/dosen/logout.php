<?php
session_start();
$_SESSION['dlogin']=="";
unset($_SESSION["dlogin"]);
//session_destroy();
$_SESSION['errmsg']=" You have successfully logout";
?>
<script language="javascript">
document.location="index.php";
</script>
