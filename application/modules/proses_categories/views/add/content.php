<div class="row">
    <div class="col-md-12">
        <h4 class="m-b-lg">
            Yeni Proses Kategorisi Ekle
        </h4>
    </div><!-- END column -->
    <div class="col-md-12">
        <div class="widget">
            <div class="widget-body">
                <form action="<?php echo base_url("proses_categories/save"); ?>" method="post">

                    <div class="form-group col-md-6">
                        <label>Kategori</label>
                        <select name="proses_id" class="form-control">
                            <?php foreach ($categories as $category) { ?>
                                <option value="<?php echo $category->id; ?>"><?php echo $category->id; ?> - <?php echo $category->urun_adi; ?></option>
                            <?php } ?>
                        </select>
                        <?php if (isset($form_error)) { ?>
                            <small class="pull-right input-form-error"> <?php echo form_error("client"); ?></small>
                        <?php } ?>
                    </div>



                    <input type="hidden" name="main_id" value="<?php echo $main_id ?>">
                    <input type="hidden" name="proses" value="<?php echo $proses ?>">
                    <button type="submit" class="btn btn-primary btn-md btn-outline">Kaydet</button>
                    <a href="<?php echo base_url("proses_categories"); ?>" class="btn btn-md btn-danger btn-outline">İptal</a>
                </form>
            </div><!-- .widget-body -->
        </div><!-- .widget -->
    </div><!-- END column -->
</div>