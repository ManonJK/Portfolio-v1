<?php
    if(session_status() != PHP_SESSION_ACTIVE) { session_start();}

?>

<form name="deco" method="POST" action="deconnect.php">
    <input type="submit" name="submit" value="Se déconnecter" />
</form>