<!DOCTYPE html>
<!-- @mchtylmz149 -->
<html lang="tr" class="no-js">
<head>
<meta charset="utf-8">
<!--[if lt IE 9]>
<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
<![endif]-->
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<meta name="description" content="<?=site_setting('description')?>">
<meta name="keywords" content="<?=site_setting('keywords')?>">
<meta name="author" content="mchtylmz149, mucahityilmaz.mail@gmail.com">
<meta name="copyright" content="Copyright <?=date('Y')?>">
<title><?=(isset($PageTitle) ? $PageTitle . ' - ':'') . site_setting('title')?></title>
<!-- Favicon -->
<link rel="icon" href="<?=uploads_url(site_setting('favicon'))?>">
<!-- Fonts -->
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.12.0/css/all.css" type="text/css">
<!-- Plugins -->

<!-- Custom Header Code -->
<?=$this->renderSection("header_code")?>
<style media="screen">
  input {width: 100%; height: 48px; margin: 20px;}
</style>
<!-- Script -->
<script type="text/javascript">
 var _base_url  = "<?=site_url()?>";
 var _csrftoken = "<?=csrf_hash()?>";
 var _csrfname  = "<?=csrf_token()?>";
</script>
</head>
<body>
<?=$this->renderSection("page_content")?>
<!-- Custom Footer Code -->
<?=$this->renderSection("footer_code")?>
</body>
</html>
