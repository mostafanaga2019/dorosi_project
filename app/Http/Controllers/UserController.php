<?php

namespace App\Http\Controllers;

use App\Models\Setting;
use App\Models\Subject;
use App\Models\SubjectsNd;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;


function getSubjects(){

}



class UserController extends Controller
{
    

    public function register(Request $request){

        $request->validate([             
            'name' => 'required',            
            'email' => 'required',            
	        'password' => 'required|confirmed',
            'path_id' => 'required',
            'stage_id' => 'required',
            'class_id' => 'required',
            'term_id' => 'required',             
        ]);

        if(User::where('email', $request->email)->exists()){
            return response()->json([            
                'status' =>0,
                'message' => "البريد الإلكتروني مستخدم من قبل",	
            ], 302);
        }
        
        $user = new User(); 
        $user->name = $request->name; 
        $user->email = $request->email;       
        $user->password = bcrypt($request->password);
        $user->path_id = $request->path_id;       
        $user->stage_id = $request->stage_id;           
        $user->class_id = $request->class_id;   
        $user->term_id = $request->term_id;         
        $user->save(); 

        return response()->json([           
            "status" =>1,
            "message"=> "تم الإنشاء بنجاح",	
            "fees"=>Setting::find(1)->fees,
            "pay_phone"=>Setting::find(1)->pay_phone,
        ]); 

    }

    public function checkMailExist(Request $request){
        $request->validate([             
            'email' => 'required', 
        ]);

        if(User::where('email', $request->email)->exists()){
            
            return response()->json([            
                'status' =>0,
                'message' => "البريد الإلكتروني مستخدم من قبل",	
            ], 302);
        }else{
            return response()->json([            
                'status' =>1,
                'message' => "البريد الإلكتروني متاح للإستخدام",	
            ], 200);
        }

    }

    public function login(Request $request){

        $request->validate([ 
            'email' => 'required',            
            'password' => 'required', 
            'utype' => 'required'         
        ]); 

        $user = User::where("email" , "=" , $request->email)->where("utype" , "=" , $request->utype)->first();
        if(isset($user->id)){
            if(Hash::check($request->password, $user->password)){ 
                
                $token = $user->createToken("auth_token")->plainTextToken;
                return response()->json([
                    'status' =>1,
                    'message'=> 'تم تسجيل الدخول بنجاح',
                    'access_token' => $token			
                    ],200
                );
                
            }else {
                return response()->json([
                    'status' =>0,
                    'message'=> "فشل بتسجيل الدخول",		
                    ],404
                );
            }
            
            
        }else{
            return response()->json([
                'status' =>0,
                'message'=> "فشل بتسجيل الدخول",		
                ],404
            );
        }

    }


   

    public function logout(){  
        $user =User::find(auth()->user()->id);     
        $user->tokens()->delete();     
		return response()->json([
	 		'status' =>1,
			'message'=> 'تم تسجيل الخروج بنجاح',						
			],200
		);
    }








