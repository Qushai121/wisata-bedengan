<nav class="navbar bg-base-100">
  <div class="flex-1">
    <a class="btn btn-ghost normal-case text-xl">Menu Admin</a>
  </div>
  <div class="flex-none">
    <div class="dropdown dropdown-end">
      <label tabindex="0" class="btn btn-ghost btn-circle avatar">
        <div class="w-10 rounded-full">
          <img src=<?= base_url('img/upload/'.userLogin()['foto']); ?> />
        </div>
      </label>
      <ul tabindex="0" class="menu menu-compact dropdown-content mt-3 p-2 shadow bg-base-100 rounded-box w-52">
        <li>
          <a href="<?= site_url('admin/profile'); ?>" class="justify-between">
            <?= userLogin()['username']; ?>
          </a>
        </li>
        <li>
          <a href="<?= site_url('admin/profile'); ?>" class="justify-between">
            Profile
          </a>
        </li>
        <form action="<?= site_url('api/logout'); ?>" method="post">
        <?= csrf_field(); ?>
        <input type="hidden" name="_method" value="DELETE" >
          <li><button type="submit" >Logout</button></li>
        </form>
      </ul>
    </div>
  </div>
</nav>