<!DOCTYPE html>
<html lang="en">
    <head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title>People Data</title>
    <meta content="" name="description">
    <meta content="" name="keywords">
    <!-- Favicons -->
    <link href="" rel="icon">
    <link href="" rel="apple-touch-icon">
    <link rel="icon" href="" type="image/gif" />
    
    <style>
        body{background: #46afe8; margin: 0; padding: 0; border: 0; font-family: arial;}
        .people-card{width: 600px; margin: 50px auto 20px;}
        .people-card-head{display: flex; flex-wrap: wrap; justify-content: space-between;  align-items: center; color: #fff; }
        .people-card-head button{background: #f59b65; border: none; border-radius: 25px; padding: 10px 20px; color: #fff;}
        .people-card-head button:hover{cursor: pointer;}
        .people-card-body {width: 100%;}
        .people-card-body ul{margin: 0; padding: 0; list-style: none;}
        .people-card-body ul li{
            border-radius: 10px;
            background: #fff;
            display: flex;
            margin: 20px 0;
            overflow: hidden;
            flex-wrap: wrap;
            align-items: center;
            box-shadow: 0px 5px 0 #3b91c1;
        }
        .people-card-body ul li .list-left{
            background: #6dce8b;
            height: 80px;
            align-items: center;
            width: 50px;
            text-align: center;
            line-height: 80px;
            color: #fff;
            font-size: 24px;
            font-weight: bold;
        }
        .people-card-body ul li .list-right{
            background: #fff;
            height: 80px;
            align-items: center;
            width: calc(100% - 50px);
            text-align: left;
        }
        
        .people-card-body ul li .name{background: #d1e6f9; padding: 0 10px; line-height: 40px; font-size: 18px; font-weight: normal;}
        .people-card-body ul li .location{ padding: 0 10px; line-height: 40px; font-size: 18px; font-weight: normal;}
        
        
    </style>
    
    
    </head>

    <body>
        <div class="people-card">
            <div class="people-card-head">
            <button id="prev_button">Prev Person</button> PEOPLE DATA  <button id="next_button">Next Person</button> 
            </div>
            <div class="people-card-body">
                <ul id="people_ul">
                    
                </ul>
            </div>
        </div>
        <input type="hidden" id="prev_index">
        <input type="hidden" id="next_index">
        <script src="js/jquery.min.js"></script>
        <script src="js/jquery.blockUI.js"></script>
        <script>
            $("button").click(function () {
                if($(this).attr('id')=='prev_button') {
                    var id = $("#prev_index").val();
                } else {
                    var id = $("#next_index").val();
                }
                get_data(id); 
            })    
            function get_data(id) {
                $.blockUI();
                $.ajax({
                    url: "get_data/"+id,
                    type: "GET",
                    dataType:'json',
                    success: function (data) {
                        $.unblockUI();
                        if(data.status==true)
                        {
                            $("#people_ul").html(data.html);
                            $("#prev_index").val(data.prev_index);  
                            $("#next_index").val(data.next_index);  
                        }
                        else
                        {
                            alert('No more people!');
                        }
                    },
                    error: function (err) {
                        $.unblockUI();
                        alert('No more people!');
                    }
                });
            }
            get_data(0);
        </script>
    </body>
</html>