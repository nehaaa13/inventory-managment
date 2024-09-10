
<?php include "config.php"; ?>


<style>
input {
    width: 50%;
}

#utm-width {
    width: 25%;
}

#utd-width {
    width: 25%
}

#input-date {
    width: 95%;
}

#sidebar {
    width: 20%;
}

/* #main {
    width: 120%;
} */

#just {
    height: 60px;
}

#area {
    height: 20px;
}

#belowTableHeight {
    height: 200px;
}

#below-input {
    border: none;
}
</style>

<div class="container-fluid m-0 p-0">
<?php include "header.php"; ?>
    <div class="row">
        <div class="col-md-3" id="sidebar">
            <!-- Sidebar -->
            <?php include 'sidebar.php'; ?>
            <!-- End of Sidebar -->
        </div>
        <div class="col-md-9">
            <main class="container" id="main">
                <!-- HEADING -->
                <div>
                    <h5 class="text-center mb-4 mt-2 text-uppercase text-shadow text-primary text-decoration-underline">
                        Base
                        Line Add View</h5>
                </div>
                <!-- 1st Form -->
                <form action="process_form.php" method="post">
                    <div class="container">

                    </div>
                    <div class="row">
                        <div class="">
                            <label for="">DATE:</label>
                            <input class="ps-3 pe-4 fw-bold text-center" type="date" id="input-date" name="date">
                        </div>
                        <div class="col-md-8">
                            <div class="table-responsive">
                                <table class="table">
                                    <thead class="bg-primary text-light">
                                        <th>Time Description</th>
                                        <th id="utd-width">Used time of date</th>
                                        <th>Time of %</th>
                                        <th id="utm-width">Used time of Month</th>
                                        <th>Time of %</th>
                                    </thead>

                                    <tr>
                                        <td class="text-left  fs-6"><label for="">Plant Utilisation Time:</label>
                                        </td>
                                        <td><input type="text" id="" name="utd" required></td>
                                        <td><input type="text" id="" name="top1" required></td>
                                        <td><input type="text" id="" name="utm" required></td>
                                        <td><input type="text" id="" name="top2" required></td>
                                    </tr>
                                    <tr class="bg-light">
                                        <td class="text-left  fs-6"><label for="">Non-availability of Power:</label>
                                        </td>
                                        <td><input type="text" id="" name="utd" required></td>
                                        <td><input type="text" id="" name="top1" required></td>
                                        <td><input type="text" id="" name="utm" required></td>
                                        <td><input type="text" id="" name="top2" required></td>
                                    </tr>
                                    <tr>
                                        <td class="text-left  fs-6"><label for="">Other/Miscellaneous:</label></td>
                                        <td><input type="text" id="" name="utd" required></td>
                                        <td><input type="text" id="" name="top1" required></td>
                                        <td><input type="text" id="" name="utm" required></td>
                                        <td><input type="text" id="" name="top2" required></td>
                                    </tr>
                                    <tr class="bg-light">
                                        <td class="text-left  fs-6"><label for="">Electrical Maintenance:</label>
                                        </td>
                                        <td><input type="text" id="" name="utd" required></td>
                                        <td><input type="text" id="" name="top1" required></td>
                                        <td><input type="text" id="" name="utm" required></td>
                                        <td><input type="text" id="" name="top2" required></td>
                                    </tr>
                                    <tr>
                                        <td class="text-left  fs-6"><label for="">Mechanical Maintenance:</label>
                                        </td>
                                        <td><input type="text" id="" name="utd" required></td>
                                        <td><input type="text" id="" name="top1" required></td>
                                        <td><input type="text" id="" name="utm" required></td>
                                        <td><input type="text" id="" name="top2" required></td>
                                    </tr>
                                    <tr class="bg-light">
                                        <td class="text-left  fs-6"><label for="">Planned Shutdown:</label></td>
                                        <td><input type="text" id="" name="utd" required></td>
                                        <td><input type="text" id="" name="top1" required></td>
                                        <td><input type="text" id="" name="utm" required></td>
                                        <td><input type="text" id="" name="top2" required></td>
                                    </tr>
                                    <tr>
                                        <td class="text-left  fs-6"><label for="">Non-Space PUT:</label></td>
                                        <td><input type="text" id="" name="utd" required></td>
                                        <td><input type="text" id="" name="top1" required></td>
                                        <td><input type="text" id="" name="utm" required></td>
                                        <td><input type="text" id="" name="top2" required></td>
                                    </tr>
                                    <!-- Add more rows for additional form fields -->
                                </table>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="table-responsive">
                                <table class="table">
                                    <div class="bg-primary " id="just"></div>
                                    <tr class="bg-light">
                                        <td class="text-left  fs-6"><label for="">No. of Shift in Operation:</label>
                                        </td>
                                        <td class=""><input type="text" id="" name="sop" required></td>
                                    </tr>
                                    <tr>
                                        <td class="text-left  fs-6"><label for="">LINE LUMPS:</label>
                                        </td>
                                        <td class=""><input type="text" id="" name="linelumps" required></td>
                                    </tr>
                                    <tr class="bg-light">
                                        <td class="text-left  fs-6"><label for="">RPG Prod. (Erema):</label></td>
                                        <td class=""><input type="text" id="" name="rpg" required></td>
                                    </tr>
                                    <tr>
                                        <td class="text-left  fs-6"><label for="">Remark-1:</label>
                                        </td>
                                        <td class=""><textarea name="rmk1" id="area" cols="30" rows="10"></textarea>
                                        </td>
                                    </tr>
                                    <tr class="bg-light">
                                        <td class="text-left  fs-6"><label for="">Remark-2:</label>
                                        </td>
                                        <td class=""><textarea name="rmk2" id="area" cols="30" rows="10"></textarea>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="text-left  fs-6"><label for="">Remark-3:</label></td>
                                        <td class=""><textarea name="rmk3" id="area" cols="30" rows="10"></textarea>
                                        </td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary" name="submit">Submit</button>
                </form>
                <button class="btn btn-warning" id="addRow" onclick="addRow()">Add</button>
                <button class="btn btn-success">Edit</button>
                <button class="btn btn-danger">Delete</button>
            </main>
        </div>
    </div>
</div>

