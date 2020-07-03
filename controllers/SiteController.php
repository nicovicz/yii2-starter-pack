<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\SignupForm;
use app\models\PasswordResetRequestForm;
use app\models\ResetPasswordForm;
use app\models\ResendVerificationEmailForm;
use app\models\VerifyEmailForm;
use yii\base\InvalidArgumentException;
use yii\web\BadRequestHttpException;

class SiteController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout'],
                'rules' => [
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
            'page' => [
                'class' => 'yii\web\ViewAction',
            ],
        ];
    }

    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex()
    {
        \app\helpers\ESign::sign();
        die;
        return render('index');
    }

    /**
     * Login action.
     *
     * @return Response|string
     */
    public function actionLogin()
    {
        $this->layout = '//login';

        if (is_logged()) {
            return redirect(['/site/index']);
        }

        $model = new LoginForm();
        if ($model->load(request()->post()) && $model->login()) {
            return redirect(['/site/index']);
        }

        $model->password = '';
        return render('login', compact(['model']));
    }

    /**
     * Logout action.
     *
     * @return Response
     */
    public function actionLogout()
    {
        auth()->logout();

        return to_login();
    }

    /**
     * Signs user up.
     *
     * @return mixed
     */
    public function actionSignup()
    {
        $this->layout = '//login';
        $model = new SignupForm();
        if ($model->load(request()->post()) && $model->signup()) {
            flash('success', __('Thank you for registration. Please check your inbox for verification email.'));
            return refresh();
        }

        return render('signup', compact(['model']));
    }

    /**
     * Requests password reset.
     *
     * @return mixed
     */
    public function actionRequestPasswordReset()
    {
        $this->layout = '//login';
        $model = new PasswordResetRequestForm();
        if ($model->load(request()->post()) && $model->validate()) {
            if ($model->sendEmail()) {
                flash('success', __('Check your email for further instructions.'));

                return refresh();
            } else {
                flash('error', __('Sorry, we are unable to reset password for the provided email address.'));
            }
        }

        return render('requestPasswordResetToken', compact(['model']));
    }

    /**
     * Resets password.
     *
     * @param string $token
     * @return mixed
     * @throws BadRequestHttpException
     */
    public function actionResetPassword($token)
    {
        $this->layout = '//login';
        try {
            $model = new ResetPasswordForm($token);
        } catch (InvalidArgumentException $e) {
            throw new BadRequestHttpException($e->getMessage());
        }

        if ($model->load(request()->post()) && $model->validate() && $model->resetPassword()) {
            flash('success', __('New password saved.'));

            return to_login();
        }

        return render('resetPassword', compact(['model']));
    }

    /**
     * Verify email address
     *
     * @param string $token
     * @throws BadRequestHttpException
     * @return yii\web\Response
     */
    public function actionVerifyEmail($token)
    {
        try {
            $model = new VerifyEmailForm($token);
        } catch (InvalidArgumentException $e) {
            throw new BadRequestHttpException($e->getMessage());
        }
        if ($user = $model->verifyEmail()) {
            
            flash('success', __('Your email has been confirmed!'));
            return to_login();
            
        }

        flash('error', __('Sorry, we are unable to verify your account with provided token.'));
        return to_login();
    }

    /**
     * Resend verification email
     *
     * @return mixed
     */
    public function actionResendVerificationEmail()
    {
        $this->layout = '//login';
        $model = new ResendVerificationEmailForm();
        if ($model->load(request()->post()) && $model->validate()) {
            if ($model->sendEmail()) {
                flash('success', __('Check your email for further instructions.'));
                return refresh();
            }
            flash('error', __('Sorry, we are unable to resend verification email for the provided email address.'));
        }

        return render('resendVerificationEmail', compact(['model']));
    }

}
