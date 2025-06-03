@extends('admin-master')

@section('content')


    <!--app-content open-->
    <div class="main-content app-content mt-0">
                <div class="side-app">

                    <!-- CONTAINER -->
                    <div class="main-container container-fluid">

                       <!-- PAGE-HEADER -->
                       <div class="page-header">
                            <h1 class="page-title">Create Reservation </h1>
                            <div>
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="javascript:void(0)">Pages</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Create Reservation</li>
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
              
              <form id="formreservationajax" action="{{route('store.reservation')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                          
                        <div class="card-header mb-2" > Les Infos du reservation </div>
                        <div class="card-body row">
                               
        
                                      <div class="form-group col-md-4 mb-4">
        
                               
        <div class="wrap-input100 validate-input input-group" data-bs-validate="Valid username is required: ex@abc.xyz">
        
        <label class="form-label">Tranche</label>
        <select required name="selected_uptranche" onchange="getselectedtrancheval(this)"  id="selected_uptranche" class="form-control form-select select2">
        <option value="" disabled selected>--Select--</option>
            @foreach($alltranches as $ele)
            <option value="{{$ele->id}}">{{$ele->label}}</option>
        
            @endforeach
        </select>
        
        
        
        
        <p class="errorselected_uptranche text-danger"></p>
        </div>
        
        </div>
        
        
        <div class="form-group col-md-4 mb-4">
        
                               
        <div class="wrap-input100 validate-input input-group" data-bs-validate="Valid username is required: ex@abc.xyz">
        
        <label class="form-label">Ilots</label>
        <select required name="selected_upilot" onchange="getselectedilotval(this)" id="selected_upilot" class="form-control form-select select2">
        <option value="" disabled selected>--Select--</option>
            <!-- @foreach($allilots as $ele)
            <option value="{{$ele->id}}">{{$ele->label}}</option>
        
            @endforeach -->
        </select>
        
      
        
        
        
        
        <p class="errorselected_upilot text-danger"></p>
        </div>
        
        </div>
        
                               <div class="form-group col-md-4  mb-4">
        
                               
                                    <div class="wrap-input100 validate-input input-group" data-bs-validate="Valid username is required: ex@abc.xyz">
        
                                    <label class="form-label">Lot</label>
                                    <select required onchange="getselectedlotval(this)"  name="selected_uplot" id="selected_uplot" class="form-control form-select select2">
                                    <option value="" disabled selected>--Select--</option>
                                      
                                    </select>
        
                               
                                   
        
                                    <p class="errorselected_uplot text-danger"></p>
                                    </div>
        
                              </div>
        
        
             
                             
        
        
        
                        </div>
        
                        <div class="card-body" id="big_box_lot" >
                        <table class="table table-striped table-bordered">
                        <tbody id="body_lotinfo" >
                        <tr>
            <th scope="row">Titre Foncier</th>
                                <td id="info-titre_foncier"></td>
                            </tr>
                            <tr>
                                <th scope="row">Surface</th>
                                <td id="info-surface"></td>
                            </tr>
                            <tr>
                                <th scope="row">Prix Vente</th>
                                <td id="info-prix_vente"></td>
                            </tr>

                            <tr>
                                <th scope="row">Prix Min</th>
                                <td id="info-prix_min"></td>
                            </tr>
                
                            <tr>
                                <th scope="row">Type </th>
                                <td id="info-type"></td>
                            </tr>
                        </tbody>
                    </table>
                        </div>
                        
        
                        <div class="card-header mb-4">
                            Les Prix
                        </div>
        
                        <div class="card-body row">
                            
                  
                               <div class="form-group col-md-4 mb-4">
             
             <div class="modal-header my-2">Prix De Vente</div>
        <div class="wrap-input100 validate-input input-group" data-bs-validate="Valid Telephone is required: ex@abc.xyz">
                                           <a href="javascript:void(0)" class="input-group-text bg-white text-muted">
                                           <i class="bi bi-currency-dollar"></i>
                                           </a>
                                        
                                           
                                           <input id="prix_vente" type="number" class="form-control input-lg  @error('prix_vente') is-invalid @enderror"    placeholder="Enter Prix Vente" name="prix_vente"  autocomplete="prix_vente" required autofocus>
        
                                           <p class="errorprix_vente text-danger"></p>
                                       </div>
                                       
             </div>


             <div class="form-group col-md-4 mb-4">
                        <div class="modal-header my-2"> Avance</div>
        
             <div class="wrap-input100 validate-input input-group" data-bs-validate="Valid Telephone is required: ex@abc.xyz">
                                                             <a href="javascript:void(0)" class="input-group-text bg-white text-muted">
                                                         
                                                             <i class="bi bi-currency-dollar"></i>
                                                             </a>
                                                          
                                                             
                                                             <input id="avance" type="number" class="form-control input-lg  @error('avance') is-invalid @enderror"  required  placeholder="Enter Avance" name="avance"  autocomplete="avance" autofocus>
             
                                                             <p class="erroravance text-danger"></p>
                                                         </div>
                                                         
                               </div>
        
                        
        
                             
                        </div>
                            
                        <div class="card-header mb-4">
                        Plus De Details
                        </div>
        
                        <div class="card-body row">
                        
                            
             
                                <div class="form-group col-md-4 mb-4">
        
                                
                                        <div class="wrap-input100 validate-input input-group" data-bs-validate="Valid username is required: ex@abc.xyz">
        
                                        <label class="form-label">Commercial</label>
                                       
                                        <select required name="selected_upcommercial" id="selected_upcommercial" class="form-control select2-show-search form-select" >
                                        <option value="0" disabled selected>--Select--</option>
                                            @foreach($allcommercials as $ele)
                                            <option value="{{$ele->id}}">{{$ele->name}}</option>
                                        
                                            @endforeach
                                        </select>
        
                                        <p class="errorselected_upcommercial text-danger"></p>
                                        </div>
        
                                </div>
        
                                
                               <div class="form-group col-md-4  mb-4">
        
                               
        <div class="wrap-input100 validate-input input-group" data-bs-validate="Valid username is required: ex@abc.xyz">
        
        <label class="form-label">Type Client</label>
        <select required onchange="getselectedtypeclientval(this)"  name="selected_uptypeclient" id="selected_uptypeclient" class="form-control form-select select2">
        <option value="0" disabled selected>--Select--</option>
        <option value="client_final">Client Final</option>
        <option value="investisseur">Investisseur</option>
        </select>
        
     
        
        
        <p class="errorselected_uptypeclient text-danger"></p>
        </div>
        
        </div>
        
        
        
        
        
                                <div class="form-group col-md-4 mb-4">
        
                                
        <div class="wrap-input100 validate-input input-group" data-bs-validate="Valid username is required: ex@abc.xyz">
        
     
     
                                            <label class="form-label">Client</label>
                                            <select required name="selected_uplistclient" id="selected_uplistclient" class="form-control select2-show-search form-select" >
                                              <option value="0" disabled selected>--Select--</option>
        
                                                </select>
                                      

        <p class="errorselected_uplistclient text-danger"></p>
        </div>
        
        </div>

        <div>
        <label class="form-label">Remarque</label>
            <div class="form-group">
                   <input class="form-control" placeholder="ecrire un remarque pour la reservation ..." name="remarque_desc" >
                
              
             </div>

        </div>
        
        
                              <div class="form-group col-md-4 mt-2 mb-4">
                              <label class="m-2">La Date De Reservation </label>
                          
                                            <div class="wrap-input100 validate-input input-group" data-bs-validate="Valid username is required: ex@abc.xyz">
                                                             <a href="javascript:void(0)" class="input-group-text bg-white text-muted">
                                                             <i class="bi bi-calendar-date"></i>
                                                             </a>
                                                             <input id="date_reservation" name="date_reservation" type="date" class="form-control input-lg  @error('date_reservation') is-invalid @enderror"    placeholder="Enter Titre Foncier"  required autocomplete="date_reservation" autofocus>
             
                                                             <p class="errordate_reservation text-danger"></p>
                                                         </div>
             
                                    </div>
             
                            
                                <div class="form-group col-md-4 mb-4 mt-2" style="margin-left:auto;">
        
                                
                                    <div class="wrap-input100 validate-input input-group" data-bs-validate="Valid username is required: ex@abc.xyz">
        
                                    <label class="form-label">Etat</label>
                                    <select required name="selected_upetat" id="selected_upetat" class="form-control form-select select2">
                                    <option value="0" disabled selected>--Select--</option>
                                   
                                       
                                        @foreach($allstatus as $st)
                                          
                                      
                                        <option value="{{$st->id}}">{{$st->label}}</option>
                                           
                                    
                                        @endforeach
                                      
                                      
                                       
                                       
                                    
        
                                    </select>
        
                                    <p class="errorselected_upetat text-danger"></p>
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

