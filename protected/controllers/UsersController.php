<?php
//error_reporting(0);
class UsersController extends Controller
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout='//layouts/column2';

	/**
	 * @return array action filters
	 */
	public function filters()
	{
		return array(
			'accessControl', // perform access control for CRUD operations
			'postOnly + delete', // we only allow deletion via POST request
		);
	}

public function actions()
{
    return array(
        // captcha action renders the CAPTCHA image displayed on the contact page
        'captcha'=>array(
            'class'=>'CCaptchaAction',
            'backColor'=>0xFFFFFF,
        ),
    );
}

	/**
	 * Specifies the access control rules.
	 * This method is used by the 'accessControl' filter.
	 * @return array access control rules
	 */
//	public function accessRules()
//	{
//		return array(
//			array('allow',  // allow all users to perform 'index' and 'view' actions
//				'actions'=>array('index','view'),
//				'users'=>array('*'),
//			),
//			array('allow', // allow authenticated user to perform 'create' and 'update' actions
//				'actions'=>array('create','update'),
//				'users'=>array('@'),
//			),
//			array('allow', // allow admin user to perform 'admin' and 'delete' actions
//				'actions'=>array('admin','delete'),
//				'users'=>array('admin'),
//			),
//			array('deny',  // deny all users
//				'users'=>array('*'),
//			),
//		);
//	}

	/**
	 * Displays a particular model.
	 * @param integer $id the ID of the model to be displayed
	 */
	public function actionView($id)
	{
		$this->render('view',array(
			'model'=>$this->loadModel($id),
		));
	}

                public function actionThankyou()
{
    $this->render('thankyou');
}


         public function actionInformation()
    {
             
             if(isset($_POST['users']))
             {
                 
                          $key=$_POST['key'];
                 
                 $sql="SELECT * FROM  `users` where key ='".$_POST['key']."' ";
        $data = Yii::app()->db->createCommand($sql)->queryRow();
        
        
        echo $key;
        exit(0);
             }
             
             $this->render('information');
                 }

	
    
	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$model=new Users;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Users']))
		{
                    
                    
                    require ("fpdf/fpdf.php");
                    
                    
			$model->attributes=$_POST['Users'];
                        
                        $name=$model->name;
                         $email=$model->email;
                         $dropdowna=$model->dropdown_a;
                         $dropdownb=$model->dropdown_b;
                         
                         $sql="SELECT name from `dropdown_a` where id='$dropdowna'";
                $data = Yii::app()->db->createCommand($sql)->queryRow();                                     
                                   $dropa=$data['name'];
                         
                         
                         $sql="SELECT name from `dropdown_b` where id='$dropdownb'";
                $data = Yii::app()->db->createCommand($sql)->queryRow();                                     
                                   $dropb=$data['name'];
                         
                         
                         
                         
//                         echo $name;
//                          echo $email;
//                           echo $dropa;
//                            echo $dropb;
//                            
//                            exit (0);
                        
                        /************KEY GENERATION****************/
                        $length = 7;
                        $chars = array_merge(range(0,9), range('a','z'), range('A','Z'));
                        shuffle($chars);
                        $password = implode(array_slice($chars, 0, $length));
                        
                        $model->key=$password;
                        
                        /*************QR CODE GENERATION***********/
                        
                        $this->widget('application.extensions.qrcode.QRCodeGenerator',array(
                         'data' => $password,
                         'subfolderVar' => false,
                         'matrixPointSize' => 4,
                            ));
                       //echo $this->actionPdf();
                        
                        /*********************EMAIL************/
                    # mPDF
        //$mpdf = Yii::app()->ePdf->mpdf();
 
        # You can easily override default constructor's params
       // $mpdf = Yii::app()->ePdf->mpdf('', 'A5');
 
      $pdf = new FPDF();
        
        
       
 
       $pdf->AddPage();
$pdf->SetFont("Arial","B",12);
$pdf->MultiCell(70,10, "Name: $name");
$pdf->SetFont("Arial","B",10);
$pdf->MultiCell(70,10, "Email: $email");
$pdf->SetFont("Arial","B",10);
$pdf->MultiCell(70,10, "College name: $dropa");
$pdf->SetFont("Arial","B",10);
$pdf->MultiCell(70,10, "Department Name: $dropb");
$pdf->SetFont("Arial","B",10);
$pdf->MultiCell(70,10, "Secret Key: $password");
//$pdf->Image('http://eventreg.virtual-developers.com/uploads/'.$password.'.png',60,30,90,0,'PNG');

        $to =  $email;
$from = "Info@virtual-developers.com";
$subject = "send email with pdf attachment";
$message = 'Thanks for signing up!
                    Your account has been created, you can login with the following is your secret for further communication.'
                    .'<br/><br/> Name:' .$name
                    .'<br/><br/> Email:' .$email
                    .'<br/><br/> College name:' .$dropa 
                    .'<br/><br/> Department Name:' .$dropb
                    .'<br/><br/> Secret Key:' .$password
                    .'<br/><br/> QR Image: <img border="0" src="http://eventreg.virtual-developers.com/uploads/'.$password.'.png">';
// a random hash will be necessary to send mixed content
$separator = md5(time());
// carriage return type (we use a PHP end of line constant)
$eol = PHP_EOL;
// attachment name
$filename = "example.pdf";
// encode data (puts attachment in proper format)
$pdfdoc = $pdf->Output("", "S");
$attachment = chunk_split(base64_encode($pdfdoc));
// main header (multipart mandatory)
$headers = "From: ".$from.$eol;
$headers .= "MIME-Version: 1.0".$eol;
$headers .= "Content-Type: multipart/mixed; boundary=\"".$separator."\"".$eol.$eol;
$headers .= "Content-Transfer-Encoding: 7bit".$eol;
$headers .= "This is a MIME encoded message.".$eol.$eol;
// message
$headers .= "--".$separator.$eol;
$headers .= "Content-Type: text/html; charset=\"iso-8859-1\"".$eol;
$headers .= "Content-Transfer-Encoding: 8bit".$eol.$eol;
$headers .= $message.$eol.$eol;
// attachment
$headers .= "--".$separator.$eol;
$headers .= "Content-Type: application/octet-stream; name=\"".$filename."\"".$eol;
$headers .= "Content-Transfer-Encoding: base64".$eol;
$headers .= "Content-Disposition: attachment".$eol.$eol;
$headers .= $attachment.$eol.$eol;
$headers .= "--".$separator."--";
// send message
mail($to, $subject, "", $headers);

                        
                    
			if($model->save())
				$this->redirect(array('thankyou','id'=>$model->id));
                        
		}

		$this->render('create',array(
			'model'=>$model,
		));
	}

	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionUpdate($id)
	{
		$model=$this->loadModel($id);

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Users']))
		{
			$model->attributes=$_POST['Users'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->id));
		}

		$this->render('update',array(
			'model'=>$model,
		));
	}

	/**
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'admin' page.
	 * @param integer $id the ID of the model to be deleted
	 */
	public function actionDelete($id)
	{
		$this->loadModel($id)->delete();

		// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
		if(!isset($_GET['ajax']))
			$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
	}

	/**
	 * Lists all models.
	 */
        
        	public function actionTest()
	{
                    echo 'sdf djsflkj dskljf ldksjf ';
		//$dataProvider=new CActiveDataProvider('Users');
		//$this->render('test');
	}
        
	public function actionIndex()
	{
		$dataProvider=new CActiveDataProvider('Users');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Users('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Users']))
			$model->attributes=$_GET['Users'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return Users the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=Users::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param Users $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='users-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}