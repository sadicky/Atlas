
    <!-- Bootstrap Core CSS -->
    <link href="plugins/css/bootstrap.min.css" rel="stylesheet">
<?php    


require_once('../../Model/Admin/historic.class.php');
$hist= new Historics();
$getHist= $hist->getHistoricApp();
$cnt = 1;

 $table = '<style>
.star img {
    visibility: visible;
}</style>
<div class="page-header"><center><h3><b>Historique - Approvisionnement</b></h3></center></div>
<table class="table table-bordered table-striped table-condensed" style="width: 100%;">
         <thead>
         <th>ID</th>
         <th>ARTICLE</th>
         <th>PEREMPTION</th>
         <th>PAYS DE FABRICATION</th>
         <th>DATE APPROVISIONNEMENT</th>
         <th>UTILISATEUR</th>
         </thead> 
         <tbody>';       
foreach ($getHist as $cat) {
         $table .=' <tr class="odd gradeX">
                <td>'.$cnt.'</td>
                <td>'.$cat->ARTICLE.'</td>
                <td>'.$cat->PER.'</td>
                <td>'.$cat->PAYSF.'</td>
                <td>'.$cat->DATEA.'</td>
                 <td>'.$cat->NAME.'</td>
            </tr>';
            $cnt++;
         }
         $table .='  </tbody>    
</table>';
// $connect->close();

echo $table;