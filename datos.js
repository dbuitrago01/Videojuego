
const cardTitle = document.querySelector(".card-title")
const cardText = document.querySelector(".card-text")
const card = document.querySelector(".card")


document.getElementById('mi-formulario').addEventListener('submit', async function(event) {

    event.preventDefault(); // evita que el formulario se envíe de forma convencional
  
    // se obtienen los valores de los campos del formulario
    var consoleValue = document.getElementById('console').value;
    var valorValue = document.getElementById('valor').value;
  
    // se definen los datos que serán enviados al servidor
    var data = {
      console: consoleValue,
      valor: valorValue
    };
    
  
    try {
      // Se realiza la petición POST al endpoint model.php para insertar las ventas
      const response = await fetch('model.php',{
        method: 'POST',
        body: JSON.stringify(data), // convierte los datos a formato JSON
        headers: {
          'Content-Type': 'application/json'
        }
      });
  
      if (response.ok) {
        const responseData = await response.json(); // convierte la respuesta a formato JSON
        card.style.display = "block";
        // if(responseData?.mensage) { 
          cardText.innerHTML = responseData.mensage
        // }
        cardTitle.innerHTML = responseData.ValorCobrarCliente

        // console.log('Datos recibidos:', responseData);
      } else {
        throw new Error('Error en la petición');
      }

    } catch (error) {
      console.error('Error en la petición:', error);
    }
  });

  
      // Obtiene el input donde se mostrará el total de descuentos en el formulario.
       const totalDescuentosInput = document.querySelector('#totalDescuentos');

    // Se Hace una petición GET al endpoint descuentos.php para obtener el total de descuentos.
      fetch('descuentos.php')
          .then(response => response.json())
          .then(data => {
              // Mostrar el total de descuentos en el input.
              totalDescuentosInput.value = data.total_descuentos;
          })
          .catch(error => {
              console.error('Error al obtener el total de descuentos:', error);
          });

