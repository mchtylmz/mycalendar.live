<?=$this->extend("layout/base_layout")?>
<?=$this->section("page_content")?>

<?= view('layout/alert.php'); ?>
<?php echo form_open(route_to('login')); ?>

<input type="email" name="email" placeholder="E-posta Adresi" value="<?=old('email')?>" autocomplete="off" required>
<br>
<input type="password" name="password" placeholder="Şifre" minlength="6" autocomplete="off" required>
<br>
<button type="submit" name="button">Giriş Yap</button>

<?php echo form_close(); ?>

<?=$this->endSection()?>
