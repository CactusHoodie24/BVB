<?php
while($row = mysqli_fetch_assoc($pql)){
    $output .= '<a href="users.php?researcher_id='.$row['unique_id'].'">
    <div class="member">
                    <img src="../images/'. $row['img'] .'" alt="">
                    <h2>'.$row['firstName'].' '.$row['lastName'].'</h2>
                    <p>'.$row['Bio'] .'</p>
                </div>
</a>';
}
?>