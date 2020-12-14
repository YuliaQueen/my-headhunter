<?php


namespace app\controllers;


use app\components\Employments;
use app\components\Schedule;
use app\models\Position;
use app\models\Resume;
use Yii;
use yii\helpers\ArrayHelper;
use yii\web\Controller;
use yii\web\NotFoundHttpException;

class ResumeController extends Controller
{
    public function actionView($id)
    {
        $resume = Resume::findOne($id);

        $position_title = $resume->getPosition()->select('position_title')->one();

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

        return $this->render('view', compact('resume', 'position_title'));
    }

    public function actionViewAll()
    {
        $resume = Resume::find()->where(['user_id' => 10])->all();//todo заменить на id авторизованного юзера

        $resumeCount = Resume::find()->where(['user_id' => 10])->count();

        $position_titles = getPositionTitles();

        return $this->render('view-all', compact('resume', 'resumeCount', 'position_titles'));
    }


    public function actionAddResume()
    {
        $resume = new Resume();

        $resume->user_id = rand(1, 10);

        $scheduleCheck = Schedule::getScheduleCheckboxItems();
        $employmentCheck = Employments::getEmploymentCheckboxItems();

        if ($resume->load(Yii::$app->request->post())) {
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
            compact('resume', 'scheduleCheck', 'employmentCheck')
        );
    }
}
