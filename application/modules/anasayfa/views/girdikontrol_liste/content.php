
    
    <div class="container">
        <div class="row">
            <div class="col-md-12 text-right">
                <hr>
                <a href="http://localhost/cms/panel/anasayfa/malzeme" class="btn btn-success">Yeni Ekle</a>
                <hr>
            </div>
            <div class="col-md-12">
                <table id="dataTable" class="table table-hover table-striped table-bordered content-container">
                    <thead>
                        <th>Malzeme</th>
                        <th>Tedarikçi</th>
                        <th>Kontrol No</th>
                        <th>Parti_no</th>
                        <th>İrsaliye</th>
                        <th>Tarih</th>
                        <th>İşlem</th>
                    </thead>
                    <tbody class="sortable" data-url="<?php echo base_url("girdikontrol/rankSetter"); ?>">
                    <?php foreach($items as $item) { ?>
                        <tr>
                            <td><?php echo $item->malzeme_adi; ?></td>
                            <td><?php echo $item->td_adi; ?></td>
                            <td><?php echo $item->kontrol_no; ?></td>
                            <td><?php echo $item->parti_no; ?></td>
                            <td><?php echo $item->irsaliye; ?></td>
                            <td><?php echo $item->tarih; ?></td>
                            <td>
                                <a href="<?php echo base_url("anasayfa/girdikontrol_duzenle"); ?>/<?php echo $item->id;?>" class="btn btn-info">Düzenle</a>
                                <a href="<?php echo base_url("anasayfa/girdikontrol_sil"); ?>/<?php echo $item->id;?>" class="btn btn-danger">Sil</a>
                            </td>
                        </tr>
                        <?php } ?>
                    </tbody>

                </table>
            </div>
        </div>
    </div>

    <script>
        $(document).ready(function() {
            $('#dataTable').DataTable();
        });
    </script>


