<table id="myTable" class="table-bordered">
    <thead class="text-light position-sticky">
        <tr>
            <th class="text-center fs-7 ps-1 pe-1"><label for="">S.No. </label></th>
            <th class="text-center fs-7 ps-3 pe-4"><label for="">Jumbo no.</label>
            </th>
            <th class="text-center fs-7 ps-4 pe-4"><label for="">Type</label></th>
            <th class="text-center fs-7 ps-1 pe-2"><label for="">Core No.</label>
            </th>
            <th class="text-center fs-7 ps-1 pe-1"><label for="">Width</label></th>
            <th class="text-center fs-7 ps-2 pe-2"><label for="">Shift</label></th>
            <th class="text-center fs-7 "><label for="">In</label></th>
            <th class="text-center fs-7 "><label for="">Out</label></th>
            <th class="text-center fs-7 ps-2 pe-2"><label for="">Length</label></th>
            <th class="text-center fs-7 ps-2 pe-2"><label for="">joints</label></th>
            <th class="text-center fs-7 ps-1 pe-1"><label for="">G.weight</label>
            </th>
            <th class="text-center fs-7 ps-1 pe-1"><label for="">N.weight</label>
            </th>
            <th class="text-center fs-7 ps-1 pe-1"><label for="">Grade</label></th>
            <th class="text-center fs-7 ps-3 pe-3"><label for="">Remark</label></th>
            <th class="text-center fs-7 ps-5 pe-5"><label for="">Option</label></th>
            <!-- Add more columns here -->
        </tr>
    </thead>
    <tbody>
        <?php
include 'config.php';

if(isset($_GET['date'])) {
    $selectedDate = $_GET['date'];

    // Sanitize the input to prevent SQL injection
    $selectedDate = mysqli_real_escape_string($config, $selectedDate);

    // Fetch data from both tables using UNION with the same number of columns
    $sql = "
        SELECT `manual_date`,`sr_code`,`prd_code`,`core`,`width`,`shift`,`in`,`out`,`length`,`joints`,`gweight`,`weight`,`sp_grd`,`grade`,`remark`,`username` 
        FROM bopprod 
        WHERE manual_date = '$selectedDate'
        
        UNION
        
        SELECT `manual_date`,`sr_code`,`prd_code`,`core`,`width`,`shift`,`in`,`out`,`length`,`joints`,`gweight`,`weight`,`sp_grd`,`grade`,`remark`,`username` 
        FROM boppstk 
        WHERE manual_date = '$selectedDate'
    ";

    $result = mysqli_query($config, $sql);

    if (mysqli_num_rows($result) > 0) {
        $serialNumber = 1; // Initialize a counter variable
        while ($row = mysqli_fetch_assoc($result)) {
            echo "<tr>";
            echo "<td > " . $serialNumber . "</td>";
            echo "<td> " . $row['sr_code']. "</td>";
            echo "<td> " . $row['prd_code'] . "</td>";
            echo "<td> " . $row['core'] . "</td>";
            echo "<td > " . $row['width'] . "</td>";
            echo "<td > " . $row['shift'] . "</td>";
            // echo "<td class='ps-4 pe-4'> " . $row['in'] . "</td>";
            // echo "<td class='ps-4 pe-4'> " . $row['out'] . "</td>";
                $in = date("H:i", strtotime($row['in']));
            echo "<td >" . $in . "</td>";
                $out = date("H:i", strtotime($row['out']));
            echo "<td >" . $out . "</td>";
            echo "<td > " . $row['length'] . "</td>";
            echo "<td > " . $row['joints'] . "</td>";
            echo "<td > " . $row['gweight'] . "</td>";
            echo "<td > " . $row['weight'] . "</td>";
            echo "<td > " . $row['grade'] . "</td>";
            echo "<td > " . $row['remark'] . "</td>";
            echo "<td>";
            // echo "<button type='submit' name='submit' class='btn btn-success text-light me-1'>Submit</button>";
            echo "<button type='submit' name='update' class='btn btn-warning text-light'>Update</button>";
            echo "</td>";
            echo "</form>";
            echo "</tr>";
            $serialNumber++; 
                }
            } else {
                $serialNumber = 1;
                    echo "<tr><td class=''> " . $serialNumber . "</td><td colspan='12'><b>No data found</b></td></tr>";
                $serialNumber++;
                }
}
?>

        <tr>
            <?php echo "<td class=''> " . $serialNumber . "</td>"; ?>


            <!-- PHP FOR NEXT JUMBO NUMBER -->
            <?php 
                                                                    $sql_latest_jumbo = "SELECT sr_code FROM bopprod ORDER BY id DESC LIMIT 1";
                                                                    $result_latest_jumbo = mysqli_query($config, $sql_latest_jumbo);
                                                                    
                                                                    // Initialize the next jumbo number
                                                                    $next_jumbo = 1; // Default to 1 if no records are found
                                                                    
                                                                    if (mysqli_num_rows($result_latest_jumbo) > 0) {
                                                                        $row_latest_jumbo = mysqli_fetch_assoc($result_latest_jumbo);
                                                                        $latest_jumbo = intval($row_latest_jumbo['sr_code']);
                                                                        $next_jumbo = $latest_jumbo + 1; // Increment the latest sr_code number by 1
                                                                    }
                                                                    ?>

            <td><input type="number" name="sr_code" class="form-control jumbo-input fw-bold text-center" id="jumboInput"
                    value="<?php echo $next_jumbo; ?>" required>
            </td>

            <td>
                <select name="prd_code" class="pt-2 pb-2 jumbo-input fw-bold text-center" required>

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
            <td><input type="number" name="core" class="form-control jumbo-input fw-bold text-center" required>
            </td>
            <td><input type="number" name="width" class="form-control jumbo-input fw-bold text-center"
                    title="Limit should be 3000-3500" required min="3000" max="3500"></td>
            <td>
                <select name="shift" class="py-2 px-1 jumbo-input fw-bold text-center" required>
                    <!-- <option value="">Select...</option> -->
                    <option value="A">A</option>
                    <option value="B">B</option>
                    <option value="C">C</option>
                    <option value="D">D</option>
                </select>
                <!-- <input type="text" name="custom_shift" class="form-control jumbo-input" pattern="[A-Za-z]+" title="Only alphabetic characters allowed" disabled> -->
            </td>
            <td><input type="time" name="in" class="form-control jumbo-input fw-bold text-center" step="60" required>
            </td>
            <td><input type="time" name="out" class="form-control jumbo-input fw-bold text-center" step="60" required>
            </td>
            <td><input type="number" name="length" class="form-control jumbo-input fw-bold text-center" required>
            </td>
            <td><input type="number" name="joints" class="form-control jumbo-input fw-bold text-center" required>
            </td>
            <td><input type="number" name="gweight" class="form-control jumbo-input fw-bold text-center" step="0.01"
                    min="0.00" max="9999.99" required></td>
            <td><input type="number" name="weight" class="form-control jumbo-input fw-bold text-center" step="0.01"
                    min="0.00" max="9999.99" required></td>
            <td><input type="text" name="grade" class="form-control jumbo-input fw-bold text-center" pattern="[LHB]"
                    title="Only 'L', 'H', or 'B' are allowed" required></td>
            <td><input type="text" name="remark" class="form-control jumbo-input fw-bold text-center" pattern="[A-Z]+"
                    title="Only capital letters allowed"></td>
            <td><button type="submit" name="submit" class="btn btn-success" style="margin:0px">Submit</button>
                <!-- Add more columns here -->
        </tr>
    </tbody>
</table>