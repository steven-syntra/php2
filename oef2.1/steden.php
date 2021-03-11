<?php
error_reporting( E_ALL );
ini_set( 'display_errors', 1 );

require_once "lib/autoload.php";

PrintHead();
PrintJumbo( $title = "Leuke plekken in Europa" ,
                        $subtitle = "Tips voor citytrips voor vrolijke vakantiegangers!" );
PrintNavbar();
?>

<div class="container">
    <div class="row">


<?php
    //toon messages als er zijn
    $container->getMessageService()->ShowErrors();
    $container->getMessageService()->ShowInfos();

    //export button
    $output ="";
    $output .= "<a style='margin-left: 10px' class='btn btn-info' role='button' href='export/export_images.php'>Export CSV</a>";
    $output .= "<div><br></div>";

    //get data
    $data = $container->getDBManager()->GetData( "select * from images" );

    //get template
    $template = file_get_contents("templates/column.html");

    //get weather
    $data_count = 0;
    foreach( $data as $row )
    {
        $url = 'http://api.openweathermap.org/data/2.5/weather?q=' .
                        $row["img_weather_location"] .
                        '&units=metric&lang=nl&APPID=e97bd757a9b4c619b67d39814366db46';

        $restClient = new RESTClient( $authentication = null );

        $restClient->CurlInit($url);
        $response = json_decode($restClient->CurlExec());

        $weer_omschr = $response->weather[0]->description;
        $weer_temp = round( $response->main->temp, 0);
        $weer_vochtigheid = $response->main->humidity;

        $data[$data_count]['weer_omschr'] = $weer_omschr;
        $data[$data_count]['weer_temp'] = $weer_temp;
        $data[$data_count]['weer_vochtigheid'] = $weer_vochtigheid;
        $data_count++;
    }

    //merge
    $output .= MergeViewWithData( $template, $data );
    print $output;
?>

    </div>
</div>

</body>
</html>