@extends('admin-master')


@section('content')
<?php use App\Models\Tranche; ?>;
 <!--app-content open-->
 <style>

.dt-buttons.btn-group{
    left: 25px !important;
    top:25px;
}
</style>


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
                                           Les reservations
                                        </h3>

                                        <a type="button" href="{{route('createnew.reservation')}}" class="btn btn-primary" >
  Cree Nouveau reservation
</a>


                                    </div>

                                    <div class="card">
                                    <form method="POST" action="{{route('ajaxfilterall.reservations')}}">
                                            @csrf
                                                     <div class="card-body row">
                                                        <!-- <div class="form-group col-md-3">
                                                        <label class="form-label">Tranches</label>
                                                             <select name="selected_fltranche"  onchange="getselectedtrancheval(this)" id="selected_fltranche" class="form-control form-select select2 storeonsession">
                                                             <option value="0"  selected>--Select--</option>
                                                                 @foreach($alltranches as $ele)

                                                                 <option value="{{$ele->id}}">{{$ele->label}}</option>

                                                                 @endforeach
                                                             </select>
                                                            </div> -->
                                                            <div class="form-group col-md-3">
                                                            <label class="form-label">Ilots</label>
                                                             <select name="selected_flilot[]" id="selected_flilot" class="form-control select2 form-select storeonsession" data-placeholder="--Select--" multiple>

                                                              @foreach($allilots as $ilot)
                                                              <option value="{{$ilot->id}}">{{$ilot->label}}</option>

                                                              @endforeach
                                                             </select>
                                                            </div>

                                                            <div class="form-group col-md-3">
                                                            <label class="form-label">Type</label>
                                                             <select name="selected_fltype[]" id="selected_fltype" class="form-control select2-show-search form-select storeonsession" data-placeholder="--Select--" multiple>

                                                                 @foreach($alltypes as $ele)
                                                                 <option value="{{$ele->id}}">{{$ele->label}}</option>

                                                                 @endforeach
                                                             </select>


                                                            </div>


                                                            <div class="form-group col-md-3">
                                                            <label class="form-label">Statut</label>
                                                            <select name="selected_flstatu[]" id="selected_flstatu" class="form-control form-select select2 storeonsession" data-placeholder="--Select--" multiple>

                                                                 @foreach($allstatus as $st)

                                                                 @if($st->type == 'RES')

                                                                 <option value="{{$st->id}}">{{$st->label}}</option>

                                                                 @endif

                                                                 @endforeach
                                                             </select>
                                                            </div>

                                                            <div class="form-group mt-4 col-md-3" style="display:flex;align-items:center ;">
                                                            <div class="input-group mt-4">
                                                                <div class="input-group-text">
                                                                    <i class="fa fa-calendar tx-16 lh-0 op-6"></i>
                                                                </div><input class="form-control" id="mydaterange"  name="mydaterange" placeholder="MM/DD/YYYY" type="text">
                                                            </div>
                                                            </div>



                                                            <div class="form-group col-md-3">
                                                            <label class="form-label">Type Client</label>
                                                                <select   name="selected_fltypeclient" id="selected_fltypeclient" class="form-control form-select select2" data-placeholder="--Select--">
                                                               <option value="0" selected>--Select--</option>
                                                                <option value="client_final">Client Final</option>
                                                                <option value="investisseur">Investisseur</option>
                                                                </select>


                                                            </div>


                                                            <div class="form-group col-md-3">
                                                                <label class="form-label">Commercial</label>

                                                               <select name="selected_flcommercial[]" id="selected_flcommercial" class="form-control select2 form-select" data-placeholder="--Select--" multiple>

                                                                @foreach($allcommercials as $com)
                                                                 <option value="{{$com->id}}">{{$com->name}}</option>

                                                                 @endforeach
                                                                </select>
                                                            </div>

                                                            <div class="row row-sm my-2">
                                                         <label class="form-label">Prix Vente</label>

                                                            <div class="col-lg-12 mt-4">
                                                                <input class="rangeslider2" name="range_prix_vente" id="range_prix_vente"  data-type="double" data-grid="true" data-extra-classes="irs-modern"  type="text">
                                                            </div>

                                                        </div>

                                                        <div class="row row-sm my-2">
                                                         <label class="form-label">Reliquat</label>

                                                            <div class="col-lg-12 mt-4">
                                                                <input class="rangeslider2" name="range_reliquat" id="range_reliquat"  data-type="double" data-grid="true" data-extra-classes="irs-modern"  type="text">
                                                            </div>

                                                        </div>

                                                        <div class="form-group mt-5 col-md-12 ">
                                                           <div  style="display: flex; justify-content: flex-end; ">

                                                           <button   id="btnclearallfilters" class="btn btn-default mx-2 filterallselections">Rentialiser</button>


                                                 <button type="submit" class="btn btn-info mx-2 filterallselections">Filtrer</button>


                                                           </div>
                                                         </div>

                                                        </div>
                                                    </form>

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

                                                       <th class="border-bottom-0" style="width:fit-content;">Ilot</th>
                                                       <th class="border-bottom-0" style="width:fit-content;">Lot</th>
                                                       <th class="border-bottom-0" style="width:fit-content;">Titre Foncier</th>
                                                       <th class="border-bottom-0" style="width:fit-content;">Date Res</th>
                                                       <th class="border-bottom-0" style="width:fit-content;">Client</th>

                                                       <th class="border-bottom-0" style="width:fit-content;">Prix Vente</th>
                                                       <th class="border-bottom-0" style="width:fit-content;">Avance</th>
                                                       <th class="border-bottom-0" style="width:fit-content;">Reliquat</th>
                                                       <th class="border-bottom-0" style="width:fit-content;">Statut</th>

                                                       <th class="border-bottom-0" style="width:fit-content;">Actions</th>
                                                  </tr>
                                              </thead>
                                              <tbody id="ajaxcontent">

                                              @foreach($allreservations as $item)

                                              <tr>
                                                <td>{{$item->id}}</td>

                                                      <td>
                                                        {{$item->lot->ilot->label}}
                                                      </td>

                                                      <td>   {{$item->lot->name}}</td>
                                                      <td>

                                                        {{$item->lot->titre_foncier}}

                                                     </td>
                                                      <td>{{$item->date_reservation}}</td>
                                                      <td>
                                                      {{$item->client->name}}
                                                     </td>

                                                      <td>  {{$item->lot->prix_vente}} DH
                                             </td>
                                                      <td>{{$item->avance}} DH</td>
                                                      <td>{{$item->reliquat}} DH</td>
                                                     <td>

                                                        <span class="badge  rounded-pill text-white p-2 px-3" style="cursor: pointer;background-color:<?=($item->statu['color'])?>;">{{$item->statu->label}}</span>


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
                                                  <li> <a href="javascript:void(0)" onclick="btnshowinfo(this)" data-bs-toggle="modal" id="{{$item->id}}" data-bs-target="#modaldemo3" ><i class="bi bi-eye text-orange mx-2"></i></a></li>

                                                <li> <a href="{{route('edit.reservation',['id'=>$item->id])}}"><i class="bi bi-pencil-square text-blue mx-2"></i></a></li>

                                                  <li>  <a href="{{route('delete.reservation',['id'=>$item->id])}}"  style="color:red" onclick="return confirm('Are you sure you want to Delete this?');"> <i class="bi bi-trash mx-2" ></i></a></li>
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
            <form id="multideleteform" action="{{route('multidelete.reservations')}}" method="POST">
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

            <!--app-content closed-->



    <!-- LARGE MODAL -->
    <div class="modal fade" id="modaldemo3">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content modal-content-demo">
                <div class="modal-header">
                    <h6 class="modal-title">Message Preview</h6><button aria-label="Close" class="btn-close" data-bs-dismiss="modal"><span aria-hidden="true">&times;</span></button>
                </div>
                <div class="modal-body">


                        <div class="row">
                            <input type="hidden" id="reservation_id"  name="reservation_id" />
                        <div class="card-header mb-2" > Les Infos du reservation </div>
                        <div class="card-body row">


                                      <div class="form-group col-md-4 mb-4">


        <div class="wrap-input100 validate-input input-group" data-bs-validate="Valid username is required: ex@abc.xyz">

        <label class="form-label">Tranche</label>
        <input type="hidden"  name="mytranche">
        <select disabled required name="selected_uptranche"   id="selected_uptranche" class="form-control form-select select2">
        <option  value="0" disabled >--Select--</option>




        </select>




        <p class="errorselected_uptranche text-danger"></p>
        </div>

        </div>


        <div class="form-group col-md-4 mb-4">


        <div class="wrap-input100 validate-input input-group" data-bs-validate="Valid username is required: ex@abc.xyz">

        <label class="form-label">Ilots</label>
        <input type="hidden" name="myilot">
        <select disabled required name="selected_upilot" id="selected_upilot" class="form-control form-select select2">
        <option value="0" disabled >--Select--</option>


        </select>



        <p class="errorselected_upilot text-danger"></p>
        </div>

        </div>

                               <div class="form-group col-md-4  mb-4">


                                    <div class="wrap-input100 validate-input input-group" data-bs-validate="Valid username is required: ex@abc.xyz">

                                    <label class="form-label">Lot</label>
                                    <input type="hidden"  name="mylot">
                                    <select disabled required name="selected_uplot" id="selected_uplot" class="form-control form-select select2">
                                    <option value="0" disabled >--Select--</option>

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


                                           <input id="prix_vente" type="number" class="form-control input-lg  @error('prix_vente') is-invalid @enderror" disabled  value=""  placeholder="Enter Prix Vente" name="prix_vente"  autocomplete="prix_vente" required autofocus>

                                           <p class="errorprix_vente text-danger"></p>
                                       </div>

             </div>

                        <div class="form-group col-md-4 mb-4">
                        <div class="modal-header my-2"> Avance</div>

             <div class="wrap-input100 validate-input input-group" data-bs-validate="Valid Telephone is required: ex@abc.xyz">
                                                             <a href="javascript:void(0)" class="input-group-text bg-white text-muted">

                                                             <i class="bi bi-currency-dollar"></i>
                                                             </a>


                                                             <input disabled id="avance" type="number" class="form-control input-lg  @error('avance') is-invalid @enderror"  required  placeholder="Enter Avance" name="avance"  autocomplete="avance" autofocus>

                                                             <p class="erroravance text-danger"></p>
                                                         </div>

                               </div>





             <div class="form-group col-md-4 mb-4">

             <div class="modal-header my-2">Reliquat</div>
