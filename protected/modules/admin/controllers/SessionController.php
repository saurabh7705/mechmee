<?php
class SessionController extends Controller 
{
	public function actionLogin()
	{
		if(Yii::app()->user->isGuest) {
			$model=new LoginForm;
			$this->render('login',array('model'=>$model));
		}
		else
			$this->redirect(array("/admin/category/index"));
	}
        
	public function actionCreate() {
		if(!isset($_POST['LoginForm']))
			$this->redirect(array("/admin/session/login"));
		if(isset($_SERVER['HTTP_REFERER']))
			$url = $_SERVER['HTTP_REFERER'];
		else
			$url = NULL;
		if(strpos($url, 'login') || strpos($url,'forgotpassword') || strpos($url, 'session/create') || strpos($url, 'site/index')) {
			$url = NULL;
		}
		$model=new LoginForm;
		$model->attributes=$_POST['LoginForm'];
		if($model->validate() && $model->login()) {

			if(Yii::app()->user->isAdmin) {
				if($url != NULL)
					$this->redirect($url);
				else
					$this->redirect(array('/admin/category/index'));
			}
			else
				$this->redirect(array('/admin/session/logout'));
		}
		else
			$this->render('login',array('model'=>$model));
	}
        
    public function actionLogout()
    {
        Yii::app()->user->logout();
        $this->redirect(array("/admin/session/login"));
    }
}