<?=$this->extend("layout/base_layout")?>
<?=$this->section("page_content")?>
page_content
<?php d(
	session('error')
); ?>
<?php echo form_open('auth/login'); ?>

<input type="email" name="email" placeholder="E-posta Adresi" value="<?=old('email')?>" autocomplete="off" required>
<br>
<input type="password" name="password" placeholder="Şifre" autocomplete="off" required>
<br>
<button type="submit" name="button">Giriş Yap</button>

<?php echo form_close(); ?>

<?=$this->endSection()?>
