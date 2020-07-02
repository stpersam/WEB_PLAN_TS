<?php
$connect = new mysqli("localhost", "webProjekt", "cprn66ae", "webprojekt");
// database methode to fetch user chat history from database
function fetch_user_chat_history($from_user_id, $to_user_id, $connect)
{
    $query = "SELECT * FROM chat_message WHERE (from_user_id =? AND to_user_id =?) OR (from_user_id =? AND to_user_id = ?) ORDER BY timestamp ASC ";
    $statement = $connect->prepare($query);
    $statement->bind_param('iiii',$from_user_id,$to_user_id,$to_user_id,$from_user_id);
    $statement->execute();
    $result = $statement->get_result()->fetch_all();
    $statement->close();

    $output = '<ul class="list-unstyled">';
    foreach($result as $row) {
        if ($row["3"] == $from_user_id) {
            $user_name = '<b class="text-success">You</b>';
        } else
        {
            $id = $row['2'];
            $username = get_user_name($id,$connect);
            $user_name = '<b class="text-danger">'.$username.'</b>';
        }
        $output .= '
                      <li style="border-bottom:1px dotted #ccc">
                       <p>'.$user_name.' - '.$row["3"].'
                        <div align="right">
                         - <small><em>'.$row['4'].'</em></small>
                        </div>
                       </p>
                      </li>
                      ';
    }
    $output .= '</ul>';
    return $output;
}

// function to get the username from a userid
function get_user_name($user_id, $connect)
{
    $query = "SELECT Username AS c FROM users WHERE ID=?";
    $statement = $connect->prepare($query);
    $statement->bind_param('i',$user_id);
    $statement->execute();
    $result = $statement->get_result()->fetch_assoc();
    return $result['c'];
}

?>