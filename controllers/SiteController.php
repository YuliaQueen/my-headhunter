<?php

namespace app\controllers;

use app\models\Resume;
use app\models\ResumeSearch;
use Yii;
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
        $positionTitles = getPositionTitles();

        $searchModel = new ResumeSearch();

        if (Yii::$app->request->getIsPost()) {
            $searchModel->attributes = $_POST['SearchModel'];
        }

        $sort = new Sort(
            [
                'attributes' => [
                    'created_at' => [
                        'asc' => ['created_at' => SORT_ASC],
                        'desc' => ['created_at' => SORT_DESC],
                        'default' => SORT_DESC,
                        'label' => 'По новизне'
                    ],
                    'salary' => [
                        'asc' => ['salary' => SORT_ASC],
                        'desc' => ['salary' => SORT_DESC],
                        'default' => SORT_DESC,
                        'label' => 'По зарплате'
                    ],
                    'birthday' => [
                        'asc' => ['birthday' => SORT_ASC],
                        'desc' => ['birthday' => SORT_DESC],
                        'default' => SORT_DESC,
                        'label' => 'По возрасту'
                    ]
                ]
            ]
        );

        $query = Resume::find();

        if ($searchModel->city) {
            $query->andWhere(['city' => $searchModel->city]);
        }

        if ($searchModel->salary) {
            $query->andWhere(['>=', 'salary', $searchModel->salary]);
        }

        if ($searchModel->position) {
            $query->andWhere(['position' => $searchModel->position]);
        }

        if ($searchModel->gender) {
            $query->andWhere(['gender' => $searchModel->gender]);
        }

        if ($searchModel->employment) {
            $query->andWhere(['employment.value' => $searchModel->employment])->join(
                'LEFT JOIN',
                'employment',
                'resume.id=employment.resume_id'
            );
        }

        if ($searchModel->schedule) {
            $query->andWhere(['schedule.value' => $searchModel->schedule])->join(
                'LEFT JOIN',
                'schedule',
                'resume.id=schedule.resume_id'
            );
        }

        $queryCount = $query->count();


        $pages = new Pagination(
            ['totalCount' => $query->count(), 'pageSize' => 3, 'forcePageParam' => false, 'pageSizeParam' => false]
        );

        $resumes = $query->offset($pages->offset)->limit($pages->limit)->orderBy($sort->orders)->all();

        return $this->render(
            'index',
            compact('pages', 'positionTitles', 'resumes', 'queryCount', 'sort', 'searchModel')
        );
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
                        'desc' => ['created_at' => SORT_DESC],
                        'default' => SORT_DESC,
                        'label' => 'По новизне'
                    ],
                    'salary' => [
                        'asc' => ['salary' => SORT_ASC],
                        'desc' => ['salary' => SORT_DESC],
                        'default' => SORT_DESC,
                        'label' => 'По зарплате'
                    ],
                    'birthday' => [
                        'asc' => ['birthday' => SORT_ASC],
                        'desc' => ['birthday' => SORT_DESC],
                        'default' => SORT_DESC,
                        'label' => 'По возрасту'
                    ]
                ]
            ]
        );


        $positionTitles = getPositionTitles();

        $query = Resume::find()
            ->select('*, resume.id')
            ->join('LEFT JOIN', 'position', 'resume.position = position.id')
            ->where(['like', 'position_title', $q]);

        $pages = new Pagination(
            ['totalCount' => $query->count(), 'pageSize' => 8, 'forcePageParam' => false, 'pageSizeParam' => false]
        );

        $queryCount = $query->count();

        $resume = $query->offset($pages->offset)->limit($pages->limit)->orderBy($sort->orders)->all();

        return $this->render('search', compact('resume', 'pages', 'q', 'sort', 'positionTitles', 'queryCount'));
    }


}
