<html>
<body>
<?php

$link = $_POST["name"];
$quantity = $_POST["quantity"];
$runs = $_POST["runs"];
$interval = $_POST["interval"];

class Api
{
    public $api_url = 'https://cyka.io/api/v2'; // API URL

    public $api_key = '535958c316bf4841d2663223aa0f0654'; // Your API key

    public function order($data) { // add order
        $post = array_merge(array('key' => $this->api_key, 'action' => 'add'), $data);
        $returnValue = json_decode($this->connect($post));
        echo "<pre>";
        print_r($returnValue);
        echo "</pre>";
    }

    private function connect($post) {
        $_post = Array();
        if (is_array($post)) {
            foreach ($post as $name => $value) {
                $_post[] = $name.'='.urlencode($value);
            }
        }

        $ch = curl_init($this->api_url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_HEADER, 0);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
        if (is_array($post)) {
            curl_setopt($ch, CURLOPT_POSTFIELDS, join('&', $_post));
        }
        curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/4.0 (compatible; MSIE 5.01; Windows NT 5.0)');
        $result = curl_exec($ch);
        if (curl_errno($ch) != 0 && empty($result)) {
            $result = false;
        }
        curl_close($ch);
        return $result;

    }
}

//  $LINKED = "https://www.instagram.com/p/".$link;

if (isset($_POST['likes'])) {
  //assume btnSubmit
  $api = new Api();
  $order = $api->order(array('service' => 152, 'link' => $link, 'quantity' => $quantity, 'runs' => $runs, 'interval' => $interval)); # Drip-feed
}
if (isset($_POST['viewss'])) {
  //assume btnSubmit
  $api = new Api();
  $order = $api->order(array('service' => 194, 'link' => $link, 'quantity' => $quantity, 'runs' => $runs, 'interval' => $interval)); # Drip-feed

}
?>
</br>
<form action="new.html">
    <button class="button">Go Back</button></br></br>
</form>
</body>
</html>
