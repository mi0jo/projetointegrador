<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="utf-8">
        <title>BleedWithDignity</title>
        <meta content="width=device-width, initial-scale=1.0" name="viewport">
        <meta content="" name="keywords">
        <meta content="" name="description">
 <?php
   require("../include/referenciashead.php");
   ?>
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

     
        <!-- Navbar End -->


        <!-- Modal Search Start -->
        <div class="modal fade" id="searchModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-fullscreen">
                <div class="modal-content rounded-0">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Insira uma palavra-chave</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body d-flex align-items-center">
                        <div class="input-group w-75 mx-auto d-flex">
                            <input type="search" class="form-control p-3" placeholder="keywords" aria-describedby="search-icon-1">
                            <span id="search-icon-1" class="input-group-text p-3"><i class="fa fa-search"></i></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Modal Search End -->


        <!-- Hero Start -->
        <div class="container-fluid py-5 hero-header wow fadeIn" data-wow-delay="0.1s">
            <div class="container py-5">
                <div class="row g-5">
                    <div class="col-lg-7 col-md-12">
                        <h1 class="mb-3 text-primary">Encontre aqui informações seguras e gratuitas sobre:</h1>
                        <h1 class=" display-1 text-white">Dignidade Menstrual,</h1>
                         <h1 class="mb-5 display-1 text-white">Saúde Sexual e Reprodutiva</h1>
                        
                    </div>
                </div>
            </div>
        </div>
        <!-- Hero End -->


        <!-- About Start -->
        <div class="container-fluid py-5 about bg-light">
            <div class="container py-5">
                <div class="row g-5 align-items-center">
                    <div class="col-lg-5 wow fadeIn" data-wow-delay="0.1s">
                        <div class="col-md-20">
                                <img src="../img/logo.png" alt="logo" >
                            </div>
                    </div>
                    <div class="col-lg-7 wow fadeIn" data-wow-delay="0.3s">
                        <h4 class="text-primary mb-4 border-bottom border-primary border-2 d-inline-block p-2 title-border-radius">Sobre nós</h4>
                        <h1 class="text-dark mb-4 display-5">Nós temos o objetivo de disseminar informações confiáveis sobre dignidade menstrual!</h1>
                        <p class="text-dark mb-7">BleedWithDignity é uma plataforma dedicada a promover educação menstrual, saúde sexual e direitos reprodutivos de forma acessível, inclusiva e sem tabus. Nosso objetivo é combater a pobreza menstrual, oferecendo informações seguras, apoio e recursos para que todas as pessoas possam vivenciar sua menstruação com dignidade, saúde e confiança.