<div class="wrap-input100 validate-input input-group" data-bs-validate="Valid Telephone is required: ex@abc.xyz">
                                           <a href="javascript:void(0)" class="input-group-text bg-white text-muted">
                                           <i class="bi bi-currency-dollar"></i>
                                           </a>


                                           <input disabled id="reliquat" type="number" class="form-control input-lg  @error('reliquat') is-invalid @enderror"  placeholder="Enter Reliquat" name="reliquat"  autocomplete="reliquat" required autofocus>

                                           <p class="errorreliquat text-danger"></p>
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
                                        <select disabled required name="selected_upcommercial" id="selected_upcommercial" class="form-control form-select select2">
                                        <option value="0" disabled >--Select--</option>
                                          @foreach($allcommercials as $com)
                                          <option value="{{$com->id}}" disabled >{{$com->name}}</option>

                                          @endforeach



                                        </select>

                                        <p class="errorselected_upcommercial text-danger"></p>
                                        </div>

                                </div>



                                <div class="form-group col-md-4  mb-4">


        <div class="wrap-input100 validate-input input-group" data-bs-validate="Valid username is required: ex@abc.xyz">

        <label class="form-label">Type Client</label>
        <select disabled required  name="selected_uptypeclient" id="selected_uptypeclient" class="form-control form-select select2">
        <option value="0" disabled >--Select--</option>
        <option value="client_final">Client Final</option>
        <option value="investisseur">Investisseur</option>
        </select>




        <p class="errorselected_uptypeclient text-danger"></p>
        </div>

        </div>





                                <div class="form-group col-md-4 mb-4">


        <div class="wrap-input100 validate-input input-group" data-bs-validate="Valid username is required: ex@abc.xyz">

        <label class="form-label">Client</label>
        <select disabled required name="selected_uplistclient" id="selected_uplistclient" class="form-control form-select select2">
        <option value="0" disabled >--Select--</option>
        @foreach($allclients as $client)
                                          <option value="{{$client->id}}" disabled >{{$client->name}}</option>
 @endforeach
        </select>

        <p class="errorselected_uplistclient text-danger"></p>
        </div>

        </div>

                              <div class="form-group col-md-4 mt-2 mb-4">
                              <label class="m-2">La Date De Reservation </label>

                                            <div class="wrap-input100 validate-input input-group" data-bs-validate="Valid username is required: ex@abc.xyz">
                                                             <a href="javascript:void(0)" class="input-group-text bg-white text-muted">
                                                             <i class="bi bi-calendar-date"></i>
                                                             </a>
                                                             <input id="date_reservation" name="date_reservation" type="date" class="form-control input-lg  @error('date_reservation') is-invalid @enderror"    placeholder="Enter Titre Foncier" disabled required autocomplete="date_reservation" autofocus>

                                                             <p class="errordate_reservation text-danger"></p>
                                                         </div>

                                    </div>


                                <div class="form-group col-md-4 mb-4 mt-2" style="margin-left:auto;">


                                    <div class="wrap-input100 validate-input input-group" data-bs-validate="Valid username is required: ex@abc.xyz">

                                    <label class="form-label">Etat</label>
                                    <select disabled required name="selected_upetat" id="selected_upetat" class="form-control form-select select2">
                                    <option value="0" disabled selected>--Select--</option>


                                        @foreach($allstatus as $st)


                                        <option  value="{{$st->id}}">
                                        {{$st->label}}
                                        </option>



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

            </div>
        </div>


    <!--- END LARGE MODAL  -->



    <script>




