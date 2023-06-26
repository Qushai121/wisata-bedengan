<!DOCTYPE html>
<html data-theme="light"  lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="<?= base_url('css/app.css'); ?>">
    <script src=<?= base_url('/js/jquery-3.7.0.min.js'); ?> defer></script>
    <?= $this->renderSection('head'); ?>
</head>

<body class="h-fit text-stone-700 ">
    <?= $this->include('shared/navbar'); ?>
    <div>
        <div class="xl:mx-56">
            <?= $this->renderSection('body'); ?>
        </div>
        <div class="mt-16">
            <?= $this->include('shared/footer'); ?>
        </div>
    </div>
</body>

</html>