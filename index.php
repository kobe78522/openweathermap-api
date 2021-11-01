<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link
      rel="stylesheet"
      href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"
      integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO"
      crossorigin="anonymous"
    />
    <script
      src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
      integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
      crossorigin="anonymous"
    ></script>
    <script
      src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"
      integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49"
      crossorigin="anonymous"
    ></script>
    <script
      src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"
      integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy"
      crossorigin="anonymous"
    ></script>
    <link rel="stylesheet" href="./style.css" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

    <title>簡易天氣站</title>
  </head>
  <body>
    <div class="jumbotron heroImage text-center">
      <div class="container">
        <h1 class="display-4 text-light mt-5">天氣現況報告</h1>
        <storng class="text-warning lead">提示:</storng>
        <p class="text-light">
         目前已知中文輸入能支援中國、日本跟台灣
        </p>
        <p class="text-light">部分城市中文的後綴要加"市"，如台南=>台南市</p>
        <form>
          <div class="form-group col-md-7 mx-auto">
            <input
              type="text"
              name="city"
              id="city"
              class="form-control"
              placeholder="請輸入您要查詢的城市，如:New York、Tokyo、台北..."
            />
          </div>
          <button
            id="findWeather"
            type="submit"
            name="submit"
            class="btn btn-warning btn-lg"
          >
            查 詢
          </button>
        </form>
        <div class="col-8 mx-auto mt-3">
          <div id="success" class="alert alert-success">查詢成功</div>
          <div id="fail" class="alert alert-danger">
            無法找到您查詢的城市，請重新輸入.
          </div>
          <div id="noCity" class="alert alert-danger">請輸入城市名稱!</div>
        </div>
      </div>
    </div>
<footer class="text-center text-light">本站資料來自於OpenWeatherMap所提供的api</footer>
    <script type="text/javascript">
      $("#findWeather").click(function (event) {
        event.preventDefault();
        $(".alert").hide();
        if ($("#city").val() !="") {
          $.get("scraper.php?city=" + $("#city").val(), function (data) {
            if (data == "") {
              $("#fail").fadeIn();
            } else {
              $("#success").html(data).fadeIn();
            }
          });
        } else {
          $("#noCity").fadeIn();
        }
      });
    </script>
  </body>
</html>
