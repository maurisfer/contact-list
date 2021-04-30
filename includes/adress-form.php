<main>
    <section>
        <a href="adresses.php">
            <button type="button" class ="btn btn-success">Voltar</button>
        </a>
    </section>
    <h2 class="mt-3"><?=TITLE?></h2>

    <form id ="adress-form" method="post">
        <?php
            TITLE=="Cadastrar Endereços"?$contatctID ='<div class="form-group">
            <input autocomplete="off" type="hidden" class ="id_contact" name="id_contact" value="'.$objContact->id.'">
                                                        </div>':$contatctID='';
        ?>
        <?php echo $contatctID?>
        <div class="form-group">
            <span class="mt-3 mb-3">Você está editando o endereço para: <?=$objContact->name?></span> <span>com o E-mail: <?=$objContact->email?></span>
        </div>
        <div class="form-group">
            <label for="zipcode">CEP</label>
            <input type="tel" maxlength="9" data-name="cep" class="form-control" name="zipcode" value="<?=$objCadastro->zipcode?>">
        </div>
        <div class="form-group">
            <label for="street">Rua</label>
            <input type="text" class="form-control" data-name="logradouro" name="street" value="<?=$objCadastro->street?>">
        </div>
        <div class="form-group">
            <label for="number">Número</label>
            <input type="text" class="form-control" data-name="numero" name="number" value="<?=$objCadastro->number?>">
        </div>
        <div class="form-group">
            <label for="district">Bairro</label>
            <input type="text" class="form-control" data-name="bairro" name="district" value="<?=$objCadastro->district?>">
        </div>
        <div class="form-group">
            <label for="city">Cidade</label>
            <input type="text" class="form-control" data-name="localidade" name="city" value="<?=$objCadastro->city?>">
        </div>
        <div class="form-group">
            <label for="state">Estado</label>
            <input type="text" class="form-control" data-name="uf" name="state" value="<?=$objCadastro->state?>">
        </div>

        <div class="form-group">
            <button type="submit" class="mt-3 btn btn-success"><?=BUTTON_TITLE?></button>
        </div>
    </form>
</main>
