<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;
use App\Models\Product;

class CookieController extends Controller
{
    // indexメソッドの作成
    public function index() {
        // クッキーから'product_id'キーの値を取得する
        $product_id = Cookie::get('product_id');

        // Productsテーブルからクッキーで取得したidのレコードを取得
        $product = Product::find($product_id);

        // views/Cookie/index.blade.php に compact関数を使用して'product'を引数に$productを配列として 渡す。
        return view('Cookies.index', compact('product'));
    }

    // createメソッドの作成
    public function create() {
        // productsテーブルの全てのレコードを$productsに格納
        $products = Product::all();

        // views/Cookies/create.php に compact関数を使用して'products'引数に$productsを配列として 渡す。
        return view('cookies.create', compact('products'));
    }

    // storeメソッドを作成し、HTTPリクエストデータを処理する。
    public function store(Request $request){
        // 
        $request->validate([
            'product_id' => 'required|exists:products,id'
        ]);

        // キー名が'product_id'、値が商品IDのデータをクッキーに設定する(60分有効)
        Cookie::queue('product_id',$request->input('product_id'),60);

        // HTTPレスポンスと同時にクッキーが送信される
        return redirect('/cookies');
    }
    
    //
    public function destroy() {
        //
        Cookie::queue(Cookie::forget('product_id'));

        //
        return redirect('/cookies');
    }
}
