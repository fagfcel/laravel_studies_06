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
        $result = $this->ArrayOfObject(Product::find(10)->toArray());
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