    public function getUserData(Request $request){      

        $path_id = isset($request->path_id) ? $request->path_id : auth()->user()->path_id;
        $stage_id = isset($request->stage_id) ? $request->stage_id : auth()->user()->stage_id;
        $class_id = isset($request->class_id) ? $request->class_id : auth()->user()->class_id;
        $term_id = isset($request->term_id) ? $request->term_id : auth()->user()->term_id;
       
        $termSubjects = $term_id == "0" ? Subject::where('term_id', $term_id) ->where('stage_id', $stage_id)
                                                            ->where('class_id', $class_id)->with('units')->with('exams')->get()                                                       
                                                 :  SubjectsNd::where('term_id', $term_id)->where('stage_id', $stage_id)
                                                            ->where('class_id', $class_id)->with('units')->with('exams')->get();
                                                       
        


        $engSubjects = $termSubjects->where('path_id', "1");

        $commonSubjects = $termSubjects->where('path_id', "0")         
                                ->where('is_common', "1");

        $arbSubjects = $termSubjects->where('path_id', "0");
         
        $path_id == "1" ?    
            $subjects = $commonSubjects->merge($engSubjects) :
            $subjects = $arbSubjects;
       
        

        return response()->json([            
            'status' =>1,
            'pay_status'=> auth()->user()->status, 
            'fees'=> Setting::find(1)->fees,
            'pay_phone'=> Setting::find(1)->pay_phone,            
            'privacy'=>Setting::find(1)->privacy,
            'terms'=>Setting::find(1)->terms,
            'facebook'=>Setting::find(1)->facebook,
            'twitter'=>Setting::find(1)->twitter,
            'google_play'=>Setting::find(1)->google_play,
            'user_name'=>auth()->user()->name,
            'user_email'=>auth()->user()->email,                                   
            'path_id'=> $path_id,	
            'stage_id'=> $stage_id,
            'class_id'=>  $class_id,	
            'term_id'=> $term_id,
            'subjects'=>  $subjects,             
          ],200
        );
        
        
    } 

   

    

    public function getData(Request $request){
       
        $request->validate([ 
            'path_id' => 'required',
            'stage_id' => 'required',
            'class_id' => 'required',
            'term_id' => 'required',                         
        ]);
        $termSubjects = $request->term_id == "0" ? Subject::where('term_id', $request->term_id) ->where('stage_id', $request->stage_id)
                                                            ->where('class_id', $request->class_id)->with('units')->with('exams')->get()                                                       
                                                 :  SubjectsNd::where('term_id', $request->term_id)->where('stage_id', $request->stage_id)
                                                            ->where('class_id', $request->class_id)->with('units')->with('exams')->get();
                                                       
        


        $engSubjects = $termSubjects->where('path_id', "1");

        $commonSubjects = $termSubjects->where('path_id', "0")         
                                ->where('is_common', "1");

        $arbSubjects = $termSubjects->where('path_id', "0");
         
        $request->path_id == "1" ?    
            $subjects = $commonSubjects->merge($engSubjects) :
            $subjects = $arbSubjects;


        return response()->json([ 
           
            'status' =>1,
            'pay_status'=> 0, 
            'fees'=> Setting::find(1)->fees,
            'pay_phone'=> Setting::find(1)->pay_phone,            
            'privacy'=>Setting::find(1)->privacy,
            'terms'=>Setting::find(1)->terms,
            'facebook'=>Setting::find(1)->facebook,
            'twitter'=>Setting::find(1)->twitter,
            'google_play'=>Setting::find(1)->google_play,
            'path_id'=> $request->path_id,	
            'stage_id'=> $request->stage_id,
            'class_id'=>  $request->class_id,	
            'term_id'=> $request->term_id,            
            'subjects'=>  $subjects,
                           
          ],200
        );
        
        
    } 

    
    public function updateUserData(Request $request){
       
        $request->validate([ 
            'path_id' => 'required',
            'stage_id' => 'required',
            'class_id' => 'required',
            'term_id' => 'required',                         
        ]);

        $user = User::find(auth()->user()->id);
        $user->path_id = $request->path_id;
        $user->stage_id = $request->stage_id;
        $user->class_id = $request->class_id;
        $user->term_id = $request->term_id;
        $user->save();
        return response()->json([
            'status' =>1,
           'message'=> 'تم حفظ البيانات بنجاح',						
           ],200
       );

    }

    public function updateUserPersonalData(Request $request){
       
        $request->validate([ 
            'email' => 'required',
            'name' => 'required',                                    
        ]);

        $user = User::find(auth()->user()->id);
        $user->email = $request->email;
        $user->name = $request->name;        
        $user->save();
        return response()->json([
            'status' =>1,
           'message'=> 'تم حفظ البيانات بنجاح',						
           ],200
        );

    }



}
