
@extends('admin-master')

@section('content')

<style>
    .spinner_hide{
        display: none;
    }

    .spinner_show{
        display: block;
    }

</style>
   <div class="main-content app-content mt-0">
                <div class="side-app">

                    <!-- CONTAINER -->
                    <div class="main-container container-fluid">

                        <!-- PAGE-HEADER -->
                        <div class="page-header">
                            <h4>Tableau de Bord</h4>
                            <div class="col-lg-4 col-md-4 col-sm-4 col-xl-4">
                            <div class="input-group">
                                <div class="input-group-text">
                                    <i class="fa fa-calendar tx-16 lh-0 op-6"></i>
                                </div><input class="form-control fc-datepicker" id="analytic_daterange" style="border:none;" name="daterange" placeholder="MM/DD/YYYY" type="text"><i class="fa fa-refresh fa-2x my-auto " id="reset_date_analytique" style="padding: 5px;border:none;color:#7B894E;font-size:28px;background-color:white;cursor:pointer;" aria-hidden="true"></i>
                            </div>
                            </div>
                        </div>
                        <!-- PAGE-HEADER END -->

                        <!-- ROW-1 -->
                        <div class="row">
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xl-12">
                                <div class="row">
                                    <div class="col-lg-6 col-md-6 col-sm-12 col-xl-3">
                                        <div class="card overflow-hidden">
                                            <div class="card-body">
                                                <div class="d-flex">
                                                    <div class="mt-2 content_analyse">
                                                        <h6 class="">CA LOTS VENDUS</h6>
                                                        <h2 id="sum_prix_vente_vendulots" class="mb-0 number-font" style="font-size: 20px;">{{$PostData['sum_prix_vente_vendulots']}} DHS</h2>
                                                    </div>
                                                    <div class="spinner-border m-auto text-danger me-2 spinner_loading spinner_hide" role="status">
                                            <span class="visually-hidden">Loading...</span>
                                        </div>
                                      
                                                </div>
                                               
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-12 col-xl-3">
                                        <div class="card overflow-hidden">
                                            <div class="card-body">
                                                <div class="d-flex">
                                                    <div class="mt-2 content_analyse">
                                                        <h6 class="">CA LOTS RESERVES</h6>
                                                        <h2 id="sum_prix_vente_reservelots" class="mb-0 number-font" style="font-size: 20px;">{{$PostData['sum_prix_vente_reservelots']}} DHS</h2>
                                                    </div>
                                                    <div class="spinner-border m-auto text-secondary me-2 spinner_loading spinner_hide" role="status">
                                            <span class="visually-hidden">Loading...</span>
                                        </div>
                                                </div>
                                              
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-12 col-xl-3">
                                        <div class="card overflow-hidden">
                                            <div class="card-body">
                                                <div class="d-flex">
                                                    <div class="mt-2 content_analyse">
                                                        <h6 class="">TOTAL AVANCES</h6>
                                                        <h2 id="total_avances" class="mb-0 number-font" style="font-size: 20px;">{{$PostData['total_avances']}} DHS</h2>
                                                    </div>
                                                
                                        
                                        <div class="spinner-border m-auto text-primary me-2 spinner_loading spinner_hide" role="status">
                                            <span class="visually-hidden">Loading...</span>
                                        </div>
                                      
                                      
                                    
                                    
                                      
                                                </div>
                                                
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-12 col-xl-3">
                                        <div class="card overflow-hidden">
                                            <div class="card-body">
                                                <div class="d-flex">
                                                    <div class="mt-2 content_analyse">
                                                        <h6 class="">TOTAL RELIQUATS</h6>
                                                        <h2 id="total_reliquat" class="mb-0 number-font" style="font-size: 20px;">{{$PostData['total_reliquat']}} DHS</h2>
                                                    </div>
                                                    <div class="spinner-border m-auto text-success me-2 spinner_loading spinner_hide" role="status">
                                            <span class="visually-hidden">Loading...</span>
                                        </div>
                                                </div>
                                                
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- ROW-1 END -->
                        
                        <!-- COL END -->
                    </div>
                    <!-- ROW CLOSED -->
                    <div class="row">
                        <div class="col-sm-12 col-md-6 col-lg-6  col-xl-3">
                            <div class="card widgets-cards bg-primary box-primary-shadow">
                                <div class="card-body d-flex justify-content-center align-items-center">
                                    <div class="chart-circle chart-circle-sm ms-3 mt-1" data-value="{{($PostData['degree_sum_nbr_lots_libre']/100)}}" data-thickness="6" data-bs-color="#3c5998">
                                        <div class="chart-circle-value text-white" id="degree_sum_nbr_lots_libre">{{$PostData['degree_sum_nbr_lots_libre']}}%</div>
                                    </div>
                                    <div class="wrp text-wrapper text-white p-3">
                                        <p class="mt-0" id="sum_nbr_lots_libre">{{$PostData['sum_nbr_lots_libre']}}</p>
                                        <p class="mt-1 mb-0">Nbr Lots Libres</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- COL END -->
                        <div class="col-sm-12 col-md-6 col-lg-6  col-xl-3">
                            <div class="card widgets-cards bg-success box-success-shadow">
                                <div class="card-body d-flex justify-content-center align-items-center">
                                    <div class="chart-circle chart-circle-sm ms-3 mt-1" data-value="{{($PostData['degree_sum_nbr_lots_investisseur']/100)}}" data-thickness="6" data-bs-color="#0e8c79">
                                        <div class="chart-circle-value text-white" id="degree_sum_nbr_lots_investisseur">{{$PostData['degree_sum_nbr_lots_investisseur']}}%</div>
                                    </div>
                                    <div class="wrp text-wrapper text-white p-3">
                                        <p class="mt-0" id="sum_nbr_lots_investisseur">{{$PostData['sum_nbr_lots_investisseur']}}</p>
                                        <p class=" mt-1 mb-0"> Nbr Lots Investisseurs</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- COL END -->
                        <div class="col-sm-12 col-md-6 col-lg-6  col-xl-3">
                            <div class="card widgets-cards bg-warning box-warning-shadow">
                                <div class="card-body d-flex justify-content-center align-items-center">
                                    <div class="chart-circle chart-circle-sm ms-3 mt-1" data-value="{{($PostData['degree_sum_nbr_lots_reserve']/100)}}" data-thickness="6" data-bs-color="#c68806">
                                        <div class="chart-circle-value text-white" id="degree_sum_nbr_lots_reserve">{{$PostData['degree_sum_nbr_lots_reserve']}}%</div>
                                    </div>
                                    <div class="wrp text-wrapper text-white p-3">
                                        <p class="mt-0" id="sum_nbr_lots_reserve">{{$PostData['sum_nbr_lots_reserve']}}</p>
                                        <p class=" mt-1 mb-0"> Nbr Lots Réserves</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- COL END -->
                        <div class="col-sm-12 col-md-6 col-lg-6  col-xl-3">
                            <div class="card widgets-cards bg-danger box-danger-shadow">
                                <div class="card-body d-flex justify-content-center align-items-center">
                                    <div class="chart-circle chart-circle-sm ms-3 mt-1" data-value="{{($PostData['degree_sum_nbr_lots_vendu']/100)}}" data-thickness="6" data-bs-color="#c21a1a">
                                        <div class="chart-circle-value text-white" id="degree_sum_nbr_lots_vendu">{{$PostData['degree_sum_nbr_lots_vendu']}}%</div>
                                    </div>
                                    <div class="wrp text-wrapper text-white p-3">
                                        <p class="mt-0" id="sum_nbr_lots_vendu">{{$PostData['sum_nbr_lots_vendu']}}</p>
                                        <p class=" mt-1 mb-0"> Nbr Lots Vendus</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                       
                       
                    </div>
                    <!-- ROW OPEN -->
                   
                        <!-- ROW-2 -->
                        <div class="row">
                           
                            <!-- COL END -->
                            <div class="col-lg-12 col-md-12">
                                <div class="card">
                                    <div class="card-header">
                                        <h3 class="card-title" id="titre_graphique"></h3>
                                    </div>
                                    <div class="card-body">
                                        <div class="chart-container">
                                            
                                            <canvas id="chartBar2" class="h-275"></canvas>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            
                            <!-- COL END -->
                        </div>
                        <!-- ROW-2 END -->

                       
                    </div>
                    <!-- CONTAINER END -->
                </div>
            </div>

            <!--app-content close-->
           
            <script>
                $(document).ready(function(){

                    current_year = new Date();
                    graphique_content = "Le Graphique De "+current_year.getFullYear()+" PAR MOIS";

                    $('#titre_graphique').html("");

                    $('#titre_graphique').html(graphique_content);

                    if(localStorage.getItem("anlyse_start_date") != null && localStorage.getItem("anlyse_start_date") != null){

let  start = new Date(localStorage.getItem('anlyse_start_date').format('m/d/Y'));
let end = new Date(localStorage.getItem('anlyse_start_date').format('m/d/Y'));


$(function() {
        $('input[id="analytic_daterange"]').daterangepicker({
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
        $('input[id="analytic_daterange"]').daterangepicker({
          opens: 'left',
          
          startDate: res_start,
          endDate: res_end,
        }, function(start, end, label) {
          console.log("A new date selection was made: " + start.format('YYYY-MM-DD') + ' to ' + end.format('YYYY-MM-DD'));

           $('.content_analyse').hide();
          $('.spinner_loading').removeClass('spinner_hide');
          $('.spinner_loading').addClass('spinner_show');
         
          anlyse_start_date = start.format('YYYY-MM-DD');
    anlyse_end_date = end.format('YYYY-MM-DD');

    PostData = {
            'start_date':anlyse_start_date,
            'end_date':anlyse_end_date,
            
        }

    console.log(PostData)
    $.ajax({
           
           type:'get',
           url: '{{route("analytic.filterajaxbydate")}}',
           data:PostData,
           dataType:'JSON',
         
           success:function(response){
       
                   console.log('e');
               if(response.status == 200)
               {
                $('.content_analyse').show();
                $('.spinner_loading').removeClass('spinner_show');
          $('.spinner_loading').addClass('spinner_hide');
            
              

                  $('#degree_sum_nbr_lots_investisseur').html(response.data.degree_sum_nbr_lots_investisseur);
                  $('#degree_sum_nbr_lots_libre').html(response.data.degree_sum_nbr_lots_libre);
                  $('#degree_sum_nbr_lots_reserve').html(response.data.degree_sum_nbr_lots_reserve);
                  $('#degree_sum_nbr_lots_vendu').html(response.data.degree_sum_nbr_lots_vendu);
                  $('#sum_nbr_lots_investisseur').html(response.data.sum_nbr_lots_investisseur);
                  $('#sum_nbr_lots_libre').html(response.data.sum_nbr_lots_libre);
                  $('#sum_nbr_lots_reserve').html(response.data.sum_nbr_lots_reserve);
                  $('#sum_nbr_lots_vendu').html(response.data.sum_nbr_lots_vendu);
                  $('#sum_prix_vente_reservelots').html(response.data.sum_prix_vente_reservelots+' DH');
                  $('#sum_prix_vente_vendulots').html(response.data.sum_prix_vente_vendulots+' DH');
                  $('#total_avances').html(response.data.total_avances+' DH');
                  $('#total_reliquat').html(response.data.total_reliquat+' DH');
                
                   
                     
               }

     

             
           }
       });
       
    

        });
      });




}

                });


            </script>
            <script>


            $('#reset_date_analytique').on('click',function(){

                max_date_reservation = <?php echo json_encode($array_dates_res[1]); ?>;
                min_date_reservation = <?php echo json_encode($array_dates_res[0]); ?>;

                date_format_as_db_min = <?php echo json_encode(date("Y-m-d", strtotime($array_dates_res[0]))); ?>;
                date_format_as_db_max = <?php echo json_encode(date("Y-m-d", strtotime($array_dates_res[1]))); ?>;

                    console.log(date_format_as_db_min);

                start = new Date(min_date_reservation);
                    end = new Date(max_date_reservation);


                $("#analytic_daterange").data('daterangepicker').setStartDate(start);
                $("#analytic_daterange").data('daterangepicker').setEndDate(end);

              
                $('.content_analyse').hide();
                $('.spinner_loading').addClass('spinner_show');
          $('.spinner_loading').removeClass('spinner_hide');
            
              


  
    $.ajax({
           
           type:'get',
           url: '{{route("analytic.filterajaxbydate")}}',
          
           dataType:'JSON',
         
           success:function(response){
       
                   console.log('e');
               if(response.status == 200)
               {
                $('.content_analyse').show();
                $('.spinner_loading').removeClass('spinner_show');
          $('.spinner_loading').addClass('spinner_hide');
            
              

                  $('#degree_sum_nbr_lots_investisseur').html(response.data.degree_sum_nbr_lots_investisseur);
                  $('#degree_sum_nbr_lots_libre').html(response.data.degree_sum_nbr_lots_libre);
                  $('#degree_sum_nbr_lots_reserve').html(response.data.degree_sum_nbr_lots_reserve);
                  $('#degree_sum_nbr_lots_vendu').html(response.data.degree_sum_nbr_lots_vendu);
                  $('#sum_nbr_lots_investisseur').html(response.data.sum_nbr_lots_investisseur);
                  $('#sum_nbr_lots_libre').html(response.data.sum_nbr_lots_libre);
                  $('#sum_nbr_lots_reserve').html(response.data.sum_nbr_lots_reserve);
                  $('#sum_nbr_lots_vendu').html(response.data.sum_nbr_lots_vendu);
                  $('#sum_prix_vente_reservelots').html(response.data.sum_prix_vente_reservelots+' DH');
                  $('#sum_prix_vente_vendulots').html(response.data.sum_prix_vente_vendulots+' DH');
                  $('#total_avances').html(response.data.total_avances+' DH');
                  $('#total_reliquat').html(response.data.total_reliquat+' DH');
                
                   
                     
               }

     

             
           }
       });
       
    


            });

array_data = [];

$(function() {
	"use strict";


let months=["January","February","March","April","June", "July", "August", "September", "October", "November", "December"];
let currentMonth=new Date().getMonth()

let datafor_lotres = <?php echo json_encode($PostData['datafor_lotres']) ;?>;
let datafor_lotvendu = <?php echo json_encode($PostData['datafor_lotvendu']) ;?>;
let get_crrent_year = new Date().getFullYear().toString().substr(-2);
console.log(get_crrent_year);

    /* Bar-Chart2*/

    console.log(array_data);
    var ctx = document.getElementById("chartBar2");
    var myChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels:["janvier","février","mars","avril","mai","juin", "juillet", "aout", "septembre", "octobre", "novembre", "décembre"],
            datasets: [
                {
                label: "CA Lots Vendus",
                data: datafor_lotvendu,
                borderColor: "#7b894e",
                borderWidth: "0",
                backgroundColor: "#7b894e"
            },{
                label: "CA Lots Reserve",
                data: datafor_lotres,
                borderColor: "#725F45",
                borderWidth: "0",
                backgroundColor: "#725F45"
            }, 
          
            
            ]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            scales: {
                x:{
                    type:'time',
                    time:{
                        unit:'day'
                    }
                },
                xAxes: [{
                    barPercentage: 0.4,
                    barValueSpacing: 0,
                    barDatasetSpacing: 0,
                    barRadius: 0,
                    ticks: {
                        fontColor: "#9ba6b5",
                    },
                    gridLines: {
                        color: 'rgba(119, 119, 142, 0.2)'
                    }
                }],
                yAxes: [{
                    ticks: {
                        beginAtZero: true,
                        fontColor: "#9ba6b5",
                    },
                    gridLines: {
                        color: 'rgba(119, 119, 142, 0.2)'
                    },
                }]
            },
            legend: {
                labels: {
                    fontColor: "#9ba6b5"
                },
            },
        }
    });


  

});
</script>


@endsection