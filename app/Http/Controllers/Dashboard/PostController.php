<?php

namespace App\Http\Controllers\Dashboard;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Traits\UploadImage;
use App\Models\Category;
use App\Models\Post;
use DataTables;
use Hamcrest\Type\IsNumeric;

class PostController extends Controller
{

    use UploadImage;
    protected $postModel;

    public function __construct(Post $post)
    {
        $this->postModel = $post;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.posts.index');
    }

    public function getPostsDatatable()
    {
        $posts = Post::select('*')->with('category');
        return Datatables::of($posts)
            ->addIndexColumn()
            ->addColumn('title', function ($row) {
                return $row->translate(app()->getLocale())->title;
            })
            ->addColumn('category_name', function ($row) {
                return $row->category->translate(app()->getLocale())->title;
            })
            ->addColumn('action', function ($row) {
                if (auth()->user()->can('update', $row)) {

                    return $btn = '
                     <a href="' . Route('dashboard.posts.edit', $row->id) . '"  class="edit btn btn-success btn-sm" ><i class="fa fa-edit"></i></a>
                     <a id="deleteBtn" data-id="' . $row->id . '" class="edit btn btn-danger btn-sm"  data-toggle="modal" data-target="#deletemodal"><i class="fa fa-trash"></i></a>';
                }
            })
            ->rawColumns(['title', 'category_name', 'action'])
            ->make(true);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        if (count($categories) > 0) {
            return view('dashboard.posts.add', compact('categories'));
        }
        return redirect()->route('dashboard.categories.create')->with(['error' => 'من فضلك قم بإدخال بعض الأقسام']);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = [
            'image' => 'nullable|image|mimes:png,jpg,jpeg,svg,gif|max:2048',
        ];

        foreach (config('app.languages') as $key => $val) {
            $data[$key . '*.title'] = 'nullable|string';
            $data[$key . '*.content'] = 'nullable|string';
            $data[$key . '*.smallDesc'] = 'nullable|string';
        }
        $request->validate($data);

        $post = Post::create($request->except('image', '_token'));

        if ($request->has('image')) {
            $path = $this->upload($request->image);
            $post->update(['image' => $path]);
        }
        return redirect()->route('dashboard.posts.index');
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
    public function edit(Post $post)
    {
        $this->authorize('update',$post);

        $categories = Category::all();;
        return view('dashboard.posts.edit', compact('categories', 'post'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        $this->authorize('update',$post);

        $data = [
            'image' => 'nullable|image|mimes:png,jpg,jpeg,svg,gif|max:2048',
        ];

        foreach (config('app.languages') as $key => $val) {
            $data[$key . '*.title'] = 'nullable|string';
            $data[$key . '*.content'] = 'nullable|string';
            $data[$key . '*.smallDesc'] = 'nullable|string';
        }
        $request->validate($data);

        $post->update($request->except('image', '_token'));

        if ($request->has('image')) {
            $path = $this->upload($request->image);
            $post->update(['image' => $path]);
        }
        return redirect()->route('dashboard.posts.index');
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
        $this->authorize('delete',$this->postModel->find($request->id));

        if (is_numeric($request->id)) {
            Post::find($request->id)->delete();
        }
        return redirect()->route('dashboard.posts.index');
    }
}
