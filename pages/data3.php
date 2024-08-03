<?php
$output = '';

while ($row = mysqli_fetch_assoc($pql)) {
    $unique_id = $row['unique_id']; 
    $user_query = "SELECT firstName, lastName, Bio FROM researcher WHERE unique_id = '$unique_id'";
    $user_result = mysqli_query($conn, $user_query);
    $lastname = "";

    if ($user_result && mysqli_num_rows($user_result) > 0) {
        $user_row = mysqli_fetch_assoc($user_result);
        $firstname = $user_row['firstName'];
        $lastname = $user_row['lastName'];
        $Bio = $user_row['Bio']
    } else {
        $firstname = "Unknown"; 
    }

    $output .= '<a href="#">
            <div class="blog-post_info">
            <div class="blog-post_date">
            <div class="blog-post_img">
            <img src="../images/'. $row['img'] .'" . >
                
        </div> 
    <span>' . $firstname . ' ' . $lastname .'</span>
    <span>' . $row['article_date'] . '</span>
    </div>
    <h1 class="blog-post_title">' . $row['heading'] . '</h1>
    <p class="blog-post_text">' . $row['description'] . '</p>
    <a href="#" class="blog-post_cta">Read More</a>
    </div>
    </a>';
}
?>
