



<div class="container-fluid">

<div class="jumbotron text-center">
  <h1>Malzeme Seç </h1>
  <p></p> 
</div>
  
<div class="container">
  <div class="row">
    <div class="col-sm-4">      
    </div>
    <div class="col-sm-4">
    <form action="<?php echo base_url("anasayfa/girdikontrol_ekle"); ?>" method="post" enctype="multipart/form-data">
        <div class="form-group">
            <label for="control-demo-6" class="">Malzeme </label>
            <div id="control-demo-6" class="">
                <select class="form-control news_type_select" name="malzeme">  
                    <?php foreach($malzemeler as $malzeme) { ?>
                        <option value="<?php echo $malzeme->id; ?>"><?php echo $malzeme->adi; ?></option>
                    <?php } ?>                              
                </select>
            </div>
        </div><!-- .form-group -->
        <button type="submit" class="btn btn-primary btn-md btn-outline">Seç</button>
        <a href="<?php echo base_url("anasayfa/kalite"); ?>" class="btn btn-md btn-danger btn-outline">Kalite</a>
    </form>
     
    </div>
    <div class="col-sm-4">
    <ul>       
        <li class="list-group-item "><a href="<?php echo base_url(); ?>anasayfa/girdikontrol">Girdi Kontrol</a></li>
        <li class="list-group-item "><a href="<?php echo base_url(); ?>arayuz/girdi">Yeni Girdi Kontrol</a></li>
        <li class="list-group-item "><a href="">Final Kontrol</a></li>
    </ul>
    </div>
  </div>
</div>
    
</div>

