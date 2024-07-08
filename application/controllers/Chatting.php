<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Chatting extends CI_Controller
{

    public function insertChat()
    {
        if (!$this->session->userdata('loginPelanggan')) {
            redirect(base_url("auth"));
        }
        if (
            isset($_POST['pesan']) &&
            isset($_POST['dari']) &&
            isset($_POST['untuk'])
        ) {

            // $dari = $this->session->userdata('idPelanggan');
            $pesan = $_POST['pesan'];
            $dari = $_POST['dari'];
            $untuk = $_POST['untuk'];

            date_default_timezone_set("Asia/jakarta");
            // $time = date("H:i:s");
            // $time = date("CCYY-MM-DD hh:mm:ss");
            $time = date("Y-m-d H:m:s");
            $data = array(
                'dari' => $dari,
                'untuk' => $untuk,
                'tanggal' => $time,
                'pesan' => $pesan,
            );
            $this->db->insert('tb_pesan', $data);

            echo "
            <ul class='chat-list'>
            <li class='odd chat-item'>
                <div class='chat-content'>
                    <div class='box bg-light-inverse'>
                        " . $pesan . "
                    </div>
                    <br />
                </div>
                <div class='chat-time'>
                    " . date('d-m-Y H:m', strtotime($time)) . "
                </div>
            </li>
            </ul>
            ";
        }
    }

    public function insertChataa()
    {
        if (isset($_SESSION['username'])) {

            if (
                isset($_POST['message']) &&
                isset($_POST['to_id'])
            ) {

                # database connection file
                include '../db.conn.php';

                # get data from XHR request and store them in var
                $pesan = $_POST['message'];

                # get the logged in user's username from the SESSION
                $from_id = $_SESSION['user_id'];

                $sql = "INSERT INTO 
	       chats (from_id, to_id, message) 
	       VALUES (?, ?, ?)";
                $stmt = $conn->prepare($sql);
                $res  = $stmt->execute([$from_id, $to_id, $message]);

                # if the message inserted
                if ($res) {
                    /**
       check if this is the first
       conversation between them
                     **/
                    $sql2 = "SELECT * FROM conversations
               WHERE (user_1=? AND user_2=?)
               OR    (user_2=? AND user_1=?)";
                    $stmt2 = $conn->prepare($sql2);
                    $stmt2->execute([$from_id, $to_id, $from_id, $to_id]);

                    // setting up the time Zone
                    // It Depends on your location or your P.c settings
                    define('TIMEZONE', 'Africa/Addis_Ababa');
                    date_default_timezone_set(TIMEZONE);

                    $time = date("h:i:s a");

                    if ($stmt2->rowCount() == 0) {
                        # insert them into conversations table 
                        $sql3 = "INSERT INTO 
			         conversations(user_1, user_2)
			         VALUES (?,?)";
                        $stmt3 = $conn->prepare($sql3);
                        $stmt3->execute([$from_id, $to_id]);
                    }
?>

                    <p class="rtext align-self-end
		          border rounded p-2 mb-1">
                        <?= $message ?>
                        <small class="d-block"><?= $time ?></small>
                    </p>

<?php
                }
            }
        } else {
            header("Location: ../../index.php");
            exit;
        }
    }

    public function getConversation($user_id)
    {
        $sql = "SELECT * FROM conversations
            WHERE user_1=? OR user_2=?
            ORDER BY conversation_id DESC";

        $stmt = $this->db->prepare($sql);
        $stmt->execute([$user_id, $user_id]);

        if ($stmt->rowCount() > 0) {
            $conversations = $stmt->fetchAll();

            /**
          creating empty array to 
          store the user conversation
             **/
            $user_data = [];

            # looping through the conversations
            foreach ($conversations as $conversation) {
                # if conversations user_1 row equal to user_id
                if ($conversation['user_1'] == $user_id) {
                    $sql2  = "SELECT *
            	          FROM users WHERE user_id=?";
                    $stmt2 = $this->db->prepare($sql2);
                    $stmt2->execute([$conversation['user_2']]);
                } else {
                    $sql2  = "SELECT *
            	          FROM users WHERE user_id=?";
                    $stmt2 = $this->db->prepare($sql2);
                    $stmt2->execute([$conversation['user_1']]);
                }

                $allConversations = $stmt2->fetchAll();

                # pushing the data into the array 
                array_push($user_data, $allConversations[0]);
            }

            return $user_data;
        } else {
            $conversations = [];
            return $conversations;
        }
    }



    public function lastChat($id_1, $id_2, $conn)
    {

        $sql = "SELECT * FROM chats
           WHERE (from_id=? AND to_id=?)
           OR    (to_id=? AND from_id=?)
           ORDER BY chat_id DESC LIMIT 1";
        $stmt = $conn->prepare($sql);
        $stmt->execute([$id_1, $id_2, $id_1, $id_2]);

        if ($stmt->rowCount() > 0) {
            $chat = $stmt->fetch();
            return $chat['message'];
        } else {
            $chat = '';
            return $chat;
        }
    }

    public function opened($id_1, $conn, $chats)
    {
        foreach ($chats as $chat) {
            if ($chat['opened'] == 0) {
                $opened = 1;
                $chat_id = $chat['chat_id'];

                $sql = "UPDATE chats
    		        SET   opened = ?
    		        WHERE from_id=? 
    		        AND   chat_id = ?";
                $stmt = $conn->prepare($sql);
                $stmt->execute([$opened, $id_1, $chat_id]);
            }
        }
    }


    public function last_seen($date_time)
    {
        define('TIMEZONE', 'Asia/jakarta');
        date_default_timezone_set(TIMEZONE);

        $timestamp = strtotime($date_time);

        $strTime = array("second", "minute", "hour", "day", "month", "year");
        $length = array("60", "60", "24", "30", "12", "10");

        $currentTime = time();
        if ($currentTime >= $timestamp) {
            $diff     = time() - $timestamp;
            for ($i = 0; $diff >= $length[$i] && $i < count($length) - 1; $i++) {
                $diff = $diff / $length[$i];
            }

            $diff = round($diff);
            if ($diff < 59 && $strTime[$i] == "second") {
                return 'Active';
            } else {
                return $diff . " " . $strTime[$i] . "(s) ago ";
            }
        }
    }

    public function getUser($username, $conn)
    {
        $sql = "SELECT * FROM users 
           WHERE username=?";
        $stmt = $conn->prepare($sql);
        $stmt->execute([$username]);

        if ($stmt->rowCount() === 1) {
            $user = $stmt->fetch();
            return $user;
        } else {
            $user = [];
            return $user;
        }
    }
}
