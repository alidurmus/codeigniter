<div class="container">
    <div class="row">
        <div class="col-md-12">
            <hr>
            <div class="row">
                <div class="col-md-7">
                    <a href="<?php echo base_url("anasayfa/kalite"); ?>" class="btn btn-primary   btn-lg"><-- Kalite</a>

                            <a href="<?php echo base_url("dashboard"); ?>" class="btn btn-warning   btn-lg"><-- Yönetim</a>

                                    <a href="<?php echo base_url("excel/final_kontrol"); ?>" class="btn btn-danger  btn-lg">Excel</a>

                                    <a href="<?php echo base_url("anasayfa/urun2"); ?>" class="btn btn-success btn-lg">Yeni Ekle --></a>
                </div>

                <div class="col-md-5">
                    <a href="#" class="btn btn-danger  btn-lg  btn-block"><STRong>FİNAL KONTROL</STRong></a>
                </div>
            </div>
            <hr>
        </div>
        <div class="col-md-12">
            <!-- Search form (start) -->
            <form method="post" action="<?= base_url() ?>finalkontrol/">
                <input type="text" name="search" value="<?= $search_text ?>"><input type="submit" name="submit" value="Ara">
            </form>
            <br />
            <table id="dataTablex" class="table table-hover table-striped table-bordered content-container">
                <thead>
                    <th>id</th>
                    <th>urun</th>
                    <th>Kontrol No</th>
                    <th>Kutu No</th>
                    <th>lot</th>
                    <th>Tarih</th>
                    <th>İşlem</th>
                </thead>
                <tbody class="sortable" data-url="<?php echo base_url("finalkontrol/rankSetter"); ?>">
                    <?php foreach ($items as $item) { ?>
                        <tr>
                            <td><?php echo $item->id; ?></td>
                            <td><?php echo $item->urun_adi; ?></td>
                            <td><?php echo $item->kontrol_no; ?></td>
                            <td><?php echo $item->kutu_no; ?></td>
                            <td><?php echo $item->lot; ?></td>
                            <td><?php echo tarih_ayarla($item->tarih, "Y/m/d H:i");  ?></td>
                            <td>
                                <a href="<?php echo base_url("anasayfa/finalkontrol_duzenle"); ?>/<?php echo $item->id; ?>" class="btn btn-info">Düzenle</a>
                                <button data-url="<?php echo base_url("anasayfa/finalkontrol_sil/$item->id"); ?>" class="btn btn-sm btn-danger btn-outline remove-btn">
                                    <i class="fa fa-trash"></i> Sil
                                </button>
                                <!--<a href="<?php echo base_url("etiket/final_kontrol"); ?>/<?php echo $item->id; ?>" class="btn btn-warning">Etiket</a> -->
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
            <p><?php echo $links; ?></p>
        </div>
    </div>
</div>

<script>
    $(document).ready(function() {
        $('#dataTable').DataTable();
    });
</script>