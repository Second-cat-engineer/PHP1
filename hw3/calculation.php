<?php
include __DIR__ . '/functions.php';

$a = checkExistence($_GET['a']);
$b = checkExistence($_GET['b']);
$operation = checkExistence($_GET['operation']);

if (!is_numeric($a) || !is_numeric($b)) {
    $result = null;
} else {
    $calculation = calculation($operation, $a, $b);
    if (null === $calculation) {
        $result = null;
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
    <button type="submit"> =</button><?php echo $result ?>
</form>