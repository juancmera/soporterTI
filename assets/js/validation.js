/*Validación formulario*/
(function () {

  const form = document.getElementById('formTicket');
  console.log('form:', form);
  if (!form) return;
  console.log('campo nombre:', form.elements['nombre']);
console.log('div error:', document.getElementById('error-nombre'));
  // ---- Reglas de validación por campo ----
  const rules = {
    nombre: [
      { test: v => v.trim() !== '',            msg: 'Ingresa el nombre completo.' },
      { test: v => v.trim().length >= 5,       msg: 'El nombre debe tener al menos 5 caracteres.' },
      { test: v => /^[A-Za-zÁÉÍÓÚÑáéíóúñ\s]+$/.test(v.trim()),
                                               msg: 'El nombre solo admite letras y espacios.' }
    ],
    correo: [
      { test: v => v.trim() !== '',            msg: 'Ingresa el correo electrónico.' },
      { test: v => /^[^\s@]+@[^\s@]+\.[^\s@]{2,}$/.test(v.trim()),
                                               msg: 'El formato del correo no es válido.' }
    ],
    extension: [
      { test: v => v.trim() !== '',            msg: 'Ingresa la extensión telefónica.' },
      { test: v => /^\d+$/.test(v.trim()),     msg: 'La extensión solo admite dígitos.' },
      { test: v => /^\d{3,4}$/.test(v.trim()), msg: 'La extensión debe tener 3 o 4 dígitos.' }
    ],
    area: [
      { test: v => v !== '',                   msg: 'Selecciona un área o dependencia.' }
    ],
    tipo_incidencia: [
      { test: v => v !== '',                   msg: 'Selecciona el tipo de incidencia.' }
    ],
    prioridad: [
      { test: v => v !== '',                   msg: 'Selecciona la prioridad.' }
    ],
    asunto: [
      { test: v => v.trim() !== '',            msg: 'Ingresa el asunto.' },
      { test: v => v.trim().length >= 15,       msg: 'El asunto debe tener al menos 15 caracteres.' },
    ],
    descripcion: [
      { test: v => v.trim() !== '',            msg: 'Describe el problema.' },
      { test: v => v.trim().length >= 20,      msg: 'La descripción debe tener al menos 20 caracteres.' },
      { test: v => v.trim().length <= 500,     msg: 'La descripción no puede superar los 500 caracteres.' }
    ]
  };

  // ---- Validar un campo: devuelve true o false ----
  function validateField(name) {
    const field = form.elements[name];
    const feedback = document.getElementById('error-' + name);
    if (!field) return true;

    for (const rule of rules[name]) {
      if (!rule.test(field.value)) {
        field.classList.remove('is-valid');
        field.classList.add('is-invalid');
        if (feedback) feedback.textContent = rule.msg;
        return false;
      }
    }

    field.classList.remove('is-invalid');
    field.classList.add('is-valid');
    if (feedback) feedback.textContent = '';
    return true;
  }

  // ---- Validar todo el formulario ----
  function validateForm() {
    let firstInvalid = null;

    for (const name in rules) {
      if (!validateField(name) && !firstInvalid) {
        firstInvalid = form.elements[name];
      }
    }

    return firstInvalid;
  }

  // ---- Envío ----
  form.addEventListener('submit', function (event) {
    const firstInvalid = validateForm();

    if (firstInvalid) {
      event.preventDefault();
      firstInvalid.focus();
      firstInvalid.scrollIntoView({ behavior: 'smooth', block: 'center' });
    }
  });

  // ---- Validación mientras el usuario escribe ----
  for (const name in rules) {
    const field = form.elements[name];
    if (!field) continue;

    // Al salir del campo se valida por primera vez
    field.addEventListener('blur', () => validateField(name));

    // Una vez marcado, se revalida en cada cambio para que el error desaparezca solo
    field.addEventListener('input', function () {
      if (field.classList.contains('is-invalid')) validateField(name);
    });

    if (field.tagName === 'SELECT') {
      field.addEventListener('change', () => validateField(name));
    }
  }

  // ---- Contador de caracteres ----
  const descripcion = form.elements['descripcion'];
  const contador = document.getElementById('contador');

  if (descripcion && contador) {
    const updateCount = () => contador.textContent = descripcion.value.length;
    descripcion.addEventListener('input', updateCount);
    updateCount(); // valor inicial si el campo llega con datos
  }

  // ---- Solo dígitos en la extensión ----
  const extension = form.elements['extension'];
  if (extension) {
    extension.addEventListener('input', function () {
      this.value = this.value.replace(/\D/g, '').slice(0, 4);
    });
  }

})();