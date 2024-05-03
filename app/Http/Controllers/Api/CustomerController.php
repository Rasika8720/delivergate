<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\ManageCustomerRequest;
use App\Http\Requests\Api\RemoveCustomerRequest;
use App\Models\Customer;
use Illuminate\Support\Facades\Auth;

class CustomerController extends Controller
{
    public function addCustomer(ManageCustomerRequest $request){
        $user = Auth::user();
        if($user->hasPermissionTo('customer.add')){
            $ob = $request->only('name', 'email', 'phone','address','history');
            Customer::create($ob);

            return response()->json([
            'message' => 'Customer Added Successfully'
            ]);
        }else{
            return response()->json([
             'message' => 'You are not authorized to add customer'
            ], 401);
        }
    }

    public function editCustomer(ManageCustomerRequest $request){
        $user = Auth::user();
        if($user->hasPermissionTo('customer.edit')){
            $ob = $request->only('name', 'email', 'phone','address','history');
            $customer = Customer::where('id',$request->id)->first();
            if(empty($customer)){
                return response()->json([
                    'message' => 'Invalid input'
                   ], 404);
            }

            $customer->update($ob);

            return response()->json([
            'message' => 'Customer Updated Successfully'
            ]);
        }else{
            return response()->json([
             'message' => 'You are not authorized to edit customer'
            ], 401);
        }
    }

    public function removeCustomer(RemoveCustomerRequest $request){
        $user = Auth::user();
        if($user->hasPermissionTo('customer.remove')){

            $customer = Customer::where('id',$request->id)->first();
            if(empty($customer)){
                return response()->json([
                    'message' => 'Invalid input'
                   ], 404);
            }

            $customer->delete();

            return response()->json([
            'message' => 'Customer Deleted Successfully'
            ]);
        }else{
            return response()->json([
             'message' => 'You are not authorized to remove customer'
            ], 401);
        }
    }
}
