<?php

namespace App\Controllers;

use Core\Controller;
use Core\Database;

class AgendaController extends Controller
{
  public function agendamento(){
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $equipamento = $_POST['equipamento'];
        $ambiente = $_POST['ambiente'];
        $data = $_POST['data'];
        $horario = $_POST['horario'];
        $usuario = $_POST['usuario'];
        $db = Database::connect();

        try {
            // Verifica se já existe um agendamento com o mesmo equipamento/ambiente/data/horário
            $query = "SELECT * FROM agendamentos 
                      WHERE equipamento = :equipamento 
                      AND ambiente = :ambiente 
                      AND data = :data 
                      AND horario = :horario";
            $stmt = $db->prepare($query);
            $stmt->execute([
                ':equipamento' => $equipamento,
                ':ambiente' => $ambiente,
                ':data' => $data,
                ':horario' => $horario,
            ]);

            if ($stmt->rowCount() > 0) {
                echo "Erro: O equipamento já está agendado para esse horário!";
            } else {
                // Insere o novo agendamento
                $query = "INSERT INTO agendamentos (equipamento, ambiente, data, horario, usuario) 
                          VALUES (:equipamento, :ambiente, :data, :horario, :usuario)";
                $stmt = $db->prepare($query);
                $stmt->execute([
                    ':equipamento' => $equipamento,
                    ':ambiente' => $ambiente,
                    ':data' => $data,
                    ':horario' => $horario,
                    ':usuario' => $usuario,
                ]);
                echo "Agendamento realizado com sucesso!";
            }
        } catch (PDOException $e) {
            echo "Erro: " . $e->getMessage();
        }
    }
    $this->view('home/index');
  }

  public function listar(){
    $db = Database::connect();
    try {
        // Consulta para buscar todos os agendamentos
        $query = "SELECT * FROM agendamentos ORDER BY data, horario";
        $stmt = $db->prepare($query);
        $stmt->execute();

        $agendamentos = $stmt->fetchAll();
    } catch (PDOException $e) {
        die("Erro ao buscar agendamentos: " . $e->getMessage());
    }
    $this->view('list/index');
  }
}