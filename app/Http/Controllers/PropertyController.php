<?php

namespace App\Http\Controllers;

use App\Http\Requests\PropertyContactRequest;
use App\Http\Requests\SearchPropertiesRequest;
use App\Mail\PropertyContactMail;
use App\Models\Property;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class PropertyController extends Controller
{
    public function index(SearchPropertiesRequest $request){

        $query = Property::query()->orderBy('created_at', 'desc');

        if($request->validated('price')){
            $query = $query->where('price', '<=', $request->validated('price'));	
        }
        if($request->validated('surface')){
            $query = $query->where('surface', '>=', $request->validated('surface'));	
        }
        if($request->validated('rooms')){
            $query = $query->where('rooms', '>=', $request->validated('rooms'));	
        }
        if($request->validated('title')){
            $query = $query->where('title', 'like', "%{$request->validated('title')}%");	
        }
        return view("property.index", [
            'properties' => $query->paginate(16),
            'input' => $request->validated()
        ]);
    }

    public function show(String $slug, Property $property){
        if($slug != \Str::slug($property->title)){
            return to_route('property.show', [
                'slug'=> $slug,
                'property' => $property
            ]);
        } else {
            return view('property.show', [
                'property' => $property
            ]);
        }
    }

    public function contact(Property $property, PropertyContactRequest $request){
        Mail::send(new PropertyContactMail($property, $request->validated()));
        return back()->with('success', 'Votre demande de contact à bien été envoyé');
    }
}
