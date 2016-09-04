<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use DB;
use App\Model\headers;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Paginator;

class Header extends Controller
{
    public function getForm(){
        return view('header.form1');
    }

    public function store(Request  $data)
    {
        $rules = array(
            'title' => 'required',
            'sub_title' => 'required',
            'image' => 'required|mimes:jpg,jpeg',
        );

        $validator = Validator::make($data->all(), $rules);

        if ($validator->fails()) {

            // get the error messages from the validator
            $messages = $validator->messages();

            return Redirect::to('form1')->withErrors($validator);

        } else {

            $logo = $data->file('image');
            $upload = 'uploads/logo';
            $filename = $logo->getClientOriginalName();
            $success = $logo->move($upload, $filename);

            if($success) {

                $table = new headers;
                $table->title = $data->input('title');
                $table->sub_title = $data->input('sub_title');
                $table->image = $filename;
                $table->save();
                return Redirect::to('form1')->with('submitmsg', 'Submitted Successfully!');
            }

        }
    }

    public  function display(){
        $model = headers::all();
        return view('header.show')->with('datas',$model);
    }

    public function editData($id){
        $edit = headers::find($id);
        return view('header.edit')->with('datas',$edit);
    }

    public function updateData(Request $data, $id ){

        $rules = array(
            'image' => 'required|mimes:jpg,jpeg',
        );

        $validator = Validator::make($data->all(), $rules);

        if ($validator->fails()) {

            // get the error messages from the validator
            $messages = $validator->messages();

            return Redirect::to('editform/'.$id)->withErrors($validator);

        } else {

            $logo = $data->file('image');
            $upload = 'uploads/logo';
            $filename = $logo->getClientOriginalName();
            $success = $logo->move($upload, $filename);

            if($success) {

                $table = new headers;
                $table = array(
                    'title' => $data->input('title'),
                    'sub_title' => $data->input('sub_title'),
                    'image' => $filename,
                );
                headers::where('id', $id)->update($table);
                return Redirect::to('show')->with('updatemsg', 'Update Successfully!');
            }

        }

    }

    public function deleteData($id){
        $model = headers::find($id);
        $model->delete();
        return Redirect::to('show')->with('deletemsg','Data has been deleted successfully');
    }
}
