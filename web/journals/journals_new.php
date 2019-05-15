<!-- *********************************************************************** -->
<!-- Programmer: Marco S. Chalub -->
<!-- Date: 02 May 2018 -->
<!-- Software: Microsoft Visual Studio Code -->
<!-- Platform: macOS Mojave 10.14.4 -->
<!-- Purpose: Assessment 3 -->
<!-- *********************************************************************** -->
<html>

<head>
    <title>Marco's Library</title>
    <style>
        td * {
            width: 100%;
        }
    </style>
</head>

<body>
    <h1>New Book</h1>
    <form action="insertbook.php" method="GET">
        <table border="0">
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
            <tr>
                <td></td>
                <td></td>
                <td></td>
                <td><input type="submit" value="Insert Book"></td>
            </tr>
        </table>
    </form>
    <a href="booklist.php?book_type=A">All Books</a>
</body>

</html>