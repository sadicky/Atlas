
    <!-- Bootstrap Core CSS -->
    <link href="plugins/css/bootstrap.min.css" rel="stylesheet">
<?php    


require_once('../../Model/Admin/historic.class.php');
$hist= new Historics();
$getHist= $hist->getHistoricApp();

 $table = '<style>
.star img {
    visibility: visible;
}</style>
<div class="page-header"><center><h3><b>Historique - Approvisionnement</b></h3></center></div>
<table class="table table-bordered table-striped table-condensed" style="width: 100%;">
         <thead>
            <th>ID</th>
            <th>Désignation</th>
            <th>Expiration</th>
            <th>Pays/Ville de provenance</th>
            <th>Ajouté le</th>
            <th>Par</th>
         </thead> 
         <tbody>';
         $cnt = 1;
        foreach($getHist as $cat){
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