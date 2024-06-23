// script.js
document.addEventListener('DOMContentLoaded', () => {
    const sintomasContainer = document.getElementById('sintomasContainer');
    const addSintomaBtn = document.getElementById('addSintomaBtn');
    const factoresContainer = document.getElementById('factoresContainer');
    const addFactorBtn = document.getElementById('addFactorBtn');
    const antecedentesContainer = document.getElementById('antecedentesContainer');
    const addAntecedenteBtn = document.getElementById('addAntecedenteBtn');
    const historialContainer = document.getElementById('historialContainer');
    const addHistorialBtn = document.getElementById('addHistorialBtn');
    const maxSintomas = 8;

    const updateRemoveButtons = (container) => {
        const removeButtons = container.querySelectorAll('.removeItemBtn');
        removeButtons.forEach(btn => {
            btn.disabled = removeButtons.length <= 1;
        });
    };

    const createSelectElement = (name, options, container) => {
        const itemContainer = document.createElement('div');
        itemContainer.classList.add('item-container');

        const select = document.createElement('select');
        select.name = name;
        select.classList.add('item-select');
        select.required = true;

        const defaultOption = document.createElement('option');
        defaultOption.value = '';
        defaultOption.textContent = 'Selecciona una opción';
        select.appendChild(defaultOption);

        options.forEach(optionText => {
            const option = document.createElement('option');
            option.value = optionText.toLowerCase().replace(/ /g, '_');
            option.textContent = optionText;
            select.appendChild(option);
        });

        const removeBtn = document.createElement('button');
        removeBtn.type = 'button';
        removeBtn.textContent = 'Eliminar';
        removeBtn.classList.add('removeItemBtn');
        removeBtn.disabled = container.querySelectorAll('.item-container').length < 2;

        removeBtn.addEventListener('click', () => {
            itemContainer.remove();
            const currentItems = container.querySelectorAll('.item-container').length;
            if (currentItems < maxSintomas) {
                document.getElementById(`add${name.charAt(0).toUpperCase() + name.slice(1)}Btn`).disabled = false;
            }
            updateRemoveButtons(container);
        });

        itemContainer.appendChild(select);
        itemContainer.appendChild(removeBtn);
        container.appendChild(itemContainer);
        updateRemoveButtons(container);
    };

    const addSintomaSelect = () => {
        const sintomas = [
            'Dolor de cabeza', 'Mareos', 'Náuseas', 'Vómitos', 'Visión borrosa',
            'Pérdida de audición', 'Zumbido en los oídos', 'Debilidad muscular', 'Entumecimiento',
            'Hormigueo', 'Falta de aliento', 'Tos', 'Fiebre', 'Escalofríos', 'Dolor de garganta',
            'Dolor abdominal', 'Diarrea', 'Estreñimiento', 'Dolor muscular', 'Dolor articular',
            'Hinchazón', 'Fatiga', 'Insomnio', 'Ansiedad', 'Depresión', 'Confusión', 
            'Pérdida de memoria', 'Cambios de apetito', 'Cambios de peso',
            'Dolor torácico', 'Palpitaciones', 'Erupciones cutáneas', 'Picazón', 
            'Sangrado anormal', 'Dolor pélvico', 'Problemas menstruales'
        ];
        createSelectElement('sintomas[]', sintomas, sintomasContainer);
    };

    const addFactorSelect = () => {
        const factores = [
            'Estrés', 'Falta de sueño', 'Ciertos alimentos o bebidas', 'Exposición a sustancias químicas o tóxicas',
            'Cambios de clima o temperatura', 'Actividad física agotadora', 'Ciertos movimientos o posturas', 
            'Ruido excesivo', 'Luces brillantes', 'Situaciones emocionales intensas'
        ];
        createSelectElement('factores[]', factores, factoresContainer);
    };

    const addAntecedenteSelect = () => {
        const antecedentes = [
            'Hipertensión arterial', 'Diabetes', 'Enfermedades cardíacas', 'Accidentes cerebrovasculares',
            'Migrañas', 'Epilepsia', 'Asma', 'Alergias', 'Cáncer', 'Enfermedades autoinmunes',
            'Trastornos gastrointestinales', 'Enfermedades renales', 'Enfermedades hepáticas', 
            'Trastornos de la tiroides', 'Enfermedades de la piel', 'Depresión y ansiedad'
        ];
        createSelectElement('antecedentes[]', antecedentes, antecedentesContainer);
    };

   

    addSintomaBtn.addEventListener('click', () => {
        const currentSintomas = sintomasContainer.querySelectorAll('.item-container').length;
        if (currentSintomas < maxSintomas) {
            addSintomaSelect();
        }
        if (currentSintomas + 1 === maxSintomas) {
            addSintomaBtn.disabled = true;
        }
    });

    addFactorBtn.addEventListener('click', () => {
        const currentFactores = factoresContainer.querySelectorAll('.item-container').length;
        if (currentFactores < maxSintomas) {
            addFactorSelect();
        }
        if (currentFactores + 1 === maxSintomas) {
            addFactorBtn.disabled = true;
        }
    });

    addAntecedenteBtn.addEventListener('click', () => {
        const currentAntecedentes = antecedentesContainer.querySelectorAll('.item-container').length;
        if (currentAntecedentes < maxSintomas) {
            addAntecedenteSelect();
        }
        if (currentAntecedentes + 1 === maxSintomas) {
            addAntecedenteBtn.disabled = true;
        }
    });

    

    // Initial elements
    addSintomaSelect();
    addFactorSelect();
    addAntecedenteSelect();
    addHistorialSelect();
});