Acreditamos que conhecimento é poder, e por isso disponibilizamos conteúdos sobre:
                        </p>
                        <div class="row mb-4">
                            <div class="col-lg-6">
                                <h6 class="mb-3"><i class="fas fa-check-circle me-2"></i>Dignidade menstrual</h6>
                                <h6 class="mb-3"><i class="fas fa-check-circle me-2 text-primary"></i>Produtos menstruais sustentáveis</h6>
                                <h6 class="mb-3"><i class="fas fa-check-circle me-2 text-secondary"></i>Ciclo menstrual e saúde íntima</h6>
                             <h6 class="mb-3"><i class="fas fa-check-circle me-2 text-secondary"></i>Combate à pobreza menstrual</h6>
                            </div>
                           
                        
                </div>
            </div>
        </div>
        <!-- About End -->       

       <div class="container-fluid blog py-5">
    <div class="container py-5">
        <div class="mx-auto text-center wow fadeIn" data-wow-delay="0.1s" style="max-width: 600px;">
            <h4 class="text-primary mb-4 border-bottom border-primary border-2 d-inline-block p-2 title-border-radius">Últimas publicações</h4>
            <h1 class="mb-5 display-3">Leia as nossas últimas publicações</h1>
        </div>
        <div class="row g-5 justify-content-center">
            <!-- Card 1 -->
            <div class="col-md-6 col-lg-6 col-xl-4 wow fadeIn" data-wow-delay="0.1s">
                <div class="blog-item rounded-bottom h-100 d-flex flex-column"> 
                    <div class="blog-img overflow-hidden position-relative img-border-radius" style="height: 200px;"> 
                        <img src="../img/dignidade menstrual.jpg" class="img-fluid w-100 h-100 object-fit-cover" alt="Image"> 
                    </div>
                    <div class="d-flex justify-content-between px-4 py-3 bg-light border-bottom border-primary blog-date-comments"></div>
                    <div class="blog-content d-flex align-items-center px-4 py-3 bg-light"></div>
                    <div class="px-4 pb-4 bg-light rounded-bottom flex-grow-1 d-flex flex-column"> 
                        <div class="blog-text-inner mb-3"> 
                            <a href="../logado/dignidadelogado.php" class="h4">O que é dignidade menstrual?</a>
                            <p class="mt-3 mb-4">Descubra o que é dignidade menstrual e os conceitos envolvendo esse tópico.</p>
                        </div>
                        <div class="text-center mt-auto"> 
                            <a href="../logado/dignidadelogado.php" class="btn btn-primary text-white px-4 py-2 mb-3 btn-border-radius">Saiba mais</a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Card 2 -->
            <div class="col-md-6 col-lg-6 col-xl-4 wow fadeIn" data-wow-delay="0.3s">
                <div class="blog-item rounded-bottom h-100 d-flex flex-column">
                    <div class="blog-img overflow-hidden position-relative img-border-radius" style="height: 200px;">
                        <img src="../img/fases-do-ciclo-menstrual.webp" class="img-fluid w-100 h-100 object-fit-cover" alt="Image">
                    </div>
                    <div class="d-flex justify-content-between px-4 py-3 bg-light border-bottom border-primary blog-date-comments"></div>
                    <div class="blog-content d-flex align-items-center px-4 py-3 bg-light"></div>
                    <div class="px-4 pb-4 bg-light rounded-bottom flex-grow-1 d-flex flex-column">
                        <div class="blog-text-inner mb-3">
                            <a href="../logado/ciclomenstruallogado.php" class="h4">Ciclo menstrual</a>
                            <p class="mt-3 mb-4">Descubra tudo sobre as etapas que o ciclo menstrual possue.</p>
                        </div>
                        <div class="text-center mt-auto">
                            <a href="../logado/ciclomenstruallogado.php" class="btn btn-primary text-white px-4 py-2 mb-3 btn-border-radius">Saiba mais</a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Card 3 -->
            <div class="col-md-6 col-lg-6 col-xl-4 wow fadeIn" data-wow-delay="0.5s">
                <div class="blog-item rounded-bottom h-100 d-flex flex-column">
                    <div class="blog-img overflow-hidden position-relative img-border-radius" style="height: 200px;">
                        <img src="../img/produtosmenstruais.avif" class="img-fluid w-100 h-100 object-fit-cover" alt="Image">
                    </div>
                    <div class="d-flex justify-content-between px-4 py-3 bg-light border-bottom border-primary blog-date-comments"></div>
                    <div class="blog-content d-flex align-items-center px-4 py-3 bg-light"></div>
                    <div class="px-4 pb-4 bg-light rounded-bottom flex-grow-1 d-flex flex-column">
                        <div class="blog-text-inner mb-3">
                            <a href="../logado/produtoslogado.php" class="h4">Produtos Menstruais para todos</a>
                            <p class="mt-3 mb-4">Descubra os programas do governo que envolvem produtos menstruais para pessoas de baixa renda.</p>
                        </div>
                        <div class="text-center mt-auto">
                            <a href="../logado/produtoslogado.php" class="btn btn-primary text-white px-4 py-2 mb-3 btn-border-radius">Saiba mais</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

  <?php
      require("../include/copyright.php");
 require("../include/bibliotecajava.php");
   ?>

    </body>

</html>