<div class="row">
    <div class="col-md-8 order-md-1">
        <h4 class="mb-3">Credenciais</h4>
        <form class="needs-validation" novalidate autocomplete="off">
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label for="username">Usuário</label>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fa fa-fw fa-user"></i></span>
                        </div>
                        <input type="text" class="form-control" id="username" placeholder="Usuário" required style="border-radius: 3px">
                        <div class="invalid-feedback" style="width: 100%;">
                            O Usuário é obrigatório
                        </div>
                    </div>
                </div>
                <div class="col-md-6 mb-3">
                    <label for="password">Senha</label>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fa fa-fw fa-eye-slash"></i></span>
                        </div>
                        <input type="password" class="form-control" id="password" placeholder="Senha" required style="border-radius: 3px">
                        <div class="invalid-feedback" style="width: 100%;">
                            A senha é obrigatória
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label for="host">Host</label>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fa fa-fw fa-link"></i></span>
                        </div>
                        <input type="text" class="form-control" id="host" placeholder="Host" required style="border-radius: 3px">
                        <div class="invalid-feedback" style="width: 100%;">
                            O Host é obrigatório
                        </div>
                    </div>
                </div>
                <div class="col-md-6 mb-3">
                    <label for="database">Banco</label>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fa fa-fw fa-server"></i></span>
                        </div>
                        <input type="text" class="form-control" id="database" placeholder="Banco" required style="border-radius: 3px">
                        <div class="invalid-feedback" style="width: 100%;">
                            O banco é obrigatório
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>