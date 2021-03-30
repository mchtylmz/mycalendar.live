<div class="modal fade" id="date-event" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content border border-primary m-0 p-0">
            <div class="modal-header p-3 text-center">
                <h5 class="modal-title" id="event_title"></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body p-4 m-0">
                <div class="row align-items-center">

                    <div class="col-lg-6 mb-4">
                        <p class="mb-1">
                            <i class="las la-clock mr-1"></i> Başlangıç
                        </p>
                        <h5 class="mb-1" id="event_start"></h5>
                    </div>

                    <div class="col-lg-6 mb-4">
                        <p class="mb-1">
                        <i class="las la-clock mr-1"></i> Bitiş
                    </p>
                    <h5 class="mb-1" id="event_end"></h5>
                    </div>

                    <div class="col-lg-6 mb-4">
                        <p class="mb-1">
                        <i class="las la-map-marker mr-1"></i> Konum
                    </p>
                    <h5 class="mb-1" id="event_location"></h5>
                    </div>

                    <div class="col-lg-6 mb-4">
                        <p class="mb-1">
                        <i class="las la-calendar-alt mr-1"></i> Kategori
                    </p>
                    <h5 class="mb-1" id="event_category"></h5>
                    </div>

                    <div class="col-lg-12 mb-4">
                        <p class="mb-1">
                        <i class="las la-user mr-1"></i> Oluşturan Üye
                    </p>
                    <h5 class="mb-1" id="event_owner"></h5>
                    </div>

                </div>

            </div>
            <div class="modal-footer p-0 m-0">
                <a href="javascript:void(0)" id="event_link"
                   class="btn btn-primary btn-block pr-5 m-0 rounded-0 position-relative"
                   style="height: 48px; line-height: 36px;">
                    Etkinliğe Gözat
                    <span class="event-add-btn bg-primary" style="height: 48px;">
                        <i class="fas fa-calendar-check"></i>
                    </span>
                </a>
            </div>
        </div>
    </div>
</div>