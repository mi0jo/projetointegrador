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
                    
                    
                    <div id="sidebar">
                        <h4 class="text-center mb-4">Registros Diários</h4>
                        
                        <!-- Fluxo Menstrual -->
                        <div class="icon-btn" onclick="toggleDropdown('fluxo-dropdown')">
                            <i class="fas fa-tint"></i>
                            <span>Fluxo Menstrual</span>
                        </div>
                        <div id="fluxo-dropdown" class="dropdown-content">
                            <p>Selecione a intensidade:</p>
                            <div class="text-center">
                                <span class="blood-drop" onclick="selectBloodDrop(1)">💧</span>
                                <span class="blood-drop" onclick="selectBloodDrop(2)">💧</span>
                                <span class="blood-drop" onclick="selectBloodDrop(3)">💧</span>
                                <span class="blood-drop" onclick="selectBloodDrop(4)">💧</span>
                                <span class="blood-drop" onclick="selectBloodDrop(5)">💧</span>
                            </div>
                        </div>
                        
                        <!-- Remédios -->
                        <div class="icon-btn" onclick="toggleDropdown('remedios-dropdown')">
                            <i class="fas fa-pills"></i>
                            <span>Remédios</span>
                        </div>
                        <div id="remedios-dropdown" class="dropdown-content">
                            <p>Registrar medicamento:</p>
                            <input type="text" class="form-control mb-2" placeholder="Nome do remédio">
                            <button class="btn btn-sm btn-primary">Adicionar</button>
                        </div>
                        
                        <!-- Sintomas -->
                        <div class="icon-btn" onclick="toggleDropdown('sintomas-dropdown')">
                            <i class="fas fa-thermometer-half"></i>
                            <span>Sintomas</span>
                        </div>
                        <div id="sintomas-dropdown" class="dropdown-content">
                            <p>Selecione os sintomas:</p>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="cramps">
                                <label class="form-check-label" for="cramps">Cólicas</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="headache">
                                <label class="form-check-label" for="headache">Dor de cabeça</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="backache">
                                <label class="form-check-label" for="backache">Dor nas costas</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="nausea">
                                <label class="form-check-label" for="nausea">Náusea</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="fatigue">
                                <label class="form-check-label" for="fatigue">Fadiga</label>
                            </div>
                        </div>
                        
                        <!-- Humor -->
                        <div class="icon-btn" onclick="toggleDropdown('humor-dropdown')">
                            <i class="fas fa-smile"></i>
                            <span>Humor</span>
                        </div>
                        <div id="humor-dropdown" class="dropdown-content">
                            <p>Como você está se sentindo?</p>
                            <div class="text-center">
                                <span class="emoji-option" onclick="selectEmoji('😊')">😊</span>
                                <span class="emoji-option" onclick="selectEmoji('😢')">😢</span>
                                <span class="emoji-option" onclick="selectEmoji('😡')">😡</span>
                                <span class="emoji-option" onclick="selectEmoji('😴')">😴</span>
                                <span class="emoji-option" onclick="selectEmoji('😌')">😌</span>
                                <span class="emoji-option" onclick="selectEmoji('😐')">😐</span>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- Legenda -->
                <div class="legend">
                    <div class="legend-item">
                        <div class="legend-color period-color"></div>
                        <span>Período Menstrual</span>
                    </div>
                    <div class="legend-item">
                        <div class="legend-color fertility-color"></div>
                        <span>Janela da Fertilidade</span>
                    </div>
                    <div class="legend-item">
                        <div class="legend-color ovulation-color"></div>
                        <span>Dia da Ovulação</span>
                    </div>
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
        
    
    </body>
</html>