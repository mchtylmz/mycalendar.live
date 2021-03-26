<?php $active_tab = $active_tab ?? '2'; ?>
<div id="event2" class="tab-pane fade active show">
    <div class="d-flex flex-wrap align-items-center justify-content-between mb-4">
        <ul class="d-flex nav nav-pills text-center schedule-tab" id="events-pills-tab" role="tablist">
            <li class="nav-item">
                <a class="nav-link <?= $active_tab == '1' ? 'active show' : '' ?>" data-toggle="pill"
                   href="#allEvents" role="tab"
                   aria-selected="<?= $active_tab == '1' ? 'true' : 'false' ?>">Tümü</a>
            </li>
            <li class="nav-item">
                <a class="nav-link <?= $active_tab == '2' ? 'active show' : '' ?>" data-toggle="pill"
                   href="#upcomingEvents" role="tab"
                   aria-selected="<?= $active_tab == '2' ? 'true' : 'false' ?>">Yaklaşan</a>
            </li>
            <li class="nav-item">
                <a class="nav-link <?= $active_tab == '3' ? 'active show' : '' ?>" data-toggle="pill"
                   href="#waitingEvents" role="tab"
                   aria-selected="<?= $active_tab == '3' ? 'true' : 'false' ?>">Beklemede</a>
            </li>
            <li class="nav-item">
                <a class="nav-link <?= $active_tab == '4' ? 'active show' : '' ?>" data-toggle="pill"
                   href="#pastEvents" role="tab"
                   aria-selected="<?= $active_tab == '4' ? 'true' : 'false' ?>">Geçmiş</a>
            </li>
        </ul>
    </div>
    <div class="events-content">
        <?php foreach ($tabs as $id => $tab) : ?>
            <div id="<?= $tab ?>Events" class="tab-pane fade <?= $active_tab == ($id + 1) ? 'active show' : '' ?>">
                <div class="row">
                    <?php if ($events[$tab]): ?>
                        <?php foreach ($events[$tab] as $key => $event) : ?>
                            <?php if ($tab == 'all' || $tab == 'past') : ?>
                                <div class="col-lg-12">
                                    <?= view('event/element/event_design1', [
                                        'event' => $event,
                                        'showButtons' => $event->owner->id == auth_user()->id
                                    ]); ?>
                                </div>
                            <?php else : ?>
                                <div class="col-lg-4 col-sm-6 col-12">
                                    <?= view('event/element/event_design2', [
                                        'event' => $event,
                                        'showButtons' => $event->owner->id == auth_user()->id
                                    ]); ?>
                                </div>
                            <?php endif; ?>
                        <?php endforeach; ?>
                        <div class="col-lg-12">
                            <?= $pages[$tab]->only(["page_{$tab}"])->links($tab) ?>
                        </div>
                    <?php else: ?>
                        <div class="col-lg-12">
                            <?= view('event/element/event_not_found'); ?>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>