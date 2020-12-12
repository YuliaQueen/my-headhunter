<?php

/* @var $this yii\web\View */

/** @var object $resume */
?>

<div class="content p-rel">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="mt8 mb32"><a href="<?php Yii::$app->request->referrer; ?>"><img
                                src="images/blue-left-arrow.svg" alt="arrow"> Резюме в
                        <?= $resume->city ?></a>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-4 col-md-5 mobile-mb32">
                <div class="profile-foto resume-profile-foto"><img src="images/profile-foto.jpg" alt="profile-foto">
                </div>
            </div>
            <div class="col-lg-8 col-md-7">
                <div class="main-title d-md-flex justify-content-between align-items-center mobile-mb16"><?=
                    /** @var array $position_title */
                    $position_title['position_title'] ?></div>
                <div class="paragraph-lead mb16">
                    <span class="mr24"><?= $resume->salary ?> ₽</span>
                    <span>Опыт работы 3 года</span>
                </div>
                <div class="profile-info company-profile-info resume-view__info-blick">
                    <div class="profile-info__block company-profile-info__block mb8">
                        <div class="profile-info__block-left company-profile-info__block-left">Имя
                        </div>
                        <div class="profile-info__block-right company-profile-info__block-right"><?= $resume->first_name . ' ' . $resume->middle_name . ' ' . $resume->last_name ?></div>
                    </div>
                    <div class="profile-info__block company-profile-info__block mb8">
                        <div class="profile-info__block-left company-profile-info__block-left">Возраст
                        </div>
                        <div class="profile-info__block-right company-profile-info__block-right"><?= $years = floor(
                                (time() - strtotime($resume->birthday)) / (60 * 60 * 24 * 365.25)
                            ); ?> <?= num2word($years, ['год', 'года', 'лет']) ?></div>
                    </div>
                    <div class="profile-info__block company-profile-info__block mb8">
                        <div class="profile-info__block-left company-profile-info__block-left">Занятость</div>
                        <div class="profile-info__block-right company-profile-info__block-right"><?= ($resume->schedule) ? $resume->schedule : 'Не указано' ?></div>
                    </div>
                    <div class="profile-info__block company-profile-info__block mb8">
                        <div class="profile-info__block-left company-profile-info__block-left">График работы
                        </div>
                        <div class="profile-info__block-right company-profile-info__block-right"><?= ($resume->employment) ? $resume->employment : 'Не указано' ?></div>
                    </div>
                    <div class="profile-info__block company-profile-info__block mb8">
                        <div class="profile-info__block-left company-profile-info__block-left">Город проживания
                        </div>
                        <div class="profile-info__block-right company-profile-info__block-right"><?= $resume->city ?></div>
                    </div>
                    <div class="profile-info__block company-profile-info__block mb8">
                        <div class="profile-info__block-left company-profile-info__block-left">
                            Электронная почта
                        </div>
                        <div class="profile-info__block-right company-profile-info__block-right"><a
                                    href="#"><?= $resume->email ?></a></div>
                    </div>
                    <div class="profile-info__block company-profile-info__block mb8">
                        <div class="profile-info__block-left company-profile-info__block-left">
                            Телефон
                        </div>
                        <div class="profile-info__block-right company-profile-info__block-right"><a
                                    href="tel:<?= $resume->phone ?>"><?= $resume->phone ?></a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-12">
                <div class="devide-border mb32 mt50"></div>
                <div class="tabs mb50">
                    <div class="tabs__content active">
                        <div class="row">
                            <div class="col-lg-10">
                                <div class="row mb16">
                                    <div class="col-lg-12"><h3 class="heading mb16">Опыт работы 13 лет и 11
                                            месяцев</h3></div>
                                    <div class="col-md-4 mb16">
                                        <div class="paragraph tbold mb8">Апрель 2013 — по настоящее время</div>
                                        <div class="mini-paragraph">7 лет 1 месяц</div>
                                    </div>
                                    <div class="col-md-8">
                                        <div class="paragraph tbold mb8">Программные системы Атлансис</div>
                                        <div class="paragraph tbold mb8">Директор по стратегическому развитию
                                        </div>
                                        <div class="paragraph">Lorem ipsum dolor sit amet, consectetur
                                            adipiscing elit. Aenean euismod bibendum laoreet. Proin gravida
                                            dolor sit amet lacus accumsan et viverra justo commodo. Proin
                                            sodales pulvinar tempor. Cum sociis natoque penatibus et magnis dis
                                            parturient montes, nascetur ridiculus mus. Nam fermentum, nulla
                                            luctus pharetra vulputate, felis tellus mollis orci, sed rhoncus
                                            sapien nunc eget.
                                        </div>
                                    </div>
                                </div>
                                <div class="row mb16">
                                    <div class="col-md-4 mb16">
                                        <div class="paragraph tbold mb8">Май 2006 — по Март 2013</div>
                                        <div class="mini-paragraph">6 лет 10 месяцев</div>
                                    </div>
                                    <div class="col-md-8">
                                        <div class="paragraph tbold mb8">Программные системы Атлансис</div>
                                        <div class="paragraph tbold mb8">Директор по стратегическому развитию
                                        </div>
                                        <div class="paragraph">Lorem ipsum dolor sit amet, consectetur
                                            adipiscing elit. Aenean euismod bibendum laoreet. Proin gravida
                                            dolor sit amet lacus accumsan et viverra justo commodo. Proin
                                            sodales pulvinar tempor. Cum sociis natoque penatibus et magnis dis
                                            parturient montes, nascetur ridiculus mus. Nam fermentum, nulla
                                            luctus pharetra vulputate, felis tellus mollis orci, sed rhoncus
                                            sapien nunc eget.
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-7">
                                <div class="company-profile-text mb64">
                                    <h3 class="heading mb16">Обо мне</h3>
                                    <p> <?= ($resume->note) ? $resume->note
                                            : "Информация не указана" ?></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
