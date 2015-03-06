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

<<<<<<< HEAD
        
        public function actionTestemail(){
            //define the receiver of the email
$to = 'info@virtual-developers.com';
//define the subject of the email
$subject = 'Test HTML email'; 
//create a boundary string. It must be unique 
//so we use the MD5 algorithm to generate a random hash

 $headers = "";
            //$headers .= "From: Novelink <hr@novelink.co.uk >\n\n";//.$_POST["txtFormName"]."<".$_POST["txtFormEmail"].">\nReply-To: ".$_POST["txtFormEmail"]."";

            $headers .= "MIME-Version: 1.0\n";
            $headers .= "Content-Type: multipart/mixed; boundary=\"" . $strSid . "\"\n\n";
            $headers .= "This is a multi-part message in MIME format.\n";

            $headers .= "--" . $strSid . "\n";
            //$headers .= "Content-type: text/html; charset=utf-8\n";
            $headers .= "Content-type: text/html; charset=iso-8859-1\n";

            //$headers .= "Content-Transfer-Encoding: 7bit\n\n";
            $headers .= $strMessage . "\n\n";
            $headers .= "From: Virtual Developers<Info@virtual-developers.com >\n\n";
            //$strFilesName = 'Quotation';
          //  $strContent = chunk_split(base64_encode(file_get_contents($file_location)));

//}
$headers = "From: info@virtual-developers.com \r\n";
$headers .= "Reply-To: info@virtual-developers.com \r\n";

$headers .= "MIME-Version: 1.0\r\n";
$headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";


//define the body of the message.
 echo $random_hash; 
 echo $random_hash; 
 echo $random_hash; 
//copy current buffer contents into $message variable and delete current output buffer
$message = '<b>sdsdsd</b><u>ssaasaas</u><br/>sdasdasdasd';
//send the email
$mail_sent = mail( $to, $subject, $message, $headers );
$mail_sent = @mail( $to, $subject, $message, $headers );
//if the message is sent successfully print "Mail sent". Otherwise print "Mail failed" 
echo $mail_sent ? "Mail sent" : "Mail failed";
        }
=======
>>>>>>> 90d87cea0ca2a17ec7a2682357601cdf7fe9efec



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


         public function actionPdf()
    {

        # mPDF
        $mPDF1 = Yii::app()->ePdf->mpdf();
 
        # You can easily override default constructor's params
        $mPDF1 = Yii::app()->ePdf->mpdf('', 'A5');
 
        # render (full page)
        $mPDF1->WriteHTML('sdskj jslkd jldj lsk jd');
 
//        # Load a stylesheet
//        $stylesheet = file_get_contents(Yii::getPathOfAlias('webroot.css') . '/main.css');
//        $mPDF1->WriteHTML($stylesheet, 1);
// 
//        # renderPartial (only 'view' of current controller)
//        $mPDF1->WriteHTML($this->renderPartial('test', array(), true));
// 
//        # Renders image
//        $mPDF1->WriteHTML(CHtml::image(Yii::getPathOfAlias('webroot.css') . '/bg.gif' ));
// 
        # Outputs ready PDF
        $mPDF1->Output();
 
        ////////////////////////////////////////////////////////////////////////////////////
// $html2pdf = Yii::app()->ePdf->HTML2PDF();
//$html2pdf->writeHTML($this->renderPartial('print', compact('model'),false));
//$html2pdf->output('etc2.pdf',EYiiPdf::OUTPUT_TO_BROWSER);
//
        # HTML2PDF has very similar syntax
//        $html2pdf = Yii::app()->ePdf->HTML2PDF();
//        $html2pdf->WriteHTML($this->renderPartial('index', array(), true));
//        $html2pdf->Output();
// 
        ////////////////////////////////////////////////////////////////////////////////////
 
        # Example from HTML2PDF wiki: Send PDF by email
        $content_PDF = $html2pdf->Output('', EYiiPdf::OUTPUT_TO_STRING);
        require_once(dirname(__FILE__).'/pjmail/pjmail.class.php');
        $mail = new PJmail();
        $mail->setAllFrom('webmaster@my_site.net', "My personal site");
        $mail->addrecipient('mail_user@my_site.net');
        $mail->addsubject("Example sending PDF");
        $mail->text = "This is an example of sending a PDF file";
        $mail->addbinattachement("my_document.pdf", $content_PDF);
        $res = $mail->sendmail();
        
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
			$model->attributes=$_POST['Users'];
                        
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
                        
                        
                        /*********************EMAIL************/
                   
                        $to      = $model->email; // Send email to our user
                    $subject = 'Signup | Verification'; // Give the email a subject
                    $message = '
 
                    Thanks for signing up!
                    Your account has been created, you can login with the following is your secret for further communication.'
                    .$password.' <br/><img border="0" src="http://eventreg.virtual-developers.com/uploads/'.$password.'.png">'; // Our message above including the link
                     
<<<<<<< HEAD
 $headers = "";
            //$headers .= "From: Novelink <hr@novelink.co.uk >\n\n";//.$_POST["txtFormName"]."<".$_POST["txtFormEmail"].">\nReply-To: ".$_POST["txtFormEmail"]."";

            $headers .= "MIME-Version: 1.0\n";
            $headers .= "Content-Type: multipart/mixed; boundary=\"" . $strSid . "\"\n\n";
            $headers .= "This is a multi-part message in MIME format.\n";

            $headers .= "--" . $strSid . "\n";
            //$headers .= "Content-type: text/html; charset=utf-8\n";
            $headers .= "Content-type: text/html; charset=iso-8859-1\n";

            //$headers .= "Content-Transfer-Encoding: 7bit\n\n";
            $headers .= $strMessage . "\n\n";
            $headers .= "From: Virtual Developers<Info@virtual-developers.com >\n\n";
            //$strFilesName = 'Quotation';
          //  $strContent = chunk_split(base64_encode(file_get_contents($file_location)));

//}
$headers = "From: info@virtual-developers.com \r\n";
$headers .= "Reply-To: info@virtual-developers.com \r\n";

$headers .= "MIME-Version: 1.0\r\n";
$headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";

mail($to, $subject, $message, $headers); // Send our email
=======
                    $headers = "MIME-Version: 1.0" . "\r\n";
                    $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
                    $headers = 'From:noreply@vd.com' . "\r\n"; // Set from headers
                    mail($to, $subject, $message, $headers); // Send our email
>>>>>>> 90d87cea0ca2a17ec7a2682357601cdf7fe9efec
                        
                    
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
