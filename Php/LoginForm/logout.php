<?php
session_start();
?>
<html>
<body>

<?php
// remove all session variables
session_unset();

// destroy the session
session_destroy();

header('Location:form.php');
exit;
?>

</body>
</html>
