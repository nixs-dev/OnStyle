<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Facades\Storage;


class AdmController extends Controller
{
    public static $storagePath = '/storage/products-photos/';

    public static function getRandomString()
    {
        $characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789';
        $string = '';
        $size = 10;

        for ($i = 0; $i < ($size - 1); $i++) {
            $string .= $characters[rand(0, strlen($characters) - 1)];
        }

        return $string;
    }

    public static function addToDatabase(Request $request)
    {

        $request->validate([
            'name' => 'required',
            'description' => 'required|max:100',
            'price' => 'required|numeric'
        ]);

        $productFolder = self::getRandomString() . '/';

        if ($request->first_photo_url !== NULL) {
            Storage::disk('public')->put('products-photos/' . $productFolder, $request->first_photo_url);
            $request->first_photo_url = self::$storagePath . $productFolder . $request->first_photo_url->hashName();
        } else {
            return 'Anexe pelo menos uma foto do seu produto!';
        }

        if ($request->second_photo_url !== NULL) {
            Storage::disk('public')->put('products-photos/' . $productFolder, $request->second_photo_url);
            $request->second_photo_url = self::$storagePath . $productFolder . $request->second_photo_url->hashName();
        }
        if ($request->third_photo_url !== NULL) {
            Storage::disk('public')->put('products-photos/' . $productFolder, $request->third_photo_url);
            $request->third_photo_url = self::$storagePath . $productFolder . $request->third_photo_url->hashName();
        }

        $product = new Product;
        $product->name = $request->name;
        $product->description = $request->description;
        $product->price = number_format($request->price, 2, '.', '');
        $product->path = $productFolder;
        $product->first_photo_url = $request->first_photo_url;
        $product->second_photo_url = $request->second_photo_url;
        $product->third_photo_url = $request->third_photo_url;

        $status = $product->save();


        if ($status) {
            return json_encode('Produto adicionado à loja');
        } else {
            return json_encode('Ocorreu um erro ao tentar cadastrar o produto');
        }
    }

    public static function deleteFromDatabase(Request $request)
    {
        $product = Product::where('id', '=', $request->id)->first();

        $pathToDelete = 'products-photos/' . $product->path;
        $result = Storage::disk('public')->deleteDirectory($pathToDelete);

        $product->delete();

        return json_encode('success');
    }

	public static function search($name)
    {
        $products = Product::where('name', 'LIKE', $name . '%')->get();

        return $products;
    }

	public static function getAllFromDatabase(Request $request) {
        if (!is_null($request->key)) {
            $products = self::search($request->key);
        } else {
            $products = Product::all();
        }

        return $products;
	}
}
