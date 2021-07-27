<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Request as RequestRequest;
use App\Product;
use App\Request as RequestModal;
use App\User;

class RequestController extends Controller
{
    public function index()
    {
        $requests = RequestModal::with('ownerObject', 'acquirerObject')->orderBy('id', 'DESC')->get();

        return view('admin.requests.index', [
            'requests' => $requests
        ]);
    }

    public function create()
    {
        $admins = User::admins();
        $clients = User::clients();
        $products = Product::products();
        return view('admin.requests.create', [
            'admins' => $admins,
            'clients' => $clients,
            'products' => $products,
        ]);
    }

    public function store(RequestRequest $request)
    {
        $requestCreate = RequestModal::create($request->all());

        return redirect()->route('admin.requests.edit', [
            'request' => $requestCreate->id
        ])->with(['color' => 'green', 'message' => 'Pedido cadastrado com sucesso!']);
        // $request = new Request();
        // $request->fill($request->all());
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $request = RequestModal::where('id', $id)->first();

        return view('admin.requests.edit', [
            'request' => $request,
        ]);
    }

    public function update(RequestRequest $requestrequest, $id)
    {
        $request = RequestModal::where('id', $id)->first();
        $request->fill($requestrequest->all());
        $request->save();

        if ($requestrequest->status == 'active' && $requestrequest->product) {
            $product = Product::where('id', $requestrequest->product)->first();

            if ($requestrequest->product) {
                $product->status = 0;
                $product->save();
            } else {
                $product->status = 1;
                $product->save();
            }
        }

        return redirect()->route('admin.requests.edit', [
            'request' => $request->id
        ])->with(['color' => 'green', 'message' => 'Contrato editado com sucesso!']);
    }

    public function destroy($id)
    {
        //
    }

    public function getDataOwner(Request $request)
    {
        $admin = User::where('id', $request->user)->first([
            'id',
        ]);

        if (empty($admin)) {
            $products = null;
        } else {

            $getProducts = $admin->products()->get();
            $product = [];

            foreach ($getProducts as $product) {
                $products[] = [
                    'id' => $product->id,
                    'description' => '#' . $product->id . ' ' . $product->street . ', ' .
                        $product->number . ' ' . $product->neighborhood . ' ' .
                        $product->city . '/' . $product->state . ' (' . $product->zipcode . ')'
                ];
            }
        }

        $json['products'] = (!empty($products) ? $products : null);

        return response()->json($json);
    }

    public function getDataAcquirer(Request $request)
    {
        $client = User::where('id', $request->user)->first([
            'id',
        ]);
        $json['id'] = $client;
        return response()->json($json);
    }

    public function getDataProduct(Request $request)
    {
        $product = Product::where('id', $request->product)->first();
        dd($product);
        if (empty($product)) {
            $product = null;
        } else {
            $product = [
                'id' => $product->id,
                'sale_price' => $product->sale_price,
                'promotion_price' => $product->promotion_price,
            ];
        }

        

        $json['product'] = $product;
        return response()->json($json);
    }
}
