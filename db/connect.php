<?php

$conn = new mysqli('localhost', 'root', '', 'crud-jqueryajax');

if(!$conn){
    echo "Connection Error!";
}

function flashMsg($tipe, $pesan) {
    $alert = "<div class=\"alert alert-{$tipe} alert-dismissible fade show\">
                    <strong>{$pesan}.</strong>
                    <button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\">
                        <span aria-hidden=\"true\">&times;</span>
                    </button>
              </div>";
    return $alert;
}