<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    $session = session();
    if($session->getTempdata('success')):?>
    <h1><?= $session->getTempdata('success'); ?></h1>
    <?php endif;?>
    
    <?= form_open(); ?>
    <div>
        Name:
        <input type="text" name="username" id="">
        <br>
    </div>
    <div>
        Email:
        <input type="email" name="email" id="">
        <br>
    </div>
    <div>
        Number:
        <input type="number" name="number" id="">
        <br>
    </div>
    <div>
        Password:
        <input type="password" name="psw" id="">
        <br>
    </div>
    <br>
    <br>
    <input type="submit">
    <?= form_close();?>
</body>
</html>