<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Yajra\DataTables\Facades\DataTables;

class TagsController extends Controller
{

    /**
     *  Fill the Update form through Ajax Request
     */
    public function info(Tag $tag)
    {

        return response()->json(['details' => $tag]);
    }
    /**
     *  Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('tag.index');
    }
    /**
     *  Loading DataTables Data through Ajax Request
     */
    public function getdata()
    {
        $tag = Tag::all();
        return DataTables::of($tag)
            ->addColumn('Actions', function ($row) {
                return '<div class="btn-group" role="group" aria-label="Basic mixed styles example">
                    <button type="button" class="btn btn-theme-success"data-toggle="modal" data-target="#modal-update-tag" id="modal-btn-update-tag" data-id="' . $row['id'] . '">Update</button>
                    <button type="button" class="btn btn-theme-danger"data-toggle="modal" data-target="#modal-delete-tag" id="modal-btn-delete-tag" data-id="' . $row['id'] . '">Delete</button>
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
     * @c \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        /**
         * Basic Validation Checks
         */
        $validator = Validator::make($request->all(), [
            "title" => "required|array",
            "title.*" => "required|alpha|distinct|max:10|unique:tags,title",
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
            $title = array_change_key_case($input, CASE_LOWER);
            $title = array_flip($title);
            foreach ($title as $value) {
                $tag = new Tag;
                $tag->title = $value;
                $tag->metatitle = $value;
                $query = $tag->save();
                if (!$query) {
                    $errors[] = ['error' => 'Something went wrong'];
                } else {
                    $errors[] = ['success' => ' Sucessfully Created'];
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
     * @param  \App\Models\Tag  $tag
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Tag $tag)
    {
        /**
         * Basic Validation Checks
         */

        $validator = Validator::make($request->all(), [
            'title' => 'required|unique:tags',
            'metatitle' => 'required',

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
             *  if everything is good, we can proceed to update
             */
            $tag->title = $request->input('title');
            $tag->metatitle = $request->input('metatitle');
            $query = $tag->save();
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
     * @param  \App\Models\Tag  $tag
     * @return \Illuminate\Http\Response
     */
    public function destroy(Tag $tag)
    {
        $query = $tag->delete();
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

        $query = Tag::whereIn('id', $id)->delete();
        if (!$query) {
            return response()->json(['code' => 0, 'msg' => 'Something went wrong']);
        } else {
            return response()->json(['code' => 1, 'msg' => 'Tags Deleted Successfully']);
        }

    }
}
