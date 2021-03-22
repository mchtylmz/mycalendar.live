<?= $this->extend("layout/header") ?>
<?= $this->section("page_content") ?>
<div class="content-page">
    <div class="container-fluid container">
        <?= view('layout/alert.php'); ?>
        <?php echo form_open_multipart(route_to('account.updateProfile')); ?>
        <div class="row">
            <div class="col-xl-4">
                <div class="card">
                    <div class="card-header d-flex justify-content-between">
                        <div class="header-title">
                            <h4 class="card-title"><?= lang('Account.profile.editTitle') ?></h4>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <div class="crm-profile-img-edit position-relative">
                                <img class="crm-profile-pic rounded-circle avatar-100 profile-pic"
                                     src="<?= auth_user()->getImage() ?>" alt="<?= auth_user()->getFullname() ?>">
                                <div class="crm-p-image bg-primary">
                                    <i class="las la-pen upload-button"></i>
                                    <input class="file-upload" type="file" name="image" accept="image/*">
                                </div>
                            </div>
                            <div class="img-extension mt-3">
                                <div class="d-inline-block align-items-center">
                                    <a href="javascript:void(0)">.jpg</a>
                                    <a href="javascript:void(0)">.png</a>
                                    <a href="javascript:void(0)">.jpeg</a>
                                    <span><?= lang('Account.profile.allowed') ?></span>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="furl">Facebook</label>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">facebook.com/</span>
                                </div>
                                <input type="text" class="form-control" name="facebook"
                                       value="<?= old('facebook') ?? auth_user()->facebook ?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="turl">Twitter</label>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">twitter.com/</span>
                                </div>
                                <input type="text" class="form-control" name="factwitterebook"
                                       value="<?= old('twitter') ?? auth_user()->twitter ?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="Iurl">Instagram</label>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">instagram.com/</span>
                                </div>
                                <input type="text" class="form-control" name="instagram"
                                       value="<?= old('instagram') ?? auth_user()->instagram ?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="yurl">Youtube</label>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">youtube.com/</span>
                                </div>
                                <input type="text" class="form-control" name="youtube"
                                       value="<?= old('youtube') ?? auth_user()->youtube ?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="lurl">Linkedin</label>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">linkedin.com/in/</span>
                                </div>
                                <input type="text" class="form-control" name="linkedin"
                                       value="<?= old('linkedin') ?? auth_user()->linkedin ?>">
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary"><?= lang('Account.save') ?></button>
                    </div>
                </div>
            </div>
            <div class="col-xl-8">
                <div class="card">
                    <div class="card-header d-flex justify-content-between">
                        <div class="header-title">
                            <h4 class="card-title"><?= lang('Account.profile.userInfo') ?></h4>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="new-user-info">
                            <form>
                                <div class="row">
                                    <div class="form-group col-md-6">
                                        <label for="fname"><?= lang('Account.form.first_name') ?></label>
                                        <input type="text" class="form-control" id="fname" name="first_name"
                                               value="<?= old('first_name') ?? auth_user()->first_name ?>" required>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="lname"><?= lang('Account.form.last_name') ?></label>
                                        <input type="text" class="form-control" id="lname" name="last_name"
                                               value="<?= old('last_name') ?? auth_user()->last_name ?>" required>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="email"><?= lang('Account.form.email') ?></label>
                                        <input type="email" class="form-control" id="email" name="email"
                                               value="<?= old('email') ?? auth_user()->email ?>" required>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="mobno"><?= lang('Account.form.phone') ?></label>
                                        <input type="text" class="form-control" id="mobno" name="phone"
                                               value="<?= old('phone') ?? auth_user()->phone ?>">
                                    </div>
                                    <div class="form-group col-md-12">
                                        <label for="about"><?= lang('Account.form.about') ?></label>
                                        <textarea data-length="500" class="form-control" id="about" rows="3" maxlength="500" name="about" placeholder="..."><?= old('about') ?? auth_user()->about ?></textarea>
                                    </div>
                                    <div class="form-group col-md-12">
                                        <label for="event_upcoming"><?= lang('Account.form.event_upcoming') ?></label>
                                        <input type="number" step="1" min="1" class="form-control" id="event_upcoming" name="event_upcoming" value="<?= old('event_upcoming') ?? auth_user()->event_upcoming ?>" required>
                                    </div>
                                    <div class="form-group col-md-12 row align-items-center">
                                        <label class="col-xl-3 col-lg-4 col-md-5 mb-0"
                                               for="sms_noti"><?= lang('Account.form.sms_notification') ?></label>
                                        <div class="col-xl-9 col-lg-8 col-md-7">
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input" id="sms_noti" name="sms_notification" value="1" <?= auth_user()->sms_notification == '1' ? 'checked' : '' ?>>
                                                <label class="custom-control-label"
                                                       for="sms_noti"><?= lang('Account.profile.sms_notification') ?></label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group col-md-12 row align-items-center">
                                        <label class="col-xl-3 col-lg-4 col-md-5 mb-0"
                                               for="email_noti"><?= lang('Account.form.email_notification') ?></label>
                                        <div class="col-xl-9 col-lg-8 col-md-7">
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input" id="email_noti" name="email_notification" value="1" <?= auth_user()->email_notification == '1' ? 'checked' : '' ?>>
                                                <label class="custom-control-label"
                                                       for="email_noti"><?= lang('Account.profile.email_notification') ?></label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-primary"><?= lang('Account.save') ?></button>
                                <?php echo form_close(); ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php echo form_close(); ?>
</div>

<?= $this->endSection() ?>