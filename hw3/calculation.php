<?php
include __DIR__ . '/function.php';

if (empty($_GET)) {
    $a = null;
    $b = null;
    $operation = null;
    $result = 'Введите значения';
} elseif (!is_numeric($_GET['a']) || !is_numeric($_GET['b'])) {
    $a = $_GET['a'];
    $b = $_GET['b'];
    $operation =$_GET['operation'];
    $result = 'Ошибка! введенные значения не числа';
} else{
    $a = $_GET['a'];
    $b = $_GET['b'];
    $operation = $_GET['operation'];
    $calculation = calculation($a, $operation, $b);
    if (null === $calculation) {
        $result =  'Ошибка! на 0 делить нельзя';
    } else {
        $result = $calculation;
    }
}
?>
<form action="/hw3/calculation.php" method="get">
    <input type="text" name="a" value="<?php echo $a ?>">
    <select name="operation">
        <?php
        $operations = ['+', '-', '*', '/'];
        foreach ($operations as $value) { ?>
            <option
                <?php
                    if ($operation === $value) {
                        echo 'selected';
                    }
                ?>
            >
                <?php echo $value ?>
            </option>
            <?php
        }
        ?>
    </select>
    <input type="text" name="b" value="<?php echo $b ?>">
    <button type="submit"> = </button><?php echo ' ' . $result ?>
</form>