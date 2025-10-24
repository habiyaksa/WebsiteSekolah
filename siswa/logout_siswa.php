<?php
session_start();
session_destroy();
header("Location:../ekstra.php");
exit;
?>