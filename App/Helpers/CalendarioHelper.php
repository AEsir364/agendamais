<?php
namespace App\Helpers;

class CalendarioHelper
{
    public static function gerarCalendario($mes = null, $ano = null)
    {
        $mes = $mes ?? date('n');
        $ano = $ano ?? date('Y');

        $diasDaSemana = ['D', 'S', 'T', 'Q', 'Q', 'S', 'S'];
        $totalDias = cal_days_in_month(CAL_GREGORIAN, $mes, $ano);
        $primeiroDia = date('w', strtotime("$ano-$mes-01"));

        echo "<table>";
        echo "<thead><tr>";
        foreach ($diasDaSemana as $dia) {
            echo "<th>$dia</th>";
        }
        echo "</tr></thead><tbody><tr>";

        for ($i = 0; $i < $primeiroDia; $i++) {
            echo "<td></td>";
        }

        for ($dia = 1; $dia <= $totalDias; $dia++) {
            $diaAtual = ($dia == date('j') && $mes == date('n') && $ano == date('Y')) ? 'highlight' : '';
            echo "<td class='$diaAtual'>$dia</td>";
            if (($primeiroDia + $dia) % 7 == 0) {
                echo "</tr><tr>";
            }
        }

        while (($primeiroDia + $totalDias) % 7 != 0) {
            echo "<td></td>";
            $primeiroDia++;
        }

        echo "</tr></tbody></table>";
    }

    public static function exibirAtividades($atividades)
    {
        setlocale(LC_TIME, 'pt_BR.utf8', 'pt_BR', 'portuguese');

        $hoje = date('Y-m-d');
        $amanha = date('Y-m-d', strtotime('+1 day'));
        $ontem = date('Y-m-d', strtotime('-1 day'));
        $anteontem = date('Y-m-d', strtotime('-2 days'));

        foreach ($atividades as $data => $descricao) {
            $dataTimestamp = strtotime($data);
            $mesmoAno = date('Y', $dataTimestamp) == date('Y');
            $formato = $mesmoAno ? '%d de %B' : '%d de %B de %Y';
            $dataFormatada = ucfirst(strftime($formato, $dataTimestamp));

            [$materia, $atividade, $hora] = explode(' - ', $descricao);

            $rotulo = match(true) {
                $data == $hoje => 'Hoje',
                $data == $amanha => 'Amanhã',
                $data == $ontem => 'Ontem',
                $data == $anteontem => 'Anteontem',
                default => $dataFormatada,
            };

            echo "<div class='atividade'>
                <div class='rotulo'>$rotulo</div>
                <div class='detalhes'>
                    <div class='materia'>
                        <strong>$materia</strong>
                        <span>$atividade</span>
                    </div>
                    <div class='data'>
                        <strong>Data</strong>
                        <span>$dataFormatada</span>
                    </div>
                    <div class='hora'>
                        <strong>Hora</strong>
                        <span>$hora</span>
                    </div>
                </div>
            </div>";
        }
    }

    public static function exibirProximosDias($atividades)
    {
        $hoje = strtotime(date('Y-m-d'));
        $limite = strtotime('+30 days', $hoje);

        $html = '';
        foreach ($atividades as $data => $descricao) {
            $dataAtividade = strtotime($data);
        
            if ($dataAtividade > $hoje && $dataAtividade <= $limite) {
                $diasRestantes = (int)(($dataAtividade - $hoje) / 86400);

            $cor = match (true) {
                    $diasRestantes <= 3 => 'vermelho',
                    $diasRestantes <= 7 => 'laranja',
                    $diasRestantes <= 15 => 'verde',
                    $diasRestantes <= 30 => 'azul',
                    default => 'cinza'
                };

                $dataFormatada = ucfirst(strftime('%d de %B', $dataAtividade));
                [$materia, $atividade, $hora] = explode(' - ', $descricao);

                // Adiciona o atributo data-cor para facilitar a estilização
                $html .= "<li><span class='tag' data-cor='$cor'></span><strong>$materia</strong> - $atividade ($dataFormatada - $hora)</li>";
            }
        }
        echo $html;
    }
    public static function adicionarAtividade(&$atividades, $dados)
{
    $data = $dados['data'];
    $hora = $dados['hora'];
    $materia = $dados['materia'];
    $atividade = $dados['atividade'];

    // Cria o formato da descrição da atividade
    $descricao = "$materia - $atividade - $hora";

    // Adiciona a atividade no array de atividades
    $atividades[$data] = $descricao;

    // Retorna sucesso para exibição (ou pode salvar em banco/arquivo)
    return "Atividade adicionada com sucesso!";
}


}
