<?php

class CollegeController extends Controller
{
	/**
	 * Declares class-based actions.
	 */
	public function actions()
	{
		return array(
			// captcha action renders the CAPTCHA image displayed on the contact page
			'captcha'=>array(
				'class'=>'CCaptchaAction',
				'backColor'=>0xFFFFFF,
			),
			// page action renders "static" pages stored under 'protected/views/site/pages'
			// They can be accessed via: index.php?r=site/page&view=FileName
			'page'=>array(
				'class'=>'CViewAction',
			),
		);
	}

	/**
	 * This is the default 'index' action that is invoked
	 * when an action is not explicitly requested by users.
	 */
	public function actionIndex()
	{
		$this->render('index');
	}

	public function actionShow($id)
	{
		$college = College::model()->findByPk($id);
		$this->render('show', array("college"=>$college));
	}

	public function actionSearch()
	{
		$course_id = $_GET['course_id'];
		$sub_course_id = $_GET['sub_course_id'];
		$city_id = $_GET['city_id'];

		$condition = array();
		$params = array();
		if($course_id) {
			$condition[] = "subCourse.course_id = :course_id";
			$params["course_id"] = $course_id;
		}

		if($city_id) {
			$condition[] = "city_id = :city_id";
			$params["city_id"] = $city_id;
		}

		if($sub_course_id) {
			$condition[] = "sub_course_id = :sub_course_id";
			$params["sub_course_id"] = $sub_course_id;
		}

		$colleges = College::model()->with("subCourse")->findAll(
			array(
				"condition"=>implode(" and ", $condition),
				"params"=>$params
			)
		);
		
		$this->render('search', array("course_id"=>$course_id, "sub_course_id"=>$sub_course_id, "city_id"=>$city_id, "colleges"=>$colleges));
	}
}