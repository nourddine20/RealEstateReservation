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


                        <div class="row row-sm">
                            <div class="col-lg-12">
                                <div class="card">
                                    <div class="card-header" style="display:flex;justify-content:space-between;">
                                        <h3 class="card-title">List Demandes</h3>
                                    
                                    </div>
                                    <div class="col-12 col-sm-12">
                                    <div class="card">
                                      <h3 class="card-title m-3 mx-5">
                                        Actions pour commandes sélectionnées

                                        </h3>
                                        <div class="card-header">
                                            
                                         <h3 class="card-title mx-3">
                                                       <a class="btn btn-primary text-white"  data-bs-toggle="modal"  data-bs-target="#status-edit"  id="btntest"> Change Statu</a>
                                                        </h3>

                                            <h3 class="card-title mx-3">
                                           <a class="btn btn-danger text-white"  data-bs-toggle="modal"  data-bs-target="#modalforcheckdelete" id="btndeletedemandes"> Delete </a>
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
                                                       
                                                         <th class="border-bottom-0" style="width:fit-content;">Nom Complet</th>
                                                         <th class="border-bottom-0" style="width:fit-content;">Telephone</th>
                                                         <th class="border-bottom-0" style="width:fit-content;">Email</th>
                                                         <th class="border-bottom-0" style="width:fit-content;">Ville</th>
                                                         <th class="border-bottom-0" style="width:fit-content;">Statu</th>
                                                        
                                                         <th class="border-bottom-0" style="width:fit-content;">Actions</th>
                                                    </tr>
                                                </thead>
                                                <tbody id="ajaxcontent">
                                       
                                                @foreach($alldemandes as $item)
                                                <tr>
                                                  <td>{{$item->id}}</td>
                                                       
                                                        <td> {{$item->name}}</td>
                                                        <td>{{$item->phone}}</td>
                                                        <td>{{$item->email}}</td>
                                                        <td>{{$item->city}}</td>
                                                       <td>  <span class="badge  rounded-pill text-white p-2 px-3" style="cursor: pointer;background-color:<?=($item->statu['color'])?>;">{{$item->statu['label']}}</span></td>
                                                      
                                                        <td>
                                                        <div class="btn-group mt-2 mb-2">
                                                    <!-- <button type="button" class="btn btn-default dropdown-toggle" data-bs-toggle="dropdown">
                                                            Action <span class="caret"></span>
                                                        </button>
                                                    <ul class="dropdown-menu" role="menu">
                                                        <li class="dropdown-plus-title">
                                                            Dropdown
                                                            <b class="fa fa-angle-up" aria-hidden="true"></b>
                                                        </li> 
                                                    
                                                        <li><a href="#" id="show-details"  style="color:#60A5FA;"><i class="bi bi-eye-fill mx-2"></i><span class="mx-2">View</span></a></li>
                                                      
                                                        <li>  <a href="{{route('delete.demande',['id'=>$item->id])}}"  style="color:red" onclick="return confirm('Are you sure you want to Delete this?');"> <i class="bi bi-eye-fill mx-2" ></i><span class="mx-2">Delete</span></a></li>
                                                      
                                                    </ul> -->

                                                    <ul style="list-style: none; display:flex;">
                                                    <li> <a href="#" class="btnshowinfo" data-bs-toggle="modal" data-id="{{$item->id}}" data-bs-target="#show-info" ><i class="bi bi-eye text-orange mx-2"></i></a></li>
                                                    <li> <a href="#" class="btnupdatestatus"  data-bs-toggle="modal" data-id="{{$item->id}}" data-bs-target="#status-edit" ><i class="bi bi-pencil-square text-blue mx-2"></i></a></li>
                                                    <li>  <a href="{{route('delete.demande',['id'=>$item->id])}}"  style="color:red" onclick="return confirm('Are you sure you want to Delete this?');"> <i class="bi bi-trash mx-2" ></i></a></li>
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
            <!--- modal edit status --->

                
            <div class="modal fade" id="status-edit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel2" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered" role="document">
		<div class="modal-content">
		
	

			<div class="modal-header border-bottom-0">
				<h5 class="modal-title" id="exampleModalLabel2"></h5>
				
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			</div>
			<div class="alert alert-danger" id="status-modal-error" hidden></div>
			<form id="update-orderstatu" action="{{ route('change.demandestatu')}}" method="POST">
                @csrf
			<input type="hidden" name="type_statu" id="type_statu" value="DEM" />
            <input type="hidden" name="ids_orders[]"  id="inputs_idsorderisnull" />

			<div class="modal-body">

				<div class="form-header text-center mt-2">
					<span class="btn btn-sm btn-pill btn-light mb-3">
						
				<span id="title_status_box">Les Status Disponible</span>	
                </span>
				</div>
				<div class="form-row">
					<div class="form-group col-md-12 mb-0">
						<div class="form-group" id="status_box">
                        <select class="form-control" name="selectedstatu" id="selectedstatu">
                                       @foreach($allstatus as $item)
                                     
                                        <option data-value="{{$item->color}}"  class="{{$item->code}}" data-name="{{$item->code}}" value="{{$item->id}}">{{$item->label}}</option>
                                       
                                      @endforeach        
                                                    
                                    </select>		
						</div>
						
					
			        </div>
		</div>


<div class="form-footer text-center mt-5 mb-5">
<button data-dismiss="modal" class="btn btn-light">Cancel</button>
<button type="submit" class="btn btn-success">Save</button>
					</div>

