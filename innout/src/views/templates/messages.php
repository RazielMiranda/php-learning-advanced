<?php
$errors = [];

if(isset($_SESSION['message'])){
    $message = $_SESSION['message'];
    unset($_SESSION['message']);
}elseif (isset($exception)) {
    $message = [
        'type' => 'error',
        'message' => $exception->getMessage()
    ];

    if (get_class($exception) === 'ValidationException') {
        $errors = $exception->getErrors();
    }

}

$alertType = '';

if (!empty($message)) {
    if ($message['type'] === 'error') {
        $alertType = 'danger';
    }else{
        $alertType = 'success';
    }
}

?>

<?php if (!empty($message)) : ?>
    <div class="my-3 alert alert-<?=$alertType?>" role="alert">
        <?= $message['message'] ?>
    </div>
<?php endif; ?>