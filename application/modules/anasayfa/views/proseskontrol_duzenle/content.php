<div class="row">
    <div class="col-md-12">
        <form action="<?php echo base_url("anasayfa/proseskontrol_guncelle/$item->id"); ?>" method="post" enctype="multipart/form-data">
            <table class="table table-striped table-sm">
                <tr>
                    <td colspan="2">
                        <h4> Proses Kontrol Formu Düzenleme </h4>
                    </td>
                    <td colspan="2"></td>
                    <td></td>
                    <td colspan="2">Kontrol Nr:</td>
                    <td colspan="2">
                        <div class="input-group">
                            <?php echo "$item->kontrol_no " ?>
                        </div>
                    </td>
                    <td> </td>
                    <td> </td>
                </tr>
                <tr>
                    <td colspan="2">urun Adı:</td>
                    <td colspan="2">
                        <div class="input-group">
                            <input readonly type="text" name="urun_adi" class="form-control input-sm" value="<?php echo "$urun->adi " ?>" placeholder="urun">
                        </div>
                    </td>
                    <td></td>
                    <td colspan="2">lot Nr:</td>
                    <td colspan="2">
                        <div class="input-group">
                            <input type="text" class="form-control input-sm" required name="lot" value="<?php echo "$item->lot " ?>" placeholder="0000">
                        </div>
                    </td>
                    <td> </td>
                    <td> </td>
                </tr>
                <tr>
                    <td colspan="2"> Ürün Kodu : </td>
                    <td colspan="2">
                        <div class="form-group">
                            <input readonly type="text" class="form-control input-sm" name="urun_kodu" value="<?php echo "$urun->kodu " ?>" placeholder="0000">

                        </div><!-- .form-group -->
                    </td>
                    <td>-</td>
                    <td colspan="2">Parti No</td>
                    <td colspan="2">
                        <div class="input-group">
                            <input type="text" class="form-control input-sm" required name="parti_no" value="<?php echo "$item->parti_no " ?>" placeholder="0000">
                        </div>
                    </td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td colspan="2"> </td>
                    <td colspan="2">

                    </td>
                    <td>-</td>
                    <td colspan="2">Hammadde Parti kodu</td>
                    <td colspan="2">
                        <div class="input-group">
                            <input type="text" class="form-control input-sm" required name="hpk" value="<?php echo "$item->hpk " ?>" placeholder="0000">
                        </div>
                    </td>
                    <td></td>
                    <td></td>
                </tr>
                <!-- olcum alanı ekleme işlemi -->
                <?php $this->load->view("includes/olcum_duzenle"); ?>

            </table>
            <input type="hidden" name="urun" class="form-control input-sm" value="<?php echo "$urun->id " ?>">
            <input type="hidden" name="tarih" class="form-control input-sm" value="<?php echo date("Y-m-d H:i:s"); ?>" />
            <input type="hidden" name="kullanici" class="form-control input-sm" value="<?php echo $user->id ?>" />
            <button type="submit" class="btn btn-primary btn-md btn-outline">Kaydet</button>
            <a href="<?php echo base_url("anasayfa/proseskontrol"); ?>" class="btn btn-md btn-danger btn-outline">İptal</a>
            <button type="button" class="btn btn-info btn-md" data-toggle="modal" data-target="#myModal">Teknik Resim</button>
            <a href="<?php echo base_url("anasayfa/kalite"); ?>" class="btn btn-md btn-danger btn-outline">Kalite Ana Sayfa</a>

        </form>
        </br>
    </div>
</div>
<div class="row">
    <div class="col-md-6">
        <div class="panel-heading">
            <h2> Alt Proses Kontrol No: </h2>
        </div>
        <form action="<?php echo base_url("proses_categories/new_form"); ?>" method="post" enctype="multipart/form-data">
            <input type="hidden" name="main_id" value="<?php echo "$item->id" ?>">
            <input type="hidden" name="proses" value="2">
            <button type="submit" class="btn btn-primary btn-md btn-outline">Ekle</button>
        </form>
        <!-- hammadde parti kodu duzeleme işlemi -->
        <?php //echo "$hpk->hpk " 
        ?>
        <?php //var_dump($hpk->hpk ); 
        ?>
        <ul class="list-group">
            <?php //var_dump($proses_categories)
            ?>

            <?php foreach ($proses_categories as $proses_category) { ?>
                <li class="list-group-item custom-class">

                    <a href="<?php echo base_url("anasayfa/proseskontrol_duzenle/$proses_category->proses_id"); ?>" class=""> <?php echo ($proses_category->lot) ?></a>
                    <span class="pull-right button-group">
                        <?php if (isAllowedDeleteModule()) { ?>
                            <a href="<?php echo base_url("proses_categories/delete/$proses_category->id"); ?>" class="btn btn-sm btn-danger btn-outline remove-btn"><i class="fa fa-trash"></i> Sil</a>
                        <?php } ?>

                    </span>
                </li>
                <?php //var_dump($hpks ); 
                ?>
            <?php } ?>
        </ul>

    </div>
    <div class="col-md-6">
        <div class="panel-heading">
            <h2> Hammadde Parti Kodu: </h2>
        </div>

        <form action="<?php echo base_url("hpk/new_form"); ?>" method="post" enctype="multipart/form-data">
            <input type="hidden" name="main_id" value="<?php echo "$item->id" ?>">
            <input type="hidden" name="proses" value="2">
            <button type="submit" class="btn btn-primary btn-md btn-outline">Ekle</button>
        </form>
        <!-- hammadde parti kodu duzeleme işlemi -->
        <?php //echo "$hpk->hpk " 
        ?>
        <?php //var_dump($hpk->hpk ); 
        ?>
        <ul class="list-group">
            <?php foreach ($hpk as $hpks) { ?>
                <li class="list-group-item custom-class">
                    <?php echo "$hpks->hpk" ?>
                    <span class="pull-right button-group">
                        <?php if (isAllowedDeleteModule()) { ?>
                            <a href="<?php echo base_url("hpk/delete/$hpks->id"); ?>" class="btn btn-sm btn-danger btn-outline remove-btn"><i class="fa fa-trash"></i> Sil</a>
                        <?php } ?>

                    </span>
                </li>
                <?php //var_dump($hpks ); 
                ?>
            <?php } ?>
        </ul>
    </div>
</div><!-- END column -->
</br>
</br>
<!-- Modal -->
<div id="myModal" class="modal fade" role="dialog">
    <div class="modal-dialog modal-lg">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-body">
                <embed src="<?php echo base_url("uploads/pdf"); ?>/<?php echo "$urun->pdf " ?>" type="application/pdf" frameborder="0" width="100%" height="800px">
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Kapat</button>
                </div>
            </div>
        </div>
    </div>
</div>
</div>