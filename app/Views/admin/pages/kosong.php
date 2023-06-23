<?= $this->extend('admin/layout/mainLayout'); ?>

<?= $this->section('dashboardMenu'); ?>
<div class="flex justify-center my-4 ">
  <div class="text-2xl font-bold">
    Data Yang Sudah Di Upload <?= userLogin()['username']; ?>
  </div>
</div>
<div class="flex flex-wrap justify-center">
  <div method="dialog" class="modal-box">
    <div class="flex flex-col items-center">
      <h3 class="font-bold text-[40px]">JenisWisata</h3>
      <p class="py-4 text-[30px]"><?= $JenisWisatas; ?></p>
    </div>
  </div>
  <div method="dialog" class="modal-box">
    <div class="flex flex-col items-center">
      <h3 class="font-bold text-[40px]">Wisata Section</h3>
      <p class="py-4 text-[30px]"><?= $WisataSections; ?></p>
    </div>
  </div>
  <div method="dialog" class="modal-box">
    <div class="flex flex-col items-center">
      <h3 class="font-bold text-[40px]">Fasilitas Umum</h3>
      <p class="py-4 text-[30px]"><?= $FasilitasUmums; ?></p>
    </div>
  </div>
  <div method="dialog" class="modal-box">
    <div class="flex flex-col items-center">
      <h3 class="font-bold text-[40px]">Fasilitas Penyewaan</h3>
      <p class="py-4 text-[30px]"><?= $Penyewaans; ?></p>
    </div>
  </div>
</div>
<?= $this->endSection(); ?>