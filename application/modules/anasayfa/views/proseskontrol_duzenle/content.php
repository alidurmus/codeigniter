<div class="row">
    <div class="col-md-12">
        <form action="<?php echo base_url("anasayfa/proseskontrol_guncelle/$item->id"); ?>" method="post" enctype="multipart/form-data">
            <table class="table table-striped table-sm"> 
                <tbody>    
                    <tr>
                        <td colspan="4"> 
                            <h4> Proses Kontrol Formu Düzenleme </h4>
                        </td>                       
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
                        <td colspan="2">urun  Adı:</td>
                        <td colspan="2">
                            <div class="input-group">
                                <input readonly type="text" name="urun_adi" class="form-control input-sm" value="<?php echo "$urun->adi " ?>" placeholder="urun"> 
                            </div>                            
                        </td>
                        <td></td>
                        <td colspan="2">lot Nr:</td>
                        <td colspan="2">
                            <div class="input-group"> 
                            <input  type="text" class="form-control input-sm"  name="lot"  value="<?php echo "$item->lot " ?>" placeholder="0000">                             </div>
                        </td>
                        <td> </td>
                        <td> </td>
                    </tr>                    
                    <tr>
                        <td colspan="2"> Ürün Kodu :	</td>
                        <td colspan="2">
                            <div class="form-group">  
                                <input readonly  type="text" class="form-control input-sm"  name="urun_kodu"  value="<?php echo "$urun->kodu " ?>" placeholder="0000">                           
                             </div>
                            </div><!-- .form-group -->                            
                        </td>
                        <td>-</td>
                        <td colspan="2">Parti No</td>
                        <td colspan="2">
                            <div class="input-group"> 
                                <input  type="text" class="form-control input-sm"  name="parti_no" value="<?php echo "$item->parti_no " ?>" placeholder="0000"> 
                            </div>
                        </td>
                        <td></td>
                        <td></td>
                    </tr>                                 
                    <!-- olcum alanı ekleme işlemi -->
                    <?php $this->load->view("includes/olcum_duzenle"); ?>
                </tbody>
            </table>
            <input  type="hidden" name="urun" class="form-control input-sm" value="<?php echo "$urun->id " ?>" > 
            <input  type="hidden" name="tarih" class="form-control input-sm"   value="<?php echo date("Y-m-d H:i:s"); ?>"/>
            <input   type="hidden" name="kullanici" class="form-control input-sm"  value="<?php echo $user->id ?>" />
            <button type="submit" class="btn btn-primary btn-md btn-outline">Kaydet</button>
            <a href="<?php echo base_url("anasayfa/proseskontrol"); ?>" class="btn btn-md btn-danger btn-outline">İptal</a>
        </form>            
    </div><!-- END column -->
</div>