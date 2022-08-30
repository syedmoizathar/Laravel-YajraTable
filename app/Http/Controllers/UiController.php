<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class UiController extends Controller
{
    public function index(Request $request){
        if ($request->ajax()) {
            // using eloquent model don't use get()
            $model = User::with('getContact')->orderby('id','ASC');

            return DataTables::eloquent($model)
                //adding index or s.no
                ->addIndexColumn()
                ->addColumn('user_number', function ($model) {
                    return $model->getContact->user_number;

                })
                ->addColumn('action', function($model){
                    //adding buttons to datatable
                    $btn = '<a href="view_'.$model->id.'" class="edit btn btn-primary btn-sm">View</a>
                        <a href="delete_'.$model->id.'" class="edit btn btn-danger btn-sm">Delete</a>';
                    return $btn;
                })
                ->toJson();
        }
        return view('home');
    }
}
