<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Http\Requests\CategoryRequest;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    //カテゴリページ一覧表示
    public function index()
    {
        $categories = Category::all();
        return view('category', compact('categories'));
    }

    //送られてきた内容をcategoryテーブルへ追加
    public function store(CategoryRequest $request)
    {
        $category = $request->only(['name']);
        Category::create($category);
        return redirect('/categories')->with('message', 'カテゴリを作成しました');
    }

    //categoryの更新
    public function update(CategoryRequest $request)
    {
        $category = $request->only(['name']);
        Category::find($request->id)->update($category);
        return redirect('/categories')->with('message', 'カテゴリを更新しました');
    }
    //categoryの削除
    public function destroy(Request $request)
    {
        Category::find($request->id)->delete();
        return redirect('/categories')->with('message', 'カテゴリを削除しました');
    }
}
