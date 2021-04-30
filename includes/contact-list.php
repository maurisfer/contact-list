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
    <section>
        <?php echo $mensagem?>
        <a href="/new-contact.php">
            <button class ="btn btn-success">Novo contato</button>
        </a>
    </section>
    <section>
        <table class="table bg-light mt-3">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nome</th>
                    <th>E-mail</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    $resultado='';
                    foreach ($contatos as $contato){
                        $resultado.='<tr>
                            <td>'.$contato->id.'</td>
                            <td>'.$contato->name.'</td>
                            <td>'.$contato->email.'</td>
                            <td>
                                <a href="new-adresses.php?id='.$contato->id.'">
                                    <button type="button" class="btn btn-primary well-sm"> Novo Endereço</button>
                                </a>
                                <a href="adresses.php?id='.$contato->id.'">
                                    <button type="button" class="btn btn-info well-sm">Ver Endereços</button>
                                </a>
                                <a href="uptd-contact.php?id='.$contato->id.'">
                                    <button type="button" class="btn btn-primary well-sm">Editar</button>
                                </a>
                                <a href="del-contact.php?id='.$contato->id.'">
                                    <button type="button" class="btn btn-danger well-sm">Excluir</button>
                                </a>
                            </td>
                         </tr>';
                    }
                    echo strlen($resultado)? $resultado: '<tr>
                                                                            <td colspan="4" class="text-center">
                                                                            Nenhum contato encontrado
                                                                            </td>
                                                                        </tr>';
                ?>
            </tbody>
        </table>
    </section>

</main>
