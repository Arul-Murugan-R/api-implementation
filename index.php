<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GPA Calculator</title>
</head>
<body>
    <?php
        $servername = "localhost";
        $username = "username";
        $password = "mypass";

        // Create connection
        $conn = new mysqli($servername, $username, $password);

        // Check connection
        if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
        }
        echo "Connected successfully";
    ?>
    <h1>Welcome to our GPA Calculator</h1>
    <div class="selection">
        <div class="category-option">
            <form class="form-action" action="#">
                <select>
                    <option value="Department" >Department</option>
                    <option value="CSE" >CSE</option>
                    <option value="EEE" >EEE</option>
                    <option value="ECE" >ECE</option>
                    <option value="BTECH" >BTECH</option>
                    <option value="CE" >CE</option>
                    <option value="ME" >ME</option>
                    
                </select>
                <select>
                    <option value="Semester" >Semester</option>
                    <option value="1" >1</option>
                    <option value="2" >2</option>
                    <option value="3" >3</option>
                    <option value="4" >4</option>
                    <option value="5" >5</option>
                    <option value="6" >6</option>
                    <option value="7" >7</option>
                    <option value="8" >8</option>
                    
                </select>
                <input class="form-submit" name="submit" type="submit" />
            </form>
            
        </div><br>
        <div class="div-category">
            <div class="each-subject">
                <label class="subject-name" > Discrete Mathematics - MA8351</label><br>
                <label class="subject-credits" >Credits:</label>
                <input class="credit-value" value="4" />
                <label class="subject-grade" >Grade : </label>
                <select>
                    <option value="O" >O</option>
                    <option value="A+" >A+</option>
                    <option value="A" >A</option>
                    <option value="B+" >B+</option>
                    <option value="B" >B</option>
                    <option value="RA" >RA</option>
                    <option value="SA" >SA</option>
                    <option value="W" >W</option>
                    <option value="AB" >AB</option>
                    
                </select>
            </div><br>
            <div class="each-subject">
                <label class="subject-name" > Discrete Mathematics - MA8351</label><br>
                <label class="subject-credits" >Credits:</label>
                <input class="credit-value" value="4" />
                <label class="subject-grade" >Grade : </label>
                <select>
                    <option value="O" >O</option>
                    <option value="A+" >A+</option>
                    <option value="A" >A</option>
                    <option value="B+" >B+</option>
                    <option value="B" >B</option>
                    <option value="RA" >RA</option>
                    <option value="SA" >SA</option>
                    <option value="W" >W</option>
                    <option value="AB" >AB</option>
                    
                </select>
            </div><br>
            <div class="each-subject">
                <label class="subject-name" > Discrete Mathematics - MA8351</label><br>
                <label class="subject-credits" >Credits:</label>
                <input class="credit-value" value="4" />
                <label class="subject-grade" >Grade : </label>
                <select>
                    <option value="O" >O</option>
                    <option value="A+" >A+</option>
                    <option value="A" >A</option>
                    <option value="B+" >B+</option>
                    <option value="B" >B</option>
                    <option value="RA" >RA</option>
                    <option value="SA" >SA</option>
                    <option value="W" >W</option>
                    <option value="AB" >AB</option>
                    
                </select>
            </div><br>  
            <div class="each-subject">
                <label class="subject-name" > Discrete Mathematics - MA8351</label><br>
                <label class="subject-credits" >Credits:</label>
                <input class="credit-value" value="4" />
                <label class="subject-grade" >Grade : </label>
                <select>
                    <option value="O" >O</option>
                    <option value="A+" >A+</option>
                    <option value="A" >A</option>
                    <option value="B+" >B+</option>
                    <option value="B" >B</option>
                    <option value="RA" >RA</option>
                    <option value="SA" >SA</option>
                    <option value="W" >W</option>
                    <option value="AB" >AB</option>
                    
                </select>
            </div>
            
        </div>
    </div>
</body>
</html>