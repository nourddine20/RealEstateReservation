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
                                        <button type="button" class="btn btn-primary" id="btnaddclient" data-bs-toggle="modal" data-bs-target="#UpdateSupplierModal">
  Cree Nouveau Client
</button>

                                    </div>
                                    <div class="col-12 col-sm-12">
                                    <div class="card">
                                      <h3 class="card-title m-3 mx-5">
                                        Actions pour commandes sélectionnées

                                        </h3>
                                        <div class="card-header">
                                            
                                            <!-- <h3 class="card-title mx-3">
                                           <a class="btn btn-primary text-white"  data-bs-toggle="modal"  data-bs-target="#status-edit"  id="btntest"> Check Statu</a>
                                            </h3> -->

                                            <h3 class="card-title mx-3">
                                           <a class="btn btn-danger text-white"  data-bs-toggle="modal"  data-bs-target="#modalforcheckdelete" id="btndeletesources"> Delete </a>
                                            </h3>

                                            <!-- <h3 class="card-title mx-3">
                                           <a class="btn btn-secondary text-white" data-bs-toggle="modal"  data-bs-target="#import-fromsheet"  id="btnimportfromsheet"> Import From Sheet </a>
                                            </h3>
                                         -->
                                        </div>
                                      </div>
                                    </div>

                                    <div class="card-body">
                                        <div class="table-responsive">
                                            <table id="datatable" class="table table-bordered text-nowrap border-bottom" >
                                                <thead>
                                                    <tr>
                                                      <th></th>
                                                         <th class="border-bottom-0" style="width:50px;">Id Client</th>
                                                        
                                                        <th class="border-bottom-0">Nom Complet</th>
                                                
                                                        <th class="border-bottom-0">Telephone</th>
                                                        <th class="border-bottom-0">Ville</th>
                                                        <th class="border-bottom-0">Email</th> 
                                                        <th class="border-bottom-0">Type</th> 
                                                        <th class="border-bottom-0">Start date</th>
                                                        <th class="border-bottom-0">Actions</th>
                                                    </tr>
                                                </thead>
                                                <tbody id="ajaxcontent">
                                       
                                                @foreach($allclients as $item)
                                                <tr>
                                               
                                                      <td>{{$item->id}}</td>
                                                        <td>{{$item->id}}</td>
                                                      
                                                        </td>
                                                        <td class="my-auto"> {{$item->name}}</td>
                                                        <td>{{$item->phone}}</td>

                                                        <td>
                                                          {{$item->city}}
                                                      
                                                      </td>
                                                     
                                                        <td>{{$item->email}}</td>
                                                        <td>
                                                          @if($item->type == "investisseur")
                                                            Investisseur
                                                          @else
                                                           Client Final 
                                                          @endif
                                                        
                                                        </td>
                        
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
                                                    
                                                        <li><a href="{{route('profile.client',[$item->id])}}" style="color:#60A5FA;"><i class="bi bi-eye-fill mx-2"></i><span class="mx-2">View</span></a></li>

                                                        <li>  <a href="" data-bs-toggle="modal" class="btnmodifier" data-id="{{$item->id}}" data-bs-target="#UpdateSupplierModal"  style="color:green" > <i class="bi bi-eye-fill mx-2" ></i><span class="mx-2">Modifier</span></a></li>
                                                      
                                                        <li>  <a href="{{route('delete.client',['id'=>$item->id])}}"  style="color:red" onclick="return confirm('Are you sure you want to Delete this ?');"> <i class="bi bi-eye-fill mx-2" ></i><span class="mx-2">Delete</span></a></li>
                                                      
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


    <!-- MODAL ALERT MESSAGE is deleted  -->
    <div class="modal fade" id="modalforcheckdelete">
        <div class="modal-dialog modal-dialog-centered text-center " role="document">
            <div class="modal-content tx-size-sm">
            <form id="multideleteform" action="{{route('multidelete.clients')}}" method="POST">
                @csrf
                <div class="modal-body text-center  p-4 pb-5" id="modalforcheckdeletebody">
                    <button aria-label="Close" class="btn-close position-absolute" data-bs-dismiss="modal"><span aria-hidden="true">&times;</span></button>
                    <i class="icon icon-info fs-70 text-danger lh-1 my-5 d-inline-block"></i>
                    <h4 class="text-danger tx-semibold">warning!</h4>
                    <p class="mg-b-20 mg-x-20" id="message_response"> Est ce que vraiment veux supprimer ces commandes  </p>
                    <input type="hidden" id="idsfordelete" name="idsfordelete[]" />
                    <div class="modal-footer">
        <button type="button" class="btn btn-dark" data-bs-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-danger">Delete</button>
      </div>  
                </div>
                
            </form>
            </div>
        </div>
    </div>

    	
                    <!-- Modal -->
