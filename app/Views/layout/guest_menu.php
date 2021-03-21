<a class="navbar-toggler" >
    <i class="ri-login-circle-line"></i>
</a>
<div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav ml-auto navbar-list align-items-center">
        <li class="nav-item nav-icon dropdown">
            <a href="<?=site_url(route_to('auth.login'))?>" class="search-toggle d-flex align-items-center" style="height: 73px">
                <img src="https://www.aomarabuluculuk.com/img/profile_placeholder.png" class="avatar-40 img-fluid rounded"
                     alt="<?=lang('Auth.login.title')?> / <?=lang('Auth.register.title')?>">
                <div class="caption ml-3">
                    <h6 class="mb-0 line-height">
                        <?=lang('Auth.login.title')?> / <?=lang('Auth.register.title')?>
                    </h6>
                </div>
            </a>
        </li>
    </ul>
</div>