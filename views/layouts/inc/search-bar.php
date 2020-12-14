<div class="header-search">
    <div class="container">
        <div class="header-search__wrap">
            <form class="header-search__form" action="<?= \yii\helpers\Url::to(['site/search']); ?>" method="get">
                <a href="#"><img src="images/dark-search.svg" alt="search"
                                 class="dark-search-icon header-search__icon"></a>
                <input class="header-search__input" name="q" type="text" placeholder="Поиск по резюме и навыкам">
                <?= \yii\helpers\Html::submitButton('Найти',['class'=>'blue-btn header-search__btn']) ?>
            </form>
        </div>
    </div>
</div>
