<?php

namespace App\Http\Controllers\Dashboard;

use App\DataTables\GovernemtDatatable;
use App\Http\Controllers\Controller;
use App\Http\Controllers\GeneralController;
use App\Http\Requests\GovernmentRequest;
use App\Models\Government;
use Illuminate\Http\Request;

class GovernmentController extends GeneralController
{
    protected $viewPath = 'government.';
    protected $path = 'government';
    private $route = 'governments';
    protected $paginate = 30;
    private $image_path = 'governments';


    public function __construct(Government $model)
    {
        parent::__construct($model);
    }

    public function index(GovernemtDatatable $dataTable)
    {
        return $dataTable->render('dashboard.' . $this->viewPath . '.index');
    }


    public function create()
    {
        return view('dashboard.' . $this->viewPath . '.create');
    }

    public function store(GovernmentRequest $request)
    {
        $data = $request->validated();
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

        $data['data'] = $this->model::findOrFail($id);
        return view('dashboard.' . $this->viewPath . '.edit', with($data));
    }

    public function update(GovernmentRequest $request, $id)
    {
        $data = $request->validated();
        $item = $this->model->findOrFail($id);
        $item->update($data);
        return redirect()->route($this->route)->with('success', 'تم التعديل بنجاح');
    }

    public function delete(Request $request, $id)
    {
        try {
            $data = $this->model::findOrFail($id);
            $data->delete();
            return redirect()->back()->with('success', 'تم الحذف بنجاح');
        } catch (\Exception $e) {

            return redirect()->back()->with('danger', 'لا يمكنك الحذف هنالك بيانات معتمده علي هذه المحاغظه');
        }
    }


}
