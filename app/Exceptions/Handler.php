<?php

namespace App\Exceptions;

use Exception;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Symfony\Component\HttpKernel\Exception\HttpException;
use Symfony\Component\Debug\ExceptionHandler as SymfonyDisplayer;

class Handler extends ExceptionHandler
{
    /**
     * A list of the exception types that should not be reported.
     *
     * @var array
     */
    protected $dontReport = [
        \Symfony\Component\HttpKernel\Exception\HttpException::class,
    ];

    /**
     * Report or log an exception.
     *
     * This is a great spot to send exceptions to Sentry, Bugsnag, etc.
     *
     * @param  \Exception  $e
     * @return void
     */
    public function report(Exception $e)
    {
        return parent::report($e);
    }

    /**
     * Render an exception into an HTTP response.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Exception  $e
     * @return \Illuminate\Http\Response
     */
    public function render($request, Exception $e)
    {
        if ($this->isHttpException($e)) {
            return $this->toIlluminateResponse($this->renderHttpException($e), $e);
        } else {
            return $this->toIlluminateResponse((new SymfonyDisplayer(config('app.debug')))->createResponse($e), $e);
        }
    }

    protected function renderHttpException(HttpException $e)
    {
        $status = $e->getStatusCode();

        $data = [
//            'module'    => $module,
//            'message'   => $e->getMessage(),
        ];

        if (view()->exists("default.admin._errors.{$status}")) {
            return response()->view("default.admin._errors.{$status}", $data, $status);
        } else {
            return (new SymfonyDisplayer(config('app.debug')))->createResponse($e);
        }

//        $module = 'shop';
//        if (app('router')->current()) {
//            $currentAction = app('router')->current()->getAction();
//            if (isset($currentAction['module'])) {
//                $module = $currentAction['module'];
//            }
//        }
//
//        $data = [
//            'module'    => $module,
//            'message'   => $e->getMessage(),
//        ];
//
//        if (view()->exists("default.{$data['module']}._errors.{$status}")) {
//            return response()->view("default.{$data['module']}._errors.{$status}", $data, $status);
//        } else {
//            return (new SymfonyDisplayer(config('app.debug')))->createResponse($e);
//        }
    }
}
