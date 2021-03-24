<?= $this->extend("layout/header") ?>
<?= $this->section("page_content") ?>
<div class="content-page">
    <div class="container-fluid container">
        <div class="row mt-3">
            <div class="col-lg-4">
                <?= view('account/profile-sidebar', [
                    'User' => $User,
                    'showPhone' => auth_check()
                ]) ?>
            </div>
            <div class="col-lg-8">
                <div class="card card-block mb-3">
                    <div class="card-header d-flex justify-content-between">
                        <div class="iq-header-title">
                            <h4 class="card-title mb-0">About Me</h4>
                        </div>
                    </div>
                    <div class="card-body">
                        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has
                            been the industry's standard
                            dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled
                            it to make a type specimen
                            book. It has survived not only five centuries, but also the leap into electronic
                            typesetting, remaining essentially
                            unchanged. It was popularised in the 1960s with the release of Letraset sheets containing
                            Lorem Ipsum passages, and more
                            recently with desktop publishing software like Aldus PageMaker including versions of Lorem
                            Ipsum.
                        </p>
                        <h5 class="mb-2">Personal Skills</h5>
                        <ul class="list-unstyled mb-0">
                            <li class="mb-3"><i class="fa fa-check-circle text-primary fa-lg mr-2"></i>Lorem ipsum dolor
                                sit amet, consectetur adipiscing elit.
                            </li>
                            <li class="mb-3"><i class="fa fa-check-circle text-primary fa-lg mr-2"></i>Aliquam ultrices
                                tellus in auctor blandit.
                            </li>
                            <li class="mb-3"><i class="fa fa-check-circle text-primary fa-lg mr-2"></i>Etiam tincidunt
                                erat non ante sagittis bibendum.
                            </li>
                            <li class="mb-3"><i class="fa fa-check-circle text-primary fa-lg mr-2"></i>Nunc malesuada
                                massa ut nisl sollicitudin semper.
                            </li>
                            <li><i class="fa fa-check-circle text-primary fa-lg mr-2"></i>Fusce et arcu in dui feugiat
                                finibus.
                            </li>
                        </ul>
                        <h5 class="mb-2 mt-4">Professional Skills</h5>
                        <div class="iq-progress-bar-linear d-inline-block w-100 mb-3">
                            <span>PHP</span>
                            <span class="float-right">90%</span>
                            <div class="iq-progress-bar pro-skill">
                                <span data-percent="90"></span>
                            </div>
                        </div>
                        <div class="iq-progress-bar-linear d-inline-block w-100 mb-3">
                            <span>MySQl</span>
                            <span class="float-right">85%</span>
                            <div class="iq-progress-bar pro-skill">
                                <span data-percent="85" class="bg1"></span>
                            </div>
                        </div>
                        <div class="iq-progress-bar-linear d-inline-block w-100 mb-3">
                            <span>Node Js</span>
                            <span class="float-right">70%</span>
                            <div class="iq-progress-bar pro-skill">
                                <span data-percent="70" class="bg2"></span>
                            </div>
                        </div>
                        <div class="iq-progress-bar-linear d-inline-block w-100">
                            <span>Angular Js</span>
                            <span class="float-right">55%</span>
                            <div class="iq-progress-bar pro-skill">
                                <span data-percent="55" class="bg3"></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>
