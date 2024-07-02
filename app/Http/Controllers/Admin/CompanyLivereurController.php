<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;
use App\Models\CompanyLivereur\CompanyLivereur;
use App\Mail\CompanyLivereurs\banedCompanyLivereur;
use App\Mail\CompanyLivereurs\DeleteCompanyLivereur;
use App\Mail\CompanyLivereurs\unbanedCompanyLivereur;

class CompanyLivereurController extends Controller
{
     //index
     public function index()
     {
         $template='defaulte';
         $page_title="شركات الشحن";
         $c_livereurs=CompanyLivereur::orderBy('id', 'desc')->paginate(10);
         // dd($c_livereurs);
         return view('admins.super-admin.company_livereurs',compact('template','c_livereurs','page_title'))->render();
     }
     //company_livereur
    public function company_livereur($email)
    {
        $template='defaulte';
        $page_title="معلومات شركة الشحن ";
        $c_livereur=CompanyLivereur::where('email',$email)->first();
        return view('admins.super-admin.company_livereur',compact('template','c_livereur','page_title'));
    }
     //pagination
    public function pagination()
    {
       $template='defaulte';
       $page_title="شركات الشحن";
       $c_livereurs=CompanyLivereur::orderBy('id', 'desc')->paginate(10);
       // dd($users);
       return view('admins.super-admin.components.company-livereur.tables.model1',compact('template','c_livereurs','page_title'))->render(); 
    }
     //search
     public function search(Request $request)
     {
         $template='defaulte';
         $page_title="شركات الشحن";
         $c_livereurs=CompanyLivereur::where('name','like','%'.$request->search_string.'%')
         ->orwhere('phone','like','%'.$request->search_string.'%')
         ->orwhere('email','like','%'.$request->search_string.'%')
         ->orwhere('company_name','like','%'.$request->search_string.'%')
         ->orderBy('id', 'desc')
         ->paginate(10);
         // dd($c_livereurs);
         if($c_livereurs->count()>=1)
         {
             return view('admins.super-admin.components.company-livereurs.tables.model1',compact('template','c_livereurs','page_title'))->render();   
         }else
         {
             return response()->json(['status' => 'nothing',]);
         }
     }
     // ban CompanyLivereur
     public function banCompanyLivereur($id)
     {
         //get CompanyLivereur
         $c_livereur=CompanyLivereur::findOrFail($id);
         //ban CompanyLivereur
         $c_livereur->status='Inactive';
         $c_livereur->update();
         //send mail to CompanyLivereur about this CompanyLivereur ban
         Mail::to($c_livereur->email)->queue(new banedCompanyLivereur($c_livereur));
         return response()->json(['success' => true,'message' => 'the CompanyLivereur has id='.$id.'is baned successfully']);
     }
     // ban CompanyLivereur
     public function unbanCompanyLivereur($id)
     {
         //get CompanyLivereur
         $c_livereur=CompanyLivereur::findOrFail($id);
         //ban CompanyLivereur
         $c_livereur->status='Active';
         $c_livereur->update();
         //send mail to CompanyLivereur about this CompanyLivereur ban
         Mail::to($c_livereur->email)->queue(new unbanedCompanyLivereur($c_livereur));
         return response()->json(['success' => true,'message' => 'the CompanyLivereur has id='.$id.'is baned successfully']);
     }
     //destroy
     public function destroy($id)
     {
         //get CompanyLivereur folder name and delete
         $c_livereur=CompanyLivereur::findOrFail($id);
         $c_livereur_folder=$c_livereur->company_name;
         //if folder exists delete it
         Storage::deleteDirectory('public/company-livereurs/'.$c_livereur_folder);
         //infor supper admin and CompanyLivereur about this delete
         Mail::to($c_livereur->email)->send(new DeleteCompanyLivereur($c_livereur));
         $c_livereur->delete();
         //return success delete
         return response()->json(['success'=> true,'id' => $id]);    
     }
}
