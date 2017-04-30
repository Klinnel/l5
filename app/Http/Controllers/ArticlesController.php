<?php

namespace App\Http\Controllers;

use App\Article;
use App\Http\Requests\ArticleRequest;
use \Debugbar;

class ArticlesController extends Controller {


  /**
   * Show all articles
   *
   * @return mixed Response
   */
  public function index() {

    $articles = Article::latest('published_at')
                       ->published()
                       ->get();
    debug($articles);
    foreach ($articles as $article) {
      $article->slug                 = str_slug($article->id . '-' . $article->title, '-');
      $article['court_published_at'] = substr($article->published_at, 0, 10);
      $article->delai                = $article->created_at->diffForHumans();
    }

    return view('articles.index', compact('articles'));

  }


  public function show($id) {


    $article = Article::find($id);

    //    $article = Article::findOrFail($id);
    //    return $article->created_at->addDays(8)->format('Y-m');
    if ($article) {
      return view('articles.show', compact('article'));
    }
    else {
      return 'Erreur 404';
    }

  }


  public function create() {

    return view('articles.create');

  }

  /**
   * Save a new article
   *
   * @param ArticleRequest $request
   * @return mixed
   */
  public function store(ArticleRequest $request) {

    Article::create($request->all());

    return redirect('articles');

  }

  public function edit($id) {

    $article = Article::findOrFail($id);
    //    return dd($article);
    
    return view('articles.edit', compact('article'));

  }

  /**
   * Update un article
   *
   * @param ArticleRequest $request
   * @return mixed
   */
  public function update($id, ArticleRequest $request) {

    $article = Article::findOrFail($id);

    $article->update($request->all());

    return redirect('articles');

  }
}
