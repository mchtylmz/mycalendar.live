<?=$this->extend("layout/base_layout")?>
<?=$this->section("page_content")?>


<?php d(
	session('error')
); ?>
<?php echo form_open('auth/forgotPassword'); ?>

<input type="email" name="email" placeholder="E-posta Adresi" value="<?=old('email')?>" autocomplete="off" required>
<br>
<button type="submit" name="button">Şifre Unuttum</button>

<?php echo form_close(); ?>

<?=$this->endSection()?>
