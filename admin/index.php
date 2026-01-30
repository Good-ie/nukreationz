<?php 
include("conn.php");

if(session_id() == ''){
    session_start();
}

// Check if admin is logged in
if (!isset($_SESSION['admin_id']) || !isset($_SESSION['loggedin'])) {
    echo "you are not authorised to access this page";
    exit;
}

if ($_SESSION['user_type'] == 'user') {
   echo "you are not authorised to access this page";
   exit;
}

if ($_SESSION['status'] == 'suspend') {
    echo '<script>alert("Your admin access have been suspended");</script>';
    exit;
}

$currentPage = 'dashboard';

if (isset($_SESSION['username'])){
    include("admin-header.php");
}

$sql2 = "SELECT * from user ";
if ($result2 = mysqli_query($db, $sql2)){
    $rowcount2 = mysqli_num_rows($result2);
}

$sql4 = "SELECT * from card_details ";
if ($result4 = mysqli_query($db, $sql4)){
    $rowcount4 = mysqli_num_rows($result4);
}

$sql5 = "SELECT SUM(hit) as overal_total_hit from card_details";
$result5 = mysqli_query($db, $sql5);

$overalTotal = 0;
if ($result5 && mysqli_num_rows($result5) > 0) {
    $row = mysqli_fetch_assoc($result5);
    $overalTotal = $row["overal_total_hit"] ?? 0;
}
?>

<div class="user-content-body">
    <div class="user-sidebar">
        <div class="side-icon user-active" style="text-align: center; display: flex; margin-bottom: 10px">
            <div class="V-card">
                <i class="bi bi-person-vcard-fill"></i>
            </div>
            <a class="active" href="#">
                <div style="margin-left: 10px;">
                    <p>Overview</p>
                </div>
            </a>
        </div>

        <div class="side-icon" style="text-align: center; display: flex; margin-bottom: 10px">
            <div class="V-card">
                <i class="bi bi-bar-chart-fill"></i>
            </div>
            <a href="analytics.php">
                <div style="margin-left: 10px;">
                    <p>Analytics</p>
                </div>
            </a>
        </div>

        <div class="side-icon" style="text-align: center; display: flex; margin-bottom: 10px">
            <div class="V-card">
                <i class="bi bi-question-lg"></i>
            </div>
            <div style="margin-left: 10px;">
                <p>Help</p>
            </div>
        </div>

        <div class="side-icon" style="text-align: center; display: flex; margin-bottom: 10px">
            <div class="V-card">
                <i class="bi bi-gear-fill"></i>
            </div>
            <div style="margin-left: 10px;">
                <p>Settings</p>
            </div>
        </div>
    </div>
    <div class="main-user-content">
        <h3>Overview</h3>
        <div class="correction-main-user-body main-user-body-header">
            <div style="margin-top: 20px; justify-content: space-around; display: flex;">
                <div class="search">
                    <div class="virtual-card">
                        <p>Total Active Users &nbsp; <b><?php echo $rowcount2; ?></b></p>
                    </div>
                </div>
                <div class="select-btn">
                    <div class="virtual-card">
                        <p>Total Virtual Card <b><?php echo $rowcount4; ?></b></p>
                    </div>
                </div>
                <div class="search-button">
                    <div class="virtual-card">
                        <p>Total Profile Scan <b><?php echo $overalTotal/2; ?></b></p>
                    </div>
                </div>
            </div>
        </div>

        <div class="correction-content-list content-list">
            <div style="display: flex; justify-content: space-between">
                <div>
                    <h3>Total Users (All)</h3>
                </div>
            </div>

            <div style="overflow-x: auto;">
                <table id="customers">
                    <tr>
                        <th style="width: 20px !important">
                            <input type="checkbox" />
                        </th>
                        <th style="width: 200px">Date</th>
                        <th style="width: 150px">Username</th>
                        <th style="width: 250px">Email</th>
                        <th style="width: 200px">Action</th>
                        <th style="width: 200px">Profile Scan</th>
                        <th>info</th>
                    </tr>
                    <?php
                    if(isset($_GET['page'])){
                        $page = $_GET['page'];
                    } else {
                        $page = 1;
                    }

                    $num_per_page = 5;
                    $start_from = ($page-1)*5;

                    $sql2 = mysqli_query($db, "SELECT * from user LIMIT $start_from, $num_per_page");
                    if(mysqli_num_rows($sql2)>0){
                        while($row = mysqli_fetch_assoc($sql2)){
                            $id = $row['user_id'];                           
                            $username = $row['username'];
                            $date = $row['created_at'];
                            $email = $row['email'];
                            
                            $sql3 = "SELECT SUM(hit) as total_hit from card_details WHERE user_id = $id";
                            $result = mysqli_query($db, $sql3);

                            $total = 0;
                            if ($result && mysqli_num_rows($result) > 0) {
                                $hitrow = mysqli_fetch_assoc($result);
                                $total = $hitrow["total_hit"] ?? 0;
                            }
                    ?>
                    <tr>
                        <td><input type="checkbox" /></td>
                        <td><?php echo $date; ?></td>
                        <td><?php echo $username?></td>
                        <td><?php echo $email; ?></td>
                        <td>
                            <button style="font-size: 14px;" class="btn btn-secondary">Suspend</button>
                        </td>
                        <td><?php echo $total/2 ?></td>
                        <td>
                            <button type="button" class="btn btn-primary open-modal-btn" data-bs-toggle="modal"
                                data-user-id="<?php echo $id; ?>" data-bs-target="#exampleModal">
                                view more
                            </button>
                        </td>
                    </tr>
                    <?php
                        }
                    }
                    ?>
                </table>
            </div>

            <?php
                $pr_query = "SELECT * from user";
                $pr_result = mysqli_query($db, $pr_query);
                $total_record = mysqli_num_rows($pr_result);
                $total_page = ceil($total_record/$num_per_page);
            ?>

            <div class="pagination">
                <?php if($page > 1): ?>
                    <a href='index.php?page=<?php echo ($page-1); ?>'>❮</a>
                <?php endif; ?>
                
                <?php if($page < $total_page): ?>
                    <a href='index.php?page=<?php echo ($page+1); ?>'>❯</a>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div style="width: fit-content; margin-left: -200px;" class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Over View</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <?php
                if (isset($_POST['userId'])) {
                    $userId = $_POST['userId'];
                    echo $userId;
                }
                ?>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<?php include("footer.php"); ?>

<script src="../js/main.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous">
</script>

<script type="text/javascript">
$(document).ready(function() {
    $('.open-modal-btn').click(function() {
        var userId = $(this).attr('data-user-id');
        var page = 1;
        loadAdditionalContent(userId, page);
    });

    function loadAdditionalContent(userId, page) {
        $.ajax({
            url: 'process.php',
            dataType: 'html',
            data: {
                userId: userId,
                page: page
            },
            success: function(data) {
                $('.modal-body').html(data);
                $('.pagination-link').click(function() {
                    var page = $(this).attr('data-page');
                    loadAdditionalContent(userId, page);
                });
            },
            error: function() {
                alert('Error loading additional content!');
            }
        });
    }
});
</script>
</body>
</html>
ENDOFFILE
