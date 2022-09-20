<header>
    <!-- Header Start -->
    <div class="header-area header-transparrent">
        <div class="headder-top header-sticky">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-3 col-md-2">
                        <!-- Logo -->
                        <div class="logo">
                            <a href="<?= \yii\helpers\Url::to(['/'])?>"><img
                                        src="<?= Yii::getAlias('@web/img/logo/logo.png')?>" alt=""></a>
                        </div>
                    </div>
                    <div class="col-lg-9 col-md-9">
                        <div class="menu-wrapper">
                            <!-- Main-menu -->
                            <div class="main-menu">
                                <nav class="d-none d-lg-block">
                                    <ul id="navigation">
                                        <li><a href="<?= \yii\helpers\Url::to(['/'])
                                            ?>">Home</a></li>
                                        <li><a href="<?= \yii\helpers\Url::to(['jobs/listings'])
                                            ?>">Find a Jobs </a></li>
                                        <li><a href="<?= \yii\helpers\Url::to(['site/about'])
                                            ?>">About</a></li>
                                     <?php if (!Yii::$app->user->isGuest) {?>
                                         <li><a href="<?= \yii\helpers\Url::to(['jobs/post-a-job'])
                                             ?>">Post a Job</a></li>
                                        <?php }?>
                                        <li><a href="<?= \yii\helpers\Url::to(['site/contact'])
                                            ?>">Contact</a></li>
                                    </ul>
                                </nav>
                            </div>
                            <!-- Header-btn -->
                            <div class="header-btn d-none f-right d-lg-block">
                              <?php if (Yii::$app->user->isGuest) {?>
                                <a href="<?= \yii\helpers\Url::to(['site/signup','user_type'=>'job-seeker'])
                                ?>" class="btn head-btn1">Register</a>
                                <a href="<?= \yii\helpers\Url::to(['site/login'])
                                ?>" class="btn head-btn2">Login</a>
                                <?php }else{?>
                                      <span class="username">
                                          <i class="fa fa-user"></i> <?=
                                          Yii::$app->user->identity->username?>
                                      </span>
                                  <a href="<?= \yii\helpers\Url::to(['site/logout'])
                                  ?>" class="btn head-btn1" data-method="POST"><i
                                              class="fa fa-sign-out"></i>
                                                                                  Logout</a>

                                <?php }?>
                            </div>
                        </div>
                    </div>
                    <!-- Mobile Menu -->
                    <div class="col-12">
                        <div class="mobile_menu d-block d-lg-none"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Header End -->
</header>