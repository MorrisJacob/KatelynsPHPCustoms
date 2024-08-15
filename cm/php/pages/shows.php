<?php

$showsHTML = "";

$shows = ExecuteSQL("SELECT id, ShowName FROM `show`;");

if ($shows->num_rows > 0) {
    // output data of each row
    while($row = $shows->fetch_assoc()) {
        $showsHTML .= '<div class="row show-search" style="margin: 10px 0;">' .
			                '<div class="col-xs-10">' .
                                 $row["ShowName"] .
			                '</div>' .
                            '<div class="col-xs-2">' .
                                '<a class="btn btn-info" href="show-edit.php?ShowId=' . $row["id"] . '" style="padding:2px 8px;display:inline;"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>&nbsp;' .
                                '<a class="btn btn-danger showdel" data-toggle="modal" data-id="' . $row["id"] . '" data-target="#deleteShowModal" style="padding:2px 8px;display:inline;">X</a>' .
                            '</div><hr/>' .
		                  '</div>';

    }
} else {
    $showsHTML .=  "No Shows Available";
}

?>
