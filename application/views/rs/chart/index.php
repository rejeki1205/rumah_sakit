    <!-- Chart.js -->
    <script src="<?=base_url()?>assets_admin/vendors/Chart.js/dist/Chart.min.js"></script>
<div class="">

    <div class="clearfix"></div>

        <div class="row">
            <div class="col-md-12 col-sm-12 ">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Data Chart</h2>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <div class="row">
                            <div class="col-md-6 col-sm-6  ">
                                <div class="x_panel">
                                <div class="x_title">
                                    <h2>Bar graph Umur</h2>
                                    <div class="clearfix"></div>
                                </div>
                                <div class="x_content">
                                    <canvas id="mybarChart1"></canvas>
                                </div>
                                </div>
                            </div>

                            <div class="col-md-6 col-sm-6  ">
                                <div class="x_panel">
                                <div class="x_title">
                                    <h2>Pie Graph Chart Jenis Kelamin</h2>
                                    <div class="clearfix"></div>
                                </div>
                                <div class="x_content">
                                    <canvas id="pieChart1"></canvas>
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

<script> 
var usiaCanvas = document.getElementById("mybarChart1").getContext('2d');   
var IsidataUsia = {     
    label: 'Usia',     
    data: [ <?php foreach ($data_pasien_bar as $data) { echo $data->jumlah . ", "; } ?> ],     
    backgroundColor: '#9ED4A9',     
    borderColor: '##93C3D2',     
    yAxisID: "y-axis-data1" };    
    var datausia = {     
        labels: [ <?php foreach ($data_pasien_bar as $data) { echo "'" .$data->range_umur ."',"; } ?> ],     
        datasets: [IsidataUsia] };   
        var chartOptions = {     
            scales: {        
                xAxes: [{ categoryPercentage: 0.5 }],         
                yAxes: [ { id: "y-axis-data1" , ticks: { beginAtZero:true } } ]      }  };    
                var barChart = new Chart(usiaCanvas, {     
                    type: 'bar',     data: datausia,     options: chartOptions  }); 


var dataCanvas = document.getElementById("pieChart1").getContext('2d');   
var Isidata = {    
    label: 'jk',    
    data: [<?php foreach ($data_pasien_pie as $data) { 
        echo $data->jumlahnya . ", "; } ?> ],    
        backgroundColor: ["#99ffcc","#ff9999"],    
        borderColor: ["#99ffcc","#ff9999"],        
        yAxisID: "y-axis-data1" };

var datausia = {  
    labels: [ <?php foreach ($data_pasien_pie as $data) { 
        echo "'" .$data->jenis_kelamin ."',"; } ?> ],  
        datasets: [Isidata] };   var chartOptions = {     
            scales: {        xAxes: [{ categoryPercentage: 0.5 }],        
            yAxes: [ { id: "y-axis-data1" , ticks: { beginAtZero:true } } ]     } };   
            var barChart = new Chart(dataCanvas, {  
                type: 'pie',       
                data: datausia,       
                options: chartOptions     
                });

 </script>