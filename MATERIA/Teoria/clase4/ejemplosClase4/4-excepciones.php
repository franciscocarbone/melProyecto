<?php
try {
    $error = 'Siempre levanto este errorrrrrrr.... <br/>';
    throw new Exception($error);
echo 'Hola Mundo';
    // C�digo siguiente a una expeci�n que no se ejecuta.
    echo 'Nunca se ejecuta';

} catch (Exception $e) {
    echo '[Atendiendo la excepci�n: ] ',  $e->getMessage(), "\n";
}

// Continua la ejecuci�n

?> 
