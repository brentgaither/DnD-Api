<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\DiaryRepository;
use App\Models\Diary;

class DiaryController extends Controller
{
  public function __construct(DiaryRepository $diary_repository)
    {
        // $this->middleware('auth:api');
        $this->diaries = $diary_repository;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return $this->diaries->index()->get();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        return $this->diaries->store($request);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Diary $diary)
    {
        return $diary;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Diary $diary)
    {
        return $this->diaries->update($request, $diary);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        return $this->diaries->destroy($id);
    }
}
