<html>
<body>
<?php
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

    public function status($order_id) { // get order status
        $returnValue = json_decode($this->connect(array(
            'key' => $this->api_key,
            'action' => 'status',
            'order' => $order_id
        )));
        echo "<pre>";
        print_r($returnValue);
        echo "</pre>";
    }

    public function multiStatus($order_ids) { // get order status
        return json_decode($this->connect(array(
            'key' => $this->api_key,
            'action' => 'status',
            'orders' => implode(",", (array)$order_ids)
        )));
    }

    public function services() { // get services
        $returnValue = json_decode($this->connect(array(
            'key' => $this->api_key,
            'action' => 'services',
        )));
    }

    public function balance() { // get balance
        $returnValue = json_decode($this->connect(array(
            'key' => $this->api_key,
            'action' => 'balance',
        )));
      //  echo $returnValue;
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

if (isset($_POST['Likes'])) {
  $link = $_POST["name"];
  $quantity = $_POST["quantity"];
  $runs = $_POST["runs"];
  $interval = $_POST["interval"];
  $LINKED = "https://www.instagram.com/p/".$link;
  $api = new Api();
  $order = $api->order(array('service' => 152, 'link' => $LINKED, 'quantity' => $quantity, 'runs' => $runs, 'interval' => $interval)); # Drip-feed

}
if (isset($_POST['Rita1'])) {
  //assume btnSubmit
  $access_token = "589580119.20490ac.de21525979c347ab8eed327422f0106d";
  $photo_count = 1;
  $json_link = "https://api.instagram.com/v1/users/self/media/recent/?";
  $json_link .="access_token={$access_token}&count={$photo_count}";
  $json = file_get_contents($json_link);
  $obj = json_decode(preg_replace('/("\w+"):(\d+)/', '\\1:"\\2"', $json), true);
  foreach ($obj['data'] as $post){
      $pic_text = $post['caption']['text'];
      $pic_link = $post['link'];
      $pic_like_count = $post['likes']['count'];
      $pic_comment_count=$post['comments']['count'];
      $pic_src=str_replace("http://", "https://", $post['images']['standard_resolution']['url']);
      $pic_created_time=date("F j, Y", $post['caption']['created_time']);
      $pic_created_time=date("F j, Y", strtotime($pic_created_time . " +1 days"));

  }
  $api = new Api();
  $newlink = $pic_link;
  $order = $api->order(array('service' => 152, 'link' => $newlink, 'quantity' => 250, 'runs' => 10, 'interval' => 10)); # Drip-feed
  $order = $api->order(array('service' => 206, 'link' => $newlink, 'comments' => "Im in love with you.\nDammmmmmmnnnn\nWow, you look beautiful\nYour charm is irresistible!!\nBeauty is just a word, you justify better.\nHow do you be at your best every day?"));

}
if (isset($_POST['Rita2'])) {
  //assume btnSubmit
  $access_token = "589580119.20490ac.de21525979c347ab8eed327422f0106d";
  $photo_count = 1;
  $json_link = "https://api.instagram.com/v1/users/self/media/recent/?";
  $json_link .="access_token={$access_token}&count={$photo_count}";
  $json = file_get_contents($json_link);
  $obj = json_decode(preg_replace('/("\w+"):(\d+)/', '\\1:"\\2"', $json), true);
  foreach ($obj['data'] as $post){
      $pic_text = $post['caption']['text'];
      $pic_link = $post['link'];
      $pic_like_count = $post['likes']['count'];
      $pic_comment_count=$post['comments']['count'];
      $pic_src=str_replace("http://", "https://", $post['images']['standard_resolution']['url']);
      $pic_created_time=date("F j, Y", $post['caption']['created_time']);
      $pic_created_time=date("F j, Y", strtotime($pic_created_time . " +1 days"));

  }
  $api = new Api();
  $newlink = $pic_link;
  $order = $api->order(array('service' => 166, 'link' => $newlink, 'quantity' => 250, 'runs' => 20, 'interval' => 10)); # Drip-feed
  $order = $api->order(array('service' => 178, 'link' => $newlink, 'quantity' => 6));

}
if (isset($_POST['Rita3'])) {
  //assume btnSubmit
  $access_token = "589580119.20490ac.de21525979c347ab8eed327422f0106d";
  $photo_count = 1;
  $json_link = "https://api.instagram.com/v1/users/self/media/recent/?";
  $json_link .="access_token={$access_token}&count={$photo_count}";
  $json = file_get_contents($json_link);
  $obj = json_decode(preg_replace('/("\w+"):(\d+)/', '\\1:"\\2"', $json), true);
  foreach ($obj['data'] as $post){
      $pic_text = $post['caption']['text'];
      $pic_link = $post['link'];
      $pic_like_count = $post['likes']['count'];
      $pic_comment_count=$post['comments']['count'];
      $pic_src=str_replace("http://", "https://", $post['images']['standard_resolution']['url']);
      $pic_created_time=date("F j, Y", $post['caption']['created_time']);
      $pic_created_time=date("F j, Y", strtotime($pic_created_time . " +1 days"));

  }
  $api = new Api();
  $newlink = $pic_link;
  $order = $api->order(array('service' => 194, 'link' => $newlink, 'quantity' => 250, 'runs' => 34, 'interval' => 10)); # Drip-feed
  $order = $api->order(array('service' => 178, 'link' => $newlink, 'quantity' => 6));

}
if (isset($_POST['elsa'])) {
  //assume btnSubmit
  $access_token = "269012521.78461c8.974a795e430a49e4b01ee2a5764ae409";
  $photo_count = 1;
  $json_link = "https://api.instagram.com/v1/users/self/media/recent/?";
  $json_link .="access_token={$access_token}&count={$photo_count}";
  $json = file_get_contents($json_link);
  $obj = json_decode(preg_replace('/("\w+"):(\d+)/', '\\1:"\\2"', $json), true);
  foreach ($obj['data'] as $post){
      $pic_text = $post['caption']['text'];
      $pic_link = $post['link'];
      $pic_like_count = $post['likes']['count'];
      $pic_comment_count=$post['comments']['count'];
      $pic_src=str_replace("http://", "https://", $post['images']['standard_resolution']['url']);
      $pic_created_time=date("F j, Y", $post['caption']['created_time']);
      $pic_created_time=date("F j, Y", strtotime($pic_created_time . " +1 days"));

  }
  $api = new Api();
  $newlink = $pic_link;
  $order = $api->order(array('service' => 152, 'link' => $newlink, 'quantity' => 100, 'runs' => 20, 'interval' => 13)); # Drip-feed

}
if (isset($_POST['candid'])) {
  //assume btnSubmit
  $access_token = "337788938.90ad6d0.4cd2161576654a819921b7c95bb11498";
  $photo_count = 1;
  $json_link = "https://api.instagram.com/v1/users/self/media/recent/?";
  $json_link .="access_token={$access_token}&count={$photo_count}";
  $json = file_get_contents($json_link);
  $obj = json_decode(preg_replace('/("\w+"):(\d+)/', '\\1:"\\2"', $json), true);
  foreach ($obj['data'] as $post){
      $pic_text = $post['caption']['text'];
      $pic_link = $post['link'];
      $pic_like_count = $post['likes']['count'];
      $pic_comment_count=$post['comments']['count'];
      $pic_src=str_replace("http://", "https://", $post['images']['standard_resolution']['url']);
      $pic_created_time=date("F j, Y", $post['caption']['created_time']);
      $pic_created_time=date("F j, Y", strtotime($pic_created_time . " +1 days"));

  }
  $api = new Api();
  $newlink = $pic_link;
  $order = $api->order(array('service' => 152, 'link' => $newlink, 'quantity' => 100, 'runs' => 5, 'interval' => 30)); # Drip-feed

}
if (isset($_POST['TheFattouch'])) {
  //assume btnSubmit
  $access_token = "7980050870.43c2393.951408d8bb7c4e10a3b0fae367eb83f8";
  $photo_count = 1;
  $json_link = "https://api.instagram.com/v1/users/self/media/recent/?";
  $json_link .="access_token={$access_token}&count={$photo_count}";
  $json = file_get_contents($json_link);
  $obj = json_decode(preg_replace('/("\w+"):(\d+)/', '\\1:"\\2"', $json), true);
  foreach ($obj['data'] as $post){
      $pic_text = $post['caption']['text'];
      $pic_link = $post['link'];
      $pic_like_count = $post['likes']['count'];
      $pic_comment_count=$post['comments']['count'];
      $pic_src=str_replace("http://", "https://", $post['images']['standard_resolution']['url']);
      $pic_created_time=date("F j, Y", $post['caption']['created_time']);
      $pic_created_time=date("F j, Y", strtotime($pic_created_time . " +1 days"));

  }
  $api = new Api();
  $newlink = $pic_link;
  $order = $api->order(array('service' => 152, 'link' => $newlink, 'quantity' => 125, 'runs' => 1, 'interval' => 30)); # Drip-feed

}
//$order = $api->order(array('service' => 206, 'link' => $LINKED, 'comments' => "Im in love with you.\nIm in love with you.\nIm in love with you.\nIm in love with you.\nIm in love with you"));
//$order = $api->order(array('service' => 152, 'link' => $LINKED, 'quantity' => $quantity, 'runs' => $runs, 'interval' => $interval)); # Drip-feed
//$order = $api->status();
?>
</br>
<form action="new.html">
    <button class="button">Go Back</button></br></br>
</form>
</body>
</html>
