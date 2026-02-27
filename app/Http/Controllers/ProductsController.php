<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Products;
use App\Models\Bag;
use App\Models\BagPro;
use App\Models\User;
use App\Models\Commandes;
use App\Models\Livraison;
use App\Models\Centenir;



use Darryldecode\Cart\Facades\CartFacade as Cart;


class ProductsController extends Controller
{
    //afficher les produit
    public function index(){
        $products=Products::all();
        return view('dashboard',['products'=>$products]);
    }

    //afficher la page detail d'un produit
    public function show($id){
        $product = Products::findOrFail($id);
        // Get 4 random products for "Complete the Look", excluding the current one
        $recommendations = Products::where('id', '!=', $id)->inRandomOrder()->limit(4)->get();
        return view('product_detail', compact('product', 'recommendations'));
    }
    
    //affichage du panier
    public function Bag(){
        $idU = Auth::user()->id;
        $bag = Bag::where('idClient', $idU)->first();
        if($bag == null){
            $bag = new Bag();
            $bag->idClient = $idU;
            $bag->save();
        }
        if ($bag) {
            $bagid=$bag->id;
            $x=BagPro::where('codeBag',$bagid)->with('products')->get();
        }
        return view('bag', ['x' => $x]);
        
    }

    //ajouter produit au panier
    public function addBag($code){
        $idU = Auth::user()->id;
        //verifier si le client a déja un panier
        $bag = Bag::where('idClient', $idU)->first();
        if($bag == null){
            $bag = new Bag();
            $bag->idClient = $idU;
            $bag->save();
        }
        //$idbag = User::bags()->id;
        $idbag = $bag->id;
        $product=Products::find($code);
        $bags = BagPro::where('codeBag', $idbag)->get();
        //verifier si produit deajat existsb dans bagpro
        $x = $bags->firstWhere('codeProd', $code);
        if($product->stock == 0)
        return redirect()->back()->with('error', 'Le produit est en rupture de stock');
        else{
        if ($x) {
                    // If the product exists, update the quantity and total price
                    $x->quantity += 1;
                    $x->totalPrix += $product->price;
                    $x->save();

                } else {
                    // If the product does not exist, create a new bag entry
                    BagPro::create([
                        'codeBag' => $idbag,
                        'codeProd' => $code,
                        'quantity' => 1,
                        'totalPrix' => $product->price, 
                    ]);
                }
                return redirect()->route('dashboard');
        }
        
        
    }

    //supprimer produit dans panier
    public function suppPro($code){
        $bagpro=BagPro::find($code)->delete();
        return redirect()->route('Bag');
    }

    //augmenter la quantité d'un produit dans panier
    public function plusProduct($code){
        $product=Products::find($code);
        $prix=$product->price;
        $bags = BagPro::where('codeProd', $code)->get()->first();
        $bags->update([
            'quantity' => $bags->quantity + 1,
            'totalPrix' => $bags->totalPrix + $prix,
        ]);
        return redirect()->route('Bag');
    }
    //diminuer la quantité d'un produit dans panier
    public function moinsProduct($code){
        $product=Products::find($code);
        $prix=$product->price;
        $bags = BagPro::where('codeProd', $code)->get()->first();
        
        if($bags->quantity > 1){
            $bags->update([
            'quantity' => $bags->quantity - 1,
            'totalPrix' => $bags->totalPrix - $prix,
        ]);
        return redirect()->route('Bag');
        }
        else{
            $bags->delete();
            return redirect()->route('Bag');
        }
    }
    //acceder au page validation commande
    public function commander(){
        return view('commande');
    }
    //valider commande
    public function validerCommande(Request $Request){
        $user=Auth::user();
        $bag = Bag::where('idClient', $user->id)->first();
        $x=BagPro::where('codeBag',$bag->id)->with('products')->get();
        $Request->validate([
            'adresse' => 'required',
        ]);
        $commande = Commandes::create([
            'adresse' => $Request['adresse'],
            'idClient' => $user->id,
            'dateCom' => now(),
        ]);
        $total=0;
        foreach ($x as $item) {
            $total += $item->totalPrix;
        }
        $livraison = Livraison::create([
            'codeCom' => $commande->id,
            'idClient' => $user->id,
            'dateLiv' => now(),
            'prixtotal' => $total,
        ]);
        foreach ($x as $item) {
            Centenir::create([
                'codeProd' => $item->products->id,
                'codeCom' => $commande->id,
                'qtePro' => $item->quantity,
                'prixtotal' => $total,
            ]);
            
            // Decrement Stock
            $prodToUpdate = Products::find($item->products->id);
            if($prodToUpdate && $prodToUpdate->stock >= $item->quantity) {
                $prodToUpdate->decrement('stock', $item->quantity);
            }
        }

        $bag->delete();
        return redirect()->route('dashboard');
    }
    //afficher la list des commandes de client
    public function Commande(){
        $idU = Auth::user()->id;
        $commandes = Commandes::where('idClient', $idU)->get();
        return view('UsersCommande',['commandes'=>$commandes]);
    }
    
}
