<?=$this->extend("layout/base_layout")?>
<?=$this->section("nav")?>
<?=$this->include('layout/main_menu')?>
<?=$this->endSection()?>
<?=$this->section("footer")?>
<footer class="iq-footer">
    <div class="container-fluid container">
        <div class="row">
            <div class="col-lg-6">
                <ul class="list-inline mb-0">
                    <li class="list-inline-item">
                        <a target="_blank" href="https://github.com/mchtylmz/mycalendar.live">
                            <i class="fab fa-github mr-2"></i> Github/mchtylmz
                        </a>
                    </li>
                </ul>
            </div>
            <div class="col-lg-6 text-right">
                Copyright <?=date('Y')?> All Rights Reserved.
            </div>
        </div>
    </div>
</footer>
<?=$this->endSection()?>