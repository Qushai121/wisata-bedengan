<?= $this->extend('admin/layout/mainLayout'); ?>

<?= $this->section('dashboardMenu'); ?>


<?= $this->include('admin/pages/fasilitasumum/addFasilitasumum'); ?>


<div class="overflow-x-auto w-full mt-6">
  <table id="tablenih" class="table w-full">
    <!-- head -->
    <thead>
      <tr>

        <th>fasilitas Umum Nama</th>
        <th>Detail</th>
        <th>Lokasi</th>
        <th>Status</th>
        <th>Gambar</th>
        <th>Aksi</th>
      </tr>
    </thead>
    <tbody>
      <!-- row 1 -->
      <?php foreach ($Fasilitasumums as $Fasilitasumum) : ?>
        <tr>

          <td>
            <?= $Fasilitasumum['fasilitasumum_nama']; ?>
          </td>

          <td>
            <p class="w-52 overflow-auto">
              <?= $Fasilitasumum['fasilitasumum_detail']; ?>
            </p>
          </td>
          <td>
            <p class="w-52 overflow-auto">
              <?= $Fasilitasumum['fasilitasumum_lokasi']; ?>
            </p>
          </td>
          <td>
            <p class="w-52 overflow-auto">
              <?= $Fasilitasumum['status_detail']; ?>
            </p>
          </td>

          <td>
            <div class="flex items-center space-x-3">
              <div class="avatar">
                <div class="mask mask-squircle w-12 h-12">
                  <img src="<?= base_url("/img/upload/{$Fasilitasumum['fasilitasumum_gambar']}"); ?>" alt="<?= $Fasilitasumum['fasilitasumum_gambar']; ?>" />
                </div>
              </div>
              <div>
                <div class="font-bold"><?= $Fasilitasumum['fasilitasumum_gambar']; ?></div>
              </div>
            </div>


          </td>
          <th class="flex flex-col gap-2 lg:gap-4">
            <!-- <button class="btn btn-secondary btn-xs">Detail & Edit</button> -->
            <div>
              <label for="edit<?= $Fasilitasumum['fasilitasumum_id']; ?>" class="btn btn-secondary btn-xs">EDIT / DETAIL</label>
              <input type="checkbox" id="edit<?= $Fasilitasumum['fasilitasumum_id']; ?>" class="modal-toggle" />
              <div class="modal" id=<?= $Fasilitasumum['fasilitasumum_id']; ?>>
                <div class="modal-box h-fit">
                  <form id="Fasilitasumum" action="<?= site_url("api/admin/fasilitasumum/{$Fasilitasumum['fasilitasumum_id']}"); ?>" method="post" enctype="multipart/form-data">
                    <?= csrf_field(); ?>
                    <input type="hidden" name="_method" value="PUT">
                    <div class="h-fit flex flex-col gap-4">
                      <input type="hidden" name="fasilitasumum_gambar_lama" value="<?= $Fasilitasumum['fasilitasumum_gambar']; ?>">
                      <label for="fasilitasumum_nama">Fasilitas Umum Nama</label>
                      <input class="input input-bordered input-success w-full max-w-xs" type="text" name="fasilitasumum_nama" value="<?= $Fasilitasumum['fasilitasumum_nama']; ?>" id="fasilitasumum_nama">
                      <label for="fasilitasumum_gambar">Gambar</label>
                      <input class="file-input file-input-bordered file-input-success w-full max-w-xs" type="file" accept="jpg,.jpeg,.png,.webp" name="fasilitasumum_gambar" value="<?= $Fasilitasumum['fasilitasumum_gambar']; ?>" id="fasilitasumum_gambar">
                      <label for="fasilitasumum_detail">Detail</label>
                      <textarea class="textarea textarea-success" name="fasilitasumum_detail" id="fasilitasumum_detail"><?= $Fasilitasumum['fasilitasumum_detail']; ?></textarea>
                      <label for="fasilitasumum_lokasi">lokasi</label>
                      <textarea class="textarea textarea-success" name="fasilitasumum_lokasi" id="fasilitasumum_lokasi"><?= $Fasilitasumum['fasilitasumum_lokasi']; ?></textarea>
                      <label for="fasilitasumum_status">Fasilitas Umum Status</label>
                      <select id="fasilitasumum_status" name="fasilitasumum_status" class="select select-success w-full max-w-xs">
                        <option disabled selected>Pilih Jenis Status</option>
                        <?php foreach ($Statuss as $Status) : ?>
                          <option <?= $Status['status_id'] == $Fasilitasumum['fasilitasumum_status'] ? 'selected' : ''; ?> value="<?= $Status['status_id']; ?>"><?= $Status['status_detail']; ?></option>
                        <?php endforeach ?>
                      </select>
                      <div class="modal-action">
                        <button type="submit" class="btn">
                          Edit
                        </button>
                        <label for="edit<?= $Fasilitasumum['fasilitasumum_id']; ?>" class="btn">X</label>
                      </div>
                  </form>
                </div>
              </div>
            </div>
            <div class="mt-2">
              <!-- The button to open modal -->
              <label for="delete<?= $Fasilitasumum['fasilitasumum_id']; ?>" class=" btn btn-danger btn-xs">Hapus</label>
              <input type="checkbox" id="delete<?= $Fasilitasumum['fasilitasumum_id']; ?>" class="modal-toggle" />
              <div class="modal" id="delete<?= $Fasilitasumum['fasilitasumum_id']; ?>">
                <div class="modal-box">
                  <h3 class="text-lg font-bold">Apakah Anda Yakin Menghapus ?</h3>
                  <p class="py-4"><?= $Fasilitasumum['fasilitasumum_nama']; ?></p>
                  <form action="<?= site_url("api/admin/fasilitasumum/delete/{$Fasilitasumum['fasilitasumum_id']}"); ?>" method="post">

                    <?= csrf_field(); ?>
                    <input type="hidden" name="_method" value="DELETE">
                    <div class="modal-action">
                      <button type="submit" class="btn btn-danger ">Hapus</button>
                      <label for="delete<?= $Fasilitasumum['fasilitasumum_id']; ?>" class="btn">X</label>
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