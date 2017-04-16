<?php

include 'config.php';

setcookie('toto', 'tete', time() + 1000, '/');

echo '<pre>';
print_r($_COOKIE);
echo '</pre>';
exit;