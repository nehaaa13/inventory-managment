<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Jumbo Entry</title>
    <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">
    <link href="vendor/css/sb-admin-2.css" rel="stylesheet">
</head>
<style>
    #main-content {
        width: 100%;
            }
    .top-date {
        width: 100%;
            }
    #belowTableHeight {
        height: 200px;
            }
    input.form-control {
        padding: .275rem .45rem;
}

</style>
<?php include 'config.php'; ?>
<div class="container-fluid p-0">
    <div class="row">
    <div>
        <?php include "header.php"?>
    </div>
    <div class="d-flex">
        <div>
            <!-- Sidebar -->
            <?php include 'sidebar.php' ?>
            <!-- End of Sidebar -->
        </div>
        <div id="main-content">
            <main class="container pe-0">
                <div class="row">
                    <div>
                        <h5 class="text-primary text-center">Production Report</h5>
                    </div>
                    <div class="row pb-0">
                        <div class="col-md-12">
                            <form method="POST" id="myForm" action= "rpt2.php" name="form_data">
                                <div class="col-md-12">
                                    <input class="ps-3 pe-4 fw-bold text-center top-date" type="date" id="input-date"
                                        name="date" value="<?php echo date('Y-m-d'); ?>" onchange="filterTable()">
                                </div>
                                <div class="table-responsive mt-2 ">
                                    <table id="myTable" class="table-bordered">
                                        <thead class="position-sticky">
                                            <tr class ="bg-primary text-light position-sticky">
                                                <th>Time Description</th>
                                                <th id="utd-width">Used time of date</th>
                                                <th>Time of %</th>
                                                <th id="utm-width">Used time of Month</th>
                                                <th>Time of %</th>
                                                <td></td>
                                            <tr>
                                                <td class ="bg-primary text-light position-sticky text-left"><label for="">Plant Utilisation
                                                        Time:</label>
                                                </td>
                                                <td><input type="text" id="put" name="put"></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td class="text-left  fs-6"><label for="">Run Shift :</label>
                                                <input type="text" id="shift" name="shift">
                                            </tr>
                                            <tr>
                                                <td class="bg-primary text-light position-sticky text-left"><label for="">Non-availability of
                                                        Power:</label>
                                                </td>
                                                <td><input type="text" id="pf" name="pf"></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td class="text-left  fs-6"><label for="">LUMPS :</label>
                                                <input type="text" id="lumps" name="lumps">
                                            </tr>
                                            <tr>
                                                <td class="bg-primary text-light position-sticky text-left"><label for="">Electrical
                                                Maintenance:</label>
                                                </td>
                                                <td><input type="text" id="em" name="em"></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                            </tr>
                                            <tr>
                                                <td class="bg-primary text-light position-sticky text-left"><label for="">Mechanical
                                                Maintenance:</label>
                                                </td>
                                                <td><input type="text" id="mm" name="mm"></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td class="text-left  fs-6"><label for="">Remark-1:</label>
                                                <textarea name="rem1" id="rem1" cols="30"></textarea>
                                            </tr>
                                            <tr>
                                                <td class="bg-primary text-light position-sticky text-left"><label for="">Process Requirment:</label>
                                                </td>
                                                <td><input type="text" id="pr" name="pr"></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>  
                                            </tr>
                                            <tr>
                                                <td class="bg-primary text-light position-sticky text-left"><label for="">Planned Shutdown:</label>
                                                </td>
                                                <td><input type="text" id="ps" name="ps"></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td class="text-left  fs-6"><label for="">Remark-2:</label>
                                                <textarea name="rmk2" id="rmk2" cols="30"></textarea>
                                            </tr>
                                            <tr>
                                                <td class=" bg-primary text-light position-sticky text-left"><label for="">Other/Miscellaneous:</label></td>
                                                <td><input type="text" id="om" name="om"></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                            </tr>
                                            <tr>
                                                <td class="bg-primary text-light position-sticky text-left"><label for=>Non-Space PUT:</label></td>
                                                <td><input type="text" id="nsp" name="nsp" required></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td class="text-left  fs-6"><label for="">Remark-3:</label>
                                                <textarea name="rmk3" id="rmk3" cols="30"></textarea></td>
                                            </tr>
                                            <tr>
                                                <th class="bg-primary text-light position-sticky text-left"><label for=>Total :</label></th>
                                                <td><input type="text" id="utd" name="utd" ></td>
                                                <td><input type="text" id="top1" name="top1"></td>
                                                <td><input type="text" id="utm" name="utm" ></td>
                                                <td><input type="text" id="top2" name="top2" ></td>
                                                <td></td> 
                                            </tr>
                                            <td></td> 
                                            <td></td> 
                                        <thead>
                                    </table>
                                </div> 

                                    <table id="myTable" class="table-bordered">
                                        <thead class="position-sticky">
                                            <tr class ="bg-primary text-light position-sticky">
                                                <th>Product</th>
                                                <th>Jumbo</th>
                                                <th>Scrap</th>
                                                <th>Gross </th>
                                                <th>Width </th>
                                                <th>PUT</th>
                                                <th>NS PUT</th>
                                                <th>POWER FAIL</th>
                                                <th>PROC REQ.</th>
                                                <th>ELE.MAIN.</th>
                                                <th>MECH MAIN.</th>
                                                <th>OTHER</th>
                                                <th>SPEED</th>
                                            </tr>
                                            <tr>
                                            <td>
                                                    <select name="type" class="pt-2 pb-2 jumbo-input" required>

                                                        <!-- Deleted class="form-control from above line -->
                                                        <?php
                                                    $sql = "SELECT DISTINCT prd_code FROM product_tbl";
                                                    $result = mysqli_query($config, $sql);

                                                    if (mysqli_num_rows($result) > 0) {
                                                        while ($row = mysqli_fetch_assoc($result)) {
                                                            echo "<option value='" . $row['prd_code'] . "'>" . $row['prd_code'] . "</option>";
                                                        }
                                                    } else {
                                                        echo "<option>No options found</option>";
                                                    }
                                                    ?>
                                                    </select>
                                                </td>
                                                </select>
                                                <td><input type="text" id="jumbo" name="jumbo" class="form-control jumbo-input"></td>
                                                <td><input type="text" id="scrap" name="scrap"  class="form-control jumbo-input"></td>
                                                <td><input type="text" id="gross" name="gross"  class="form-control jumbo-input" ></td>
                                                <td><input type="text" id="width" name="width"  class="form-control jumbo-input" ></td>
                                                <td><input type="text" id="put" name="put"  class="form-control jumbo-input"></td>
                                                <td><input type="text" id="pf" name="pf"  class="form-control jumbo-input" ></td>
                                                <td><input type="text" id="om" name="om"  class="form-control jumbo-input" ></td>
                                                <td><input type="text" id="em" name="em" class="form-control jumbo-input" ></td>
                                                <td><input type="text" id="mm" name="mm" class="form-control jumbo-input" ></td>
                                                <td><input type="text" id="pr" name="pr" class="form-control jumbo-input" ></td>
                                                <td><input type="text" id="ps" name="ps" class="form-control jumbo-input" ></td>
                                                <td><input type="text" id="nsp" name="nsp" class="form-control jumbo-input" ></td>
                                            <tr>
                                        </thead>
                                    </table>
                                    <button type="submit" name="submit" class="btn btn-success"
                                    style="margin:10px">Submit</button>
                            </form>
                        </div>                    
                    </div>       
                </div>
            </main>
        </div>
    </div> 
    
    </div>
</div>