</div>
</form>
</div>
</div>
</div>

            <!--- end modal edit status -->


            <!---- START show Info ------------->

               
            <div class="modal fade" id="show-info" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel2" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered" role="document">
		<div class="modal-content">
		
	

			<div class="modal-header border-bottom-0">
				<h5 class="modal-title" id="exampleModalLabel2"></h5>
				
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			</div>
		
			<div class="modal-body">

				<div class="form-header text-center mt-2">
					<span class="btn btn-sm btn-pill btn-light mb-3">
						
				<span id="title_status_box">Les information de la demande</span>	
                </span>
				</div>
                <table class="table table-striped table-bordered">
				<tbody id="body_customerinfo">
					<tr>
						<th scope="row">Full name</th>
						<td id="info-name"></td>
					</tr>
					<tr>
						<th scope="row">Telephone</th>
						<td id="info-phone"></td>
					</tr>
					<tr>
						<th scope="row">Email</th>
						<td id="info-email"></td>
					</tr>
        
					<tr>
						<th scope="row">Ville</th>
						<td id="info-city"></td>
					</tr>

                    <tr>
						<th scope="row">Message</th>
						
                     <td id="info-message">
                   
                     </td>

                    
					</tr>
				</tbody>
			</table>



</div>

</div>
</div>
</div>


            <!-------- END Show Info   -------->


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
            <form id="formdeletedemandes" action="{{route('multidelete.demandes')}}" method="POST">
                @csrf
                <div class="modal-body text-center  p-4 pb-5" id="modalforcheckdeletebody">
                    <button aria-label="Close" class="btn-close position-absolute" data-bs-dismiss="modal"><span aria-hidden="true">&times;</span></button>
                    <i class="icon icon-info fs-70 text-danger lh-1 my-5 d-inline-block"></i>
                    <h4 class="text-danger tx-semibold">warning!</h4>
                    <p class="mg-b-20 mg-x-20" id="message_response"> Est ce que vraiment veux supprimer ces demandes  </p>
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

  var selected_row= [];
        var row_ids = [];


        $('#btndeletedemandes').on('click',function(){
            console.log('deleted please');
            selected_row = table.column(0).checkboxes.selected();
                     row_ids = [];
                    console.log('slected-rows : ');
                     
                        $.each(selected_row,function(key,order_id){
                            console.log(order_id);
                            row_ids.push(order_id);

                        })

                        console.log(row_ids);
            $('#idsfordelete').val(row_ids);
            
        });
 
        $.ajaxSetup({
  headers: {
    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
  }
});



$('#btntest').on('click',function(){
                    $('#status-edit #title_status_box').html("Les Status Disponible");
                    selected_row = table.column(0).checkboxes.selected();
                     row_ids = [];
                    console.log('slected-rows : ');
                     
                        $.each(selected_row,function(key,order_id){
                            console.log(order_id);
                            row_ids.push(order_id);

                        })

                        console.log(row_ids);

                        $('#inputs_idsorderisnull').val(row_ids);
                        console.log($('#inputs_idsorderisnull').val())

                       
                        
                    });


          
     


  
            

                    $('.btnshowinfo').on('click',function(){

iddemande =$(this).attr('data-id');
alldemandes = <?php echo $alldemandes ?>;


alldemandes.forEach(item=>{




if(item.id == iddemande)
{

console.log(item)
console.log(item.name)
$('#info-name').html(item.name);
$('#info-city').html(item.city);
$('#info-email').html(item.email);
$('#info-message').html(item.message);
$('#info-phone').html('0'+item.phone);



}



});

                    });

$('.btnupdatestatus').on('click',function(){
                    console.log('j');
                    console.log('id '+$(this).attr('data-id'));
                 
                   row_ids = [];
     
   iddemande =$(this).attr('data-id');
  

  
   row_ids.push(iddemande);

                $('#inputs_idsorderisnull').val(row_ids);
                console.log($('#inputs_idsorderisnull').val());

            });


            $("#update-orderstatu").on("submit", function(event){
            event.preventDefault();
            console.log('bool');
            thisform = $(this);
            url = thisform.attr('action');
            method = thisform.attr('method');
       
      


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
                        $('#status-edit').modal('hide') 
                        $('#status-edit').modal({ keyboard: false })
                     
                        $content =  ` <button aria-label="Close" class="btn-close position-absolute" data-bs-dismiss="modal"><span aria-hidden="true">&times;</span></button>
                    <i class="icon icon-check fs-70 text-success lh-1 my-5 d-inline-block"></i>
                    <h4 class="text-success tx-semibold">Félicitations!</h4>
                    <p class="mg-b-20 mg-x-20" id="message_response">`+response.msg+`</p><button aria-label="Close" class="btn btn-success pd-x-25" onclick="{  location.reload();}" data-bs-dismiss="modal">Continue</button>`;

                        $('#modaldemobody').html($content);

                        $('#modaldemo4').modal('show');
                      
                }else{

                  $('#status-edit').modal('hide') 
                  $('#status-edit').modal({ keyboard: false })
                      
                        $content =  ` <button aria-label="Close" class="btn-close position-absolute" data-bs-dismiss="modal"><span aria-hidden="true">&times;</span></button>
                    <i class="icon icon-info fs-70 text-danger lh-1 my-5 d-inline-block"></i>
                    <h4 class="text-danger tx-semibold">Opps sorry!</h4>
                    <p class="mg-b-20 mg-x-20" id="message_response">`+response.msg+`</p><button aria-label="Close" class="btn btn-danger pd-x-25" data-bs-dismiss="modal">Close</button>`;


                    $('#modaldemobody').html('');
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

      
     
    

   
  });

        



        $('#formdeletedemandes').on('submit',function(event){

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

   




});
            </script>


@endsection