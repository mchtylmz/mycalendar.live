<?=$this->extend("layout/base_layout")?>
<?=$this->section("page_content")?>
page_content

<?php echo form_open('auth/login'); ?>
<input type="text" name="aaaa" value="<?= old('aaaa') ?>">
<button type="submit" name="button">asdashvdfvasjgdhva</button>
<?php echo form_close(); ?>
<?php d(
	session('error')
); ?>
<?=$this->endSection()?>
