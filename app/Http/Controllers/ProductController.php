<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\User;
use Illuminate\Support\Facades\Storage;


class ProductController extends Controller
{
    public $storagePath = '/storage/products-photos/';

    public function showAddView()
    {
        return view('admin.addProduct');
    }

    public function getRandomString()
    {
        $characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789';
        $string = '';
        $size = 10;

        for ($i = 0; $i < ($size - 1); $i++) {
            $string .= $characters[rand(0, strlen($characters) - 1)];
        }

        return $string;
    }

    public function pagSession(Request $request)
    {
        $emailPag = env('PAGSEGURO_EMAIL');
        $token = env('PAGSEGURO_TOKEN');

        $url = 'https://ws.sandbox.pagseguro.uol.com.br/v2/sessions?email=' . $emailPag . '&token=' . $token;

        $curl = curl_init($url);
        curl_setopt($curl, CURLOPT_HTTPHEADER, array('Content-Type: application/x-www-form-urlencoded; charset=ISO-8859-1'));
        curl_setopt($curl, CURLOPT_POST, 1);
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

        $result = curl_exec($curl);
        curl_close($curl);

        $xml = simplexml_load_string($result);

        return $xml->id;
    }

    public function buy(Request $request)
    {
        $price = $this->getPrice($request->id);

        $tokenCard = $request->tokenCard;
        $hashCard = $request->hashCard;


        $InstallmentsNum = $request->InstallmentsNum;
        $InstallmentsValue = number_format($price / $InstallmentsNum, 2, '.', '');

        $Data["email"] = env('PAGSEGURO_EMAIL');
        $Data["token"] = env('PAGSEGURO_TOKEN');
        $Data["paymentMode"] = "default";
        $Data["paymentMethod"] = "creditCard";
        $Data["receiverEmail"] = env('PAGSEGURO_EMAIL');
        $Data["currency"] = "BRL";
        $Data["itemId1"] = 1;
        $Data["itemDescription1"] = 'Website';
        $Data["itemAmount1"] = $price;
        $Data["itemQuantity1"] = 1;
        $Data["notificationURL="] = "https://www.google.com.br/";
        $Data["reference"] = "83783783737";
        $Data["senderName"] = 'José Comprador';
        $Data["senderCPF"] = '22111944785';
        $Data["senderAreaCode"] = '37';
        $Data["senderPhone"] = '99999999';
        $Data["senderEmail"] = "aassaas@sandbox.pagseguro.com.br";
        $Data["senderHash"] = $hashCard;
        $Data['shippingAddressRequired'] = false;
        $Data["creditCardToken"] = $tokenCard;
        $Data["installmentQuantity"] = $InstallmentsNum;
        $Data["installmentValue"] = $InstallmentsValue;
        $Data["creditCardHolderName"] = 'Jose Comprador';
        $Data["creditCardHolderCPF"] = '22111944785';
        $Data["creditCardHolderBirthDate"] = '27/10/1987';
        $Data["creditCardHolderAreaCode"] = '37';
        $Data["creditCardHolderPhone"] = '99999999';
        $Data["billingAddressStreet"] = 'Av. Brig. Faria Lima';
        $Data["billingAddressNumber"] = '1384';
        $Data["billingAddressComplement"] = '5 Andar';
        $Data["billingAddressDistrict"] = 'Jardim Paulistano';
        $Data["billingAddressPostalCode"] = '01452002';
        $Data["billingAddressCity"] = 'Sao Paulo';
        $Data["billingAddressState"] = 'SP';
        $Data["billingAddressCountry"] = "BRA";

        $BuildQuery = http_build_query($Data);
        $Url = "https://ws.sandbox.pagseguro.uol.com.br/v2/transactions";

        $Curl = curl_init($Url);
        curl_setopt($Curl, CURLOPT_HTTPHEADER, array("Content-Type: application/x-www-form-urlencoded; charset=UTF-8"));
        curl_setopt($Curl, CURLOPT_POST, true);
        curl_setopt($Curl, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($Curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($Curl, CURLOPT_POSTFIELDS, $BuildQuery);
        $return = curl_exec($Curl);
        curl_close($Curl);

        $Xml = simplexml_load_string($return);
        dd($Xml);
    }

    public function addToDatabase(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'required|max:100',
            'price' => 'required|numeric'
        ]);

        $productFolder = $this->getRandomString() . '/';

        if ($request->first_photo_url !== NULL) {
            Storage::disk('public')->put('products-photos/' . $productFolder, $request->first_photo_url);
            $request->first_photo_url = $this->storagePath . $productFolder . $request->first_photo_url->hashName();
        } else {
            return back()->with('fail', 'Anexe pelo menos uma foto do seu produto!');
        }

        if ($request->second_photo_url !== NULL) {
            Storage::disk('public')->put('products-photos/' . $productFolder, $request->second_photo_url);
            $request->second_photo_url = $this->storagePath . $productFolder . $request->second_photo_url->hashName();
        }
        if ($request->third_photo_url !== NULL) {
            Storage::disk('public')->put('products-photos/' . $productFolder, $request->third_photo_url);
            $request->third_photo_url = $this->storagePath . $productFolder . $request->third_photo_url->hashName();
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
            return back()->with('sucess', 'Produto adicionado à loja');
        } else {
            return back()->with('fail', 'Ocorreu um erro ao tentar cadastrar o produto');
        }
    }

    public function deleteFromDatabase(Request $request)
    {
        $product = Product::where('id', '=', $request->id)->first();

        $pathToDelete = 'products-photos/' . $product->path;
        $result = Storage::disk('public')->deleteDirectory($pathToDelete);

        $product->delete();

        return back();
    }

    public function getProducts(Request $request)
    {
        if (!is_null($request->key)) {
            $products = $this->search($request->key);
        } else {
            $products = Product::all();
        }

        return view('products', ['User' => User::where('id', '=', session('LoggedUser'))->first(), 'products' => $products]);
    }

    public function getPrice($id)
    {
        $product = Product::where('id', '=', $id)->first();

        return number_format($product->price, 2, '.', '');
    }

    public static function getProduct($id)
    {
        $product = Product::where('id', '=', $id)->first();

        return $product;
    }

    public function search($name)
    {
        $products = Product::where('name', 'LIKE', $name . '%')->get();

        return $products;
    }
}
