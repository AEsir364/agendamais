<?php include 'includes/main.php'; ?>

<link rel="stylesheet" href="<?= URL ?>/Public/css/pagina3.css">
<link rel="stylesheet" href="<?= URL ?>/Public/css/calendario5.css">

<div class="container">
  <div class="content">

    <!-- Dashboard -->
    <div class="dashboard">

      <!-- Agrupador Principal -->
      <div class="main-content">

        <!-- Div para o Calendário e Adicionar Atividade -->
        <div class="calendario-container">
          <!-- Calendário -->
          <div class="calendario">
            <?php
              use App\Helpers\CalendarioHelper;

              // Inicializa as atividades na sessão, se ainda não estiverem configuradas
              if (!isset($_SESSION['atividades'])) {
                $_SESSION['atividades'] = [
                  '2024-12-01' => 'Programação Web - Envio do Projeto e Apresentação - 23:59'
                ];
              }

              // Processa o formulário para adicionar uma nova atividade
              if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['adicionar_atividade'])) {
                $materia = htmlspecialchars($_POST['materia']);
                $atividade = htmlspecialchars($_POST['atividade']);
                $data = htmlspecialchars($_POST['data']);
                $hora = htmlspecialchars($_POST['hora']);

                $descricao = "$materia - $atividade - $hora";

                // Adiciona a nova atividade ao array na sessão
                $_SESSION['atividades'][$data] = $descricao;
              }

              // Obtém as atividades da sessão
              $atividades = $_SESSION['atividades'];

              // Gera o calendário
              CalendarioHelper::gerarCalendario();
            ?>
          </div>

          <!-- Formulário para adicionar atividades -->
          <div class="adicionar-atividade">
            <h4>Adicionar Atividade</h4>
            <form action="" method="POST">
              <label for="materia">Matéria:</label>
              <input type="text" id="materia" name="materia" required>

              <label for="atividade">Atividade:</label>
              <input type="text" id="atividade" name="atividade" required>

              <label for="data">Data:</label>
              <input type="date" id="data" name="data" required>

              <label for="hora">Hora:</label>
              <input type="time" id="hora" name="hora" required>

              <button type="submit" name="adicionar_atividade">Adicionar</button>
            </form>
          </div>
        </div>

        <!-- Div para Atividades Adicionadas -->
        <div class="atividades-lista">
          <h4>Atividades:</h4>
          <?php CalendarioHelper::exibirAtividades($atividades); ?>
        </div>

      </div>

      <!-- Nos Próximos Dias -->
      <div class="proximos-dias">
        <h2>Nos Próximos Dias:</h2>
        <ul>
          <?php App\Helpers\CalendarioHelper::exibirProximosDias($atividades); ?>
        </ul>
      </div>
    </div>
  </div>
</div>

<?php include 'includes/footer.php'; ?>