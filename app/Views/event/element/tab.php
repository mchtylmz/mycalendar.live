<?php $active_tab = $active_tab ?? '2'; ?>
<div id="event2" class="tab-pane fade active show">
    <div class="d-flex flex-wrap align-items-center justify-content-between mb-4">
        <ul class="d-flex nav nav-pills text-center schedule-tab" id="events-pills-tab" role="tablist">
            <li class="nav-item">
                <a class="nav-link <?=$active_tab == '1' ? 'active show':''?>" data-toggle="pill" href="#allEvents" data-extras="#filter-none" role="tab"
                   aria-selected="<?=$active_tab == '1' ? 'true':'false'?>">Tümü</a>
            </li>
            <li class="nav-item">
                <a class="nav-link <?=$active_tab == '2' ? 'active show':''?>" data-toggle="pill" href="#upEvents" data-extras="#filter-button"
                   role="tab" aria-selected="<?=$active_tab == '2' ? 'true':'false'?>">Yaklaşan</a>
            </li>
            <li class="nav-item">
                <a class="nav-link <?=$active_tab == '3' ? 'active show':''?>" data-toggle="pill" href="#penEvents" data-extras="#filter-none" role="tab"
                   aria-selected="<?=$active_tab == '3' ? 'true':'false'?>">Beklemede</a>
            </li>
            <li class="nav-item">
                <a class="nav-link <?=$active_tab == '4' ? 'active show':''?>" data-toggle="pill" href="#pastEvents" data-extras="#filter-button" role="tab"
                   aria-selected="<?=$active_tab == '4' ? 'true':'false'?>">Geçmiş</a>
            </li>
        </ul>
    </div>
    <div class="events-content">
        <div id="allEvents" class="tab-pane fade <?=$active_tab == '1' ? 'active show':''?>">
            <div class="row">
                <?php if ($events_all): ?>
                    <?php foreach ($events_all as $key => $event) : ?>
                        <div class="col-lg-12">
                            <?= view('event/element/event_design1', [
                                'event' => $event,
                                'showButtons' => $event->owner->id == auth_user()->id
                            ]); ?>
                        </div>
                    <?php endforeach; ?>
                    <div class="col-lg-12">
                        <?= $pager->only(['page_all'])->links('all') ?>
                    </div>
                <?php else: ?>
                    <div class="col-lg-12">
                        <?= view('event/element/event_not_found'); ?>
                    </div>
                <?php endif; ?>
            </div>
        </div>
        <div id="upEvents" class="tab-pane fade <?=$active_tab == '2' ? 'active show':''?>">
            <div class="row">
                <?php if ($events_upcoming): ?>
                    <?php foreach ($events_upcoming as $key => $event) : ?>
                        <div class="col-lg-4 col-md-6">
                            <?= view('event/element/event_design2', [
                                'event' => $event,
                                'showButtons' => $event->owner->id == auth_user()->id
                            ]); ?>
                        </div>
                    <?php endforeach; ?>
                    <div class="col-lg-12">
                        <?= $pager_up->only(['page_up'])->links('up') ?>
                    </div>
                <?php else: ?>
                    <div class="col-lg-12">
                        <?= view('event/element/event_not_found'); ?>
                    </div>
                <?php endif; ?>
            </div>
        </div>
        <div id="penEvents" class="tab-pane fade <?=$active_tab == '3' ? 'active show':''?>">
            <div class="row">
                <?php if (!$events_upcoming): ?>
                    <?php foreach ($events_upcoming as $key => $event) : ?>
                        <div class="col-lg-4 col-md-6">
                            <?= view('event/element/event_design2', ['event' => $event]); ?>
                        </div>
                    <?php endforeach; ?>
                    <div class="col-lg-12">
                        <?= $pager_up->only(['page_up'])->links('up') ?>
                    </div>
                <?php else: ?>
                    <div class="col-lg-12">
                        <?= view('event/element/event_not_found'); ?>
                    </div>
                <?php endif; ?>
            </div>
        </div>
        <div id="pastEvents" class="tab-pane fade <?=$active_tab == '4' ? 'active show':''?>">
            <div class="row">
                <?php if ($events_upcoming): ?>
                    <?php foreach ($events_upcoming as $key => $event) : ?>
                        <div class="col-lg-4 col-md-6">
                            <?= view('event/element/event_design2', ['event' => $event]); ?>
                        </div>
                    <?php endforeach; ?>
                    <div class="col-lg-12">
                        <?= $pager_up->only(['page_up'])->links('up') ?>
                    </div>
                <?php else: ?>
                    <div class="col-lg-12">
                        <?= view('event/element/event_not_found'); ?>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>