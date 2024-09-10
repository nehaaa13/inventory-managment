<style>
    #main-content{
        width:100%;
    }
</style>
<!-- Include jQuery -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<!-- Include Bootstrap JavaScript -->
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

<div class="container-fluid">
    <div class="row">
        <?php include "header.php"?>
        <div class="d-flex">

            <div id="main-content">
                <main class="container">
                    <div class="row ">
                        <div class="m-2">
                        <h5 class="text-primary text-center">User Profile</h5>
                        </div>
                        <div class="col-md-4">
                <div class="text-center">
                    <img src="profile.svg" alt="Profile Picture" class="img-fluid rounded-circle" style="width:60px; height:60px">
                    <h3>
                    <?php
                                          if (isset($_SESSION['user_data'])){
                                             echo $_SESSION['user_data']['1'];
                                             unset($_SESSION['error']);
                                          }
                                    ?>
                    </h3>
                    
                </div>
            </div>
            <div class="col-md-8">
            <h2>About Me</h2>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed laoreet in quam ut laoreet. Integer
                    bibendum, metus at ultricies rhoncus, odio est lacinia augue, vel sollicitudin nulla nunc ac lorem.
                </p>

                
                <h2>Contact Information</h2>
                <ul>
                    <li>Email: john.doe@example.com</li>
                    <li>Phone: (123) 456-7890</li>
                    <li>Location: New York, NY</li>
                </ul>
            </div>
                    </div>
                </main>
            </div>
        </div>
    </div>
</div>
<?php include 'footer.php'?>