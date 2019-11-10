<div class="row">
    <div class="col-md-12">
        <h4 class="m-b-lg">
            Girdi Kontrol Formu Ekle
        </h4>
    </div><!-- END column -->
    <div class="col-md-12">
        <form action="<?php echo base_url("anasayfa/girdikontrol_guncelle/$item->id"); ?>" method="post" enctype="multipart/form-data">
            <table class="table table-striped table-sm"> 
                <tbody>                    
                    <tr>
                        <td colspan="2">Malzeme  Adı:</td>
                        <td colspan="2">
                            <div class="input-group">
                                <input readonly type="text" name="malzeme_adi" class="form-control input-sm" value="<?php echo "$malzeme->adi " ?>" placeholder="malzeme"> 
                            </div>                            
                        </td>
                        <td></td>
                        <td colspan="2">Parti Nr:</td>
                        <td colspan="2">
                            <div class="input-group"> 
                            <input  type="text" class="form-control input-sm"  name="parti_no"  value="<?php echo "$item->parti_no " ?>" placeholder="0000">                             </div>
                        </td>
                        <td> </td>
                        <td> </td>
                    </tr>                    
                    <tr>
                        <td colspan="2">Tedarikçi Adı:	</td>
                        <td colspan="2">
                            <div class="form-group">  
                                <select name="tedarikci" class="form-control">                               
                                    <?php foreach($tedarikciler as $tedarikci) { ?>                                       
                                        <option value="<?php echo $tedarikci->id; ?>"><?php echo $tedarikci->adi; ?></option>
                                    <?php } ?>
                                </select>      
                            </div><!-- .form-group -->                            
                        </td>
                        <td>-</td>
                        <td colspan="2">İrsaliye No</td>
                        <td colspan="2">
                            <div class="input-group"> 
                                <input  type="text" class="form-control input-sm"  name="irsaliye" value="<?php echo "$item->irsaliye " ?>" placeholder="0000"> 
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
                        <td>Uygun Değil</td>
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
                                <textarea class="form-control" name="aciklama" rows="2" id="comment"><?php echo "$item->aciklama " ?></textarea>
                            
                        </td>
                    </tr>
                    <tr>                                  
                        <td>Tarih:</td>
                        <td colspan="2">
                        <?php echo "$item->tarih " ?>
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
            <input  type="hidden" name="malzeme" class="form-control input-sm" value="<?php echo "$malzeme->id " ?>" > 
            <input  type="hidden" name="tarih" class="form-control input-sm"   value="<?php echo date("Y-m-d H:i:s"); ?>"/>
            <input   type="hidden" name="kullanici" class="form-control input-sm"  value="<?php echo $user->id ?>" />
            <button type="submit" class="btn btn-primary btn-md btn-outline">Kaydet</button>
            <a href="<?php echo base_url("anasayfa/girdikontrol"); ?>" class="btn btn-md btn-danger btn-outline">İptal</a>
        </form>            
    </div><!-- END column -->
</div>