<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use DB;
use App\Model\students;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Paginator;

class Student extends Controller
{
    public function getForm()
    {
        return view('student.form');
    }

    public function store(Request  $data)
    {
        $rules = array(
            'first_name' => 'required| min:3|max:7',
            'last_name' => 'required| min:3|max:7',
            'address' => 'required| min:3|max:15',
        );

        $validator = Validator::make($data->all(), $rules);

        if ($validator->fails()) {

            // get the error messages from the validator
            $messages = $validator->messages();

            return Redirect::to('form')->withErrors($validator);

        } else {

            $table = new students;
            $table->first_name = $data->input('first_name');
            $table->last_name = $data->input('last_name');
            $table->address = $data->input('address');
            $table->save();
            return Redirect::to('form')->with('submitmsg','Submitted Successfully!');

        }
    }

    public function viewData(){

        $model = students::all();
        return view('student.view')->with('datas',$model);
    }

    public function editData($id){

        $edit = students::find($id);
        return view('student.edit')->with('datas',$edit);
    }

    public function updateData(Request $formdata, $id){

        $table = students::find($id);
        $table->first_name = $formdata->input('first_name');
        $table->last_name = $formdata->input('last_name');
        $table->address = $formdata->input('address');
        $table->save();
        return Redirect::to('view')->with('updatemsg','Data has been updated');

    }

    public function deleteData($id){
        $model = students::find($id);
        $model->delete();
        return Redirect::to('view')->with('deletemsg','Data has been deleted successfully');
    }
}
