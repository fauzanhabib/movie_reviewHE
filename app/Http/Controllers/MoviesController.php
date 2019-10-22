<?php

namespace App\Http\Controllers;
use App\Movies;
use App\Comment;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\DB;

class MoviesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $data = Movies::latest()->paginate(5);
       
        return view('list',compact('data'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate([
            'image' => 'required|image|max:5000',
        ]);

        $image = $request->file('image');
        $new_name = rand() . '.' . $image->getClientOriginalExtension();
        $image->move(public_path('images'), $new_name);
        
        $form_data = array(
            'name_movie' => $request->name_movie,
            'desc' => $request->desc,
            'image' => $new_name
        );
       // dd($form_data);
        Movies::create($form_data);

        return redirect('home')->with('success','Data add success');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
       
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = Movies::findOrFail($id);
        return view('view_edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
  

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Movies::findOrFail($id);
      //  dd($data);
        $data->delete();

        return redirect('list')->with('success', 'Data is successfully deleted');
    }

    public function update(Request $request, $id)
    {
        
        $image_name = $request->hidden_image;
        $image = $request->file('image');
        if($image != '')
        {
            $request->validate([
                'name_movie'    =>  'required',
                'desc'     =>  'required',
                'image'         =>  'image|max:2048'
            ]);

            $image_name = rand() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('images'), $image_name);
        }
        else
        {
            $request->validate([
                'name_movie'    =>  'required',
                'desc'     =>  'required'
            ]);
        }

        $form_data = array(
            'name_movie'       =>   $request->name_movie,
            'desc'        =>   $request->desc,
            'image'            =>   $image_name
        );
       // dd($form_data);
        Movies::whereId($id)->update($form_data);

        return redirect('list')->with('success', 'Data is successfully updated');
    }

    public function review_movie($id){

        $data = Movies::findOrFail($id);
        $data_comment = DB::select("select a.id, a.name_movie, a.desc, b.id_movie, b.desc_comment
                            from movies a 
                            LEFT JOIN comments b ON a.id = b.id_movie where a.id=$id");
        //dd($data);
        
        return view('review',compact('data','data_comment'));
    }

    public function comment(Request $request){
        //dd($request);
        $image_id = $request->id;

        $form_data = array(
            'id_movie' => $request->id,
            'desc_comment' => $request->comment,
          
        );
       // dd($form_data);
        Comment::create($form_data);
        return response()->json(['success'=>'Data is successfully added']);
        // return view('review', ['data_comment' => $form_data]);
    }   
}
