<?php

require __DIR__ . '/vendor/autoload.php';
 error_reporting(0);

if($_SERVER['REQUEST_METHOD']==='POST'){
    $country=$_POST['country'];
    $obj=new GuzzleHttp\Client();
    $res=$obj->request('GET',"https://restcountries.com/v3/name/$country");
    $data=json_decode($res->getBody(),true)[0];
}else{
    //ss$country= $_POST['country'];
    if(!preg_match('/^[A-Za-z]+$/', $country))
    $msg="Invalid Name";
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form method="post">
        <label>Enter Name</label>
            <input type="text" name="country"  >

            <button type="submit" name="submit">submit</button>
    </form>
    <table border="1px">
     <tr>
     <th>Name</th>
     <th>Capital</th>
    <th>Population</th>
    <th>Region</th>
    <th>Languages</th>
    <th>Sub Region</th>
    <th>TimeZone</th>
    <th>Area</th>
    <th>Continents</th>
    <th>FiFa</th>
    <th>Flag</th>


  </tr>

      <tr>
        <td><?= $data['name']['common'] ?></td>
        <td><?= $data['capital'][0] ?></td>
        <td><?= $data['population'] ?></td>
        <td><?= $data['region'] ?></td>
        <td><?= implode(",",$data['languages']) ?></td>
        <td><?= $data['subregion'] ?></td>
        <td><?= $data['timezones'][0] ?></td>
        <td><?= $data['area'] ?></td>
        <td><?= $data['continents'][0] ?></td>
        <td><?= $data['fifa'] ?></td>
         <td><img src="<?= $data['flags'][0]?>" alt="<?= $data['name']?>" width="50"></td>
      </tr>
  
     </table>
</body>
</html>