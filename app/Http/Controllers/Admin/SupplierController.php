<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\Supplier\Supplier;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use App\Mail\Suppliers\banedSupplier;
use App\Mail\Suppliers\unbanedSupplier;
use App\Mail\Suppliers\DeleteSupplier;
use Illuminate\Support\Facades\Storage;

class SupplierController extends Controller
{ 
    //index
    public function index()
    {
        $template='defaulte';
        $page_title="الموردون";
        $suppliers=Supplier::orderBy('id', 'desc')->paginate(10);
        // dd($suppliers);
        return view('admins.super-admin.suppliers',compact('template','suppliers','page_title'));
    }
    //supplier
    public function supplier($email)
    {
        $template='defaulte';
        $page_title="معلومات المورد";
        $supplier=Supplier::where('email',$email)->first();
        return view('admins.super-admin.supplier',compact('template','supplier','page_title'));
    }
    //pagination
    public function pagination()
    {
       $template='defaulte';
       $page_title="الموردون";
       $suppliers=Supplier::orderBy('id', 'desc')->paginate(10);
       // dd($users);
       return view('admins.super-admin.components.suppliers.tables.model1',compact('template','suppliers','page_title'))->render(); 
    }
    //search
    public function search(Request $request)
    {
        $template='defaulte';
        $page_title="الموردون";
        $suppliers=Supplier::where('name','like','%'.$request->search_string.'%')
        ->orwhere('phone','like','%'.$request->search_string.'%')
        ->orwhere('email','like','%'.$request->search_string.'%')
        ->orwhere('store_name','like','%'.$request->search_string.'%')
        ->orderBy('id', 'desc')
        ->paginate(10);
        // dd($suppliers);
        if($suppliers->count()>=1)
        {
            return view('admins.super-admin.components.suppliers.tables.model1',compact('template','suppliers','page_title'))->render();   
        }else
        {
            return response()->json(['status' => 'nothing',]);
        }
    }
    // ban supplier
    public function banSupplier($id)
    {
        //get supplier
        $supplier=Supplier::findOrFail($id);
        //ban supplier
        $supplier->status='Inactive';
        $supplier->update();
        //send mail to supplier about this supplier ban
        Mail::to($supplier->email)->queue(new banedSupplier($supplier));
        return response()->json(['success' => true,'message' => 'the supplier has id='.$id.'is baned successfully']);
    }
    // ban supplier
    public function unbanSupplier($id)
    {
        //get supplier
        $supplier=Supplier::findOrFail($id);
        //ban supplier
        $supplier->status='Active';
        $supplier->update();
        //send mail to supplier about this supplier ban
        Mail::to($supplier->email)->queue(new unbanedSupplier($supplier));
        return response()->json(['success' => true,'message' => 'the supplier has id='.$id.'is baned successfully']);
    }
    //destroy
    public function destroy($id)
    {
        //get supplier folder name and delete
        $supplier=Supplier::findOrFail($id);
        $supplier_folder=$supplier->store_name;
        //if folder exists delete it
        Storage::deleteDirectory('public/suppliers/'.$supplier_folder);
        //infor supper admin and supplier about this delete
        Mail::to($supplier->email)->send(new DeleteSupplier($supplier));
        $supplier->delete();
        //return success delete
        return response()->json(['success'=> true,'id' => $id]);    
    }
}