var custom_url = "";
function btnshowinfo(e){

    $('.errorhypotheque').hide();
                        $('.errorsurface').hide();
                        $('.errordate_reservation').hide();
                        $('.errorprix_vente').hide();
                        $('.errorreliquat').hide();
                        $('.erroravance').hide();

    $('#box_modalfooter').hide();


            idreservation = e.id;
            console.log(idreservation)
            allreservations =<?php echo $getreservations ; ?>;
            allclients = <?php echo $allclients ;?>;
            allcommercials = <?php echo $allcommercials ;?>;
            alltranches = <?php echo $alltranches;?>;
            alltypes = <?php echo $alltypes ; ?>;
            alllots = <?php echo $alllots; ?>;
            allilots = <?php echo $allilots; ?>;
            allstatus = <?php echo $allstatus; ?>;
            allreservations.forEach(element => {

                if(element.id == idreservation){


                    alllots.forEach(lot=>{
                        console.log(element.lot_id);
                        if(lot.id == element.lot_id)
                        {
                            console.log(element);


                            var option_selected_uplot = new Option(lot.name,lot.id, true, true);
                            $('#selected_uplot').append(option_selected_uplot);
                            $('#selected_uplot').val(lot.id).trigger('change');

                            if(lot.prix_vente != 0 && lot.prix_vente != "" && lot.prix_vente != null)
                            {
                                    $('#prix_vente').val(lot.prix_vente).attr('readonly','readonly');
                                }else{
                                    $('#prixvent_box').css('display','none');
                                }


                    $('#info-titre_foncier').html(lot.titre_foncier);
                    $('#info-surface').html(lot.surface);
                    $('#info-prix_vente').html(lot.prix_vente+" DH");

                    alltypes.forEach(ty=>{

                        if(ty.id == lot.type_id)
                        {


                            $('#info-type').html(ty.label);
                        }

                    });


                            allilots.forEach(ilot=>{

                                if(ilot.id == lot.ilot_id)
                                {
                                    var option_selected_upilot = new Option(ilot.label,ilot.id, true, true);
                            $('#selected_upilot').append(option_selected_upilot);
                            $('#selected_upilot').val(ilot.id).trigger('change');

                                  alltranches.forEach(tranche=>{

                                    if(tranche.id == ilot.id_tranche){

                                        var option_selected_uptranche = new Option(tranche.label,tranche.id, true, true);
                            $('#selected_uptranche').append(option_selected_uptranche);
                            $('#selected_uptranche').val(tranche.id).trigger('change');

                                    }

                                  });


                                }


                            });
                        }


                    });


                    allclients.forEach(client=>{

                        if(client.id == element.client_id){
                            var option_typeclient = new Option(client.type,client.type, true, true);
                        $('#selected_uptypeclient').append(option_typeclient);
                            $('#selected_uptypeclient').val(client.type).trigger('change');
                        }

                    });


                    allclients.forEach(client=>{

                        if(client.id == element.client_id){

                            var option_client = new Option(client.name,client.id, true, true);
                        $('#selected_uplistclient').append(option_client);
                            $('#selected_uplistclient').val(client.id).trigger('change');
                        }

                    });



                    allcommercials.forEach(com=>{
                        if(com.id == element.commercial_id){

                            var option1 = new Option(com.name, com.id, true, true);
                        $('#selected_upcommercial').append(option1);
                            $('#selected_upcommercial').val(com.id).trigger('change');
                        }
                    })

                    allstatus.forEach(st=>{
                        if(st.id == element.statu_id){

                            var option_st = new Option(st.label, st.id, true, true);
                        $('#selected_upetat').append(option_st);
                            $('#selected_upetat').val(st.id).trigger('change');
                        }
                    })


                    $('#avance').val(element.avance).attr('readonly','readonly');
                    $('#reliquat').val(element.reliquat).attr('readonly','readonly');

                   $('#date_reservation').val(element.date_reservation).attr('readonly','readonly');




                }
            });
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

   if(response.data != null || response.data != []){
       response.data.forEach(element => {
       console.log(element);

       var option = new Option(element.name, element.id, true, true);
   studentSelect.append(option);
   });


   }

   });



}



