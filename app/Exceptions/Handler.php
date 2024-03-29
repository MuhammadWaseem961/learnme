<?php

namespace App\Exceptions;

use Exception;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Auth;
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
     *
     * @throws \Exception
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
     * @return \Symfony\Component\HttpFoundation\Response
     *
     * @throws \Exception
     */
    public function render($request, Exception $exception)
    {
        if($this->isHttpException($exception)){
            switch ($exception->getStatusCode()) {
                case 404:
                    return redirect()->route('not_found');
                    break;
                default:
                    return redirect()->route('something_wrong');
                    break;
            }
        }else{
            if($exception->getMessage()=="Unauthenticated.")
            {
                return redirect()->route('login');
            }else if($exception->getMessage()=="The given data was invalid."){
                return parent::render($request, $exception);
            }else if($exception->getMessage()!=''){
                return redirect()->route('something_wrong');
            }
            return parent::render($request, $exception);
        }
    }
}
