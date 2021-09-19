<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/comum.css">
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/icofont.min.css">
    <link rel="stylesheet" href="assets/css/template.css">
    <title>In 'N Out</title>
</head>

<body>
    <header class="header">
        <div class="logo">
            <i class="icofont-travelling"></i>
            <span class="font-weight-light ml-2">In </span>
            <span class="font-weight-bold mx-2">N' </span>
            <span class="font-weight-light mr-2">Out </span>
            <i class="icofont-runner-alt-1"></i>
        </div>
        <div class="menu-toggle mx-3">
            <i class="icofont-navigation-menu"></i>
        </div>
        <div class="spacer"></div>
        <div class="dropdown">
            <div class="dropdown-button">
                <img 
                class="avatar"
                src="http://www.gravatar.com/avatar.php?gravatar_id=
                <?=md5(strtolower(trim(($_SESSION['user']->email ?? '')))) ?>"
                alt="user">
                <span class="ml-3">
                    <?= ($_SESSION['user']->name ?? '') ?>
                </span>
                <i class="icofont-simple-down ml-2"></i>
            </div>
            <div class="dropdown-content">
                <ul class="nav-list">
                    <li class="nav-item">
                        <a href="profile.php">
                            <i class="icofont-card mr-1"></i>
                            Perfil
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="logout.php">
                            <i class="icofont-logout mr-1"></i>
                            Sair
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </header>