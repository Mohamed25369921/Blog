<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Traits\UploadImage;
use App\Models\Category;
use Illuminate\Http\Request;
use DataTables;


class CategoryController extends Controller
{
    use UploadImage;

    protected $category;

    public function __construct(Category $category)
    {
        $this->category = $category;
    }

    
    public function index()
    {
        return view('dashboard.categories.index');
    }

    public function getCategoriesDatatable(){
        $categories = Category::select('*')->with('parents');
        return Datatables::of($categories)
        ->addIndexColumn()
        ->addColumn('title', function ($row) {
           return $row->translate(app()->getLocale())->title;
        })
        ->addColumn('parent', function ($row) {
            return ($row->parent ==  0 ) ? trans('words.main category') : $row->parents->translate(app()->getLocale())->title;
        })
        ->addColumn('action', function ($row) {
            if (auth()->user()->can('view',$row)) {
                return $btn = '
                <a href="' . Route('dashboard.categories.edit', $row->id) . '"  class="edit btn btn-success btn-sm" ><i class="fa fa-edit"></i></a>
                <a id="deleteBtn" data-id="' . $row->id . '" class="edit btn btn-danger btn-sm"  data-toggle="modal" data-target="#deletemodal"><i class="fa fa-trash"></i></a>';
            }
           
        })
        
        ->rawColumns(['title','parent','action'])
        ->make(true);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->authorize('create',$this->category);
        $categories = Category::whereNull('parent')->orWhere('parent',0)->get();
        return view('dashboard.categories.add',compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->authorize('update',$this->category);
        $data = [
            'image' => 'nullable|image|mimes:png,jpg,jpeg,svg,gif|max:2048',
            'parent' => 'required',
        ];

        foreach (config('app.languages') as $key => $val) {
            $data[$key.'*.title'] = 'nullable|string';
            $data[$key.'*.content'] = 'nullable|string';
        }
        $validated_data = $request->validate($data);
        $category = Category::create($request->except('image','_token'));

        if ($request->has('image')) {
            $path = $this->upload($request->image);
            $category->update(['image' => $path]);
        }
        return redirect()->route('dashboard.categories.index');
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
    public function edit(Category $category)
    {
        $this->authorize('update',$this->category);

        $categories = Category::whereNull('parent')->orWhere('parent',0)->get();
        return view('dashboard.categories.edit',compact('category','categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category)
    {
        $this->authorize('update',$this->category);
        
        $data = [
            'image' => 'nullable|image|mimes:png,jpg,jpeg,svg,gif|max:2048',
            'parent' => 'required',
        ];
        
        foreach (config('app.languages') as $key => $val) {
            $data[$key.'*.title'] = 'nullable|string';
            $data[$key.'*.content'] = 'nullable|string';
        }
        $request->validate($data);
        $category->update($request->except('image','_token'));

        if ($request->has('image')) {
            $file = $request->file('image');
            $file_name = $file->getClientOriginalName();
            $file->move(public_path('images'),$file_name);
            $path = 'images/'.$file_name;
            $category->update(['image' => $path]);
        }
        return redirect()->route('dashboard.categories.index');

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

    public function delete(Request $request)
    {
        $this->authorize('delete',$this->category);

        if (is_numeric($request->id)) {
            Category::where('parent',$request->id)->delete();
            Category::find($request->id)->delete();
        }
        return redirect()->route('dashboard.categories.index');
    }
}
