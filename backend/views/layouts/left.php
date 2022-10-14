<aside class="main-sidebar">

    <section class="sidebar">

        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="logo-sidebar">

                <a href="<?= \yii\helpers\Url::to(['/'])?>"><img
                            src="<?= Yii::getAlias('@web/logo.png')?>" alt=""></a>

            </div>
        </div>



        <?= dmstr\widgets\Menu::widget(
            [
                'options' => ['class' => 'sidebar-menu tree', 'data-widget'=> 'tree'],
                'items' => [
                ['label' => 'Dashboard', 'icon' => 'dashboard', 'url' => ['site/index']],
                    ['label' => 'Jobs Data', 'icon' => 'list', 'url' => ['jobs-data/index']],
                    ['label' => 'Job Seekers', 'icon' => 'search', 'url' => ['job-seeker/index']],
                    ['label' => 'Employers', 'icon' => 'users', 'url' => ['employer/index']],
                    ['label' => 'Scrape Jobs', 'icon' => 'users', 'url' => ['scrape-jobs/index']],

                    ['label' => 'Login', 'url' => ['site/login'], 'visible' => Yii::$app->user->isGuest],

                    ['label' => 'Logout', 'icon'=>'sign-out','url' => ['site/logout'],'template'=>' <a href="{url}" data-method="post">{icon} {label}</a>', 'visible' => !Yii::$app->user->isGuest],

                ],
            ]
        ) ?>

    </section>

</aside>
