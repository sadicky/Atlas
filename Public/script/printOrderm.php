
    <!-- Bootstrap Core CSS -->
    <link href="plugins/css/bootstrap.min.css" rel="stylesheet">
<?php    

require_once '../../Model/Admin/connexion.php';
$connect = getConnection();

// $orderId = 32;
$orderId = $_POST['orderId'];
$orderDate =NULL;
$clientName = NULL;
$clientContact= NULL;

$sql = "SELECT ID, CLIENT, TEL,DATEV,STATUTV,MTOTAL,PAYE,RESTE,STATUT,PTYPE,DATE
 FROM tbl_vente WHERE ID = $orderId";

$orderResult = $connect->query($sql);
$orderData = $orderResult->fetch();

// print_r($orderData);die();

$idf = $orderData['ID'];
$orderDate = $orderData[3];
$clientName = $orderData[1];
$clientContact = $orderData['TEL']; 
$totalAmount = $orderData[5]; 
$grandTotal = $orderData[10];
$paid = $orderData[6];
$due = $orderData[7];

$orderItemSql = "SELECT tbl_vente_article.IDV,  tbl_vente_article.QTE,
tbl_vente_article.TOTAL,tbl_stockm.ARTICLE,tbl_vente_article.PRIX  FROM tbl_vente_article
   INNER JOIN tbl_stockm ON  tbl_vente_article.IDA = tbl_stockm.ID
 WHERE tbl_vente_article.IDV = $orderId";
$orderItemResult = $connect->query($orderItemSql);

 $table = '<style>
.star img {
    visibility: visible;
}</style>

