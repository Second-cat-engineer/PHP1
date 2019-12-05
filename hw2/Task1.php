<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>HW2</title>
</head>
<body>
<h1>Напишите программу, которая составит и выведет в браузер таблицу истинности</h1>
<div style="width: 100px; float: left; margin: 10px; background-color: aquamarine;">
    <p>Таблица для оператора &&  </p>
    <table>
        <tr>
            <td style="width: 20px; text-align: center">a<td>
            <td style="width: 20px; text-align: center">b<td>
            <td style="width: 20px; text-align: center">&&<td>
        </tr>
        <tr>
            <td><?php $a = false; echo (int)$a; ?><td>
            <td><?php $b = false; echo (int)$b; ?><td>
            <td><?php echo (int)($a && $b); ?><td>
        </tr>
        <tr>
            <td><?php $a = true; echo (int)$a; ?><td>
            <td><?php $b = false; echo (int)$b; ?><td>
            <td><?php echo (int)($a && $b); ?><td>
        </tr>
        <tr>
            <td><?php $a = false; echo (int)$a; ?><td>
            <td><?php $b = true; echo (int)$b; ?><td>
            <td><?php echo (int)($a && $b); ?><td>
        </tr>
        <tr>
            <td><?php $a = true; echo (int)$a; ?><td>
            <td><?php $b = true; echo (int)$b; ?><td>
            <td><?php echo (int)($a && $b); ?><td>
        </tr>
    </table>
</div>
<div style="width: 100px; float: left; background-color: aquamarine; margin: 10px">
    <p>Таблица для оператора ||  </p>
    <table>
        <tr>
            <td style="width: 20px">a<td>
            <td style="width: 20px">b<td>
            <td style="width: 20px">||<td>
        </tr>
        <tr>
            <td><?php $a = false; echo (int)$a; ?><td>
            <td><?php $b = false; echo (int)$b; ?><td>
            <td><?php echo (int)($a || $b); ?><td>
        </tr>
        <tr>
            <td><?php $a = true; echo (int)$a; ?><td>
            <td><?php $b = false; echo (int)$b; ?><td>
            <td><?php echo (int)($a || $b); ?><td>
        </tr>
        <tr>
            <td><?php $a = false; echo (int)$a; ?><td>
            <td><?php $b = true; echo (int)$b; ?><td>
            <td><?php echo (int)($a || $b); ?><td>
        </tr>
        <tr>
            <td><?php $a = true; echo (int)$a; ?><td>
            <td><?php $b = true; echo (int)$b; ?><td>
            <td><?php echo (int)($a || $b); ?><td>
        </tr>
    </table>
</div>
<div style="width: 150px; float: left; background-color: aquamarine; margin: 10px">
    <p>Таблица для оператора XOR  </p>
    <table>
        <tr>
            <td style="width: 20px">a<td>
            <td style="width: 20px">b<td>
            <td style="width: 20px">||<td>
        </tr>
        <tr>
            <td><?php $a = false; echo (int)$a; ?><td>
            <td><?php $b = false; echo (int)$b; ?><td>
            <td><?php echo (int)($a xor $b); ?><td>
        </tr>
        <tr>
            <td><?php $a = true; echo (int)$a; ?><td>
            <td><?php $b = false; echo (int)$b; ?><td>
            <td><?php echo (int)($a xor $b); ?><td>
        </tr>
        <tr>
            <td><?php $a = false; echo (int)$a; ?><td>
            <td><?php $b = true; echo (int)$b; ?><td>
            <td><?php echo (int)($a xor $b); ?><td>
        </tr>
        <tr>
            <td><?php $a = true; echo (int)$a; ?><td>
            <td><?php $b = true; echo (int)$b; ?><td>
            <td><?php echo (int)($a xor $b); ?><td>
        </tr>
    </table>
</div>
</body>
</html>