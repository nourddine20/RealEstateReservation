@extends('admin-master')

@section('content')


   <!--app-content open-->
   <div class="main-content app-content mt-0">
                <div class="side-app">

                    <!-- CONTAINER -->
                    <div class="main-container container-fluid">

                        <!-- PAGE-HEADER -->
                        <div class="page-header">
                            <h1 class="page-title">Tranches</h1>
                            <div>
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="javascript:void(0)">Tranches</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">All</li>
                                </ol>
                            </div>

                        </div>
                        <!-- PAGE-HEADER END -->


                        <!-- Row -->
                        <div class="row row-sm">
                            <div class="col-lg-12">
                                <div class="card">
                                    <div class="card-header" style="display:flex;justify-content:space-between;">
                                        <h3 class="card-title">Tranches Table</h3>
                                        <button type="button" class="btn btn-primary" id="btnaddsupplier" data-bs-toggle="modal" data-bs-target="#UpdateSupplierModal">
  Cree Nouveau Tranche
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
                                           <a class="btn btn-danger text-white"  data-bs-toggle="modal"  data-bs-target="#modalforcheckdelete" id="btndeletesuppliers"> Delete </a>
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
                                      
                                        <table id="datatable" class="table table-bordered text-nowrap key-buttons border-bottom">
                                       
                                                <thead>
                                                    <tr>
                                                      <th></th>
                                                         <th class="border-bottom-0">Id Tranche</th>
                                                        <!-- <th class="border-bottom-0">Image</th> -->
                                                        <th class="border-bottom-0">Name</th>
                                                       
                                                        <th class="border-bottom-0">Start date</th>
                                                        <th class="border-bottom-0">Actions</th>
                                                    </tr>
                                                </thead>
                                                <tbody id="ajaxcontent">
                                       
                                                @foreach($alltranches as $item)
                                                <tr>
                                                        <td>{{$item->id}}</td>
                                                        <td>{{$item->id}}</td>
                                                        <!-- <td><img src="{{asset($item->img_cat)}}"  /></td> -->
                                                        <td> {{$item->label}}</td>
                                                      
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
                                                    
                                                      

                                                        <li>  <a href="" data-bs-toggle="modal" class="btnmodifier" data-id="{{$item->id}}" data-bs-target="#UpdateSupplierModal"  style="color:green" > <i class="bi bi-eye-fill mx-2" ></i><span class="mx-2">Modifier</span></a></li>
                                                      
                                                        <li>  <a href="{{route('delete.tranche',['id'=>$item->id])}}"  style="color:red" onclick="return confirm('Are you sure you want to Delete this ?');"> <i class="bi bi-eye-fill mx-2" ></i><span class="mx-2">Delete</span></a></li>
                                                      
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
                <div class="modal-body text-center p-4 pb-5">
                    <button aria-label="Close" class="btn-close position-absolute" data-bs-dismiss="modal"><span aria-hidden="true">&times;</span></button>
                    <i class="icon icon-check fs-70 text-success lh-1 my-5 d-inline-block"></i>
                    <h4 class="text-success tx-semibold">Félicitations!</h4>
                    <p class="mg-b-20 mg-x-20">Le Tranche est Bien Ajouter En System .</p><button aria-label="Close" class="btn btn-success pd-x-25" onclick="{  location.reload();}" data-bs-dismiss="modal">Continue</button>
                </div>
            </div>
        </div>
    </div>




    	
                    <!-- Modal -->
<div class="modal" id="UpdateSupplierModal" tabindex="-1" aria-labelledby="UpdateSupplierModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="UpdateSupplierModalLabel">Create a Tranche</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <form class="formsupplierajax" method="POST">
                @csrf
                <div class="row " >
                  <div class="form-group col-md-12 mb-4">
     

<div class="wrap-input100 validate-input input-group" data-bs-validate="Valid username is required: ex@abc.xyz">
                                                <!-- <a href="javascript:void(0)" class="input-group-text bg-white text-muted">
                                                <i class="bi bi-person"></i>
                                                </a> -->
                                                <input id="label" type="text" class="form-control input-lg  @error('label') is-invalid @enderror"    placeholder="Enter Label" name="label" value="{{ old('label') }}" required autocomplete="label" autofocus>

                                                <span class="errorlabel"></span>
                                            </div>
                                            
                  </div>

                

                       <!-- <div class="control-group form-group  row">
                                                    <div class="col-lg-12 col-sm-12">
                                                        <label class="form-label">Dropify Single Upload</label>
                                                        <input type="file" name="img_cat" id="img_cat"  class="dropify" onchange="readURL(this);"
                                                            data-height="180" />
                                                    </div>
                                                </div> -->

                   

                   



                

                
<!-- 
                  <div class="form-group col-md-6 ">
                  <div class="wrap-input100 validate-input input-group" id="Password-toggle">
                                                <a href="javascript:void(0)" class="input-group-text bg-white text-muted">
                                                    <i class="zmdi zmdi-eye text-muted" aria-hidden="true"></i>
                                                </a>
                                                <input type="password" class="form-control input-lg @error('password') is-invalid @enderror" id="password" placeholder="Password" label="password" required autocomplete="current-password">
                   

