<div class="row">
    <div class="col-md-12">
        <h4 class="m-b-lg">
            İş Emri Listesi
            <?php   if(isAllowedWriteModule()){ ?>
                <a href="<?php echo base_url("isemri/new_form"); ?>" class="btn btn-outline btn-primary btn-xs pull-right"> <i class="fa fa-plus"></i> Yeni Ekle</a>
            <?php } ?>
        </h4>
    </div><!-- END column -->
    <div class="col-md-12">
        <div class="widget p-lg">

            <?php if(empty($items)) { ?>

                <div class="alert alert-info text-center">
                    <p>Burada herhangi bir veri bulunmamaktadır. Eklemek için lütfen <a href="<?php echo base_url("isemri/new_form"); ?>">tıklayınız</a></p>
                </div>



                
            <?php } else { ?>

                <table class="table table-hover table-striped table-bordered content-container">
                    <thead>
                        <th class="order"><i class="fa fa-reorder"></i></th>
                        <th class="w50">#id</th>
                        <th>lot</th>
                        <th>musteri</th>                      
                        <th>siparis_no</th>
                        <th>uretim_tarihi</th>
                        <th>sevk_tarihi</th>
                        <th>tarih</th>
                        <th>İşlem</th>
                    </thead>
                    <tbody class="sortable" data-url="<?php echo base_url("isemri/rankSetter"); ?>">

                        <?php foreach($items as $item) { ?>
                            <tr id="ord-<?php echo $item->id; ?>">
                                <td class="order"><i class="fa fa-reorder"></i></td>
                                <td class="w50 text-center">#<?php echo $item->id; ?></td>
                                <td><?php echo $item->lot; ?></td>                               
                                <td><?php echo $item->musteri; ?></td>                                
                                <td><?php echo $item->siparis_no; ?></td>
                                <td><?php echo $item->uretim_tarihi; ?></td>
                                <td><?php echo $item->sevk_tarihi; ?></td>
                                <td><?php echo $item->tarih; ?></td>
                                <td class="text-center w200">
                                    <?php   if(isAllowedDeleteModule()){ ?>
                                        <button
                                            data-url="<?php echo base_url("isemri/delete/$item->id"); ?>"
                                            class="btn btn-sm btn-danger btn-outline remove-btn">
                                            <i class="fa fa-trash"></i> Sil
                                        </button>
                                    <?php } ?> 
                                    <?php   if(isAllowedUpdateModule()){ ?>
                                        <a href="<?php echo base_url("isemri/update_form/$item->id"); ?>" class="btn btn-sm btn-info btn-outline"><i class="fa fa-pencil-square-o"></i> Düzenle</a>
                                    <?php } ?>                                   
                                 </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            <?php } ?>
        </div><!-- .widget -->
    </div><!-- END column -->
</div>