<?php

namespace App\Http\Controllers;
use App\Http\Requests\MyWork as FormRequest;
use App\Http\Resources\MyWork as Resource;
use App\Models\Entry;
use App\Models\Work;
use Illuminate\Http\Request;

class MyWorkController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function index()
    {
        $id = auth()->user()->id;
        return Resource::collection(
            Work::where('owner_id', $id)->get()
        );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param FormRequest\Store $request
     * @return Resource
     */
    public function store(FormRequest\Store $request)
    {
        $id = auth()->user()->id;
        $work = new Work();
        $work->fill($request->json()->all());
        $work->owner_id = $id;
        $work->save();
        return new Resource($work);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Work $work)
    {
        return new Resource($work);
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(FormRequest\Update $request, Work $work)
    {
//        $this->authorize('update-mywork', $work);
//        $this->authorize('update', $work);
        $work->fill($request->json()->all());
        $work->save();
        return new Resource($work);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }


}
