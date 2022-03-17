
    <!-- Bootstrap Core CSS -->
    <link href="plugins/css/bootstrap.min.css" rel="stylesheet">
<?php    

require_once('../../Model/Admin/articles.class.php');
$art = new Articles();
$getStock = $art->getM();

 $table = '<style>
.star img {
    visibility: visible;
}</style>
<div class="page-header"><center><h3><b>Recquisition - Magasin</b></h3></center></div>
<table class="table table-bordered table-striped table-condensed" style="width: 100%;">
         <thead>
            <th>ID</th>
            <th>Articles</th>
            <th>Categorie</th>
            <th>Stock Disponible</th>
            <th>Prix</th>
            <th>Montant</th>
            <th>Statut</th>
            <th>Date</th>
            <th>Par</th>
         </thead> 
         <tbody>';
         $cnt = 1;
        foreach($getStock as $cat){
         $table .=' <tr class="odd gradeX">
                <td>'.$cnt.'</td>
                <td>'.$cat->ARTICLE.'</td>
                <td>'.$cat->CATEGORIE.'</td>
                <td>'.$cat->QTE.'</td>
                <td>'.$cat->PRIX.'</td>
                <td>'.$cat->PRIX*$cat->QTE.'</td>';
                if ($cat->STATUT == 0) {
                 $table .=  "<td> Desactivé</td>";
                } else {
                 $table .=  "<td> Activé</td>";
                }
                $table .= '
                <td>'.$cat->DATER.'</td>
                <td>'.$cat->NAME.'</td>
               </tr>';
            $cnt++;
         }
         $table .='  </tbody>    
</table>';
// $connect->close();

echo $table;