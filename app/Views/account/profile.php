<?=$this->extend("layout/header")?>
<?=$this->section("page_content")?>

Profile
<br>
<?= view('layout/alert.php'); ?>

<style media="screen">
  .useravatar {
    width: 72px;
    height: 72px;
    object-fit: contain;
    border-radius: 50%;
  }
</style>
<img src="<?=$user->getImage()?>" alt="<?=$user->first_name ?? ''?>" class="useravatar">
<?php echo form_open_multipart(route_to('account.updateProfile')); ?>
<div class="form-group">
  <label>first_name</label>
  <input type="text" class="form-control" name="first_name" value="<?=$user->first_name ?? ''?>" required>
</div>
<div class="form-group">
  <label>last_name</label>
  <input type="text" class="form-control" name="last_name" value="<?=$user->last_name ?? ''?>">
</div>
<div class="form-group">
  <label>phone</label>
  <input type="tel" class="form-control" name="phone" value="<?=$user->phone ?? ''?>">
</div>
<div class="form-group">
  <label>email</label>
  <input type="email" class="form-control" name="email" value="<?=$user->email ?? ''?>" required>
</div>
<div class="form-group">
  <label>image</label>
  <input type="file" class="form-control" name="image">
</div>

<button type="submit" class="btn btn-primary">Güncelle</button>

	<?php echo form_close(); ?>
<?=$this->endSection()?>
