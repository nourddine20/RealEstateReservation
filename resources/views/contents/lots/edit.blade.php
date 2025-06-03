@extends('admin-master')

@section('content')

    <!--app-content open-->
    <div class="main-content app-content mt-0">
                <div class="side-app">

                    <!-- CONTAINER -->
                    <div class="main-container container-fluid">

                       <!-- PAGE-HEADER -->
                       <div class="page-header">
                            <h1 class="page-title">Update Reservation </h1>
                            <div>
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="javascript:void(0)">Pages</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Edit Reservation</li>
                                </ol>
                            </div>
                        </div>
                        <!-- PAGE-HEADER END -->


                                         <!-- MODAL ALERT MESSAGE -->
    <div class="modal fade" id="modaldemo4">
        <div class="modal-dialog modal-dialog-centered text-center " role="document">
            <div class="modal-content tx-size-sm">
                <div id="modaldemobody" class="modal-body text-center p-4 pb-5">
                 
                </div>
            </div>
        </div>
    </div>



  
               
    <div class="card-body bg-white">
              
                      
      <form id="formlotajax" action="{{route('update.lot')}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <input type="hidden" id="lot_id" name="lot_id" value="{{$selectedlot->id}}" />
                <div class="card-header mb-2" > Les Infos du Lot </div>
                <div class="card-body row">
                        <div class="form-group col-md-12 mb-4">
     
                        <div class="modal-header my-2">Num Lot</div>
                                                <div class="wrap-input100 validate-input input-group" data-bs-validate="Valid username is required: ex@abc.xyz">
                                                     <a href="javascript:void(0)" class="input-group-text bg-white text-muted">
                                                     <i class="bi bi-tags"></i>
                                                     </a>
                                                     <input id="num_lot" value="{{$selectedlot->name}}" type="text" class="form-control input-lg  @error('num_lot') is-invalid @enderror"    placeholder="Enter Num Lot" name="num_lot"  required autocomplete="num_lot" autofocus>
     
                                                     <p class="errornum_lot text-danger"></p>
                                                 </div>
     
                                             
                                                 
                              </div>

                       <div class="form-group col-md-3 mb-4">

                       
                            <div class="wrap-input100 validate-input input-group" data-bs-validate="Valid username is required: ex@abc.xyz">

                            <label class="form-label">Tranches</label>
                            <select required name="selected_uptranche" onchange="getselectedtrancheval(this)" id="selected_uptranche" class="form-control form-select select2">
                            <option value="0" disabled selected>--Select--</option>
                            @foreach($alltranches as $tran)
                            <option  <?php if($selectedlot->ilot != null && $tran->id == $selectedlot->ilot->tranche->id){?> selected <?php }?>  value="{{$tran->id}}">{{$tran->label}}</option>
                            @endforeach
                          
                            </select>

                       
                           

                            <p class="errorselected_uptranche text-danger"></p>
                            </div>

                      </div>


     
                        <div class="form-group col-md-3 mb-4">

                        
                                <div class="wrap-input100 validate-input input-group" data-bs-validate="Valid username is required: ex@abc.xyz">

                                <label class="form-label">Ilots</label>
                                <select required name="selected_upilot" id="selected_upilot" class="form-control form-select select2">
                                <option value="0" disabled selected>--Select--</option>
                                @if($selectedlot->ilot != null)
                                <option  selected value="{{$selectedlot->ilot->id}}">{{$selectedlot->ilot->label}}</option>
                                @endif
                               
                                </select>

                                <p class="errorselected_upilot text-danger"></p>
                                </div>

                        </div>


     
                        <div class="form-group col-md-3 mb-4">

                        
                                <div class="wrap-input100 validate-input input-group" data-bs-validate="Valid username is required: ex@abc.xyz">

                                <label class="form-label">Type</label>
                                <select required name="selected_uptype" id="selected_uptype" class="form-control form-select select2">
                                <option value="0" disabled selected>--Select--</option>
                                    @foreach($alltype as $ele)
                                   
                                    <option <?php if($ele->id == $selectedlot->type->id){?> selected <?php }?> value="{{$ele->id}}">{{$ele->label}}</option>
                                
                                
                                    @endforeach
                                </select>

                                <p class="errorselected_uptype text-danger"></p>
                                </div>

                        </div>

                        <div class="form-group col-md-3 mb-4">

                        
                            <div class="wrap-input100 validate-input input-group" data-bs-validate="Valid username is required: ex@abc.xyz">

                            <label class="form-label">Etat</label>
                            <select required name="selected_upetat" id="selected_upetat" class="form-control form-select select2">
                            <option value="0" disabled selected>--Select--</option>
                           
                               
                                @foreach($allstatus as $st)
                                  
                                @if($st->type == 'ETAT')
                                <option <?php if($st->id == $selectedlot->etat->id){?> selected <?php }?>  value="{{$st->id}}">{{$st->label}}</option>
                                   
                             @endif
                                  
                                @endforeach
                              
                              
                               
                               
                            

                            </select>

                            <p class="errorselected_upetat text-danger"></p>
                            </div>

                        </div>

                </div>
                

                <div class="card-header mb-4">
                    Les Prix
                </div>

                <div class="card-body row">
                    
                <div class="form-group col-md-4 mb-4">
                <div class="modal-header my-2">Prix Par M2</div>

     <div class="wrap-input100 validate-input input-group" data-bs-validate="Valid Telephone is required: ex@abc.xyz">
                                                     <a href="javascript:void(0)" class="input-group-text bg-white text-muted">
                                                 
                                                     <i class="bi bi-currency-dollar"></i>
                                                     </a>
                                                  
                                                     
                                                     <input id="prix_m2" type="number" class="form-control input-lg  @error('prix_m2') is-invalid @enderror" value="{{$selectedlot->prix_m2}}"  required  placeholder="Enter Prix Au M2" name="prix_m2"  autocomplete="prix_m2" autofocus>
     
                                                     <p class="errorprix_m2 text-danger"></p>
                                                 </div>
                                                 
                       </div>

                       <div class="form-group col-md-4 mb-4">
     
                       <div class="modal-header my-2">Prix Min</div>
     <div class="wrap-input100 validate-input input-group" data-bs-validate="Valid Telephone is required: ex@abc.xyz">
                                                     <a href="javascript:void(0)" class="input-group-text bg-white text-muted">
                                                     <i class="bi bi-currency-dollar"></i>
                                                     </a>
                                                  
                                                     
                                                     <input id="prix_min" type="number" class="form-control input-lg  @error('prix_min') is-invalid @enderror"  value="{{$selectedlot->prix_minimaum}}"    placeholder="Enter Prix Min" name="prix_min"  autocomplete="prix_min" required autofocus>
     
                                                     <p class="errorprix_min text-danger"></p>
                                                 </div>
                                                 
                       </div>

                       <div id="prixvent_box" class="form-group col-md-4 mb-4">
     
                       <div class="modal-header my-2">Prix De Vente</div>

     <div  class="wrap-input100 validate-input input-group" data-bs-validate="Valid Telephone is required: ex@abc.xyz">
                                                     <a href="javascript:void(0)" class="input-group-text bg-white text-muted">
                                                     <i class="bi bi-currency-dollar"></i>
                                                     </a>
                                                  
                                                     
                                                     <input id="prix_vente" type="number" class="form-control input-lg  @error('prix_vente') is-invalid @enderror" value="{{$selectedlot->prix_vente}}"    placeholder="Enter Prix Vente" name="prix_vente" autocomplete="prix_vente" autofocus>
     
                                                     <p class="errorprix_vente text-danger"></p>
                                                 </div>
                                                 
                       </div>
                      
                </div>
                    
                <div class="card-header mb-4">
                Plus De Details
                </div>

                <div class="card-body row">
                
                      <div class="form-group col-md-6 mb-4">
                      <div class="modal-header my-2">Titre Foncier </div>
                  
                                    <div class="wrap-input100 validate-input input-group" data-bs-validate="Valid username is required: ex@abc.xyz">
                                                     <a href="javascript:void(0)" class="input-group-text bg-white text-muted">
                                                     <i class="bi bi-phone-landscape"></i>
                                                     </a>
                                                     <input type="hidden" id="old_titre_foncier" name="old_titre_foncier" value="{{$selectedlot->titre_foncier}}" />
                                                     <input id="titre_foncier" name="titre_foncier" type="text" class="form-control input-lg  @error('titre_foncier') is-invalid @enderror" value="{{$selectedlot->titre_foncier}}"    placeholder="Enter Titre Foncier"  required autocomplete="titre_foncier" autofocus>
     
                                                     <p class="errortitre_foncier text-danger"></p>
                                                 </div>
     
                            </div>
     
                    <div class="form-group col-md-6 mb-4">
                    <div class="modal-header my-2">Surface </div>
     
                                 <div class="wrap-input100 validate-input input-group" data-bs-validate="Valid Telephone is required: ex@abc.xyz">
                                                          <a href="javascript:void(0)" class="input-group-text bg-white text-muted">
                                                          <span class="bi bi-layers"></span>
                                                          </a>
                                                          <input id="surface" type="number" class="form-control input-lg  @error('email') is-invalid @enderror"  value="{{$selectedlot->surface}}"    placeholder="Enter Surface" name="surface" required autocomplete="email" autofocus>
          
                                                          <p class="errorsurface text-danger"></p>
                                                      </div>
                                                      
                       </div>
     
                            
                            <div id="hypotheque_box" class="form-group col-md-6 mb-4">
          
                            <div class="modal-header my-2">Hypotheque </div>
                                     
                                                      <div class="wrap-input100 validate-input input-group" data-bs-validate="Valid Telephone is required: ex@abc.xyz">
                                                          <a href="javascript:void(0)" class="input-group-text bg-white text-muted">
                                                          <span class="bi bi-layers"></span>
                                                          </a>
                                                          <input id="uphypotheque" type="number" class="form-control input-lg  @error('email') is-invalid @enderror"  value="{{$selectedlot->uphypotheque}}"    placeholder="Enter hypotheque" name="hypotheque" autocomplete="email" autofocus>
          
                                                          <p class="errorhypotheque text-danger"></p>
                                                      </div>
                                                      
                            </div>
     
     


                </div>
                
             



                      


                  <div class="col-md-12">
                   
               

                                <div id="box_modalfooter" class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Save changes</button>
      </div>  

                   

                  </div>
                  
                  
                        
                </div>

              
                
              </form>


              </div>

               
               


                    </div>
                    <!-- CONTAINER CLOSED -->
                </div>
            </div>
            <!--app-content closed-->

            <script src="https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.14.0/js/selectize.min.js" integrity="sha512-VReIIr1tJEzBye8Elk8Dw/B2dAUZFRfxnV2wbpJ0qOvk57xupH+bZRVHVngdV04WVrjaMeR1HfYlMLCiFENoKw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
          <link rel="stylesheet" type="text/css" href="selectize.css" />
          <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.14.0/css/selectize.bootstrap4.css" integrity="sha512-PwfVn33vwl4Z3lsd5n8e1Zjh0pA82jVLdKYvufhlmV/LiXuxNIlDjUIK8YIOzGM8l6hscvQz3uaq3DVZII/LTA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
          <script>
           $('#suppselect').selectpicker();
          </script>

          

