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


                          <!-- ROW-4 -->
                          <div class="row">
                            <div class="col-12 col-sm-12">
                                <div class="card">
                                    <div class="card-header" style="display:flex;justify-content:space-between;">
                                        <h3 class="card-title mb-0">
                                           Les Lots
                                        </h3>
                                      
                                        <a type="button" class="btn btn-primary"  href="{{route('createnew.lot')}}" id="btnaddlot"  data-bs-toggle="modal" data-bs-target="#modaldemo3">
  Cree Nouveau Lot
</a>

                                        
                                    </div>

                                    <div class="card">
                                                        
                                                        <div class="card-body row">
                                                        <div class="form-group col-md-3">
                                                                <label class="form-label">Tranches</label>
                                                                <select name="selected_fltranche" id="selected_fltranche" class="form-control form-select select2">
                                                                <option value="0" disabled selected>--Select--</option>
                                                                    @foreach($alltranches as $ele)
                                                                    <option value="{{$ele->id}}">{{$ele->label}}</option>
                                                                 
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                            <div class="form-group col-md-3">
                                                                <label class="form-label">Ilots</label>
                                                                <select name="selected_flilot" id="selected_flilot" class="form-control form-select select2">
                                                                <option value="0" disabled selected>--Select--</option>
                                                                 
                                                                </select>
                                                            </div>

                                                            <div class="form-group col-md-3">
                                                                <label class="form-label">Type</label>
                                                                <select name="selected_fltype" id="selected_fltype" class="form-control form-select select2">
                                                                <option value="0" disabled selected>--Select--</option>
                                                                    @foreach($alltypes as $ele)
                                                                    <option value="{{$ele->id}}">{{$ele->label}}</option>
                                                                 
                                                                    @endforeach
                                                                </select>
                                                               
                                                            </div>

                                                            <div class="form-group col-md-3">
                                                                <label class="form-label">Etats</label>
                                                                
                                                                <select name="selected_fletat" id="selected_fletat" class="form-control form-select select2">
                                                                    <option value="0" disabled selected>--Select--</option>
                                                                    @foreach($alllots as $ele)
                                                                    <option value="{{$ele->etat['id']}}">{{$ele->etat['label']}}</option>
                                                                 
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                          
                                                            <div class="form-group col-md-12 ">
                                                              <div  style="display: flex; justify-content: flex-end; ">
                                                              <a href="javascript:void(0)" id="btnclearallfilters" class="btn btn-default mx-2 filterallselections">Rentialiser</a>
                                                   
                                                  
                                                   
                                                    <a href="javascript:void(0)" class="btn btn-info mx-2 filterallselections">Filtrer</a>
                                                   
                                                   
                                                              </div>
                                                            </div>
                                                          
                                                          
                                                        </div>
                                                    </div>
                                                    <div class="col-12 col-sm-12 my-2 mb-5">
                                                <div class="card">
                                                <h3 class="card-title m-3 mx-5">
                                                    Actions pour commandes sélectionnées
            
                                                    </h3>
                                                    <div class="card-header">

                                                  
                                                
            
                                                        <h3 class="card-title mx-3">
                                                       <a class="btn btn-danger text-white"  data-bs-toggle="modal"  data-bs-target="#modalforcheckdelete" id="btndeleteorders"> Delete </a>
                                                        </h3>
            
                                                       
                                                    
                                                    </div></div>
                                                        </div>

                                                        
                                                        <div class="card-body">
                                      
                                      <div class="table-responsive">
                                    
                                      <table id="datatable" class="table table-bordered text-nowrap key-buttons border-bottom">
                                     
                                              <thead>
                                                  <tr>
                                                    <th></th>
                                                     
                                                       <th class="border-bottom-0" style="width:fit-content;">Tranche</th>
                                                       <th class="border-bottom-0" style="width:fit-content;">Ilot</th>
                                                       <th class="border-bottom-0" style="width:fit-content;">Lot</th>
                                                         <th class="border-bottom-0" style="width:fit-content;">Type</th>
                                                       <th class="border-bottom-0" style="width:fit-content;">Titre Foncier</th>
                                                       <th class="border-bottom-0" style="width:fit-content;">Prix Min</th>
                                                       <th class="border-bottom-0" style="width:fit-content;">Etat</th>
                                                      
                                                       <th class="border-bottom-0" style="width:fit-content;">Actions</th>
                                                  </tr>
                                              </thead>
                                              <tbody id="ajaxcontent">
                                     
                                              @foreach($alllots as $item)
                                              <tr>
                                                <td>{{$item->id}}</td>
                                                     
                                                      <td>
                                                        {{$item->ilot['tranche']['label']}}
                                                     </td>
                                                      <td>{{$item->ilot['label']}}</td>
                                                      <td>{{$item->name}}</td>
                                                      <td>{{$item->type['label']}}</td>
                                                      <td>{{$item->titre_foncier}}</td>
                                                      <td>{{$item->prix_minimaum}}DH</td>
                                                     <td>  <span class="badge  rounded-pill text-white p-2 px-3" style="cursor: pointer;background-color:<?=($item->etat['color'])?>;">{{$item->etat['label']}}</span></td>
                                                    
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
                                                  <li> <a href="#" onclick="btnshowinfo(this)" data-bs-toggle="modal" id="{{$item->id}}" data-bs-target="#modaldemo3" ><i class="bi bi-eye text-orange mx-2"></i></a></li>

                                                <li> <a href="{{route('edit.lot',['id'=>$item->id])}}" ><i class="bi bi-pencil-square text-blue mx-2"></i></a></li>

                                                  <li>  <a href="{{route('delete.lot',['id'=>$item->id])}}"  style="color:red" onclick="return confirm('Are you sure you want to Delete this?');"> <i class="bi bi-trash mx-2" ></i></a></li>
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
                        </div>
                        <!-- ROW-4 END -->

                  
                    </div>
                    <!-- CONTAINER CLOSED -->

                 
                   <!-- MODAL ALERT MESSAGE -->
    <div class="modal fade" id="modaldemo4">
        <div class="modal-dialog modal-dialog-centered text-center " role="document">
            <div class="modal-content tx-size-sm">
                <div class="modal-body text-center  p-4 pb-5" id="modaldemobody">
                    <!-- <button aria-label="Close" class="btn-close position-absolute" data-bs-dismiss="modal"><span aria-hidden="true">&times;</span></button>
                    <i class="icon icon-check fs-70 text-success lh-1 my-5 d-inline-block"></i>
                    <h4 class="text-success tx-semibold">Félicitations!</h4>
                    <p class="mg-b-20 mg-x-20"></p><button aria-label="Close" class="btn btn-success pd-x-25" onclick="{  location.reload();}" data-bs-dismiss="modal">Continue</button> -->
                </div>
            </div>
        </div>
    </div>

      <!-- MODAL ALERT MESSAGE is deleted  -->
      <div class="modal fade" id="modalforcheckdelete">
        <div class="modal-dialog modal-dialog-centered text-center " role="document">
            <div class="modal-content tx-size-sm">
            <form id="multideleteform" action="{{route('multidelete.lots')}}" method="POST">
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

	
   
                </div>
            </div>
            <!--app-content closed-->

          
    
    <!-- LARGE MODAL -->
    <div class="modal fade" id="modaldemo3">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content modal-content-demo">
                <div class="modal-header">
                    <h6 class="modal-title">Message Preview</h6><button aria-label="Close" class="btn-close" data-bs-dismiss="modal"><span aria-hidden="true">&times;</span></button>
                </div>
                <div class="modal-body">
              
      <form id="formlotajax" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <input type="hidden" id="lot_id" name="lot_id" />
                <div class="card-header mb-2" > Les Infos du Lot </div>
                <div class="card-body row">
                        <div class="form-group col-md-12 mb-4">
     
                        <div class="modal-header my-2">Num Lot</div>
                                                <div class="wrap-input100 validate-input input-group" data-bs-validate="Valid username is required: ex@abc.xyz">
                                                     <a href="javascript:void(0)" class="input-group-text bg-white text-muted">
                                                     <i class="bi bi-tags"></i>
                                                     </a>
                                                     <input id="num_lot" type="text" class="form-control input-lg  @error('num_lot') is-invalid @enderror"    placeholder="Enter Num Lot" name="num_lot"  required autocomplete="num_lot" autofocus>
     
                                                     <p class="errornum_lot text-danger"></p>
                                                 </div>
     
                                             
                                                 
                              </div>

                       <div class="form-group col-md-3 mb-4">

                       
                            <div class="wrap-input100 validate-input input-group" data-bs-validate="Valid username is required: ex@abc.xyz">

                            <label class="form-label">Tranches</label>
                            <select required name="selected_uptranche" id="selected_uptranche" class="form-control form-select select2">
                            <option value="0" disabled selected>--Select--</option>
                                @foreach($alltranches as $ele)
                                
                                <option value="{{$ele->id}}">{{$ele->label}}</option>
                            
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
                               
                                </select>

                                <p class="errorselected_upilot text-danger"></p>
                                </div>

                        </div>


     
                        <div class="form-group col-md-3 mb-4">

                        
                                <div class="wrap-input100 validate-input input-group" data-bs-validate="Valid username is required: ex@abc.xyz">

                                <label class="form-label">Type</label>
                                <select required name="selected_uptype" id="selected_uptype" class="form-control form-select select2">
                                <option value="0" disabled selected>--Select--</option>
                                    @foreach($alltypes as $ele)
                                    <option value="{{$ele->id}}">{{$ele->label}}</option>
                                
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
                                <option value="{{$st->id}}">{{$st->label}}</option>
                                   
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
                                                  
                                                     
                                                     <input id="prix_m2" type="number" class="form-control input-lg  @error('prix_m2') is-invalid @enderror"  required  placeholder="Enter Prix Au M2" name="prix_m2"  autocomplete="prix_m2" autofocus>
     
                                                     <p class="errorprix_m2 text-danger"></p>
                                                 </div>
                                                 
                       </div>

                       <div class="form-group col-md-4 mb-4">
     
                       <div class="modal-header my-2">Prix Min</div>
     <div class="wrap-input100 validate-input input-group" data-bs-validate="Valid Telephone is required: ex@abc.xyz">
                                                     <a href="javascript:void(0)" class="input-group-text bg-white text-muted">
                                                     <i class="bi bi-currency-dollar"></i>
                                                     </a>
                                                  
                                                     
                                                     <input id="prix_min" type="number" class="form-control input-lg  @error('prix_min') is-invalid @enderror"    placeholder="Enter Prix Min" name="prix_min"  autocomplete="prix_min" required autofocus>
     
                                                     <p class="errorprix_min text-danger"></p>
                                                 </div>
                                                 
                       </div>

                       <div id="prixvent_box" class="form-group col-md-4 mb-4">
     
                       <div class="modal-header my-2">Prix De Vente</div>

     <div  class="wrap-input100 validate-input input-group" data-bs-validate="Valid Telephone is required: ex@abc.xyz">
                                                     <a href="javascript:void(0)" class="input-group-text bg-white text-muted">
                                                     <i class="bi bi-currency-dollar"></i>
                                                     </a>
                                                  
                                                     
                                                     <input id="prix_vente" type="number" class="form-control input-lg  @error('prix_vente') is-invalid @enderror"    placeholder="Enter Prix Vente" name="prix_vente" autocomplete="prix_vente" autofocus>
     
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
                                                     <input id="titre_foncier" name="titre_foncier" type="text" class="form-control input-lg  @error('titre_foncier') is-invalid @enderror"    placeholder="Enter Titre Foncier"  required autocomplete="titre_foncier" autofocus>
     
                                                     <p class="errortitre_foncier text-danger"></p>
                                                 </div>
     
                            </div>
     
                    <div class="form-group col-md-6 mb-4">
                    <div class="modal-header my-2">Surface </div>
     
                                 <div class="wrap-input100 validate-input input-group" data-bs-validate="Valid Telephone is required: ex@abc.xyz">
                                                          <a href="javascript:void(0)" class="input-group-text bg-white text-muted">
                                                          <span class="bi bi-layers"></span>
                                                          </a>
                                                          <input id="surface" type="number" class="form-control input-lg  @error('email') is-invalid @enderror"    placeholder="Enter Surface" name="surface" required autocomplete="email" autofocus>
          
                                                          <p class="errorsurface text-danger"></p>
                                                      </div>
                                                      
                       </div>
     
                            
                            <div id="hypotheque_box" class="form-group col-md-6 mb-4">
          
                            <div class="modal-header my-2">Hypotheque </div>
                                     
                                                      <div class="wrap-input100 validate-input input-group" data-bs-validate="Valid Telephone is required: ex@abc.xyz">
                                                          <a href="javascript:void(0)" class="input-group-text bg-white text-muted">
                                                          <span class="bi bi-layers"></span>
                                                          </a>
                                                          <input id="uphypotheque" type="number" class="form-control input-lg  @error('email') is-invalid @enderror"     placeholder="Enter hypotheque" name="hypotheque" autocomplete="email" autofocus>
          
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
              
            </div>
        </div>
    

    <!--- END LARGE MODAL  -->

          

    <script>



