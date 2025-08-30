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
        },
        dateClick: function(info) {
            selectedDate = info.dateStr;
            alert('Data selecionada: ' + info.dateStr + '\nAgora você pode registrar informações para este dia.');
        },
        eventClick: function(info) {
            alert('Evento: ' + info.event.title);
        }
    });
    
    calendar.render();
     window.addEventListener('load', function () {
        const spinner = document.getElementById('spinner');
        if (spinner) {
            spinner.classList.remove('show');
        }
    });
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

            
