<?php

namespace App\Exceptions;

use Exception;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Illuminate\Http\JsonResponse;
use Illuminate\Validation\UnauthorizedException;
use Illuminate\Validation\ValidationException;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Exception\BadRequestHttpException;
use Symfony\Component\HttpKernel\Exception\HttpException;

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
        if ($exception instanceof ValidationException) {
            return new JsonResponse([
                'success' => false,
                'message' => JsonResponse::$statusTexts[Response::HTTP_UNPROCESSABLE_ENTITY],
                'data' => $exception->validator->errors(),
            ], Response::HTTP_UNPROCESSABLE_ENTITY);
        }

        if ($exception instanceof ModelNotFoundException) {
            return new JsonResponse([
                'success' => false,
                'message' => JsonResponse::$statusTexts[Response::HTTP_NOT_FOUND]
            ], Response::HTTP_NOT_FOUND);
        }

        if ($exception instanceof UnauthorizedException) {
            return new JsonResponse([
                'success' => false,
                'message' => $exception->getMessage()
            ], Response::HTTP_UNAUTHORIZED);
        }

        if ($exception instanceof ForbiddenException) {
            return new JsonResponse([
                'success' => false,
                'message' => JsonResponse::$statusTexts[Response::HTTP_FORBIDDEN]
            ], Response::HTTP_FORBIDDEN);
        }

        if ($exception instanceof BadRequestHttpException) {
            return new JsonResponse([
                'success' => false,
                'message' => JsonResponse::$statusTexts[Response::HTTP_BAD_REQUEST],
                'data' => [
                    'error' => $exception->getMessage()
                ]
            ], Response::HTTP_BAD_REQUEST);
        }

        if ($exception instanceof HttpException) {
            return new JsonResponse([
                'success' => false,
                'message' => $exception->getMessage() ? $exception->getMessage() : JsonResponse::$statusTexts[$exception->getStatusCode()]
            ], $exception->getStatusCode());
        }

        return parent::render($request, $exception);
    }
}
