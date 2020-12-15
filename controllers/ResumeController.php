<?php


namespace app\controllers;


use app\components\Employments;
use app\components\Schedule;
use app\models\Employment;
use app\models\Resume;
use app\models\UploadImage;
use Yii;
use yii\helpers\ArrayHelper;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\web\UploadedFile;

class ResumeController extends Controller
{
    public function actionView($id)
    {
        $resume = Resume::findOne($id);

        $employmentList = ArrayHelper::getColumn(
            Employment::find()->where(['resume_id' => $id])->all(),
            'value'
        );

        $scheduleList = ArrayHelper::getColumn(
            \app\models\Schedule::find()->where(['resume_id' => $id])->all(),
            'value'
        );

        $positionTitle = $resume->getPosition()->select('position_title')->one();

        $resume->view_count += 1;
        $resume->save();

        if ($employmentList) {
            $employmentList = implode(', ', $employmentList);
        }

        if ($scheduleList) {
            $scheduleList = implode(', ', $scheduleList);
        }

        if (empty($resume)) {
            throw new NotFoundHttpException('Резюме не найдено');
        }

        return $this->render('view', compact('resume', 'positionTitle', 'employmentList', 'scheduleList'));
    }

    public function actionViewAll()
    {
        $resume = Resume::find()->where(['user_id' => 10])->all();//todo заменить на id авторизованного юзера

        $resumeCount = count($resume);

        $positionTitles = getPositionTitles();

        return $this->render('view-all', compact('resume', 'resumeCount', 'positionTitles'));
    }


    public function actionAddResume()
    {
        $resume = new Resume();
        $image = new UploadImage();

        $resume->user_id = rand(1, 10);

        $scheduleCheck = Schedule::getScheduleCheckboxItems();
        $employmentCheck = Employments::getEmploymentCheckboxItems();

        if ($resume->load(Yii::$app->request->post())) {
            $file = UploadedFile::getInstance($image, 'image');

            if ($file) {
                $resume->saveImage($image->uploadImage($file));
            }

            if ($resume->save()) {
                Yii::$app->session->setFlash('success', 'Резюме успешно сохранено');
                return $this->refresh();
            } else {
                Yii::$app->session->setFlash('error', 'Ошибка сохранения');
            }
        }

        return $this->render(
            'add-resume',
            compact('resume', 'image', 'scheduleCheck', 'employmentCheck')
        );
    }

}
