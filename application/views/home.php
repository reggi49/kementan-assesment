<script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script>

<script>
var j = jQuery.noConflict();
j(document).ready(function () {
  Highcharts.setOptions({
   colors: ['#50B432', '#ED561B', '#DDDF00', '#24CBE5', '#64E572', '#FF9655', '#FFF263', '#6AF9C4']
  });

 
 // rekap tingkat
    Highcharts.chart('rekap_tingkat', {
        chart: {
            plotBackgroundColor: null,
            plotBorderWidth: null,
            plotShadow: false,
           type: 'pie',
        height: 300
       },
       title: {
       text: 'Rekapitulasi Personil Berdasarkan Tingkat'
        },
        tooltip: {
            pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
        },
        plotOptions: {
            pie: {
                allowPointSelect: true,
                cursor: 'pointer',
               dataLabels: {
                    enabled: false
               },
               showInLegend: true
           }
       },
       series: [{
            name: '',
            colorByPoint: true,
      data: 
        <?php echo $this->M_laporan->dashboard_rekap_tingkat(); 
        ?>
            
        }]
    });
  
  //finish rekap tingkat

});
</script>


<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
     <!--
      <h1>
       Grafik Keadaan Prakom Kemhan
      </h1>
      -->
    </section>

    <!-- Main content -->
    <section class="content">



          
              
              
              <div id="rekap_tingkat" style="width:100%;float:left;padding-left:1%;padding-right:1%;"></div>  

            
      
 
            
 
            <div class="clearfix"></div>




</section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->