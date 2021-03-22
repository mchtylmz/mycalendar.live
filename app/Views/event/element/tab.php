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
        <div id="allEvents" class="tab-pane fade">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card card-block card-stretch">
                        <div class="card-body">
                            <div class="d-flex flex-wrap align-items-center justify-content-between">
                                <div class="d-flex flex-wrap align-items-center">
                                    <div class="date mr-3"><h4 class="text-info">15 Dec</h4></div>
                                    <div class="border-left pl-3">
                                        <div class="media align-items-top">
                                            <h5 class="mb-3">Calendify Inner Pages</h5>
                                            <div class="badge badge-color ml-3">Upcoming</div>
                                        </div>
                                        <div class="media align-items-center">
                                            <p class="mb-0 pr-3"><i class="las la-clock mr-2 text-info"></i>08 Pm - 09
                                                Pm</p>
                                            <p class="mb-0"><i class="las la-map-marker mr-2 text-info"></i>1 Circle
                                                Street Leominster, Ma 01453</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="d-flex align-items-center list-action">
                                    <a class="badge mr-3" data-toggle="tooltip" data-placement="top" title=""
                                       data-original-title="Edit" href="#"><i class="ri-edit-box-line"></i></a>
                                    <a class="badge" data-toggle="tooltip" data-placement="top" title=""
                                       data-original-title="Delete" href="#"><i class="ri-delete-bin-line"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-12">
                    <div class="card card-block card-stretch">
                        <div class="card-body">
                            <div class="d-flex flex-wrap align-items-center justify-content-between">
                                <div class="d-flex flex-wrap align-items-center">
                                    <div class="date mr-3"><h4 class="text-danger">25 Dec</h4></div>
                                    <div class="border-left pl-3">
                                        <div class="media align-items-top">
                                            <h5 class="mb-3">Admin Dashboard Team Meet</h5>
                                            <div class="badge badge-color ml-3">Upcoming</div>
                                        </div>
                                        <div class="media align-items-center">
                                            <p class="mb-0 pr-3"><i class="las la-clock mr-2 text-danger"></i>09:45 Pm -
                                                10 Pm</p>
                                            <p class="mb-0"><i class="las la-map-marker mr-2 text-danger"></i>1 Circle
                                                Street Leominster, Ma 01453</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="d-flex align-items-center list-action">
                                    <a class="badge mr-3" data-toggle="tooltip" data-placement="top" title=""
                                       data-original-title="Edit" href="#"><i class="ri-edit-box-line"></i></a>
                                    <a class="badge" data-toggle="tooltip" data-placement="top" title=""
                                       data-original-title="Delete" href="#"><i class="ri-delete-bin-line"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-12">
                    <div class="card card-block card-stretch">
                        <div class="card-body">
                            <div class="d-flex flex-wrap align-items-center justify-content-between">
                                <div class="d-flex flex-wrap align-items-center">
                                    <div class="date mr-3"><h4 class="text-success">29 Dec</h4></div>
                                    <div class="border-left pl-3">
                                        <div class="media align-items-top">
                                            <h5 class="mb-3">Calendify Pre-Launch Campaign</h5>
                                            <div class="badge badge-color ml-3">Pending</div>
                                        </div>
                                        <div class="media align-items-center">
                                            <p class="mb-0 pr-3"><i class="las la-clock mr-2 text-success"></i>10 Pm -
                                                10:30 Pm</p>
                                            <p class="mb-0"><i class="las la-map-marker mr-2 text-success"></i>1 Circle
                                                Street Leominster, Ma 01453</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="d-flex align-items-center list-action">
                                    <a class="badge mr-3" data-toggle="tooltip" data-placement="top" title=""
                                       data-original-title="Edit" href="#"><i class="ri-edit-box-line"></i></a>
                                    <a class="badge" data-toggle="tooltip" data-placement="top" title=""
                                       data-original-title="Delete" href="#"><i class="ri-delete-bin-line"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div id="upEvents" class="tab-pane fade active show">
            <div class="row">
                <div class="col-lg-4 col-md-6">
                    <div class="card card-block card-stretch card-height">
                        <div class="card-body rounded event-detail event-detail-info">
                            <div class="d-flex align-items-center justify-content-between mb-4">
                                <div>
                                    <h1 class="text-info">18</h1>
                                    <h5 class="text-info">Dec</h5>
                                </div>
                                <div class="d-flex align-items-center list-action">
                                    <a class="badge mr-3" data-toggle="tooltip" data-placement="top" title=""
                                       data-original-title="Edit" href="#"><i class="ri-edit-box-line"></i></a>
                                    <a class="badge" data-toggle="tooltip" data-placement="top" title=""
                                       data-original-title="Delete" href="#"><i class="ri-delete-bin-line"></i></a>
                                </div>
                            </div>
                            <h4 class="my-2">Xamin WordPress Theme Update</h4>
                            <p class="mb-4 card-description">Major update v2.5 version of Xamin theme. Make Xamin in
                                Elementor version and document the steps.</p>
                            <p class="mb-2 text-info"><i class="las la-clock mr-3"></i>08 Pm - 09 Pm</p>
                            <p class="mb-2 text-info"><i class="las la-map-marker mr-3"></i>1 Circle Street Leominster,
                                Ma 01453</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="card card-block card-stretch card-height">
                        <div class="card-body rounded event-detail event-detail-danger">
                            <div class="d-flex align-items-center justify-content-between mb-4">
                                <div>
                                    <h1 class="text-danger">25</h1>
                                    <h5 class="text-danger">Dec</h5>
                                </div>
                                <div class="d-flex align-items-center list-action">
                                    <a class="badge mr-3" data-toggle="tooltip" data-placement="top" title=""
                                       data-original-title="Edit" href="#"><i class="ri-edit-box-line"></i></a>
                                    <a class="badge" data-toggle="tooltip" data-placement="top" title=""
                                       data-original-title="Delete" href="#"><i class="ri-delete-bin-line"></i></a>
                                </div>
                            </div>
                            <h4 class="my-2">Iqonic Design Christmas Campaign</h4>
                            <p class="mb-4 card-description">Draft an conversional and Sales-driven Christmas campaign
                                by offering Christmas deals to customers. </p>
                            <p class="mb-2 text-danger"><i class="las la-clock mr-3"></i>09:45 Pm - 10 Pm</p>
                            <p class="mb-2 text-danger"><i class="las la-map-marker mr-3"></i>1 Circle Street
                                Leominster, Ma 01453</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="card card-block card-stretch card-height">
                        <div class="card-body rounded event-detail event-detail-success">
                            <div class="d-flex align-items-center justify-content-between mb-4">
                                <div>
                                    <h1 class="text-success">29</h1>
                                    <h5 class="text-success">Dec</h5>
                                </div>
                                <div class="d-flex align-items-center list-action">
                                    <a class="badge mr-3" data-toggle="tooltip" data-placement="top" title=""
                                       data-original-title="Edit" href="#"><i class="ri-edit-box-line"></i></a>
                                    <a class="badge" data-toggle="tooltip" data-placement="top" title=""
                                       data-original-title="Delete" href="#"><i class="ri-delete-bin-line"></i></a>
                                </div>
                            </div>
                            <h4 class="my-2">Best Iqonic Design Item Collections</h4>
                            <p class="mb-4 card-description">Build the best Iqonic collectable list of WordPress themes,
                                HTML, Vuejs Admin Dashboards and Mobile Applications. </p>
                            <p class="mb-2 text-success"><i class="las la-clock mr-3"></i>10 Pm - 10:30 Pm</p>
                            <p class="mb-2 text-success"><i class="las la-map-marker mr-3"></i>1 Circle Street
                                Leominster, Ma 01453</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div id="penEvents" class="tab-pane fade">
            <div class="row">
                <div class="col-lg-4 col-md-6">
                    <div class="card card-block card-stretch card-height">
                        <div class="card-body rounded event-detail event-detail1">
                            <div class="d-flex align-items-center justify-content-between mb-4">
                                <div>
                                    <h1 class="text-info">25</h1>
                                    <h5 class="text-info">Dec</h5>
                                </div>
                                <div class="d-flex align-items-center list-action">
                                    <a class="badge mr-3" data-toggle="tooltip" data-placement="top" title=""
                                       data-original-title="Edit" href="#"><i class="ri-edit-box-line"></i></a>
                                    <a class="badge" data-toggle="tooltip" data-placement="top" title=""
                                       data-original-title="Delete" href="#"><i class="ri-delete-bin-line"></i></a>
                                </div>
                            </div>
                            <h4 class="my-2">Calendify Homepage Final Edits</h4>
                            <p class="mb-4 card-description">Enhance Calendify with beautiful user interface and UI
                                changes to ensure high conversion rate.</p>
                            <p class="mb-2 text-info"><i class="las la-clock mr-3"></i>08 Pm - 09 Pm</p>
                            <p class="mb-2 text-info"><i class="las la-map-marker mr-3"></i>1 Circle Street Leominster,
                                Ma 01453</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="card card-block card-stretch card-height">
                        <div class="card-body rounded event-detail event-detail2 active">
                            <div class="d-flex align-items-center justify-content-between mb-4">
                                <div>
                                    <h1 class="text-danger">07</h1>
                                    <h5 class="text-danger">Jan</h5>
                                </div>
                                <div class="d-flex align-items-center list-action">
                                    <a class="badge mr-3" data-toggle="tooltip" data-placement="top" title=""
                                       data-original-title="Edit" href="#"><i class="ri-edit-box-line"></i></a>
                                    <a class="badge" data-toggle="tooltip" data-placement="top" title=""
                                       data-original-title="Delete" href="#"><i class="ri-delete-bin-line"></i></a>
                                </div>
                            </div>
                            <h4 class="my-2">Calendify Promotional Campaign</h4>
                            <p class="mb-4 card-description">Schedule meetings and promotional campaigns for your
                                internal team by assigning task and roles.</p>
                            <p class="mb-2 text-danger"><i class="las la-clock mr-3"></i>09:45 Pm - 10 Pm</p>
                            <p class="mb-2 text-danger"><i class="las la-map-marker mr-3"></i>1 Circle Street
                                Leominster, Ma 01453</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="card card-block card-stretch card-height">
                        <div class="card-body rounded event-detail event-detail3">
                            <div class="d-flex align-items-center justify-content-between mb-4">
                                <div>
                                    <h1 class="text-success">15</h1>
                                    <h5 class="text-success">Jan</h5>
                                </div>
                                <div class="d-flex align-items-center list-action">
                                    <a class="badge mr-3" data-toggle="tooltip" data-placement="top" title=""
                                       data-original-title="Edit" href="#"><i class="ri-edit-box-line"></i></a>
                                    <a class="badge" data-toggle="tooltip" data-placement="top" title=""
                                       data-original-title="Delete" href="#"><i class="ri-delete-bin-line"></i></a>
                                </div>
                            </div>
                            <h4 class="my-2">Exploring Automatic Timezone Detection</h4>
                            <p class="mb-4 card-description">An internal team meeting to brief on a feature where the
                                meeting will be seen in viewer’s time zone with automatic timezone detection in
                                Calendify. </p>
                            <p class="mb-2 text-success"><i class="las la-clock mr-3"></i>10 Pm - 10:30 Pm</p>
                            <p class="mb-2 text-success"><i class="las la-map-marker mr-3"></i>1 Circle Street
                                Leominster, Ma 01453</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div id="pastEvents" class="tab-pane fade">
            <div class="row">
                <div class="col-lg-4 col-md-6">
                    <div class="card card-block card-stretch card-height">
                        <div class="card-body rounded event-detail event-detail1">
                            <div class="d-flex align-items-center justify-content-between mb-4">
                                <div>
                                    <h1 class="text-info">03</h1>
                                    <h5 class="text-info">Dec</h5>
                                </div>
                                <div class="d-flex align-items-center list-action">
                                    <a class="badge mr-3" data-toggle="tooltip" data-placement="top" title=""
                                       data-original-title="Edit" href="#"><i class="ri-edit-box-line"></i></a>
                                    <a class="badge" data-toggle="tooltip" data-placement="top" title=""
                                       data-original-title="Delete" href="#"><i class="ri-delete-bin-line"></i></a>
                                </div>
                            </div>
                            <h4 class="my-2">Webtech-Developer Horror Stories</h4>
                            <p class="mb-4 card-description">Lorem Ipsum Dolor Sit Amet, Consecetetur Adip Iscing Elit.
                                Pharetra Luctus Ultricies Velit Ut. Id Tincidunt Mattis Sed Duis.</p>
                            <p class="mb-2 text-info"><i class="las la-clock mr-3"></i>08 Pm - 09 Pm</p>
                            <p class="mb-2 text-info"><i class="las la-map-marker mr-3"></i>1 Circle Street Leominster,
                                Ma 01453</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="card card-block card-stretch card-height">
                        <div class="card-body rounded event-detail event-detail2 active">
                            <div class="d-flex align-items-center justify-content-between mb-4">
                                <div>
                                    <h1 class="text-danger">16</h1>
                                    <h5 class="text-danger">Dec</h5>
                                </div>
                                <div class="d-flex align-items-center list-action">
                                    <a class="badge mr-3" data-toggle="tooltip" data-placement="top" title=""
                                       data-original-title="Edit" href="#"><i class="ri-edit-box-line"></i></a>
                                    <a class="badge" data-toggle="tooltip" data-placement="top" title=""
                                       data-original-title="Delete" href="#"><i class="ri-delete-bin-line"></i></a>
                                </div>
                            </div>
                            <h4 class="my-2">Meetup-Meeing With Team of Designer</h4>
                            <p class="mb-4 card-description">Lorem Ipsum Dolor Sit Amet, Consecetetur Adip Iscing Elit.
                                Pharetra Luctus Ultricies Velit Ut. Id Tincidunt Mattis Sed Duis.</p>
                            <p class="mb-2 text-danger"><i class="las la-clock mr-3"></i>09:45 Pm - 10 Pm</p>
                            <p class="mb-2 text-danger"><i class="las la-map-marker mr-3"></i>1 Circle Street
                                Leominster, Ma 01453</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="card card-block card-stretch card-height">
                        <div class="card-body rounded event-detail event-detail3">
                            <div class="d-flex align-items-center justify-content-between mb-4">
                                <div>
                                    <h1 class="text-success">27</h1>
                                    <h5 class="text-success">Dec</h5>
                                </div>
                                <div class="d-flex align-items-center list-action">
                                    <a class="badge mr-3" data-toggle="tooltip" data-placement="top" title=""
                                       data-original-title="Edit" href="#"><i class="ri-edit-box-line"></i></a>
                                    <a class="badge" data-toggle="tooltip" data-placement="top" title=""
                                       data-original-title="Delete" href="#"><i class="ri-delete-bin-line"></i></a>
                                </div>
                            </div>
                            <h4 class="my-2">Project Plan-Do Anaylsis Of Project</h4>
                            <p class="mb-4 card-description">Lorem Ipsum Dolor Sit Amet, Consecetetur Adip Iscing Elit.
                                Pharetra Luctus Ultricies Velit Ut. Id Tincidunt Mattis Sed Duis.</p>
                            <p class="mb-2 text-success"><i class="las la-clock mr-3"></i>10 Pm - 10:30 Pm</p>
                            <p class="mb-2 text-success"><i class="las la-map-marker mr-3"></i>1 Circle Street
                                Leominster, Ma 01453</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>