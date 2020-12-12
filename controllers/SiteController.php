<?php

namespace app\controllers;

use app\models\Resume;
use yii\data\Pagination;
use yii\data\Sort;
use yii\web\Controller;

class SiteController extends Controller
{
    public function beforeAction($action)
    {
        $this->view->title = \Yii::$app->name;
        return parent::beforeAction($action);
    }

    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex()
    {
        $positions = array_flip(Resume::getSelectItems());

        $sort = new Sort(
            [
                'attributes' => [
                    'created_at' => [
                        'asc' => ['created_at' => SORT_ASC],
                        'desc'=> ['created_at' => SORT_DESC],
                        'default' => SORT_DESC,
                        'label' => 'По новизне'
                    ]
                ]
            ]
        );


        $query = Resume::find();

        $queryCount = $query->count();


        $pages = new Pagination(
            ['totalCount' => $query->count(), 'pageSize' => 3, 'forcePageParam' => false, 'pageSizeParam' => false]
        );

        $resumes = $query->offset($pages->offset)->limit($pages->limit)->orderBy($sort->orders)->all();


        return $this->render('index', compact('pages', 'positions', 'resumes', 'queryCount', 'sort'));
    }


}
