<?php
require_once("connection/conn.php");

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>
        Meter
    </title>
            <!-- CSS  -->
    <link rel="stylesheet" href="css/styles.css">
        <!-- BOOTSTRAP  -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF" crossorigin="anonymous"></script>

    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
        <!-- DATATABLES  -->
    <script type="text/javascript" src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/dt-1.11.5/datatables.min.css"/>
    <script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.11.5/datatables.min.js"></script>

    <script type="text/javascript" src="https://cdn.datatables.net/buttons/2.2.2/js/dataTables.buttons.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/buttons/2.2.2/js/buttons.html5.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/buttons/2.2.2/js/buttons.print.min.js"></script>
    
</head>

<body>
<?php 
     include("navbar.php");
?>
<section class="py-5">
    <div class="container-fluid">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold">METER 3</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="meter_table" width="100%" cellspacing="0">
                    <thead class="">
                            <th>NMI</th>
                            <th>DATE</th>
                            <th>TIME</th>
                            <th>EXPWH</th>
                            <th>IMWHR</th>
                            <th>VARWH</th>
                            <th>IMPKW</th>
                            <th>STATUS</th>
                        </thead>
                        <tbody>
                            <?php
                            $query = "SELECT * FROM METER_3";

                            $stmt = sqlsrv_query( $conn, $query);    

                            while ($obj = sqlsrv_fetch_array($stmt)) {
                                $time = $obj['DATE']->format('H:i');
                                $date1 = $obj['DATE']->format('m/d/Y ');
                                echo "<tr>
                                <td>" .$obj['NMI'] . "</td>
                                <td>" .$date1 . "</td>
                                <td>" .$time . "</td>
                                <td>" .$obj['EXPWH'] . "</td>
                                <td>" .$obj['IMWHR'] . "</td>
                                <td>" .$obj['VARWH'] . "</td>
                                <td>" .$obj['IMPKW'] . "</td>
                                <td>" .$obj['STATUS'] . "</td>
                                </tr>";
                                }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>     
    </div>
</section>  


</body>

<script>

    var dateObj = new Date();
    var month = dateObj.getUTCMonth() + 1; //months from 1-12
    var day = dateObj.getUTCDate();
    var year = dateObj.getUTCFullYear();

   
    date = year + "/" + month + "/" + day;

$(document).ready(function() {

    $('#meter_table').DataTable( {
        dom: 'Bfrtip',
        buttons: [
            {
                extend: 'excelHtml5',
                title: 'SPD' + date,
                className: 'btn btn-success',
                text: 'Export to Excel'
            }
        ],
        bFilter: false
    } );
    
} );

var meter1 = document.getElementById("meter1");
    meter1.classList.remove('active');            
    meter1.setAttribute("aria-current", "none");     

var meter2 = document.getElementById("meter2");
meter2.classList.remove('active');  
meter2.setAttribute("aria-current","none"); 

var meter3 = document.getElementById("meter3");
meter3.classList.add('active');                 
meter3.setAttribute("aria-current","page"); 

</script>

</html>
