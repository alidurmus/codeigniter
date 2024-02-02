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
                            <input  type="text" class="form-control input-sm" required  name="lot"  value="<?php echo "$item->lot " ?>" placeholder="0000">                             </div>
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
                                <input  type="text" class="form-control input-sm" required  name="parti_no" value="<?php echo "$item->parti_no " ?>" placeholder="0000"> 
                            </div>
                        </td>
                        <td></td>
                        <td></td>
                    </tr>                                 
                    <!-- olcum alanı ekleme işlemi -->
                    <?php $this->load->view("includes/olcum_duzenle"); ?>

                    <tr>
                        <td colspan="">Proses Kontrol No:	</td>
                         <td colspan="">  <button type="submit" class="btn btn-primary btn-md btn-outline">Ekle</button>   	</td>
                        <td colspan="2">
                            <!-- hammadde parti kodu duzeleme işlemi -->
                            <?php $this->load->view("includes/p_lot"); ?> 

                        </td>
                        <td>-</td>
                        <td colspan="">Hammadde Parti Kodu:	</td>
                         <td colspan="">  <button type="submit" class="btn btn-primary btn-md btn-outline">Ekle</button>   	</td>
                        <td colspan="2">
                            <!-- hammadde parti kodu duzeleme işlemi -->
                            <?php $this->load->view("includes/hpk"); ?> 
                        </td>
                        <td></td>
                        <td></td>
                    </tr> 
                </tbody>
            </table>
            <input  type="hidden" name="urun" class="form-control input-sm" value="<?php echo "$urun->id " ?>" > 
            <input  type="hidden" name="tarih" class="form-control input-sm"   value="<?php echo date("Y-m-d H:i:s"); ?>"/>
            <input   type="hidden" name="kullanici" class="form-control input-sm"  value="<?php echo $user->id ?>" />
            <button type="submit" class="btn btn-primary btn-md btn-outline">Kaydet</button>
            <a href="<?php echo base_url("anasayfa/proseskontrol"); ?>" class="btn btn-md btn-danger btn-outline">İptal</a>
            <button type="button" class="btn btn-info btn-md" data-toggle="modal" data-target="#myModal">Teknik Resim</button>
        </form>   

         <!-- Modal -->
         <div id="myModal" class="modal fade" role="dialog">
            <div class="modal-dialog modal-lg">

                <!-- Modal content-->
                <div class="modal-content">
                    
                    <div class="modal-body">

                        <embed src="<?php echo base_url("uploads/pdf"); ?>/<?php echo "$urun->pdf " ?>" type="application/pdf"  frameborder="0" width="100%" height="800px">

                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Kapat</button>
                        </div>
                    </div>

                </div>
            </div>
        </div>



    </div><!-- END column -->
</div>