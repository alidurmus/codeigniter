<div class="row">
    <div class="col-md-12">
        <h4 class="m-b-lg">
            Proses Kontrol Formu Ekle
        </h4>
    </div><!-- END column -->
    <div class="col-md-12">
        <form action="<?php echo base_url("anasayfa/proseskontrol_kaydet"); ?>" method="post" enctype="multipart/form-data">
            <table class="table table-striped table-sm"> 
                <tbody>                    
                    <tr>
                        <td colspan="2">Parça Adı:</td>
                        <td colspan="2">
                            <div class="input-group">
                                <input readonly type="text" name="urun_adi" class="form-control input-sm" value="<?php echo "$urun->adi " ?>" placeholder="urun"> 
                            </div>                            
                        </td>
                        <td></td>
                        <td colspan="2">Lot Nr:</td>
                        <td colspan="2">
                            <div class="input-group"> 
                            <input  type="text" class="form-control input-sm"  name="lot"  placeholder="0000">                             </div>
                        </td>
                        <td> </td>
                        <td> </td>
                    </tr>                    
                    <tr>
                        <td colspan="2">Parça Kodu:	</td>
                        <td colspan="2">
                            <div class="form-group">  
                            <input readonly type="text" name="urun_kodu" class="form-control input-sm" value="<?php echo "$urun->kodu " ?>" placeholder="urun"> 
 
                            </div><!-- .form-group -->                            
                        </td>
                        <td>-</td>
                        <td colspan="2">Parti No</td>
                        <td colspan="2">
                            <div class="input-group"> 
                                    <input  type="text" class="form-control input-sm"  name="parti_no" value="<?php echo ""; ?>" placeholder="0000"> 
                            </div>
                        </td>
                        <td></td>
                        <td></td>
                    </tr>                                 
                    <tr>
                        <td colspan="6"> Metrik Kontroller </td>
                        <td colspan="5">Görsel Kontroller</td>
                    </tr>                                 
                    <tr>
                        <td>Ölçüm Adı</td>
                        <td>Ölçü (mm)</td>
                        <td>Tolerans	</td>
                        <td>Alt Limit	</td>
                        <td>Üst Üst Limit	</td>
                        <td>Ölçüm</td>
                        <td>Sonuç</td>
                        <td>Kontrol Noktası</td>
                        <td>Uygun</td>
                        <td>Şartlı Kabul	</td>
                        <td>Uygun değil</td>
                    </tr> 
                    <?php foreach($json->{'olcum'} as $row => $d) {?>
                        <tr> 
                        <?php foreach($d as $key => $val) {?>
                            <?php // echo $row . ' - ' .$key . ': ' . $val; ?>                                      
                            <?php if($key == "gorsel"){ ?>                                            
                            <td>
                                <div class="input-group"> 
                                    <input  type="radio" value="<?php echo $val; ?>" <?php echo ($val == '1') ? 'checked' : ''; ?> name="form[olcum][<?php echo $row; ?>][<?php echo $key; ?>]" placeholder="00"> 
                                </div>
                            </td>
                            <td>
                                <div class="input-group"> 
                                    <input  type="radio" value="<?php echo $val; ?>" <?php echo ($val == '2') ? 'checked' : ''; ?> name="form[olcum][<?php echo $row; ?>][<?php echo $key; ?>]" placeholder="00"> 
                                </div>
                            </td> 
                            <td>
                                <div class="input-group"> 
                                    <input  type="radio" value="<?php echo $val; ?>" <?php echo ($val == '3') ? 'checked' : ''; ?> name="form[olcum][<?php echo $row; ?>][<?php echo $key; ?>]" placeholder="00"> 
                                </div>
                            </td>
                            <?php }else { ?>
                                <td>
                                        <div class="input-group"> 
                                                <input  type="text" class="form-control input-sm" value="<?php echo $val; ?>" name="form[olcum][<?php echo $row; ?>][<?php echo $key; ?>]" placeholder="Username"> 
                                        </div>
                                    </td>
                            <?php } ?>
                        <?php } ?>
                    </tr> 
                            
                    <?php } ?>
                    <tr>
                        <td colspan="2">Açıklama:</td>
                        <td colspan="9">
                            <div class="form-group">
                                <textarea class="form-control" name="aciklama" rows="2" id="comment"></textarea>
                            
                        </td>
                    </tr>
                    <tr>                                  
                        <td>Tarih:</td>
                        <td colspan="2">
                            <?php echo date("Y-m-d H:i:s"); ?>
                        </td>
                        <td colspan="1">Sonuç:</td>
                        <td colspan="2">
                            <div class="input-group"> 
                                <select class="form-control news_type_select" name="sonuc"> 
                                    <option value="1">Geçti</option>
                                    <option value="2">Şartlı Geçti</option>
                                    <option value="3">Kaldı</option>                                                                
                                </select>
                            </div>
                        </td>
                        <td colspan="3"></td>
                        <td colspan="3">
                           
                        </td>
                    </tr>
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