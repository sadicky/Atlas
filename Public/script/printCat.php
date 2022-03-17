
    <!-- Bootstrap Core CSS -->
    <link href="plugins/css/bootstrap.min.css" rel="stylesheet">
<?php    


require_once('../../Model/Admin/categories.class.php');
$cat = new Categories();
$cats = $cat->getCategories();

 $table = '<style>
.star img {
    visibility: visible;
}</style>
<div class="page-header">Dépot</div>
<center><h3><b>Toutes les categories</b></h3></center>
<table class="table table-bordered table-striped table-condensed" style="width: 100%;">
         <thead>
            <th>ID</th>
            <th>Désignation</th>
            <th>Date de Création</th>
            <th>Statut</th>
         </thead> 
         <tbody>';
         $cnt = 1;
        foreach($cats as $cat){
         $table .=' <tr class="odd gradeX">
                <td>'.$cnt.'</td>
                <td>'.$cat->CATEGORIE.'</td>
                <td>'.$cat->CREATEDAT.'</td>';
                 if ($cat->STATUT == 0) {
                  $table .=  "<td> Desactivé</td>";
                 } else {
                  $table .=  "<td> Activé</td>";
                 }
                 $table .= 
                 '
            </tr>';
            $cnt++;
         }
         $table .='  </tbody>    
</table>';
// $connect->close();

echo $table;