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
        if($exception instanceof \GuzzleHttp\Exception\ClientException) {
            $errors = json_decode((string) $exception->getResponse()->getBody()->getContents());

            $message = $errors->message;

            return view('errors.exception', compact('message'));
        }
        dd($exception);
        if($exception->getStatusCode() == Response::HTTP_NOT_FOUND) {
            return redirect()->route('errors.not_found');
        }

        if($exception->getStatusCode() == Response::HTTP_UNAUTHORIZED) {
            return redirect()->route('errors.unauthorization');
        }

        return parent::render($request, $exception);
    }
}
