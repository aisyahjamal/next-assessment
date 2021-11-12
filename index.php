<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway&display=swap">
        <title>ISS LOCATION FINDER</title>
    </head>
    <body>

    <style>
    body {
        background: #152238 }
    section {
        background: black;
        color: white;
        border-radius: 1em;
        padding: 1em;
        position: absolute;
        top: 50%;
        left: 50%;
        margin-right: -50%;
        transform: translate(-50%, -50%) }
    </style>
    <section>
        <h1> Enter your choice of date & time </h1>
        <form action="location.php">
            <input type="datetime-local" placeholder="Search.." name="search">
            <button type="submit">Submit</button>
        </form>
    </section>

    </body>

   

</html>




