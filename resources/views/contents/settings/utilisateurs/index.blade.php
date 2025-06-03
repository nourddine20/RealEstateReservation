@extends('admin-master')

@section('content')


   <!--app-content open-->
   <div class="main-content app-content mt-0">
                <div class="side-app">

                    <!-- CONTAINER -->
                    <div class="main-container container-fluid">

                        <!-- PAGE-HEADER -->
                        <div class="page-header">
                            <h1 class="page-title">Data Table</h1>
                            <div>
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="javascript:void(0)">Tables</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Data Table</li>
                                </ol>
                            </div>

                        </div>
                        <!-- PAGE-HEADER END -->


                        <!-- Row -->
                        <div class="row row-sm">
                            <div class="col-lg-12">
                                <div class="card">
                                    <div class="card-header" style="display:flex;justify-content:space-between;">
                                        <h3 class="card-title">File Export</h3>
                                        <button type="button" class="btn btn-primary" id="btnaddmember" data-bs-toggle="modal" data-bs-target="#MemberModal">
  Cree Nouveau Utilisateur
</button>

                                    </div>
                                    <div class="card-body">
                                      
                                        <div class="table-responsive">
                                       <select>
                                        <option></option>
                                       </select>
                                        <table id="datatable" class="table table-bordered text-nowrap key-buttons border-bottom mytablelist">
                                       
                                                <thead>
                                                    <tr>
                                                      <th></th>
                                                        
                                                        
                                                        <th class="border-bottom-0">Nom Complet</th>
                                                
                                                        <th class="border-bottom-0">Role</th>
                                                        <th class="border-bottom-0">Email</th>
                                                       
                                                        <th class="border-bottom-0">Start date</th>
                                                        <th class="border-bottom-0">Actions</th>
                                                    </tr>
                                                </thead>
                                                <tbody id="ajaxcontent">
                                       
                                                @foreach($allmembers as $item)
                                                <tr>
                                                      
                                                        <td>{{$item->id}}</td>
                                                        <td class="my-auto"> {{$item->name}}</td>
                                                       

                                                        <td>
                                                            @foreach($allroles as $role)
                                                                @if($role->id == $item->role_id)
                                                                {{$role->role_name}}
                                                                @endif
                                                            
                                                            @endforeach
                                                         
                                                      
                                                      </td>
                                                        <td>{{$item->email}}</td>
                                                        
                                                        
                                                        <td>{{$item->created_at}}</td>
                                                        <td>
                                                       
                                                        <div class="btn-group mt-2 mb-2">
                                                       
                                                    <button type="button" class="btn btn-default dropdown-toggle" data-bs-toggle="dropdown">
                                                            Action <span class="caret"></span>
                                                        </button>
                                                    <ul class="dropdown-menu" role="menu">
                                                        <!-- <li class="dropdown-plus-title">
                                                            Dropdown
                                                            <b class="fa fa-angle-up" aria-hidden="true"></b>
                                                        </li> -->
                                                    
                                                        <li><a href="{{route('profile.member',[$item->id])}}" style="color:#60A5FA;"><i class="bi bi-eye-fill mx-2"></i><span class="mx-2">View</span></a></li>

                                                        <li>  <a href="" data-bs-toggle="modal" class="btnmodifier" data-id="{{$item->id}}" data-bs-target="#MemberModal"  style="color:green" > <i class="bi bi-eye-fill mx-2" ></i><span class="mx-2">Modifier</span></a></li>
                                                      
                                                        <li>  <a href="{{route('delete.member',['id'=>$item->id])}}"  style="color:red" onclick="return confirm('Are you sure you want to Delete this ?');"> <i class="bi bi-eye-fill mx-2" ></i><span class="mx-2">Delete</span></a></li>
                                                      
                                                    </ul>
                                                </div>

                                                         
                                                        </td>
                                                    </tr>
                                                @endforeach
                                                  
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- End Row -->

                  
                    </div>
                    <!-- CONTAINER CLOSED -->

                 
                   <!-- MODAL ALERT MESSAGE -->
    <div class="modal fade" id="modaldemo4">
        <div class="modal-dialog modal-dialog-centered text-center " role="document">
            <div class="modal-content tx-size-sm">
                <div class="modal-body text-center p-4 pb-5" id="modaldemobody">
                    <!-- <button aria-label="Close" class="btn-close position-absolute" data-bs-dismiss="modal"><span aria-hidden="true">&times;</span></button>
                    <i class="icon icon-check fs-70 text-success lh-1 my-5 d-inline-block"></i>
                    <h4 class="text-success tx-semibold">Félicitations!</h4>
                    <p class="mg-b-20 mg-x-20" id="message_response">Le Client est Bien Ajouter En System .</p><button aria-label="Close" class="btn btn-success pd-x-25" onclick="{  location.reload();}" data-bs-dismiss="modal">Continue</button> -->
                </div>
            </div>
        </div>
    </div>



                        <!-- Modal -->
