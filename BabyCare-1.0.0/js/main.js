(function ($) {
    "use strict";

    // Spinner
    var spinner = function () {
        setTimeout(function () {
            if ($('#spinner').length > 0) {
                $('#spinner').removeClass('show');
            }
        }, 1);
    };
    spinner(0);
    
    
    // Initiate the wowjs
    new WOW().init();
    
    
   // Back to top button
   $(window).scroll(function () {
    if ($(this).scrollTop() > 300) {
        $('.back-to-top').fadeIn('slow');
    } else {
        $('.back-to-top').fadeOut('slow');
    }
    });
    $('.back-to-top').click(function () {
        $('html, body').animate({scrollTop: 0}, 1500, 'easeInOutExpo');
        return false;
    });


    // Testimonial carousel

    $(".testimonial-carousel").owlCarousel({
        autoplay: true,
        smartSpeed: 1500,
        center: true,
        dots: true,
        loop: true,
        margin: 50,
        responsiveClass: true,
        responsive: {
            0:{
                items:1
            },
            576:{
                items:1
            },
            768:{
                items:2
            },
            992:{
                items:2
            },
            1200:{
                items:3
            }
        }
    });


    // Modal Video
    $(document).ready(function () {
        var $videoSrc;
        $('.btn-play').click(function () {
            $videoSrc = $(this).data("src");
        });
        console.log($videoSrc);

        $('#videoModal').on('shown.bs.modal', function (e) {
            $("#video").attr('src', $videoSrc + "?autoplay=1&amp;modestbranding=1&amp;showinfo=0");
        })

        $('#videoModal').on('hide.bs.modal', function (e) {
            $("#video").attr('src', $videoSrc);
        })
    });



})(jQuery);

