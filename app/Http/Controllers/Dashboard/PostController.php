<?php

namespace App\Http\Controllers\Dashboard;

use App\DataTables\PostDatatable;
use App\Http\Controllers\Controller;
use App\Http\Controllers\GeneralController;
use App\Http\Requests\General\MultiDelete;
use App\Http\Requests\PostRequest;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends GeneralController
{
    protected $viewPath = 'post.';
    protected $path = 'post';
    private $route = 'posts';
    protected $paginate = 30;
    private $image_path = 'posts';


    public function __construct(Post $model)
    {
        parent::__construct($model);
    }

    public function index(PostDatatable $dataTable)
    {
        return $dataTable->render('dashboard.' . $this->viewPath . '.index');
    }

    public function create()
    {
        return view('dashboard.' . $this->viewPath . '.create');
    }

    public function store(PostRequest $request)
    {
        $data = $request->validated();
        if ($request->image) {
            if ($request->hasFile('image')) {
                $data['image'] = $this->uploadImage($request->file('image'), $this->image_path,);
            }
        }
        $this->model::create($data);
        return redirect()->route($this->route)->with('success', 'تم الاضافه بنجاح');
    }

    public function show($id)
    {
        $data = $this->model::with('Details')->findOrFail($id);
        return view('dashboard.' . $this->viewPath . '.details', compact('data'));
    }

    public function edit($id)
    {
        $data = $this->model::findOrFail($id);

        return view('dashboard.' . $this->viewPath . '.edit', compact('data'));
    }

    public function update(PostRequest $request, $id)
    {
        $data = $request->validated();
        $item = $this->model->findOrFail($id);

        if ($request->hasFile('image')) {
            $data['image'] = $this->uploadImage($request->file('image'), $this->image_path, $item->image);
        }
        $item = $this->model->findOrFail($id);
        if ($request->password == null) {
            unset($data['password']);
        }
        $item->update($data);
        return redirect()->route($this->route)->with('success', 'تم التعديل بنجاح');
    }

    public function delete(Request $request, $id)
    {
        $data = $this->model::findOrFail($id);
        $data->delete();
        return redirect()->back()->with('success', 'تم الحذف بنجاح');
    }

    public function deletes(MultiDelete $request)
    {
        try {
            // Get Inputs Data From Request
            $data = $request->validated();
            // Get Items Selected
            $items = $this->model->whereIn('id', $data['data']);
            // Check If Not Have Count Items Or Check If User Delete Yourself
            if (!$items->count()) {
                return redirect()->back()->with('danger', 'يجب اختيار عنصر علي الافل');

            }
            // Get & Delete Data Selected
            $items->delete();
            return redirect()->back()->with('success', 'تم الحذف بنجاح');
        } catch (\Exception $e) {

            return redirect()->back()->with('danger', 'لا يمكنك الحذف');
        }
    }


}
