<?php
session_start();
if (isset($_SESSION['unique_id'])) {
    include_once "index.php";
    $farmer_id = $_SESSION['unique_id'];
    $researcher_id = mysqli_real_escape_string($conn, $_POST['incoming_msg_id']);
    $output = "";
    $mess = "";
    function str_openssl_dec($str, $iv)
    {
        $key = '1234567890vishal%$%^%$$#$#';
        $chiper = "AES-128-CTR";
        $options = 0;
        $str = openssl_decrypt($str, $chiper, $key, $options, $iv);
        return $str;
    } 

    $sql = "SELECT messages.*, researcher.*, externalusers.*
    FROM messages
    LEFT JOIN researcher ON researcher.unique_id = messages.incoming_msg_id
    LEFT JOIN externalusers ON externalusers.unique_id = messages.outgoing_msg_id
    WHERE (messages.incoming_msg_id = $researcher_id AND messages.outgoing_msg_id = $farmer_id)
        OR (messages.incoming_msg_id = $farmer_id AND messages.outgoing_msg_id = $researcher_id)
    ORDER BY messages.msg_id";

    $query = mysqli_query($conn, $sql);
    if (mysqli_num_rows($query) > 0) {
        while ($row = mysqli_fetch_assoc($query)) {
            if ($row['outgoing_msg_id'] === $farmer_id) {
                $output .= '<div class="chat outgoing">
                       
                                <div class="details">
                                    <p>' . $row['msg'] . '</p>
                                </div>
                                </div>';
            } else {
                $output .= '<div class="chat incoming">
                                
                                <div class="details">
                                    <p>' . $row['msg'] . '</p>
                                </div>
                                </div>';
            }
        }
    } else {
        $output .= '<div class="text">Messages are end-to-end encrypted. No one outside of this chat can read them.<br>Your messages will appear here as you start chating</div>';
    }
    echo $output;
} else {
    header("location: home.php");
}