<?php

/* @var $this yii\web\View */

/* @var object $resumes */
/* @var integer $queryCount */

?>

<?= $this->render('//layouts/inc/search-bar'); ?>

<div class="content">
    <div class="container">
        <h1 class="main-title mt24 mb16">Поиск:  <?= $q; ?></h1>
        <button class="vacancy-filter-btn">Фильтр</button>
        <div class="row">
            <div class="col-lg-9 desctop-992-pr-16">
                <div class="d-flex align-items-center flex-wrap mb8">
                    <span class="paragraph mr16">Найдено <?= $queryCount ?> резюме</span>
                    <div class="vakancy-page-header-dropdowns">
                        <div class="vakancy-page-wrap show mr16">
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                <a class="dropdown-item" href="#">За день</a>
                                <a class="dropdown-item" href="#">За год</a>
                                <a class="dropdown-item" href="#">За все время</a>
                            </div>
                        </div>
                        <div class="vakancy-page-wrap show">
<!--                            --><?//= $sort->link(
//                                'created_at',
//                                [
//                                    'class' => 'vakancy-page-btn vakancy-btn dropdown-toggle',
//                                    'id' => 'dropdownMenuLink',
//                                    'data-toggle' => 'dropdown'
//                                ]
//                            ) ?>

                            <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                <a class="dropdown-item" href="#">По новизне</a>
                                <a class="dropdown-item" href="#">По возрастанию зарплаты</a>
                                <a class="dropdown-item" href="#">По убыванию зарплаты</a>
                            </div>
                        </div>
                    </div>
                </div>
                <?php

                if (empty($resumes)): ?>

                    <h3 class="mini-title mobile-off">Резюме не найдено</h3>

                <?php else: ?>

                    <?php
                    foreach (
                        $resumes

                        as $item
                    ): ?>
                        <div class="vakancy-page-block company-list-search__block resume-list__block p-rel mb16">
                            <div class="company-list-search__block-left">
                                <div class="resume-list__block-img mb8">
                                    <a href="<?= \yii\helpers\Url::to(['resume/view', 'id' => $item->id]) ?>">
                                        <img src="images/profile-foto.jpg" alt="profile">
                                    </a>
                                </div>
                            </div>
                            <div class="company-list-search__block-right">
                                <div class="mini-paragraph cadet-blue mobile-mb12">Обновлено <?= date(
                                        'd-m-Y в H:m:s',
                                        strtotime(
                                            $item->created_at
                                        )
                                    ) ?></div>
                                <h3 class="mini-title mobile-off"><?= /** @var array $positions */
                                    array_search($item->position, $positions) ?></h3>
                                <div class="d-flex align-items-center flex-wrap mb8 ">
                                    <span class="mr16 paragraph"><?= $item->salary ?></span>
                                    <span class="mr16 paragraph"><?= ($item->experience) ? $item->experience : "Нет опыта" ?></span>
                                    <span class="mr16 paragraph"><?= $years = floor(
                                            (time() - strtotime($item->birthday)) / (60 * 60 * 24 * 365.25)
                                        ); ?> <?= num2word($years, ['год', 'года', 'лет']) ?></span>
                                    <span class="mr16 paragraph"><?= $item->city ?></span>
                                </div>
                                <p class="paragraph tbold mobile-off"><?= ($item->experience) ? 'Последнее место работы ' . $item->experience : "" ?></p>
                            </div>
                            <div class="company-list-search__block-middle">
                                <h3 class="mini-title desktop-off">PHP разработчик</h3>
                                <p class="paragraph mb16 mobile-mb32">
                                    <?= ($item->note) ? substr($item->note, 0, 220)
                                        : "Информация не указана" ?>
                                </p>
                            </div>
                        </div>
                    <?php
                    endforeach;
                endif;
                ?>
                <ul class="dor-pagination mb128">

<!--                    --><?//= /** @var object $pages */
//                    \yii\widgets\LinkPager::widget(
//                        [
//                            'pagination' => $pages,
//                        ]
//                    ) ?>

                </ul>
            </div>
            <?= $this->render('//layouts/inc/search-form'); ?>
        </div>
    </div>
</div>
