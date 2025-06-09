<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\Phone;
use App\Models\Product;

class MainController extends Controller
{
    public function index(){
        echo "Eloquent Relações";

    }

    public function OneToOne(){
        echo "OneToOne";
        echo "<hr>";
        //buscar o telefone de um cliente
        // $client1 = Client::find(12)->phone;

        // echo "ID: ". $client1->client_id  . " PHONE: ". $client1->phone_number;
        // echo "<hr>";

        //dados do cliente e seu telefone
        // $client2 = Client::find(12);
        // $phone = $client2->phone->phone_number;
        // echo "ID: ". $client2->id;
        // echo " | Nome do Cliente: ". $client2->client_name;
        // echo " | Telefone do cliente: ". $phone;
        // echo "<hr>";
        
        //outra forma usando o metodo with
        // $client3 = Client::with('phone')->find(12);
        // echo "ID: ". $client3->id;
        // echo " | Nome do Cliente: ". $client3->client_name;
        // echo " | Telefone do cliente: ". $client3->phone->phone_number;;
        // echo "<hr>";
        
        //buscar todos os clientes e seus telefone na relação de um para um
        // $clients = Client::with('phone')->get();
        // foreach ($clients as $client){
        // echo "ID: ". $client->id;
        // echo " | Nome do Cliente: ". $client->client_name;
        // echo " | Telefone do cliente: ". $client->phone->phone_number;;
        // echo "<hr>";
        // }
    }

    public function OneToMany(){

        // nbuscar id , nome e todos os telefones do cliente
        // $client1 = Client::find(10);
        // $phones = $client1->phones;
        // echo "ID: ". $client1->id . "<br>";
        // echo "ID: ". $client1->client_name . "<br>";
        // $count=0;
        // foreach($phones as $phone)
        // {
        //     echo "Phone ". ++$count . ": ". $phone->phone_number ."<br>";
        // }
        // echo "<hr>";
        
        
        //busca usando o with
        // $client2 = Client::with('phones')->find(10);
        
        // echo "ID: ". $client2->id . "<br>";
        // echo "ID: ". $client2->client_name . "<br>";
        // $count=0;
        // foreach($client2->phones as $phone)
        // {
        //     echo "Phone ". ++$count . ": ". $phone->phone_number ."<br>";
        // }
        // echo "<hr>";
        
        //vamos buscar todos os clientes e seus telefones
        $clients = Client::with('phones')->get();
        
        foreach($clients as $client)
        {
            echo "ID: ". $client->id . "<br>";
            echo "ID: ". $client->client_name . "<br>";
            $count=0;
            foreach($client->phones as $phone)
            {
                echo "Phone ". ++$count . ": ". $phone->phone_number ."<br>";
            }
            echo "<hr>";
        }

    }
    public function ManyToMany(){
        //buscar um cliente e todos os seus produtos comprados
        // $client = Client::find(1);
        // $products = $client->products;
        // echo 'Cliente: ' . $client->client_name.'<br>';
        // echo 'Produtos: <br>';
        // foreach ($products as $product)
        // {
        //     echo $product->product_name . '<br>';
        // }

        //buscar todos os clientes que compraram um determinado produto
        $product1 = Product::find(1);
        $clients = $product1->clients;
        
        echo 'Produto: ' . $product1->product_name.'<br>';
        echo 'Clientes: <br>';
        
        foreach ($clients as $client)
        {
            echo $client->client_name . '<br>';
        }
    }

    public function BelongsTo(){
        //neste metodo vamos descobrir o cliente a partir do telefone
        // $phone1 = Phone::find(10);
        // $client1 = $phone1->client;
        // echo "Telefone: ". $phone1->phone_number . "<br>";
        // echo "Cliente: ". $client1->client_name;
        // echo "<hr>";
        
        //neste metodo usando o with vamos descobrir o cliente a partir do telefone
        // $phone2 = Phone::with('client')->find(10);
        // echo "Telefone: ". $phone2->phone_number . "<br>";
        // echo "Cliente: ". $phone2->client->client_name;
        // echo "<hr>";
        
    }

    public function RunningQueries(){

        // $client1 = Client::find(1);
        // $phones = $client1->phones()->where('phone_number', 'like', '8%')->get();
        // echo 'Cliente: '. $client1->client_name . '<br>';
        // echo 'Telefones: <br>';
        // foreach($phones as $phone){
        //     echo $phone->phone_number . '<br>';
        // }

        // $client2 = Client::find(1);
        // $products = $client2->products()->where('price', '>', 50)->orderBy('product_name')->get();
        // echo 'Cliente: '. $client2->client_name . '<br>';
        // echo 'Produtos: <br>';
        // foreach($products as $product){
        //     echo $product->product_name . "\tprice: R$" . $product->price . '<br>';
        // }

         $client2 = Client::find(1);
        $products = $client2->products()->where('price', '>', 50)->distinct()->orderBy('product_name')->get();
        echo 'Cliente: '. $client2->client_name . '<br>';
        echo 'Produtos: <br>';
        foreach($products as $product){
            echo $product->product_name . "\tprice: R$" . $product->price . '<br>';
        }


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

