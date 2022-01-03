<?php
  if (!isset($_POST['e'])) {
    http_response_code(404);
    header("Location: https://zanderp25.com/error/?e=404");
    die();
  }
  $e = $_POST['e'];
  $string = $e." - Unknown Error";
  $info = "The server encountered an unexpected condition which prevented it from fulfilling your request.";
  
  if ($e === "401") {
    $string = "401 - Unauthorized";
    $info = "You are not authorized to access this page.";
  } else if ($e === "403") {
    $string = "403 - Forbidden";
    $info = "You don't have permission to access this page.";
  } else if ($e === "404") {
    $string = "404 - Not Found";
    $info = "The requested URL was not found on this server.";
  } else if ($e === "410") {
    $string = "410 - Gone";
    $info = "The requested URL is no longer available on this server.";
  } else if ($e === "414") {
    $string = "414 - Request-URI Too Long";
    $info = "The request URI is too long.";
  } else if ($e === "420") {
    $string = "420 - Enhance Your Calm";
    $info = "The request was well-formed but was unable to be followed due to semantic errors.";
  } else if ($e === "497") {
    $string = "497 - HTTP Request Sent to HTTPS Port";
    $info = "The request was sent to a port on a server that requires the use of SSL.";
  } else if ($e === "500") {
    $string = "500 - Internal Server Error";
    $info = "The server encountered an unexpected condition which prevented it from fulfilling your request.";
  } else if ($e === "501") {
    $string = "501 - Not Implemented";
    $info = "The server does not support the functionality required to fulfill your request.";
  } else if ($e === "502") {
    $string = "502 - Bad Gateway";
    $info = "The server, while acting as a gateway or proxy, received an invalid response from the upstream server it accessed in attempting to fulfill your request.";
  } else if ($e === "503") {
    $string = "503 - Service Unavailable";
    $info = "The server is currently unable to handle the request due to a temporary overloading or maintenance of the server.";
  } else if ($e === "504") {
    $string = "504 - Gateway Timeout";
    $info = "The server, while acting as a gateway or proxy, did not receive a timely response from the upstream server specified by the URI (e.g. HTTP, FTP, LDAP) or some other auxiliary server (e.g. DNS) it needed to access in attempting to complete the request.";
  } else if ($e === "507") {
    $string = "507 - Insufficient Storage";
    $info = "The server does not have enough space to store the resource.";
  } else if ($e === "509") {
    $string = "509 - Bandwidth Limit Exceeded";
    $info = "The server terminated an operation because it encountered an infinite loop while processing.";
  }
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="../index.css">
    <meta name="theme-color" content="#ED7D3A" media="(prefers-color-scheme: light)">
    <meta name="theme-color" content="#666666" media="(prefers-color-scheme: dark)">
    <title><?php echo $string?></title>
  </head>
  <body>
    <div id="navbar" class="navbar">
      <a href="/">
        <div class="logo">
          <img src="../ico/safari-pinned-tab.svg" alt="Zanderp25">
        </div>
      </a>
      <input type="checkbox" id="menu-button"/>
      <div class="navbar-links">
        <a href="/#about">About</a>
        <a href="/#projects">Projects</a>
        <a href="/index/">Downloads</a>
        <a href="https://youtu.be/dQw4w9WgXcQ">こんにちは</a>
      </div>
    </div>
    <div class="content">
      <img src="img/<?php echo $code; ?>.png" alt="Error <?php echo $code; ?>" style="display:block;width:auto;margin:20vw;">
      <h2><?php echo $string; ?></h2>
      <p><?php echo $info; ?></p>
      <a href="#" onclick="window.history.back();" class="button">Go Back</a>
    </div>
    <footer>&copy; Zanderp25</footer>
  </body>
</html>
