<!DOCTYPE html>
<html data-theme="dark" lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="<?= base_url('css/app.css'); ?>">
    <link rel="stylesheet" href="<?= base_url('css/dashboardMenu.css'); ?>">
    <script src=<?= base_url('/js/jquery-3.7.0.min.js'); ?>></script>
    <link rel="stylesheet" href="<?= base_url('DataTables-1.13.4/css/jquery.dataTables.min.css'); ?>">
    <script src="<?= base_url('DataTables-1.13.4/js/jquery.dataTables.min.js'); ?>" defer></script>
   
</head>

<body>
    <div class="drawer drawer-mobile overflow-hidden">
        <input id="my-drawer-3" type="checkbox" class="drawer-toggle" />
        <div class="drawer-content flex flex-col">
            <!-- Navbar -->
         
            <div class="w-full navbar bg-base-300">
                <div class="flex-none lg:hidden ">
                    <label for="my-drawer-3" class="btn btn-square btn-ghost">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" class="inline-block w-6 h-6 stroke-current">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
                        </svg>
                    </label>
                </div>
                <?= $this->include('admin/layout/admin_navbar'); ?>

            </div>
            <!-- Page content here -->
            <div class="lg:mx-2" >
                <?= $this->include('admin/components/pesanToast'); ?>
                <?= $this->renderSection('dashboardMenu'); ?>
            </div>

        </div>
        <div class="drawer-side lg:border-r-2 lg:border-primary ">
            <label for="my-drawer-3" class="drawer-overlay"></label>
            <ul class="menu p-4 w-60 bg-base-100">
                <!-- Sidebar content here -->
                <?= $this->include('admin/layout/sidebar'); ?>

            </ul>

        </div>
    </div>
    <script>
        // INI UNTUK NUTUP TOASTY ALERT 
  $(".tutup").click(function () { 
    $(".alert").addClass('hidden')
   })

   $(document).ready(function() {
    $('#tablenih').DataTable()

  })
</script>
</body>
</html>