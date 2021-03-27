<!DOCTYPE html>
<!-- @mchtylmz149 -->
<html lang="tr" class="no-js">
<head>
    <meta charset="utf-8">
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <![endif]-->
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="<?= site_setting('description') ?>">
    <meta name="keywords" content="<?= site_setting('keywords') ?>">
    <meta name="author" content="mchtylmz149, mucahityilmaz.mail@gmail.com">
    <meta name="copyright" content="Copyright <?= date('Y') ?>">
    <title><?= (isset($PageTitle) ? $PageTitle . ' - ' : '') . site_setting('title') ?></title>
    <!-- Favicon -->
    <link rel="icon" href="<?= uploads_url(site_setting('favicon')) ?>">
    <!-- Fonts -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.12.0/css/all.css" type="text/css">
    <!-- Plugins -->
    <link rel="stylesheet" href="<?= assets_url('css/backend.min.css') ?>?v=1.0.1">
    <link rel="stylesheet" href="<?= assets_url('vendor/line-awesome/dist/line-awesome/css/line-awesome.min.css') ?>">
    <link rel="stylesheet" href="<?= assets_url('vendor/remixicon/fonts/remixicon.css') ?>">
    <link rel="stylesheet" href="<?= assets_url('css/style.css') ?>">
    <!-- Custom Header Code -->
    <?= $this->renderSection("header_code") ?>
    <!-- Script -->
    <script type="text/javascript">
        var _base_url = "<?=site_url()?>";
        var _csrftoken = "<?=csrf_hash()?>";
        var _csrfname = "<?=csrf_token()?>";
    </script>
</head>
<body class="fixed-top-navbar <?= isset($FixedTopNav) ? 'top-nav' : '' ?> <?= dark_mode() ? 'dark' : '' ?>">
<!-- loader Start -->
<div id="loading">
    <div id="loading-center"></div>
</div>
<!-- loader END -->
<!-- Wrapper Start -->
<div class="wrapper">
    <?= $this->renderSection("nav") ?>
    <?= $this->renderSection("page_content") ?>
</div>
<!-- Wrapper End-->
<?= $this->renderSection("footer") ?>
<!-- script -->
<script src="<?= assets_url('js/backend-bundle.min.js') ?>"></script>
<script src="<?= assets_url('js/customizer.js') ?>"></script>
<script src="<?= assets_url('js/app.js') ?>"></script>
<script src="https://api-maps.yandex.ru/2.1/?lang=tr_TR&amp;apikey=<?=site_setting('yandex_javascript_key')?>" type="text/javascript"></script>
<script src="<?= assets_url('js/yandex.maps.js') ?>"></script>
<!-- Custom Footer Code -->
<?= $this->renderSection("footer_code") ?>
</body>
</html>
