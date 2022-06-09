<?php

session_start();

if (!isset($_SESSION['email_pelanggan'])) {
    $_SESSION['email_pelanggan'] = 'unset';
} else {
    return;
}

?>