<div style="margin-left: 10%">
    <center class="selecione">
        <h2>Selecione o tipo da base de dados</h2>
            <form action="/config/database" method="GET" class="form-inline">
                <select name="db_type" class="custom-select" style="width:50%; margin: 30px;">
                    <option value=''>--</option>
                    <?php
                        foreach ($supportedDataBases['supported_databases'] as $dataBase) {
                            echo '<option value="'.$dataBase.'">'.ucfirst($dataBase).'</option>';
                        }
                    ?>
            </select>
            <button type="submit" class="btn btn-success">Success</button>
        </form>
    </center>
</div>

<style>
    .selecione{
        margin: 60px;
    }
</style>