<?php
include __DIR__ . '/function.php';

if (empty($_GET['a'])) {
    $a = null;
} else {
    $a = $_GET['a'];
}

if (empty($_GET['b'])) {
    $b = null;
} else {
    $b = $_GET['b'];
}

if (empty($_GET['operation'])) {
    $operation = null;
} else {
    $operation = $_GET['operation'];
}

if (!is_numeric($a) || !is_numeric($b)) {
    $result = null;
} else {
    $calculation = calculation($a, $operation, $b);
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
    <button type="submit"> =</button><?php echo ' ' . $result ?>
</form>