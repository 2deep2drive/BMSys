<?php

namespace App\Http\Controllers;

use App\Models\Catagory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Yajra\DataTables\Facades\DataTables;

class CatagoriesController extends Controller
{
    /**
     *  Fill the Update form through Ajax Request
     */
    public function info(Catagory $catagory)
    {
        return response()->json(['details' => $catagory]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('catagory.index');
    }
    /**
     *  Loading DataTables Data through Ajax Request
     */
    public function getdata()
    {
        $catagory = Catagory::all();
        return DataTables::of($catagory)
            ->addColumn('Actions', function ($row) {
                return '<div class="btn-group" role="group" aria-label="Basic mixed styles example">
                    <button type="button" class="btn btn-theme-success"data-toggle="modal" data-target="#modal-update-catagory" id="modal-btn-update-catagory" data-id="' . $row['id'] . '">Update</button>
                    <button type="button" class="btn btn-theme-danger"data-toggle="modal" data-target="#modal-delete-catagory" id="modal-btn-delete-catagory" data-id="' . $row['id'] . '">Delete</button>
                  </div>';
            })
            ->addColumn('Checkbox', function ($row) {
                return '<div class="form-check">
                <input class="form-check-input" type="checkbox" name="checkedSingle" id="" data-id="' . $row['id'] . '">
                <label>
                </label>
              </div>';
            })
            ->addColumn('created_at', function ($row) {
                return $row->created_at->format('d-M-Y');
            })
            ->addColumn('updated_at', function ($row) {
                return $row->updated_at->format('d-M-Y');
            })
            ->rawColumns(['Actions', 'Checkbox', 'created_at', 'updated_at'])
            ->make(true);
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        /**
         * Basic Validation Checks
         */
        $validator = Validator::make($request->all(), [
            "title" => "required|array",
            "title.*" => "required|distinct|max:20|unique:catagories,title",

        ]);
        /**
         *  Storing Data into a DataBase using Some Logics
         */
        if ($validator->fails()) {
            /**
             *  if there is some error @return \ error response with ERROR CODE '0'
             */
            return response()->json(['code' => 0, 'error' => $validator->errors()->toArray()]);
        } else {
            /**
             *  if everything is good, we can proceed to store
             */
            $errors = [];
            $input = array_flip($request->input('title'));
            $input = array_change_key_case($input, CASE_LOWER);
            $title = array_flip($input);
            foreach ($title as $value) {
                $catagory = new Catagory;
                $catagory->title = Str::title($value);
                $catagory->metatitle = Str::slug(Str::lower($value));
                $query = $catagory->save();
                if (!$query) {
                    // return response()->json(['code' => 0, 'msg' => 'Something went wrong']);
                    $errors[] = ['error' => 'Something went wrong'];
                } else {
                    $errors[] = ['success' => ' Sucessfully Created '];
                }
            }
            foreach ($errors as $value) {
                // dd($value);
                foreach ($value as $key => $val) {
                    if ($key == 'success') {
                        return response()->json(['code' => 1, 'msg' => $val]);
                        // return 1;
                    } elseif ($key == 'error') {
                        return response()->json(['code' => 0, 'error' => $val]);
                        // return 0;
                    }
                }

            }
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Catagory  $catagory
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Catagory $catagory)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required|unique:tags',
            'metatitle' => 'required',

        ]);

        if ($validator->fails()) {
            return response()->json(['code' => 0, 'error' => $validator->errors()->toArray()]);
        } else {
            $catagory->title = $request->input('title');
            $catagory->metatitle = $request->input('metatitle');
            $query = $catagory->save();
            if (!$query) {
                return response()->json(['code' => 0, 'msg' => 'Something went wrong']);
            } else {
                return response()->json(['code' => 1, 'msg' => 'Tags Updated Successfully']);
            }
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Catagory  $catagory
     * @return \Illuminate\Http\Response
     */
    public function destroy(Catagory $catagory)
    {
        $query = $catagory->delete();
        if (!$query) {
            return response()->json(['code' => 0, 'msg' => 'Something went wrong']);
        } else {
            return response()->json(['code' => 1, 'msg' => 'Tags Deleted Successfully']);
        }
    }
    /**
     *  Delete All the specified resource in storage.
     */
    public function deleteAll(Request $request)
    {
        $id = $request->id;

        $query = Catagory::whereIn('id', $id)->delete();
        if (!$query) {
            return response()->json(['code' => 0, 'msg' => 'Something went wrong']);
        } else {
            return response()->json(['code' => 1, 'msg' => 'Tags Deleted Successfully']);
        }
    }
}
