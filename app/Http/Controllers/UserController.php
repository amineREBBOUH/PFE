<?php

namespace App\Http\Controllers;

use Validator;
use App\Models\Card;
use App\Models\Like;
use App\Models\User;
use App\Models\Order;
use App\Mail\MailKeys;
use App\Models\Product;
use App\Models\Revenue;
use App\Models\Category;
use App\Models\Cardusers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        // $products=Product::take(5)->get();
        // foreach ($products as $key => $poducts) {
        //     # code...
        //     dump($poducts->likes->where('user_id',Auth::user()->id));
        // }
        // dd();
        $category=Category::where('name','games')->first();
        $products=$category->products;
        return view('store.index',["type"=>$category->name,"products"=>$products]);

    }
    public function filterCategory(Request $req)
    {
       // return response()->json(["eee"=>33], 200);
        $category=Category::where('name',$req->type)->first();
        $products=$category->products;
       $returnHTML =view('store.layoutContent', ["type"=>$category->name,"products"=>$products])->render();
     return response()->json(array('success' => true, 'html'=>$returnHTML));
     //  return view('User_Normal.update', ["pictures"=>$pictures]);
       //return response()->json(["pictures"=>$pictures,"date"=>$search]);
      //return redirect('/update')->with('pictures', $pictures);


    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
    public function shopping_cart(Type $var = null)
    {
        $card=Card::where('user_id',Auth::user()->id)->first();

      //  dd($card->products);
    //   $specificCards = $product->cards()->where('user_id', Auth::user()->id)->get();
    //     foreach ($specificCards as $key => $value) {
    //         dump($value->products);
    //     }
    //   $products=Product::all();
    //   dump("user:".Auth::user()->id);
    //   foreach ($products as $key => $product) {
    //     # code...
        
    //   dump($product->name);
    //   if ($product['cards']->isNotEmpty()) {
    //     foreach ($product->cards as $key => $value) {
    //         if ($value->user_id==Auth::user()->id) {
    //             # code...
    //             dump('this card belog');
    //             dump("user_d_card:".$value->user_id);
    //             dump('product id/'.$value->pivot->product_id);
    //         } 
            
    //         // dump("user_d_card:".$value->user_id);
    //         //     # code...
    //         //     dump($value->pivot);
    //       }      } 
    //       else {
    //     # code...
    //     dump('eee');
    //   }
      
      
    // }
    //   dd();
    $card=Card::where('user_id',Auth::user()->id)->first();
    // foreach ($card->products as $key => $product) {
    //     if(count($product->Keys->where('status','not_yet'))>0){
    //         dump("exist in stock");
    //     }
    //     else{
    //         dump('not exisr');
    //     }
    // }
    // dd();
         return view('store.cart',['cards'=>$card]);
    }
    public function wichlist(Type $var = null)
    {        
       $likes=Like::where('user_id',Auth::user()->id)->get();
      
        return view('store.wichlist',["likes"=>$likes]);
    }
    public function categories(Request $request,$type)
    {
        $products=Category::where('name',$type)->first()->products()->paginate(3);
        //dd($products);
        $gamesC=Category::where('name','games')->first()->products()->count();
        $filmsC=Category::where('name','subscriptions')->first()->products()->count();
        $softwareC=Category::where('name','software')->first()->products()->count();

        return view('store.category',["products"=>$products,"gamesC"=>$gamesC,"filmsC"=>$filmsC,"softwareC"=>$softwareC]);
    }
    public function seeting(Type $var = null)
    {
        $user=User::find(Auth::user()->id);

        return view('store.seeting.accountInfo',['user'=>$user]);
    }
    public function seetingPost(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'bail|required',
            'email'=>'bail|required|email',
            
        ]);
        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        } 
        $user= User::find(Auth::user()->id);
        $user->name=$request->name;
        $user->email=$request->email;
        $user->save();
        return back();
        }
    public function password(Type $var = null)
    {
        return view('store.seeting.password');
    }
    public function passwordPost(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'password' => 'bail|required|confirmed',
            'password_confirmation'=>'bail|required|',
            
        ]);
        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }
 
        $user= User::find(Auth::user()->id);
        $user->password=Hash::make($request->password);
        $user->save();
        return back();
        
    }
    public function search(Request $request)
    {
        $category=Category::where('name',$request->category)->first();
        $products=$category->products()->where('name', 'LIKE', '%'.$request->name.'%')->get();
        return view('store.search',["products"=>$products]);
    }
    public function add_to_cart(Request $request)
    {
        $card=Card::where('user_id',Auth::user()->id)->first();
        $product_id=$request->id;
        $card_product=new Cardusers;
        $card_product->card_id=$card->id;
        $card_product->product_id=$product_id;
        $card_product->save();
        return redirect()->back();

    }
    public function chekout(Request $request)
    {
        # code...
        $line_items=[];
        $products_id=[];
        $cards_id=[];
        $card=Card::where('user_id',Auth::user()->id)->first();

        foreach ($card->products as $key => $product) {
            if (count($product->Keys->where('status','not_yet'))>0) {
               // dump($product->name);
              //  dump($product->Keys->where('status','not_yet')->first());
            //  dump($product->pivot->id);
                $line_items[]=[
                    
                        'price_data' => [
                            'currency' => 'usd',
                            'product_data' => [
                                'name' => $product->name,
                               // 'images'=>[$product->pict]
                            ],
                            'unit_amount' =>$product->new_price * 100,
                        ],
                        'quantity' => 1,
                    
                    ];
                array_push($products_id, $product->id);

                array_push($cards_id, $product->pivot->id);



            }
        }

       // dd();
        $stripe = new \Stripe\StripeClient(env('STRIPE_SECRET_KEY'));
        $checkout_session = $stripe->checkout->sessions->create([
            "metadata" => [
                'products_id' =>implode(',', $products_id),
                'cards_id'=>implode(',', $cards_id),
            ],
            'line_items' => $line_items,
            'mode' => 'payment',
            'success_url' => route('store.success',[], true)."?session_id={CHECKOUT_SESSION_ID}",
            'cancel_url' => route('store.cancel',[], true),
        ]);
        return redirect($checkout_session->url);
    }
    public function success(Type $var = null)
    {
        # code...
        $stripe = new \Stripe\StripeClient(env('STRIPE_SECRET_KEY'));
        $session = $stripe->checkout->sessions->retrieve($_GET['session_id']);
        if ($session && $session->payment_status== "paid") {
            $products_id=explode(",",$session->metadata->products_id);
            $cards_id=explode(",",$session->metadata->cards_id);
            foreach ($products_id as $key => $product_id) {
                # code...
                $product=Product::find($product_id);
                $revenue=new Revenue;
                $revenue->product_id=$product_id;
                $revenue->save();
                //dump($revenue->save());
                $key=$product->Keys->where('status','not_yet')->first();
               // dump($key->id);
                $data=[
                    "key"=>$key,
                    "product"=>$product,
                    'subject'=>"digatl product keys or accounts",
                ];
                //dump($data["key"]["key"]);
                try {
                    Mail::to(Auth()->user()->email)->send(new MailKeys($data));
                } catch (\Throwable $th) {
                    // return response()->json(["error happend"]);
                    dump($th);
                }
                $key->status="bought";
                $key->save();
            }
           // dd();
           $card=Card::where("user_id",Auth::user()->id)->first();
           foreach ($cards_id as $key => $card_id) {
            # code...
           // dump($card_id);
            $card=Cardusers::find($card_id)->delete();

           }
           //dd();
          return view('store.payments.success');

        }
    }
    public function cancel(Type $var = null)
    {
        return view('store.payments.cancel');
    }

    public function removeAll(Request $request)
    {
        $card=Card::where('user_id',Auth::user()->id)->first();
        Cardusers::where('card_id', $card->id)->delete();


    }
    public function removeItem(Request $request)
    {
        $card=Card::where('user_id',Auth::user()->id)->first();
           

        $carduser=Cardusers::where('product_id',$request->id)
        ->where("card_id",$card->id)
        ->first();
        if($carduser->delete()){
            return response()->json(["good"], 200);

        }
        else{
            return response()->json(["error"], 200);

        }
        
    }
    public function order(Request $request)
        {
            $order=Order::where('user_id',Auth::user()->id)->where('product_id',$request->id)->get();
            if ( count($order)>0) {
                return response()->json(['res'=>'already'], 200);
            } else {
                $orderpost=new Order;
                $orderpost->user_id=Auth::user()->id;
                $orderpost->product_id=$request->id;
                if ($orderpost->save()) {
                    return response()->json(['res'=>'good'], 200);
                } else {
                    return response()->json(['res'=>'error'], 200);
                }
                
                


            }
            
        }
        public function details($id)
        {
            # code...
            $product=Product::find($id);
            return view('store.details',["product"=>$product]);
        }
        public function like(Request $request)
        {
            # code...
            $like=new Like;
            $like->user_id=Auth::user()->id;
            $like->product_id=$request->id;
            if ($like->save()) {
                return response()->json(['like'], 200);
            } else {
                return response()->json(['error'], 200);
                }
            
            
        }
        public function deslike(Request $request)
        {
            # code...
            $like= Like::where('user_id',Auth::user()->id)
            ->where('product_id',$request->id);
            if ($like->delete()) {
                return response()->json(["dislike"], 200);
            } else {
                return response()->json(["error"], 200);
            }
            
            
        }

        public function remove_like(Request $request)
        {
            $like=Like::find($request->id);
            if ($like->delete()) {
                return response()->json(['deleted'], 200);
            }
        }

}
