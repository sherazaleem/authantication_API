<div class="bg-gray-100 ">

       <div class="container-fluid ">
           <div class="row flex justify-center mt-5 mb-3">
               <div class="col-md-9 col-sm-3 ">
                   <!-- video and audio search here -->
       
          <input type="text" class="bg-white h-14 w-full px-12 rounded-lg hover:cursor-pointer" name="" placeholder="  Type Here . . . . .">
         
        </div>

               </div>
           </div>

           <div class="row justify-center mb-5">
             <div class="col-md-9">
               <h4>All Notes</h4>
             </div>
           </div>
           </div>
           <!-- for starting row -->
           
             <div class="row justify-center">
               <div class="col-md-9 min-h-0">






                 <!-- carsuol stars here -->


                     <div class="row" id="main_d">
                  @foreach($text as $txt)
            <div class="col-sm-3  border-rounded-lg py-3" >
              <div class="card" id="text_d">
                
              <div class="card-body text-left bg-green-300">
                <h4 class="md:text-xl sm:text-sm" id="title" >{{$txt->title}}</h4>
                <p class="sm:text-sm" id="description">
                  {{$txt->description}}
                </p>
                <p>{{ \Carbon\Carbon::parse($txt->created_at)->format('j F, Y') }}</p>

              </div>

            </div>

             </div>
             @endforeach
                 </div>

                 <div>{{ $text->links() }}</div>


                 <!-- carsuol end here -->

               </div>

             </div>
             <!-- next cols start  -->
             <div class="row justify-center mt-5 mb-8">
               <div class="col-md-9">
              <div class="row">
              <div class="col-sm-3 border-rounded-lg   ">
              <div class="card">
                
              <div class="card-body text-left ">
                <h4 class="text-lg" id="note">Notes Title</h4>
                <span>
                  
                  <span class="ml-4">
                  <i class="z-10 p-2 m-5 lg:ml-3 rounded-lg text-gray-800  offset-3 absolute hover:text-green-400 hover:cursor-pointer">
                  	<svg id="svg" class="text-gray-400 group-hover:text-gray-500 mr-3 flex-shrink-0 h-6 w-6"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round">  <polygon points="23 7 16 12 23 17 23 7" />  <rect x="1" y="5" width="15" height="14" rx="2" ry="2" /></svg>
                  </i>
                  </span>
                  <img src="admin.jpeg" width="500" height="500">
                  
                </span>
                
              </div>
            </div>
             </div>
             <div class="col-sm-3 border-rounded-lg  ">
              <div class="card">
              <div class="card-body text-left ">
                <h4 class="text-lg" id="note">Notes Title</h4>
                <span>
                  
                  <span class="ml-4">
                  <i class="z-10 p-2 m-5 lg:ml-3 rounded-lg text-gray-800  offset-3 absolute hover:text-green-400 hover:cursor-pointer">
                  	<svg id="svg" class="text-gray-400 group-hover:text-gray-500 mr-3 flex-shrink-0 h-6 w-6"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round">  <polygon points="23 7 16 12 23 17 23 7" />  <rect x="1" y="5" width="15" height="14" rx="2" ry="2" /></svg>
                  </i>
                  </span>
                  <img src="admin.jpeg" width="500" height="500">
                  
                </span>
              </div>
            </div>
             </div>
             <div class="col-sm-3 border-rounded-lg  ">
              <div class="card">
              <div class="card-body text-left ">
                <h4 class="text-lg" id="note">Notes Title</h4>
                <span>
                  
                  <span class="ml-4">
                  <i class="z-10 p-2 m-5 lg:ml-3 rounded-lg text-gray-800  offset-3 absolute hover:text-green-400 hover:cursor-pointer">
                  	<svg id="svg" class="text-gray-400 group-hover:text-gray-500 mr-3 flex-shrink-0 h-6 w-6"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round">  <polygon points="23 7 16 12 23 17 23 7" />  <rect x="1" y="5" width="15" height="14" rx="2" ry="2" /></svg>
                  </i>
                  </span>
                  <img src="admin.jpeg" width="500" height="500">
                  
                </span>
              </div>
            </div>
             </div>
             <div class="col-sm-3 border-rounded-lg  ">
              <div class="card">
              <div class="card-body text-left ">
                <h4 class="text-lg" id="note">Notes Title</h4>
                <span>
                  
                  <span class="ml-4">
                  <i class="z-10 p-2 m-5 lg:ml-3 rounded-lg text-gray-800  offset-3 absolute hover:text-green-400 hover:cursor-pointer">
                  	<svg id="svg" class="text-gray-400 group-hover:text-gray-500 mr-3 flex-shrink-0 h-6 w-6"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round">  <polygon points="23 7 16 12 23 17 23 7" />  <rect x="1" y="5" width="15" height="14" rx="2" ry="2" /></svg>
                  </i>
                  </span>
                  <img src="admin.jpeg" width="500" height="500">
                  
                </span>
              </div>
            </div>
          </div>
         </div>

               <!-- next cols end  -->
               
           
           </div>
           