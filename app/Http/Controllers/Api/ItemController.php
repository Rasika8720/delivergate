<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\ManageItemRequest;
use App\Http\Requests\Api\RemoveItemRequest;
use App\Models\Item;
use Illuminate\Support\Facades\Auth;

class ItemController extends Controller
{
    public function addItem(ManageItemRequest $request){
        $user = Auth::user();
        if($user->hasPermissionTo('item.add')){
            $ob = $request->only('name', 'qty', 'price');
            Item::create($ob);

            return response()->json([
            'message' => 'Item Added Successfully'
            ]);
        }else{
            return response()->json([
             'message' => 'You are not authorized to add item'
            ], 401);
        }
    }

    public function editItem(ManageItemRequest $request){
        $user = Auth::user();
        if($user->hasPermissionTo('item.edit')){
            $ob = $request->only('name', 'qty', 'price');
            $item = Item::where('id',$request->id)->first();
            if(empty($item)){
                return response()->json([
                    'message' => 'Invalid input'
                   ], 404);
            }

            $item->update($ob);

            return response()->json([
            'message' => 'Item Updated Successfully'
            ]);
        }else{
            return response()->json([
             'message' => 'You are not authorized to Edit item'
            ], 401);
        }
    }

    public function removeItem(RemoveItemRequest $request){
        $user = Auth::user();
        if($user->hasPermissionTo('item.remove')){

            $item = Item::where('id',$request->id)->first();
            if(empty($item)){
                return response()->json([
                    'message' => 'Invalid input'
                   ], 404);
            }

            $item->delete();

            return response()->json([
            'message' => 'Item Deleted Successfully'
            ]);
        }else{
            return response()->json([
             'message' => 'You are not authorized to remove item'
            ], 401);
        }
    }
}