<table align="center" class="table" style="width: 100%;border:1px solid black;margin-bottom: 10px;">
               <tbody>
                  <tr>
                     <td colspan="5" style="text-align:center;"><h2>FACTURE N°'.$idf.'</h2> </td>
                  </tr>
                  <tr>
                     <td rowspan="8" colspan="2" style="border-left:1px solid black;" background-image="logo.png"><img src="public/Images/logo.png" alt="logo" width="110px;"></td>
                  </tr>
                  <tr></tr>
                  <tr>
                     <td colspan="3" style="font-style: italic;font-weight: 600;text-decoration: underline;font-size: 25px;">Quincaillerie Metropole</td>
                  </tr>
                  <tr>
                     <td colspan="3" >Boulevard du 30 juin,</td>
                  </tr>
                  <tr>
                     <td colspan="3" >Kisangani</td></td>
                  </tr>
                  <tr>
                     <td colspan="3" >Tel:.+243 853775643/998248943</td>
                  </tr>
                  <tr>
                     <td colspan="3" >Email: email0@email.com</td>
                  </tr>
                  <tr>
                     <td colspan="3" style="text-decoration: underline;"> </td>
                  </tr>
                  <tr>
                     <td colspan="2" style="padding: 0px;vertical-align: top;">
                        <table class="table table-condensend" align="left" style=" width: 100%">
                           <tbody>
                              <tr>
                                 <td style="width: 74px;vertical-align: top;" rowspan="3">Client: </td>
                                 <td>&nbsp;<strong>'.$clientName.'</strong></td>
                              </tr>
                              <tr>
                              </tr>
                              <tr>
                              </tr>
                              <tr>
                                 <td style="width: 74px;vertical-align: top;" rowspan="3">Téléphone: </td>
                                 <td>&nbsp;<strong>'.$clientContact.'</strong></td>
                              </tr>
                           </tbody>
                        </table>
                     </td>
                     <td style="padding: 0px;vertical-align: top;" colspan="3">
                        <table align="left" class="table table-condensend" style="width: 100%">
                           <tbody>
                              <tr>
                                 <td>Facture N° :<strong>FACT000'.$idf.'</strong></td>
                              </tr>
                              <tr>
                                 <td>Date: <strong>'.$orderDate.'</strong></td>
                              </tr>
                              <tr>
                                 <td>&nbsp;</td>
                              </tr>
                           </tbody>
                        </table>
                     </td>
                  </tr>
                  <tr class="danger">
                     <th style="width: 123px; text-align: center;border-top-style: solid;border-right-style: solid;border-bottom-style: solid;border-top-width: thin;border-right-width: thin;border-bottom-width: thin;border-top-color: black;border-right-color: black;border-bottom-color: black;-webkit-print-color-adjust: exact;">#
                     </th>
                     <th style="width: 50%;text-align: center;border-top-style: solid;border-right-style: solid;border-bottom-style: solid;border-top-width: thin;border-right-width: thin;border-bottom-width: thin;border-top-color: black;border-right-color: black;border-bottom-color: black;-webkit-print-color-adjust: exact;">&nbsp; Produits</th>
                     <th style="width: 150px;text-align: center;border-top-style: solid;border-right-style: solid;border-bottom-style: solid;border-top-width: thin;border-right-width: thin;border-bottom-width: thin;border-top-color: black;border-right-color: black;border-bottom-color: black;-webkit-print-color-adjust: exact;">Quantité</th>
                     <th style="width: 150px;text-align: center;border-top-style: solid;border-right-style: solid;border-bottom-style: solid;border-top-width: thin;border-right-width: thin;border-bottom-width: thin;border-top-color: black;border-right-color: black;border-bottom-color: black;-webkit-print-color-adjust: exact;">Prix<br>
                     </th>
                     <th style="width: 150px;text-align: center;border-top-style: solid;border-right-style: solid;border-bottom-style: solid;border-top-width: thin;border-right-width: thin;border-bottom-width: thin;border-top-color: black;border-right-color: black;border-bottom-color: black;-webkit-print-color-adjust: exact;">Montant<br>
                        &nbsp;
                     </th>
                  </tr>';
                  $x = 1;
                  // $cgst = 0;
                  // $igst = 0;
                  // if($payment_place == 2)
                  // {
                  //    $igst = $subTotal*18/100;
                  // }
                  // else
                  // {
                  //    $cgst = $subTotal*9/100;
                  // }
                  // $total = $subTotal+2;
            while($row = $orderItemResult->fetch()) {       
                        
               $table .= '<tr align="center">
                     <td style="border-left: 1px solid black;border-right: 1px solid black;height: 27px;">'.$x.'</td>
                     <td style="border-left: 1px solid black;height: 27px;">'.$row['ARTICLE'].'</td>
                     <td style="border-left: 1px solid black;height: 27px;">'.$row['QTE'].'</td>
                     <td style="border-left: 1px solid black;height: 27px;">'.$row['PRIX'].'</td>
                     <td style="border-left: 1px solid black;border-right: 1px solid black;height: 27px;">'.$row['TOTAL'].'</td>
                  </tr>
               ';
            $x++;
            } // /while
                $table.= '
                  <tr style="border-bottom: 1px solid black;">
                     <td style="border-left: 1px solid black;border-right: 1px solid black;height: 27px;"></td>
                     <td style="border-left: 1px solid black;height: 27px;"></td>
                     <td style="border-left: 1px solid black;height: 27px;"></td>
                     <td style="width: 149px;border-right-style: solid;border-bottom-style: solid;border-right-width: thin;border-bottom-width: thin;border-right-color: black;border-bottom-color: #000;background-color: black;color: white;padding-left: 5px;-webkit-print-color-adjust: exact;">&nbsp;</td>
                     <td style="width: 218px; border-top-style: solid; border-right-style: solid; border-bottom-style: solid; border-top-width: thin; border-right-width: thin; border-bottom-width: thin; ">&nbsp;</td>
                  </tr>
                  <tr>
                     <td colspan="3" style="border-top: 1px solid black;">&nbsp;</td>
                     <td rowspan="2" style="border-bottom: 1px solid black;width: 199px;color: white;background-color: black;padding-left: 5px;-webkit-print-color-adjust: exact;"></td>
                     <td rowspan="2" ></td>
                  </tr>
                  <tr>
                  </tr>
                  <tr>
                     <td colspan="3" >&nbsp</td>
                     <td rowspan="2" >Total</td>
                     <td rowspan="2"><b>'.$totalAmount.'$</b></td>
                  </tr>
                  <tr>
                     <td colspan="3">&nbsp</td>
                  </tr>
                  <tr>
                     <td colspan="3">&nbsp</td>
                     <td>Reste</td>
                     <td><b>'.$due.'$</b></td>
                  </tr>
                  <tr>
                     <td colspan="3" >Signature et Cachet </td>
                     <td style=""><b>Payé</b></td>
                     <td style=""><b>'.$paid.'$</b></td>
                  </tr>
               </tbody>
            </table>';
// $connect->close();

echo $table;