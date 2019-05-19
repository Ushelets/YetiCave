<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/configs/init.php';
session_start();

$chnk = $_SESSION['chnk'];
function CurrentPrice($history, $key)
{
    foreach ($history as $value) {
        if ($value['id_category'] == $key) {
            $hist_price[] = $value['history_price'];
        }
    }
    return max($hist_price);
};

function CurrentAuctionTime($history, $key)
{
    foreach ($history as $value) {
        if ($value['id_category'] == $key) {
            $hist_time[] = $value['history_time'];
        }
    }
    return max($hist_time);
};

foreach ($goods as $value) {
    $cur_price = CurrentPrice($history, $value['id']);
    $cur_auction_time = CurrentAuctionTime($history, $value['id']);
    foreach ($owners_goods as $row) {
        foreach ($history as $val) {
            if ($val['history_price'] == $cur_price && $val['history_time'] == $cur_auction_time && $val['id_category'] == $value['id'] && $value['id_owner'] == $row['id']) {
                $winner = [
                    '0' => $val['history_id'],
                    '1' => $val['history_name'],
                    '2' => $val['history_email'],
                    '3' => $value['id'],
                    '4' => $value['name'],
                    '5' => $row['name'],
                    '6' => $row['email'],
                    '7' => $row['phone']
                ];
            }
        }
    }

    if ($value['id'] == $winner[3]) {
        $sql_upd_goods = 'UPDATE goods SET mail_check = 1 WHERE id = ?';
        $stmt = db_get_prepare_stmt($link, $sql_upd_goods, [$winner[3]]);

        if (mysqli_stmt_execute($stmt)) {
            mysqli_stmt_close($stmt);
            mysqli_close($link);
        };

        try {
            // Create the SMTP Transport
            $transport = (new Swift_SmtpTransport('smtp.mail.ru', 465, 'ssl'))
                ->setUsername('Goldberg7771@mail.ru')
                ->setPassword('nitzer_ebb1790');

            // Create the Mailer using your created Transport
            $mailer = new Swift_Mailer($transport);

            // Create a message
            $message = new Swift_Message();

            // Set a "subject"
            $message->setSubject('Вы победитель аукциона YetiCave!');

            // Set the "From address"
            $message->setFrom(['Goldberg7771@mail.ru' => 'YetiCave']);

            // Set the "To address" [Use setTo method for multiple recipients, argument should be array]
            $message->addTo($winner[2], $winner[1]);

            // Set a "Body"

            $message->addPart("<h1>Поздравляем с победой!</h1>
                <em>
                  <p>Ваша ставка для лота
                    <b><a href='http://htmlacademy/pages/lot.php?key=$winner[3]'>$winner[4]</a></b> победила.</p>
                </em>
                <em>
                  <p>Владелец лота <b>$winner[5]</b>. Напишите ему по электронной почте: <b> $winner[6]</b> или свяжитесь с ним по телефону: <b>$winner[7]</b> .</p>
                </em>

                <small>Интернет Аукцион 'YetiCave'</small>", 'text/html');

            // Send the message
            $result = $mailer->send($message);

            echo "<head>
            <meta http-equiv='Refresh' content='0; URL=http://htmlacademy/index.php?chnk=$chnk'>
          </head>";
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    };
};