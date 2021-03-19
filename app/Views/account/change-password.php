<?=$this->extend("layout/header")?>
<?=$this->section("page_content")?>
<div class="content-page">
    <div class="container-fluid container">
        <div class="card">
            <div class="card-header d-flex justify-content-between">
                <div class="iq-header-title">
                    <h4 class="card-title mb-1"><?=lang('Account.changePassword.title')?></h4>
                </div>
            </div>
            <div class="card-body">
                <?= view('layout/alert.php'); ?>
                <?php echo form_open(route_to('account.changePassword')); ?>
                    <div class="form-group">
                        <label for="cpass"><?=lang('Account.changePassword.currentPassword')?></label>
                        <input type="Password" class="form-control" id="cpass" name="oldpassword" minlength="6" autocomplete="off" required>
                    </div>
                    <div class="form-group">
                        <label for="npass"><?=lang('Account.changePassword.newPassword')?></label>
                        <input type="password" class="form-control" id="npass" name="password" minlength="6" autocomplete="off" required>
                    </div>
                    <div class="form-group">
                        <label for="vpass"><?=lang('Account.changePassword.reNewPassword')?></label>
                        <input type="password" class="form-control" id="vpass" name="repassword" minlength="6" autocomplete="off" required>
                    </div>
                    <button type="submit" class="btn btn-primary mr-2"><?=lang('Account.save')?></button>
                <?php echo form_close(); ?>
            </div>
        </div>
    </div>
</div>
<?=$this->endSection()?>
