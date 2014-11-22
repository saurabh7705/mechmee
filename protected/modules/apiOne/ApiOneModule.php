<?php
class ApiOneModule extends CWebModule
{

	public function init() {
		$this->setImport(array(
			'apiOne.components.*',
			'application.modules.apiOne.helpers.*',
		));
		Yii::app()->setComponents(array(
			'errorHandler'=>array(
				'errorAction'=>'apiOne/site/error',
			),
		));
	}

	public function beforeControllerAction($controller, $action) {                                                                                                             
		/*if(parent::beforeControllerAction($controller, $action)) {
		if(!Yii::app()->user->isPremiumUser) {
		Yii::app()->user->setFlash('warning', 'You need musketeer subscription to view this content.');
		$controller->redirect(array('/subscription/index', 'referral'=>'premium_module_redirect'));
		}
		return true;
		}
		else
		return false;
		*/
		return true;
	}
}