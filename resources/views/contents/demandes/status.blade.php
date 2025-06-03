@extends('admin-master')

@section('content')




   <!--app-content open-->
   <div class="main-content app-content mt-0">
                <div class="side-app">

                    <!-- CONTAINER -->
                    <div class="main-container container-fluid">

                     <div class="page-header">
		<div class="page-leftheader">
			<h4 class="page-title mb-0">Status</h4>
			<ol class="breadcrumb">
				
			</ol>
		</div>

	</div>

   

                        <!-- Row -->
                        <div class="row row-sm">
                                   <!-- COL-END -->
                            <div class="col-xl-12">
                                <div class="card">
                                    <div class="card-header">
                                        <h3 class="card-title">List Status Des Demandes</h3>
                                    </div>
                                    <div class="card-body">
                                        <div class="panel panel-primary">
                                            <div class=" tab-menu-heading">
                                                <div class="tabs-menu1">
                                                    <!-- Tabs -->
                                                    <!-- <ul class="nav panel-tabs">
                                                      
                                                        <li>
                                                       
                            <a ><i class="fe fe-phone mr-1"></i>
                            demande Status</a></li>

                           
                                                      
                                                    </ul> -->
                                                </div>
                                            </div>
                                            <div class="panel-body tabs-menu-body">
                                                <div class="tab-content">
                                                <div class="tab-pane active" id="order_status_tab">
                                                   


                                                   <div class="row">
                                                   <div class="col-md-12 col-lg-12">
                                                       <div class="card">
                                                       <div class="card-header">
                                                               
                                                       <div class="card-title">
                                                           <h3 class="card-title">Demandes Status</h3>
                                                       </div>
                                                       <div class="card-options">
                                                   <button id="add_order_status" class="btn btn-sm btn-success"><i class="fe fe-plus"></i></button>
                                                   
                                                   </div>
                                                       </div>
                                                           <div class="table-responsive">
                                                               <table class='table card-table table-vcenter text-nowrap' id='demande_status_table'>
                                                                   <thead>
                                                                       <tr>
                                                                          
                                                                           <th >Label</th>
                                                                           <th style="
                                                                               width: 5%;
                                                                               ">Color</th>
                                                                               
                                                                           <th></th>
                                                   
                                                                       </tr>
                                                                   </thead>
                                                                   <tbody>
                                                                                                       @foreach($alldemandestatus as  $item )
                                                                                                           <tr  id="id_val_{{$item->id}}">
                                                                                                                       <input type="hidden" name="id_val" class="id_val" value="{{$item->id}}" />
                                                                         
                                                                           <td><input type="text" value="{{$item->label}}" class="form-control label" name="label"></br>
                                                                           <div id="errorlabel_{{$item->id}}" class="error_label text-danger"></div></td>
                                                               
                                                                           <td>
                                                                               <input  type="text" class="form-control" id="type" name="type" value="RES" hidden>
                                                                               
                                                   
                                                                               <span><input type="color" value="{{$item->color}}" class="form-control color" name="color"></span>
                                                                           </td>
                                                                           
                                                                           <td class="d-flex">
                                                                              
                                                                           <!-- <form method="POST" id="id_form_{{$item->id}}" class="update-status" action="{{route('ajaxupdate.resevstatu')}}">
                                                                           <input type="hidden" id="up_label" name="up_label" value="">
                                                                                <input type="hidden" id="up_color" name="up_color" value="{{$item->color}}">
                                                                                <input type="hidden" id="up_id_statu" name="up_id_statu" value="{{$item->id}}">
                                                                                <input type="hidden" name="type_statu" value="RES">
                                                                           <button type="submit" class="btn btn-sm btn-success mx-1 " ><i class="fe fe-save"></i></button>
                                                                           </form>
                                                                           -->
                                                                         
                                                                           <button class="btn btn-sm btn-danger mx-1 delete-status" onclick="deleteajaxstatu(this)" id="{{$item->id}}"><i class="fe fe-trash"></i></button>
                                                                
                                                                         

                                                                           </td>
                                                                           
                                                                       </tr>
                                                                                                     @endforeach
                                                                   </tbody>
                                                               </table>
                                                               
                                                           </div>
                                                           <!-- table-responsive -->
                                                       </div>
                                                       <div class="form-footer text-center mt-2">
                                                                                   <button type="submit" class="btn btn-success update-ordre" >Save</button>
                                                       </div>
                                                   </div>
                                                   
                                                   
                                                   
                                                   
                                                   
                                                   </div>
                                                                                                       </div>

                                                   
                                              
                                                   
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- COL-END -->
                        </div>
                        <!-- End Row -->

                  
                    </div>
                    <!-- CONTAINER CLOSED -->

                 
                 
