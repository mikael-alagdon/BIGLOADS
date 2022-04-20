<?php
error_reporting(E_ALL & ~E_NOTICE);

require_once("connection/conn.php");
require_once("sessions.php");



$PHP_SELF = htmlspecialchars($_SERVER['PHP_SELF']);
$meter = "METER 1";

$activeTable = "METER_1";
$report = "5";
$convertedDate =  date("m/d/Y");

$alert = "";

if(isset($_POST["submit"])){

    $filterDate = $_POST["date"];
    $report = $_POST["report"];
    $meter = $_POST["meter"];
    
    $date = strtotime($filterDate);
    
    $convertedDate = date('m/d/Y', $date);

    if($meter === "METER 1"){
        $activeTable = "METER_1";
    }
    elseif($meter === "METER 2"){
        $activeTable = "METER_2";
    }
    elseif($meter === "METER 3"){
        $activeTable = "METER_3";
    }
    

}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>
        DAILY REPORT
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
    <div class="container col-md-10">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h3 class="m-0 font-weight-bold">
                    <?php echo $meter?>
                </h3>
            </div>
            <?php
                echo $alert;
            ?>
            <div class="card-body">
                <form method="POST" action="<?php echo basename($PHP_SELF, '.php');?>">
                    <div class="form-row align-items-center filterRow">
                    <div class="col-lg-3">
                            <label class="sr-only" for="inlineFormInputGroup">Date</label>
                            <div class="input-group mb-2">
                                <div class="input-group-prepend">
                                    <div class="input-group-text">Date</div>
                                </div>
                                <input name="date" class="form-control" type="date" required>
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <label class="sr-only" for="inlineFormInputGroup">Report</label>
                            <div class="input-group mb-2">
                                <div class="input-group-prepend">
                                    <div class="input-group-text">Report</div>
                                </div>
                                <select required name="report" class="form-control" id="report">
                                    <option value="" selected disabled>Select</option>
                                    <option value="5">5 minutes</option>
                                    <option value="15">15 minutes</option>
                                </select>
                            </div>
                        </div>
                        
                        <div class="col-lg-3">
                            <label class="sr-only" for="inlineFormInputGroup">Meter</label>
                            <div class="input-group mb-2">
                                <div class="input-group-prepend">
                                    <div class="input-group-text">Meter</div>
                                </div>
                                <select name="meter" class="form-control" id="report" required>
                                    <option value="" disabled selected>Select Meter</option>
                                    <option value="METER 1" >Meter 1</option>
                                    <option value="METER 2">Meter 2</option>
                                    <option value="METER 3">Meter 3</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-lg">
                            <label class="sr-only" for="inlineFormInputGroup">Meter</label>
                            <div class="input-group mb-2">
                                <input name="submit" class="btn btn-success" type="submit" value="Filter">
                            </div>
                        </div>
                    </div>
                </form>
                
                <div class="table-responsive meterTable">
                    <table class="table table-bordered hover" id="meter_table" width="100%" cellspacing="0">
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
                            if(isset($_POST["submit"])){
                                $query = "SELECT * 
                                          FROM $activeTable
                                          WHERE datepart(mi, DATE) % $report = 0
                                          AND  FORMAT(DATE, 'MM/dd/yyyy') = '$convertedDate'
                                          ORDER BY DATE";
                            }else{
                                $query = "SELECT * 
                                          FROM $activeTable
                                          WHERE datepart(mi, DATE) % 5 = 0
                                          AND  FORMAT(DATE, 'MM/dd/yyyy') = '$convertedDate'
                                          ORDER BY DATE DESC";
                            }

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

    // prevent form resubmission
    if ( window.history.replaceState ) {
        window.history.replaceState( null, null, window.location.href );
    }
  
    $('#meter_table').DataTable( {
        "order": [],    // overrides the name sorting of the datatable
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

    // var daily = document.getElementById("daily");

    //     daily.classList.add('active');                  
    //     daily.setAttribute("aria-current", "page");     
        
    // var monthly = document.getElementById("monthly");

    //     monthly.classList.remove('active');                 
    //     monthly.setAttribute("aria-current","none"); 

    // var meter3 = document.getElementById("meter3");
    //     meter3.classList.remove('active');                 
    //     meter3.setAttribute("aria-current","none"); 
</script>

</html>
