<?php

namespace App\Http\Controllers;

use App\Models\Hop;
use App\Repositories\HopRepository;
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
     * @param Request $request
     */
    public function __construct(HopRepository $repository, Request $request)
    {
        $this->request = $request;
        $this->repository = $repository;
        $this->me = Auth::user();
    }

    /**
     * List resources.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        return response()->json($this->repository->index($request));
    }

    /**
     * Create and return new resource.
     *
     * @param Request $request
     * @return Response
     * @throws ValidationException
     */
    public function create(Request $request)
    {
        $this->request->merge([
            'user_id' => 1, // Add some form of auth later
        ]);

        return response()->json($this->repository->create($this->request->all()));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Hop  $hop
     * @return Response
     */
    public function show(Hop $hop)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Hop  $hop
     * @return Response
     */
    public function edit(Hop $hop)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Hop  $hop
     * @return Response
     */
    public function update(Request $request, Hop $hop)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Hop  $hop
     * @return Response
     */
    public function destroy(Hop $hop)
    {
        //
    }
}
