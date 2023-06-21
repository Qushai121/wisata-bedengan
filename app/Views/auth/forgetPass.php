<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href=<?= base_url('css/app.css'); ?>>
</head>

<body>
    <div class="bg-stone-400 h-[100vh] w-full flex items-center justify-center">
        <div class="bg-white p-5 rounded-lg flex flex-col gap-2">
            <div>
                <h1 class="text-xl font-bold border-2 border-stone-600 rounded-lg block w-fit px-2 py-1">Lupa Pass</h1>
            </div>
            <form action=<?= site_url('api/sendemail'); ?> method="post">
                <?= csrf_field(); ?>
                <div class="p-2">
                    <label class="mx-2" for="email">email</label>
                    <input type="text" id="email" name="email" value="<?= old('email') ?>" placeholder="Masukan email" class="input input-bordered w-full max-w-xs" />
                    <span class="<?= validation_show_error('email') ? '' : 'hidden'; ?> flex items-center font-medium tracking-wide text-red-500 text-xs mt-1 ml-1">
                        <?= validation_show_error('email'); ?>
                    </span>
                </div>

                <div class="flex justify-end">
                    <button type="submit" class="btn">Kirim Token Ke Email</button>
                </div>
                <p class="flex justify-center gap-1 mt-2">Sudah Memiliki Akun ? <a class="text-blue-500" href=<?= site_url('login'); ?>> Login</a></p>
            </form>
        </div>
    </div>
</body>

</html>