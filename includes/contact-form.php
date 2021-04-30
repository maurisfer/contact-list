<main>
    <section>
        <a href="index.php">
            <button class ="btn btn-success">Voltar</button>
        </a>
    </section>
    <h2 class="mt-3"><?=TITLE?></h2>

    <form method="post">
        <div class="form-group">
            <label for="name">Nome</label>
            <input type="text" class="form-control" name="name" value="<?=isset($_GET['id'])?$objContact->name:""?>">
        </div>
        <div>
            <label for="email">E-mail</label>
            <input type="text" class="form-control" name="email" value="<?=isset($_GET['id'])?$objContact->email:''?>">
        </div>
        <div class="form-group">
            <button type="submit" class="mt-3 btn btn-success"><?=BUTTON_TITLE?></button>
        </div>
    </form>
</main>
