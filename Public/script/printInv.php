
    <!-- Bootstrap Core CSS -->
    <link href="plugins/css/bootstrap.min.css" rel="stylesheet">
<?php    


require_once('../../Model/Admin/connexion.php');
$db = getConnection();
$ret = $db->query("SELECT DISTINCT tbl_vente.ID AS ID,tbl_vente.CLIENT AS CLIENT,tbl_vente.MTOTAL AS MTOTAL,
 tbl_vente.STATUTV AS STATUTV, tbl_vente.DATEV AS DATEV, tbl_vente.STATUT AS STATUT,tbl_vente.PAYE AS PAYE,tbl_vente.RESTE AS RESTE,
 tbl_vente.DATEV AS DATEV,tbl_users.NAME,tbl_vente.PTYPE FROM tbl_vente,tbl_users,tbl_vente_article
  WHERE tbl_vente.IDU = tbl_users.ID and tbl_vente_article.IDV=tbl_vente.ID ORDER BY ID DESC");

$cnt = 1;
$ventes = $ret->fetchAll(PDO::FETCH_OBJ);

 $table = '<style>
.star img {
    visibility: visible;
}</style>
<div class="page-header"><center><h3><b>Inventaire</b></h3></center></div>
<table class="table table-bordered table-striped table-condensed" style="width: 100%;">
         <thead>
         <th>Client</th>
         <th>Total</th>
         <th>Payé</th>
         <th>Reste</th>
         <th>Paiement</th>
         <th>Type</th>
         <th>Date</th>
         <th>Crée par</th>
         </thead> 
         <tbody>';       
foreach ($ventes as $cat) {
         $table .=' <tr class="odd gradeX">
                <td>'.$cat->CLIENT.'</td>
                <td>'.$cat->MTOTAL.'$</td>
                <td>'.$cat->PAYE.'$</td>
                <td>'.$cat->RESTE.'$</td>';
                if ($cat->STATUTV == 'totalite') {
                    $table .= '<td>Totalité</td>';
                } else if ($cat->STATUTV == 'partiel') {
                    $table .=  '<td>Partiel</td>';
                } else {
                    $table .= '<td>No Payment</td>';
                }
                 $table .= 
                 '<td>'.$cat->PTYPE.'</td>                 
                 <td>'.$cat->DATEV.'</td>
                 <td>'.$cat->NAME.'</td>
            </tr>';
         }
         $table .='  </tbody>    
</table>';
// $connect->close();

echo $table;