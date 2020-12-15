<?php


namespace app\controllers;


use app\components\Employments;
use app\components\Schedule;
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

        $positionTitle = $resume->getPosition()->select('position_title')->one();

        $resume->view_count += 1;
        $resume->save();

        if (!empty($resume->schedule)) {
            $resume->schedule = implode(', ', unserialize($resume->schedule));
        }

        if (!empty($resume->employment)) {
            $resume->employment = implode(', ', unserialize($resume->employment));
        }

        if (empty($resume)) {
            throw new NotFoundHttpException('Резюме не найдено');
        }

        return $this->render('view', compact('resume', 'positionTitle'));
    }

    public function actionViewAll()
    {
        $resume = Resume::find()->where(['user_id' => 10])->all();//todo заменить на id авторизованного юзера

        $resumeCount = Resume::find()->where(['user_id' => 10])->count();

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

            $resume->saveImage($image->uploadImage($file));

            if (is_array($resume->employment)) {
                $resume->employment = serialize($resume->employment);
            }

            if (is_array($resume->schedule)) {
                $resume->schedule = serialize($resume->schedule);
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
