
    <!-- Bootstrap Core CSS -->
    <link href="plugins/css/bootstrap.min.css" rel="stylesheet">
<?php    


require_once('../../Model/Admin/caisse.class.php');
$depense = new Caisse();	
$cats = $depense->getDepense();

 $table = '
<div class="page-header">Dépense</div>
<center><h3><b>Sortie Caisse</b></h3></center>
<table class="table table-bordered table-striped table-condensed" style="width: 100%;">
         <thead>
         <th>#</th>
         <th>Client</th>
         <th>Total</th>
         <th>Motif du Paiement</th>
         <th>Statut</th>
         <th>Date Entree</th>
         </thead> 
         <tbody>';
         $cnt = 1;
        foreach($cats as $cat){
         $table .=' <tr class="odd gradeX">
                <td>'.$cnt.'</td>
                <td>'.$cat->BENEFICIAIRE.'</td>
                <td>'.$cat->MONTANT.'$</td>
                <td>'.$cat->MOTIF.'</td>';
                 if ($cat->STATUT == 0) {
                  $table .=  "<td> En attente</td>";
                 } else {
                  $table .=  "<td> Effectué</td>";
                 }
                 $table .= '
                 <td>'. $cat->DATE.'</td>
            </tr>';
            $cnt++;
         }
         $table .='  </tbody>    
</table>';
// $connect->close();

echo $table;