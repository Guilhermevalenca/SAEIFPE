<?php

namespace App\Http\Controllers;

use App\Http\Resources\DepositionsResource;
use App\Models\Depositions;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;

class DepositionsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $paginate= Depositions::orderByDesc('id')->paginate(5);
        $response = [
            'data'=> DepositionsResource::collection($paginate->items()),
            'lastPage'=> $paginate->lastPage(),
            'currentPage'=> $paginate->currentPage(),
        ];
//        return response($response, 200);
        return Inertia::render('depositions/Depositions',$response);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validate = $request->validate([
            'content'=>['required','string'],
            'picture.0'=>['nullable', 'image']
        ]);
        $validate['user_id'] = Auth::id();
       //if(array_key_exists("picture", $validate)){}
        $picture = $request->file('picture');

        $binary = file_get_contents($picture[0]->getRealPath());
        $json = [
            'base64' => base64_encode($binary),
            'mimeType' => $picture[0]->getMimeType()
        ];

        $img = 'data:' . $json['mimeType'] . ';base64,' . $json['base64'];
        $validate['picture'] = $img;

        Depositions::create($validate);
        return redirect()->route('depoimentos_mural');
    }

    /**
     * Display the specified resource.
     */
    public function show(Depositions $depositions)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Depositions $depositions)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Depositions $depositions)
    {
        //
    }
}
