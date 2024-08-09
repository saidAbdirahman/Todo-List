<?php

namespace App\Http\Controllers;

use App\Models\Item;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ItemController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $items  = Item::orderBy('completed_at','DESC')->get();
        Return $items ;
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validate the request
        // $request->validate([
        //     'item.name' => 'required|string|max:255',
        // ]);
    
        // Create a new item
        $newItem = new Item;
        $newItem->name = $request->name;
        $newItem->save();
    
        // Return a JSON response with status code 201 (Created)
        return response()->json($newItem, 201);
    }
    

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
         // Find the existing item
    $existingItem = Item::findOrFail($id);

  
    if($existingItem){
        $existingItem->completed = $request->item['completed']?true:false;
        $existingItem->completed_at = $request->item['completed']?Carbon::now():null;
        $existingItem->save();
        // return response()->json(['message' => 'Item updated successfully'], 200);
        return $existingItem;
    }

  
    return "Item not found";
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $existingItem = Item::find($id);
        if($existingItem){
            $existingItem->delete();
            return "Item is deleted successfully";
        }
    }
}
