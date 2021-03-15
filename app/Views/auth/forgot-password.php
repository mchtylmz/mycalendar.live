<?=$this->extend("layout/base_layout")?>
<?=$this->section("page_content")?>

<?= view('layout/alert.php'); ?>
<?php echo form_open(route_to('forgot-password')); ?>

<input type="email" name="email" placeholder="E-posta Adresi" value="<?=old('email')?>" autocomplete="off" required>
<br>
<button type="submit" name="button">Şifre Unuttum</button>

<?php echo form_close(); ?>

<?=$this->endSection()?>
