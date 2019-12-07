<?php
include __DIR__ . '/function.php';

$a = $_GET['a'] ?? null;
$b = $_GET['b'] ?? null;
$operation = $_GET['operation'] ?? null;

if (!is_numeric($a) || !is_numeric($b)) {
    $result = 'Введите числа!';
} else {
    $calculation = calculation($a, $operation, $b);
    if (null === $calculation) {
        $result = 'Ошибка! на 0 делить нельзя';
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
    <button type="submit"> =</button><?php echo ' ' . $result ?>
</form>