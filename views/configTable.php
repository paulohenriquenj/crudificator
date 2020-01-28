<div class="row">
    <div class="col-md-2 order-md-1"></div>

    <div class="col-md-8 order-md-2">
        <h4 class="mb-3">Configurações</h4>
        <form action="/table/config" method="POST">
            <table class="table table-bordered table-hover table-sm valign-initial">
                <thead class="thead-dark">
                    <tr>
                        <th>Campo</th>
                        <th>Label</th>
                        <th width="170">Mostrar no form?</th>
                    </tr>
                </thead>
                <tbody>
                <?php foreach($table as $index=>$field) { ?>
                    <tr>
                        <td>
                            <strong><?=$field['field'];?></strong> <small><i>(<?=$field['type'];?>)</i></small>
                            <div style="float:right">
                                <?=$field['icons'];?>
                            </div>
                        </td>
                        <td>
                            <input type="text" name="label_<?=$index;?>" placeholder="Label">
                        </td>
                        <td align="center" style="vertical-align: bottom;">
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
            <input type="text" name="nome_rota" placeholder="nome da rota"><br /><br />
            <button type="submit" class="btn btn-success">Gerar</button>
        </form>
    </div>

    <div class="col-md-2 order-md-3"></div>
</div>