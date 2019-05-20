<!-- *********************************************************************** -->
<!-- Programmer: Marco S. Chalub -->
<!-- Software: Microsoft Visual Studio Code -->
<!-- Platform: macOS Mojave 10.14.4 -->
<!-- Purpose: Software Project -->
<!-- *********************************************************************** -->
<?php
	session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Caprivi Healthcare Research</title>
	<link rel="stylesheet" href="../css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<script src="../js/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="../js/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
	<script src="../js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>	
</head>
<body>
<?php
	include('../main/menu.php');
?>

<div class="container">
    <div class="jumbotron text-center">
        <h1>Publication</h1>
        <p>Add your new publication!</p> 
    </div>
    
    <form action="journals_insert.php" method="GET">
        <div class="form-group-inline">
            <label for="name">Name:</label>
            <input type="text" class="form-control form-control" id="text">
    
            <label for="name">Name:</label>
            <input type="text" class="form-control form-control" id="text">
        </div>
        <div class="form-group-inline">
            <label for="name">Name:</label>
            <input type="text" class="form-control form-control" id="text">
    
            <label for="name">Name:</label>
            <input type="text" class="form-control form-control" id="text">
        </div>
        
        <table class="table table-borderless">
            <tr>
                <td><label for="isbn"> ISBN: </label></td>
                <td><input type="text" id="isbn" name="isbn" maxlength="14" minlength="10"></td>
                <td><label for="author"> Author: </label></td>
                <td><input type="text" id="author" name="author"></td>
            </tr>
            <tr>
                <td><label for="title"> Title: </label></td>
                <td colspan="3"><input type="text" id="title" name="title"></td>
            </tr>
            <tr>
                <td><label for="book_type"> Book Type: </label></td>
                <td>
                    <select required id="book_type" name="book_type">
                        <option value="D">Digital</option>
                        <option value="H">Hard Cover</option>
                        <option value="S">Soft Cover</option>
                    </select>
                </td>
                <td><label for="price"> Price(AU$): </label></td>
                <td><input type="number" id="price" name="price" value="0.00" step="0.01"></td>
            </tr>
        </table>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
    </div>	

<?php
	include('../main/footer.php');
?>
</body>
</html>