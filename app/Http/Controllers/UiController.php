<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class UiController extends Controller
{
    public function index(Request $request)
    {
//        $model = User::with('getContact','getFees')->get();
//        $model = User::with(['getContact' => function ($query1) {
//            $query1->first();
//        }])->with(['getFees' => function ($query2) {
//            $query2->first();
//        }])->get();
//dd($model[0]->getContact);
        if ($request->ajax()) {
            // using eloquent model don't use get()
            $model = User::with('getContact', 'getFees')->orderby('id', 'ASC');

            return DataTables::eloquent($model)
                //adding index or s.no
                ->addIndexColumn()
                //contact
                ->addColumn('user_number', function ($model) {
                    return empty($model->getContact) ? '' : $model->getContact->user_number;
                })
                ->addColumn('contact_status', function ($model) {
                    if($model->getContact){
                        return $model->status === 1 ? 'Active' : 'Inactive';
                    }else{
                        return '';
                    }
                })
                ->addColumn('contact_created_at', function ($model) {
                    return empty($model->getContact) ? '' : $model->getContact->created_at->format('d-m-Y');
                })
                ->filterColumn('contact_created_at', function ($query, $keyword) {
                    $query->whereRaw("DATE_FORMAT(contact_created_at,'%d-%m-%Y') like ?", ["%$keyword%"]);
                })
                //fees
                ->addColumn('fees_price', function ($model) {
                    return empty($model->getFees) ? '' : $model->getFees->price;
                })
                ->editColumn('fees_price', function ($model) {
                    return empty($model->getFees) ? '' : "$" . $model->getFees->price;
                })
                //main
                ->editColumn('status', function ($model) {
                    return $model->status === 1 ? 'Succeeded' : 'Pending';
//                    if ($model->status === 1) {
//                        return "Succeeded";
//                    } else {
//                        return "Pending";
//                    }
                })
                ->addColumn('action', function ($model) {
                    //adding buttons to datatable
                    $btn = '<a href="view_' . $model->id . '" class="edit btn btn-primary btn-sm">View</a>
                        <a href="delete_' . $model->id . '" class="edit btn btn-danger btn-sm">Delete</a>';
                    return $btn;
                })
                ->toJson();
        }
        return view('home');
    }
}
