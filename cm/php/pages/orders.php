<?php

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if(!empty($_POST['chkShipped'])) {
        foreach($_POST['chkShipped'] as $check) {
                //mark this order as shipped
                ExecuteSQL("UPDATE orders SET DateShipped = NOW() WHERE KeyOrder = " . $check . ";");
        }
    }
}

$orderSummary = ExecuteSQL("select u.EmailAddress, u.FirstName, u.LastName, u.PhoneNumber, a.City, a.State, a.Zip, a.Address1, " .
                "a.Address2, o.DatePaid, o.KeyOrder from users u inner join address a on u.UserID = a.UserID " .
                "inner join orders o on o.UserID = u.UserID where o.DatePaid is not null and o.DateShipped is null order by o.DatePaid desc");

$orderHTML = "";

if ($orderSummary->num_rows > 0) {

    $orderHTML = '<div class="row" style="font-weight:bold;">' .
    '<div class="col-xs-12 col-sm-2">' .
        'Date Paid' .
    '</div>' .
    '<div class="col-xs-12 col-sm-2">' .
        'Name' .
    '</div>' .
    '<div class="col-xs-12 col-sm-2">' .
        'Phone #' .
    '</div>' .
    '<div class="col-xs-12 col-sm-4">' .
        'Address' .
    '</div>' .
    '<div class="col-xs-12 col-sm-2">' .
        'Email' .
    '</div>' .
 '</div><hr/>';

    while($row = $orderSummary->fetch_assoc()) {

        $orderHTML .= '<input type="checkbox" name="chkShipped[]" value="' . $row["KeyOrder"] . '" />' .
                    '<div class="row ordrow" data-toggle="collapse" data-target="#order' . $row["KeyOrder"] . '">' .
                        '<div class="col-xs-12 col-sm-2">'.
                            $row["DatePaid"] .
                        '</div>' .
                        '<div class="col-xs-12 col-sm-2">' .
                            $row["FirstName"] . ' ' . $row["LastName"] .
                        '</div>' .
                        '<div class="col-xs-12 col-sm-2">' .
                            $row["PhoneNumber"] .
                        '</div>' .
                        '<div class="col-xs-12 col-sm-4">' .
                            $row["Address1"] . ' ' . $row["Address2"] . ', ' . $row["City"] . ', ' . $row["Zip"] .
                        '</div>' .
                        '<div class="col-xs-12 col-sm-2">' .
                            $row["EmailAddress"] .
                        '</div>' .
                     '</div>';

        
        $orderDetail = ExecuteSQL("SELECT c.Quantity, p.ProductName FROM cart c inner join products p " .
                " on c.KeyProduct = p.KeyProduct WHERE c.KeyOrder = " . $row["KeyOrder"] . ";");
            
        if($orderDetail ->num_rows > 0){
            $orderHTML .= '<div class="row"><div id="order' . $row["KeyOrder"] . '" class="collapse">'.
            '<div class="col-xs-6 col-xs-push-1 dtltitle">Product Name</div>' .
            '<div class="col-xs-3 col-xs-push-1 dtltitle">Quantity</div>';

            while($dtlRow = $orderDetail->fetch_assoc()){

                $orderHTML .= '<div class="col-xs-6 col-xs-push-1">' . $dtlRow["ProductName"] . '</div>' .
                            '<div class="col-xs-3 col-xs-push-1">' . $dtlRow["Quantity"] . '</div>';

            }

            $orderHTML .= '</div></div>';
        }

    }

}else{

    $orderHTML = '<div class="row">' .
                    '<div class="col-xs-12">' .
                        'No orders entered.' .
                    '</div>' .
                 '</div>';

}

?>