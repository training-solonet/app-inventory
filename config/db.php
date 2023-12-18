<?php
//   mengoneksikan database

try {
    $conn = new mysqli('localhost', 'root', '', 'app_inventaris');
} catch (Exception $e) {
    echo $e->getMessage();
}
?>