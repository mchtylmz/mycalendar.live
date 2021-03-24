<div class="event-content">
    <div class="row">
        <?php if ($events): ?>
            <?php foreach ($events as $key => $event) : ?>
                <div class="col-lg-4 col-md-6">
                    <?= view('event/element/event_design2', [
                        'event' => $event,
                        'showButtons' => $showButtons ?? false,
                        'showCategory' => $showCategory ?? false
                    ]); ?>
                </div>
            <?php endforeach; ?>
            <div class="col-lg-12">
                <?= $pager->links() ?>
            </div>
        <?php else: ?>
            <div class="col-lg-12">
                <?= view('event/element/event_not_found'); ?>
            </div>
        <?php endif; ?>
    </div>
</div>