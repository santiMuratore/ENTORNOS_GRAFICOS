<?php
setcookie('titular_preferido', '', time() - 3600, "/");
header("Location: periodico.php");
exit();
?>