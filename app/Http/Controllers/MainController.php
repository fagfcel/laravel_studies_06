<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class MainController extends Controller
{
    public function index(){
        //Buscando todos os dados de produtos
        // $result = Product::all();

        //Buscar todos os dados em um array
        // $result = Product::all()->toArray();

        //retornar os resultados como um array de objetos stdClass
        // $result = $this->ArrayOfObject(Product::all()->toArray());

        //buscar produdos ordenados pelo nome alfabeticamente
        // $result = $this->ArrayOfObject(Product::orderBy('product_name')->get()->toArray());

        //buscar os tês primeiros produtos ordenado pelo id
        // $result = $this->ArrayOfObject(Product::limit(3)->get()->toArray());

        // buscar produto por id
        // $result = $this->ArrayOfObject(Product::find(10)->toArray());
        // $this->showData($result);

        //usar cláusula where
        // $result = Product::where('price', '>=', 70)->get()->toArray();
        // $this->showData($result);

        //buscar apenas o primeiro
        // $result = Product::where('price', '>=', 70)
        //                     ->first()
        //                     ->toArray();

        //buscar apenas o primeiro elemento se ele existir, caso contrario retornar vazio
        // $result = Product::where('price', '>=', 190)
        //                    ->firstOr( function(){
        //                     return [];
        //                    });
        // $this->showData($result);

        // $product = Product::find(10);
        // echo $product->price; // price da db
        // echo '<br>';
        
        // $product->price = 200;
        // echo $product->price; // definir o novo preço apenas no codigo (não na db)
        // echo '<br>';
        
        // $product->refresh();
        // echo $product->price; // recupera o valor da db
        // echo '<br>';


        // $product = Product::find(10);
        // echo $product->product_name . "<br>";

        // $product = Product::where('price', '>=', 70)->first();
        // echo "Nome: ". $product->product_name . " Valor: ". $product->price . "<br>";
        
        // $product = Product::firstWhere('price', '>=', 70);
        // echo "Nome: ". $product->product_name . " Valor: ". $product->price . "<br>";

        // $product = Product::findOr(100, function(){
        //     echo "Produto não encontrado!";
        // });
        // if($product){
        //     echo "Nome: ". $product->product_name . " Valor: ". $product->price . "<br>";
        // }

        // $product = Product::findOrFail(120);
        // echo "Nome: ". $product->product_name . " Valor: ". $product->price . "<br>";

        $total_produtos = Product::count();
        $pruduct_max_price = Product::max('price');
        $pruduct_min_price = Product::min('price');
        $pruduct_avg_price = Product::avg('price');
        $pruduct_sum_price = Product::sum('price');

        $result = [
            'total_produtos' => $total_produtos,
            'pruduct_max_price' => $pruduct_max_price,
            'pruduct_min_price' => $pruduct_min_price,
            'pruduct_avg_price' => $pruduct_avg_price,
            'pruduct_sum_price' => $pruduct_sum_price

        ];

        $this->showData($result);


    }

    private function showData($data){
        echo "<pre>";
        print_r($data);
    }

    private function ArrayOfObject($data){
        $tmp = [];
        foreach ($data as $key => $value) {
            $tmp[] = (object) $value;
        }
        return $tmp;
    }
}

