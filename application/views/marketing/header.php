<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title><?php echo $pageTitle; ?></title>

  <!-- Custom fonts for this template-->
  <link href="<?php echo base_url(); ?>assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="<?php echo base_url(); ?>assets/css/sb-admin-2.min.css" rel="stylesheet">
  <link href="<?php echo base_url(); ?>assets/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

   <script src="<?php echo base_url();?>assets/js/jquery.js"></script>
<script src="<?php echo base_url();?>assets/js/highcharts.js"></script>


<script>
  function printContent(el){
    var restorepage = document.body.innerHTML;
    var printcontent = document.getElementById(el).innerHTML;
    document.body.innerHTML = printcontent;
    window.print();
    document.body.innerHTML = restorepage;
  }
  </script>
 <!--  <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" /> -->
</head>
<style>
 #chart{
   z-index:-10;} 
</style>
<!-- <script type="text/javascript" src="<?php echo base_url();?>assets/js/jquery.js"></script>
            <div id="container"> 
            <?php foreach ($suara as $mh) ; ?>
            <?php foreach ($suara1 as $mh1) ; ?> 
           <?php foreach ($suara2 as $mh2) ; ?> 
            <?php foreach ($suara3 as $c4) ; ?> 
            <?php foreach ($suara4 as $c5) ; ?>
            <?php foreach ($suara5 as $c6) ; ?>
            <script type="text/javascript">  
               $(function () {  
                 var chart;   
                    $(document).ready(function () { 
                        var colors = Highcharts.getOptions().colors, 
                          categories = ['Calon ke I', 'Calon Ke II' ,'Calon Ke III', 'Calon IV', 'Calon Ke V', 'Calon Ke VI'],
                              name = 'Perolehan suara',
                               data = [{ 
                               y:<?php echo $mh->id_kuisioner;?>, 
                               color:colors[0],   
                                drilldown:{
                                        name:'Calon Ke I',  
                                        categories:['Calon Ke I'], 
                                        data:[<?php echo $mh->puas;?>], 
                                        color:colors[0]     
                                } }, 
                                { 
                                y:<?php echo $mh1->id_kuisioner;?>,
                                color:colors[1],          
                                  drilldown:{          
                                         name:'Calon Ke II',  
                                          categories:['Calon Ke II'],                                        
                                          data:[<?php echo $mh1->puas;?>],                      
                                          color:colors[1]  
                                 } },];  
                  function setChart(name, categories, data, color) {
                     chart.xAxis[0].setCategories(categories, false); 
                          chart.series[0].remove(false);   
                            chart.addSeries({      
                               name:name,          
                               data:data,    
                               color:color || 'white' }, false);
                               chart.redraw(); 
                                chart = new Highcharts.Chart({
                                   chart:{    
                                        renderTo:'container',
                                        type:'column'   
                                         },      
                                         title:{ 
                                         text:'PEROLEHAN SUARA PADA PEMILIHAN CAPRESDAN CAWAPRES,TAHUN 2013 /2014' 
                                         },                       
                                          subtitle:{                           
                                          text:'Click the columns to see winner. Clickagain to view detail.'    
                                          },
                                          xAxis:{
                                          categories:categories
                                          },
                                          yAxis:{
                                            title:{
                                            text:'Total percent Winner '
                                            }
                                          },
                                          plotOptions:{ 
                                          column:{   
                                           cursor:'pointer',
                                             point:{   
                                              events:{ 
                                               click:function () {    
                                                  var drilldown = this.drilldown; 
                                                   if (drilldown) { // drill down                                                setChart(drilldown.name,drilldown.categories, drilldown.data, drilldown.color);                                            } else { // restore                                                setChart(name, categories,data);                                            }
                                                    } }},
                                                    dataLabels:{       
                                                      enabled:true,   
                                                      color:colors[0],                                    
                                                      style:{                                        
                                                        fontWeight:'bold'                                   
                                                      },                                    
                                                      formatter:function () {                                        
                                                        return this.y + '%';                                    
                                                      }                               
                                                       }                            
                                                      }                       
                                                       },                       
                                                        tooltip:{               
                                                    formatter:function () { 
                                                      var point = this.point, 
                                                      s = this.x + ':<b>' + this.y + '%orang</b><br/>'; 
                                                       if (point.drilldown) { 
                                                        s += 'Click to view ' + point.category+ 'detail '; 
                                                        } else {
                                                        s += 'Click again to back'; 
                                                         }                                
                                                       return s;                            
                                                     }                        
                                                   },                        
                                                 series:[                            
                                               {                                
                                               name:name,                                
                                             data:data,                                
                                           color:'white'                            
                                         }                        
                                       ],                        
                                     exporting:{                            
                                     enabled:false                        
                                   }                    
                                 });                
                               });            
                             });       
                              </script>    </div><script type="text/javascript" src="<?php echo base_url();?>assets/js/highcharts.js"></script><script type="text/javascript" src="<?php echo base_url();?>assets/js/exporting.js"></script> -->


<body id="page-top">

 