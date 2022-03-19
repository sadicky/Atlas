
    <!-- Bootstrap Core CSS -->
    <link href="plugins/css/bootstrap.min.css" rel="stylesheet">
<?php    


require_once('../../Model/Admin/articles.class.php');
require_once('../../Model/Admin/categories.class.php');
$art = new Articles();
$cat = new Categories();
$cats = $art->getOutStock();

 $table = '
<div class="page-header">Stock</div>
<center><h3><b>Produits Epuisés</b></h3></center>
<table class="table table-bordered table-striped table-condensed" style="width: 100%;">
         <thead>
         <th>#</th>
         <th>Articles</th>
         <th>Catégories</th>
         <th>Prix</th>
         <th>Quantité</th>
         <th>Peremption</th>
         </thead> 
         <tbody>';
         $cnt = 1;
        foreach($cats as $cat){
         $table .=' <tr class="odd gradeX">
                <td>'.$cnt.'</td>
                <td>'.$cat->ARTICLE.'</td>
                <td>'.$cat->CATEGORIE.'$</td>
                <td>'.$cat->PRIX.'</td>
                <td>'.$cat->QTE.'</td>
                 <td>'. $cat->PEREMPTION.'</td>
            </tr>';
            $cnt++;
         }
         $table .='  </tbody>    
</table>';
// $connect->close();

echo $table;