function closeload(){
   $('#modaldemo4').modal('hide');
$('#modaldemo4').modal({ keyboard: false });
} 
      

function getselectedtypeclientval(e)
{
    idselected =  $('#selected_uptypeclient').val();
   

   formData = {
       'selected_id':idselected,
   }
   
   
   // Fetch the preselected item, and add to the control
   var studentSelect = $('#selected_uplistclient');
   $.ajaxSetup({
   headers: {
   'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
   }
   });
   
   
   $.ajax({
   type: 'POST',
   url: "{{route('getajax.selectedfromtypeclient')}}",
   data:formData,
   }).then(function (response) {
    
   studentSelect.empty();
   $('#selected_uplistclient').empty();
   
   // create the option and append to Select2
   console.log(response.data);
   
   if(response.status == 200){
       response.data.forEach(element => {
       console.log(element);
      
       var option = new Option(element.name, element.id, true, true);
   studentSelect.append(option).trigger('change');
   });
   
   studentSelect.val(null).trigger('change');
   
   }else{
       studentSelect.empty();
       $('#selected_uplistclient').empty();
       studentSelect.val(0).trigger('change');
       $('#selected_uplistclient').val(0).trigger('change');
     
   }
   
   });
   
   
   
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
$('#selected_uplot').empty();

// create the option and append to Select2


if(response.status == 200){
    response.data.forEach(element => {
    console.log(element);
   
    var option = new Option(element.label, element.id, true, true);
studentSelect.append(option).trigger('change');
});

studentSelect.val(0).trigger('change');
studentSelect.val(null).trigger('change');
$('#selected_uplot').val(0).trigger('change');
$('#selected_uplot').val(null).trigger('change');
}else{
    studentSelect.empty();
    $('#selected_uplot').empty();
    studentSelect.val(0).trigger('change');
    $('#selected_uplot').val(0).trigger('change');
    studentSelect.val(null).trigger('change');
  
}

});



