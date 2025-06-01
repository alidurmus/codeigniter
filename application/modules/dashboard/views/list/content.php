<div class="main-container">
    <div class="col-md-12">
        <div class="data-widget">
            <?php if (empty($items)) {  ?>
                <div class="widget-header">
                    <h2 class="widget-title">
                        <i class="fas fa-database"></i>
                        Kontrol Verileri
                    </h2>
                </div>

                <!-- Demo: Empty State -->
                <div id="empty-state" class="empty-state" style="display: none;">
                    <i class="fas fa-folder-open empty-icon"></i>
                    <h4>Henüz Veri Bulunmuyor</h4>
                    <p class="mb-4">Burada herhangi bir veri bulunmamaktadır.</p>
                    <a href="<?php echo base_url('kontrol_no/new_form'); ?>" class="add-new-btn">
                        <i class="fas fa-plus"></i>
                        Yeni Kayıt Ekle
                    </a>
                </div>
            <?php } else { ?>



                <div id="data-content">
                    <div class="search-container">
                        <form method="post" action="<?= base_url() ?>dashboard/" class="search-form">
                            <div class="search-input-group">
                                <div style="position: relative; flex: 1;">
                                    <i class="fas fa-search search-icon"></i>
                                    <input type="text"
                                        name="search"
                                        class="search-input"
                                        placeholder="Kontrol No, Parti No, Lot No ile ara..."
                                        value="<?= isset($search_text) ? $search_text : '' ?>">
                                </div>
                                <button type="submit" name="submit" class="search-btn">
                                    <i class="fas fa-search me-2"></i>
                                    Ara
                                </button>
                            </div>
                        </form>
                    </div>

                    <div class="table-container">
                        <table class="modern-table">
                            <thead>
                                <tr>
                                    <th>Kontrol No</th>
                                    <th>Proses İsim</th>
                                    <th>Parti No</th>
                                    <th>Lot No</th>
                                    <th>Kutu No</th>
                                    <th>Tarih</th>
                                </tr>
                            </thead>
                            <tbody id="data-tbody" class='' data-url='<?php echo base_url('kontrol_no/rankSetter'); ?>'>
                                <?php foreach ($items as $item) { ?>
                                    <tr class="fade-in" id="ord-<?php echo $item->id; ?>">
                                        <td class='w50 text-center'><?php echo $item->id;
                                                                    ?></td>
                                        <td><?php echo $item->process_isim;
                                            ?></td>
                                        <td><?php echo $item->parti_no;
                                            ?></td>
                                        <td><?php echo $item->lot_no;
                                            ?></td>
                                        <td><?php echo $item->kutu_no;
                                            ?></td>
                                        <td>
                                            <div class="date-info">
                                                <i class="fas fa-calendar-alt"></i>
                                                <?php echo $item->tarih;
                                                ?>
                                            </div>
                                        </td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>

                    <?php }
                    ?>
                    <p><?php echo $links; ?></p>


                    </div><!-- .widget -->
                </div><!-- END column -->