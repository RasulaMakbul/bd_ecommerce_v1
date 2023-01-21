<?php

namespace App\Http\Controllers;

use App\Models\makeupProduct;
use App\Http\Requests\StoremakeupProductRequest;
use App\Http\Requests\UpdatemakeupProductRequest;
use App\Models\Makeup;
use App\Models\MakeupColorp;
use App\Models\MakeupSubCategory;
use Illuminate\Database\QueryException;

class MakeupProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = makeupProduct::latest()->paginate(15);
        return view('backend.makeupProduct.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $makeups = Makeup::all();
        $makeupSubCategories = MakeupSubCategory::all();
        return view('backend.makeupProduct.create', compact('makeups', 'makeupSubCategories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoremakeupProductRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoremakeupProductRequest $request)
    {
        // dd($request);
        $requestData = [
            'title' => $request->title,
            'code' => $request->code,
            'shortDefination' => $request->shortDefination,
            'description' => $request->description,
            'test' => $request->test,
            'result' => $request->result,
            'howToUse' => $request->howToUse,
            'pack' => $request->pack,
            'ingredient' => $request->ingredient,
            'weight' => $request->weight,
            'pao' => $request->pao,
            'origin' => $request->origin,
            'makeup_id' => $request->makeup_id,
            'makeup_sub_category_id' => $request->makeup_sub_category_id,
            'is_active' => $request->is_active ? true : false,
        ];

        $images = [];
        foreach ($request['images'] as $image) {
            $originalName = $image->getClientOriginalName();
            $fileName = date('Y-m-d') . time() . $originalName;
            $image_path =  $image->storeAs('images', $fileName, 'public');

            array_push($images, $image_path);
        }

        $requestData['images'] = $images;

        makeupProduct::create($requestData);
        return redirect()->back()->withMessage('Successfully Created!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\makeupProduct  $makeupProduct
     * @return \Illuminate\Http\Response
     */
    public function show(makeupProduct $makeupProduct)
    {
        // dd($makeupProduct);
        return view('backend.makeupProduct.show', compact('makeupProduct'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\makeupProduct  $makeupProduct
     * @return \Illuminate\Http\Response
     */
    public function edit(makeupProduct $makeupProduct)
    {
        $makeups = Makeup::all();
        $makeupSubCategories = MakeupSubCategory::all();
        return view('backend.makeupProduct.edit', compact('makeups', 'makeupSubCategories', 'makeupProduct'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatemakeupProductRequest  $request
     * @param  \App\Models\makeupProduct  $makeupProduct
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatemakeupProductRequest $request, makeupProduct $makeupProduct)
    {
        $requestData = [
            'title' => $request->title,
            'code' => $request->code,
            'shortDefination' => $request->shortDefination,
            'description' => $request->description,
            'test' => $request->test,
            'result' => $request->result,
            'howToUse' => $request->howToUse,
            'pack' => $request->pack,
            'ingredient' => $request->ingredient,
            'weight' => $request->weight,
            'pao' => $request->pao,
            'origin' => $request->origin,
            'makeup_id' => $request->makeup_id,
            'makeup_sub_category_id' => $request->makeup_sub_category_id,
            'is_active' => $request->is_active ? true : false,
        ];

        if ($request->hasFile('images')) {

            $images = [];
            foreach ($request['images'] as $image) {
                $originalName = $image->getClientOriginalName();
                $fileName = date('Y-m-d') . time() . $originalName;
                $image_path =  $image->storeAs('images', $fileName, 'public');

                array_push($images, $image_path);
            }


            $requestData['images'] = $images;
        }

        $makeupProduct->update($requestData);
        return redirect()->route('makeupProduct.index')->withMessage('Successfully Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\makeupProduct  $makeupProduct
     * @return \Illuminate\Http\Response
     */
    public function destroy(makeupProduct $makeupProduct)
    {
        $makeupProduct->delete();
        return back();
    }
    public function trash()
    {
        $makeupProduct = makeupProduct::onlyTrashed()->get();
        return view('backend.makeupProduct.trash', compact('makeupProduct'));
    }

    public function restore($id)
    {
        $makeupProduct = makeupProduct::onlyTrashed()->find($id);
        $makeupProduct->restore();

        return redirect()
            ->route('makeupProduct.trash')
            ->withMessage('Successfully restored');
    }

    public function delete($id)
    {
        try {
            $makeupProduct = makeupProduct::onlyTrashed()->find($id);
            $makeupProduct->forceDelete();

            return redirect()
                ->route('makeupProduct.trash')
                ->withMessage('Successfully deleted');
        } catch (QueryException $e) {
            return redirect()->back()->withErrors($e->getMessage());
        }
    }

    public function active($id)
    {
        // dd($id);
        $makeupProduct = makeupProduct::find($id);
        $makeupProduct->is_active = 1;
        $makeupProduct->update();
        return back();
    }
    public function inactive($id)
    {
        // dd($id);
        $makeupProduct = makeupProduct::find($id);
        $makeupProduct->is_active = 2;
        $makeupProduct->update();
        return back();
    }

    public function uploadImage($image)
    {

        $originalName = $image->getClientOriginalName();
        $fileName = date('Y-m-d') . time() . $originalName;
        $image->move(storage_path('/app/public/makeupProduct'), $fileName);

        #Image::make($image)->resize(200, 200)->save(storage_path() . '/app/public/categories' . $fileName);
        return $fileName;
    }
}