function getselectedtrancheval(e){

idselected =  $('#selected_fltranche').val();


formData = {
'selected_id':idselected,
}


// Fetch the preselected item, and add to the control
var studentSelect = $('#selected_flilot');

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
var optiondef = new Option('--Select--',0, true, true);
studentSelect.append(optiondef);

if(response.data != null || response.data != []){


response.data.forEach(element => {
console.log(element);

var option = new Option(element.label, element.id, true, true);
studentSelect.append(option);



});

studentSelect.val(localStorage.getItem('selected_flilot')).trigger('change');


}else{

    studentSelect.val(0).trigger('change');

}

});



}



function getselectedilotval(e){

idselected =  $('#selected_upilot').val();

formData = {
'selected_id':idselected,
}


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

if(response.data != null || response.data != []){
    response.data.forEach(element => {
console.log(element);


var option = new Option(element.name, element.id, true, true);
studentSelect.append(option);


});


}

});





}


function getselectedlotval(){


idselected =  $('#selected_uplot').val();

console.log(idselected);

formData = {
'selected_id':idselected,
}


// Fetch the preselected item, and add to the control
var boxshowdata = $('#selected_uplot');
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

if(response.data != null || response.data != []){

    console.log(response.data);


    $('#info-titre_foncier').html(response.data.titre_foncier);
    $('#info-surface').html(response.data.surface);
    $('#info-prix_vente').html(response.data.prix_vente+' DH');
    $('#info-type').html(response.data.type);

}else{
    $('#selected_uplot').empty();
    $('#selected_uplot').val(0).trigger('change');
}


});



}


