<?=$this->extend("layout/base_layout")?>
<?=$this->section("page_content")?>
<section class="login-content">
    <div class="container h-100">
        <div class="row justify-content-center align-items-center height-self-center">
            <div class="col-md-5 col-sm-12 col-12 align-self-center">
                <div class="card">
                    <div class="card-body text-center">
                        <h2 class="mb-3 mt-1"><?=lang('Auth.resetPassword.title')?></h2>
                        <?php echo form_open(''); ?>
                        <?=view('layout/alert.php')?>
                            <div class="row pt-3">
                                <div class="col-lg-12">
                                    <div class="floating-input form-group">
                                        <input class="form-control" type="password" name="password" id="password" minlength="6"
                                               autocomplete="off" required/>
                                        <label class="form-label" for="password"><?=lang('Auth.form.password')?></label>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="floating-input form-group">
                                        <input class="form-control" type="password" name="repassword" id="repassword" minlength="6"
                                               autocomplete="off" required/>
                                        <label class="form-label" for="repassword"><?=lang('Auth.form.repassword')?></label>
                                    </div>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary mb-3"><?=lang('Auth.resetPassword.title')?></button>
                            <p class="mt-3">
                                <a href="<?= site_url(route_to('auth.login')) ?>" class="text-primary"><?=lang('Auth.login.title')?></a>
                            </p>
                        <?php echo form_close(); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<?=$this->endSection()?>
