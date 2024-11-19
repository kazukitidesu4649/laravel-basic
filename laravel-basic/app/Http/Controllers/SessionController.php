<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class SessionController extends Controller
{
    //
    public function index() {
        // セッションから'product_id'キーを取得し、$product_idに格納
        $product_id = session(('product_id'));
        // $product_idに対応するレコードをproductsテーブルから取得する
        $product = Product::find($product_id);
        // Bladeテンプレート(view/session/create.blade.php)にproductsを渡す
        return view('session.create', compact('products'));
    }

    public function create() {
        // productsテーブルの全てのデータを$productsに格納
        $products = Product::all();

        //Bladeテンプレート(view/session/create.blade.php)にproductsを渡す
        return view('session.create', compact('products'));
    }

    // HTTPリクエストをstoreメソッドを使いデータベースに保存する
    public function store(Request $request) {
        // $requestをバリーションする
        $request->validate([
            // 空データと存在しないproduct_idをバリデートする。
            'product_id' => 'required|exists:products,id'
        ]);

        // キー名が'product_id'、値が商品IDのデータをセッションに保存する 
        session(['product_id' => $request->input('product_id')]);
        // /sessions/create.blade.phpにリダイレクトする
        return redirect('/sessions');
    }

    public function destroy() {
        // セッションから'product_id'キーとその値を削除する
        session()->forget('product_id');
        // 
        return redirect('/sessions');
    }

}
