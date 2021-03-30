<?= $this->extend("layout/header") ?>
<?= $this->section("page_content") ?>
<div class="content-page">
    <div class="container">
        <div class="event-content">
            <div class="row">
                <?php if ($users): ?>
                    <?php foreach ($users as $key => $user) : ?>
                        <div class="col-lg-3 col-md-4 col-sm-6">
                            <?= view('layout/user', [
                                'user' => $user,
                            'showButtons' => $showButtons ?? false
                            ]); ?>
                        </div>
                    <?php endforeach; ?>
                    <div class="col-lg-12">
                        <?= $pager->links() ?>
                    </div>
                <?php else: ?>
                    <div class="col-lg-12">
                        <?= view('layout/user_not_found'); ?>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>
