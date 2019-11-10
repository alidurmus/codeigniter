
    
    <div class="container">
        <div class="row">
            <div class="col-md-12 text-right">
                <hr>
                <div class="row">
                        <div class="col-md-4 text-left">
                                <a href="<?php echo base_url("anasayfa/kalite"); ?>" class="btn btn-primary"><-- Kalite</a>
                            </div>
                            <div class="col-md-4 ">
                            </div>
                            <div class="col-md-4 text-right">
                                <a href="<?php echo base_url("anasayfa/urun"); ?>" class="btn btn-success">Yeni Ekle --></a>
                        </div>
                    </div>
                <hr>
            </div>
            <div class="col-md-12">
                <table id="dataTable" class="table table-hover table-striped table-bordered content-container">
                    <thead>
                        <th>urun</th>
                        <th>Tedarikçi</th>
                        <th>Kontrol No</th>
                        <th>Parti_no</th>
                        <th>İrsaliye</th>
                        <th>Tarih</th>
                        <th>İşlem</th>
                    </thead>
                    <tbody class="sortable" data-url="<?php echo base_url("proseskontrol/rankSetter"); ?>">
                    <?php foreach($items as $item) { ?>
                        <tr>
                            <td><?php echo $item->urun_adi; ?></td>
                            <td><?php echo $item->td_adi; ?></td>
                            <td><?php echo $item->kontrol_no; ?></td>
                            <td><?php echo $item->parti_no; ?></td>
                            <td><?php echo $item->irsaliye; ?></td>
                            <td><?php echo $item->tarih; ?></td>
                            <td>
                                <a href="<?php echo base_url("anasayfa/proseskontrol_duzenle"); ?>/<?php echo $item->id;?>" class="btn btn-info">Düzenle</a>
                                <button
                                            data-url="<?php echo base_url("anasayfa/proseskontrol_sil/$item->id"); ?>"
                                            class="btn btn-sm btn-danger btn-outline remove-btn">
                                            <i class="fa fa-trash"></i> Sil
                                        </button>                               
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


