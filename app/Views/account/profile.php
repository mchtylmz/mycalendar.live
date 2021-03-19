<?=$this->extend("layout/header")?>
<?=$this->section("page_content")?>
<div class="content-page">
    <div class="container-fluid container">
        <div class="row mt-3">
            <div class="col-lg-4">
                <div class="card card-block p-card">
                    <div class="profile-box">
                        <div class="profile-card rounded">
                            <img src="<?=auth_user()->getImage()?>" alt="profile-bg"
                                 class="avatar-100 rounded d-block mx-auto img-fluid mb-3">
                            <h3 class="font-600 text-white text-center mb-0"><?=auth_user()->getFullname()?></h3>
                            <p class="text-white text-center mb-5"><?=auth_user()->about?></p>
                        </div>
                        <div class="pro-content rounded">
                            <div class="d-flex align-items-center mb-3">
                                <div class="p-icon mr-3">
                                    <i class="las la-envelope-open-text"></i>
                                </div>
                                <p class="mb-0 eml"><?=auth_user()->email?></p>
                            </div>
                            <?php if($phone = auth_user()->phone): ?>
                            <div class="d-flex align-items-center mb-3">
                                <div class="p-icon mr-3">
                                    <i class="las la-phone"></i>
                                </div>
                                <p class="mb-0"><?=$phone?></p>
                            </div>
                            <?php endif; ?>
                            <div class="d-flex justify-content-center">
                                <div class="social-ic d-inline-flex rounded">
                                    <?php if($facebook = auth_user()->facebook): ?>
                                    <a target="_blank" href="https://facebook.com/<?=$facebook?>"><i class="fab fa-facebook-f"></i></a>
                                    <?php endif; ?>
                                    <?php if($twitter = auth_user()->twitter): ?>
                                    <a target="_blank" href="https://twitter.com/<?=$twitter?>"><i class="fab fa-twitter"></i></a>
                                    <?php endif; ?>
                                    <?php if($instagram = auth_user()->instagram): ?>
                                    <a target="_blank" href="https://instagram.com/<?=$instagram?>">
                                        <i class="fab fa-instagram"></i>
                                    </a>
                                    <?php endif; ?>
                                    <?php if($youtube = auth_user()->youtube): ?>
                                    <a target="_blank" href="https://youtube.com/<?=$youtube?>"><i class="fab fa-youtube"></i></a>
                                    <?php endif; ?>
                                    <?php if($linkedin = auth_user()->linkedin): ?>
                                    <a target="_blank" href="https://www.linkedin.com/in/<?=$linkedin?>">
                                        <i class="fab fa-linkedin"></i>
                                    </a>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-8">
                <div class="card card-block mb-3">
                    <div class="card-header d-flex justify-content-between">
                        <div class="iq-header-title">
                            <h4 class="card-title mb-0">About Me</h4>
                        </div>
                    </div>
                    <div class="card-body">
                        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has
                            been the industry's standard
                            dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled
                            it to make a type specimen
                            book. It has survived not only five centuries, but also the leap into electronic
                            typesetting, remaining essentially
                            unchanged. It was popularised in the 1960s with the release of Letraset sheets containing
                            Lorem Ipsum passages, and more
                            recently with desktop publishing software like Aldus PageMaker including versions of Lorem
                            Ipsum.
                        </p>
                        <h5 class="mb-2">Personal Skills</h5>
                        <ul class="list-unstyled mb-0">
                            <li class="mb-3"><i class="fa fa-check-circle text-primary fa-lg mr-2"></i>Lorem ipsum dolor
                                sit amet, consectetur adipiscing elit.
                            </li>
                            <li class="mb-3"><i class="fa fa-check-circle text-primary fa-lg mr-2"></i>Aliquam ultrices
                                tellus in auctor blandit.
                            </li>
                            <li class="mb-3"><i class="fa fa-check-circle text-primary fa-lg mr-2"></i>Etiam tincidunt
                                erat non ante sagittis bibendum.
                            </li>
                            <li class="mb-3"><i class="fa fa-check-circle text-primary fa-lg mr-2"></i>Nunc malesuada
                                massa ut nisl sollicitudin semper.
                            </li>
                            <li><i class="fa fa-check-circle text-primary fa-lg mr-2"></i>Fusce et arcu in dui feugiat
                                finibus.
                            </li>
                        </ul>
                        <h5 class="mb-2 mt-4">Professional Skills</h5>
                        <div class="iq-progress-bar-linear d-inline-block w-100 mb-3">
                            <span>PHP</span>
                            <span class="float-right">90%</span>
                            <div class="iq-progress-bar pro-skill">
                                <span data-percent="90"></span>
                            </div>
                        </div>
                        <div class="iq-progress-bar-linear d-inline-block w-100 mb-3">
                            <span>MySQl</span>
                            <span class="float-right">85%</span>
                            <div class="iq-progress-bar pro-skill">
                                <span data-percent="85" class="bg1"></span>
                            </div>
                        </div>
                        <div class="iq-progress-bar-linear d-inline-block w-100 mb-3">
                            <span>Node Js</span>
                            <span class="float-right">70%</span>
                            <div class="iq-progress-bar pro-skill">
                                <span data-percent="70" class="bg2"></span>
                            </div>
                        </div>
                        <div class="iq-progress-bar-linear d-inline-block w-100">
                            <span>Angular Js</span>
                            <span class="float-right">55%</span>
                            <div class="iq-progress-bar pro-skill">
                                <span data-percent="55" class="bg3"></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>



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
<img src="" alt="<?=$user->first_name ?? ''?>" class="useravatar">
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
