<form action="" method="post" name="translate">
<table class="table-history">
    <tr><th>Тег</th><th>Русский</th><th>Английский</th><th>Вьетнамский</th><th>Китайский</th></tr>
    <?php foreach ($data as $value): ?>
    <tr>
        <td><?php echo $value['tag']; ?></td>
        <td><textarea><?php echo $value['russian']; ?></textarea></td>
        <td><textarea><?php echo $value['english']; ?></textarea></td>
        <td><textarea><?php echo $value['vietnamese']; ?></textarea></td>
        <td><textarea><?php echo $value['chinese']; ?></textarea></td>
    </tr>
    <?php endforeach; ?>
</table>
</form>