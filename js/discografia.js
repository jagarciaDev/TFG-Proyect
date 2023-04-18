function popup() {
    // Obtiene el ancho y la altura de la pantalla disponible
    var anchoPantalla = screen.availWidth;
    var altoPantalla = screen.availHeight;

    // Calcula la posición de la ventana emergente en el centro de la pantalla
    var leftPos = (anchoPantalla - 400) / 2;
    var topPos = (altoPantalla - 200) / 2;

    // Abre una ventana emergente en el centro de la pantalla
    var ventana = window.open('', '', 'width=600,height=270,left=' + leftPos + ',top=' + topPos);

    // Crea el contenido de la ventana emergente con dos botones y estilos CSS
    ventana.document.write(`
      <html>
        <head>
          <style>
          * {
          font-family: "Pathway Gothic One";
          font-size: 22px;
      }
            body {
              margin: 0;
              padding: 0;
              background-color: #f5f5f5;
              font-family: Arial, sans-serif;
            }
            .contenido {
              padding: 20px;
              text-align: center;
              background-color: #fff;
              border-radius: 5px;
              box-shadow: 0 0 10px rgba(0,0,0,0.5);
            }
            button {
              padding: 10px 20px;
              font-size: 16px;
              background-color: #0077cc;
              color: #fff;
              border: none;
              border-radius: 5px;
              cursor: pointer;
              transition: background-color 0.2s ease-in-out;
            }
            button:hover {
              background-color: #0066b3;
            }
          </style>
        </head>
        <body>
          <div class="contenido">
            <h1>Elige una opción:</h1>
            <button onclick="opcion1()">Opción 1</button>
            <button onclick="opcion2()">Opción 2</button>
          </div>
        </body>
        <script>
          // Define las funciones para cada opción
          function opcion1() {
            alert("Has elegido la opción 1");
            ventana.close();
          }
  
          function opcion2() {
            ventana.close();
            window.open('/index.php', '_blank');
          }
          
        </script>
      </html>
    `);
}
