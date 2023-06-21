<?= $this->extend('admin/layout/mainLayout'); ?>

<?= $this->section('dashboardMenu'); ?>


<?= $this->include('admin/pages/penyewaan/addpenyewaan'); ?>


<div class="overflow-x-auto w-full mt-6">
  <table id="tablenih" class="table w-full">
    <!-- head -->
    <thead>
      <tr>

        <th>fasilitas Umum Nama</th>
        <th>Detail</th>
        <th>Lokasi</th>
        <th>Status</th>
        <th>Harga</th>
        <th>Gambar</th>
        <th>Aksi</th>
      </tr>
    </thead>
    <tbody>
      <!-- row 1 -->
      <?php foreach ($Penyewaans as $penyewaan) : ?>
        <tr>

          <td>
            <?= $penyewaan['penyewaan_nama']; ?>
          </td>

          <td>
            <p class="w-52 overflow-auto">
              <?= $penyewaan['penyewaan_detail']; ?>
            </p>
          </td>
          <td>
            <p class="w-52 overflow-auto">
              <?= $penyewaan['penyewaan_lokasi']; ?>
            </p>
          </td>
          <td>
            <p class="w-52 overflow-auto">
              <?= $penyewaan['status_detail']; ?>
            </p>
          </td>
          <td>
            <p class="w-52 overflow-auto">
              <?= $penyewaan['penyewaan_harga']; ?>
            </p>
          </td>
          
          <td>
            <div class="flex items-center space-x-3">
              <div class="avatar">
                <div class="mask mask-squircle w-12 h-12">
                  <img src="<?= base_url("/img/upload/{$penyewaan['penyewaan_gambar']}"); ?>" alt="<?= $penyewaan['penyewaan_gambar']; ?>" />
                </div>
              </div>
              <div>
                <div class="font-bold"><?= $penyewaan['penyewaan_gambar']; ?></div>
              </div>
            </div>
          </td>
          <th class="flex flex-col gap-2 lg:gap-4">
            <!-- <button class="btn btn-secondary btn-xs">Detail & Edit</button> -->
            <div>
              <label for=edit<?= $penyewaan['penyewaan_id']; ?> class="btn btn-secondary btn-xs">EDIT / DETAIL</label>
              <input type="checkbox" id="edit<?= $penyewaan['penyewaan_id']; ?>" class="modal-toggle" />
              <div class="modal" >
                <div class="modal-box h-fit">
                  <form id="penyewaan" action="<?= site_url("api/admin/penyewaan/{$penyewaan['penyewaan_id']}"); ?>" method="post" enctype="multipart/form-data">
                    <?= csrf_field(); ?>
                    <input type="hidden" name="_method" value="PUT">
                    <div class="h-fit flex flex-col gap-4">
                      <input type="hidden" name="penyewaan_gambar_lama" value="<?= $penyewaan['penyewaan_gambar']; ?>">
                      <label for="penyewaan_nama">Fasilitas Umum Nama</label>
                      <input class="input input-bordered input-success w-full max-w-xs" type="text" name="penyewaan_nama" value="<?= $penyewaan['penyewaan_nama']; ?>" id="penyewaan_nama">
                      <label for="penyewaan_gambar">Gambar</label>
                      <input class="file-input file-input-bordered file-input-success w-full max-w-xs" type="file" accept="jpg,.jpeg,.png,.webp" name="penyewaan_gambar" value="<?= $penyewaan['penyewaan_gambar']; ?>" id="penyewaan_gambar">
                      <label for="penyewaan_detail">Detail</label>
                      <textarea class="textarea textarea-success" name="penyewaan_detail" id="penyewaan_detail"><?= $penyewaan['penyewaan_detail']; ?></textarea>
                      <label for="penyewaan_harga">Harga</label>
                <input class="input input-bordered input-success w-full max-w-xs" type="number" name="penyewaan_harga" value="<?= $penyewaan['penyewaan_harga']; ?>" id="penyewaan_harga"></input>
                      <label for="penyewaan_lokasi">lokasi</label>
                      <textarea class="textarea textarea-success" name="penyewaan_lokasi" id="penyewaan_lokasi"><?= $penyewaan['penyewaan_lokasi']; ?></textarea>
                      <label for="penyewaan_status">Status</label>
                      <select id="penyewaan_status" name="penyewaan_status" class="select select-success w-full max-w-xs">
                        <option disabled selected>Pilih Jenis Status</option>
                        <?php foreach ($Statuss as $Status) : ?>
                          <option <?= $Status['status_id'] == $penyewaan['penyewaan_status'] ? 'selected' : ''; ?> value="<?= $Status['status_id']; ?>"><?= $Status['status_detail']; ?></option>
                        <?php endforeach ?>
                      </select>
                      <div class="modal-action">
                        <button type="submit" class="btn">
                          Edit
                        </button>
                        <label for=edit<?= $penyewaan['penyewaan_id']; ?> class="btn">X</label>
                      </div>
                  </form>
                </div>
              </div>
            </div>
            <div class="mt-2">
              <!-- The button to open modal -->
              <label for="delete<?= $penyewaan['penyewaan_id']; ?>" class=" btn btn-danger btn-xs">Hapus</label>
              <input type="checkbox" id="delete<?= $penyewaan['penyewaan_id']; ?>" class="modal-toggle" />
              <div class="modal" >
                <div class="modal-box">
                  <h3 class="text-lg font-bold">Apakah Anda Yakin Menghapus ?</h3>
                  <p class="py-4"><?= $penyewaan['penyewaan_nama']; ?></p>
                  <form action="<?= site_url("api/admin/penyewaan/delete/{$penyewaan['penyewaan_id']}"); ?>" method="post">

                    <?= csrf_field(); ?>
                    <input type="hidden" name="_method" value="DELETE">
                    <div class="modal-action">
                      <button type="submit" class="btn btn-danger ">Hapus</button>
                      <label for="delete<?= $penyewaan['penyewaan_id']; ?>" class="btn">X</label>

                    </div>
                  </form>
                </div>
              </div>
            </div>
          </th>
        </tr>
      <?php endforeach ?>
    </tbody>
    <!-- foot -->
  </table>
</div>
<?= $this->endSection(); ?>