<div class="modal" id="UpdateSupplierModal" tabindex="-1" aria-labelledby="UpdateSupplierModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="UpdateSupplierModalLabel">Update a Supplier</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <form class="formsupplierajax" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row">
                  <div class="form-group col-md-12 mb-4">
     

<div class="wrap-input100 validate-input input-group" data-bs-validate="Valid username is required: ex@abc.xyz">
                                                <a href="javascript:void(0)" class="input-group-text bg-white text-muted">
                                                <i class="bi bi-person"></i>
                                                </a>
                                                <input id="name" type="text" class="form-control input-lg  @error('name') is-invalid @enderror"    placeholder="Enter Nom Complet" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                                <p class="errorname text-danger"></p>
                                            </div>
                                            
                  </div>

                    
                  <div class="form-group col-md-12 mb-4">
     

     <div class="wrap-input100 validate-input input-group" data-bs-validate="Valid Telephone is required: ex@abc.xyz">
                                                     <a href="javascript:void(0)" class="input-group-text bg-white text-muted">
                                                     <i class="bi bi-telephone"></i>
                                                     </a>
                                                     <input id="phone" type="number" class="form-control input-lg  @error('phone') is-invalid @enderror"    placeholder="Enter Phone" name="phone" value="{{ old('phone') }}" required autocomplete="phone" autofocus>
     
                                                    
                                                 </div>
                                                 <p class="errorphone text-danger"></p>
                       </div>


                     

                                                
                    


                                        <div class="form-group col-md-12 mb-4">
     

     <div class="wrap-input100 validate-input input-group" data-bs-validate="Valid Telephone is required: ex@abc.xyz">
                                                     <a href="javascript:void(0)" class="input-group-text bg-white text-muted">
                                                     <i class="icon icon-envelope"></i>
                                                     </a>
                                                     <input id="email" type="text" class="form-control input-lg  @error('email') is-invalid @enderror"    placeholder="Enter email" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
     
                                                     <p class="erroremail text-danger"></p>
                                                 </div>
                                                 
                       </div>

                       
                       <div class="form-group col-md-12 mb-4">
     

     <div class="wrap-input100 validate-input input-group" data-bs-validate="Valid Telephone is required: ex@abc.xyz">
                                                     <a href="javascript:void(0)" class="input-group-text bg-white text-muted">
                                                     <i class="bi bi-geo-alt"></i>
                                                     </a>
                                                     <input id="city" type="text" class="form-control input-lg  @error('city') is-invalid @enderror"    placeholder="Enter Ville" name="city" value="{{ old('city') }}" required autocomplete="city" autofocus>
     
                                                     <p class="errorcity text-danger"></p>
                                                 </div>
                                                 
                       </div>


                       

                       <div class="form-group col-md-12 mb-4">

                        
                          <div class="wrap-input100 validate-input input-group" data-bs-validate="Valid username is required: ex@abc.xyz">

                          <label class="form-label">Type</label>
                          <select required name="selected_type" id="selected_type" class="form-control form-select select2">
                          <option value="0" disabled selected>--Select--</option>

                            
                            
                                
                           
                              <option value="client_final">Client Final </option>
                              <option value="investisseur">Investisseur</option>
                                
                            
                                
                            
                            
                            
                            
                            


                          </select>

                          <p class="errorselected_type text-danger"></p>
                          </div>

                          </div>


                       <div class="form-group col-md-12 mb-4">
     

     <div class="wrap-input100 validate-input input-group" data-bs-validate="Valid Telephone is required: ex@abc.xyz">
                                                     <a href="javascript:void(0)" class="input-group-text bg-white text-muted">
                                                     <i class="mdi mdi-account-card-details"></i>
                                                     </a>
                                                  
                                                     
                                                     <input id="cin" type="text" class="form-control input-lg  @error('cin') is-invalid @enderror"    placeholder="Enter cin" name="cin" value="{{ old('cin') }}"  autocomplete="cin" autofocus>
     
                                                     <p class="errorcin text-danger"></p>
                                                 </div>
                                                 
                       </div>
                      

<!-- 
                  <div class="form-group col-md-6 ">
                  <div class="wrap-input100 validate-input input-group" id="Password-toggle">
                                                <a href="javascript:void(0)" class="input-group-text bg-white text-muted">
                                                    <i class="zmdi zmdi-eye text-muted" aria-hidden="true"></i>
                                                </a>
                                                <input type="password" class="form-control input-lg @error('password') is-invalid @enderror" id="password" placeholder="Password" name="password" required autocomplete="current-password">
                   

<span class="errorpassword">

