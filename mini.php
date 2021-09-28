<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>API Attempt</title>
    <style>
        body{
            background-image: linear-gradient(to right ,lightblue,blue);
        }
        .api_implementation{
            position:absolute;
            top:30%;
            left:50%;
            transform: translate(-50%, -50%);
        }
        .search_city{
            width:300px;
            height:30px;
            border-radius:7px;
            padding:5px;
            border:0px;
            outline:none;
        }
        .submit{
            background-color:orange;
            color:white;
            border-radius:7px;
            border:0px;
            width:100px;
            padding:5px;
            height:30px;
        }
        .display-output{
            width:350px;
            background-color:orange;
            color:white;
            padding:20px;
            font-size:23px;
            line-height:30px;
            box-shadow:0px 0px 15px #ccc;
        }
    </style>
</head>
<body>
    
    <?php 
        if(isset($_POST['submit'])){
            $city_name=$_POST['city'];
            // echo $city_name."<br>";
        }
    ?>
    <?php 
        $api_url="https://api.sheety.co/5cbd76fcba6607814375700b694084b0/flightDeals/prices";
        // echo $api_url;
        $price_data=json_decode(file_get_contents($api_url),true);
        // print_r($price_data);
        
        
    ?>
    <div class="api_implementation">
        <form class="form-action"action="mini.php" method="post">
            <input class="search_city" name="city" type="text" placeholder="Enter City Name" />
            <input class="submit" name="submit" type="submit" />
        </form>
        <?php 
            echo "<br><br>";
            if(isset($city_name)){
                for($i=0;$i<count($price_data['prices']);$i++){
                    if($price_data['prices'][$i]['city']==$city_name){
                        
                        // echo "<br>City Name : ".$price_data['prices'][$i]['city']."<br>";
                        // echo "<br>Iata Code : ".$price_data['prices'][$i]['iataCode']."<br>";
                        // echo "<br>Lowest Price : ".$price_data['prices'][$i]['lowestPrice']."<br>";
                        $iatacode=$price_data['prices'][$i]['iataCode'];
                        $price=$price_data['prices'][$i]['lowestPrice'];
                    }
                }
                if(isset($city_name)&&isset($iatacode)&&isset($city_name)){
                    echo "<div class=\"display-output\">
                            <label>City Name : $city_name</label><br>
                            <label>City Code : $iatacode</label><br>
                            <label>Minimum Price : $price</label><br>

                    </div>";
                }
                else{
                    $iatacode="Not Found";
                    $price="Not Found";
                    echo "<div class=\"display-output\">
                        <label>City Name : $city_name</label><br>
                        <label>City Code : $iatacode</label><br>
                        <label>Minimum Price : $price</label><br>

                    </div>";
                }
            }
        ?>
        
    </div>
    
</body>
</html>