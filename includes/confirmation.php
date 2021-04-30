<main>
    <h2 class="mt-3"><?=TITLE?></h2>

    <form method="post">

        <div class="form-group">
            <?PHP TITLE=="Deletar Contato"?
                $confirmar='<p> Você deseja realmente excluir o contato <strong>'.$objContact->name.'</strong></p>'
                :$confirmar='<p> Você deseja realmente excluir este endereço?</p>'
            ?>
            <?php echo $confirmar?>
        </div>

        <div class="form-group">
            <a href="/index.php">
                <button type="button" class ="btn btn-success">Cancelar</button>
            </a>
            <button type="submit" name ="excluir" class="btn btn-danger">Excluir</button>
        </div>
    </form>
</main>
