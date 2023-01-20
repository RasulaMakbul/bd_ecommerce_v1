<?php

namespace App\Http\Controllers;

use App\Http\Requests\MakeupSubCategoriesRequest;
use App\Models\Makeup;
use App\Models\MakeupSubCategory;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;

class MakeupSubCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $makeupSubCategories = MakeupSubCategory::latest()->paginate(15);
        return view('makeupSubCategory.index', compact('makeupSubCategories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $makeups = Makeup::all();
        return view('makeupSubCategory.create', compact('makeups'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(MakeupSubCategoriesRequest $makeupSubCategoriesRequest)
    {
        // dd($makeupSubCategoriesRequest);

        $fileName = $this->uploadImage($makeupSubCategoriesRequest->File('image'));
        $requestData = ([
            'title' => $makeupSubCategoriesRequest->title,
            'makeup_id' => $makeupSubCategoriesRequest->makeup_id,
            'description' => $makeupSubCategoriesRequest->description,
            'is_active' => $makeupSubCategoriesRequest->is_active ? true : false,
            'images' => $fileName
        ]);
        MakeupSubCategory::create($requestData);


        return redirect()->back()->withMessage('Successfully Created');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\MakeupSubCategory  $makeupSubCategory
     * @return \Illuminate\Http\Response
     */
    public function show(MakeupSubCategory $makeupSubCategory)
    {
        // dd($makeupSubCategory->makeupProduct);
        return view('makeupSubCategory.show', compact('makeupSubCategory'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\MakeupSubCategory  $makeupSubCategory
     * @return \Illuminate\Http\Response
     */
    public function edit(MakeupSubCategory $makeupSubCategory)
    {
        $makeups = Makeup::all();
        return view('makeupSubCategory.edit', compact('makeups', 'makeupSubCategory'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\MakeupSubCategory  $makeupSubCategory
     * @return \Illuminate\Http\Response
     */
    public function update(MakeupSubCategoriesRequest $makeupSubCategoriesRequest, MakeupSubCategory $makeupSubCategory)
    {

        $requestData = [
            'title' => $makeupSubCategoriesRequest->title,
            'makeup_id' => $makeupSubCategoriesRequest->makeup_id,
            'description' => $makeupSubCategoriesRequest->description,
            'is_active' => $makeupSubCategoriesRequest->is_active ? true : false,

        ];
        if ($makeupSubCategoriesRequest->hasFile('image')) {
            $requestData['image'] = $this->uploadImage($makeupSubCategoriesRequest->file('image'));
        }

        $makeupSubCategory->update($requestData);


        return redirect()->route('makeupSubCategory.index')->withMessage('Successfully Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\MakeupSubCategory  $makeupSubCategory
     * @return \Illuminate\Http\Response
     */
    public function destroy(MakeupSubCategory $makeupSubCategory)
    {
        $makeupSubCategory->delete();
        return back()->withMessage('Successfully deleted');
    }
    public function trash()
    {
        $makeupSubCategories = MakeupSubCategory::onlyTrashed()->get();
        return view('makeupSubCategory.trash', compact('makeupSubCategories'));
    }

    public function restore($id)
    {
        $makeupSubCategory = MakeupSubCategory::onlyTrashed()->find($id);
        $makeupSubCategory->restore();

        return redirect()
            ->route('makeupSubCategory.trash')
            ->withMessage('Successfully restored');
    }

    public function delete($id)
    {
        try {
            $makeupSubCategory = MakeupSubCategory::onlyTrashed()->find($id);
            $makeupSubCategory->forceDelete();

            return redirect()
                ->route('makeupSubCategory.trash')
                ->withMessage('Successfully deleted');
        } catch (QueryException $e) {
            return redirect()->back()->withErrors($e->getMessage());
        }
    }

    public function active($id)
    {
        // dd($id);
        $makeupSubCategory = MakeupSubCategory::find($id);
        $makeupSubCategory->is_active = 1;
        $makeupSubCategory->update();
        return back();
    }
    public function inactive($id)
    {
        // dd($id);
        $makeupSubCategory = MakeupSubCategory::find($id);
        $makeupSubCategory->is_active = 2;
        $makeupSubCategory->update();
        return back();
    }

    public function uploadImage($image)
    {
        $originalName = $image->getClientOriginalName();
        $fileName = date('Y-m-d') . time() . $originalName;
        $image->move(storage_path('/app/public/makeupSubCategory'), $fileName);

        #Image::make($image)->resize(200, 200)->save(storage_path() . '/app/public/categories' . $fileName);
        return $fileName;
    }
}
