<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/rateYo/2.3.2/jquery.rateyo.min.css">
    <title>quiz</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
</head>
<body>
<h1><?php echo $title;?></h1>
<div class = "container">
    <p> This is a multiple choise quiz to test your knowledge!!</p>
    <ul>
    <li> <strong> Number of Questions : </strong> 10 </li>
    <li> <strong> Question Type : </strong></li>
    <li> <strong> Time : </strong> 5 minutes</li>
</ul>
<a href = "question.php?" class= "start btn btn-xs btn-info"> Attempt Quiz </a> 
</div>
    
</body>
</html>