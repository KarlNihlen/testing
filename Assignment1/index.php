<html>
    <head>
      <title>Welcome</title>
    </head>
    <body>
      <div class="container">
          <h1>Enhörningar</h1>
          <form action="index.php" method="get">
            <div class="form-group">
              <label for="ID">ID på enhörning: </label>
              <input type="text" name="id" class="form-control" required/>
            </div>
            <div class="form-group">
              <input type="submit" value="Sök" class="btn btn-success"  />
            </div>
          </form>
          <form action="index.php">
            <div class="form-group">
              <input type="submit" value="Visa alla enhörningar" class="btn btn-success" />
            </div>
          </form>

      </div>
      <?php
      require("vendor/autoload.php");
      use Monolog\Logger;
      use Monolog\Handler\StreamHandler;
      use GuzzleHttp\Client;
      $log = new Logger('Assignment 1');
      $log->pushHandler(new StreamHandler('visit.log', Logger::INFO));

      $client = new Client(['headers' => ['Accept' => 'application/json']]);

      function GetUnicorn($idUnicorn, $client, $log)
      {
        $idUni = $idUnicorn;

        $res = $client->request('GET', 'http://unicorns.idioti.se/'.$idUni);
        $data = json_decode($res->getBody());
        echo "<h2>$data->name</h2>";
        echo "<p>{$data->spottedWhen->date}</p>";
        echo "<p><i>$data->description</i></p>";
        echo "<b>Rapporterad av: </b>"."$data->reportedBy";
        echo '<img src="' . $data->image . '" alt="error">';
        $log->info("Someone checked info about unicorn number:". $idUnicorn);
      }
        if(isset($_GET['id'])) {
          $Unicornid = $_GET['id'];
          GetUnicorn($Unicornid, $client, $log);
        } else {
          $res = $client->request('GET', 'http://unicorns.idioti.se/');
          $data = json_decode($res->getBody());
          for ($i=0; $i < count($data); $i++) {
            echo $data[$i]->id .": " . $data[$i]->name ." " . '<a href="index.php?id='. $data[$i]->id .'">Läs mer...</a>' . "<br/>";
          }
          $log->info("Someone checked info about all unicorns ;)");
        }
      ?>
</html>
