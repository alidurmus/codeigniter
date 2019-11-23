<div class="simple-page-wrap">
    <div class="simple-page-logo animated swing">
        <a href="index.html">
            <span><i class="fa fa-gg"></i></span>
            <span>TEMPAR</span>
        </a>
    </div><!-- logo -->
    <div class="simple-page-form animated flipInY" id="login-form">
        <h4 class="form-title m-b-xl text-center">Kullanıcı Giriş Ekranı</h4>
        <form action="<?php echo base_url("userop/do_login"); ?>" method="post">
            <div class="form-group">           
                <select id="sign-in-email"  name="user_name" class="form-control">
                    <?php foreach($users as $user) { ?>                   
                        <option value="<?php echo $user->user_name; ?>">
                            <?php echo $user->user_name; ?>
                        </option>
                        <?php } ?>
                </select>
                <?php if(isset($form_error)){ ?>
                    <small class="pull-right input-form-error"> <?php echo form_error("user_name"); ?></small>
                <?php } ?>
            </div>
            <div class="form-group">
                <input id="sign-in-password" type="password" class="form-control" placeholder="Şifre" name="user_password">
                <?php if(isset($form_error)){ ?>
                    <small class="pull-right input-form-error"> <?php echo form_error("user_password"); ?></small>
                <?php } ?>
            </div>
            <button type="submit" class="btn btn-primary">Giriş Yap</button>
        </form>
    </div><!-- #login-form -->
    <div class="simple-page-footer">
        <p><a href="<?php echo base_url("sifremi-unuttum"); ?>">Şifremi Unuttum ?</a></p>
    </div><!-- .simple-page-footer -->
</div><!-- .simple-page-wrap -->