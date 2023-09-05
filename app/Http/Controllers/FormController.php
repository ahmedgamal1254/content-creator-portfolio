<?php

namespace App\Http\Controllers;

use App\Models\{Form,User};
use Illuminate\Http\Request;
use Auth;
use Illuminate\Support\Facades\DB;

class FormController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $reports=DB::select('select * from forms where user_id = ?', [Auth::guard('web')->user()->id]);

        return view("our-reports",compact("reports"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("form");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $content=[];
        foreach ($request->all() as $key => $value) {
            if (preg_match('/^content_(\d+)_(.*)$/', $key, $matches)) {
                if (is_array($value)) {
                    $content[$key]=implode(', ', $value);
                } else {
                    $content[$key]=$value;
                }
            }
        }

        $string = json_encode($content);

        $content=new Form();
        $content->days_of_week=$request->days_of_week;
        $content->history=$request->history;
        $content->number_of_posts_per_day=$request->number_of_posts_per_week;
        $content->content=$string;
        $content->user_id=Auth::guard('web')->user()->id;
        $content->save();

        return redirect()->route("home");
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $reports=Form::find($id);

        $data=json_decode($reports["content"],true);

        // Split the array into chunks of 7 elements
        $chunks = array_chunk($data, 7);

        return view("content",compact("chunks"));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Form $form)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Form $form)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Form $form)
    {
        //
    }
}
