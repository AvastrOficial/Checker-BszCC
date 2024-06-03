<!DOCTYPE html>
<head>
  <!-- Meta tags y otros enlaces -->
   <link rel="icon" type="image/png" href="https://files.catbox.moe/xy2fsl.png">
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>CHECKER CC - BSZ </title>
  <link href="style.css" rel="stylesheet">
</head>
<body>
  <div class="container">
    <div class="fs-3 fw-bold mb-5 text-uppercase mx-auto text-center text-light">Checker CC - BSZ </div>
    <form method="post" action="" role="form" id="form">
      <div class="box-body">
        <div class="box-content">
          <label for="cc" class="form-label fs-6 font-monospace badge bg-danger text-light">Maximo de tarjetas 1000 por chekeo</label>
          <div>
            <textarea class="form-control" rows="10" id="cc" name="cc" title="53012724539xxxxx|05|2022|653" placeholder="ejemplo : 53012724539xxxxx|05|2022|653" required></textarea>
          </div>
          <div class="button text-center mb-3 mt-3">
            <button type="submit" name="valid" class="btn btn-outline-success text-light">INICIA</button>
            <button type="button" id="stop" class="btn btn-outline-danger text-light" disabled>DETENER</button>
          </div>
        </div>
      </div>
      <div class="separator"></div>
      <center>
        <p><h3>SIGEME EN MIS REDES SOCIALES</h3></p>
   
      <div class="social-icons">
          <a href="https://github.com/AvastrOficial"><img src="https://th.bing.com/th/id/OIP.saZ1ZkS5sHDzRrd8GHUUAAHaHa?rs=1&pid=ImgDetMain" alt="GitHub"></a>
          <a href="https://t.me/+sOf-gqn6SClmNDcx"><img src="https://th.bing.com/th/id/OIP.uuUChCkOK3Kmx3wf_-NlCAHaHa?rs=1&pid=ImgDetMain" alt="Telegram"></a>
          <a href="https://www.projz.com/s/u/huoonaji2"><img src="https://wikiapk.com/wp-content/uploads/2020/09/930973_featured.png" alt="Otra Red Social"></a>
        </div>
         </center>

      <!-- Info success -->
      <div class="box-title">
        <h3 class="panel-title alert alert-primary font-monospace">TARJETAS QUE SIRVEN - <span class="badge bg-success live">0</span></h3>
      </div>
      <div class="box-body">
        <div class="box-content alert alert-success">
          <div class="panel-body success"></div>
        </div>
      </div>

      <!-- Info error -->
      <div class="box-title">
        <h3 class="panel-title alert alert-primary font-monospace">TARJETAS QUE NO SIRVEN - <span class="badge bg-danger die">0</span></h3>
      </div>
      <div class="box-body">
        <div class="box-content alert alert-danger">
          <div class="panel-body danger"></div>
        </div>
      </div>

      <!-- Info unknown -->
      <div class="box-title">
        <h3 class="panel-title alert alert-primary font-monospace">TARJETAS QUE SIRVEN PERO CON OTRA FECHA O PIN - <span class="badge bg-warning unknown">0</span></h3>
      </div>
      <div class="box-body">
        <div class="box-content alert alert-warning">
          <div class="panel-body warning"></div>
        </div>
      </div>
    </form>
    <label for="cc" class="form-label fs-6 font-monospace badge bg-danger text-light">Echo Por AvaStrOficial</label>
  </div>
</body>
  <script src="https://code.jquery.com/jquery-3.6.3.min.js"></script>
  <script type="text/javascript">
    $(document).ready(function () {
      $('#form').submit(function (e) {
        e.preventDefault();

        var cc = $('#cc').val().split('\n');
        var requestData = { cc: cc.join('\n') };

        $.ajax({
          type: 'POST',
          url: 'api.php',
          data: requestData,
          beforeSend: function () {
            $('.live').text('0');
            $('.die').text('0');
            $('.unknown').text('0');
            $('.success').empty();
            $('.danger').empty();
            $('.warning').empty();
          },
          success: function (response) {
            var data = JSON.parse(response);
            if (data.success) {
              $('.live').text(data.live.length);
              $('.die').text(data.die.length);
              $('.unknown').text(data.unknown.length);

              data.live.forEach(function (card) {
                $('.success').append(card + '<br>');
              });
              data.die.forEach(function (card) {
                $('.danger').append(card + '<br>');
              });
              data.unknown.forEach(function (card) {
                $('.warning').append(card + '<br>');
              });
            } else {
              alert('Error in processing');
            }
          },
          error: function (xhr) {
            alert('An error occurred: ' + xhr.status + ' ' + xhr.statusText);
          }
        });
      });
    });
  </script>
</body>
</html>
