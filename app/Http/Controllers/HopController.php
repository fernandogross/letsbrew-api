<?php

namespace App\Http\Controllers;

use App\Repositories\HopRepository;
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
     * @var Auth $me
     */
    protected $me;

    /**
     * HopController constructor.
     * @param HopRepository $repository
     */
    public function __construct(HopRepository $repository)
    {
        $this->repository = $repository;
        $this->me = Auth::user();
    }

    /**
     * List resources.
     * @param Request $request
     * @return JsonResponse
     */
    public function index(Request $request)
    {
        return self::httpResponse($this->repository->index($request));
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

        return self::httpResponse($this->repository->create($request->all()));
    }

    /**
     * Display the specified resource.
     * @param $id
     * @return Response
     */
    public function read($id)
    {
        return self::httpResponse($this->repository->read($id));
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
        return self::httpResponse($this->repository->update($id, $request->all()));
    }

    /**
     * Delete the specified resource.
     * @param int $id
     * @return JsonResponse
     */
    public function delete(int $id)
    {
        return self::httpResponse($this->repository->delete($id));
    }
}
