<?php
// Para borrar una cookie, se caduca (time()-1).
setcookie ( "idioma_solicitado", "", time () - 1, "/" );
?>
<a href=""usar-cookie.php">Regresar</a>