<?php
session_start();
requireValidSession();

try {
    $newUser = new User($_POST);
    $newUser->insert();
    addSuccesMsg('Usuario cadastrado com sucesso!');
    $_POST = [];
} catch (Exception $e) {
    $exception = $e;
}

loadTemplateView('save_user', $_POST + ['exception' => $exception]);