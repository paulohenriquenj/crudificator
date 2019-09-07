<h1>Configurações</h1>
<form action="/table/config" method="POST">
    <table class="table table-bordered table-hover table-strip">
        <thead>
            <tr>
                <th>Campo</th>
                <th>Label</th>
                <th width="200">Mostrar no form?</th>
            </tr>
        </thead>
        <tbody>
        <?php foreach($table as $index=>$field) { ?>
            <tr>
                <td><?=$field['field'];?> (<?=$field['type'];?>)</td>
                <td><input type="text" name="label_<?=$index;?>" placeholder="Label"></td>
                <td>
                    <input type="checkbox" name="show_<?=$index;?>" checked>
                    <input type="hidden" name="field_<?=$index;?>" value="<?=$field['field'];?>">
                    <input type="hidden" name="type_<?=$index;?>" value="<?=$field['type'];?>">
                    <input type="hidden" name="size_<?=$index;?>" value="<?=$field['size'];?>">
                    <input type="hidden" name="key_<?=$index;?>" value="<?=$field['key'];?>">
                    <input type="hidden" name="extra_<?=$index;?>" value="<?=$field['extra'];?>">
                    <input type="hidden" name="default_<?=$index;?>" value="<?=$field['default'];?>">
                </td>
            </tr>
        <?php } ?>
        </tbody>
    </table>
    <button type="submit" class="btn btn-success">Gerar</button>
</form>