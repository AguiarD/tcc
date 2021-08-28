<?php 
  if(isset($_GET['editarLancamento'])){
    $editarId = $_GET['editarLancamento'];

    $consultaLancamento = "SELECT l.idLancamento, if(c.tipoConta='R', 'Receita', 'Despesa') Tipo, l.valor, c.conta, j.descJogador, l.obsLancamento, 
    DATE_FORMAT(l.dtPrevisao, '%d-%m-%Y') as 'Previsão', 
    DATE_FORMAT(l.dtBaixa, '%d-%m-%Y') as 'Data Baixa' 
    from lancamento l
    left join conta c 
    on l.idConta = c.idConta
    left join jogador j
    on l.idJogador = j.idJogador
    where idLancamento = '$editarId'";
    $executarLancamento = mysqli_query($conn, $consultaLancamento);

    $filaLancamento = mysql_fetch_array($executarLancamento);

    $conta = $filaLancamento['conta'];
    $jogador = $filaLancamento['descJogador'];
    $valor = $filaLancamento['valor'];
    $observacao = $filaLancamento['obsLancamento'];
    $dataPrevisao = $filaLancamento['dtPrevisao'];
    $dataBaixa = $filaLancamento['dtBaixa'];

  }
?>

<br/>

<div>
  <form method="POST" action="">
    <div class="form-group">
      <label>Conta</label>
      <input type="text" name="conta" class="form-control" value="<?php echo $conta; ?>"><br/>
    </div>
    <div class="form-group">
      <label>Jogador</label>
      <input type="text" name="jogador" class="form-control" value="<?php echo $jogador; ?>"><br/>
    </div>
    <div class="form-group">
      <label>Valor</label>
      <input type="int" name="valor" class="form-control" value="<?php echo $valor; ?>"><br/>
    </div>
    <div class="form-group">
      <label>Observação</label>
      <input type="text" name="observacao" class="form-control" value="<?php echo $observacao; ?>"><br/>
    </div>
    <div class="form-group">
      <label>Previsão</label>
      <input type="date" name="previsao" class="form-control" value="<?php echo $dataPrevisao; ?>"><br/>
    </div>
    <div class="form-group">
      <label>Baixa</label>
      <input type="date" name="baixa" class="form-control" value="<?php echo $dataBaixa; ?>"><br/>
    </div>
    <div class="form-group">
      <input type="submit" name="atualizar" class="muda btn btn-info" value="ATUALIZAR"><br/>
    </div>
  </form>

  <nav>
    <a class="muda btn btn-info" href="tarefas.php" onclick="">Voltar</a>
  </nav>

</div>

<?php 
  if (isset($_POST['atualizar'])) {
    $atualizarConta = $_POST['conta'];
    $atualizarjogador = $_POST['jogador'];
    $atualizarValor = $_POST['valor'];
    $atualizarObservacao = $_POST['observacao'];
    $atualizarPrevisao = $_POST['previsao'];
    $atualizarBaixa = $_POST['baixa'];
  }

  // $consulta = 
?>