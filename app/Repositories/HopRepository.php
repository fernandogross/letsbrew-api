<?php


namespace App\Repositories;

use App\Models\Hop;
use Illuminate\Database\Eloquent\Collection;

class HopRepository
{
    /**
     * @var Hop $model
     */
    protected $model;

    public function __construct(Hop $model)
    {
        $this->model = $model;
    }

    /**
     * @return Hop[]|Collection
     */
    public function index()
    {
        return $this->model->all();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @param array $data
     * @return bool
     */
    public function create(array $data)
    {
        $this->model->fill($data);
        return $this->model->save($data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Hop  $hop
     * @return \Illuminate\Http\Response
     */
    public function show(Hop $hop)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Hop  $hop
     * @return \Illuminate\Http\Response
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
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Hop $hop)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Hop  $hop
     * @return \Illuminate\Http\Response
     */
    public function destroy(Hop $hop)
    {
        //
    }
}
