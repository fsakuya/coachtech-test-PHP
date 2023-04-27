<?php

namespace App\Http\Controllers;

use App\Models\InertiaTest;
use Illuminate\Http\Request;
use Inertia\Inertia;

class inertiaTestController extends Controller
{
    public function index()
    {
        return Inertia::render('inertia/index', [
          'blogs' => InertiaTest::all()
        ]);

    }

    public function create()
    {
        return Inertia::render('inertia/create');
    }

    public function show($id)
    {
        // dd($id);
        return Inertia::render('inertia/show', [
            'id' => $id,
            'blog' => inertiaTest::findOrFail($id)
        ]);
    }
    public function store(Request $request)
    {
        $request->validate([
          'title' => ['required', 'max:20'],
          'content' => ['required'],
        ]);

        $inertiaTest = new InertiaTest;
        $inertiaTest->title = $request->title;
        $inertiaTest->content = $request->content;
        $inertiaTest->save();
        return to_route('inertia.index')
        ->with([
            'message' => '登録しました'
        ]);
    }

    public function delete($id)
    {
      $blog = InertiaTest::findOrFail($id);
      $blog->delete();

        return to_route('inertia.index')
        ->with([
            'message' => '削除しました'
        ]);
    }


}
