<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;
use App\Models\Dropshiper\Dropshiper;
use Illuminate\Support\Facades\Storage;
use App\Mail\Dropshipers\banedDropshiper;
use App\Mail\Dropshipers\DeleteDropshiper;
use App\Mail\Dropshipers\unbanedDropshiper;

class DropshiperController extends Controller
{
     //index
     public function index()
     {
         $template='defaulte';
         $page_title="المسوقين";
         $dropshipers=Dropshiper::orderBy('id', 'desc')->paginate(10);
         // dd($dropshipers);
         return view('admins.super-admin.dropshipers',compact('template','dropshipers','page_title'))->render();
     }
     //dropshiper
    public function dropshiper($email)
    {
        $template='defaulte';
        $page_title="معلومات المسوق";
        $dropshiper=Dropshiper::where('email',$email)->first();
        return view('admins.super-admin.dropshiper',compact('template','dropshiper','page_title'));
    }
      //pagination
      public function pagination()
      {
         $template='defaulte';
         $page_title="المسوقين";
         $dropshipers=Dropshiper::orderBy('id', 'desc')->paginate(10);
         // dd($users);
         return view('admins.super-admin.components.dropshipers.tables.model1',compact('template','dropshipers','page_title'))->render(); 
      }
     //search
     public function search(Request $request)
     {
         $template='defaulte';
         $page_title="المسوقين";
         $dropshipers=Dropshiper::where('name','like','%'.$request->search_string.'%')
         ->orwhere('phone','like','%'.$request->search_string.'%')
         ->orwhere('email','like','%'.$request->search_string.'%')
         // ->orwhere('store_name','like','%'.$request->search_string.'%')
         ->orderBy('id', 'desc')
         ->paginate(10);
         // dd($dropshipers);
         if($dropshipers->count()>=1)
         {
             return view('admins.super-admin.components.dropshipers.tables.model1',compact('template','dropshipers','page_title'))->render();   
         }else
         {
             return response()->json(['status' => 'nothing',]);
         }
     }
     // ban dropshiper
     public function banDropshiper($id)
     {
         //get dropshiper
         $dropshiper=Dropshiper::findOrFail($id);
         //ban dropshiper
         $dropshiper->status='Inactive';
         $dropshiper->update();
         //send mail to dropshiper about this dropshiper ban
         Mail::to($dropshiper->email)->queue(new banedDropshiper($dropshiper));
         return response()->json(['success' => true,'message' => 'the dropshiper has id='.$id.'is baned successfully']);
     }
     // ban dropshiper
     public function unbanDropshiper($id)
     {
         //get dropshiper
         $dropshiper=Dropshiper::findOrFail($id);
         //ban dropshiper
         $dropshiper->status='Active';
         $dropshiper->update();
         //send mail to dropshiper about this dropshiper ban
         Mail::to($dropshiper->email)->queue(new unbanedDropshiper($dropshiper));
         return response()->json(['success' => true,'message' => 'the dropshiper has id='.$id.'is baned successfully']);
     }
     //destroy
     public function destroy($id)
     {
         //get dropshiper folder name and delete
         $dropshiper=Dropshiper::findOrFail($id);
         $dropshiper_folder=$dropshiper->phone;
         //if folder exists delete it
         Storage::deleteDirectory('public/dropshipers/'.$dropshiper_folder);
         //infor supper admin and dropshiper about this delete
         Mail::to($dropshiper->email)->send(new DeleteDropshiper($dropshiper));
         $dropshiper->delete();
         //return success delete
         return response()->json(['success'=> true,'id' => $id]);    
     }
}