<div class="modal" id="MemberModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <form id="formmemberajax" method="POST">
                @csrf
                <div class="row " >
                  <div class="form-group col-md-12 mb-4">
                                    <input type="hidden" name="getid_member" id="getid_member" />

<div class="wrap-input100 validate-input input-group" data-bs-validate="Valid username is required: ex@abc.xyz">
                                                <a href="javascript:void(0)" class="input-group-text bg-white text-muted">
                                                <i class="bi bi-person"></i>
                                                </a>
                                                <input id="name" type="text" class="form-control input-lg  @error('name') is-invalid @enderror"    placeholder="Enter Nom Complet" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                                <span class="errorname"></span>
                                            </div>
                                            
                  </div>

                
               


               

                       <div class="form-group col-md-12 mb-4">
     

     <div class="wrap-input100 validate-input input-group" data-bs-validate="Valid email is required: ex@abc.xyz">
                                                     <a href="javascript:void(0)" class="input-group-text bg-white text-muted">
                                                     <i class="bi bi-envelope"></i>
                                                     </a>
                                                     <input id="email" type="email" class="form-control input-lg  @error('email') is-invalid @enderror"  aria-describedby="emailHelp"  placeholder="Enter Email" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
     

                                                     <input type="email" hidden name="oldemail" id="oldemail" />
                                                     <span class="erroremail"></span>
                                                 </div>
                                                 
                       </div>


                       <div class="form-group col-md-12 mb-4">
     

                                   <div class="wrap-input100 validate-input input-group" data-bs-validate="Valid Telephone is required: ex@abc.xyz">
                                                             <label class="form-label">Role</label>
                                                                <select id="select_role_id" name="select_role_id" class="form-control form-select select2">
                                                                <option value="choisir" disabled selected>--Select--</option>  
                                                                @foreach($allroles as $item)
                                                                
                                                                <option value="{{$item->id}}">{{$item->role_name}}</option>
                                                                  
                                                                    @endforeach
                                                                </select>
                                             
                                    </div>
                                    <div class="errorselect_role_id p-2 text-danger"></div>
                                                 
                       </div>


                                              
                                                <div id="box_switchoption" class="material-switch pull-right">
                                                        <span> Change Password </span> 
                                                    <input id="someSwitchOptionPrimary" name="SwitchOption" type="checkbox" />
                                                    <label for="someSwitchOptionPrimary" class="label-primary"></label>
                                                </div>
                           
                                                
                                              
                                                
                                                <div id="box_passwords" class="py-3">
                                                <div class="form-group col-md-12 ">
                    
                    <div class="wrap-input100 validate-input input-group" id="Password-toggle">
                                                  <a href="javascript:void(0)" class="input-group-text bg-white text-muted">
                                                      <i class="zmdi zmdi-eye text-muted" aria-hidden="true"></i>
                                                  </a>
                                                  <input type="password" class="form-control input-lg " name="password" id="password" placeholder="Nouveau Password" autocomplete="current-password">
                     

                                              </div>
    
                                              <div class="errorpassword text-danger">
  
  </div>
                   
                    </div>
  
  
                 
  
                    <div class="form-group col-md-12 ">
                    <div class="wrap-input100 validate-input input-group" id="Password-toggle">
                                                  <a href="javascript:void(0)" class="input-group-text bg-white text-muted">
                                                      <i class="zmdi zmdi-eye text-muted" aria-hidden="true"></i>
                                                  </a>
                                                  <input id="password_confirmation" type="password" class="form-control"  name="password_confirmation" placeholder="Confirmation Password"  autocomplete="new-password" style="display: block;">
  
                                                
                                              </div>
                                              <div class="errorpassword_confirmation text-danger" >  </div>
                   
                    </div>
                                                </div>

              

                  <div class="col-md-12">
                    <div class="d-flex my-2 justify-content-between">
                      <!-- <div class="d-inline-block mr-3">
                        <label class="control control-checkbox">Remember me
                          <input type="checkbox" />
                          <div class="control-indicator"></div>
                        </label>
                      </div> -->

                      <!-- <div class="d-inline-block mr-3 form-check">
                        <label class="control control-checkbox mx-3"> {{ __('Remember Me') }}
                        
                          <input class="form-check-input mx-3 " type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                          <div class="control-indicator"></div>
                        </label>
                      </div> -->

                      <!-- @if (Route::has('password.request'))
                                  
                                  <p><a class="btn btn-link" href="{{ route('password.request') }}">  {{ __('Forgot Your Password?') }}</a></p>
            
                        @endif -->
            
                    </div>

                    <!-- <label class="custom-control custom-checkbox mt-4">
									<input type="checkbox" class="custom-control-input">
									<span class="custom-control-label">Agree the <a href="terms.html">terms and policy</a></span>
								</label> -->
               

                                <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Save changes</button>
      </div>  

                   

                  </div>
                  
                  
                        
                </div>

              
                
              </form>
      </div>
    
    </div>
  </div>
