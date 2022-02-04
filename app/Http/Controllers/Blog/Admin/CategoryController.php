<?php

namespace App\Http\Controllers\Blog\Admin;

use App\Http\Controllers\Controller;
use App\Models\BlogCategory;
use App\Models\BlogPost;
use Illuminate\Http\Request;

class CategoryController extends BaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $paginator = BlogCategory::paginate(22);
        return view('blog.admin.category.index', compact('paginator'));


        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $item = BlogCategory::findOrFail($id);
        $category = BlogCategory::all();
       return view('blog.admin.category.edit', compact('item','category'));
        // dd($item, $category);
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {return back()
        ->withErrors(['msg'=>"Запись id={$id} не найдена!"])
        ->withInput();
        $item = BlogCategory::find($id);

        if(empty($item)) {
            return back()
            ->withErrors(['msg'=>"Запись id={$id} не найдена!"])
            ->withInput();
        }
        $data = $request->all();
        $item->fill($data);
        $result = $item->update($data);
        if ($result) {
            return redirect()
            ->route('admin.blog.categories.edit',$item->id)
            ->with(['success' => 'Успешно создано!']);
        } else {
            return back()
            ->withErrors(['msg' => 'Ошибка при сохранении'])
            ->withInput();
        }
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
