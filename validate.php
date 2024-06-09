<?php
class Validate
{
  public function checkEmpty($data) 
  {
    $message = null;
    foreach ($data as $key => $value) {
      if (empty($value)) {
        $message .= "<p>$key field is empty</p>";
      }
    }
    return $message;
  }

  public function validEmail($email) 
  {
    if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
      return true;
    }
    return false;
  }
}
?>
