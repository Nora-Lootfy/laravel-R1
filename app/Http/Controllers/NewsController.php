<?php

namespace App\Http\Controllers;

use App\Models\Car;
use Illuminate\Http\Request;
use App\Models\News;
use Illuminate\Http\RedirectResponse;

class NewsController extends Controller
{
    private $columns = [
        'newsTitle',
        'newsContent',
        'newsPublished',
        'newsAuthor'
    ];
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $news = News::get();
        return view('news', compact('news'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('createNews');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request) :RedirectResponse
    {
//        $news = new News();
//
//        $news->newsTitle = $request->newsTitle;
//        $news->newsContent = $request->newsContent;
//        $news->newsPublished = (isset($request->newsPublished))? true : false;
//        $news->newsAuthor = $request->newsAuthor;
//
//        $news->save();

        $request->validate([
            'newsTitle'     => 'required|string|max:100',
            'newsContent'   => 'required|string|max:500',
            'newsAuthor'    => 'required|string|max:50'
        ]);

        $data = $request->only($this->columns);
        $data['newsPublished'] = isset($data['newsPublished']);

        News::create($data);

        return redirect('news-index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $news = News::findORFail($id);

        return view('showNews', compact('news'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $news = News::findOrFail($id);
        return view('editNews', compact('news'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id) :RedirectResponse
    {
        $data = $request->only($this->columns);
        $data['newsPublished'] = isset($data['newsPublished'])? true:false;

        News::where('id', $id)->update($data);

        return redirect('news-index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id) :RedirectResponse
    {
        News::where('id', $id)->delete();
        return redirect('news-index');
    }

    public function getTrashed()
    {
        $trashed_news = News::onlyTrashed()->get();
        return view('trashedNews', compact('trashed_news'));
    }

    public function restore(string $id) :RedirectResponse
    {
        News::where('id', $id)->restore();
        return redirect('news-index');
    }

    public function destroyPermanently(string $id) :RedirectResponse
    {
        News::where('id', $id)->Forcedelete();
        return redirect('news-index');
    }
}
