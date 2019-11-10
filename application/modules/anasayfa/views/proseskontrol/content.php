



<div class="container-fluid">

<div class="jumbotron text-center">
  <h1>Girdi Kontrol</h1>
  <p></p> 
</div>
  
<div class="container">
  <div class="row">
    <div class="col-sm-4">
      
    </div>
    <div class="col-sm-4">
 
      <ul>       
        <li class="list-group-item "><a href="<?php echo base_url(); ?>anasayfa/girdikonrol">Girdi Kontrol</a></li>
        <li class="list-group-item "><a href="">Proses Kontrol</a></li>
        <li class="list-group-item "><a href="">Final Kontrol</a></li>
    </ul>
    </div>
    <div class="col-sm-4">
     
    </div>
  </div>
</div>
    
</div>

<div class="container">
        <div class="row">
            <div class="col-md-12 text-right">
                <hr>
                <a href="<?php echo base_url(); ?>arayuz/girdi" class="btn btn-success">Yeni Ekle</a>
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
                    <?php foreach($formlar as $form) { ?>
                        <tr>
                            <td><?php echo $form->malzeme_adi; ?></td>
                            <td><?php echo $form->td_adi; ?></td>
                            <td><?php echo $form->kontrol_no; ?></td>
                            <td><?php echo $form->parti_no; ?></td>
                            <td><?php echo $form->irsaliye; ?></td>
                            <td><?php echo $form->tarih; ?></td>
                            <td>
                                <a href="<?php echo base_url("arayuz/girdi_guncelle"); ?>?form_id=<?php echo $form->id;?>" class="btn btn-info">Düzenle</a>
                                <button
                                            data-url="<?php echo base_url("girdikontrol/delete/$item->id"); ?>"
                                            class="btn btn-sm btn-danger btn-outline remove-btn">
                                            <i class="fa fa-trash"></i> Sil
                                        </button>
                             
                                <a href="#" class="btn btn-danger">Sil</a>
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

