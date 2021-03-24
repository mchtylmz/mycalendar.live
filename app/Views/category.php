<?= $this->extend("layout/header") ?>
<?= $this->section("page_content") ?>
<div class="content-page">
    <div class="container">
        <?= view('layout/events_list', [
            'events' => $events,
        ]); ?>
    </div>
</div>
<?= $this->endSection() ?>
