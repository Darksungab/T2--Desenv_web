// Função para buscar e listar os dados
async function listarRegistros() {
  try {
    const response = await fetch('/sua-api-endpoint', {
      method: 'GET', // ou 'POST' se necessário
      headers: {
        'Content-Type': 'application/json',
      }
    });
    
    const registros = await response.json();
    
    // Usando map para transformar cada registro em HTML
    const htmlRegistros = registros.map((item, index) => {
      return `
        <div class="registro-card" data-id="${item.id || index}">
          <h3>${item.nome}</h3>
          <div class="registro-info">
            <p><strong>Email:</strong> ${item.email}</p>
            <p><strong>Telefone:</strong> ${item.telefone}</p>
            <p><strong>Registro:</strong> ${item.registro}</p>
            <p><strong>Marca:</strong> ${item.marca}</p>
            <p><strong>Cor:</strong> ${item.cor}</p>
            <p><strong>Categoria:</strong> ${item.categoria}</p>
          </div>
        </div>
      `;
    }).join('');
    
    // Inserindo no DOM
    document.getElementById('lista-registros').innerHTML = htmlRegistros;
    
  } catch (error) {
    console.error('Erro ao carregar registros:', error);
  }
}

// Chamar a função quando a página carregar
document.addEventListener('DOMContentLoaded', listarRegistros);