</span>
                                            </div>

                 
                  </div> -->


               

                  <!-- <div class="form-group col-md-6 ">
                  <div class="wrap-input100 validate-input input-group" id="Password-toggle">
                                                <a href="javascript:void(0)" class="input-group-text bg-white text-muted">
                                                    <i class="zmdi zmdi-eye text-muted" aria-hidden="true"></i>
                                                </a>
                                                <input id="password-confirm" type="password" class="form-control" required name="password_confirmation" placeholder="Confirmation Password" required autocomplete="new-password">

                                                <span class="errorpassword-confirm">

</span>
                                            </div>

                 
                  </div> -->

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
     'order': [[1, 'asc']],
   
  });

  var selected_row = table.column(0).checkboxes.selected();
                   console.log(selected_row);

                   $('#btntest').on('click',function(){
                     
                    console.log('selected-rows : ');
                      console.log('selected-rows : '+selected_row);
                        
                    });

                    
btnmodallabel   = '#CreateSupplierModal';
 

  console.log('hi man');
 
$('.btnmodifier').on('click',function(){

  btnmodallabel = '#UpdateSupplierModal';
    console.log('id '+$(this).attr('data-id'));
  
   console.log( $('#dropify-img'))
    arraysuppliers= [];
    idclient =$(this).attr('data-id');
   allclients = <?php echo $allclients ?>;
   console.log(allclients)
  allclients.forEach(element => {
  

    if(idclient == element.id){
      console.log(element)
    console.log(element.id)
      $('#name').val(element.name);
      $('#email').val(element.email);
      $('#phone').val(element.phone);
      $('#city').val(element.city);
      $('#cin').val(element.cin);
      
    }
   

    url="{{ route('update.client',':id') }}";
   
url = url.replace(':id',idclient);

  });
  
})

$('#btnaddclient').on('click',function(){
  idclient ='';
  // btnmodallabel = '#CreateSupplierModal';
 
  $('#name').val('');
    $('#email').val('');
    $('#phone').val('');
    $('#city').val('');
    $('#cin').val('');
  

    url="{{ route('createnew.client') }}";

});


$('#btndeletesources').on('click',function(){
            console.log('deleted please');
            selected_row = table.column(0).checkboxes.selected();
                     row_ids = [];
                    console.log('slected-rows : ');
                     
                        $.each(selected_row,function(key,order_id){
                            console.log(order_id);
                            row_ids.push(order_id);

                        })

                        console.log(row_ids)

            $('#idsfordelete').val(row_ids);
            
        });

$.ajaxSetup({
headers: {
'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
}
});

$('#multideleteform').on('submit',function(event){

event.preventDefault();
console.log('bool');
thisform = $(this);
url = thisform.attr('action');
method = thisform.attr('method');






var formData = new FormData(this);

console.log(formData);

var formValues= $(this).serialize();

$.ajax({

type:method,
url: url,
data:formData,
dataType:'JSON',
processData: false,
contentType: false,
success:function(response){
//   $('#inscription').attr('data-bs-dismiss','modal');
//     console.log(response);
        console.log('e');
    if(response.status == 'success')
    {
        
          // initialized with no keyboard
            $('#modalforcheckdelete').modal('hide') 
            $('#modalforcheckdelete').modal({ keyboard: false })
         
            $content =  ` <button aria-label="Close" class="btn-close position-absolute" data-bs-dismiss="modal"><span aria-hidden="true">&times;</span></button>
        <i class="icon icon-check fs-70 text-success lh-1 my-5 d-inline-block"></i>
        <h4 class="text-success tx-semibold">Félicitations!</h4>
        <p class="mg-b-20 mg-x-20" id="message_response">`+response.msg+`</p><button aria-label="Close" class="btn btn-success pd-x-25" onclick="{  location.reload();}" data-bs-dismiss="modal">Continue</button>`;

            $('#modaldemobody').html($content);

            $('#modaldemo4').modal('show');
          
    }else if(response.status == 'error'){

      $('#modalforcheckdelete').modal('hide') 
      $('#modalforcheckdelete').modal({ keyboard: false })
          
            $content =  ` <button aria-label="Close" class="btn-close position-absolute" data-bs-dismiss="modal"><span aria-hidden="true">&times;</span></button>
        <i class="icon icon-check fs-70 text-danger lh-1 my-5 d-inline-block"></i>
        <h4 class="text-danger tx-semibold">Opps sorry!</h4>
        <p class="mg-b-20 mg-x-20" id="message_response">`+response.msg+`</p><button aria-label="Close" class="btn btn-danger pd-x-25" data-bs-dismiss="modal">Close</button>`;


        $('#modaldemobody').html('');
            $('#modaldemobody').html($content);

            $('#modaldemo4').modal('show');

    }



  
}
});


});


