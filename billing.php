<?php
session_start();
include('conn.php');

$currentPage = 'billing';
include "profile-header.php";

if (!isset($_SESSION['username'])) {
    $_SESSION['msg'] = "You must log in first";
    header('location: login.php');
}

$user_id = $_SESSION["user_id"];

$newplan = mysqli_query($db, "SELECT * FROM user where user_id = $user_id ");
if(mysqli_num_rows($newplan)>0){
    while($row = mysqli_fetch_assoc($newplan)){        
        $newplannow = $row['plan']; 
        $username = $row['username']; 
        $created_at = $row['created_at'];              
    }  
}
$plan = $newplannow;
$user_plan = $newplannow;

?>
<style>
body {
    background: #FCFCFD;
}
</style>
<div class="profile-settings-body">
    <div class="profile-set-first">
        <h2>Settings</h2>
        <div class="profile-set-side">
            <ul>
                <a href="profileSettings">
                    <li>
                        <i class="bi bi-person-circle"></i>Profile
                    </li>
                </a>
                <a href="passwordSettings">
                    <li>
                        <i class="bi bi-shield-lock"></i>Password
                    </li>
                </a>
                <a class="active-set" href="billing">
                    <li>
                        <i class="bi bi-cash"></i>Billing
                    </li>
                </a>
                <a href="notification">
                    <li>
                        <i class="bi bi-bell"></i>Notification <span>0</span>
                    </li>
                </a>
            </ul>
        </div>
    </div>
    <div class="profile-set-second">
        <h2>Billing</h2>
        <p>Manage your billing and payment details.</p>
        <div class="all-user-current-plan">
            <div class="<?php if($plan === 'free'){
                echo "active-userplan, ' ', ";
            } ?> user-current-plan">
                <div style="border-bottom: 1px solid #EAECF0;">
                    <div style="margin: 5px 15px 0 15px; display: flex; justify-content:space-between; ">
                        <div style="text-transform: capitalize; font-weight: 600;">
                            <p>Free</p>
                        </div>
                        <?php
                        if($plan === 'free'){
                            echo'
                            <div style="color: #ff8b3b;">
                            <i class=" bi bi-check-circle-fill"></i>
                            </div>
                            ';
                        }else{
                            echo '
                            <i class="bi bi-circle"></i>
                            ';
                        }
                        ?>


                    </div>
                </div>
                <div style="display: flex; margin: 10px 15px;">
                    <div>
                        <h2>&#x20A6;0</h2>
                    </div>
                    <div style="margin-top: 15px; font-size: 12px;">
                        <p>per month</p>
                    </div>
                </div>


            </div>

            <div class="<?php if($plan === 'starter'){
                echo 'active-userplan';
            } ?> user-current-plan">
                <div style="border-bottom: 1px solid #EAECF0;">
                    <div style="margin: 5px 15px 0 15px; display: flex; justify-content:space-between; ">
                        <div style="text-transform: capitalize; font-weight: 600;">
                            <p>Starter</p>
                        </div>
                        <?php
                        if($plan === 'starter'){
                            echo'
                            <div style="color: #ff8b3b;">
                            <i class=" bi bi-check-circle-fill"></i>
                            </div>
                            ';
                        }else{
                            echo '
                            <i class="bi bi-circle"></i>
                            ';
                        }
                        ?>


                    </div>
                </div>
                <div style="display: flex; margin: 10px 15px;">
                    <div>
                        <h2>&#x20A6;300</h2>
                    </div>
                    <div style="margin-top: 15px; font-size: 12px;">
                        <p>per month</p>
                    </div>
                </div>


            </div>

            <div class="<?php if($plan === 'business'){
                echo 'active-userplan';
            } ?> user-current-plan">
                <div style="border-bottom: 1px solid #EAECF0;">
                    <div style="margin: 5px 15px 0 15px; display: flex; justify-content:space-between; ">
                        <div style="text-transform: capitalize; font-weight: 600;">
                            <p>Business</p>
                        </div>
                        <?php
                        if($plan === 'business'){
                            echo'
                            <div style="color: #ff8b3b;">
                            <i class=" bi bi-check-circle-fill"></i>
                            </div>
                            ';
                        }else{
                            echo '
                            <i class="bi bi-circle"></i>
                            ';
                        }
                        ?>


                    </div>
                </div>
                <div style="display: flex; margin: 10px 15px;">
                    <div>
                        <h2>&#x20A6;2500</h2>
                    </div>
                    <div style="margin-top: 15px; font-size: 12px;">
                        <p>per month</p>
                    </div>
                </div>

            </div>

            <div class="<?php if($plan === 'ultimal'){
                echo 'active-userplan';
            } ?> user-current-plan">
                <div style="border-bottom: 1px solid #EAECF0;">
                    <div style="margin: 5px 15px 0 15px; display: flex; justify-content:space-between; ">
                        <div style="text-transform: capitalize; font-weight: 600;">
                            <p>Ultimal</p>
                        </div>
                        <?php
                        if($plan === 'ultimal'){
                            echo'
                            <div style="color: #ff8b3b;">
                            <i class=" bi bi-check-circle-fill"></i>
                            </div>
                            ';
                        }else{
                            echo '
                            <i class="bi bi-circle"></i>
                            ';
                        }
                        ?>


                    </div>
                </div>
                <div style="display: flex; margin: 10px 15px;">
                    <div>
                        <h2>&#x20A6;4500</h2>
                    </div>
                    <div style="margin-top: 15px; font-size: 12px;">
                        <p>per month</p>
                    </div>
                </div>


            </div>

        </div>



        <div class="billing-list content-list">
            <div style="display: flex; justify-content: space-between">
                <div>
                    <h3>Billing history</h3>
                </div>


            </div>

            <div style="overflow-x: auto;">
                <table id="customers">
                    <tr>
                        <th style="width: 20px !important">
                            <input type="checkbox" />
                        </th>
                        <th style="width: 200px">Invoice</th>
                        <th style="width: 300px">Amount</th>
                        <th style="width: 250px">Status</th>
                        <th style="width: 200px">Reference</th>
                        <th style="width: 200px">End Date</th>

                        <th>info</th>
                    </tr>
                    <?php
                    
                    
                    if(isset($_GET['page'])){
                        $page = $_GET['page'];
                    } else {
                        $page = 1;
                    }

                    $num_per_page = 05;
                    $start_from = ($page-1)*05;
                    
                    

                    $sql2 = mysqli_query($db, "SELECT * from billing  WHERE user_id = $user_id LIMIT $start_from, $num_per_page ");
                    if(mysqli_num_rows($sql2)>0){

                    while($row = mysqli_fetch_assoc($sql2)){
                        
                

                        $id = $row['id'];                           
                        $trans = $row['tran_reference'];
                        $plan = $row['plan'];
                        $period = $row['period'];
                        $startdate = $row['start_date'];
                        $enddate = $row['end_date'];
                        $status = $row['status'];
                        $amount = $row['amount'];
                        // $date = $row['created_on'];
                        // $hit = $row['hit'];
                        $enddate = new DateTime($enddate);
                        $month = $enddate->format('M'); // Shortened month name
                        $year = $enddate->format('Y');
                        $day = $enddate->format('d');

                        $startdate = new DateTime($startdate);
                        $startmonth = $startdate->format('M'); // Shortened month name
                        $startyear = $startdate->format('Y');
                        $startday = $startdate->format('d');
                                            
                    ?>
                    <tr>
                        <td><input type="checkbox" </td>
                        <td style="text-transform: capitalize;">
                            <?php echo $plan,' ', '-', ' ', $startmonth, ' ', $startyear; ?></td>
                        <td><?php echo '&#x20A6;',$amount; ?></td>
                        <td style="text-transform: capitalize; color: green;">
                            <p><?php echo $status; ?>
                        </td>
                        <td>
                            <p><?php echo $trans; ?>
                        </td>
                        <td>
                            <p><?php echo $day, ' ', $month, ' ', $year; ?>
                        </td>
                        <td><?php echo ' <a href="billing.php?id='.$id.'">' ?><button style="background: #ff8b3b;"><i
                                    class="bi bi-cloud-arrow-down-fill"></i></button></a>
                        </td>
                    </tr>
                    <?php
                        
                }
            }
            ?>
                </table>


            </div>
            <?php
                    $pr_query = "SELECT * from billing WHERE user_id = $user_id";
                    $pr_result = mysqli_query($db, $pr_query);
                    $total_record = mysqli_num_rows($pr_result);
                    
                    $total_page = ceil($total_record/$num_per_page);
                    
                    
                    for($i=1; $i<$total_page; $i++){
                        
                    }
                ?>



            <div class="pagination">
                <?php
                    if($page>1){
                        echo "<a href='billing.php?page=".($page-1)."'>❮</a>"?>
                <?php
                    }
                    ?>


                <?php 
                    if($i>$page)
                    {
                    
                    echo "<a href='billing.php?page=".($page+1)."'>❯</a>"?>
                <?php
                    }
                    ?>
            </div>

        </div>
    </div>

</div>
</div>

<script src="js/main.js"></script>