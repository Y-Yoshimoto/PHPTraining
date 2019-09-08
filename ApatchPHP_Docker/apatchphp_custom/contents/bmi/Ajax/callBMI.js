//入力した数字の送受信
$(function(){
    $('#callBMI').click(function() {
        //多重送信防止//ボタンの無効化
        var button = $(this);
        button.attr("disabled", true);
        //　JSON形式に変形
        var sed_data ={
            'tall': Number($("#tall").val()),
            'weight': Number($("#weight").val()),
            }
        console.log("コンソール");
        console.log(sed_data)
        // Ajax通信
        $.post({//POST形式
            url:"./returnBMI.php",    //URL
            data: sed_data,   //送信JSONデータ
            dataType: "json",                //受信データ
        }).done(function(rcv_data){
                // 受信データ処理
                console.log(rcv_data);
                var bmi = rcv_data.bmi;
                var message1 = 'あなたのBMIは[' + rcv_data.bmi + ']です。';
                $("#message1").text('あなたのBMIは[' + rcv_data.bmi.toFixed(2) + ']です。');
                $("#message2").text('評価は[' +  rcv_data.status +  ']です。');
                $('.boxOutput').css('background', rcv_data.color);
                $("#buttonN").text('再送信');
        }).fail(function(rcv_data, textStatus, errorThrown){
                // エラー処理
                console.log(rcv_data);
                $("#message1").text("サポートへご連絡ください。");
                //alert(errorThrown);
        }).always(function(){
        //ボタンの再有効化
            button.attr("disabled", false);
        })
    })
});
