<?= $this->extend("layout/header") ?>
<?= $this->section("page_content") ?>
<div class="content-page">
    <div class="content-top">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 mb-2">
                    <div class="navbar-breadcrumb">
                        <div class="row align-items-center justify-content-between p-2">
                            <div class="col-8">
                                <h3 class="mb-1"><?= lang('Calendar.index.title') ?></h3>
                            </div>
                            <div class="col-4 text-right">
                                <a href="<?= site_url(route_to('event.new')) ?>"
                                   class="btn btn-primary pr-5 position-relative"
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
                <div class="col-lg-12">
                    <form method="GET" class="searchbox">
                        <?= view('event/form/search', [
                            'c' => service('request')->getGet('c'),
                            'q' => service('request')->getGet('q')
                        ]); ?>
                    </form>
                </div>
                <div class="col-lg-12">
                    <?= view('layout/alert'); ?>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="event-content">

            <?= view('event/element/tab', [
                'active_tab' => $active_tab,
                'events_all' => $events_all,
                'pager' => $pager,
                'pager_up' => $pager_up
            ]); ?>
        </div>
    </div>
</div>
<?= $this->endSection() ?>
