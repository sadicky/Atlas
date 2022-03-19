
    <!-- Bootstrap Core CSS -->
    <link href="plugins/css/bootstrap.min.css" rel="stylesheet">
<?php    



require_once('../../Model/Admin/vente.class.php');
// $art = new Articles();
$vente = new Vente();	
$cats = $vente->getVente();	

 $table = '
<div class="page-header">Vente</div>
<center><h3><b>Historique - Quincaillerie Metropole</b></h3></center>
<table class="table table-bordered table-striped table-condensed" style="width: 100%;">
         <thead>
         <th>#</th>
         <th>Client</th>
         <th>Total</th>
         <th>Payé</th>
         <th>Reste</th>
         <th>Statut P</th>
         <th>Type</th>
         <th>Date</th>
         </thead> 
         <tbody>';
         $cnt = 1;
        foreach($cats as $cat){
         $table .=' <tr class="odd gradeX">
                <td>'.$cnt.'</td>
                <td>'.$cat->CLIENT.'</td>
                <td>'.$cat->MTOTAL.'$</td>
                <td>'.$cat->PAYE.'$</td>
                <td>'.$cat->RESTE.'$</td>';
                if ($cat->STATUTV == 'totalite') {
                    $table .="<td>Totalité</td>";
                } else if ($cat->STATUTV == 'partiel') {
                    $table .="<td>Partiel</td>";
                } else {
                    $table .="<td>No Payment</td>";
                }                 
                $table .=' <td>'. $cat->PTYPE.'</td>
                 <td>'. $cat->DATEV.'</td>
            </tr>';
            $cnt++;
         }
         $table .='  </tbody>    
</table>';
// $connect->close();

echo $table;