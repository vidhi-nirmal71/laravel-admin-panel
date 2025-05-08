<?php

namespace App\Exceptions;

use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Auth\AuthenticationException;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Log;
use Illuminate\Validation\ValidationException;
use Symfony\Component\HttpKernel\Exception\MethodNotAllowedHttpException;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Component\HttpKernel\Exception\UnauthorizedHttpException;
use Throwable;

/**
 * Class Handler.
 */
class Handler extends ExceptionHandler
{
    /**
     * A list of the exception types that are not reported.
     *
     * @var array
     */
    protected $dontReport = [
        // GeneralException::class,
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
     * @param Throwable $e
     * @throws Throwable
     * @return mixed|void
     */
    public function report(Throwable $e)
    {
        parent::report($e);
    }

    /**
     * Render an exception into an HTTP response.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Throwable  $e
     * @throws \Throwable
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function render($request, Throwable $e)
    {
        if (strpos($request->url(), '/api/') !== false) {
            Log::debug('API Request Exception - '.$request->url().' - '.$e->getMessage().(! empty($request->all()) ? ' - '.json_encode($request->except(['password'])) : ''));

            if ($e instanceof AuthorizationException) {
                return $this->setStatusCode(Response::HTTP_FORBIDDEN)->respondWithError($e->getMessage());
            }

            if ($e instanceof MethodNotAllowedHttpException) {
                return $this->setStatusCode(Response::HTTP_METHOD_NOT_ALLOWED)->respondWithError('Please check HTTP Request Method. - MethodNotAllowedHttpException');
            }

            if ($e instanceof NotFoundHttpException) {
                return $this->setStatusCode(Response::HTTP_NOT_FOUND)->respondWithError('Please check your URL to make sure request is formatted properly. - NotFoundHttpException');
            }

            if ($e instanceof GeneralException) {
                return $this->setStatusCode(Response::HTTP_INTERNAL_SERVER_ERROR)->respondWithError($e->getMessage());
            }

            if ($e instanceof ModelNotFoundException) {
                return $this->setStatusCode(Response::HTTP_NOT_FOUND)->respondWithError('Item could not be found. Please check identifier.');
            }

            if ($e instanceof AuthenticationException) {
                return $this->setStatusCode(Response::HTTP_UNAUTHORIZED)->respondWithError('Unauthenticated.');
            }

            if ($e instanceof ValidationException) {
                Log::debug('API Validation Exception - '.json_encode($e->validator->messages()));

                return $this->setStatusCode(422)->respondWithError($e->validator->messages());
            }

            /*
            * Redirect if token mismatch error
            * Usually because user stayed on the same screen too long and their session expired
            */
            if ($e instanceof UnauthorizedHttpException) {
                switch (get_class($e->getPrevious())) {
                    case self::class:
                        return $this->setStatusCode($e->getStatusCode())->respondWithError('Token has not been provided.');
                }
            }
        }

        return parent::render($request, $e);
    }

    /**
     * Get the status code.
     *
     * @return statuscode
     */
    public function getStatusCode()
    {
        return $this->statusCode;
    }

    /**
     * Set the status code.
     *
     * @param int $statusCode
     * @return $this
     */
    public function setStatusCode($statusCode)
    {
        $this->statusCode = $statusCode;

        return $this;
    }

    /**
     * Respond with error.
     *
     * @param string $message
     * @return \Illuminate\Http\JsonResponse
     */
    protected function respondWithError($message)
    {
        return $this->respond([
            'error' => [
                'message' => $message,
                'status_code' => $this->getStatusCode(),
            ],
        ]);
    }

    /**
     * Respond.
     *
     * @param array $data
     * @param array $headers
     * @return \Illuminate\Http\JsonResponse
     */
    public function respond($data, $headers = [])
    {
        return response()->json($data, $this->getStatusCode(), $headers);
    }
}