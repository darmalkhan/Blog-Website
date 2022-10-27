<?php

namespace App\Http\Controllers\Admin;

use Inertia\Inertia;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Http\Controllers\Controller;
use App\Http\Resources\ArticleResource;
use App\Http\Resources\CategoryResource;
use App\Models\Article;
use App\Actions\UploadFile;

class ArticlesController extends Controller
{

    public function index(Request $request)
    {

        $article = Article::with('category:id,name')->latest()->simplePaginate(10);
        return Inertia::render('Article/Index', [
            'articles' => ArticleResource::collection($article)
        ]);
    }

    public function create()
    {
        return Inertia::render('Article/Create', [
            'edit' => false,
            'article' => new ArticleResource(new Article()),
            'categories' => CategoryResource::collection(Category::select(['id', 'name'])->get())

        ]);
    }

    public function store(Request $request, UploadFile $uploadFile)
    {
        $data = $request->validate([
            'category_id' => ['required', Rule::exists(Category::class, 'id')],
            'title' => ['required', 'string', 'max:255'],
            'slug' => ['required', 'string', Rule::unique(Article::class)],
            'image' => ['required', 'image', 'max:3000'],
            'description' => ['required', 'string'],
        ]);

        $data['image'] = $uploadFile->setFile($request->file('image'))
            ->setUploadPath((new Article())->uploadFolder())
            ->execute();

        Article::create($data);

        return redirect()->route('articles.index')
            ->with('success', 'Article Add successfully.');
    }

    public function edit(Article $article)
    {
        return Inertia::render('Article/Create', [
            'edit' => true,
            'article' => new ArticleResource($article),
            'categories' => CategoryResource::collection(Category::select(['id', 'name'])->get())

        ]);
    }

    public function update(Request $request, Article $article, UploadFile $uploadFile)
    {
        $data = $request->validate([
            'category_id' => ['required', Rule::exists(Category::class, 'id')],
            'title' => ['required', 'string', 'max:255'],
            'slug' => ['required', 'string', Rule::unique(Article::class)],
            'image' => ['nullable', 'image', 'max:3000'],
            'description' => ['required', 'string'],
        ]);

        $data['image'] = $article->image;
        if ($request->file('image')) {
            $article->deleteImage();

            $data['image'] = $uploadFile->setFile($request->file('image'))
                ->setUploadPath($article->uploadFolder())
                ->execute();
        }

        $article->update($data);
        return redirect()->route('articles.index')
            ->with('success', 'Article Add successfully.');
    }


    public function destroy(Article $article)
    {
        $article->deleteImage();
        $article->delete();

        return redirect()->route('articles.index')
            ->with('success', 'Article deleted successfully.');
    }
}
