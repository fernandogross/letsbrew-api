<?php

namespace App\Http\Controllers;

use App\Repositories\HopRepository;
use App\Support\ResponseHandler;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class HopController extends Controller
{
    /**
     * @var HopRepository $repository
     */
    protected $repository;

    /**
     * @var ResponseHandler $response
     */
    protected $response;

    /**
     * @var Request $request
     */
    protected $request;

    /**
     * @var Auth $me
     */
    protected $me;

    /**
     * HopController constructor.
     * @param HopRepository $repository
     * @param ResponseHandler $response
     */
    public function __construct(HopRepository $repository, ResponseHandler $response, Request $request)
    {
        $this->repository = $repository;
        $this->response = $response;
        $this->request = $request;
        $this->me = Auth::user();
    }

    /**
     * List resources.
     * @return JsonResponse
     */
    public function index()
    {
        return $this->response->collection($this->repository->index());
    }

    /**
     * Create and return new resource.
     * @param Request $request
     * @return JsonResponse
     * @throws ValidationException
     */
    public function create(Request $request)
    {
        $this->request->merge([
            'user_id' => 1, // Add some form of auth later
        ]);

        return $this->response->withCreated($this->repository->create($request->all()));
    }

    /**
     * Display the specified resource.
     * @param $id
     * @return Response
     */
    public function read($id)
    {
        return $this->response->item($this->repository->read($id));
    }

    /**
     * Update the specified resource.
     * @param int $id
     * @param Request $request
     * @return JsonResponse
     * @throws ValidationException
     */
    public function update(int $id, Request $request)
    {
        return $this->response->item($this->repository->update($id, $request->all()));
    }

    /**
     * Delete the specified resource.
     * @param int $id
     * @return JsonResponse
     */
    public function delete(int $id)
    {
        return $this->response->withNoContent($this->repository->delete($id));
    }
}
