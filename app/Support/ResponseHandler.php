<?php

namespace App\Support;

use Illuminate\Http\JsonResponse;
use Illuminate\Routing\ResponseFactory;
use Illuminate\Support\Collection;
use Symfony\Component\HttpFoundation\Response;

class ResponseHandler
{
    /**
     * @var ResponseFactory $response
     */
    private $response;

    /**
     * @var int
     */
    private $statusCode = Response::HTTP_OK;

    /**
     * ResponseHandler constructor.
     * @param ResponseFactory $response
     */
    public function __construct(ResponseFactory $response)
    {
        $this->response = $response;
    }

    /**
     * @param $statusCode
     * @return $this
     */
    public function setStatusCode($statusCode)
    {
        $this->statusCode = $statusCode;
        return $this;
    }

    public function getStatusCode()
    {
        return $this->statusCode;
    }

    /**
     * Return a 201 response with the given created resource.
     * @param null $resource
     * @return JsonResponse
     */
    public function withCreated($resource = null)
    {
        $this->setStatusCode(Response::HTTP_CREATED);

        if (is_null($resource)) {
            return $this->json();
        }

        return $this->json([
            'success' => true,
            'message' => JsonResponse::$statusTexts[JsonResponse::HTTP_CREATED],
            'data' => $resource
        ]);
    }

    /**
     * Return a 429 response.
     * @param string $message
     * @return JsonResponse
     */
    public function withTooManyRequests($message = 'Too Many Requests')
    {
        return $this->setStatusCode(Response::HTTP_TOO_MANY_REQUESTS)
            ->withError($message);
    }

    /**
     * Return a 401 response.
     * @param string $message
     * @return JsonResponse
     */
    public function withUnauthorized($message = 'Unauthorized')
    {
        return $this->setStatusCode(Response::HTTP_UNAUTHORIZED)
            ->withError($message);
    }

    /**
     * Return a 500 response.
     * @param string $message
     * @return JsonResponse
     */
    public function withInternalServerError($message = 'Internal Server Error')
    {
        return $this->setStatusCode(Response::HTTP_INTERNAL_SERVER_ERROR)
            ->withError($message);
    }

    /**
     * Return a 404 response.
     * @param string $message
     * @return JsonResponse
     */
    public function withNotFound($message = 'Not Found')
    {
        return $this->setStatusCode(Response::HTTP_NOT_FOUND)
            ->withError($message);
    }

    /**
     * Make a 204 response.
     * @return JsonResponse
     */
    public function withNoContent()
    {
        return $this->setStatusCode(Response::HTTP_NO_CONTENT)
            ->json();
    }

    /**
     * Make an error response.
     * @param $message
     * @return JsonResponse
     */
    public function withError($message)
    {
        return $this->json([
            'success' => false,
            'message' => (is_array($message) ? $message : [$message]),
        ]);
    }

    /**
     * Make a JSON response with the transformed item.
     * @param $item
     * @return JsonResponse
     */
    public function item($item)
    {
        return $this->json([
            'success' => true,
            'message' => JsonResponse::$statusTexts[JsonResponse::HTTP_OK],
            'data' => $item
        ]);
    }

    /**
     * Make a JSON response with the transformed items.
     * @param Collection $items
     * @return JsonResponse
     */
    public function collection(Collection $items)
    {
        return $this->json([
            'success' => true,
            'message' => JsonResponse::$statusTexts[JsonResponse::HTTP_OK],
            'data' => $items
        ]);
    }

    /**
     * Make a JSON response.
     * @param array $data
     * @param array $headers
     * @return JsonResponse
     */
    public function json($data = [], array $headers = [])
    {
        return $this->response->json($data, $this->statusCode, $headers);
    }
}