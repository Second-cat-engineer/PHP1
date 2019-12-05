<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Hw3</title>
</head>
<body>
<p> Напишите программу-калькулятор:</p>
<p> a. Форма для ввода двух чисел, выбора знака операции и кнопка "равно" </p>
<form action="/hw3/calc.php" method="get">
    <p>
        введите первое число
        <input type="text" name="a">  <!-- тип text т.к. если ставить тип number, то нельзя вводить нецелые числа -->
    </p>
    <p> <select name="operation">
            <option> + </option>
            <option> - </option>
            <option> * </option>
            <option> / </option>
        </select>
    </p>
    <p>
        введите второе число
        <input type="text" name="b">
    </p>
    <p>
        <button type="submit"> Равно </button>
    </p>
</form>
</body>
</html>