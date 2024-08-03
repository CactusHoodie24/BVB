<?php
while($row = mysqli_fetch_assoc($pql)){
    while($row = mysqli_fetch_assoc($pql)){
        $sql2 = "SELECT * FROM messages WHERE (incoming_msg_id = {$row['unique_id']}
        OR outgoing_msg_id = {$row['unique_id']}) AND (outgoing_msg_id = {$outgoing_id} 
        OR incoming_msg_id = {$outgoing_id}) ORDER BY msg_id DESC LIMIT 1";
          $query2 = mysqli_query($conn, $sql2);
          $row2 = mysqli_fetch_assoc($query2);
          if (mysqli_num_rows($query2) > 0) {
              $result = $row2['msg'];
        } else {
            $result = "No message available";
        }
    
        if (strlen($result) > 22) {
            $result =  substr($result, 0, 22) . '...';
        } 
        else {
             $msg = $result;
         }
    
        if (isset($row2['outgoing_msg_id'])) {
            ($outgoing_id == $row2['outgoing_msg_id']) ? $you = "You: " : $you = "";
        } else {
            $you = "";
        }
    
        ($row['status'] == "Offline") ? $offline = "offline" : $offline = "";
    
        if (($outgoing_id == $row['unique_id'])) {
            $hid_me = "hide";
        } else {
            $hid_me = "";
        };

    $output .= '<a href="farm user.php?user_id='.$row['unique_id'].'">
    <div class="card">
    <div class="card-reader">
        <button> See all <span class="las la-arrow-right"></span></button>
    </div>
    <div class="card-body">
        <div class="Customer">
            <div class="info">
            <img src="../images/'. $row['img'] .'" .width="40px" height="40px" alt="">
                <div>
                    <h4><span>'. $row['firstname']."  " .$row['lastname'].'</span></h4>
                    <small>CEO Excerpt</small>
                </div>
            </div>
            <div class="contact">
            <span class="las la-comment"> <p>'. $you  . $msg . '</p> </span>
        </div>
        </div>
</div>
</a>';
}
}
?>