var custom_url = "";
function btnshowinfo(e){
          
    $('.errorhypotheque').hide();
                        $('.errorsurface').hide();
                        $('.errortitre_foncier').hide();
                        $('.errorprix_vente').hide();
                        $('.errorprix_min').hide();
                        $('.errorprix_m2').hide();
                        $('.errornum_lot').hide();

    $('#box_modalfooter').hide();
  
   
            idlot = e.id;
            console.log(idlot)
            alllots = <?php echo $alllots; ?>;
            alllots.forEach(element => {
                if(element.id == idlot){
                    $('#num_lot').val(element.name).attr('readonly','readonly');
                    $('#selected_upetat').val(element.etat['id']).prop("disabled", true).trigger('change');
                    if(element.ilot != null){
                        console.log(element.ilot)
                        var option1 = new Option(element.ilot['label'], element.ilot['id'], true, true);
                        $('#selected_upilot').append(option1);
                       

                    $('#selected_upilot').val(element.ilot['id']).prop("disabled", true).trigger('change');
                    $('#selected_uptranche').val(element.ilot['tranche'].id).prop("disabled", true).trigger('change');
                    }else{
                       
                    $('#selected_upilot').val(0).prop("disabled", true).trigger('change');
                    $('#selected_uptranche').val(0).prop("disabled", true).trigger('change');
                    }

                    if(element.type != null){
                       
                        $('#selected_uptype').val(element.type['id']).prop("disabled", true).trigger('change');
                    }else{
                        
                        $('#selected_uptype').val(0).prop("disabled", true).trigger('change');
                    }
                    
                  
                  
                   
                    $('#prix_m2').val(element.prix_m2).attr('readonly','readonly').trigger('change');
                    if(element.prix_vente != 0 && element.prix_vente != null && element.prix_vente != '')
                    {
                        $('#prix_vente').val(element.prix_vente).attr('readonly','readonly').trigger('change');
                    }else{
                        $('#prixvent_box').css('display','none').trigger('change'); 
                    }
                  
                    $('#prix_min').val(element.prix_minimaum).attr('readonly','readonly').trigger('change');
                   
                    $('#titre_foncier').val(element.titre_foncier).attr('readonly','readonly').trigger('change');
                   
                    $('#surface').val(element.surface).attr('readonly','readonly').trigger('change');

                    
                    if(element.hypotheque != 0 && element.hypotheque != null && element.hypotheque != '')
                    {
                        console.log('yes');
                        $('#hypotheque_box').css('display','block').trigger('change');
                        $('#uphypotheque').val(element.hypotheque).attr('readonly','readonly').trigger('change');
                     
                    }else{
                        console.log(element.hypotheque);
                        $('#hypotheque_box').css('display','none').trigger('change');
                        console.log('no'); 
                    }
                   
                    
                }
            });
        }

        function btnupdatelot(e){

            $('.errorhypotheque').hide();
                        $('.errorsurface').hide();
                        $('.errortitre_foncier').hide();
                        $('.errorprix_vente').hide();
                        $('.errorprix_min').hide();
                        $('.errorprix_m2').hide();
                        $('.errornum_lot').hide();

           custom_url = "{{route('update.lot')}}";
            $('#box_modalfooter').show();

            idlot = e.id;
            localStorage.setItem('idlotforupdate',idlot);
            console.log(localStorage.getItem('idlotforupdate'));
            console.log(idlot);
            alllots = <?php echo $alllots; ?>;
alllots.forEach(element => {
    if(element.id == idlot){
        console.log('this is up');
        $('#num_lot').val(element.name).attr('readonly','readonly');
                    $('#selected_upetat').val(element.etat.id).prop("disabled", false).trigger('change');
                    if(element.ilot != null){
                        console.log(element.ilot)
                    $('#selected_upilot').val(element.ilot['id']).prop("disabled", false).trigger('change');
                    $('#selected_uptranche').val(element.ilot['tranche'].id).prop("disabled", false).trigger('change');
                    }else{
                       
                    $('#selected_upilot').val(0).prop("disabled", false).trigger('change');
                    $('#selected_uptranche').val(0).prop("disabled", false).trigger('change');
                    }

                    if(element.type != null){
                        $('#selected_uptype').val(element.type['id']).prop("disabled", false).trigger('change');
                    }else{
                        $('#selected_uptype').val(0).prop("disabled", false).trigger('change');
                    }
                    
                  
                  
                   
                    $('#prix_m2').val(element.prix_m2).attr('readonly',false).trigger('change');
                    if(element.prix_vente != 0)
                    {
                        $('#prix_vente').val(element.prix_vente).attr('readonly',false).trigger('change');
                    }else{
                        $('#prixvent_box').css('display','none').trigger('change'); 
                    }
                  
                    $('#prix_min').val(element.prix_minimaum).attr('readonly',false).trigger('change');
                   
                    $('#titre_foncier').val(element.titre_foncier).attr('readonly',false).trigger('change');
                   
                    $('#surface').val(element.surface).attr('readonly',false).trigger('change');

                    
                    if(!element.hypotheque)
                    {
                        console.log(element.hypotheque);
                        $('#hypotheque_box').css('display','none').trigger('change');
                        console.log('no'); 
                    }else{
                        console.log('yes');
                        $('#hypotheque_box').css('display','block').trigger('change');
                        $('#uphypotheque').val(element.hypotheque).attr('readonly',false).trigger('change');
                    }
        
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

// create the option and append to Select2


if(response.data != null || response.data != []){
response.data.forEach(element => {
console.log(element);

var option = new Option(element.label, element.id, true, true);
studentSelect.append(option);

 // manually trigger the `select2:select` event
 studentSelect.trigger({
        type: 'select2:select',
        params: {
            data: data
        }
    });

});
studentSelect.val(localStorage.getItem('idlotforupdate')).trigger('change');


}else{
    studentSelect.val(localStorage.getItem('idlotforupdate')).trigger('change');

}

});



}



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
     
        $('#btndeleteorders').on('click',function(){
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



        $('#btnaddlot').on('click',function(){
            custom_url = "{{route('createnew.lot')}}";

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
 $('#box_modalfooter').show();

            $('#lot_id').val("");
        $('#num_lot').val("");
        $('#selected_upetat').val("0").trigger('change');;
        $('#selected_upilot').val("0").trigger('change');;
        $('#selected_uptype').val("0").trigger('change');
      
        $('#selected_uptranche').val("0").trigger('change');;
       
        $('#prix_m2').val("");
      
            $('#prixvent_box').css('display','block'); 
            $('#prix_vente').val("");
        
      
        $('#prix_min').val("");
       
        $('#titre_foncier').val("");
       
        $('#surface').val("");

        $('#hypotheque').val("");
        
       
        $('#num_lot').attr('readonly',false);
          
          $('#prix_m2').attr('readonly',false);
    
    $('#prixvent_box').css('display','block'); 
    $('#prix_vente').attr('readonly',false);


$('#prix_min').attr('readonly',false);

$('#titre_foncier').attr('readonly',false);

$('#surface').attr('readonly',false);
$('#hypotheque').attr('readonly',false);

        });
      
     

        $('#formlotajax').on('submit',function(event){

            event.preventDefault();
            console.log('bool');
            thisform = $(this);
            url = custom_url;
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
                    <p class="mg-b-20 mg-x-20" id="message_response">`+response.msg+`</p><button aria-label="Close" class="btn btn-success pd-x-25" onclick="{  location.reload();}" data-bs-dismiss="modal">Continue</button>`;

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


        $('#btnclearallfilters').on('click',function(){
                console.log('hello clear');
            $('#selected_fltranche').val(0).trigger('change');
            $('#selected_flilot').val(0).trigger('change');
            $('#selected_fltype').val(0).trigger('change');
            $('#selected_fletat').val(0).trigger('change');

        });
     
        

        $('.filterallselections').on('click',function(){

            var formData = {
                'selected_fltranche':$('#selected_fltranche').val(),
                'selected_flilot':$('#selected_flilot').val(),
                'selected_fltype':$('#selected_fltype').val(),
                'selected_fletat':$('#selected_fletat').val(),
            };

            alltranches = <?php echo $alltranches ;?>;
            allilots = <?php echo $allilots ;?>;
            alltypes = <?php echo $alltypes ;?>;
            allstatus = <?php echo $allstatus; ?>;
            $.ajax({
           
           type:'get',
           url: "{{route('ajaxfilterall.lots')}}",
           data:formData,
           dataType:'JSON',

           success:function(response){
       
                   console.log('e');
               if(response.status == 200)
               {
                
                   table.clear().draw();

                   var save_tranche ="";
                   var save_ilot ="";
                   var save_type ="";
                   var save_etat ="";

                  response.data.forEach(element => {
                   
                    element.forEach(item => {

                        console.log(item);
                        tr ='<tr>';
                        tr+='<td>';
                        tr+=item.id;
                        tr+='</td>';
                        tr+='<td>';
                        allilots.forEach(singleilot => {
                            if(singleilot.id == item.ilot_id){
                                alltranches.forEach(tranche=>{

                                    if(tranche.id == singleilot.id_tranche){
                                         save_tranche = tranche.label;
                                        tr+=tranche.label;
                                    }
                                })
                               
                            }
                            
                        });
                       
                        tr+='</td>';
                        tr+='<td>';
                        allilots.forEach(singleilot => {
                            if(singleilot.id == item.ilot_id){
                                 save_ilot = singleilot.label;
                                tr+=singleilot.label;
                            }
                            
                        });
                      
                        tr+='</td>';
                        tr+='<td>';
                        tr+=item.name;
                        tr+="</td>";
                        tr+="<td>";
                        alltypes.forEach(type => {
                            if(type.id == item.type_id){
                                 save_type = type.label;
                                tr+=type.label;
                            }
                            
                        });
                      
                       
                        tr+="</td>";
                        tr+="<td>"+item.titre_foncier+"</td>";
                        tr+=" <td>";
                        allstatus.forEach(etat=>{
                            if(etat.id == item.statu_id){
                                 save_etat = etat.label;
                                tr+='<span class="badge  rounded-pill text-white p-2 px-3" style="cursor: pointer;background-color:'+etat.color+'">'+etat.label+"</span>";
                            }
                          
                        })
                     
                        tr+=" </td>";
                        tr+=" <td>";
                        tr+="<div class='btn-group mt-2 mb-2'>";
                        tr+="<div class='btn-group mt-2 mb-2'>"
                        tr+="<ul style='list-style: none; display:flex;'>";
                        tr+=" <li>";
                        tr+="<a href='#' onclick='btnshowinfo(this)' data-bs-toggle='modal' id='{{$item->id}}' data-bs-target='#modaldemo3' >";
                        tr+='<i class="bi bi-eye text-orange mx-2"></i></a></li>';
                        tr+='<li>';
                        tr+='<a href="{{route("edit.lot",["id"=>'+item.id+'])}}" ><i class="bi bi-pencil-square text-blue mx-2"></i></a></li>';
                        tr+='<li>';
                        tr+='<a href="{{route("delete.lot",["id"=>'+item.id+'])}}"  style="color:red" onclick="return confirm("Are you sure you want to Delete this?");">';
                        tr+='<i class="bi bi-trash mx-2" ></i></a></li>';
                        tr+=" </ul>";  
                        tr+=" </ul>";
                        tr+="   </div>";
                        tr+="</td>";
                        tr+="</tr>";
                           
        
                      
                    });
                  });

                  var thisTable = $('#datatable').DataTable({


"language": {
    "processing": '<div class="progress progress-md"> <div class="progress-bar progress-bar-indeterminate bg-purple"></div> </div>'
        },
"processing": true,

"serverSide": true,
"serverMethod": "post",
"order": [],
"ajax": {
    "url":"{{route('ajaxfilterall.lots')}}",
    "data":function(d){

    },
    "dataFilter":function(data){
        var json = jQuery.parseJSON(data);
        json.draw = json.draw;
        json.recordsFiltered = json.total;
        json.recordsTotal = json.total;
        json.data  = json.data;

        return JSON.stringify(json);

    }
    
    },
    "columns": [
        { "title":"Tranche","data": "tranche_name","visible":true,"searchable":true },
        { "title":"Ilot","data": "ilot_name","visible":true,"searchable":true },
        { "title":"Lot","data": "lot_name","visible":true,"searchable":true },
        { "title":"Type","data": "type","visible":true,"searchable":true },
        { "title":"Titre Foncier","data": "titre_foncier","visible":true,"searchable":true },
        { "title":"Prix Min","data": "prix_min","visible":true,"searchable":true },
        { "title":"Etat","data": "etat","visible":true,"searchable":true },
   
    ],

    "aLengthMenu": [
        [10,50, 100, 200, 500],
        [10,50, 100, 200, 500]
    ],
    "columnDefs": [{
        "targets": 'no-sort',
        "orderable": false,
    }]
});

        
                     
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