<div class="modal fade" id="form_status" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
<div class="modal-dialog modal-dialog-centered" role="document">
  <div class="modal-content">
    <div class="modal-header border-bottom-0">
      <h5 class="modal-title" id="exampleModalLabel">Create Status</h5>
      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>
    <div class="alert alert-danger" id="product-modal-error" hidden></div>
    <form method="post" id="add_status" action="{{route('addnew.resevstatus')}}">
        @csrf
      <input type='hidden' id="type_status" name="type_status" value="DEM" />
    
      <div class="modal-body">
       
				<div class="row">
				
					<div class="form-group col col-5">
						<label for="label">Label</label>
						<input  type="text" class="form-control" id="newlabel" name="label" placeholder="Enter label">
                        <span class="errorlabel text-danger"></span>
					</div>
					<div class="form-group col col-2">
						<label for="color">Color</label>
						<input  type="color" class="form-control" id="newcolor" name="color" >
                        <span class="errorcolor text-danger"></span>
					</div>
				</div>
				

             
            
                  
			
      <div class="modal-footer border-top-0 d-flex justify-content-center">
        <button type="submit" class="btn btn-success submit-btn">Create</button> 
      </div>
    </form>
  </div>
</div>
</div>


	

	
   
                </div>
            </div>
            <!--app-content closed-->


            <script>

$('.update-status').on('click',function(){



$.ajaxSetup({
headers: {
'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
}
});

event.preventDefault();
console.log('bool');
thisform = $(this);

selected_label = thisform.children()[0];

$('#up_label').val(selected_label.value);

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

success:function(response){
                 
         //   $('#inscription').attr('data-bs-dismiss','modal');
         //     console.log(response);

             if(response.status == 'success')
             {
                
                        setTimeout(() => {
                    toastr.success(response.msg, response.status);
                    },500)



                $(document).find("#id_val_" + response.data.id).css('transition', '3s');
                $(document).find("#id_val_" + response.data.id).css('background-color', 'green');
                setTimeout(function() {
                    $(document).find("#id_val_" + response.data.id).css('background-color', '#fff');
                    
                }, 1000);
                        
                   

             }else if(response.status == 'error'){

              
               
                if(response.input == 'label')
                  {
                    console.log('hellowordl')
                    $('.errorlabel').show();

                              
                            message = response.msg;
                           
                         
                  $('.errorlabel').html(message);
                  
                  }else{
                        setTimeout(() => {
                        toastr.danger(response.msg, response.status);
                        },500)
                    }
             }
       
           
         }
     });

}

);


