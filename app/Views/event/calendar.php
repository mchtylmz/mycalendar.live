<?= $this->extend("layout/header") ?>

<?= $this->section("page_content") ?>
<div class="content-page">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="card card-block card-stretch">
                    <div class="card-body">
                        <div id="calendar1" class="calendar-s"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?=view('event/element/calendar_modal')?>
<?= $this->endSection() ?>

<?= $this->section("header_code") ?>
<link rel='stylesheet' href="<?= assets_url('vendor/fullcalendar/core/main.css') ?>"/>
<link rel='stylesheet' href="<?= assets_url('vendor/fullcalendar/daygrid/main.css') ?>"/>
<link rel='stylesheet' href="<?= assets_url('vendor/fullcalendar/timegrid/main.css') ?>"/>
<link rel='stylesheet' href="<?= assets_url('vendor/fullcalendar/list/main.css') ?>"/>
<?= $this->endSection() ?>

<?= $this->section("footer_code") ?>
<!-- Fullcalender Javascript -->
<script src="<?= assets_url('vendor/fullcalendar/core/main.js') ?>"></script>
<script src="<?= assets_url('vendor/fullcalendar/daygrid/main.js') ?>"></script>
<script src="<?= assets_url('vendor/fullcalendar/timegrid/main.js') ?>"></script>
<script src="<?= assets_url('vendor/fullcalendar/list/main.js') ?>"></script>
<script src="<?= assets_url('vendor/fullcalendar/interaction/main.js') ?>"></script>
<script src="<?= assets_url('vendor/fullcalendar/core/locales-all.js') ?>"></script>
<?= $this->endSection() ?>
