<?php

$orderHTML = "";
$orderInfo = ExecuteSQL("SELECT o.DatePaid, (CASE WHEN o.DateShipped IS NULL THEN 'Pending' ELSE 'Shipped' END) AS Status FROM" .
" orders o WHERE o.UserID = " . $userid . " AND o.DatePaid IS NOT NULL");


if ($orderInfo->num_rows > 0) {
    // output data of each row
    $orderHTML = '<div class="row" style="font-weight:bold">' . 
    '<div class="span6">Order Date</div>' .
    '<div class="span6">Status</div>' .
  '</div><hr/>';
    while($ordRow = $orderInfo ->fetch_assoc()) {

        $orderHTML .= '<div class="row">' . 
                        '<div class="span6">' . $ordRow["DatePaid"] . '</div>' .
                        '<div class="span6">' . $ordRow["Status"] . '</div>' .
                      '</div>';
                      //$ordRow["Quantity"];

    }

}else{
    $orderHTML = '<div class="row">' .
                    '<h4 style="text-align:center;">There are currently no orders!</h4>' .
                 '</div>';
}

?>