</div>

	
   
                </div>
            </div>
            <!--app-content closed-->

            

            <script>

$(document).ready(function(){

        
  var table = $('#datatable').DataTable({
     
     'columnDefs': [
        {
           'targets': 0,
           'render': function(data, type, row, meta){
              if(type === 'display'){
                 data = '<div class="checkbox"><input type="checkbox" class="dt-checkboxes"><label></label></div>';
              }

              return data;
           },
           'checkboxes': {
              'selectRow': true,
              'selectAllRender': '<div class="checkbox"><input type="checkbox" class="dt-checkboxes"><label></label></div>'
           }
        }
     ],
     'select': 'multi',
     'order': [[1, 'asc']]
  });

  var selected_row = table.column(0).checkboxes.selected();
                   console.log(selected_row);
   

    $('#someSwitchOptionPrimary').on('click',function(){
            $('#box_passwords').toggle();
           
                console.log($('#someSwitchOptionPrimary').prop('checked'));
                
            
    });

    var url = "";

    $('#btnaddmember').on('click',function(){

  // btnmodallabel = '#CreateSupplierModal';
  $('#box_passwords').show();
  $('#box_switchoption').hide();

  $('#name').val('');
    $('#email').val('');
    $('#oldemail').val('');
    $('#role_name').val('');
    $('#password').val('');
    $('#getid_member').val('');
    $('#confirm-password').val('');

    url="{{ route('createnew.member') }}";

});



   

    $('.btnmodifier').on('click',function(){

        $('#box_passwords').hide();
  $('#box_switchoption').show();

btnmodallabel = '#UpdateSupplierModal';
  console.log('id '+$(this).attr('data-id'));

 console.log( $('#dropify-img'))
  arraysuppliers= [];
  idcustomer =$(this).attr('data-id');
  allmembers = <?php echo $allmembers ?>;
 console.log(allmembers)
 allmembers.forEach(element => {


  if(idcustomer == element.id){

    $('#getid_client').val(element.id);
    console.log(element)
  console.log(element.id)
    $('#name').val(element.name);
    $('#email').val(element.email);
    $('#oldemail').val(element.email);
    $('#getid_member').val(element.id);

    allroles = <?php echo $allroles ?>;

    allroles.forEach(item=>{

      if(item.id == element.role_id)
      {
        console.log('role : '+item.role_name)
        $('#select_role_id').val(item.id).trigger('change');
      }
    
    });
   
    $('#city').val(element.city);
    $('#shopname').val(element.shopname);
    $('#password').val('');
    $('#password_confirmation').val('');
  }
 

 
 

});

url="{{ route('update.member') }}";

})

    

        $.ajaxSetup({
  headers: {
    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
  }
});


        arryinputs = ['name','email','phone','city','shopname','password','password_confirmation'];
       
      
       

        $("#formmemberajax").on("submit", function(event){
            event.preventDefault();
            console.log('bool');
            thisform = $(this);
            method = thisform.attr('method');
       
      
       
     
            var formData = new FormData(this);

            console.log('yes');
        

           

  

var formValues= $(this).serialize();
 
$.ajax({
            dataType: 'json',
            type:method,
            url: url,
            data:formData,
            contentType: false, //MUST
    processData: false, //MUST
  
            success:function(response){
            //   $('#inscription').attr('data-bs-dismiss','modal');
            //     console.log(response);

                if(response.status == 'success')
                {
                         // initialized with no keyboard
                         $('#MemberModal').modal('hide') 
                        $('#MemberModal').modal({ keyboard: false })
                     
                        $content =  ` <button aria-label="Close" class="btn-close position-absolute" data-bs-dismiss="modal"><span aria-hidden="true">&times;</span></button>
                    <i class="icon icon-check fs-70 text-success lh-1 my-5 d-inline-block"></i>
                    <h4 class="text-success tx-semibold">Félicitations!</h4>
                    <p class="mg-b-20 mg-x-20" id="message_response">`+response.msg+`</p><button aria-label="Close" class="btn btn-success pd-x-25" onclick="{  location.reload();}" data-bs-dismiss="modal">Continue</button>`;

                        $('#modaldemobody').html($content);

                        $('#modaldemo4').modal('show');
                     
              
                   
                  

                }else if(response.status == 'error')
                {
                  if(response.input == 'name'){
                    $('.errorname').show();

                                                                        
                    message = response.msg;
                    $('.errorname').html(message);
                    }else{
                    $('.errorname').hide();
                    }

                  if(response.input == 'email'){
                    $('.erroremail').show();

                                                    
                            message = response.msg;
                            $('.erroremail').html(message);
                  }else{
                    $('.erroremail').hide();
                  }

                   if(response.input == 'select_role_id'){
                    $('.errorselect_role_id').show();

                                                    
                      message = response.msg;


                      $('.errorselect_role_id').html(message);
                  }else{
                    $('.errorselect_role_id').hide();
                  }

                    if(response.input == 'password'){
                      $('.errorpassword').show();

                                                    
                      message = response.msg;


                      $('.errorpassword').html(message);
                      }else{
                      $('.errorpassword').hide();
                      }

                      if(response.input == 'password_confirmation'){
                      $('.errorpassword_confirmation').show();

                                                    
                      message = response.msg;


                      $('.errorpassword_confirmation').html(message);
                      }else{
                      $('.errorpassword_confirmation').hide();
                      }

                

                  if(response.input == 'none')
                  {
                    $('#MemberModal').modal('hide') 
                        $('#MemberModal').modal({ keyboard: false })
                      
                        $content =  ` <button aria-label="Close" class="btn-close position-absolute" data-bs-dismiss="modal"><span aria-hidden="true">&times;</span></button>
                    <i class="icon icon-check fs-70 text-danger lh-1 my-5 d-inline-block"></i>
                    <h4 class="text-danger tx-semibold">Opps sorry!</h4>
                    <p class="mg-b-20 mg-x-20" id="message_response">`+response.msg+`</p><button aria-label="Close" class="btn btn-danger pd-x-25" onclick="{  location.reload();}" data-bs-dismiss="modal">Close</button>`;


                        $('#modaldemobody').html($content);

                        $('#modaldemo4').modal('show');
                  }

                }
          

              
            }
        });
      

   
  });




});

            </script>



@endsection