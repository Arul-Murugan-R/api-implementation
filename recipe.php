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
            /* padding:0px 100px; */
            display:flex;
            justify-content:space-around;
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
            background-color:orange;
            border:0px;
            width:100px;
            cursor:pointer;
        }
        .recipe-info{
            padding:10px;
        }
        /* @media (max-width:600px){
            .display-recipe{
                padding:30px;
                padding-left:70px;
            }
            .recipe-card{
                margin:10px;

            }
        }
        @media (max-width:450px){
            .display-recipe{
                padding:5px;
            }
        } */
        .modal-pop{
            position:fixed;
            width:100%;
            height:100%;
            top:0;
            left:0;
            right:0;
            bottom:0;
            background-color:rgba(0,0,0,0.4);
            
        }
        .recipe-modal-scroll{
            width:70px;
        }
        .recipe-modal-scroll-track{
            background-color:black;
        }
        .recipe-modal-scroll-thumb{
            background-color:#ccc;
        }
        .close{
            float:right;
            font-size:35px;
            font-weight:bold;
            cursor:pointer;
            transition-duration:0.6s;
        }
        .close:hover{
            color:white;
        }
        .hide{
            display:none;
        }
        .show{
            display:block;
        }
        .recipe-modal{
            position:fixed;
            top:0%;
            left:20%;
            bottom:0%;
            background-color:orange;
            height:90%;
            border-radius:8px;
            padding:40px;
            overflow-y:scroll;
            width:750px;
        }
        .recipe-modal p{
            font-size:18px;
            word-wrap:break-word;
        }
        .modal-img{
            width:400px;
            height:250px;
            box-sizing:border-box;
        }
        .pop-img{
            width:400px;
            height:250px;
        }
    </style>
</head>
<body>
<div class="modal-pop" style="display:none;">
    
    <div class="recipe-modal">
        <span class="close" onclick="parentNode.parentNode.style.display='none';">&times;</span><br>
        <div class="modal-img">
            <img class="pop-img" src="https://www.themealdb.com/images/media/meals/1529444830.jpg" />
        </div><br>
        <h1>Recipe Instructions</h1><br>
        <p>Preheat oven to 350?? F. Spray a 9x13-inch baking pan with non-stick spray.\r\nCombine soy sauce,
             ?? cup water, brown sugar, ginger and garlic in a small saucepan and cover. Bring to a boil over
             medium heat. Remove lid and cook for one minute once boiling.\r\nMeanwhile, stir together the corn 
             starch and 2 tablespoons of water in a separate dish until smooth. 
            </p><br>
        <center><a href="#" >Watch Video</a></center><br><br><br>
    </div>
    </div>
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
                "<div class=\"recipe-card\" id=\"$mealid\">
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
    
    <script>        
        let mealList=document.querySelector(".display-recipe")
            // console.log(mealList)
            mealList.addEventListener('click', function(e){
                e.preventDefault();
                if(e.target.classList.contains('try-new')){
                    let popupcontent = document.querySelector(".modal-pop")
                    // console.log(e.target.parentNode.parentNode.parentNode)
                    const id=e.target.parentNode.parentNode.parentNode.id
                    // console.log(id)
                    fetch(`https://www.themealdb.com/api/json/v1/1/lookup.php?i=${id}`)
                    .then(response => response.json())
                    .then(data=>{
                        // console.log(data)
                        // console.log(data['meals'][0])
                        mealInstructions=data['meals'][0]['strInstructions']
                        mealImg=data['meals'][0]['strMealThumb']
                        mealName=data['meals'][0]['strMeal']
                        youtubeLink=data['meals'][0]['strYoutube']
                        // console.log(mealInstructions)
                        html=`<div class="recipe-modal">
                            <label class="close" onclick="parentNode.parentNode.style.display='none';">&times;</label><br>
                                <div class="modal-img">
                                    <img class="pop-img" src="${mealImg}" />
                                </div><br>
                                <h1>${mealName} Recipe Instructions</h1><br>
                                <p>${mealInstructions}</p><br>
                                <center><a target="_blank" href="${youtubeLink}" >Watch Video</a></center><br><br><br>
                            </div>`;
                            popupcontent.innerHTML='';
                        popupcontent.style.display="block";
                        popupcontent.innerHTML=html;
                    })
                }
            })
            
            
            
    </script>
    
</body>
</html>