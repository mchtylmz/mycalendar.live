<?= $this->extend("layout/header") ?>
<?= $this->section("page_content") ?>
<div class="content-page">
    <div class="container-fluid container">
        <div class="p-0 list-group mb-3">
            <?php if ($notifications) : ?>
                <?php foreach ($notifications as $notification): ?>
                    <a href="<?= $notification->link ?>"
                       class="list-group-item list-group-item-action border border-bottom p-2">
                        <div class="d-flex w-100 justify-content-between text-right">
                            <small><?= $notification->timeago ?></small>
                        </div>
                        <p class="mb-1"><?= $notification->message ?></p>
                    </a>
                <?php endforeach; ?>
            <?php else: ?>
                <a class="list-group-item list-group-item-action border border-bottom p-2">
                    <p class="mt-1 mb-1 text-center">Gösterilecek bildirim yok!.</p>
                </a>
            <?php endif; ?>
        </div>
        <?= $pager->links() ?>
    </div>
</div>
<?= $this->endSection() ?>
