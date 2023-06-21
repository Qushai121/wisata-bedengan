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
                <h1 class="text-xl font-bold border-2 border-stone-600 rounded-lg block w-fit px-2 py-1" >Login</h1>
            </div>
            <form action=<?= site_url('api/login'); ?> method="post">
            <?= csrf_field(); ?>
            <div class="p-2">
                <label class="mx-2" for="email">Email</label>
                <input type="text" id="email" name="email" value="<?= old('email') ?>" placeholder="Masukan Email" class="input input-bordered w-full max-w-xs" />
                <span class="<?=(session()->getFlashdata('email')) ? '':'hidden'; ?> flex items-center font-medium tracking-wide text-red-500 text-xs mt-1 ml-1">
                   <?= (session()->getFlashdata('email')) ?>
                </span>
            </div>
            <div class="p-2">
                <label class="mx-2" for="password">Password</label>
                <input type="text" id="password" name="password" value="<?= old('password') ?>" placeholder="Masukan Password" class="input input-bordered w-full max-w-xs" />
                <span class="<?=(session()->getFlashdata('password')) ? '':'hidden'; ?> flex items-center font-medium tracking-wide text-red-500 text-xs mt-1 ml-1">
                   <?= (session()->getFlashdata('password')) ?>
                </span>
            </div>
            <span class="divide-x-2" ></span>
            <div class="flex justify-center" >
                <button type="submit" class="btn px-9">Login</button>
            </div>
        </form>
        <p class="justify-center flex mr-3 gap-2">Tidak Memilikin akun ? <a class="text-blue-500" href=<?= base_url('register'); ?> >Register</a></p>
        <p class="justify-center <?=(session()->getFlashdata('password')) ? '':'hidden'; ?> flex mr-3 gap-2">Lupa Password ? <a class="text-blue-500" href=<?= base_url('forgetpass'); ?> >Yes</a></p>
            <div>
                <span class="flex justify-center font-light text-sm">Copyright by Uhuy.ltd</span>
            </div>
        </div>
    </div>
</body>
</html>