$(document).ready(function(){



    if(localStorage.getItem("selected_fltranche") != null){
    $("#selected_fltranche").val(localStorage.getItem("selected_fltranche")).trigger('change');
}

if(localStorage.getItem("selected_flilot") != null){
    $("#selected_flilot").val(localStorage.getItem("selected_flilot").split(',')).trigger('change');
}

if(localStorage.getItem("selected_fltype") != null){
    $("#selected_fltype").val(localStorage.getItem("selected_fltype").split(',')).trigger('change');
}


if(localStorage.getItem("selected_flstatu") != null){
    $("#selected_flstatu").val(localStorage.getItem("selected_flstatu").split(',')).trigger('change');
}

if(localStorage.getItem("selected_fltypeclient") != null){
    $("#selected_fltypeclient").val(localStorage.getItem("selected_fltypeclient")).trigger('change');
}

if(localStorage.getItem("selected_flcommercial") != null){
    $("#selected_flcommercial").val(localStorage.getItem("selected_flcommercial").split(',')).trigger('change');
}


min_prix_vente = <?php echo $default_prix_vente[0] ?>;
max_prix_vente = <?php echo $default_prix_vente[1] ?>;

min_reliquat = <?php echo $default_reliquat[0] ?>;
max_reliquat = <?php echo $default_reliquat[1] ?>;


if(localStorage.getItem("max_prix_vente") != null && localStorage.getItem("min_prix_vente") != null){
    $("#range_prix_vente").ionRangeSlider({
        type: "double",
        min: min_prix_vente,
        max: max_prix_vente,
        from: localStorage.getItem("min_prix_vente"),
        to: localStorage.getItem("max_prix_vente"),
        grid: true
    });

}else{

    $("#range_prix_vente").ionRangeSlider({
        type: "double",
        min: min_prix_vente,
        max: max_prix_vente,
        from: min_prix_vente,
        to: max_prix_vente,
        grid: true
    });
}

if(localStorage.getItem("min_reliquat") != null && localStorage.getItem("max_reliquat") != null){
    $("#range_reliquat").ionRangeSlider({
        type: "double",
        min: min_reliquat,
        max: max_reliquat,
        from: localStorage.getItem("min_reliquat"),
        to: localStorage.getItem("max_reliquat"),
        grid: true
    });

}else{

    $("#range_reliquat").ionRangeSlider({
        type: "double",
        min: min_reliquat,
        max: max_reliquat,
        from: min_reliquat,
        to: max_reliquat,
        grid: true
    });

}


if(localStorage.getItem("startdate") != null && localStorage.getItem("enddate") != null){

  let  start = new Date(localStorage.getItem('startdate').format('m/d/Y'));
let end = new Date(localStorage.getItem('enddate').format('m/d/Y'));


$(function() {
          $('input[id="mydaterange"]').daterangepicker({
            opens: 'left',

            startDate: start,
            endDate: end,
          }, function(start, end, label) {
            console.log("A new date selection was made: " + start.format('YYYY-MM-DD') + ' to ' + end.format('YYYY-MM-DD'));
          });
        });



}else{


max_date_reservation = <?php echo json_encode($array_dates_res[1]); ?>;
min_date_reservation = <?php echo json_encode($array_dates_res[0]); ?>;

console.log(min_date_reservation);

res_start = new Date(min_date_reservation);
res_end = new Date(max_date_reservation);

        $(function() {
          $('input[id="mydaterange"]').daterangepicker({
            opens: 'left',

            startDate: res_start,
            endDate: res_end,
          }, function(start, end, label) {
            console.log("A new date selection was made: " + start.format('YYYY-MM-DD') + ' to ' + end.format('YYYY-MM-DD'));
          });
        });




}


if(window.location.href == "{{route('all.reservations')}}"){

console.log('hi this is lot');

console.log('hello clear');

            $('#selected_flilot').val(0).trigger('change');
            $('#selected_fltype').val(0).trigger('change');
            $('#selected_flstatu').val(0).trigger('change');
            $('#selected_flcommercial').val(0).trigger('change');
            $('#selected_fltypeclient').val(0).trigger('change');
            $("#range_prix_vente").ionRangeSlider();

    // 2. Save instance to variable
    let my_range_prix_vente = $("#range_prix_vente").data("ionRangeSlider");

    // 3. Update range slider content (this will change handles positions)
    my_range_prix_vente.update({
        from: min_prix_vente,
        to: max_prix_vente
    });

    // 4. Reset range slider to initial values
    my_range_prix_vente.reset();


    $("#range_reliquat").ionRangeSlider();

    // 2. Save instance to variable
    let my_range_reliquat = $("#range_reliquat").data("ionRangeSlider");

    // 3. Update range slider content (this will change handles positions)
    my_range_reliquat.update({
        from: min_reliquat,
        to: max_reliquat
    });

    // 4. Reset range slider to initial values
    my_range_reliquat.reset();

    max_date_reservation = <?php echo json_encode($array_dates_res[1]); ?>;
min_date_reservation = <?php echo json_encode($array_dates_res[0]); ?>;

console.log(min_date_reservation);

res_start = new Date(min_date_reservation);
res_end = new Date(max_date_reservation);

        $(function() {
          $('input[id="mydaterange"]').daterangepicker({
            opens: 'left',

            startDate: res_start,
            endDate: res_end,
          }, function(start, end, label) {
            console.log("A new date selection was made: " + start.format('YYYY-MM-DD') + ' to ' + end.format('YYYY-MM-DD'));
          });
        });



}



  var table = $('#datatable').DataTable({
    dom: 'Bfrtip',
        buttons: [
            'copy', 'csv', 'excel', 'pdf', 'print'
        ],
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
     'order': [[4, 'desc']]
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

      console.log($('#mydaterange').val());

        $('#btnclearallfilters').on('click',function(){
            min_s = <?php echo App\Models\Lot::min('surface'); ?>;
max_s = <?php echo App\Models\Lot::max('surface'); ?>;


max_date_reservation = <?php echo json_encode($array_dates_res[1]); ?>;
min_date_reservation = <?php echo json_encode($array_dates_res[0]); ?>;

console.log(min_date_reservation);

start = new Date(min_date_reservation);
end = new Date(max_date_reservation);


$("#mydaterange").data('daterangepicker').setStartDate(start);
$("#mydaterange").data('daterangepicker').setEndDate(end);




                console.log('hello clear');
            $('#selected_fltranche').val(0).trigger('change');
            $('#selected_flilot').val(0).trigger('change');
            $('#selected_fltype').val(0).trigger('change');
            $('#selected_flstatu').val(0).trigger('change');
            $('#selected_fltypeclient').val(0).trigger('change');
            $('#selected_flcommercial').val(0).trigger('change');
            $("#range_prix_vente").ionRangeSlider();



    // 2. Save instance to variable
    let my_range_prix_vente = $("#range_prix_vente").data("ionRangeSlider");

    // 3. Update range slider content (this will change handles positions)
    my_range_prix_vente.update({
        from: min_prix_vente,
        to: max_prix_vente
    });

    // 4. Reset range slider to initial values
    my_range_prix_vente.reset();




        $("#range_reliquat").ionRangeSlider();

    // 2. Save instance to variable
    let my_range_reliquat = $("#range_reliquat").data("ionRangeSlider");

    // 3. Update range slider content (this will change handles positions)
    my_range_reliquat.update({
        from: min_reliquat,
        to: max_reliquat
    });

    // 4. Reset range slider to initial values
    my_range_reliquat.reset();

        });



        $('.filterallselections').on('click',function(){
                start_date = "";
                end_date = "";


          start_date = $('#mydaterange').data('daterangepicker').startDate.format('YYYY-MM-DD');
            end_date = $('#mydaterange').data('daterangepicker').endDate.format('YYYY-MM-DD');

var formData = {
    'selected_fltranche':$('#selected_fltranche').val(),
    'selected_flilot':$('#selected_flilot').val(),
    'selected_fltype':$('#selected_fltype').val(),
    'selected_flstatu':$('#selected_flstatu').val(),
    'selected_fltypeclient':$('#selected_fltypeclient').val(),
    'selected_flcommercial':$('#selected_flcommercial').val(),
    'range_prix_vente':$('#range_prix_vente').val(),
    'range_reliquat':$('#range_reliquat').val(),
    'start_date_range':start_date,
    'end_date_range':end_date,

};

selected_fltranche = $('#selected_fltranche');
selected_flilot = $('#selected_flilot');
selected_fltype = $('#selected_fltype');
selected_flstatu = $('#selected_flstatu');
selected_fltypeclient = $('#selected_fltypeclient');
selected_flcommercial = $('#selected_flcommercial');

    text_range_prix_vente =$('#range_prix_vente').val();

 array_range_prix_vente = text_range_prix_vente.split(';');

 text_range_reliquat =$('#range_reliquat').val();

 array_range_reliquat = text_range_reliquat.split(';');


console.log('this is my'+array_range_reliquat[0]);
console.log(selected_fltranche.attr('id'));


var array_selected_fletat = [];
            array_selected_flstatu =  $('#selected_flstatu').val();
            localStorage.setItem("selected_flstatu",array_selected_flstatu);

            var array_selected_flilot = [];
array_selected_flilot =  $('#selected_flilot').val();
            localStorage.setItem("selected_flilot",array_selected_flilot);


var array_selected_fltype = [];
array_selected_fltype =  $('#selected_fltype').val();
            localStorage.setItem("selected_fltype",array_selected_fltype);

var array_selected_fletat = [];
            array_selected_fltypeclient =  $('#selected_fltypeclient').val();
            localStorage.setItem("selected_fltypeclient",array_selected_fltypeclient);

            var array_selected_flcommercial = [];
            array_selected_flcommercial =  $('#selected_flcommercial').val();
            localStorage.setItem("selected_flcommercial",array_selected_flcommercial);


localStorage.setItem("min_reliquat",array_range_reliquat[0]);
localStorage.setItem("max_reliquat",array_range_reliquat[1]);
localStorage.setItem("min_prix_vente",array_range_prix_vente[0]);
localStorage.setItem("max_prix_vente",array_range_prix_vente[1]);
localStorage.setItem("startdate",start_date);
localStorage.setItem("enddate",end_date);


alltranches = <?php echo $alltranches ;?>;
allilots = <?php echo $allilots ;?>;
alltypes = <?php echo $alltypes ;?>;
allstatus = <?php echo $allstatus; ?>;






});



        $('#btnaddreservation').on('click',function(){
            custom_url = "{{route('createnew.reservation')}}";

            $('.errorhypotheque').hide();
                        $('.errorsurface').hide();
                        $('.errordate_reservation').hide();
                        $('.errorprix_vente').hide();
                        $('.errorreliquat').hide();
                        $('.erroravance').hide();

                        $('.errorselected_uplot').hide();
                        $('.errorselected_uptranche').hide();

                        $('.errorselected_upcommercial').hide();
                        $('.errorselected_uplistclient').hide();
 $('#box_modalfooter').show();

            $('#reservation_id').val("");

        $('#selected_upetat').val("0").trigger('change');
        $('#selected_uplistclient').val("0").trigger('change');
        $('#selected_upcommercial').val("0").trigger('change');

        $('#selected_uplot').val("0").trigger('change');

        $('#avance').val("");

            $('#prixvent_box').css('display','block');
            $('#prix_vente').val("");


        $('#reliquat').val("");

        $('#date_reservation').val("");

        $('#surface').val("");

        $('#hypotheque').val("");



          $('#avance').attr('readonly',false);

    $('#prixvent_box').css('display','block');
    $('#prix_vente').attr('readonly',false);


$('#reliquat').attr('readonly',false);

$('#date_reservation').attr('readonly',false);

$('#surface').attr('readonly',false);
$('#hypotheque').attr('readonly',false);

        });



        $('#formreservationajax').on('submit',function(event){

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
                        $('.errordate_reservation').hide();
                        $('.errorprix_vente').hide();
                        $('.errorreliquat').hide();
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
                    <p class="mg-b-20 mg-x-20" id="message_response">`+response.msg+`</p><button aria-label="Close" class="btn btn-success pd-x-25" onclick="{  location.reload();}" data-bs-dismiss="modal">Continue</button>`;

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
                     if(response.input == 'reliquat'){
                        $('.errorreliquat').show();


                            message = response.msg;


                            $('.errorreliquat').html(message);
                    }else{
                        $('.errorreliquat').hide();
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

                        $('.errorreliquat').hide();
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




            }
        });


        })





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




});

            </script>






@endsection
