<div class="content-top">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 mb-2">
                <div class="navbar-breadcrumb">
                    <h3 class="mb-1 text-center"><?= $PageTitle ?? lang('Home.index.title') ?></h3>
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
        </div>
    </div>
</div>