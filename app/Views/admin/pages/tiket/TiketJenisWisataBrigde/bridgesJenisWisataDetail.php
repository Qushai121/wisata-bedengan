<?= $this->extend('admin/layout/mainLayout'); ?>

<?= $this->section('dashboardMenu'); ?>

<div>
    <?php if ($tipeGet == 'tiket') : ?>

        <div class="flex flex-col items-center gap-2">
            <h1 class="h-fit p-4 rounded-xl bg-blue-600 text-white">Penyewaan Yang Tersambung Dengan Tiket : <?= $Tiketbyids['tiket_nama']; ?> </h1>
        </div>

        <label for="my_tiketAdd" class="btn mb-4 mx-2">Tambah Sambungan Tiket </label>
        <input type="checkbox" id="my_tiketAdd" class="modal-toggle" />
        <div class="modal">
            <div class="modal-box">
                <h3 class="font-bold text-lg my-2">Sambungkan Tiket</h3>
                <form action="<?= site_url('api/admin/jeniswisatatiketbridge/add'); ?>" method="post">
                    <?= csrf_field(); ?>
                    <input type="hidden" name="tiket_id" value="<?= $Tiketbyids['tiket_id']; ?>">
                    <select name="jeniswisata_id" class="select select-success w-full max-w-xs">
                        <option disabled selected>Sambungkan Tiket Dengan</option>
                        <?php foreach ($jenisWisatas as $jenisWisata) : ?>
                            <option value="<?= $jenisWisata['jeniswisata_id']; ?>"><?= $jenisWisata['wisata_nama']; ?></option>
                        <?php endforeach ?>
                    </select>
                    <div class="modal-action">
                        <button type="submit" class="btn">Tambah</button>
                        <label for="my_tiketAdd" class="btn">X</label>
                    </div>
                </form>
            </div>
        </div>

        <div class="overflow-x-auto ">
            <table class="table" id="tablenih">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Terhubung Ke</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <!-- row 1 -->
                    <?php $no = 0; ?>
                    <?php foreach ($jenisWisataTiketBridges as $jenisWisataTiketBridge) : ?>
                        <tr class="bg-base-200">
                            <th><?= ++$no; ?></th>
                            <td class="w-[50vw]"><?= $jenisWisataTiketBridge['wisata_nama'] ?></td>
                            <td>
                                <div class="w-52 flex gap-2 overflow-auto">
                                    <!-- <button class="btn btn-secondary btn-xs">Detail & Edit</button> -->
                                    <label for="bridgeedit<?= $jenisWisataTiketBridge['bridge_id']; ?>" class="btn btn-secondary btn-xs">EDIT / DETAIL</label>
                                    
                                    <input type="checkbox" id="bridgeedit<?= $jenisWisataTiketBridge['bridge_id']; ?>" class="modal-toggle" />
                                    <div class="modal" id=bridge<?= $jenisWisataTiketBridge['bridge_id']; ?>>
                                        <div class="modal-box h-fit w-fit">
                                            <p class="py-4 w-full">Hubungkan Tiket <?= $jenisWisataTiketBridge['tiket_nama']; ?> Dengan : </p>
                                            <form id="Tiket" action="<?= site_url("api/admin/jeniswisatatiketbridge/{$jenisWisataTiketBridge['bridge_id']}"); ?>" method="post">
                                                <?= csrf_field(); ?>
                                                <input type="hidden" name="_method" value="PUT">
                                                <input type="hidden" name="tiket_id" value="<?= $Tiketbyids['tiket_id']; ?>">
                                                <div class="h-fit  flex flex-col gap-4">
                                                    <select name="jeniswisata_id" class="select select-success w-full max-w-xs">
                                                        <option disabled selected>Sambungkan Tiket Dengan</option>
                                                        <?php foreach ($jenisWisatas as $jenisWisata) : ?>
                                                            <option <?= $jenisWisataTiketBridge['jeniswisata_id'] == $jenisWisata['jeniswisata_id'] ? 'selected' : ''; ?> value="<?= $jenisWisata['jeniswisata_id']; ?>"><?= $jenisWisata['wisata_nama']; ?></option>
                                                        <?php endforeach ?>
                                                    </select>
                                                </div>
                                                <div class="modal-action">
                                                    <button type="submit" class="btn">
                                                        Edit
                                                    </button>
                                                    
                                                    <label for="bridgeedit<?= $jenisWisataTiketBridge['bridge_id']; ?>" class="btn">X</label>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                    <label for="bridgedelete<?= $jenisWisataTiketBridge['bridge_id']; ?>" class=" btn btn-danger btn-xs">Hapus</label>
                                    <input type="checkbox" id="bridgedelete<?= $jenisWisataTiketBridge['bridge_id']; ?>" class="modal-toggle" />
                                    <div class="modal" id="bridgedelete<?= $jenisWisataTiketBridge['bridge_id']; ?>">
                                        <div class="modal-box">
                                            <h3 class="text-lg font-bold">Apakah Anda Yakin Menghapus ?</h3>
                                            <p class="py-4"><?= $jenisWisataTiketBridge['tiket_nama']; ?></p>
                                            <form action="<?= site_url("api/admin/jeniswisatatiketbridge/delete/{$jenisWisataTiketBridge['bridge_id']}"); ?>" method="post">
                                                <?= csrf_field(); ?>
                                                <input type="hidden" name="_method" value="DELETE">
                                                <div class="modal-action">
                                                    <button type="submit" class="btn btn-danger ">Hapus</button>
                                                    <label for="bridgedelete<?= $jenisWisataTiketBridge['bridge_id']; ?>" class="btn">X</label>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    <?php endforeach ?>

                </tbody>
            </table>
        </div>
    <?php endif ?>




    <?php if ($tipeGet == 'jeniswisata') : ?>

        <div class="flex flex-col items-center gap-2">
            <h1 class="h-fit p-4 rounded-xl bg-blue-600 text-white">Daftar Jenis Wisata Yang Tersambung Dengan Penyewaan <?= $jenisWisatabyids['wisata_nama']; ?> </h1>
        </div>

        <label for="my_penyewaanAdd" class="btn mb-4 mx-2">Tambah Sambungan Jenis Wisata dengan Tiket </label>
        <input type="checkbox" id="my_penyewaanAdd" class="modal-toggle" />
        <div class="modal">
            <div class="modal-box">
                <h3 class="font-bold text-lg my-2">Sambungkan Jenis Wisata Dengan :</h3>
                <form action="<?= site_url('api/admin/jeniswisatatiketbridge/add'); ?>" method="post">
                    <?= csrf_field(); ?>
                    <input type="hidden" name="jeniswisata_id" value="<?= $jenisWisatabyids['jeniswisata_id']; ?>">
                    <select name="tiket_id" class="select select-success w-full max-w-xs">
                        <option disabled selected>Sambungkan Jenis Wisata Dengan</option>
                        <?php foreach ($Tikets as $Tiket) : ?>
                            <option value="<?= $Tiket['tiket_id']; ?>"><?= $Tiket['tiket_nama']; ?></option>
                        <?php endforeach ?>
                    </select>
                    <div class="modal-action">
                        <button type="submit" class="btn">Tambah</button>
                        <label for="my_penyewaanAdd" class="btn">X</label>
                    </div>
                </form>
            </div>
        </div>

        <div class="overflow-x-auto ">
            <table class="table" id="tablenih">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Terhubung Ke</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <!-- row 1 -->
                    <?php $no = 0; ?>
                    <?php foreach ($jenisWisataTiketBridges as $jenisWisataTiketBridge) : ?>
                        <tr class="bg-base-200">
                            <th><?= ++$no; ?></th>
                            <td class="w-[50vw]"><?= $jenisWisataTiketBridge['tiket_nama'] ?></td>
                            <td>
                                <div class="w-52 flex gap-2 overflow-auto">
                                    <!-- <button class="btn btn-secondary btn-xs">Detail & Edit</button> -->
                                    <a href=#bridge<?= $jenisWisataTiketBridge['bridge_id']; ?> class="btn btn-secondary btn-xs">EDIT / DETAIL</a>
                                    <div class="modal" id=bridge<?= $jenisWisataTiketBridge['bridge_id']; ?>>
                                        <div class="modal-box h-fit w-fit">
                                            <p class="py-4 w-full">Hubungkan Jenis Wisata <?= $jenisWisataTiketBridge['wisata_nama']; ?> Dengan : </p>
                                            <form id="Tiket" action="<?= site_url("api/admin/jeniswisatatiketbridge/{$jenisWisataTiketBridge['bridge_id']}"); ?>" method="post">
                                                <?= csrf_field(); ?>
                                                <input type="hidden" name="_method" value="PUT">
                                                <input type="hidden" name="jeniswisata_id" value="<?= $jenisWisatabyids['jeniswisata_id']; ?>">
                                                <div class="h-fit  flex flex-col gap-4">
                                                    <select name="tiket_id" class="select select-success w-full max-w-xs">
                                                        <option disabled selected>Sambungkan Jenis Wisata Dengan</option>
                                                        <?php foreach ($Tikets as $Tiket) : ?>
                                                            <option <?= $jenisWisataTiketBridge['tiket_id'] == $Tiket['tiket_id'] ? 'selected' : ''; ?> value="<?= $Tiket['tiket_id']; ?>"><?= $Tiket['tiket_nama']; ?></option>
                                                        <?php endforeach ?>
                                                    </select>
                                                </div>
                                                <div class="modal-action">
                                                    <button type="submit" class="btn">
                                                        Edit
                                                    </button>
                                                    <a href="#" class="btn">X</a>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                    <a href="#bridgedelete<?= $jenisWisataTiketBridge['bridge_id']; ?>" class=" btn btn-danger btn-xs">Hapus</a>
                                    <div class="modal" id="bridgedelete<?= $jenisWisataTiketBridge['bridge_id']; ?>">
                                        <div class="modal-box">
                                            <h3 class="text-lg font-bold">Apakah Anda Yakin Menghapus ?</h3>
                                            <p class="py-4"><?= $jenisWisataTiketBridge['tiket_nama']; ?></p>
                                            <form action="<?= site_url("api/admin/jeniswisatatiketbridge/delete/{$jenisWisataTiketBridge['bridge_id']}"); ?>" method="post">
                                                <?= csrf_field(); ?>
                                                <input type="hidden" name="_method" value="DELETE">
                                                <div class="modal-action">
                                                    <button type="submit" class="btn btn-danger ">Hapus</button>
                                                    <a href="#" class="btn">X</a>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    <?php endforeach ?>

                </tbody>
            </table>
        </div>
    <?php endif ?>

</div>
<script>
    $(document).ready(function() {
        $('#tablenih').DataTable()

    })
</script>

<?= $this->endSection(); ?>