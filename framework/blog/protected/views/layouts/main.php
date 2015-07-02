<?php /* @var $this Controller */ ?>
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <meta name="language" content="en">

        <!-- blueprint CSS framework -->
        <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/screen.css" media="screen, projection">
        <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/print.css" media="print">
        <!--[if lt IE 8]>
        <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/ie.css" media="screen, projection">
        <![endif]-->

        <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/main.css">
        <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/form.css">

        <title><?php echo CHtml::encode($this->pageTitle); ?></title>
    </head>

    <body>

        <div class="container" id="page">

            <div id="header">
                <div id="logo"><?php echo CHtml::encode(Yii::app()->name); ?></div>
            </div><!-- header -->
            <?php
            //register form
            $this->beginWidget('zii.widgets.jui.CJuiDialog', array(
                'id' => 'register',
                'actionPrefix' => 'register',
                // additional javascript options for the dialog plugin
                'options'      => array(
                    'title'    => 'registration',
                    'autoOpen' => false,
                    'width'    => 800,
                    'height'   => 500,
                ),
            ));

            $model = new RegistrationForm;
            ?>
            <div class="form">
                <?php
                $form = $this->beginWidget('CActiveForm', array(
                    'id' => 'register-form',
                    //'enableClientValidation'=>true,
                    'enableAjaxValidation' => true,
                    'clientOptions'        => array(
                            'validateOnSubmit' => true,
                            'validateOnChange' => true
                    ),
                    'action' => array('site/register'),
                ));
                ?>

                <p class="note">Fields with <span class="required">*</span> are required.</p>



                <div class="row">
                    <?php echo $form->labelEx($model, 'first_name'); ?>
                    <?php echo $form->textField($model, 'first_name'); ?>
                    <?php echo $form->error($model, 'first_name'); ?>
                </div>

                <div class="row">
                    <?php echo $form->labelEx($model, 'last_name'); ?>
                    <?php echo $form->textField($model, 'last_name'); ?>
                    <?php echo $form->error($model, 'last_name'); ?>

                </div>
                <div class="row">
                    <?php echo $form->labelEx($model, 'email'); ?>
                    <?php echo $form->emailField($model, 'email'); ?>
                    <?php echo $form->error($model, 'email'); ?>

                </div>
                <div class="row">
                    <?php echo $form->labelEx($model, 'password'); ?>
                    <?php echo $form->textField($model, 'password'); ?>
                    <?php echo $form->error($model, 'password'); ?>

                </div>
                <div class="row">
                    <?php echo $form->labelEx($model, 'Repeat password'); ?>
                    <?php echo $form->textField($model, 'repeat_password'); ?>
                    <?php echo $form->error($model, 'repeat_password'); ?>

                </div>
                <div>
                    <?php echo $form->textField($model, 'verifyCode'); ?>
                    <?php $this->widget('CCaptcha'); ?>
                    <?php echo $form->error($model, 'verifyCode'); ?>
                </div>



                <div class="row buttons">
                    <?php
                    echo CHtml::ajaxSubmitButton('Register', $this->createUrl("/Site/Register"), array(
                        'type' => 'POST',
                        'dataType' => 'json',
                        'success' => 'js:function(data){       
                                       if(data == 1){
                                        window.location ="' . $this->createUrl('site/index') . '"
                                       }
                             }',
                    ));
                    ?>



                </div>

                    <?php $this->endWidget(); ?>
            </div>
                <?php
                $this->endWidget('zii.widgets.jui.CJuiDialog');
                
                
                

                $this->beginWidget('zii.widgets.jui.CJuiDialog', array(
                    'id' => 'login',
                    'actionPrefix' => 'login',
                    
                    // additional javascript options for the dialog plugin
                    'options'      => array(
                        'title'    => 'Login in',
                        'autoOpen' => false,
                        'width'    => 800,
                        'height'   => 500,
                    ),
                ));

                $model = new LoginForm;
                ?>      
            <h1>Login</h1>
            <p>Please fill out the following form with your Register credentials:</p>
            <div class="form">
            <?php
            $form = $this->beginWidget('CActiveForm', array(
                    'id'                   => 'login-form',
                    'enableAjaxValidation' => true,
                    'clientOptions'        => array(
                            
                            'validateOnChange' => true
                    ),
                    'action' => array('site/login'),
                )
            );
            ?>
                <p class="note">Fields with <span class="required">*</span> are required.</p>


                <div class="row">
                    <?php echo $form->labelEx($model, 'email'); ?>
                    <?php echo $form->emailField($model, 'email'); ?>
                    <?php echo $form->error($model, 'email'); ?>
                </div>
                <div class="row">
                    <?php echo $form->labelEx($model, 'password'); ?>
                    <?php echo $form->textField($model, 'password'); ?>
                    <?php echo $form->error($model, 'password'); ?>
                </div>

                <div class="row buttons">
                    <?php 
                    echo CHtml::ajaxSubmitButton('Login In', $this->createUrl("/Site/Login"), array(
                        'type'     => 'POST',
                        'dataType' => 'json',
                        'success'  => 'js:function(data)
                        {
                           if(data.LoginForm_password == undefined  && data.LoginForm_email== undefined)
                            {
                                    $(".ui-widget").click();
                                    window.location ="' .Yii::app()->user->returnUrl. '"
                            }
                                     
                                        
                        }',
                    )); ?>
                </div>
                    <?php $this->endWidget(); ?>
            </div><!-- form -->


                <?php
                $this->endWidget('zii.widgets.jui.CJuiDialog');


                echo CHtml::link('Register', '#', array(
                    'onclick' => '$("#register").dialog("open"); return false;',
                ));
                echo CHtml::link('Login In', '#', array(
                    'onclick' => '$("#login").dialog("open"); return false;',
                ));
                ?>

            <div id="mainmenu">
            <?php
            $this->widget('zii.widgets.CMenu', array(
                'items' => array(
                    array('label' => 'Home', 'url' => array('/site/index')),
                    array('label' => 'About', 'url' => array('/site/page', 'view' => 'about')),
                    array('label' => 'Contact', 'url' => array('/site/contact')),
                    //array('label' => 'Own Login', 'url' => array('/site/login'), 'visible' => Yii::app()->user->isGuest),
                    //array('label' => 'Register', 'url' => array('/site/register'), 'visible' => Yii::app()->user->isGuest),
                    array('label' => 'Logout (' . Yii::app()->user->name . ')', 'url' => array('/site/logout'), 'visible' => !Yii::app()->user->isGuest)
                ),
            ));
            ?>
            </div><!-- mainmenu -->
                <?php if (isset($this->breadcrumbs)): ?>
                    <?php
                    $this->widget('zii.widgets.CBreadcrumbs', array(
                        'links' => $this->breadcrumbs,
                    ));
                    ?><!-- breadcrumbs -->
            <?php endif ?>

            <?php echo $content; ?>

            <div class="clear"></div>

            <div id="footer">
                Copyright &copy; <?php echo date('Y'); ?> by My Company.<br/>
                All Rights Reserved.<br/>
                <?php echo Yii::powered(); ?>
            </div><!-- footer -->

        </div><!-- page -->

    </body>
</html>
