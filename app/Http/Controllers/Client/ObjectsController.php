<?php

namespace App\Http\Controllers\Client;

use App\Dal\Entities\Article;
use App\Dal\Entities\Category;
use App\Dal\Entities\Objects;
use App\Dal\Entities\SubCategory;
use App\Http\Controllers\Client\Base\ClientControllerBase;
use Illuminate\Http\Request;


class ObjectsController extends ClientControllerBase
{
    public function index(Request $request)
    {

        $objects = Objects::all();

        return $this->view("client.objects.index", [
            'objects' => $objects
        ]);
    }

    public function subcategory(Request $request)
    {
        return $this->view("client.objects.subcategory", [

        ]);
    }

    public function category(Request $request, $id)
    {

        $categories = Category::where('object_id', '=', $id)->where('parent_id', '=', 0)->with(['categorySubcategory', 'сategoryArticles'])->get();

        return $this->view("client.objects.category", [
            'categories' => $categories
        ]);
    }

    public function childcategory(Request $request, $id, $seoUrl)
    {

//        $categories = Category::where('object_id', '=', $id)->where('parent_id', '=', 0)->get();

        if(isset($seoUrl)) {
            $categories = Category::where('object_id', '=', $id)->where('seo_url', '=', $seoUrl)->with(['children','categorySubcategory', 'сategoryArticles'])->get();
        }
//        dd($categories);
        return $this->view("client.objects.childcategory", [
            'categories' => $categories
        ]);
    }

    public function article(Request $request)
    {

        $article = Article::with('category')->first();


        return $this->view("client.objects.article", [
            'article' => $article
        ]);
    }

    public function catart(Request $request, $seoUrl)
    {

        $article = Article::where('seo_url', '=', $seoUrl)->first();

        return $this->view("client.objects.article", [
            'article' => $article
        ]);
    }

    public function catsub(Request $request, $seoUrl)
    {

        $subcategory = SubCategory::where('seo_url', '=', $seoUrl)->with(['children','subсategoryArticles','subcategoryImages'])->first();

        return $this->view("client.objects.subcategory", [
            'subcategory' => $subcategory
        ]);
    }


    public function subart(Request $request, $seoUrl, $articleUrl)
    {

        $article = Article::where('seo_url', '=', $articleUrl)->first();

        return $this->view("client.objects.article", [
            'article' => $article
        ]);
    }
}
