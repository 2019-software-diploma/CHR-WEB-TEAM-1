<?php
    //header("Expires: Mon, 26 Jul 1997 05:00:00 GMT"); /               / La pagina ya expiró
    //header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");    // Fue modificada
    header("Cache-Control: no-cache, must-revalidate");                 // Evitar guardado en cache del cliente HTTP/1.1
    header("Pragma: no-cache");                                         // Evitar guardado en cache del cliente HTTP/1.0
?>