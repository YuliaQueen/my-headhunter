<?php

namespace app\controllers;

use app\models\Position;
use app\models\Resume;
use app\models\ResumeSearch;
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
        $positions = Position::find()->select('position_title')->asArray()->all();
        $position_titles = [];

        foreach ($positions as $position) {
            array_push($position_titles, $position['position_title']);
        }
        $position_titles = array_flip($position_titles);

        $filterCategories = null;
        $searchModel = new ResumeSearch();

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


        return $this->render('index', compact('pages', 'position_titles', 'resumes', 'queryCount', 'sort'));
    }

    public function actionSearch()
    {
        $q = trim(\Yii::$app->request->get('q'));

        if (!$q) {
            $this->render('search');
        }

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

        $query = Resume::find()->where(['like', 'position', $q]);

        $pages = new Pagination(
            ['totalCount' => $query->count(), 'pageSize' => 8, 'forcePageParam' => false, 'pageSizeParam' => false]
        );

        $resume = $query->offset($pages->offset)->limit($pages->limit)->orderBy($sort->orders)->all();

        return $this->render('search', compact('resume', 'pages', 'q', 'sort'));
    }


}
