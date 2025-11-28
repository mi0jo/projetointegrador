<?php
session_start();
require("../include/conexao.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (!isset($_SESSION['user_id'])) {
        die("Usuário não está logado.");
    }

    $user_id     = $_SESSION['user_id']; 
    $data_inicio = $_POST['data_inicio'];
    $data_fim    = $_POST['data_fim'] ?? null;
    $fluxo       = $_POST['fluxo'] ?? null;
    $humor       = $_POST['humor'] ?? null;
    $remedios    = $_POST['remedios'] ?? null;

    $sql = "INSERT INTO calendario_menstrual 
            (user_id, data_inicio, data_fim, fluxo, humor, remedios) 
            VALUES (?, ?, ?, ?, ?, ?)";
    $stmt = $mysqli->prepare($sql);
    $stmt->bind_param("isssss", $user_id, $data_inicio, $data_fim, $fluxo, $humor, $remedios);

    if ($stmt->execute()) {
        header("Location: calendariologado.php?sucesso=1");
        exit();
    } else {
        echo "Erro: " . $stmt->error;
    }
}
?>

<!DOCTYPE html>
<html lang="pt-br">

    <head>
        <meta charset="utf-8">
        <title>BleedWithDignity - Calendário Menstrual</title>
        <meta content="width=device-width, initial-scale=1.0" name="viewport">
        <meta content="" name="keywords">
        <meta content="" name="description">
 <?php
   require("../include/referenciashead.php");
   ?>
       

        <!-- FullCalendar CSS -->
        <link href='https://cdn.jsdelivr.net/npm/fullcalendar@5.11.3/main.min.css' rel='stylesheet' />
        

    </head>

    <body>

    <?php
      require("../include/spinner.php");
       require("../include/navbarlogado.php");
             require("../include/botoesperfilpesquisa.php");
 require("../include/modalsearch.php");
        ?>


</div>
                </nav>
            </div>
        </div>
      


        
        <!-- Page Header Start -->
        <div class="container-fluid page-header py-5 wow fadeIn" data-wow-delay="0.1s">
            <div class="container text-center py-5">
                <h1 class="display-2 text-white mb-4">Calendário Menstrual</h1>
                
            </div>
        </div>
        <!-- Page Header End -->


        <!-- Calendário Menstrual Start -->
        <div class="container-fluid py-5">
            <div class="container">
                <div id="calendar-container">
                    <div id="calendar"></div>
                    
                    <!-- Formulário para registrar -->
                <form method="POST" class="mt-4">
                    <label>Data início:</label>
                    <input type="date" name="data_inicio" required class="form-control mb-2">

                    <label>Data fim:</label>
                    <input type="date" name="data_fim" class="form-control mb-2">

                    <label>Fluxo:</label>
                    <select name="fluxo" class="form-control mb-2">
                        <option value="leve">Leve</option>
                        <option value="moderado">Moderado</option>
                        <option value="intenso">Intenso</option>
                    </select>

                    <label>Humor:</label>
                    <input type="text" name="humor" class="form-control mb-2">

                    <label>Remédios:</label>
                    <input type="text" name="remedios" class="form-control mb-2">

                    <button type="submit" class="btn btn-primary">Salvar</button>
                </form>
            </div>
        </div>
    </div>

                  
          
        <!-- Calendário Menstrual End -->

         <?php
      require("../include/copyright.php");
   ?>

        <!-- Back to Top -->
        <a href="#" class="btn btn-primary border-3 border-primary rounded-circle back-to-top"><i class="fa fa-arrow-up"></i></a>   

        <!-- JavaScript Libraries -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
        <script src="../lib/wow/wow.min.js"></script>
        <script src="../lib/easing/easing.min.js"></script>
        <script src="../lib/waypoints/waypoints.min.js"></script>
        <script src="../lib/lightbox/js/lightbox.min.js"></script>
        <script src="../lib/owlcarousel/owl.carousel.min.js"></script>
        
        <!-- FullCalendar JS -->
        <script src='https://cdn.jsdelivr.net/npm/fullcalendar@5.11.3/main.min.js'></script>
        <script src='https://cdn.jsdelivr.net/npm/fullcalendar@5.11.3/locales/pt-br.js'></script>

        <!-- Template Javascript -->
        <script src="../js/logado.js"></script>

        <script>    
        document.addEventListener('DOMContentLoaded', function () {
    var calendarEl = document.getElementById('calendar');
    var calendar = new FullCalendar.Calendar(calendarEl, {
        locale: 'pt-br',
        events: 'eventos.php',

        eventClick: function(info) {
            if (confirm("Deseja excluir este registro?")) {
                $.ajax({
                    url: 'excluir.php',
                    type: 'POST',
                    data: { id: info.event.id },
                    success: function(response) {
                        if (response.success) {
                            alert("Registro excluído com sucesso!");
                            info.event.remove(); // remove do calendário sem reload
                        } else {
                            alert("Erro ao excluir: " + response.error);
                        }
                    },
                    error: function() {
                        alert("Erro na comunicação com o servidor.");
                    }
                });
            }
        }
    });
    calendar.render();
});

     </script>
    
    </body>
</html>