<?php
include __DIR__ . '/function.php';

if (!is_numeric($_GET['a']) || !is_numeric($_GET['b'])) {
    $a = null;
    $b = null;
    $operation = null;
    $result = null;
} else {
    $a = $_GET['a'];
    $b = $_GET['b'];
    $operation = $_GET['operation'];
    $calculation = calculation($operation, $a, $b);
    if (null === $calculation) {
        $result = null;
    }
    $result = $calculation;
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