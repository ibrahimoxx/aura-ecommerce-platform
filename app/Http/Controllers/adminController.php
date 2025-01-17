<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Products;
use App\Models\Livraison;

class adminController extends Controller
{
    //afficher les client
    public function index(){
        $user=User::all();
        return view('user',['client'=>$user]);
    }
    //supprimer client
    public function supprimerUser($code){
        $Res=User::find($code)->delete();
        return Redirect()->Route('user');
    }
    //activer client
    public function activer($code){
        $Res=User::find($code);
        $Res->active=1;
        $Res->save();
        return Redirect()->Route('user');
    }
    //desactiver client
    public function desactiver($code){
        $Res=User::find($code);
        $Res->active=0;
        $Res->save();
        return Redirect()->Route('user');
    }
    
    //gerer les produits
    public function gereProduct(){
        $products=Products::all();
        return view('gereProduct',['products'=>$products]);
    }
    //ajouter produit
    public function createProduct(){
        return view('createProduct');
    }
    public function addProduct(Request $Request){
         $Request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'price' => 'required|numeric',
            'size' => 'required|array',
            'color' => 'required|array',
            'category' => 'required|string|max:255',
            'brand' => 'required|string|max:255',
            'stock' => 'required|integer',
            'image_url' => 'required|string|max:255', 
        ]);

        
        Products::create([
            'name' => $Request['name'],
            'description' => $Request['description'],
            'price' => $Request['price'],
            'size' => $Request['size'],  
            'color' => $Request['color'], 
            'category' => $Request['category'],
            'brand' => $Request['brand'],
            'stock' => $Request['stock'],
            'image_url' => $Request['image_url'],
        ]);
        return redirect()->route('gereProduct')->with('success', 'Product added successfully!');
    }
    //supprimer produit
    public function deleteProduct($code){
        $pro=Products::find($code)->delete();
        return Redirect()->route('gereProduct');
    }
    //modifier produit
    public function showProduct($code){
        $product=Products::find($code);
        return view('showProduct',['product'=>$product]);
    }
    public function updateProduct(Request $Request,$code){
        $Request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'price' => 'required|numeric',
            'size' => 'required|array',
            'color' => 'required|array',
            'category' => 'required|string|max:255',
            'brand' => 'required|string|max:255',
            'stock' => 'required|integer',
            'image_url' => 'required|string|max:255', // Adjust validation if you handle file uploads
        ]);
    
        // Find the existing product by its ID
        $product = Products::find($code);
        
        if (!$product) {
            // If the product doesn't exist, return an error or redirect as needed
            return redirect()->route('gereProduct')->with('error', 'Product not found!');
        }
    
        // Update the product data
        $product->update([
            'name' => $Request['name'],
            'description' => $Request['description'],
            'price' => $Request['price'],
            'size' => $Request['size'],  
            'color' => $Request['color'], 
            'category' => $Request['category'],
            'brand' => $Request['brand'],
            'stock' => $Request['stock'],
            'image_url' => $Request['image_url'],
        ]);
    
        // Redirect with success message
        return redirect()->route('gereProduct')->with('success', 'Product updated successfully!');
    }

    //afficher les livraison pour admin
    public function livraison(){
        $liv=Livraison::all();
        return view('livraison',['livraison'=>$liv]);
    }
    //valider livraison pour admin
    public function valider($id){
        $liv=Livraison::find($id);
        $liv->update([
            'status' => "Valider",
        ]);
        return Redirect()->route('livraison');
    }
}
