<section class="news-section news-section__dark">
            <div class="auto-container">
                <div class="sec-title centered">
                    <h2>Latest news & articles<span class="dot">.</span></h2>
                </div>
                
                       
<?php 
include 'conn.php';

$sql_blogs = "SELECT * FROM blogs ORDER BY RAND() LIMIT 3";
$result_blogs = mysqli_query($conn, $sql_blogs)  or die(mysqli_error($conn));
$set_blogs = mysqli_num_rows($result_blogs);
if ($result_blogs) {
    
    	while ($row = mysqli_fetch_assoc($result_blogs)) {
    	    $blogdetails[] = $row;
        $blogCount = count($blogdetails);
        //print_r($blogdetails);
        //return false;
        //echo $blogCount;
        
        
    }
    ?>
                
                
                <div class="row clearfix">
                <?php for ($id = 0; $id <$blogCount ; $id++) { $number = $id +1;?>
                    <!--News Block-->
                    <div class="news-block col-lg-4 col-md-6 col-sm-12 wow fadeInUp" data-wow-delay="0ms"
                        data-wow-duration="1500ms">
                        <div class="inner-box">
                            <div class="image-box">
                                <a href="blog_single.php?blog_doq=<?php echo $blogdetails[$id]['code'] ?>"><img style="width:391px; height:268px;" src="images/resource/blog1.jpg" alt=""></a>
                            </div>
                            <div class="lower-box">
                                <div class="post-meta">
                                    <ul class="clearfix">
                                        <li><span class="far fa-clock"></span> <?php echo $blogdetails[$id]['date_created'] ?></li>
                                        <li><span class="far fa-user-circle"></span> <?php echo $blogdetails[$id]['created_by'] ?></li>
                                        <li><span class="far fa-comments"></span> </li>
                                    </ul>
                                </div>
                                <h5><a href="blog_single.php?blog_doq=<?php echo $blogdetails[$id]['code'] ?>"><?php echo $blogdetails[$id]['title'] ?></a></h5>
                                <div class="text">bolg details will be here.</div>
                                <div class="link-box"><a class="theme-btn" href="blog_single.php?blog_doq=<?php echo $blogdetails[$id]['code'] ?>"><span
                                            class="flaticon-next-1"></span></a></div>
                            </div>
                        </div>
                    </div>
                    
                    <?php } ?>
                    
                    <?php } ?>
                </div>
            </div>
        </section>