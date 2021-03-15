<?=$this->extend("layout/base_layout")?>
<?=$this->section("page_content")?>

<?= view('layout/alert.php'); ?>
<?php echo form_open(route_to('auth.login')); ?>

<input type="email" name="email" placeholder="E-posta Adresi" value="<?=old('email')?>" autocomplete="off" required>
<br>
<input type="password" name="password" placeholder="Şifre" minlength="6" autocomplete="off" required>
<br>
<button type="submit" name="button">Giriş Yap</button>

<?php echo form_close(); ?>
<br>

<a href="<?= site_url(route_to('auth.register')) ?>">
		Kayıt Ol
</a>
<br>

<a href="<?= site_url(route_to('auth.forgotpassword')) ?>">
		Şifre Unuttum
</a>
<?=$this->endSection()?>