<span class="errorpassword">

</span>
                                            </div>

                 
                  </div> -->


               

                  <!-- <div class="form-group col-md-6 ">
                  <div class="wrap-input100 validate-input input-group" id="Password-toggle">
                                                <a href="javascript:void(0)" class="input-group-text bg-white text-muted">
                                                    <i class="zmdi zmdi-eye text-muted" aria-hidden="true"></i>
                                                </a>
                                                <input id="password-confirm" type="password" class="form-control" required label="password_confirmation" placeholder="Confirmation Password" required autocomplete="new-password">

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
                        
                          <input class="form-check-input mx-3 " type="checkbox" label="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

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


               <!-- MODAL ALERT MESSAGE is deleted  -->
   <div class="modal fade" id="modalforcheckdelete">
        <div class="modal-dialog modal-dialog-centered text-center " role="document">
            <div class="modal-content tx-size-sm">
            <form id="formdeletesuppliers" action="{{route('multidelete.tranches')}}" method="POST">
                @csrf
                <div class="modal-body text-center  p-4 pb-5" id="modalforcheckdeletebody">
                    <button aria-label="Close" class="btn-close position-absolute" data-bs-dismiss="modal"><span aria-hidden="true">&times;</span></button>
                    <i class="icon icon-info fs-70 text-danger lh-1 my-5 d-inline-block"></i>
                    <h4 class="text-danger tx-semibold">warning!</h4>
                    <p class="mg-b-20 mg-x-20" id="message_response"> Est ce que vraiment veux supprimer ces fournisseurs  </p>
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

	
    <!--- ENd MODAL delete multi sources  !--->
	
            

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

  var selected_row= [];
        var row_ids = [];

btnmodallabel   = '#CreateSupplierModal';
 

  console.log('hi man');

  

  $('#btndeletesuppliers').on('click',function(){
            console.log('deleted please');
            selected_row = table.column(0).checkboxes.selected();
                     row_ids = [];
                    console.log('slected-rows : ');
                     
                        $.each(selected_row,function(key,order_id){
                            console.log(order_id);
                            row_ids.push(order_id);

                        })


            $('#idsfordelete').val(row_ids);
            
        });
 

 
$('.btnmodifier').on('click',function(){

 
    console.log('id '+$(this).attr('data-id'));
  $('#UpdateSupplierModalLabel').val('Update Tranche');
    arraytranches= [];
    idTranche =$(this).attr('data-id');
   alltranches = <?php echo $alltranches?>;
   console.log(alltranches)
  alltranches.forEach(element => {
  

    if(idTranche == element.id){
      console.log(element)
    console.log($('#dropify-img').attr('src'))
      $('#label').val(element.label);
      
     
    }
   

    url="{{ route('update.tranche',':id') }}";

    url = url.replace(':id',idTranche);

  });
  
})

$('#btnaddsupplier').on('click',function(){
  idTranche ='';
  
  $('#UpdateSupplierModalLabel').val('Create Tranche');
  $('#label').val('');
    $('.dropify').val('');
   
   

    url="{{ route('create.tranche') }}";

});


$('#formdeletesuppliers').on('submit',function(event){

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

        console.log('e');
    if(response.status == 'success')
    {
        
            $('#modalforcheckdelete').modal('hide') 
            $('#modalforcheckdelete').modal({ keyboard: false })
         
            $content =  ` <button aria-label="Close" class="btn-close position-absolute" data-bs-dismiss="modal"><span aria-hidden="true">&times;</span></button>
        <i class="icon icon-check fs-70 text-success lh-1 my-5 d-inline-block"></i>
        <h4 class="text-success tx-semibold">Félicitations!</h4>
        <p class="mg-b-20 mg-x-20" id="message_response">`+response.msg+`</p><button aria-label="Close" class="btn btn-success pd-x-25" onclick="{  location.reload();}" data-bs-dismiss="modal">Continue</button>`;

        $('#modaldemobody').html('');
            $('#modaldemobody').html($content);

            $('#modaldemo4').modal('show');
          
    }else{

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




$.ajaxSetup({
headers: {
'X-CSRF-TOKEN': $('meta[label="csrf-token"]').attr('content')
}
});


$(".formsupplierajax").on("submit", function(event){
    event.preventDefault();
   

          
            console.log('bool');
            thisform = $(this);
            url = url;
            method = thisform.attr('method');
       
        errors = 0;
      

            if($('#label').val() == '' )
             {
                $('.errorlabel').show();
                error = 1;
               
                message = "error please enter your label";
                $('.errorlabel').html(message);

             }else{
                $('.errorlabel').hide();
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


       
       if(errors == 0)
        {

        //     if($('#password').val() == $('#password-confirm').val())
        // {
          
           
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
                if(response.status == 200)
                {
                      // initialized with no keyboard
                        $('#UpdateSupplierModal').modal('hide') 
                        $('#UpdateSupplierModal').modal({ keyboard: false })
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