<?php use app\models\Resume;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

$form = ActiveForm::begin(
    [
        'options' => ['class' => 'col-lg-3 desctop-992-pl-16 d-flex flex-column vakancy-page-filter-block vakancy-page-filter-block-dnone'],
    ]
) ?>
<div
        class="vakancy-page-filter-block__row mobile-flex-992 mb24 d-flex justify-content-between align-items-center">
    <div class="heading">Фильтр</div>
    <img class="cursor-p" src="images/big-cancel.svg" alt="cancel">
</div>
<div class="signin-modal__switch-btns-wrap resume-list__switch-btns-wrap mb16">
    <button name="SearchModel[gender]" role="radio" value=" " style="cursor: pointer"
            class="signin-modal__switch-btn active">Все
    </button>
    <button name="SearchModel[gender]" role="radio" value="0" style="cursor: pointer" class="signin-modal__switch-btn">
        Мужчины
    </button>
    <button name="SearchModel[gender]" role="radio" value="1" style="cursor: pointer" class="signin-modal__switch-btn">
        Женщины
    </button>
</div>
<div class="vakancy-page-filter-block__row mb24">
    <div class="paragraph cadet-blue">Город</div>
    <?php
    $cities = array_unique(
        \yii\helpers\ArrayHelper::getColumn(Resume::find()->select('city')->orderBy('city')->asArray()->all(), 'city')
    );
    ?>
    <div class="citizenship-select">
        <select class="nselect-1" name="SearchModel[city]">
            <option value="">Выберите город</option>

            <?php foreach ($cities as $item): ?>
                <option value="<?= $item ?>"><?= $item ?></option>
            <?php endforeach; ?>
        </select>
    </div>
</div>
<div class="vakancy-page-filter-block__row mb24">
    <div class="paragraph cadet-blue">Зарплата</div>
    <div class="p-rel">
        <input placeholder="Любая" type="text" class="dor-input w100" name="SearchModel[salary]">
        <img class="rub-icon" src="images/rub-icon.svg" alt="rub-icon">
    </div>
</div>
<div class="vakancy-page-filter-block__row mb24">
    <div class="paragraph cadet-blue">Специализация</div>
    <div class="citizenship-select">
        <?php $items = \yii\helpers\ArrayHelper::map(\app\models\Position::find()->all(), 'id', 'position_title') ?>
        <select class="nselect-1" data-title="Любая" name="SearchModel[position]">
            <?php foreach ($items as $id => $item): ?>
                <option value="<?= $id ?>"><?= $item ?></option>
            <?php endforeach; ?>
        </select>
    </div>
</div>
<div class="vakancy-page-filter-block__row mb24">
    <div class="paragraph cadet-blue">Возраст</div>
    <div class="d-flex">
        <input placeholder="От" type="text" class="dor-input w100">
        <input placeholder="До" type="text" class="dor-input w100">
    </div>
</div>
<div class="vakancy-page-filter-block__row mb24">
    <div class="paragraph cadet-blue">Опыт работы</div>
    <div class="profile-info">
        <div class="form-check d-flex">
            <input type="checkbox" class="form-check-input" id="exampleCheck1">
            <label class="form-check-label" for="exampleCheck1"></label>
            <label for="exampleCheck1" class="profile-info__check-text">Без опыта</label>
        </div>
        <div class="form-check d-flex">
            <input type="checkbox" class="form-check-input" id="exampleCheck2">
            <label class="form-check-label" for="exampleCheck2"></label>
            <label for="exampleCheck2" class="profile-info__check-text">От 1 года до 3
                лет</label>
        </div>
        <div class="form-check d-flex">
            <input type="checkbox" class="form-check-input" id="exampleCheck3">
            <label class="form-check-label" for="exampleCheck3"></label>
            <label for="exampleCheck3" class="profile-info__check-text">От 3 лет до 6
                лет</label>
        </div>
        <div class="form-check d-flex">
            <input type="checkbox" class="form-check-input" id="exampleCheck4">
            <label class="form-check-label" for="exampleCheck4"></label>
            <label for="exampleCheck4" class="profile-info__check-text">Более 6 лет</label>
        </div>
    </div>
</div>
<div class="vakancy-page-filter-block__row mb24">
    <div class="paragraph cadet-blue">Тип занятости</div>
    <div class="profile-info">
        <?php $checkboxes = Resume::getEmploymentCheckboxItems();
        $i = 1;
        foreach ($checkboxes as $checkbox):
            ?>
            <div class="form-check d-flex">
                <input type="checkbox" class="form-check-input" id="employment<?= $i; ?>"
                       name="Resume[employment][]" value="<?= $checkbox ?>">
                <label class="form-check-label" for="employment<?= $i; ?>"></label>
                <label for="employment<?= $i; ?>" class="profile-info__check-text"><?= $checkbox ?></label>
            </div>
            <?php $i++; endforeach; ?>
    </div>
</div>
<div class="vakancy-page-filter-block__row mb24">
    <div class="paragraph cadet-blue">График работы</div>
    <div class="profile-info">
        <?php $checkboxes = Resume::getScheduleCheckboxItems();
        $i = 1;
        foreach ($checkboxes as $checkbox):
            ?>
            <div class="form-check d-flex">
                <input type="checkbox" class="form-check-input" name="Resume[schedule][]"
                       id="schedule<?= $i; ?>"
                       value="<?= $checkbox; ?>">
                <label class="form-check-label" for="schedule<?= $i; ?>"></label>
                <label for="schedule<?= $i; ?>" class="profile-info__check-text"><?= $checkbox ?></label>
            </div>
            <?php $i++; endforeach; ?>
    </div>
</div>

<div class="vakancy-page-filter-block__row mb24 d-flex flex-wrap align-items-center mobile-jus-cont-center">
    <?= Html::submitButton('Показать вакансии', ['class' => 'btn orange-btn w100 mb12 mobile-mb12']) ?>
    <?= Html::resetButton('Сбросить все', ['class' => 'btn btn-danger w100']) ?>
</div>

<?php ActiveForm::end(); ?>