setTimeout(closeload, 2500);



}



function getselectedilotval(e){

idselected =  $('#selected_upilot').val();


formData = {
'selected_id':idselected,
}

$('#modaldemo4').modal('show');

$content = `<div class="spinner-border text-secondary me-2" role="status">
                                            <span class="visually-hidden">Loading...</span>
                                        </div>`;





$('#modaldemobody').html('');
$('#modaldemobody').html($content);

// Fetch the preselected item, and add to the control
var studentSelect = $('#selected_uplot');
$.ajaxSetup({
headers: {
'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
}
});


$.ajax({
type: 'POST',
url: "{{route('getajax.selectedfromilot')}}",
data:formData,
}).then(function (response) {
studentSelect.empty();
studentSelect.val(null).trigger('change');
studentSelect.val(0).trigger('change');
// create the option and append to Select2

if(response.status == 200){
    response.data.forEach(element => {
console.log(element);


var option = new Option(element.name, element.id, true, true);
studentSelect.append(option);
studentSelect.val(0).trigger('change');
studentSelect.val(null).trigger('change');
});

$('#modaldemo4').modal('hide');
$('#modaldemo4').modal({ keyboard: false });


}else{
    studentSelect.empty();
    studentSelect.val(0).trigger('change');
    studentSelect.val(null).trigger('change');
}



});



setTimeout(closeload, 2500);



}


