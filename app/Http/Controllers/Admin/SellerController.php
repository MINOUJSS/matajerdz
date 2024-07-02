<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\Seller\Seller;
use App\Mail\Sellers\banedSeller;
use App\Mail\Sellers\DeleteSeller;
use App\Mail\Sellers\unbanedSeller;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;

class SellerController extends Controller
{
    //index
    public function index()
    {
        $template='defaulte';
        $page_title="البائعين";
        $sellers=Seller::orderBy('id', 'desc')->paginate(10);
        // dd($sellers);
        return view('admins.super-admin.sellers',compact('template','sellers','page_title'))->render();
    }
    //seller
    public function seller($email)
    {
        $template='defaulte';
        $page_title="معلومات البائع";
        $seller=Seller::where('email',$email)->first();
        return view('admins.super-admin.seller',compact('template','seller','page_title'));
    }
     //pagination
     public function pagination()
     {
        $template='defaulte';
        $page_title="البائعين";
        $sellers=Seller::orderBy('id', 'desc')->paginate(10);
        // dd($users);
        return view('admins.super-admin.components.sellers.tables.model1',compact('template','sellers','page_title'))->render(); 
     }
    //search
    public function search(Request $request)
    {
        $template='defaulte';
        $page_title="البائعين";
        $sellers=Seller::where('name','like','%'.$request->search_string.'%')
        ->orwhere('phone','like','%'.$request->search_string.'%')
        ->orwhere('email','like','%'.$request->search_string.'%')
        // ->orwhere('store_name','like','%'.$request->search_string.'%')
        ->orderBy('id', 'desc')
        ->paginate(10);
        // dd($sellers);
        if($sellers->count()>=1)
        {
            return view('admins.super-admin.components.sellers.tables.model1',compact('template','sellers','page_title'))->render();   
        }else
        {
            return response()->json(['status' => 'nothing',]);
        }
    }
    // ban seller
    public function banSeller($id)
    {
        //get seller
        $seller=Seller::findOrFail($id);
        //ban seller
        $seller->status='Inactive';
        $seller->update();
        //send mail to seller about this seller ban
        Mail::to($seller->email)->queue(new banedSeller($seller));
        return response()->json(['success' => true,'message' => 'the seller has id='.$id.'is baned successfully']);
    }
    // ban seller
    public function unbanSeller($id)
    {
        //get seller
        $seller=Seller::findOrFail($id);
        //ban seller
        $seller->status='Active';
        $seller->update();
        //send mail to seller about this seller ban
        Mail::to($seller->email)->queue(new unbanedSeller($seller));
        return response()->json(['success' => true,'message' => 'the seller has id='.$id.'is baned successfully']);
    }
    //destroy
    public function destroy($id)
    {
        //get seller folder name and delete
        $seller=Seller::findOrFail($id);
        $seller_folder=$seller->store_name;
        //if folder exists delete it
        Storage::deleteDirectory('public/sellers/'.$seller_folder);
        //infor supper admin and seller about this delete
        Mail::to($seller->email)->send(new DeleteSeller($seller));
        $seller->delete();
        //return success delete
        return response()->json(['success'=> true,'id' => $id]);    
    }
}
