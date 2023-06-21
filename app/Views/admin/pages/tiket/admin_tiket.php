<?= $this->extend('admin/layout/mainLayout'); ?>

<?= $this->section('dashboardMenu'); ?>
<?php $errors = session()->getFlashdata('errors') ?>
<?php $success = session()->getFlashdata('success') ?>

<?= $this->include('admin/pages/tiket/addTiket'); ?>





<div class="overflow-x-auto w-full mt-6">
  <table id="tablenih" class="table w-full">
    <!-- head -->
    <thead>
      <tr>
        <!-- <th>
          <label>
            <input type="checkbox" class="checkbox" />
          </label>
        </th> -->
        <th class="w-96">Jenis Tiket & Nama Penyewaan</th>
        <th>Harga</th>
        <th>promo</th>
        <th>Setting Tiket</th>
        <th>Aksi</th>
      </tr>
    </thead>
    <tbody>
      <!-- row 1 -->
      <?php foreach ($Tikets as $Tiket) : ?>
        <tr>
          <!-- <th>
            <label>
              <input type="checkbox" class="checkbox" />
            </label>
          </th> -->
          <td>
            <div class="w-52 overflow-auto">
              <div class="font-bold"><?= $Tiket['tiket_nama']; ?></div>
            </div>
          </td>
          <td>
            <p class="w-52 overflow-auto">
              <?= $Tiket['tiket_harga']; ?>
            </p>
          </td>
          <td>
            <p class="w-52 overflow-auto">
              <?= $Tiket['tiket_promo']; ?>
            </p>
          </td>
          <td>
            <div class="w-52 overflow-auto">
              <div>
                <a class="btn btn-sm" href="<?= site_url("admin/tiket/{$Tiket['tiket_id']}/tiket"); ?>">Set Tiket</a>
                <div class="mt-1" >
                  <?php foreach ($TiketJenisWisataBridges as $TiketJenisWisataBridge) : ?>
                    <?php if ($TiketJenisWisataBridge['tiket_id'] == $Tiket['tiket_id']) : ?>
                      <p><?= $TiketJenisWisataBridge['wisata_nama']; ?></p>
                    <?php else : ?>
                      <p></p>
                    <?php endif ?>
                  <?php endforeach ?>
                </div>
              </div>
            </div>
          </td>
          <td>
            <div class="w-52 flex gap-2 overflow-auto">
              <!-- <button class="btn btn-secondary btn-xs">Detail & Edit</button> -->
              <label for='my_modal<?= $Tiket['tiket_id']; ?>' class="btn btn-secondary btn-xs">EDIT / DETAIL</label>
              <input type="checkbox" id="my_modal<?= $Tiket['tiket_id']; ?>" class="modal-toggle" />
              <div class="modal" id=<?= $Tiket['tiket_id']; ?>>
                <div class="modal-box h-fit w-fit">
                  <form id="Tiket" action="<?= site_url("api/admin/tiket/{$Tiket['tiket_id']}"); ?>" method="post">
                    <?= csrf_field(); ?>
                    <input type="hidden" name="_method" value="PUT">
                    <div class="h-fit  flex flex-col gap-4">
                      <label for="tiket_nama">Tiket Nama</label>
                      <input class="input input-bordered input-success w-full max-w-xs" type="text" name="tiket_nama" value="<?= $Tiket['tiket_nama']; ?>" id="">
                      <label for="tiket_harga">Tiket Harga</label>
                      <input class="input input-bordered input-success w-full max-w-xs" type="number" name="tiket_harga" value="<?= $Tiket['tiket_harga']; ?>"></input>
                      <label for="tiket_promo">Tiket Promo</label>
                      <input class="input input-bordered input-success w-full max-w-xs" type="number" name="tiket_promo" class="h-72" value="<?= $Tiket['tiket_promo']; ?>"></input>
                      <label for="penyewaan_id">Tiket Promo</label>
                    </div>
                    <div class="modal-action">
                      <button type="submit" class="btn">
                        Edit
                      </button>
                      <label for="my_modal<?= $Tiket['tiket_id']; ?>" class="btn">X</label>
                    </div>
                  </form>
                </div>
              </div>
              
              <label for='delete<?= $Tiket['tiket_id']; ?>' class="btn btn-xs">Hapus</label>
              <input type="checkbox" id="delete<?= $Tiket['tiket_id']; ?>" class="modal-toggle" />
              <div class="modal" id="delete<?= $Tiket['tiket_id']; ?>">
                <div class="modal-box">
                  <h3 class="text-lg font-bold">Apakah Anda Yakin Menghapus ?</h3>
                  <p class="py-4"><?= $Tiket['tiket_nama']; ?></p>
                  <form action="<?= site_url("api/admin/tiket/delete/{$Tiket['tiket_id']}"); ?>" method="post">
                    <?= csrf_field(); ?>
                    <input type="hidden" name="_method" value="DELETE">
                    <div class="modal-action">
                      <button type="submit" class="btn btn-danger ">Hapus</button>
                      <label for="delete<?= $Tiket['tiket_id']; ?>" class="btn">X</label>
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </td>
        </tr>
      <?php endforeach ?>
    </tbody>
    <!-- foot -->
  </table>
</div>

<?= $this->endSection(); ?>