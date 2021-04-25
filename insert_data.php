<?php
    include 'query/connect.php';

    $sql = "select * from iphone  ";
    $iphone = [];
    if($result = $con -> query()){
        while($data = $result -> fetah_assoc() ){
            array_push($iphone, $data)
        }
    }
    $sql = "select * from ipad ";
    $ipad = [];
    if($result = $con -> query()){
        while($data = $result -> fetah_assoc() ){
            array_push($ipad, $data)
        }
    }

    $con->query($sql);
    // CLOSE DATABASE CONNECTION
    $con->close();

    //CALL FUNCTION CREATE XML FILE
    createXMLfile($iphone , $ipad);

    // CREATE XML FILE
    function createXMLfile($iphone , $ipad){
        $filePath = '"query/search_data.applestore"';

        $dom = new DOMDocument('1.0', 'utf-8');

        $root = $dom->createElement('pages');

        for($i = 0 ; $i < count($iphone); $i++){
            $iphone_name = $iphone[$i]['name'];
            $iphone_id = $iphone[$i]['p_id';];

            $link = $dom ->createElement('link');
            $title = $dom ->createElement('title' , $iphone_name);
            $url = $dom ->createElement('url' ,"https://www.google.co.th/" );

            $link -> appendChild($title);
            $link -> appendChild($url);
            $root -> appendChild($link);

        }
      
        $dom->appendChild($root);
        $dom->save($filePath);
    }