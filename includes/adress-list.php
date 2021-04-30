<?php
$mensagem = '';
if(isset($_GET['status'])) {
    switch ($_GET['status']) {
        case 'success':
            $mensagem = '<div class="alert alert-success">Ação executada com sucesso</div>';
            break;
        case 'error':
            $mensagem = '<div class="alert alert-danger">Ação com erro</div>';
            break;
    }
}
?>
<main>
    <?php echo $mensagem?>
    <section>
        <a href="/index.php">
            <button type ="button" class ="btn btn-success">Voltar</button>
        </a>
    </section>
    <section>
        <table class="table bg-light mt-3">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>CEP</th>
                    <th>Rua</th>
                    <th>Número</th>
                    <th>Bairro</th>
                    <th>Cidade</th>
                    <th>Estado</th>

                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    $resultado='';
                    foreach ($adresses as $adress){
                        $resultado.='<tr>
                            <td>'.$adress->id.'</td>
                            <td>'.$adress->zipcode.'</td>
                            <td>'.$adress->street.'</td>
                            <td>'.$adress->number.'</td>
                            <td>'.$adress->district.'</td>
                            <td>'.$adress->city.'</td>
                            <td>'.$adress->state.'</td>

                            <td>
                                <a href="uptd-adress.php?id='.$adress->id.'">
                                    <button type="button" class="btn btn-primary well-sm">Editar</button>
                                </a>
                                <a href="del-adress.php?id='.$adress->id.'">
                                    <button type="button" class="btn btn-info well-sm">Excluir</button>
                                </a>
                            </td>
                         </tr>';
                    }
                echo strlen($resultado)? $resultado: '<tr>
                                                                            <td colspan="8" class="text-center">
                                                                            Nenhum contato encontrado
                                                                            </td>
                                                                        </tr>';
                ?>
            </tbody>
        </table>
    </section>
</main>