$(".formsupplierajax").on("submit", function(event){
            event.preventDefault();
            console.log('bool');
            thisform = $(this);
            url = url;
            method = thisform.attr('method');
       
        errors = 0;
      

            if($('#name').val() == '' )
             {
                $('.errorname').show();
                error = 1;
               
                message = "error please enter your name";
                $('.errorname').html(message);

             }else{
                $('.errorname').hide();
            }

            

// if($('#email').val() == '' )
//              {
//                 $('.erroremail').show();

//                 errors =1;
                
//                 message = "error please enter your email";
//        $('.erroremail').html(message);
//     }else{
//     $('.erroremail').hide();
// }

if($('#phone').val() == '' )
             {
                $('.errorphone').show();
                errors =1
                message = "error please enter your phone";
       $('.errorphone').html(message);
    }else{
    $('.errorphone').hide();
}

if($('#city').val() == '' )
             {
                $('.errorcity').show();
                errors =1
                message = "error please enter your city";
       $('.errorcity').html(message);

    }else{
    $('.errorcity').hide();
}

if($('#selected_type').val() == '' )
             {
                $('.errorselected_type').show();
                errors =1
                message = "error please enter your type";
       $('.errorselected_type').html(message);

    }else{
    $('.errorselected_type').hide();
}

if($('#email').val() == '' )
             {
                $('.erroremail').show();
                errors =1
                message = "error please enter your email";
       $('.erroremail').html(message);
 
    }else{
    $('.erroremail').hide();
}


// if($('#password').val() == '' )
//              {
//                 $('.errorpassword').show();
//                 errors =1
//                 message = "error please enter your password";
//        $('.errorpassword').html(message);

//     }else{
//     $('.errorpassword').hide();
// }

// if($('#password-confirm').val() == '' )
//              {
//                 $('.errorpassword-confirm').show();
//                 errors =1
//                 message = "error please enter your confirmation";
//        $('.errorpassword-confirm').html(message);
// }else{
//     $('.errorpassword-confirm').hide();
// }

       
       if(errors == 0)
        {

          var formData = new FormData(this);

console.log(formData);

  
var formValues= $(this).serialize();
 
$.ajax({
           
            type:method,
            url: url,
            data:formData,
            dataType:'JSON',
            processData: false,
   contentType: false,
            success:function(response){
            //   $('#inscription').attr('data-bs-dismiss','modal');
            //     console.log(response);
                    console.log(response);
                if(response.status == 'success')
                {
                    
                      // initialized with no keyboard
                        $('#UpdateSupplierModal').modal('hide') 
                        $('#UpdateSupplierModal').modal({ keyboard: false })
                     
                        $content =  ` <button aria-label="Close" class="btn-close position-absolute" data-bs-dismiss="modal"><span aria-hidden="true">&times;</span></button>
                    <i class="icon icon-check fs-70 text-success lh-1 my-5 d-inline-block"></i>
                    <h4 class="text-success tx-semibold">Félicitations!</h4>
                    <p class="mg-b-20 mg-x-20" id="message_response">`+response.msg+`</p><button aria-label="Close" class="btn btn-success pd-x-25" onclick="{  location.reload();}" data-bs-dismiss="modal">Continue</button>`;

                        $('#modaldemobody').html($content);

                        $('#modaldemo4').modal('show');
                      
                }else if(response.status == 'error'){

                  if(response.input == 'phone')
                  {
                    console.log('hellowordl')
                    $('.errorphone').show();

                              
                            message = response.msg;
                           
                         
                  $('.errorphone').html(message);
                  
                  }
                 
                  
                
              

                }else{

                  $('#UpdateSupplierModal').modal('hide') 
                        $('#UpdateSupplierModal').modal({ keyboard: false })
                      
                        $content =  ` <button aria-label="Close" class="btn-close position-absolute" data-bs-dismiss="modal"><span aria-hidden="true">&times;</span></button>
                    <i class="icon icon-check fs-70 text-danger lh-1 my-5 d-inline-block"></i>
                    <h4 class="text-danger tx-semibold">Opps sorry!</h4>
                    <p class="mg-b-20 mg-x-20" id="message_response">`+Response.msg+`</p><button aria-label="Close" class="btn btn-danger pd-x-25" onclick="{  location.reload();}" data-bs-dismiss="modal">Close</button>`;


                        $('#modaldemobody').html($content);

                        $('#modaldemo4').modal('show');

                }


            //      $('#CreateSupplierModal').modal()                      // initialized with defaults

                
              
            //     $("#CreateSupplierModal").modal({backdrop: false});
            //     $("#modal-backdrop").modal({backdrop: false});

    //             position: fixed;
    // top: 0;
    // right: 0;
    // bottom: 0;
    // left: 0;
    // z-index: 1040;
    // background-color: #000;

              
            }
        });
        

      //   }else{
      //       $('.errorpassword-confirm').show();
      //           errors =1
      //           message = " your confirmation not match your password";
      //  $('.errorpassword-confirm').html(message);

      //   }

        }else{
            errors = 0;
        }
      
       
     
    

   
  });

});

            </script>



@endsection