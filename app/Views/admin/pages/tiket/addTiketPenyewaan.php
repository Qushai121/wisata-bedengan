<!-- The button to open modal -->

<?php foreach ($Tikets as $Tiket) : ?>
    <div class="modal" id="tiketPenyewaan<?= $Tiket['tiket_id'] ?>">
        <div class="modal-box">
        <?= $this->include('admin/components/formValidasi'); ?>
            <h3 class="font-bold text-lg">Hello!</h3>
            <ul class="my-2 mx-2">
                <?php foreach ($TiketJenisWisataBridges as $TiketJenisWisataBridge) : ?>
                    <?php if ($TiketJenisWisataBridge['tiket_id'] == $Tiket['tiket_id']) : ?>
                        <li class="mt-1"><?= $TiketJenisWisataBridge['wisata_nama']; ?></li>
                    <?php else : ?>
                        <li></li>
                    <?php endif ?>
                <?php endforeach ?>
            </ul>
            <form action="" method="post">
                <div class="flex flex-col gap-2">
                    <select id="penyewaan_status" name="penyewaan_status" class="select select-success w-full max-w-xs mt-1 ">
                        <option disabled selected>Pilih Jenis Status</option>
                        <?php foreach ($JenisWisatas as $JenisWisata) : ?>
                            <option value="<?= $JenisWisata['jeniswisata_id']; ?>"><?= $JenisWisata['wisata_nama']; ?></option>
                        <?php endforeach ?>
                    </select>
                    <button class="btn w-fit ">Set Tiket</button>
                </div>
            </form>
            <div class="modal-action">
                <a href="#" class="btn">X</a>
            </div>
        </div>
    </div>
<?php endforeach ?>