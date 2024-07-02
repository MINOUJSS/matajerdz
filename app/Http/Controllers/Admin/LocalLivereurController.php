<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;
use App\Models\LocalLivereur\LocalLivereur;
use App\Mail\LocalLivereurs\banedLocalLivereur;
use App\Mail\LocalLivereurs\DeleteLocalLivereur;
use App\Mail\LocalLivereurs\unbanedLocalLivereur;

class LocalLivereurController extends Controller
{
    //index
    public function index()
    {
        $template='defaulte';
        $page_title="الشاحنين المحليين";
        $l_livereurs=LocalLivereur::orderBy('id', 'desc')->paginate(10);
        // dd($l_livereurs);
        return view('admins.super-admin.local_livereurs',compact('template','l_livereurs','page_title'))->render();
    }
    //local_livereur
    public function local_livereur($email)
    {
        $template='defaulte';
        $page_title="معلومات الشاحن المحلي";
        $l_livereur=LocalLivereur::where('email',$email)->first();
        return view('admins.super-admin.local_livereur',compact('template','l_livereur','page_title'));
    }
    //pagination
    public function pagination()
    {
       $template='defaulte';
       $page_title="الشاحنين المحليين";
       $l_livereurs=LocalLivereur::orderBy('id', 'desc')->paginate(10);
       // dd($users);
       return view('admins.super-admin.components.local-livereur.tables.model1',compact('template','l_livereurs','page_title'))->render(); 
    }
    //search
    public function search(Request $request)
    {
        $template='defaulte';
        $page_title="الشاحنين المحليين";
        $l_livereurs=LocalLivereur::where('name','like','%'.$request->search_string.'%')
        ->orwhere('phone','like','%'.$request->search_string.'%')
        ->orwhere('email','like','%'.$request->search_string.'%')
        ->orwhere('company_name','like','%'.$request->search_string.'%')
        ->orderBy('id', 'desc')
        ->paginate(10);
        // dd($l_livereurs);
        if($l_livereurs->count()>=1)
        {
            return view('admins.super-admin.components.local-livereurs.tables.model1',compact('template','l_livereurs','page_title'))->render();   
        }else
        {
            return response()->json(['status' => 'nothing',]);
        }
    }
    // ban LocalLivereur
    public function banLocalLivereur($id)
    {
        //get LocalLivereur
        $l_livereur=LocalLivereur::findOrFail($id);
        //ban LocalLivereur
        $l_livereur->status='Inactive';
        $l_livereur->update();
        //send mail to LocalLivereur about this LocalLivereur ban
        Mail::to($l_livereur->email)->queue(new banedLocalLivereur($l_livereur));
        return response()->json(['success' => true,'message' => 'the LocalLivereur has id='.$id.'is baned successfully']);
    }
    // ban LocalLivereur
    public function unbanLocalLivereur($id)
    {
        //get LocalLivereur
        $l_livereur=LocalLivereur::findOrFail($id);
        //ban LocalLivereur
        $l_livereur->status='Active';
        $l_livereur->update();
        //send mail to LocalLivereur about this LocalLivereur ban
        Mail::to($l_livereur->email)->queue(new unbanedLocalLivereur($l_livereur));
        return response()->json(['success' => true,'message' => 'the LocalLivereur has id='.$id.'is baned successfully']);
    }
    //destroy
    public function destroy($id)
    {
        //get LocalLivereur folder name and delete
        $l_livereur=LocalLivereur::findOrFail($id);
        $l_livereur_folder=$l_livereur->company_name;    
        //if folder exists delete it
        Storage::deleteDirectory('public/local-livereurs/'.$l_livereur_folder);
        //infor supper admin and LocalLivereur about this delete
        Mail::to($l_livereur->email)->send(new DeleteLocalLivereur($l_livereur));
        $l_livereur->delete();
        //return success delete
        return response()->json(['success'=> true,'id' => $id]);    
    }
}
