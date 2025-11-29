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
    require("../include/navbardeslogado.php");
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


    <script>
        document.addEventListener('DOMContentLoaded', function() {
    const isLoggedIn = false; 
    
    
    const loginModal = new bootstrap.Modal(document.getElementById('loginRequiredModal'));
    
    if (!isLoggedIn) {
        loginModal.show();
    }
    
    document.getElementById('calendar').addEventListener('click', function(e) {
        if (!isLoggedIn) {
            loginModal.show();
            e.preventDefault(); 
            e.stopPropagation(); 
        }
    });
    
    document.getElementById('sidebar').addEventListener('click', function(e) {
        if (!isLoggedIn) {
            loginModal.show();
            e.preventDefault();
            e.stopPropagation();
        }
    });
});

    </script>
    
   
       <?php
      require("../include/modallogindeslogado.php");
 require("../include/bibliotecajava.php");
   ?>

       
        
        <!-- FullCalendar JS -->
        <script src='https://cdn.jsdelivr.net/npm/fullcalendar@5.11.3/main.min.js'></script>
        <script src='https://cdn.jsdelivr.net/npm/fullcalendar@5.11.3/locales/pt-br.js'></script>

      
    
    </body>
</html>