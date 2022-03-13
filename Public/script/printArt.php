
    <!-- Bootstrap Core CSS -->
    <link href="plugins/css/bootstrap.min.css" rel="stylesheet">
<?php    


require_once('../../Model/Admin/articles.class.php');
$art = new Articles();
$arts = $art->getArticlesId();

 $table = '<style>
.star img {
    visibility: visible;
}</style>
<div class="page-header">Dépot</div>
<center><h3><b>Tous les Articles</b></h3></center>
<table class="table table-bordered table-striped table-condensed" style="width: 100%;">
         <thead>
            <th>ID</th>
            <th>Désignation</th>
            <th>Catégorie</th>
            <th>Condit.</th>
            <th>Prix</th>
            <th>Quantité</th>
            <th>Expiration</th>
            <th>Ajouté le</th>
            <th>Par</th>
            <th>Statut</th>
         </thead> 
         <tbody>';
         $cnt = 1;
        foreach($arts as $cat){
         $table .=' <tr class="odd gradeX">
                <td>'.$cnt.'</td>
                <td>'.$cat->ARTICLE.'</td>
                <td>'.$cat->CATEGORIE.'</td>
                <td>'.$cat->CONDITIONEMMENT.'</td>
                <td>'.$cat->PRIX.'</td>
                <td>'.$cat->QTE.'</td>
                <td>'.$cat->PEREMPTION.'</td>
                <td>'.$cat->DATECREAT.'</td>
                <td>'.$cat->USER.'</td>';
                 if ($cat->STATUT == 0) {
                  $table .=  "<td> Desactivé</td>";
                 } else {
                  $table .=  "<td> Activé</td>";
                 }
                 $table .= '
                  </tr>';
            $cnt++;
         }
         $table .='  </tbody>    
</table>';
// $connect->close();

echo $table;