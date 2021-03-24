<div class="iq-top-navbar">
    <div class="container">
        <div class="iq-navbar-custom">
            <div class="d-flex align-items-center justify-content-between">
                <div class="iq-navbar-logo d-flex align-items-center justify-content-between">
                    <i class="ri-menu-line wrapper-menu"></i>
                    <a href="<?= site_url('/') ?>" class="header-logo">
                        <img src="<?= uploads_url(site_setting('logo')) ?>"
                             class="img-fluid rounded-normal light-logo <?= dark_mode() ? 'd-none' : '' ?>">
                        <img src="<?= uploads_url(site_setting('logo_white')) ?>"
                             class="img-fluid rounded-normal darkmode-logo <?= dark_mode() ? '' : 'd-none' ?>">
                    </a>
                </div>
                <div class="iq-menu-horizontal">
                    <nav class="iq-sidebar-menu">
                        <div class="iq-sidebar-logo d-flex align-items-center justify-content-between">
                            <a href="<?= site_url('/') ?>" class="header-logo">
                                <img src="<?= uploads_url(site_setting('logo')) ?>" class="img-fluid rounded-normal">
                            </a>
                            <div class="iq-menu-bt-sidebar">
                                <i class="las la-bars wrapper-menu"></i>
                            </div>
                        </div>
                        <ul id="iq-sidebar-toggle" class="iq-menu d-flex">
                            <li class="">
                                <a href="<?= site_url() ?>" class="">
                                    <span>Anasayfa</span>
                                </a>
                            </li>
                            <li class="">
                                <a href="#categories" class="collapsed" data-toggle="collapse" aria-expanded="false">
                                    <span>Kategoriler</span>
                                    <i class="ri-arrow-right-s-line iq-arrow-right"></i>
                                </a>
                                <ul id="categories" class="iq-submenu sub-scrll collapse" data-parent="#iq-sidebar-toggle">
                                    <?php foreach (categories() as $key => $category): ?>
                                    <li class="">
                                        <a href="<?=site_url(route_to('category', $category->slug))?>">
                                            <span><?=$category->name?></span>
                                        </a>
                                    </li>
                                    <?php endforeach; ?>
                                </ul>
                            </li>
                            <li class="">
                                <a href="<?= site_url(route_to('contact')) ?>" class="">
                                    <span>İletişim</span>
                                </a>
                            </li>
                        </ul>
                    </nav>
                </div>
                <nav class="navbar navbar-expand-lg navbar-light p-0">
                    <div class="change-mode">
                        <div class="custom-control custom-switch custom-switch-icon custom-control-indivne">
                            <div class="custom-switch-inner">
                                <p class="mb-0"></p>
                                <input type="checkbox" class="custom-control-input" id="dark-mode"
                                       data-active="<?= dark_mode() ? 'true' : 'false' ?>" <?= dark_mode() ? 'checked' : '' ?>
                                ">
                                <label class="custom-control-label" for="dark-mode" data-mode="toggle">
                                    <span class="switch-icon-left"><i class="a-left ri-moon-clear-line"></i></span>
                                    <span class="switch-icon-right"><i class="a-right ri-sun-line"></i></span>
                                </label>
                            </div>
                        </div>
                    </div>
                    <?php if (auth_check()) {
                        echo view('layout/logged_menu.php');
                    } else {
                        echo view('layout/guest_menu.php');
                    } ?>
                </nav>
            </div>
        </div>
    </div>
</div>