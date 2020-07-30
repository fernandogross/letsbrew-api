<?php

namespace App\Http\Controllers;

use App\Models\Hop;
use App\Repositories\HopRepository;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;

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
     * HopController constructor.
     * @param HopRepository $repository
     * @param Request $request
     */
    public function __construct(HopRepository $repository, Request $request)
    {
        $this->request = $request;
        $this->repository = $repository;
    }

    /**
     * Display a listing of the resource.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        return response()->json($this->repository->index($request));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        $this->request->merge([
            'user_id' => Auth::user()->id
        ]);
        $this->repository->create($this->request->all());
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