<script>

function goback()
{
    window.location.href ="{{url('/admin/lots/all')}}";
}


function getselectedtrancheval(e){

idselected =  $('#selected_uptranche').val();


formData = {
'selected_id':idselected,
}


// Fetch the preselected item, and add to the control
var studentSelect = $('#selected_upilot');

$.ajaxSetup({
headers: {
'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
}
});


$.ajax({
type: 'POST',
url: "{{route('getajax.selectedfromtranche')}}",
data:formData,
}).then(function (response) {

studentSelect.empty();

// create the option and append to Select2


if(response.data != null || response.data != []){
response.data.forEach(element => {
console.log(element);

var option = new Option(element.label, element.id, true, true);
studentSelect.append(option);


});
studentSelect.val(localStorage.getItem('idlotforupdate')).trigger('change');


}else{
    studentSelect.val(localStorage.getItem('idlotforupdate')).trigger('change');

}

});



}



$(document).ready(function(){


        $('#formlotajax').on('submit',function(event){

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

                    $('.errorhypotheque').hide();
                        $('.errorsurface').hide();
                        $('.errortitre_foncier').hide();
                        $('.errorprix_vente').hide();
                        $('.errorprix_min').hide();
                        $('.errorprix_m2').hide();
                        $('.errornum_lot').hide();
                        $('.errorselected_uptranche').hide();
                        $('.errorselected_uptype').hide();
                        $('.errorselected_upilot').hide();
                    
                      // initialized with no keyboard
                        $('#modaldemo3').modal('hide') 
                        $('#modaldemo3').modal({ keyboard: false })
                     
                        $content =  ` <button aria-label="Close" class="btn-close position-absolute" data-bs-dismiss="modal"><span aria-hidden="true">&times;</span></button>
                    <i class="icon icon-check fs-70 text-success lh-1 my-5 d-inline-block"></i>
                    <h4 class="text-success tx-semibold">Félicitations!</h4>
                    <p class="mg-b-20 mg-x-20" id="message_response">`+response.msg+`</p><button aria-label="Close" class="btn btn-success pd-x-25" onclick="goback()" data-bs-dismiss="modal">Continue</button>`;

                        $('#modaldemobody').html($content);

                        $('#modaldemo4').modal('show');
                      
                }else if(response.status == 'error'){
                    if(response.input == 'num_lot')
                    {
                        console.log('hellowordl')
                    $('.errornum_lot').show();

                              
                            message = response.msg;
                           
                         
                  $('.errornum_lot').html(message);
                    }else{
                        $('.errornum_lot').hide();
                    } 
                    
                    if(response.input == 'prix_m2'){
                        $('.errorprix_m2').show();

                              
                            message = response.msg;


                            $('.errorprix_m2').html(message);
                    }else{
                        $('.errorprix_m2').hide();
                    } 
                     if(response.input == 'prix_min'){
                        $('.errorprix_min').show();

                              
                            message = response.msg;


                            $('.errorprix_min').html(message);
                    }else{
                        $('.errorprix_min').hide();
                    } 
                    
                    if(response.input == 'prix_vente'){
                        $('.errorprix_vente').show();

                              
                            message = response.msg;


                            $('.errorprix_vente').html(message);
                    }else{
                        $('.errorprix_vente').hide();
                    } 
                    
                    if(response.input == 'titre_foncier'){
                        $('.errortitre_foncier').show();

                              
                            message = response.msg;


                            $('.errortitre_foncier').html(message);
                    }else{
                        $('.errortitre_foncier').hide();
                    } 
                    
                    if(response.input == 'surface'){
                        $('.errorsurface').show();

                              
                            message = response.msg;


                            $('.errorsurface').html(message);
                    }else{
                        $('.errorsurface').hide();
                    } 
                    
                    if(response.input == 'hypotheque'){
                        $('.errorhypotheque').show();

                              
                            message = response.msg;


                            $('.errorhypotheque').html(message);
                    }else{
                        $('.errorhypotheque').hide();
                    } 


                    if(response.input == 'selected_upilot'){
                        $('.errorselected_upilot').show();

                              
                            message = response.msg;


                            $('.errorselected_upilot').html(message);
                    }else{
                        $('.errorselected_upilot').hide();
                    } 

                    if(response.input == 'selected_uptype'){
                        $('.errorselected_uptype').show();

                              
                            message = response.msg;


                            $('.errorselected_uptype').html(message);
                    }else{
                        $('.errorselected_uptype').hide();
                    }
                    
                    if(response.input == 'selected_upetat'){
                        $('.errorselected_upetat').show();

                              
                            message = response.msg;


                            $('.errorselected_upetat').html(message);
                    }else{
                        $('.errorselected_upetat').hide();
                    }
                    

                    if(response.input == 'selected_uptranche'){
                        $('.errorselected_uptranche').show();

                              
                            message = response.msg;


                            $('.errorselected_uptranche').html(message);
                    }else{
                        $('.errorselected_uptranche').hide();
                    } 
                    
                    if(response.input == 'none'){

                        $('.errorhypotheque').hide();
                        $('.errorsurface').hide();
                        $('.errortitre_foncier').hide();
                        $('.errorprix_vente').hide();
                        $('.errorprix_min').hide();
                        $('.errorprix_m2').hide();
                        $('.errornum_lot').hide();
                        $('.errorselected_uptranche').hide();
                        $('.errorselected_uptype').hide();
                        $('.errorselected_upilot').hide();

                        $('#modaldemo3').modal('hide') 
                  $('#modaldemo3').modal({ keyboard: false })
                      
                        $content =  ` <button aria-label="Close" class="btn-close position-absolute" data-bs-dismiss="modal"><span aria-hidden="true">&times;</span></button>
                    <i class="icon icon-check fs-70 text-danger lh-1 my-5 d-inline-block"></i>
                    <h4 class="text-danger tx-semibold">Opps sorry!</h4>
                    <p class="mg-b-20 mg-x-20" id="message_response">`+response.msg+`</p><button aria-label="Close" class="btn btn-danger pd-x-25" data-bs-dismiss="modal">Close</button>`;


                    $('#modaldemobody').html('');
                        $('#modaldemobody').html($content);

                        $('#modaldemo4').modal('show');
                    }

                }


         
              
            }
        });
         

        })

       
         
      
                    
btnmodallabel   = '#CreateSupplierModal';
 

  console.log('hi man');
 


$.ajaxSetup({
headers: {
'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
}
});

 


});

            </script>



@endsection