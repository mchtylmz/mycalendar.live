<?=$this->extend("layout/base_layout")?>
<?=$this->section("page_content")?>

<?= view('layout/alert.php'); ?>

<?php echo form_open(route_to('auth.register')); ?>

<input type="text" name="first_name" placeholder="İsim" value="<?=old('first_name')?>" autocomplete="off" required>
<br>
<input type="text" name="last_name" placeholder="Soyisim" value="<?=old('last_name')?>" autocomplete="off" required>
<br>
<input type="email" name="email" placeholder="E-posta Adresi" value="<?=old('email')?>" autocomplete="off" required>
<br>
<input type="password" name="password" placeholder="Şifre" minlength="6" autocomplete="off" required>
<br>
<button type="submit" name="button">Kayıt Ol</button>

<?php echo form_close(); ?>
<br>

<a href="<?= site_url(route_to('auth.login')) ?>">
		Giriş
</a>
<?=$this->endSection()?>
