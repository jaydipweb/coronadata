<?php
    error_reporting(0);
    include 'corona-details.php';
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <!-- Required meta tags-->
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://cdn.datatables.net/1.10.24/css/jquery.dataTables.min.css">
        <link rel="stylesheet" href="css/corona-details.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script> 
        <script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
        <title>Corona Update</title>
    </head>
    <body>
        <div class="container" style="margin-top:5%;">
            <h2>India Total Corona Case</h2><hr>
            <div class="row">
                <div class="col-lg-3 col-md-3 col-sm-12 box">
                     <h3>Total</h3>
                     <h4><?php echo $resultData['data']['summary']['total']; ?></h4>
                </div>  
                <div class="col-lg-3 col-md-3 col-sm-12 box">
                    <h3>Confirmed Cases</h3>
                    <h4><?php echo $resultData['data']['summary']['confirmedCasesIndian']; ?></h4>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-12 box">
                    <h3>Discharged</h3>
                    <h4><?php echo $resultData['data']['summary']['discharged']; ?></h4>
                </div>          
                <div class="col-lg-3 col-md-3 col-sm-12 box">
                    <h3>Deaths</h3>
                    <h4><?php echo $resultData['data']['summary']['deaths']; ?></h4>
                </div>
            </div><br><br>
            <h2>State wise Corona Case</h2><hr>
            <table class="table table-hover" id="corona-details">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">State</th>
                        <th scope="col">Confirmed Cases</th>
                        <th scope="col">Discharged</th>
                        <th scope="col">Deaths</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($resultData['data']['regional'] as $key => $allresult){ ?>
                    <tr>
                        <th scope="row"><?php echo $key+1; ?></th>
                        <td><?php echo $allresult['loc']; ?></td>
                        <td><?php echo $allresult['confirmedCasesIndian']; ?></td>
                        <td><?php echo $allresult['discharged']; ?></td>
                        <td><?php echo $allresult['deaths']; ?></td>
                    </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
        <script>
            $(document).ready( function (){
                $('#corona-details').DataTable();
            });
        </script>
     </body>
</html>
<!-- end document-->
