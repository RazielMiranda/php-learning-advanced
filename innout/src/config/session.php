<?php

function requireValidSession($requiresAdmin = false){
    $user = $_SESSION['user'];
    if (!isset($user)) {
        header('Location: login.php');
        die;
    }elseif ($requiresAdmin && !$user->is_admin) {
        addErrorMsg('acesso negado');
        header('Location: day_records.php');
        exit;
    }
}