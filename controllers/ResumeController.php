<?php


namespace app\controllers;


use app\models\Resume;
use common\models\News;
use Yii;
use yii\web\Controller;

class ResumeController extends Controller
{
    public function actionView()
    {
        return $this->render('view');
    }

    public function actionViewAll()
    {
        return $this->render('view-all');
    }

    public function actionAddResume()
    {
        $resume = new Resume();

        $items = $resume->getSelectItems();

        $params = $resume->getSelectParams();


        if ($resume->load(Yii::$app->request->post())) {
            if ($resume->save()) {
                Yii::$app->session->setFlash('success', 'Резюме успешно сохранено');
                return $this->refresh();
            } else {
                var_dump($resume->getErrors());
                die();
                Yii::$app->session->setFlash('error', 'Ошибка сохранения');
            }
        }

        return $this->render(
            'add-resume',
            compact('resume', 'items', 'params')
        );
    }
}
