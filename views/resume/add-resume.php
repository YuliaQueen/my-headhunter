<div class="content p-rel">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="mt8 mb40"><a href="<?= \yii\helpers\Url::home() ?>"><img src="images/blue-left-arrow.svg"
                                                                                     alt="arrow"> Вернуться без
                        сохранения</a>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="main-title mb24">Новое резюме</div>

                <?= \app\widgets\Alert::widget(); ?>
            </div>
            <div class="col-12">
                <?php use yii\widgets\ActiveForm;

                $form = ActiveForm::begin() ?>
                <div class="row mb32">
                    <div class="col-lg-2 col-md-3 dflex-acenter">
                        <div class="paragraph">Фото</div>
                    </div>
                    <div class="col-lg-3 col-md-4 col-11">
                        <div class="profile-foto-upload mb8"><img src="images/profile-foto.jpg" alt="foto">
                        </div>
                        <label class="custom-file-upload">
                            <input type="file"/>
                            Изменить фото
                        </label>
                    </div>
                </div>
                <div class="row mb16">
                    <div class="col-lg-2 col-md-3 dflex-acenter">
                        <div class="paragraph">Фамилия</div>
                    </div>
                    <div class="col-lg-3 col-md-4 col-11">
                        <?php /** @var object $resume */ ?>
                        <?= $form->field($resume, 'last_name')->textInput(['class' => 'dor-input w100'])->label(
                            false
                        ); ?>
                    </div>
                </div>
                <div class="row mb16">
                    <div class="col-lg-2 col-md-3 dflex-acenter">
                        <div class="paragraph">Имя</div>
                    </div>
                    <div class="col-lg-3 col-md-4 col-11">
                        <?= $form->field($resume, 'first_name')->textInput(['class' => 'dor-input w100'])->label(
                            false
                        ); ?>
                    </div>
                </div>
                <div class="row mb16">
                    <div class="col-lg-2 col-md-3 dflex-acenter">
                        <div class="paragraph">Отчество</div>
                    </div>
                    <div class="col-lg-3 col-md-4 col-11">
                        <?= $form->field($resume, 'middle_name')->textInput(['class' => 'dor-input w100'])->label(
                            false
                        ); ?>
                    </div>
                </div>
                <div class="row mb24">
                    <div class="col-lg-2 col-md-3 dflex-acenter">
                        <div class="paragraph">Дата рождения</div>
                    </div>
                    <div class="col-lg-3 col-md-4 col-11">
                        <div class="datepicker-wrap input-group date">
                            <?= $form->field($resume, 'birthday')->textInput(
                                ['class' => 'dor-input dpicker datepicker-input']
                            )->label(false); ?>
                            <img src="images/mdi_calendar_today.svg" alt="">
                        </div>
                    </div>
                </div>
                <div class="row mb16">
                    <div class="col-lg-2 col-md-3 dflex-acenter">
                        <div class="paragraph">Пол</div>
                    </div>
                    <div class="col-lg-3 col-md-4 col-11">

                        <ul class="card-ul-radio profile-radio-list">
                            <li>
                                <input type="radio" id="resume-gender_0" name="Resume[gender]" value="0" checked>
                                <label for="resume-gender_0">Мужской</label>
                            </li>
                            <li>
                                <input type="radio" id="resume-gender_1" name="Resume[gender]" value="1">
                                <label for="resume-gender_1">Женский</label>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="row mb16">
                    <div class="col-lg-2 col-md-3 dflex-acenter">
                        <div class="paragraph">Город проживания</div>
                    </div>
                    <div class="col-lg-3 col-md-4 col-11">
                        <?= $form->field($resume, 'city')->textInput(['class' => 'dor-input w100'])->label(false); ?>
                    </div>
                </div>
                <div class="row mb16">
                    <div class="col-lg-2 col-md-3 dflex-acenter">
                        <div class="heading">Способы связи</div>
                    </div>
                    <div class="col-lg-7 col-10"></div>
                </div>
                <div class="row mb24">
                    <div class="col-lg-2 col-md-3 dflex-acenter">
                        <div class="paragraph">Электронная почта</div>
                    </div>
                    <div class="col-lg-3 col-md-4 col-11">
                        <div class="p-rel">
                            <?= $form->field($resume, 'email')->input('email', ['class' => 'dor-input w100'])->label(
                                false
                            ); ?>
                        </div>
                    </div>
                </div>
                <div class="row mb32">
                    <div class="col-lg-2 col-md-3 dflex-acenter">
                        <div class="paragraph">Телефон</div>
                    </div>
                    <div class="col-lg-3 col-md-4 col-11">
                        <div style="width: 140px;" class="p-rel mobile-w100">
                            <?= $form->field($resume, 'phone')->input(
                                'text',
                                [
                                    'class' => 'dor-input w100',
                                    'placeholder' => '+7 ___ ___-__-__'
                                ]
                            )->label(false); ?>
                        </div>
                    </div>
                </div>
                <div class="row mb24">
                    <div class="col-12">
                        <div class="heading">Желаемая должность</div>
                    </div>
                </div>
                <div class="row mb16">
                    <div class="col-lg-2 col-md-3 dflex-acenter">
                        <div class="paragraph">Специализация</div>
                    </div>
                    <div class="col-lg-3 col-md-4 col-11">
                        <div class="citizenship-select">
                            <?= /** @var array $items */
                            /** @var array $params */
                            /** @var object $resume */
                            $form->field($resume, 'position')
                                ->dropDownList(\yii\helpers\ArrayHelper::map($items, 'id', 'position_title'), $params)
                                ->label(false) ?>
                        </div>
                    </div>
                </div>
                <div class="row mb16">
                    <div class="col-lg-2 col-md-3 dflex-acenter">
                        <div class="paragraph">Зарплата</div>
                    </div>
                    <div class="col-lg-3 col-md-4 col-11">
                        <div class="p-rel">
                            <?= $form->field($resume, 'salary')
                                ->textInput(['class' => 'dor-input w100', 'placeholder' => 'От'])
                                ->label(false); ?>
                            <img class="rub-icon" src="images/rub-icon.svg" alt="rub-icon">
                        </div>
                    </div>
                </div>
                <div class="row mb32">
                    <div class="col-lg-2 col-md-3">
                        <div class="paragraph">Занятость</div>
                    </div>
                    <div class="col-lg-3 col-md-4 col-11">
                        <div class="profile-info">
                            <?php $i = 1;
                            /** @var array $employmentCheck */
                            foreach ($employmentCheck as $checkbox): ?>
                                <div class="form-check d-flex">
                                    <input type="checkbox" class="form-check-input" id="employment<?= $i; ?>"
                                           name="Resume[employment][]" value="<?= $checkbox; ?>">
                                    <label class="form-check-label" for="employment<?= $i; ?>"></label>
                                    <label for="employment<?= $i; ?>"
                                           class="profile-info__check-text job-resolution-checkbox"><?= $checkbox ?></label>
                                </div>
                                <?php $i++; endforeach; ?>
                        </div>
                    </div>
                </div>
                <div class="row mb32">
                    <div class="col-lg-2 col-md-3">
                        <div class="paragraph">График работы</div>
                    </div>
                    <div class="col-lg-3 col-md-4 col-11">
                        <div class="profile-info">
                            <?php $i = 1;
                            /** @var array $scheduleCheck */
                            foreach ($scheduleCheck as $checkbox): ?>
                                <div class="form-check d-flex">
                                    <input type="checkbox" class="form-check-input" name="Resume[schedule][]"
                                           id="schedule<?= $i; ?>"
                                           value="<?= $checkbox; ?>">
                                    <label class="form-check-label" for="schedule<?= $i; ?>"></label>
                                    <label for="schedule<?= $i; ?>"
                                           class="profile-info__check-text job-resolution-checkbox"><?= $checkbox ?></label>
                                </div>
                                <?php
                                $i++;
                            endforeach; ?>
                        </div>
                    </div>
                </div>
                <div class="row mb32">
                    <div class="col-12">
                        <div class="heading">Опыт работы</div>
                    </div>
                </div>
                <div class="row mb32">
                    <div class="col-lg-2 col-md-3">
                        <div class="paragraph">Опыт работы</div>
                    </div>
                    <div class="col-lg-3 col-md-4 col-11">
                        <ul class="card-ul-radio profile-radio-list">
                            <li>
                                <input type="radio" id="test9131" name="radio-group3123" checked="">
                                <label for="test9131">Нет опыта работы</label>
                            </li>
                            <li>
                                <input type="radio" id="test10242" name="radio-group3123">
                                <label for="test10242">Есть опыт работы</label>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="job-info">
                    <div class="row mb24">
                        <div class="col-lg-2 col-md-3 dflex-acenter">
                            <div class="paragraph">Начало работы</div>
                        </div>
                        <div class="col-lg-3 col-md-4 col-11">
                            <div class="d-flex justify-content-between">
                                <div class="citizenship-select w100 mr16">
                                    <select class="nselect-1" data-title="Май">
                                        <option value="01">Июнь</option>
                                        <option value="02">Июль</option>
                                        <option value="03">Август</option>
                                        <option value="04">Сентябрь</option>
                                    </select>
                                </div>
                                <div class="citizenship-select w100">
                                    <input placeholder="2006" type="text" class="dor-input w100">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row mb8">
                        <div class="col-lg-2 col-md-3 dflex-acenter">
                            <div class="paragraph">Окончание работы</div>
                        </div>
                        <div class="col-lg-3 col-md-4 col-11">
                            <div class="d-flex justify-content-between">
                                <div class="citizenship-select w100 mr16">
                                    <select class="nselect-1" data-title="Март">
                                        <option value="01">Июнь</option>
                                        <option value="02">Июль</option>
                                        <option value="03">Август</option>
                                        <option value="04">Сентябрь</option>
                                    </select>
                                </div>
                                <div class="citizenship-select w100">
                                    <input placeholder="2006" type="text" class="dor-input w100">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row mb32">
                        <div class="col-lg-2 col-md-3">
                        </div>
                        <div class="col-lg-3 col-md-4 col-11">
                            <div class="profile-info">
                                <div class="form-check d-flex">
                                    <input type="checkbox" class="form-check-input" id="exampleCheck111">
                                    <label class="form-check-label" for="exampleCheck111"></label>
                                    <label for="exampleCheck111"
                                           class="profile-info__check-text job-resolution-checkbox">По настоящее
                                        время</label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row mb16">
                        <div class="col-lg-2 col-md-3 dflex-acenter">
                            <div class="paragraph">Организация</div>
                        </div>
                        <div class="col-lg-3 col-md-4 col-11">
                            <input type="text" class="dor-input w100">
                        </div>
                    </div>
                    <div class="row mb16">
                        <div class="col-lg-2 col-md-3 dflex-acenter">
                            <div class="paragraph">Должность</div>
                        </div>
                        <div class="col-lg-3 col-md-4 col-11">
                            <input type="text" class="dor-input w100">
                        </div>
                    </div>
                    <div class="row mb64 mobile-mb32">
                        <div class="col-lg-2 col-md-3">
                            <div class="paragraph">Обязанности, функции, достижения</div>
                        </div>
                        <div class="col-lg-4 col-md-6 col-12">
                            <textarea class="dor-input w100 h96 mb8"
                                      placeholder="Расскажите о своих обязанностях, функциях и достижениях"></textarea>
                            <div class="mb24"><a href="#">Удалить место работы</a></div>

                        </div>
                    </div>
                    <div class="row mb24">
                        <div class="col-lg-2 col-md-3">
                        </div>
                        <div class="col-lg-4 col-md-6 col-12">
                            <div class="devide-border"></div>
                        </div>
                    </div>
                </div>
                <div class="row mb16">
                    <div><a href="#">+ Добавить место работы</a></div>
                </div>
                <div class="row mb32">
                    <div class="col-12">
                        <div class="heading">Расскажите о себе</div>
                    </div>
                </div>
                <div class="row mb64 mobile-mb32">
                    <div class="col-lg-2 col-md-3">
                        <div class="paragraph">О себе</div>
                    </div>
                    <div class="col-lg-5 col-md-7 col-12">
                        <?= $form->field($resume, 'note')->textarea(['class' => 'dor-input w100 h176 mb8'])->label(
                            false
                        ); ?>
                    </div>
                </div>
                <div class="row mb128 mobile-mb64">
                    <div class="col-lg-2 col-md-3">
                    </div>
                    <div class="col-lg-10 col-md-9">
                        <?= \yii\helpers\Html::submitButton('Сохранить', ['class' => 'orange-btn link-orange-btn']); ?>
                        <!--                    <a href="#" class="orange-btn link-orange-btn">Сохранить</a>-->
                    </div>
                </div>
                <?php $form = ActiveForm::end() ?>
            </div>
        </div>
    </div>
