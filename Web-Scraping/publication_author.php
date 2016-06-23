<?php

//connect to mysql db
    $con = mysql_connect("localhost","root","qatar123") or die('Could not connect: ' . mysql_error());

//connect to the employee database
    mysql_select_db("qcri_kpi", $con);

// copy file content into a string var
    $json_file = file_get_contents('stats-hci.json');

// convert the string to a json object
    $jfo = json_decode($json_file);


//insert publisher Name,Acronym into publisher(Table)

    $servername = "localhost";
    $username = "root";
    $password = "qatar123";
    $dbname = "qcri_kpi";

    // Create connection

    $array_of_id=array();

    $conn = mysqli_connect($servername, $username, $password, $dbname);
    // Check connection
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    $sql = "SELECT * FROM publications";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        // output data of each row
        while($row = mysqli_fetch_assoc($result)) {
            // echo "id: " . $row["publication_id"]. "<br>";
            array_push($array_of_id,$row['publication_id']);
        }
    } else {
        echo "0 results";
    }

    mysqli_close($conn);

    print_r($array_of_id);

    //insert publisher Name,Acronym into publication_author(Table)
          $posts = $jfo->PublicationArray;
          $i=0;
          foreach ($posts as $post) {
            $sql = "INSERT INTO `publication_authors` (`publication_author_id`, `publication_id`, `author_qfid`, `authoring_order`, `affiliation_id`, `author_name`)
            VALUES (NULL, '$array_of_id[$i]', NULL, '12', '1212', '$post->Author')";
            $i++;
            if(!mysql_query($sql,$con))
            {
                die('Error : ' . mysql_error());
            }
          }

?>
