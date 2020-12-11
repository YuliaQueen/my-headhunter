## Тестовое задание PHP разработчика
### Вёрстка: https://yadi.sk/d/aze2Qwc4W-ctxw 
Функциональные требования
#### Меню
* отображается на всех страницах;
* должен содержать элементы:
* Резюме - при клике должна открываться страница списка резюме;
* Мои резюме - при клике должна открываться страница моих резюме;
#### Футер
* отображается на всех страницах;
#### Страница списка резюме
* Должна содержать следующие элементы:
* поисковая панель:
* поисковое поле;
* кнопка “Найти” - при клике должен происходить полнотекстовый поиск по резюме;
* панель вывода результатов поиска:
* количество найденных результатов;
* сортировка, возможные значения:
* По новизне - результаты должны сортироваться по убыванию даты изменения;
* По возрастанию зарплаты - результаты должны сортироваться по возрастанию цены;
* По убыванию зарплаты - результаты должны сортироваться по убыванию цены;
* элементы результата содержат:
* фото;
* дата обновления;
* специализация;
* зарплата;
* опыт работы;
* возраст;
* город проживания;
* последнее место работы;
* если последнего места работы нет, то отображать: “Без опыта работы”;
* при клике по элементу должна открываться страница просмотра резюме;
* пагинация;
* панель фильтрации:
* должна содержать следующие фильтры:
* выбор пола;
* город;
* зарплата;
* специализация;
* возраст от и до;
* опыт работы;
* тип занятости;
* график работы;
* при любом изменении фильтров должны обновляться результаты поиска;
* все параметры фильтрации и сортировки должны передаваться в get параметрах;
#### Страница просмотра резюме
Должна содержать следующие элементы:
* фото
* специализация
* имя
* возраст
* занятость
* график работы
* город проживания
* контакты:
* электронная почта;
* телефон;
* информация об опыте работы:
* опыт работы;
* места работы:
* отсортирован по убыванию даты начала работы;
* каждый элемент должен состоять:
* дата начала и дата завершения:
* если стоит галочка по настоящее время, то должно выводится: “по настоящее время”;
* продолжительность работы;
* организация;
* должность;
* Обязанности, функции, достижения;
* Обо мне;
#### Страница моих резюме
Должна содержать следующие элементы:
* кнопка “Добавить резюме” - при клике должна открываться страница создания и редактирования резюме.
* список моих резюме:
* должны выводиться все существующие резюме в системе;
* каждый элемент должен содержать следующие элементы:
* специализация;
* зарплата;
* опыт работы;
* город работы;
* просмотры - количество открытий страницы резюме;
* дата публикации;
* кнопка “Открыть” - при клике должна открываться страница просмотра резюме;
* кнопка “Редактировать” - при клике должна открываться страница создания и редактирования резюме;
* кнопка “Удалить” - при клике должна удаляться вакансия;
#### Страница создания и редактирования резюме
Должна содержать следующие элементы:
* Фото - обязательное;
* Фамилия - обязательное, текстовое;
* Имя - обязательное, текстовое;
* Отчество - обязательное, текстовое;
* Дата рождения - обязательное;
* Пол - выбор из значений:
* Мужской - выбран по умолчанию;
* Женский;
* Город проживания - обязательное, выпадающий список;
* Способы связи
* Электронная почта - обязательное, в формате электронной почты;
* Телефон - обязательное, в формате номера телефона;
* Желаемая должность
* Специализация - обязательное, выпадающий список, возможные значения приведены в перечислении 3.1. Специализации;
* Зарплата - обязательное, возможен ввод положительных целых чисел;
* Занятость - возможные значения:
* Полная занятость;
* Частичная занятость;
* Проектная/Временная работа;
* Волонтёрство;
* Стажировка;
* График работы - возможные значения:
* Полный день;
* Сменный график;
* Гибкий график;
* Удалённая работа;
* Вахтовый метод;
* Опыт работы
* опыт работы - выбор из значений:
* Нет опыта работы - при выборе должны скрываться места работы;
* Есть опыт работы - при выборе должны отображаться места работы;
* места работы:
* должны сортироваться по дате начала работы;
* элементы должны состоять из:
* Начало работы - должно состоять из:
* месяц - обязательное, выпадающий список месяцев;
* год - обязательное, возможен ввод значений от 1900 по текущий год;
* Окончания работы - должно состоять из:
* месяц - обязательное, выпадающий список месяцев;
* год - обязательное, возможен ввод значений от 1900 по текущий год;
* По настоящее время:
* не выбрано по умолчанию;
* при выборе должны блокироваться для ввода и очищаться месяц и год окончания;
* Организация - обязательное текстовое поле;
* Должность - обязательное текстовое поле;
* Обязанности, функции, достижения - необязательное текстовое поле;
* кнопка “Удалить место работы” - при клике должно удаляться место работы;
* кнопка “Добавить место работы” - при клике должен добавляться элемент места работы;
* Расскажите о себе
* О себе - не обязательное;
* кнопка “Сохранить” - при клике должна происходит валидация данных:
* если есть ошибки, то они должны отобразиться;
* если ошибок нет, то резюме должно сохраниться и открыться страница моих резюме;
#### Не функциональные требования
* выполнять задание нужно на Yii 2 с использованием Yii 2.0 Basic Application Template;
* в качестве базы данных можно использовать MySql или PostgreSql;
* в работе нужно использоваться систему версионирования кода Git (gitlab.com ,github.com, bitbucket.org);
#### Перечисления
Специализации
* Администратор баз данных
* Аналитик
* Арт-директор
* Инженер
* Компьютерная безопасность
* Контент
* Маркетинг
* Мультимедиа
* Оптимизация сайта (SEO)
* Передача данных и доступ в интернет
* Программирование, Разработка
* Продажи
* Продюсер
* Развитие бизнеса
* Системный администратор
* Системы управления предприятием (ERP)
* Сотовые, Беспроводные технологии
* Стартапы
* Телекоммуникации
* Тестирование
* Технический писатель
* Управление проектами
* Электронная коммерция
* CRM системы
* Web инженер
* Web мастер

