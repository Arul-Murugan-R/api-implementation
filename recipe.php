<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recipe Card</title>
    <style>
        .search{
            border: 1px solid black;
            padding:8px;
            width:250px;
            height:30px;
            border-radius:30px;
            outline:none;
        }
        .submit{
            border:0px;
            background-color:orange;
            border-radius:30px;
            height:35px;
            width:100px;
            cursor:pointer;
        }
        .display-recipe{
            padding:0px 100px;
            display:flex;
            flex-wrap:wrap;
        }
        .recipe-card{
            width:330px;
            background-color:#ccc;
            border-radius:7px;
            overflow:hidden;
            margin:10px 20px;
            word-wrap:break-word;
        }
        .recipe-img{
            width:330px;
            height:250px;
            box-sizing:border-box;
        }
        .source-img{
            width:330px;
            height:250px;
        }
        .try-new{
            border-radius:25px;
            padding:10px;
            background-color:lightblue;
            font-weight:bold;
            border:0px;
            width:100px;
            cursor:pointer;
        }
        .recipe-info{
            padding:10px;
        }
    </style>
</head>
<body>
    <?php 
        $ingredient="egg";
        if(isset($_POST['submit'])){
            $ingredient=$_POST['search'];
            // echo $city_name."<br>";
        }
        
    ?>
    <?php  
    
        $api_url="https://www.themealdb.com/api/json/v1/1/filter.php?i=$ingredient";
        // echo $api_url."<br><br>";
        $contents=file_get_contents($api_url);
        // echo $contents."<br><br>";
        $json=json_decode(file_get_contents($api_url),true);
        // print_r($json);
    ?>
    <div class="search-bar">
        <form class="form-search" action="recipe.php" method="post">
            <center>
                <h1>Search for a Recipes</h1>
                <p>Make delicious meal with our recipes support ...<br>
                - Founder<p>
                <input class="search" type="text" name="search" placeholder="Enter Your Ingredient" />
                <input class="submit" name="submit" type="submit" />
            </center><br>
        </form>
        
    </div><br>
    <center><h1>Here We go the recipe list </h1></center>

    <div class="display-recipe">
        <?php
        // echo count($json['meals']);
        if(count($json['meals'])>0){
            for($i=0;$i<count($json['meals']);$i++){
                $dish_name=$json['meals'][$i]['strMeal'];
                $dish_img=$json['meals'][$i]['strMealThumb'];
                $mealid=$json['meals'][$i]['idMeal'];
                echo 
                "<div class=\"recipe-card\">
                    <div class=\"recipe-img\">
                        <img class=\"source-img\" src=\"$dish_img\" /><br>
                    </div><br><br>
                    <div class=\"recipe-info\">
                        <label class=\"title\" ><strong>Meal Name : $dish_name <br>($mealid)</strong></label><br>
                        <center><button class=\"try-new\">View More</button></center>
                    </div>
                </div><br>";
            }
        }
        else{
            echo "<center><h1>Recipes is not available  Search Another ingredient</h1></center>";
        }
            
        ?>
        
    
        
    </div>
</body>
</html>