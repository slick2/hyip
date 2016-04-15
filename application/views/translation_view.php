<form action="" method="post" name="translation">
    <input type="submit" class="pay" value="Изменить" name="translate">
<table class="table-history">
    <tr><!--th>Тег</th--><th>Русский</th><th>Английский</th><th>Вьетнамский</th><th>Китайский</th><th>Сохранить</th></tr>
    <?php foreach ($data as $value): ?>
    <tr>
        <!--td><?php echo $value['tag']; ?></td-->
        <td><textarea name="<?php echo $value['id']."_russian"; ?>"><?php echo $value['russian']; ?></textarea></td>
        <td><textarea name="<?php echo $value['id']."_english"; ?>"><?php echo $value['english']; ?></textarea></td>
        <td><textarea name="<?php echo $value['id']."_vietnamese"; ?>"><?php echo $value['vietnamese']; ?></textarea></td>
        <td><textarea name="<?php echo $value['id']."_chinese"; ?>"><?php echo $value['chinese']; ?></textarea></td>
        <td><a class="btn-save pay ajax" id="<?php echo $value['id']."_submit"; ?>">Сохранить</a></td>
    </tr>
    <?php endforeach; ?>
</table>
<input type="submit" class="pay" value="Изменить" name="translate">
</form>