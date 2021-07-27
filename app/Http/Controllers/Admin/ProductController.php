<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Product as ProductRequest;
use App\Product;
use App\ProductImage;
use App\Support\Cropper;
use App\User;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::orderBy('id', 'DESC')->get();
        return view('admin.products.index', [
            'products' => $products
        ]);
    }

    public function create()
    {
        $users = User::orderBy('name')->get();
        return view('admin.products.create', [
            'users' => $users
        ]);
    }

    public function store(ProductRequest $request)
    {
        $createProduct = Product::create($request->all());

        $createProduct->setSlug();

        $validator = Validator::make($request->only('files'), ['files.*' => 'mimes:jpeg,png,jpg,gif,svg']);

        if ($validator->fails() === true) {
            return redirect()->back()->withInput()->with([
                'color' => 'orange',
                'message' => 'Todas as imagens devem ser do tipo jpg, jpeg ou png.',
            ]);
        }

        if ($request->allFiles()) {
            foreach ($request->allFiles()['files'] as $image) {
                $productImage = new ProductImage();
                $productImage->product = $createProduct->id;
                $productImage->path = $image->store('products/' . $createProduct->id);
                $productImage->save();
                unset($productImage);
            }
        }

        return redirect()->route('admin.products.edit', [
            'product' => $createProduct->id,
        ])->with(['color' => 'green', 'message' => 'Produto cadastrado com sucesso!']);
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $product = Product::where('id', $id)->first();
        $users = User::orderBy('name')->get();

        return view('admin.products.edit', [
            'product' => $product,
            'users' => $users
        ]);
    }

    public function update(ProductRequest $request, $id)
    {
        $product = Product::where('id', $id)->first();
        $product->fill($request->all());

        $product->setWhiteAttribute($request->air_conditioning);
        $product->setBlackAttribute($request->bar);
        $product->setBlueAttribute($request->library);
        $product->setGreenAttribute($request->barbecue_grill);
        $product->setYellowAttribute($request->american_kitchen);
        $product->setRedAttribute($request->fitted_kitchen);
        $product->setPinkAttribute($request->pantry);
        $product->setPurpleAttribute($request->edicule);
        $product->setGrayAttribute($request->office);
        $product->setBrownAttribute($request->bathtub);
        $product->setBeigeAttribute($request->fireplace);
        $product->setSilverAttribute($request->lavatory);
        $product->setGoldenAttribute($request->furnished);

        $product->save();
        $product->setSlug();

        $validator = Validator::make($request->only('files'), ['files.*' => 'mimes:jpeg,png,jpg,gif,svg']);

        if($validator->fails() === true) {
            return redirect()->back()->withInput()->with(['color' => 'orange', 'message' => 'Todas as imagens devem ser do tipo jpg, jpeg ou png.']);
        }

        if($request->allFiles()) {
            foreach($request->allFiles()['files'] as $image) {
                $productImage = new ProductImage();
                $productImage->product = $product->id;
                $productImage->path = $image->store('products/' . $product->id);
                $productImage->save();
                unset($productImage);
            }
        }

        

        return redirect()->route('admin.products.edit', [
            'product' => $product->id
        ])->with(['color' => 'green', 'message' => 'Produto alterado com sucesso!']);
    }

    public function destroy($id)
    {
        //
    }

    public function imageSetCover(Request $request)
    {
        $imageSetCover = ProductImage::where('id', $request->image)->first();
        $allImage = ProductImage::where('product', $imageSetCover->product)->get();

        foreach ($allImage as $image) {
            $image->cover = null;
            $image->save();
        }

        $imageSetCover->cover = true;
        $imageSetCover->save();

        $json = [
            'success' => true
        ];

        return response()->json($json);
    }

    public function imageRemove(Request $request)
    {
        $imageDelete = ProductImage::where('id', $request->image)->first();

        Storage::delete($imageDelete->path);
        Cropper::flush($imageDelete->path);
        $imageDelete->delete();

        $json = [
            'success' => true
        ];
        return response()->json($json);
    }
}
