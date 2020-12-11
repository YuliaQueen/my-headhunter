<?php


namespace app\controllers;


use app\models\Resume;
use app\models\UploadImage;
use Yii;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\web\UploadedFile;

class ResumeController extends Controller
{
    public function actionView($id)
    {
        $resume = Resume::findOne($id);
//var_dump($resume); die();

        if (!empty($resume->schedule)) {
            $resume->schedule = implode(', ', unserialize($resume->schedule));
        }

        if (!empty($resume->employment)){
            $resume->employment = implode(', ', unserialize($resume->employment));
        }



        $positions = array_flip(Resume::getSelectItems());


        if (empty($resume)) {
            throw new NotFoundHttpException('Резюме не найдено');
        }

        return $this->render('view', compact('resume', 'positions'));
    }

    public function actionViewAll()
    {
        return $this->render('view-all');
    }


    public function actionAddResume()
    {
        $resume = new Resume();
        $resume->user_id = rand(1, 10);

        $items = $resume->getSelectItems();

        $params = $resume->getSelectParams();

        $scheduleCheck = $resume->getScheduleCheckboxItems();
        $employmentCheck = $resume->getEmploymentCheckboxItems();


        if ($resume->load(Yii::$app->request->post())) {
            if (is_array($resume->employment)) {
                $resume->employment = serialize($resume->employment);
            } else $resume->employment = null;

            if (is_array($resume->schedule)) {
                $resume->schedule = serialize($resume->schedule);
            } else $resume->schedule = null;

            if ($resume->save()) {
                Yii::$app->session->setFlash('success', 'Резюме успешно сохранено');
                return $this->refresh();
            } else {
                Yii::$app->session->setFlash('error', 'Ошибка сохранения');
            }
        }

        return $this->render(
            'add-resume',
            compact('resume', 'items', 'params', 'scheduleCheck', 'employmentCheck', 'image')
        );
    }
}
