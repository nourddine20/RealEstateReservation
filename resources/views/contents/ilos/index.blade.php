@extends('admin-master')

@section('content')


   <!--app-content open-->
   <div class="main-content app-content mt-0">
                <div class="side-app">

                    <!-- CONTAINER -->
                    <div class="main-container container-fluid">

                        <!-- PAGE-HEADER -->
                        <div class="page-header">
                            <h1 class="page-title">Ilo</h1>
                            <div>
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="javascript:void(0)">Ilo</a></li>
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
                                        <h3 class="card-title">Ilos Table</h3>
                                        <button type="button" class="btn btn-primary mr
                                    -auto" id="btnaddsupplier" data-bs-toggle="modal" data-bs-target="#UpdateSupplierModal">
  Cree Nouveau Ilos
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
                                            <table class="table table-bordered text-nowrap border-bottom" id="datatable">
                                                <thead>
                                                  
                                                    <tr>
                                                        <th></th>
                                                         <th class="border-bottom-0">Id Ilot</th>
                                                       
                                                        <th class="border-bottom-0">Ilot Num</th>

                                                        <th class="border-bottom-0">Tranche</th>
                                                       
                                                        <th class="border-bottom-0">Start date</th>
                                                        <th class="border-bottom-0">Actions</th>
                                                    </tr>
                                                </thead>
                                                <tbody id="ajaxcontent">
                                       
                                                @foreach($allilos as $item)
                                                <tr>
                                                    <td>{{$item->id}}</td>
                                                        <td>{{$item->id}}</td>
                                                       
                                                        <td> {{$item->label}}</td>
                                                        <td>
                                                          @if(isset($item->tranche->label))
                                                          {{$item->tranche->label}}
                                                        
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
                                                    
                                                      

                                                        <li>  <a href="" data-bs-toggle="modal" class="btnmodifier" data-id="{{$item->id}}" data-bs-target="#UpdateSupplierModal"  style="color:green" > <i class="bi bi-eye-fill mx-2" ></i><span class="mx-2">Modifier</span></a></li>
                                                      
                                                        <li>  <a href="{{route('delete.ilo',['id'=>$item->id])}}"  style="color:red" onclick="return confirm('Are you sure you want to Delete this ?');"> <i class="bi bi-eye-fill mx-2" ></i><span class="mx-2">Delete</span></a></li>
                                                      
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
                <div id="modaldemobody" class="modal-body text-center p-4 pb-5">
                 
                </div>
            </div>
        </div>
    </div>


               <!-- MODAL ALERT MESSAGE is deleted  -->
   <div class="modal fade" id="modalforcheckdelete">
        <div class="modal-dialog modal-dialog-centered text-center " role="document">
            <div class="modal-content tx-size-sm">
            <form id="formdeletesuppliers" action="{{route('multidelete.ilos')}}" method="POST">
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
	
            

    	
                    <!-- Modal -->
<div class="modal" id="UpdateSupplierModal" tabindex="-1" aria-labelledby="UpdateSupplierModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="UpdateSupplierModalLabel">Update a ilo</h1>
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

                                                <span class="errorlabel text-danger"></span>
                                            </div>
                                            
                  </div>

                    

                       <div class="form-group">
                       <label class="form-label">la tranche</label>
                                            <select name="id_tranche" id="id_tranche" class="form-control form-select select2" data-bs-placeholder="Select tranche">
                                            <option value="choisir" disabled selected>choisir une tranche</option>
                                                @foreach($alltranches as $ele)
                                                <option value="{{$ele->id}}">{{$ele->label}}</option>
                                                @endforeach
                                                  
                                                </select>

                                                <span class="errorid_tranche text-danger">

                                                </span>
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

            

            <script>

                

$(document).ready(function(){


    url="";
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

btnmodallabel   = '#CreateSupplierModal';
 

  console.log('hi man');
 
$('.btnmodifier').on('click',function(){

  btnmodallabel = '#UpdateSupplierModal';
    console.log('id '+$(this).attr('data-id'));
  
    arraysuppliers= [];
    idilo =$(this).attr('data-id');
    allilos = <?php echo $allilos?>;
   console.log(allilos)
   allilos.forEach(element => {
  

    if(idilo == element.id){
      console.log(element)
    console.log($('#dropify-img').attr('src'))
      $('#label').val(element.label);
      console.log($('#id_tranche option[value="'+element.tranche.id+'"]')[0])
    $('#id_tranche option[value="'+element.tranche.id+'"]').attr("selected",true);
     
    }
   

    url='{{ route("update.ilo", ":id") }}';
   
   url = url.replace(':id',idilo);

  });
  
})

$('#btnaddsupplier').on('click',function(){
  idilo ='';
  // btnmodallabel = '#CreateSupplierModal';
 
  $('#label').val('');
   
   

    url="{{ route('create.ilo') }}";

});



$.ajaxSetup({
headers: {
'X-CSRF-TOKEN': $('meta[label="csrf-token"]').attr('content')
}
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



$(".formsupplierajax").on("submit", function(event){
    event.preventDefault();
  


          
            console.log('bool');
            thisform = $(this);
            url = url;
            method = thisform.attr('method');
       
        error = 0;
      

            if($('#label').val() == '' )
             {
                $('.errorlabel').show();
                error = 1;
               
                message = "error please enter your label";
                $('.errorlabel').html(message);

             }else{
                $('.errorlabel').hide();
            }

            if($('#id_tranche').val() == 'choisir' )
             {
                console.log('yes yes tes');
                $('.errorid_tranche').show();
                error = 1;
               
                message = "error please enter  tranche";
                $('.errorid_tranche').html(message);

             }else{
                $('.errorid_tranche').hide();
            }



       
       if(error == 0)
        {

          
           
            var formData = new FormData(this);

    console.log(formData);
  

console.log(url);

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
                        $('#UpdateSupplierModal').modal('hide') 
                        $('#UpdateSupplierModal').modal({ keyboard: false })

                        $content =  ` <button aria-label="Close" class="btn-close position-absolute" data-bs-dismiss="modal"><span aria-hidden="true">&times;</span></button>
                    <i class="icon icon-check fs-70 text-success lh-1 my-5 d-inline-block"></i>
                    <h4 class="text-success tx-semibold">Félicitations!</h4>
                    <p class="mg-b-20 mg-x-20" id="message_response">`+response.msg+`</p><button aria-label="Close" class="btn btn-success pd-x-25" onclick="{  location.reload();}" data-bs-dismiss="modal">Continue</button>`;

                        $('#modaldemobody').html($content);

                        $('#modaldemo4').modal('show');
                      
                      

                     
              
                   
                  

                }else if(response.status == 'error'){

$('#UpdateSupplierModal').modal('hide') 
      $('#UpdateSupplierModal').modal({ keyboard: false })
    
      $content =  ` <button aria-label="Close" class="btn-close position-absolute" data-bs-dismiss="modal"><span aria-hidden="true">&times;</span></button>
  <i class="icon icon-check fs-70 text-danger lh-1 my-5 d-inline-block"></i>
  <h4 class="text-danger tx-semibold">Opps sorry!</h4>
  <p class="mg-b-20 mg-x-20" id="message_response">`+response.msg+`</p><button aria-label="Close" class="btn btn-danger pd-x-25" onclick="{  location.reload();}" data-bs-dismiss="modal">Close</button>`;


      $('#modaldemobody').html($content);

      $('#modaldemo4').modal('show');

}

              
            }
        });
        

        }else{
            error = 0;
        }
      
       
     
    

   
  });

});

            </script>



@endsection