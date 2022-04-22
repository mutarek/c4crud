<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
<?= form_open_multipart(); ?>

<div>
    <input type="text" name="title">
    <?php if(isset($allerror)): ?>
        <?php if($allerror->hasError('title')): ?>
            <h5><?= $allerror->getError('title'); ?></h5>
        <?php endif; ?>
    <?php endif;?>
</div>
<div>
    <textarea name="desc" id="" cols="30" rows="10">
        
    </textarea>
    <?php if(isset($allerror)): ?>
        <?php if($allerror->hasError('desc')): ?>
            <h5><?= $allerror->getError('desc'); ?></h5>
        <?php endif; ?>
    <?php endif;?>
</div>
<div>
    uploaded:
    <input type="file" name="upload[]" multiple="">
    <?php if(isset($allerror)): ?>
        <?php if($allerror->hasError('upload')): ?>
            <h5><?= $allerror->getError('upload'); ?></h5>
        <?php endif; ?>
    <?php endif;?>
</div>
<input type="submit">

<?= form_close();?>



<script src="<?= base_url();?>/public/ckeditor/ckeditor.js"></script>
<script>
    CKEDITOR.replace('desc');
</script>
</body>
</html>