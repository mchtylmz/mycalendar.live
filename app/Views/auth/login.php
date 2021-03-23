<?=$this->extend("layout/base_layout")?>
<?=$this->section("page_content")?>
<section class="login-content">
    <div class="container h-100">
        <div class="row justify-content-center align-items-center height-self-center">
            <div class="col-md-5 col-sm-12 col-12 align-self-center">
                <div class="card">
                    <div class="card-body text-center">
                        <h2 class="mb-3 mt-1"><?=lang('Auth.login.title')?></h2>
                        <?php echo form_open(route_to('auth.login')); ?>
                        <?=view('layout/alert.php')?>
                            <div class="row pt-3 mb-3">
                                <div class="col-lg-12">
                                    <div class="floating-input form-group">
                                        <input class="form-control" type="text" name="username" id="email" value="<?=old('email')?>" autocomplete="off" required/>
                                        <label class="form-label" for="email"><?=lang('Auth.form.email_or_username')?></label>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="floating-input form-group">
                                        <input class="form-control" type="password" name="password" id="password" minlength="6"
                                               autocomplete="off" required/>
                                        <label class="form-label" for="password"><?=lang('Auth.form.password')?></label>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <a href="<?= site_url(route_to('auth.forgotpassword')) ?>" class="text-primary float-right"><?=lang('Auth.forgotPassword.title')?></a>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary"><?=lang('Auth.login.title')?></button>
                            <p class="mt-3">
                                <a href="<?= site_url(route_to('auth.register')) ?>" class="text-primary"><?=lang('Auth.register.title')?></a>
                            </p>
                        <?php echo form_close(); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<?=$this->endSection()?>
