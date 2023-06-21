<?= $this->extend('admin/layout/mainLayout'); ?>

<?= $this->section('dashboardMenu'); ?>


<?= $this->include('admin/pages/jeniswisata/addJenisWisata'); ?>







<div class="overflow-x-auto w-full mt-6">
  <table id="tablenih" class="table w-full">
    <!-- head -->
    <thead>
      <tr>
        <!-- <th>
            <label>
              <input type="checkbox" class="checkbox selectSemuaData" />
            </label>
          </th> -->
        <th>Jenis Wisata</th>
        <th>Thumbnail</th>
        <th>Deskripsi</th>
        <th>Detail Blog</th>
        <th>Status</th>
        <th>Setting Tiket</th>
        <th>Aksi</th>
      </tr>
    </thead>
    <tbody>
      <!-- row 1 -->
      <?php foreach ($JenisWisatas as $jenisWisata) : ?>
        <tr>

          <td>
            <?= $jenisWisata['wisata_nama']; ?>
          </td>
          <td>
            <div class="flex items-center space-x-3">
              <div class="avatar">
                <div class="mask mask-squircle w-12 h-12">
                  <img src="<?= base_url("/img/upload/{$jenisWisata['wisata_thumbnail']}"); ?>" alt="<?= $jenisWisata['wisata_thumbnail']; ?>" />
                </div>
              </div>
              <div>
                <div class="font-bold"><?= $jenisWisata['wisata_thumbnail']; ?></div>
              </div>
            </div>
          </td>
          <td>
            <p class="w-52 overflow-auto">
              <?= $jenisWisata['wisata_description']; ?>
            </p>
          </td>
          <td>
            <p class="w-52 overflow-auto">
              <?= $jenisWisata['wisata_detail']; ?>
            </p>
          </td>
          <td>
            <p class="w-52 overflow-auto">
              <?= $jenisWisata['status_detail']; ?>
            </p>
          </td>
          <td>
            <div class="w-52 overflow-auto">
              <div>
                <a class="btn btn-sm" href="<?= site_url("admin/tiket/{$jenisWisata['jeniswisata_id']}/jeniswisata"); ?>">Set Tiket</a>
                <div class="mt-1">
                  <?php foreach ($jenisWisataTiketBridges as $jenisWisataTiketBridge) : ?>
                    <?php if ($jenisWisataTiketBridge['jeniswisata_id'] == $jenisWisata['jeniswisata_id']) : ?>
                      <p><?= $jenisWisataTiketBridge['tiket_nama']; ?></p>
                    <?php else : ?>
                      <p></p>
                    <?php endif ?>
                  <?php endforeach ?>
                </div>
              </div>
            </div>
          </td>
          <th class="flex flex-col gap-2 lg:gap-2">
            <!-- <button class="btn btn-secondary btn-xs">Detail & Edit</button> -->
            <div>
              <label for=my_modal<?= $jenisWisata['jeniswisata_id']; ?> class="btn btn-secondary btn-xs">EDIT / DETAIL</label>
              <input type="checkbox" id=my_modal<?= $jenisWisata['jeniswisata_id']; ?> class="modal-toggle" />
              <div class="modal" id=<?= $jenisWisata['jeniswisata_id']; ?>>
                <div class="modal-box h-fit">

                  <?php $errors = session()->getFlashdata('errors') ?>
                  <?php if (isset($errors['validasi'])) : ?>
                    <div class="bg-error flex flex-col w-fit gap-1 rounded-md text-stone-300 mb-4">
                      <div class="mx-4 py-2 ">
                        <?php foreach ($errors['validasi'] as $error) : ?>
                          <div class="w-fit">
                            <?= $error; ?>
                          </div>
                        <?php endforeach ?>
                      </div>
                    </div>
                  <?php endif ?>

                  <form id="jenisWisata" action="<?= site_url("api/admin/jenis-wisata/{$jenisWisata['jeniswisata_id']}"); ?>" method="post" enctype="multipart/form-data">
                    <?= csrf_field(); ?>
                    <input type="hidden" name="_method" value="PUT">
                    <div class="h-fit flex flex-col gap-4">
                      <input type="hidden" name="wisata_thumbnail_lama" id="" value="<?= $jenisWisata['wisata_thumbnail']; ?>">
                      <label for="wisata_nama">Jenis Nama</label>
                      <input class="input input-bordered input-success w-full max-w-xs" type="text" name="wisata_nama" value="<?= $jenisWisata['wisata_nama']; ?>" id="wisata_nama">
                      <label for="wisata_thumbnail">Thumbnail</label>
                      <input class="file-input file-input-bordered file-input-success w-full max-w-xs" type="file" name="wisata_thumbnail" id="wisata_thumbnail" accept="jpg,.jpeg,.png,.webp">
                      <label for="wisata_description">Deskripsi</label>
                      <textarea class="textarea textarea-success" name="wisata_description" id="wisata_description"><?= $jenisWisata['wisata_description']; ?></textarea>
                      <label for="wisata_detail">Detail Blog</label>
                      <textarea class="textarea textarea-success" name="wisata_detail" class="h-72" id="wisata_detail"><?= $jenisWisata['wisata_detail']; ?></textarea>
                      <label for="wisata_status">Detail Blog</label>
                      <select id="wisata_status" name="wisata_status" class="select select-success w-full max-w-xs">
                        <option disabled selected>Pilih Jenis Status</option>
                        <?php foreach ($Statuss as $Status) : ?>
                          <option <?= $Status['status_id'] == $jenisWisata['wisata_status'] ? 'selected' : ''; ?> value="<?= $Status['status_id']; ?>"><?= $Status['status_detail']; ?></option>
                        <?php endforeach ?>
                      </select>
                    </div>
                    <div class="modal-action">
                      <button type="submit" class="btn">
                        Edit
                      </button>
                      <label for=my_modal<?= $jenisWisata['jeniswisata_id']; ?> class="btn">X</label>
                    </div>
                  </form>
                </div>
              </div>
            </div>
            <div>
              <!-- The button to open modal -->
              <label for=my_modaldelete<?= $jenisWisata['jeniswisata_id']; ?> class="btn btn-xs">Hapus</label>
              <input type="checkbox" id=my_modaldelete<?= $jenisWisata['jeniswisata_id']; ?> class="modal-toggle" />
              <div class="modal" id="delete<?= $jenisWisata['jeniswisata_id']; ?>">
                <div class="modal-box">
                  <h3 class="text-lg font-bold">Apakah Anda Yakin Menghapus ?</h3>
                  <p class="py-4"><?= $jenisWisata['wisata_nama']; ?></p>
                  <form action="<?= site_url("api/admin/jenis-wisata/delete/{$jenisWisata['jeniswisata_id']}"); ?>" method="post">
                    <?= csrf_field(); ?>
                    <input type="hidden" name="_method" value="DELETE">
                    <div class="modal-action">
                      <button type="submit" class="btn btn-danger ">Hapus</button>
                      <label for=my_modaldelete<?= $jenisWisata['jeniswisata_id']; ?> class="btn">X</label>

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