function getselectedlotval(){

              
idselected =  $('#selected_uplot').val();

console.log(idselected);

formData = {
'selected_id':idselected,
}

$('#modaldemo4').modal('show');

$content = `<div class="spinner-border text-secondary me-2" role="status">
                                            <span class="visually-hidden">Loading...</span>
                                        </div>`;





$('#modaldemobody').html('');
$('#modaldemobody').html($content);


// Fetch the preselected item, and add to the control
var boxshowdata = $('#selected_uplot');
alltypes = <?php echo $alltypes; ?>;
$.ajaxSetup({
headers: {
'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
}
});


$.ajax({
type: 'POST',
url: "{{route('getajax.singlelot')}}",
data:formData,
}).then(function (response) {
   
// create the option and append to Select2

if(response.status == 200){
    
    console.log(response.data);
   
    
    $('#info-titre_foncier').html(response.data.titre_foncier);
    $('#info-surface').html(response.data.surface);
    if(response.data.prix_vente != '' && response.data.prix_vente != null && response.data.prix_vente != 0)
    {
        $('#info-prix_vente').html(response.data.prix_vente+' DH');

    }else{
        $('#info-prix_vente').html('0 DH');
    }
   
    if(response.data.prix_minimaum != '' && response.data.prix_minimaum != null && response.data.prix_minimaum != 0)
    {
        $('#info-prix_min').html(response.data.prix_minimaum+' DH');
    }else{
        $('#info-prix_min').html(response.data.prix_minimaum+' DH');
    
    }
    
    alltypes.forEach(type => {
        if(type.id == response.data.type_id){
            $('#info-type').html(type.label);
        }
       
    });

   

}else{
    $('#selected_uplot').empty();
    $('#selected_uplot').val(0).trigger('change');
}


});


setTimeout(closeload, 2500);


}

function goback()
{
    window.location.href ="{{url('/admin/reservations/all')}}";
}

$(document).ready(function(){





$.ajaxSetup({
headers: {
'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
}
});


$("#formreservationajax").on("submit", function(event){
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

                    $('.errorhypotheque').hide();
                        $('.errorsurface').hide();
                        $('.errordate_reservation').hide();
                        $('.errorprix_vente').hide();
                       
                        $('.erroravance').hide();
                      
                        $('.errorselected_uplot').hide();
                        $('.errorselected_uptranche').hide();
                        
                        $('.errorselected_upcommercial').hide();
                        $('.errorselected_uplistclient').hide();
                    
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
                  
                    
                    if(response.input == 'avance'){
                        $('.erroravance').show();

                              
                            message = response.msg;


                            $('.erroravance').html(message);
                    }else{
                        $('.erroravance').hide();
                    } 
                  
                    
                 
                    
                    if(response.input == 'date_reservation'){
                        $('.errordate_reservation').show();

                              
                            message = response.msg;


                            $('.errordate_reservation').html(message);
                    }else{
                        $('.errordate_reservation').hide();
                    } 
                    
               


                    if(response.input == 'selected_uplistclient'){
                        $('.errorselected_uplistclient').show();

                              
                            message = response.msg;


                            $('.errorselected_uplistclient').html(message);
                    }else{
                        $('.errorselected_uplistclient').hide();
                    } 

                    if(response.input == 'selected_upcommercial'){
                        $('.errorselected_upcommercial').show();

                              
                            message = response.msg;


                            $('.errorselected_upcommercial').html(message);
                    }else{
                        $('.errorselected_upcommercial').hide();
                    }
                    
                    if(response.input == 'selected_upetat'){
                        $('.errorselected_upetat').show();

                              
                            message = response.msg;


                            $('.errorselected_upetat').html(message);
                    }else{
                        $('.errorselected_upetat').hide();
                    }
                    
                    
                    if(response.input == 'selected_uplot'){
                        $('.errorselected_uplot').show();

                              
                            message = response.msg;


                            $('.errorselected_uplot').html(message);
                    }else{
                        $('.errorselected_uplot').hide();
                         $('.errorselected_uptranche').hide();
                    } 

                    if(response.input == 'selected_uptranche'){
                        $('.errorselected_uptranche').show();

                              
                            message = response.msg;


                            $('.errorselected_uptranche').html(message);
                    }else{
                        $('.errorselected_uptranche').hide();
                         $('.errorselected_uptranche').hide();
                    } 
                    
                    if(response.input == 'none'){

                     
                        $('.errordate_reservation').hide();
                       
                    
                        $('.erroravance').hide();
                       
                        $('.errorselected_uplot').hide();
                        $('.errorselected_uptranche').hide();
                        
                        $('.errorselected_upcommercial').hide();
                        $('.errorselected_uplistclient').hide();

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

   
     
    

   
  });

});

            </script>



@endsection