<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home::Dhaka City</title>
</head>
<body>
    <?php foreach($data as $d):?>
        <div>
        <h1><?= $d['post_title']?></h1>
        <div>
            <img src="<?= base_url();?>/public/assets/<?= $d['post_image'] ?>" alt="" height="200px" width="200px">
        </div>
        <div>
            <p>content</p>
        </div>
        <a href="<?= base_url('home/ShowSingle/'.$d['post_id']); ?>">
            More
        </a>
    </div>
    <?php endforeach;?>
</body>
</html>