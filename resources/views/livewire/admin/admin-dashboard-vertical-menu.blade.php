<div class="vertical-menu">


    <div data-simplebar class="h-100">

        <!--- Sidemenu -->
        <div id="sidebar-menu" class="sidebar-menu" >
            <!-- Right Menu Start -->
            <ul class="metismenu list-unstyled" id="side-menu">
            <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="mdi mdi-account"></i>
                        <span>الأعضاء</span>
                    </a>                    
                    <ul class="sub-menu" aria-expanded="false">
                        <li>
                            <a href="{{route('clients', [                                        
                                         'stage_id'=> 0,                                         
                                         ])}}" class=waves-effect">
                                <span>المرحلة الإبتدائية</span>
                            </a>
                        </li>
                    </ul> 
                    <ul class="sub-menu" aria-expanded="false">
                        <li>
                            <a href="{{route('clients', [                                        
                                         'stage_id'=> 1,                                         
                                         ])}}" class=waves-effect">
                                <span>المرحلة الإعدادية</span>
                            </a>
                        </li>
                    </ul> 
                    <ul class="sub-menu" aria-expanded="false">
                        <li>
                            <a href="{{route('clients', [                                        
                                         'stage_id'=> 2,                                         
                                         ])}}" class=waves-effect">
                                <span>المرحلة الثانوية</span>
                            </a>
                        </li>
                    </ul> 
                    <ul class="sub-menu" aria-expanded="false">
                        <li>
                            <a href="{{route('clients', [                                        
                                         'stage_id'=> 3,                                         
                                         ])}}" class=waves-effect">
                                <span>جميع الأعضاء</span>
                            </a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">                     
                        <i class="mdi mdi-arrange-bring-forward"></i>                        
                        <span> ترم أول </span>
                    </a>
                    
                    <ul class="sub-menu" aria-expanded="false">
                        <li>
                            <a href="javascript: void(0);" class="has-arrow waves-effect">                                
                                <i class="mdi mdi-note-outline"></i>
                                <span> ابتدائي </span>
                            </a>
                            <ul class="sub-menu" aria-expanded="false">
                                <li>                                                                     
                                    <a href="{{route('subjects', [
                                         'term_id'=> 0,
                                         'stage_id'=> 0,
                                         'class_id' => 0,
                                         'subject_id'=>$subjects->where('class_id' , 0)->first()->id
                                         ])}}">
                                        <i class="mdi mdi-numeric-1-box"></i>  
                                        <span>الصف الأول</span>                                       
                                    </a>
                                </li>                       
                            </ul>                              
                            <ul class="sub-menu" aria-expanded="false">
                                <li>                                     
                                    <a href="{{route('subjects', [
                                        'term_id'=> 0,
                                        'stage_id'=> 0,
                                        'class_id' => 1,
                                        'subject_id'=>$subjects->where('class_id' , 1)->first()->id
                                        ])}}">
                                        <i class="mdi mdi-numeric-2-box"></i>  
                                        <span>الصف الثاني</span>     
                                    </a>
                                </li>                       
                            </ul>  
                            <ul class="sub-menu" aria-expanded="false">
                                <li>                                      
                                    <a href="{{route('subjects', [
                                        'term_id'=> 0,
                                        'stage_id'=> 0,
                                        'class_id' => 2,
                                        'subject_id'=>$subjects->where('class_id' , 2)->first()->id
                                        ])}}">
                                        <i class="mdi mdi-numeric-3-box"></i>  
                                        <span>الصف الثالث</span> 
                                    </a>
                                </li>                       
                            </ul>  
                            <ul class="sub-menu" aria-expanded="false">
                                <li>
                                    <a href="{{route('subjects', [
                                        'term_id'=> 0,
                                        'stage_id'=> 0,
                                        'class_id' => 3,
                                        'subject_id'=>$subjects->where('class_id' , 3)->first()->id
                                        ])}}">
                                        <i class="mdi mdi-numeric-4-box"></i>  
                                        <span>الصف الرابع</span>                                       
                                    </a>
                                </li>                       
                            </ul>  
                            <ul class="sub-menu" aria-expanded="false">
                                <li>
                                    <a href="{{route('subjects', [
                                        'term_id'=> 0,
                                        'stage_id'=> 0,
                                        'class_id' => 4,
                                        'subject_id'=>$subjects->where('class_id' , 4)->first()->id
                                        ])}}">
                                        <i class="mdi mdi-numeric-5-box"></i>  
                                        <span>الصف الخامس</span> 
                                    </a>
                                </li>                       
                            </ul> 
                            <ul class="sub-menu" aria-expanded="false">
                                <li>
                                    <a href="{{route('subjects', [
                                        'term_id'=> 0,
                                        'stage_id'=> 0,
                                        'class_id' => 5,
                                        'subject_id'=>$subjects->where('class_id' , 5)->first()->id
                                        ])}}">
                                        <i class="mdi mdi-numeric-6-box"></i>  
                                        <span>الصف السادس</span>                                        
                                    </a>
                                </li>                       
                            </ul>                           
                        </li>                       
                    </ul>
                    <ul class="sub-menu" aria-expanded="false">
                        <li>
                            <a href="javascript: void(0);" class="has-arrow waves-effect">                                
                                <i class="mdi mdi-note-text"></i>
                                <span> إعدادي </span>
                            </a>
                            <ul class="sub-menu" aria-expanded="false">
                                <li>
                                    <a href="{{route('subjects', [
                                        'term_id'=> 0,
                                        'stage_id'=> 1,
                                        'class_id' => 6,
                                        'subject_id'=>$subjects->where('class_id' , 6)->first()->id
                                        ])}}">
                                        <i class="mdi mdi-numeric-1-box"></i>  
                                        <span>الصف الأول</span>     
                                    </a>
                                </li>                       
                            </ul>                            
                            <ul class="sub-menu" aria-expanded="false">
                                <li>
                                    <a href="{{route('subjects', [
                                        'term_id'=> 0,
                                        'stage_id'=> 1,
                                        'class_id' => 7,
                                        'subject_id'=>$subjects->where('class_id' , 7)->first()->id
                                        ])}}">
                                        <i class="mdi mdi-numeric-2-box"></i>  
                                        <span>الصف الثاني</span> 
                                    </a>
                                </li>                       
                            </ul>  
                            <ul class="sub-menu" aria-expanded="false">
                                <li>
                                    <a href="{{route('subjects', [
                                        'term_id'=> 0,
                                        'stage_id'=> 1,
                                        'class_id' => 8,
                                        'subject_id'=>$subjects->where('class_id' , 8)->first()->id
                                        ])}}">
                                        <i class="mdi mdi-numeric-3-box"></i>  
                                        <span>الصف الثالث</span>
                                    </a>
                                </li>                       
                            </ul>                                                   
                        </li>                       
                    </ul>

                    <ul class="sub-menu" aria-expanded="false">
                        <li>
                            <a href="javascript: void(0);" class="has-arrow waves-effect">                                
                                <i class="mdi mdi-note"></i>
                                <span> ثانوي </span>
                            </a>
                            <ul class="sub-menu" aria-expanded="false">
                                <li>
                                    <a href="{{route('subjects', [
                                        'term_id'=> 0,
                                        'stage_id'=> 2,
                                        'class_id' => 9,
                                        'subject_id'=>$subjects->where('class_id' , 9)->first()->id
                                        ])}}">
                                        <i class="mdi mdi-numeric-1-box"></i>  
                                        <span>الصف الأول</span>    
                                    </a>
                                </li>                       
                            </ul>                            
                            <ul class="sub-menu" aria-expanded="false">
                                <li>
                                    <a href="{{route('subjects', [
                                        'term_id'=> 0,
                                        'stage_id'=> 2,
                                        'class_id' => 10,
                                        'subject_id'=>$subjects->where('class_id' , 10)->first()->id
                                        ])}}">
                                        <i class="mdi mdi-numeric-2-box"></i>  
                                        <span>الصف الثاني</span> 
                                    </a>
                                </li>                       
                            </ul>  
                                                                          
                        </li>                       
                    </ul> 
                </li>
               
                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">                     
                        <i class="mdi mdi-arrange-bring-forward"></i>                        
                        <span> ترم ثاني </span>
                    </a>
                    
                    <ul class="sub-menu" aria-expanded="false">
                        <li>
                            <a href="javascript: void(0);" class="has-arrow waves-effect">                                
                                <i class="mdi mdi-note-outline"></i>
                                <span> ابتدائي </span>
                            </a>
                            <ul class="sub-menu" aria-expanded="false">
                                <li>                                                                     
                                    <a href="{{route('subjects', [
                                         'term_id'=> 1,
                                         'stage_id'=> 0,
                                         'class_id' => 0,
                                         'subject_id'=>$subjectsNd->where('class_id' , 0)->first()->id
                                         ])}}">
                                        <i class="mdi mdi-numeric-1-box"></i>  
                                        <span>الصف الأول</span>                                       
                                    </a>
                                </li>                       
                            </ul>                              
                            <ul class="sub-menu" aria-expanded="false">
                                <li>                                     
                                    <a href="{{route('subjects', [
                                        'term_id'=> 1,
                                        'stage_id'=> 0,
                                        'class_id' => 1,
                                        'subject_id'=>$subjectsNd->where('class_id' , 1)->first()->id
                                        ])}}">
                                        <i class="mdi mdi-numeric-2-box"></i>  
                                        <span>الصف الثاني</span>     
                                    </a>
                                </li>                       
                            </ul>  
                            <ul class="sub-menu" aria-expanded="false">
                                <li>                                      
                                    <a href="{{route('subjects', [
                                        'term_id'=> 1,
                                        'stage_id'=> 0,
                                        'class_id' => 2,
                                        'subject_id'=>$subjectsNd->where('class_id' , 2)->first()->id
                                        ])}}">
                                        <i class="mdi mdi-numeric-3-box"></i>  
                                        <span>الصف الثالث</span> 
                                    </a>
                                </li>                       
                            </ul>  
                            <ul class="sub-menu" aria-expanded="false">
                                <li>
                                    <a href="{{route('subjects', [
                                        'term_id'=> 1,
                                        'stage_id'=> 0,
                                        'class_id' => 3,
                                        'subject_id'=>$subjectsNd->where('class_id' , 3)->first()->id
                                        ])}}">
                                        <i class="mdi mdi-numeric-4-box"></i>  
                                        <span>الصف الرابع</span>                                       
                                    </a>
                                </li>                       
                            </ul>  
                            <ul class="sub-menu" aria-expanded="false">
                                <li>
                                    <a href="{{route('subjects', [
                                        'term_id'=> 1,
                                        'stage_id'=> 0,
                                        'class_id' => 4,
                                        'subject_id'=>$subjectsNd->where('class_id' , 4)->first()->id
                                        ])}}">
                                        <i class="mdi mdi-numeric-5-box"></i>  
                                        <span>الصف الخامس</span> 
                                    </a>
                                </li>                       
                            </ul> 
                            <ul class="sub-menu" aria-expanded="false">
                                <li>
                                    <a href="{{route('subjects', [
                                        'term_id'=> 1,
                                        'stage_id'=> 0,
                                        'class_id' => 5,
                                        'subject_id'=>$subjectsNd->where('class_id' , 5)->first()->id
                                        ])}}">
                                        <i class="mdi mdi-numeric-6-box"></i>  
                                        <span>الصف السادس</span>                                        
                                    </a>
                                </li>                       
                            </ul>                           
                        </li>                       
                    </ul>
                    <ul class="sub-menu" aria-expanded="false">
                        <li>
                            <a href="javascript: void(0);" class="has-arrow waves-effect">                                
                                <i class="mdi mdi-note-text"></i>
                                <span> إعدادي </span>
                            </a>
                            <ul class="sub-menu" aria-expanded="false">
                                <li>
                                    <a href="{{route('subjects', [
                                        'term_id'=> 1,
                                        'stage_id'=> 1,
                                        'class_id' => 6,
                                        'subject_id'=>$subjectsNd->where('class_id' , 6)->first()->id
                                        ])}}">
                                        <i class="mdi mdi-numeric-1-box"></i>  
                                        <span>الصف الأول</span>     
                                    </a>
                                </li>                       
                            </ul>                            
                            <ul class="sub-menu" aria-expanded="false">
                                <li>
                                    <a href="{{route('subjects', [
                                        'term_id'=> 1,
                                        'stage_id'=> 1,
                                        'class_id' => 7,
                                        'subject_id'=>$subjectsNd->where('class_id' , 7)->first()->id
                                        ])}}">
                                        <i class="mdi mdi-numeric-2-box"></i>  
                                        <span>الصف الثاني</span> 
                                    </a>
                                </li>                       
                            </ul>  
                            <ul class="sub-menu" aria-expanded="false">
                                <li>
                                    <a href="{{route('subjects', [
                                        'term_id'=> 1,
                                        'stage_id'=> 1,
                                        'class_id' => 8,
                                        'subject_id'=>$subjectsNd->where('class_id' , 8)->first()->id
                                        ])}}">
                                        <i class="mdi mdi-numeric-3-box"></i>  
                                        <span>الصف الثالث</span>
                                    </a>
                                </li>                       
                            </ul>                                                   
                        </li>                       
                    </ul>

                    <ul class="sub-menu" aria-expanded="false">
                        <li>
                            <a href="javascript: void(0);" class="has-arrow waves-effect">                                
                                <i class="mdi mdi-note"></i>
                                <span> ثانوي </span>
                            </a>
                            <ul class="sub-menu" aria-expanded="false">
                                <li>
                                    <a href="{{route('subjects', [
                                        'term_id'=> 1,
                                        'stage_id'=> 2,
                                        'class_id' => 9,
                                        'subject_id'=>$subjectsNd->where('class_id' , 9)->first()->id
                                        ])}}">
                                        <i class="mdi mdi-numeric-1-box"></i>  
                                        <span>الصف الأول</span>    
                                    </a>
                                </li>                       
                            </ul>                            
                            <ul class="sub-menu" aria-expanded="false">
                                <li>
                                    <a href="{{route('subjects', [
                                        'term_id'=> 1,
                                        'stage_id'=> 2,
                                        'class_id' => 10,
                                        'subject_id'=>$subjectsNd->where('class_id' , 10)->first()->id
                                        ])}}">
                                        <i class="mdi mdi-numeric-2-box"></i>  
                                        <span>الصف الثاني</span> 
                                    </a>
                                </li>                       
                            </ul>  
                                                                          
                        </li>                       
                    </ul> 
                </li>
              
             
                <li>
                    <a href="{{route('subjects', [
                        'term_id'=> 0,
                        'stage_id'=> 2,
                        'class_id' => 11,
                        'subject_id'=>$subjects->where('class_id' , 11)->first()->id
                        ])}}" class="waves-effect">
                        <i class="mdi mdi-arrange-bring-forward"></i>  
                        <span> الثانوية العامة </span>
                    </a>
                </li>

               

              

                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="mdi mdi-apps"></i>
                        <span>الضبط</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li>
                            <a href="{{route('privacy')}}" class=waves-effect">
                                <span>سياسة الخصوصية </span>
                            </a>
                        </li>
                    </ul>
                    <ul class="sub-menu" aria-expanded="false">
                        <li>
                            <a href="{{route('term')}}" class=waves-effect">
                                <span>الشروط و الأحكام </span>
                            </a>
                        </li>
                    </ul> 
                    <ul class="sub-menu" aria-expanded="false">
                        <li>
                            <a href="{{route('about')}}" class=waves-effect">
                                <span>من  نحن </span>
                            </a>
                        </li>
                    </ul> 
                   
                    <ul class="sub-menu" aria-expanded="false">
                        <li>
                            <a href="{{route('setting')}}" class=waves-effect">
                                <span>الإعدادت</span>
                            </a>
                        </li>
                    </ul> 

                </li>

            </ul>
        </div>
        <!-- Sidebar -->
    </div>

</div>