function deleteajaxstatu(e){

console.log('dfgsdfg');
$.ajaxSetup({
headers: {
'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
}
});


console.log(e.getAttribute('id'));
var status_id = e.getAttribute('id');
var url = '{{ route("ajaxdelete.demandestatu",":id") }}';
url = url.replace(':id',status_id);

 
$.ajax({
        
         type:'post',
         url: url,
         dataType:'JSON',
processData: false,
contentType: false,
         success:function(response){
         //   $('#inscription').attr('data-bs-dismiss','modal');
         //     console.log(response);

             if(response.status == 'success')
             {
                
                        setTimeout(() => {
                    toastr.success(response.msg, response.status);
                    },500)

                $(document).find("#id_val_" + status_id).css('transition', '3s');
                $(document).find("#id_val_" + status_id).css('background-color', '#ff8686');
                setTimeout(function() {
                    $(document).find("#id_val_" + status_id).css('background-color', '#fff');
                    $(document).find("#id_val_" + status_id).remove();
                }, 1000);
                        
                   

             }else{
              
                setTimeout(() => {
            toastr.danger(response.msg, response.status);
            },500)
             }
       
           
         }
     });

}

                $(document).ready(function(){
                    
                  
    

$('#add_order_status').on('click', function() {
    
    $('#delivery_row').attr("hidden", true);
    $("#form_status").modal('show');
});




$.ajaxSetup({
headers: {
'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
}
});




$('#add_status').on('submit',function(event){

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
                 

                if(response.status == 'success')
                {
                    var arraydata = response.data;
                   
                    status_new_row_id = "demande_status_table";
                    status_new_row = $("#demande_status_table  > tbody > tr:first").clone();
                    var row_html = ' <tr  id="id_val_'+arraydata.id+'">';
                    row_html +='<input type="hidden" name="id_val" class="id_val" value="'+arraydata.id+'" />';
                    row_html+='<td>';
                    row_html+='<input type="text" value="'+arraydata.label+'" class="form-control label" name="label">';
                    row_html+='</td>';
                    row_html+='<td>';
                     row_html+='<input  type="text" class="form-control" id="type" name="type" value="RES" hidden>';
                     row_html+='<span>';
                     row_html+='<input type="color" value="'+arraydata.color+'" class="form-control color" name="color">';
                     row_html+='</span>';
                     row_html+='</td>';
                     row_html+='<td>';
                    row_html+='<button class="btn btn-sm btn-danger delete-status mx-1" onclick="deleteajaxstatu(this)" id="'+arraydata.id+'">';
                    row_html+='<i class="fe fe-trash">';
                    row_html+='</i>';
                    row_html+='</button>';
                    row_html+='</td>'
                     row_html+='</tr>';


             
                // insert element to the top
                $("#" + status_new_row_id + "  > tbody > tr:last").after(row_html);

                // {# show success green color #}
               
                $(document).find("#id_val_" + arraydata.id).css('transition', '3s');
                $(document).find("#id_val_" + arraydata.id).css('background-color', '#afa');
                setTimeout(function() {
                    $(document).find("#id_val_" + arraydata.id).css('background-color', '#fff');
                }, 1000);
                // hide modal
               

                console.log('hello world man ');
                    $('#form_status').modal('hide');
                    $('#form_status').modal({ keyboard: false })
                   
                         setTimeout(() => {
                toastr.success(response.msg, response.status);
                },500)
                       

                      
            
                    
            
 
                 }else{
                    setTimeout(() => {
                toastr.danger(response.msg, response.status);
                },500)
                 }

                
             //      $('#exampleModal').modal()                      // initialized with defaults
 
                 
               
             //     $("#exampleModal").modal({backdrop: false});
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


    // update ordre
    $(".update-ordre").on('click', function(e) {
        e.preventDefault();
        var data_update = {};
        console.log($('#type_status').val())
       
            $('#demande_status_table').find('tr').each(function() {
                var id = $(this).attr('id');
                var row = {};
                $(this).find('input,textarea').each(function() {
                    row[$(this).attr('name')] = $(this).val();
                });
                data_update[id] = row;
            });
            console.log(data_update);
        
        
        // send collected data
       
        var formData = data_update;
    console.log(formData);

    var url = "{{route('ajaxupdate.resevstatu')}}";
var formValues= $(this).serialize();
$.ajax({

type:'post',
url: url,
data:{'statu_data':formData,'type':'RES'},
dataType:'JSON',

success:function(response){
                 

                if(response.status == 'success')
                {
  
                    $('.error_label').hide();
          
                    $(document).find("#demande_status_table").css('transition', '3s');
                    $(document).find("#demande_status_table").css('background-color', '#afa');
                    setTimeout(function() {
                        $(document).find("#demande_status_table").css('background-color', '#fff');
                    }, 1000);
                    notif1('Modifié avec succès');

            }else if(response.status == 'error'){

                if(response.input ='label'){
                    console.log('hellowordl')
                    $('.error_label').hide();
                    $('#errorlabel_'+response.loc).show();

                              
                            message = response.msg;
                           
                         
                            $('#errorlabel_'+response.loc).html(message);

                   
                }else{
                    $('#errorlabel_'+response.loc).hide();
                    $('.error_label').hide();
                }

            }   
        }
    })



});

});       
            </script>








@endsection