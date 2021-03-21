<?=$this->extend("layout/header")?>
<?=$this->section("page_content")?>
<div class="content-page">
    <div class="content-top">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 mb-3">
                    <div class="d-flex align-items-center justify-content-between">
                        <div class="navbar-breadcrumb">
                            <div class="row">
                                <div class="col-10">
                                    <h3 class="mb-1"><?= lang('Calendar.index.title') ?></h3>
                                </div>
                                <div class="col-2 d-xl-none d-lg-none">
                                    <div class="float-sm-right">
                                        <a href="<?=site_url(route_to('event.new'))?>" class="btn btn-primary pr-5 position-relative"
                                           style="height: 40px;">
                                            Ekle
                                            <span class="event-add-btn" style="height: 40px;">
                                                <i class="fas fa-plus"></i>
                                            </span>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-8 col-md-8">
                    <div class="d-flex flex-wrap align-items-center mb-4">
                        <div class="iq-search-bar search-device mb-0 pr-3">
                            <form action="#">
                                <input type="text" class="text search-input" placeholder="Search...">
                            </form>
                        </div>
                        <div class="float-sm-right">
                            <button class="btn btn-primary pr-5 position-relative" style="height: 40px;">
                                Ara
                                <span class="event-add-btn" style="height: 40px;">
                                 <i class="fas fa-search"></i>
                                 </span>
                            </button>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 d-none d-xl-block d-lg-block">
                    <div class="float-sm-right">
                        <a href="<?=site_url(route_to('event.new'))?>" class="btn btn-primary pr-5 position-relative" style="height: 40px;">
                            Etkinlik Oluştur
                            <span class="event-add-btn" style="height: 40px;">
                                <i class="fas fa-plus"></i>
                            </span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?=$this->endSection()?>
