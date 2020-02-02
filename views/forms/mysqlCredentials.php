<div class="row">
    <div class="col-md-8 order-md-1">
        <h4 class="mb-3">Credenciais</h4>
        <form action="/database/tableInfo" method="POST" class="needs-validation" novalidate autocomplete="off">
            <div class="form-group row">
                <label for="host" class="col-sm-2 col-form-label">Host</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="host" name="host" placeholder="Ex.: 192.168.0.0" value="<?=getenv("DB_HOST") ?: '';?>">
                </div>
            </div>
            <div class="form-group row">
                <label for="usuario" class="col-sm-2 col-form-label">Usuário</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="usuario" name="user" placeholder="Usuário" value="<?=getenv("DB_USER") ?: '';?>">
                </div>
            </div>
            <div class="form-group row">
                <label for="password" class="col-sm-2 col-form-label">Senha</label>
                <div class="col-sm-10">
                    <input type="password" class="form-control" id="password" name="password" placeholder="Senha" value="<?=getenv("DB_PASS") ?: '';?>">
                </div>
            </div>
            <div class="form-group row">
                <label for="database" class="col-sm-2 col-form-label">Banco</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="database" name="database" placeholder="Banco" value="<?=getenv("DB_DATABASE") ?: '';?>">
                </div>
            </div>
            <div class="form-group row">
                <label for="table" class="col-sm-2 col-form-label">Tabela</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="table" name="table" placeholder="Tabela" value="">
                </div>
            </div>
            <div class="form-group row">
                <div class="col-sm-10">
                    <input type="hidden" name='db_type' value="<?=$_GET['db_type'] ?? '' ?>" />
                    <button type="submit" class="btn btn-success">Conectar</button>
                </div>
            </div>
        </form>
    </div>
</div>