<?php

$mahasisa = [
    ["nama"=>"Rafif", "kelas"=>"RPL"],
    ["nama"=>"Rabbani", "kelas"=>"TKJ"],
];
print_r($mahasisa);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        .red{
            background-color : red;
            color : red;
        }
    </style>
</head>
<body>
    <table border="1" cellpading="0" cellspacing="0">
       <tr>
       <th colspan="2">Nama</th>
       </tr>
       <?php for($i = 1; $i <= 10; $i++): ?>
        <?php if($i % 2 == 0): ?>
        <tr class="red">
        <?php elseif($i % 2 == 1): ?>   
        <tr>
        <?php endif; ?>
            <td><?= "Kolom $i, Baris $i" ?></td>
            <td><?= "Kolom $i, Baris $i" ?></td>
        </tr>
        
        <?php endfor ?>
    </table>
</body>
</html>