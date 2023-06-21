<!DOCTYPE html>
<html data-theme="light" lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href=<?= base_url('css/app.css'); ?>>
</head>

<body>
    <div class="bg-stone-400 h-[100vh] w-full ">
        <div class="flex justify-center">
            <div class="bg-slate-50 flex flex-col gap-3 text-black rounded-lg py-3 px-6 " >
              <p> Password Anda = <?= $password; ?></p>
              <a href="<?= site_url('login'); ?>">Login</a>
            </div>
        </div>
    </div>
</body>

</html>