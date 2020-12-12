<?php


namespace app\controllers;


use app\models\Position;
use app\models\Resume;
use Yii;
use yii\web\Controller;
use yii\web\NotFoundHttpException;

class ResumeController extends Controller
{
    public function actionView($id)
    {
        $resume = Resume::findOne($id);
        $resume->getPosition0()->select('position_title');
        $position_title = $resume->getPosition0()->select('position_title')->one();
        $resume->view_count += 1;
        $resume->save();

        if (!empty($resume->schedule)) {
            $resume->schedule = implode(', ', unserialize($resume->schedule));
        }

        if (!empty($resume->employment)) {
            $resume->employment = implode(', ', unserialize($resume->employment));
        }


        $positions = Position::find()->asArray()->all();


        if (empty($resume)) {
            throw new NotFoundHttpException('Резюме не найдено');
        }

        return $this->render('view', compact('resume', 'positions', 'position_title'));
    }

    public function actionViewAll()
    {
        $resume = Resume::find()->where(['user_id' => 10])->all();//todo заменить на id авторизованного юзера

        $resumeCount = Resume::find()->where(['user_id' => 10])->count();
        $position_titles = [];
        $positions = Position::find()->select('position_title')->asArray()->all();

        foreach ($positions as $position) {
            array_push($position_titles, $position['position_title']);
        }
        $position_titles = array_flip($position_titles);

        return $this->render('view-all', compact('resume', 'resumeCount', 'position_titles'));
    }


    public function actionAddResume()
    {
        $resume = new Resume();
        $items = Position::find()->asArray()->all();

        $resume->user_id = rand(1, 10);

        $params = $resume->getSelectParams();

        $scheduleCheck = $resume->getScheduleCheckboxItems();
        $employmentCheck = $resume->getEmploymentCheckboxItems();


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
            compact('resume', 'items', 'params', 'scheduleCheck', 'employmentCheck', 'image')
        );
    }
}
