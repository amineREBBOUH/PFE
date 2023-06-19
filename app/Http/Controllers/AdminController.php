<?php

namespace App\Http\Controllers;
use DB;
use Validator;
use App\Models\Key;
use App\Models\User;
use App\Models\Order;
use App\Models\Product;
use App\Mail\MailNotify;
use App\Models\Category;
use App\Models\Cardusers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;


class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $category=Category::get();
        $products=Product::rightJoin('categories', 'products.category_id', '=', 'categories.id')
        ->select('categories.name', DB::raw('COUNT(products.id) as count'), 'categories.id')
        ->groupBy('categories.name','categories.id')
        ->orderBy('categories.id', 'asc')
        ->pluck('count');
      // dd($products);
       $key= DB::table('categories')
       ->leftJoin('products', 'categories.id', '=', 'products.category_id')
       ->leftJoin('Keys', 'products.id', '=', 'Keys.product_id')
       ->select('categories.name', DB::raw('COUNT(Keys.product_id) as product_key'))
       ->groupBy('categories.id')
       ->pluck('product_key');
       //dd($key);
    //    $user_google=User::whereNotNull('google_id')->count();
    //    $user_normal=User::whereNull('google_id')->count();
    $normal_user=User::where('role',0)->count();
    $admin_user=User::where('role',1)->count();
    $users=array($normal_user,$admin_user);
    $productsCount=Product::count();
    $sales=Key::where('status','bought')->get()->count();
      // dd($user_normal);
       return view('admin.dashboard',['sales'=>$sales,'productsCount'=>$productsCount,"products"=>$products,"keys"=>$key,'roles'=>3,"admin_user"=>$admin_user,"normal_user"=>$normal_user]);

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

    public function products(Type $var = null)
    {
     return view('admin.product');
    }
    public function add(Type $var = null)
    {
        $category=Category::get();
        return view('admin.addProduct',["categories"=>$category]);
    }
    public function storeProduct(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'bail|required|between:3,20|',
            'category'=>'bail|required|',
            'old_price'=>'bail|required|',
            'new_price'=>'bail|required|',
            'file'=>'bail|required|'
        ]);
        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        } 
            $image = base64_encode(file_get_contents($request->file('file')->Path()));

      
        $product=new Product;
        $product->name=$request->name;
        $product->category="";
        $product->category_id=$request->category;
        $product->old_price=$request->old_price;
        $product->new_price=$request->new_price;
        $product->pict=$image;
        if ($product->save()) {
            return redirect('/dashboard/products');

        }
    
    }
    public function type(Request $req)
    {
        $catName="";
        $category=$req->category;
        if (Category::find($category)) {
            $catName=Category::find($category)->name;
                }
        
        $products=Product::where('category_id',$category)->get();
       // dd($products);
      return view('admin.typeProduct',['products'=>$products,'category'=>$catName]);
}
    public function revenue(Type $var = null)
    {

          return view('admin.revenue');

    }
    public function revenueByYear(Type $var = null)
    {
        dd('year');
    }
    public function order(Type $var = null)
    {
       $orders=Order::all();
       
        
    return view('admin.order',["orders"=>$orders]);
}
    public function orderN(Type $var = null)
    {
    $orders=Order::all();
    foreach ($orders as $key => $order) {
        //dump($order->product->Keys->where('status','not_yet'));
        if (count($order->product->Keys->where('status','not_yet'))>0) {
            # code...
            $data=[
                "product_name"=>$order->product->name,
                'subject'=>"digatl product notification",
            ];
            try {
                Mail::to($order->user->email)->send(new MailNotify($data));
            } catch (\Throwable $th) {
                dump($th);
            }

        }
        //dump($order->user->email);
    }
    return response()->json(['message'=>"sent"], 200);
        
    }
    public function destroyP(Request $request)
        {
            dd($request);
        }
    public function add_key(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'key_id' => 'bail|required|unique:Keys,key',
            
        ]);
        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        } 
         $key= new Key;
        //  $key->status="not_yet";
         $key->key=$request->key_id;
         $key->product_id=$request->id;
        if ($key->save()) {
            $orders=Order::all();
        foreach ($orders as $key => $order) {
            //dump($order->product->Keys->where('status','not_yet'));
            if (count($order->product->Keys->where('status','not_yet'))>0) {
                # code...
                $data=[
                    "product_name"=>$order->product->name,
                    'subject'=>"digatl product notification",
                ];
                try {
                    Mail::to($order->user->email)->send(new MailNotify($data));
                } catch (\Throwable $th) {
                    dump($th);
                }

            }
            //dump($order->user->email);
        }
    
            return response()->json(['message' => $request->key_id]);
        }
    }
    public function add_account(Request $request){
        $validator = Validator::make($request->all(), [
            'email' => 'bail|required|email|unique:Keys,email',
            'password' => 'bail|required|',
            
        ]);
        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

            $key= new Key;
            //  $key->status="not_yet";
             $key->email=$request->email;
             $key->password=$request->password;
             $key->product_id=$request->id;
           if ($key->save()) {
            $orders=Order::all();
            foreach ($orders as $key => $order) {
                //dump($order->product->Keys->where('status','not_yet'));
                if (count($order->product->Keys->where('status','not_yet'))>0) {
                    $data=[
                        "product_name"=>$order->product->name,
                        'subject'=>"digatl product notification",
                    ];
                    try {
                        Mail::to($order->user->email)->send(new MailNotify($data));
                    } catch (\Throwable $th) {
                        dump($th);
                    }
                    
                }
            }
            return response()->json(['good' => "eeee"]);
        }


       
     }

    public function showP(Request $request,$id)
    {
      //  dd($id);
      $product=Product::find($id);
      //dd($product);
        return view('admin.show',["product"=>$product]);
    }
    public function showPost(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'bail|required|between:3,20|',
           // 'category'=>'bail|required|',
            'old_price'=>'bail|required|',
            'new_price'=>'bail|required|',
        ]);
        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        } 
        //dd("ee");

      
        $product=Product::find($request->id);
        $product->name=$request->name;
       // $product->category="";
        $product->category_id=$request->category;
        $product->old_price=$request->old_price;
        $product->new_price=$request->new_price;
        if ($request->hasFile('pict')) {
            $image = base64_encode(file_get_contents($request->file('pict')->Path()));
            $product->pict=$image;

        }
        //dd('eee');

        if ($product->save()) {
            //return redirect('/dashboard/products');
              return redirect()->back()->withErrors($validator)->withInput();
        }


    }
}
