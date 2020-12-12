<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ceilings.uz</title>
</head>
<body>
    <style>
        *{
            padding: 0;
            margin: 0;
            box-sizing: border-box;
        }
        body{
            position: relative;
        }
        .wrapper{
            width: 100%;
            height: 100vh;
            background: rgba(0, 0, 0, 0.8);
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .content{
            background: #fff;
            padding: 45px;
            text-align: center;
            border-radius: 15px;
            width: 50%;
            display: flex;
            flex-direction: column;
            align-items: center;
        }
        .img{
            width: 300px;
            height: 300px;
        }
        .img img{
            width: 100%;
        }
        @media screen and (max-width:350px){
            .content{
                width: 90%;
            }
            .img{
            width: 200px;
            height: 200px;
        }
        }
    </style>
    <div class="wrapper">
        <div class="content">
        <?php
 
                /* https://api.telegram.org/botXXXXXXXXXXXXXXXXXXXXXXX/getUpdates */
                
                $name = $_POST['name'];
                $phone = $_POST['phone'];
                
                $token = "1301386804:AAH18mAp-Gg_Ih6IuGnzTByWmU8uJAkI7rA";
                
                $chat_id = "-470409732";
                
                $arr = array(
                'Имя пользователя: ' => $name,
                'Телефон: ' => $phone,
                );
                
                //При помощи цикла перебираем массив и помещаем переменную $txt текст из массива $arr
                foreach($arr as $key => $value) {
                $txt .= "<b>".$key."</b> ".$value."%0A";
                };
                
                //Осуществляется отправка данных в переменной $sendToTelegram
                $sendToTelegram = fopen("https://api.telegram.org/bot{$token}/sendMessage?chat_id={$chat_id}&parse_mode=html&text={$txt}","r");
                
                //Если сообщение отправлено, напишет "Thank you", если нет - "Error"
                if ($sendToTelegram) {
                echo "<div class='img'><img src='images/success.png'></div>
                <p>Ваша заявка успешно отправлена!  <br> Наши менеджеры свяжутся с вами в кратчайшие сроки.</p>";
                } else {
                echo "<div class='img'><img src='images/warning.png'></div>
                <p>Упс! Произошла ошибка. <br> Попробуйте позже!";
                }
                ?>
        </div>
    </div>
</body>
</html>