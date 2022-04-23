<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
<form action="<?= base_url('home/UpdatePost'); ?>" method="post">

<div>
    <input type="text" name="title" value="<?= $singledata['post_title']; ?>">
    <input type="hidden" name="eximage" value="<?= $singledata['post_image']; ?>">
    <input type="hidden" name="id" value="<?= $singledata['post_id']; ?>">
    <?php if(isset($allerror)): ?>
        <?php if($allerror->hasError('title')): ?>
            <h5><?= $allerror->getError('title'); ?></h5>
        <?php endif; ?>
    <?php endif;?>
</div>
<div>
    <textarea name="desc" id="" cols="30" rows="10">
        <?= $singledata['post_content']; ?>
    </textarea>
    <?php if(isset($allerror)): ?>
        <?php if($allerror->hasError('desc')): ?>
            <h5><?= $allerror->getError('desc'); ?></h5>
        <?php endif; ?>
    <?php endif;?>
</div>
<div>
    <img src="<?= base_url(); ?>/public/assets/<?= $singledata['post_image'] ?>" alt="" width="100px" height="100px">
</div>
<div>
    uploaded:
    <input type="file" name="upload">
    <?php if(isset($allerror)): ?>
        <?php if($allerror->hasError('upload')): ?>
            <h5><?= $allerror->getError('upload'); ?></h5>
        <?php endif; ?>
    <?php endif;?>
</div>
<input type="submit">

</form>


<script src="<?= base_url();?>/public/ckeditor/ckeditor.js"></script>
<script>
    CKEDITOR.replace('desc');
</script>
</body>
</html>