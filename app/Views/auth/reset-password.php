<?=$this->extend("layout/base_layout")?>
<?=$this->section("page_content")?>

<?= view('layout/alert.php'); ?>
<?php echo form_open(''); ?>

<br>
<input type="text" name="password" placeholder="Şifre" minlength="6" autocomplete="off" required>
<br>
<input type="text" name="repassword" placeholder="Tekrar Şifre" minlength="6" autocomplete="off" required>
<br>
<button type="submit" name="button">Şifre Yenile</button>

<?php echo form_close(); ?>

<?=$this->endSection()?>