//dignidade menstrual
  $(document).ready(function() {
            
            $('.like-btn').click(function(e) {
                e.preventDefault();
                $(this).toggleClass('active');
                let countText = $(this).text();
                let count = parseInt(countText.match(/\((\d+)\)/)[1]);
                
                if ($(this).hasClass('active')) {
                    $(this).html('<i class="fas fa-heart me-1"></i> Curtir (' + (count + 1) + ')');
                } else {
                    $(this).html('<i class="fas fa-heart me-1"></i> Curtir (' + (count - 1) + ')');
                }
            });
            
            
            $('.reply-btn').click(function(e) {
                e.preventDefault();
                let commentBox = $(this).closest('.comment').find('.comment').first();
                
                if (commentBox.length === 0) {
                
                    $(this).closest('.comment-actions').after(`
                        <div class="comment mt-3 ms-4">
                            <form class="reply-form">
                                <div class="mb-3">
                                    <textarea class="form-control" rows="2" placeholder="Escreva sua resposta..." required></textarea>
                                </div>
                                <button type="submit" class="btn btn-primary btn-sm">Enviar</button>
                                <button type="button" class="btn btn-outline-secondary btn-sm cancel-reply">Cancelar</button>
                            </form>
                        </div>
                    `);
                }
            });
            
            // Cancelar comentário
            $(document).on('click', '.cancel-reply', function() {
                $(this).closest('.comment').remove();
            });
            
            // Novo comentário
            $('#add-comment').submit(function(e) {
                e.preventDefault();
                let commentText = $(this).find('textarea').val();
                
                if (commentText.trim() !== '') {
                    let newComment = `
                        <div class="comment">
                            <div class="d-flex">
                                <img src="https://randomuser.me/api/portraits/women/${Math.floor(Math.random() * 100)}.jpg" alt="User" class="user-avatar">
                                <div>
                                    <h5 class="mb-1">Você</h5>
                                    <p class="text-muted small mb-2">Agora</p>
                                    <p>${commentText}</p>
                                    
                                    <div class="comment-actions">
                                        <span class="action-btn like-btn"><i class="fas fa-heart me-1"></i> Curtir (0)</span>
                                        <span class="action-btn reply-btn"><i class="fas fa-reply me-1"></i> Responder</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    `;
                    
                    $('.comment-form').before(newComment);
                    $(this).find('textarea').val('');
                }
            });
            
            // Comentar
            $(document).on('submit', '.reply-form', function(e) {
                e.preventDefault();
                let replyText = $(this).find('textarea').val();
                
                if (replyText.trim() !== '') {
                    let newReply = `
                        <div class="d-flex">
                            <img src="https://randomuser.me/api/portraits/women/${Math.floor(Math.random() * 100)}.jpg" alt="User" class="user-avatar" style="width: 40px; height: 40px;">
                            <div>
                                <h5 class="mb-1">Você</h5>
                                <p class="text-muted small mb-2">Agora</p>
                                <p>${replyText}</p>
                                
                                <div class="comment-actions">
                                    <span class="action-btn like-btn"><i class="fas fa-heart me-1"></i> Curtir (0)</span>
                                    <span class="action-btn reply-btn"><i class="fas fa-reply me-1"></i> Responder</span>
                                </div>
                            </div>
                        </div>
                    `;
                    
                    $(this).closest('.comment').html(newReply);
                }
            });
        });
 //calendário

         let selectedDate = null;
            let selectedBloodDrop = 0;
            let selectedEmoji = '';
            
            document.addEventListener('DOMContentLoaded', function() {
                var calendarEl = document.getElementById('calendar');
                
                var calendar = new FullCalendar.Calendar(calendarEl, {
                    initialView: 'dayGridMonth',
                    locale: 'pt-br',
                    headerToolbar: {
                        left: 'prev,next today',
                        center: 'title',
                        right: 'dayGridMonth,timeGridWeek,timeGridDay'
                    }
                   
                });

                
                calendar.render();
            });
            
            // Funções para os ícones interativos
            function toggleDropdown(id) {
                const dropdown = document.getElementById(id);
                if (dropdown.style.display === 'block') {
                    dropdown.style.display = 'none';
                } else {
                    // Fecha todos os dropdowns antes de abrir o selecionado
                    document.querySelectorAll('.dropdown-content').forEach(d => {
                        d.style.display = 'none';
                    });
                    dropdown.style.display = 'block';
                }
            }
            
           
            
            function selectEmoji(emoji) {
                // Remove a seleção anterior
                document.querySelectorAll('.emoji-option').forEach(opt => {
                    opt.classList.remove('selected');
                });
                
                // Adiciona a seleção atual
                event.target.classList.add('selected');
                selectedEmoji = emoji;
                
                // Mostra feedback visual
                alert('Humor registrado como ' + emoji + ' para o dia ' + (selectedDate || 'selecione uma data'));
            }
            
            // Fecha os dropdowns ao clicar fora
            window.onclick = function(event) {
                if (!event.target.matches('.icon-btn')) {
                    document.querySelectorAll('.dropdown-content').forEach(dropdown => {
                        dropdown.style.display = 'none';
                    });
                }
            }
            

            //fórum
             $(document).ready(function() {
            // Toggle comments section
            $('.comment-btn').click(function(e) {
                e.preventDefault();
                $(this).closest('.forum-post').find('.comments-section').slideToggle();
            });
            
            // botão de like
            $('.like-btn').click(function(e) {
                e.preventDefault();
                $(this).toggleClass('active');
                let countElement = $(this).find('span');
                let currentCount = parseInt(countElement.text());
                if ($(this).hasClass('active')) {
                    countElement.text(currentCount + 1);
                } else {
                    countElement.text(currentCount - 1);
                }
            });
            
            // botão salvar
            $('.save-btn').click(function(e) {
                e.preventDefault();
                $(this).toggleClass('active');
                if ($(this).hasClass('active')) {
                    $(this).html('<i class="fas fa-bookmark me-1"></i> Salvo');
                } else {
                    $(this).html('<i class="fas fa-bookmark me-1"></i> Salvar');
                }
            });
            
            
           
            
            // Comentários
            $('.comment-form').submit(function(e) {
                e.preventDefault();
                let commentText = $(this).find('input').val();
                if (commentText.trim() !== '') {
                    let newComment = `
                        <div class="comment">
                            <div class="d-flex">
                                <img src="https://randomuser.me/api/portraits/women/${Math.floor(Math.random() * 100)}.jpg" alt="User" class="user-avatar me-3" style="width: 40px; height: 40px;">
                                <div>
                                    <strong>Você</strong>
                                    <p class="small text-muted mb-1">Agora</p>
                                    <p>${commentText}</p>
                                </div>
                            </div>
                        </div>
                    `;
                    $(this).closest('.comments-section').find('.comment-form').before(newComment);
                    $(this).find('input').val('');
                    
                    // update na quantidade de comentários
                    let commentCountElement = $(this).closest('.forum-post').find('.comment-btn span');
                    let currentCount = parseInt(commentCountElement.text());
                    commentCountElement.text(currentCount + 1);
                }
            });
        });



        
 $(document).ready(function() {
        // botão de like
        $('.like-btn').click(function(e) {
            e.preventDefault();
            $(this).toggleClass('active');
            let countText = $(this).text();
            let count = parseInt(countText.match(/\((\d+)\)/)[1]);
            
            if ($(this).hasClass('active')) {
                $(this).html('<i class="fas fa-heart me-1"></i> Curtir (' + (count + 1) + ')');
            } else {
                $(this).html('<i class="fas fa-heart me-1"></i> Curtir (' + (count - 1) + ')');
            }
        });
        
        // botão de responder
        $('.reply-btn').click(function(e) {
            e.preventDefault();
            let commentBox = $(this).closest('.comment').find('.comment').first();
            
            if (commentBox.length === 0) {
                $(this).closest('.comment-actions').after(`
                    <div class="comment mt-3 ms-4">
                        <form class="reply-form">
                            <div class="mb-3">
                                <textarea class="form-control" rows="2" placeholder="Escreva sua resposta..." required></textarea>
                            </div>
                            <button type="submit" class="btn btn-primary btn-sm">Enviar</button>
                            <button type="button" class="btn btn-outline-secondary btn-sm cancel-reply">Cancelar</button>
                        </form>
                    </div>
                `);
            }
        });
        
        // Cancelar resposta
        $(document).on('click', '.cancel-reply', function() {
            $(this).closest('.comment').remove();
        });
        
        // novo comentário
        $('#add-comment').submit(function(e) {
            e.preventDefault();
            let commentText = $(this).find('textarea').val();
            
            if (commentText.trim() !== '') {
              
                
                let imagePath = 'img/chuuu.jpg';
               
                let newComment = `
                    <div class="comment">
                        <div class="d-flex">
                            <img src="${imagePath}" alt="User" class="user-avatar" 
                                 style="width:40px;height:40px;border-radius:50%;object-fit:cover;display:block;">
                            <div>
                                <h5 class="mb-1">Você</h5>
                                <p class="text-muted small mb-2">Agora</p>
                                <p>${commentText}</p>
                                
                                <div class="comment-actions">
                                    <span class="action-btn like-btn"><i class="fas fa-heart me-1"></i> Curtir (0)</span>
                                    <span class="action-btn reply-btn"><i class="fas fa-reply me-1"></i> Responder</span>
                                </div>
                            </div>
                        </div>
                    </div>
                `;
                
                $('.comment-form').before(newComment);
                $(this).find('textarea').val('');
            }
        });
        
        // resposta
        $(document).on('submit', '.reply-form', function(e) {
            e.preventDefault();
            let replyText = $(this).find('textarea').val();
            
            if (replyText.trim() !== '') {
                let imagePath = window.location.origin + '/img/chuuu.jpg';
                
                let newReply = `
                    <div class="d-flex">
                        <img src="${imagePath}" alt="User" 
                             style="width:40px;height:40px;border-radius:50%;object-fit:cover;display:block;">
                        <div>
                            <h5 class="mb-1">Você</h5>
                            <p class="text-muted small mb-2">Agora</p>
                            <p>${replyText}</p>
                            
                            <div class="comment-actions">
                                <span class="action-btn like-btn"><i class="fas fa-heart me-1"></i> Curtir (0)</span>
                                <span class="action-btn reply-btn"><i class="fas fa-reply me-1"></i> Responder</span>
                            </div>
                        </div>
                    </div>
                `;
                
                $(this).closest('.comment').html(newReply);
            }
        });
    });
        



//calendário menstrual não logado 

function showLoginMessage() {
    document.getElementById('login-message').style.display = 'block';
}

function closeLoginMessage() {
    document.getElementById('login-message').style.display = 'none';
}

$(document).ready(function() {
    $('#calendar').fullCalendar({
        dayClick: function(date, jsEvent, view) {
            showLoginMessage();
        },
        eventClick: function(calEvent, jsEvent, view) {
            showLoginMessage();
        },
        events: [
            { title: 'Evento 1', start: '2025-07-10' },
            { title: 'Evento 2', start: '2025-07-15' }
        ]
    });
});

