<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home::Dhaka City</title>
</head>
<body>
        <div>
        <h1><?= $singledata['post_title']?></h1>
        <div>
            <img src="<?= base_url();?>/public/assets/<?= $singledata['post_image'] ?>" alt="" height="200px" width="200px">
        </div>
        <div>
            <p><?= $singledata['post_content']; ?></p>
        </div>
        <a href="<?= base_url('home/EditPost/'.$singledata['post_id']);?>">
            Edit
        </a>
        <a href="">
            Delete
        </a>
    </div>
    
</body>
</html>