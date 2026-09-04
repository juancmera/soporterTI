(function () {
  const input = document.getElementById('busqueda');
  const tabla = document.getElementById('tablaTickets');
  if (!input || !tabla) return;

  // Devuelve un array para usar map
  const filas = Array.from(tabla.querySelectorAll('tbody tr'));
  
  const sinResultados = document.getElementById('sinResultados');
  const contador = document.getElementById('contadorResultados');
  const form = document.getElementById('formBusqueda');
  const limpiar = document.getElementById('limpiarBusqueda');

  // Quita tildes y transforma a minúsculas
  function normalizar(texto) {
    return texto
      .normalize('NFD')
      .replace(/[\u0300-\u036f]/g, '')
      .toLowerCase()
      .trim();
  }

  // Se indexa una sola vez, no en cada tecla
  const indice = filas.map(function (fila) {
    const celdas = fila.querySelectorAll('th, td');
    const texto = [
      celdas[0]?.textContent, // código
      celdas[1]?.textContent, // asunto
      celdas[2]?.textContent, // solicitante
      celdas[3]?.textContent  // tipo
    ].join(' ');

    return { fila: fila, texto: normalizar(texto) };
  });

  function filtrar() {
    const termino = normalizar(input.value);
    let visibles = 0;

    indice.forEach(function (item) {
      const coincide = termino === '' || item.texto.includes(termino);
      item.fila.hidden = !coincide;
      if (coincide) visibles++;
    });

    if (sinResultados) {
      sinResultados.classList.toggle('d-none', visibles > 0);
    }

    if (contador) {
      contador.textContent = termino === ''
        ? filas.length + ' tickets en total.'
        : visibles + ' de ' + filas.length + ' tickets coinciden.';
    }
  }

  input.addEventListener('input', filtrar);

  // El submit no recarga mientras no exista el servidor
  if (form) {
    form.addEventListener('submit', function (event) {
      event.preventDefault();
      filtrar();
    });
  }

  if (limpiar) {
    limpiar.addEventListener('click', function () {
      input.value = '';
      filtrar();
      input.focus();
    });
  }

  filtrar(); // estado inicial

})();