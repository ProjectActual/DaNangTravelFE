<?php

namespace App\Exceptions;

use Exception;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Illuminate\Http\Response;

class Handler extends ExceptionHandler
{
    /**
     * A list of the exception types that are not reported.
     *
     * @var array
     */
    protected $dontReport = [
        //
    ];

    /**
     * A list of the inputs that are never flashed for validation exceptions.
     *
     * @var array
     */
    protected $dontFlash = [
        'password',
        'password_confirmation',
    ];

    /**
     * Report or log an exception.
     *
     * @param  \Exception  $exception
     * @return void
     */
    public function report(Exception $exception)
    {
        parent::report($exception);
    }

    /**
     * Render an exception into an HTTP response.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Exception  $exception
     * @return \Illuminate\Http\Response
     */
    public function render($request, Exception $exception)
    {
        $errors = json_decode((string) $exception->getResponse()->getBody()->getContents());

        if($exception->getCode() == Response::HTTP_UNAUTHORIZED) {
            return redirect()->route('errors.unauthorization');
        }

        if($exception->getCode() == Response::HTTP_NOT_FOUND) {
            return redirect()->route('errors.not_found');
        }

        if($errors->message == 'Tài Khoản của bạn cần được xác thực qua email.') {
            return redirect()->route('errors.credential.email');
        }

        if($errors->message == 'Tài khoản của bạn chưa được Quản Trị Viên duyệt.') {
            return redirect()->route('errors.credential.admin');
        }
        return parent::render($request, $exception);
    }
}
