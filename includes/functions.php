<?php

/* configuration values */

define('APP_BASE', '/PROG/GIT/cikkphp/');

function test($data)
{
  print '<pre>';
  print_r($data);
  print '</pre>';
}

function connection()
{
  return mysqli_connect('localhost', 'root', '', 'cikk');
}

function getMenu()
{
  return '<div class="nav_bar">
    <nav>
        <a href="' . APP_BASE . '' . "kezdolap" . '" class="item">Kezdőlap</a>
        <a href="' . APP_BASE . '' . "kulfold" . '" class="item">Külföld</a>
        <a href="#">
            <h2 id="main_text">Morning News</h2>
        </a>
        <a href="' . APP_BASE . '' . "gazdasag" . '" class="item">Gazdaság</a>
        <a href="' . APP_BASE . '' . "tudomany" . '" class="item">Tudomány</a>
    </nav>
</div>';
}

function parseUrl($url)
{
  return str_replace(APP_BASE, '/', $url);
}

function homepage($connection)
{
  $out = '<div class="container">
  <div class="content">';

  $sql = mysqli_query($connection,  "select * from content");

  while ($cikk = mysqli_fetch_assoc($sql)) {

    $out .= '<div class="articles" id="cikk_' . $cikk["id"] . '">
          <h4 class="category">' . $cikk["category"] . '</h4>
          <a href="#cikk_' . $cikk["id"] . '"><h2 class="title">' . $cikk["title"] . '</h2></a>
          <h4 class="author">Szerző: ' . $cikk["author"] . '</h4>
          <div class="preview_div"><h3 class="preview">' . $cikk["preview"] . '</h3></div>
          <div class="content_container">
              <p>' . $cikk["content_text"] . '</p>
              <a class="close" href="#">Bezárás</a>
          </div>
      </div>';
  }

  $out .= '</div>
</div>';

  return $out;
}


function kulfold($connection)
{
  $out = '<div class="container">
  <div class="content">';

  $sql = mysqli_query($connection,  "select * from content");

  while ($cikk = mysqli_fetch_assoc($sql)) {

    if (isset($cikk["category"]) && $cikk["category"] == "Külföld") {

      $out .= '<div class="articles" id="cikk_' . $cikk["id"] . '">
      <h4 class="category">' . $cikk["category"] . '</h4>
      <a href="#cikk_' . $cikk["id"] . '"><h2 class="title">' . $cikk["title"] . '</h2></a>
      <h4 class="author">Szerző: ' . $cikk["author"] . '</h4>
      <div class="preview_div"><h3 class="preview">' . $cikk["preview"] . '</h3></div>
      <div class="content_container">
          <p>' . $cikk["content_text"] . '</p>
          <a class="close" href="#">Bezárás</a>
      </div>
  </div>';
    }
  }

  $out .= '</div>
</div>';

  return $out;
}

function gazdasag($connection)
{
  $out = '<div class="container">
  <div class="content">';

  $sql = mysqli_query($connection,  "select * from content");

  while ($cikk = mysqli_fetch_assoc($sql)) {

    if (isset($cikk["category"]) && $cikk["category"] == "Gazdaság") {

      $out .= '<div class="articles" id="cikk_' . $cikk["id"] . '">
      <h4 class="category">' . $cikk["category"] . '</h4>
      <a href="#cikk_' . $cikk["id"] . '"><h2 class="title">' . $cikk["title"] . '</h2></a>
      <h4 class="author">Szerző: ' . $cikk["author"] . '</h4>
      <div class="preview_div"><h3 class="preview">' . $cikk["preview"] . '</h3></div>
      <div class="content_container">
          <p>' . $cikk["content_text"] . '</p>
          <a class="close" href="#">Bezárás</a>
      </div>
  </div>';
    }
  }

  $out .= '</div>
</div>';

  return $out;
}

function tudomany($connection)
{
  $out = '<div class="container">
  <div class="content">';

  $sql = mysqli_query($connection,  "select * from content");

  while ($cikk = mysqli_fetch_assoc($sql)) {

    if (isset($cikk["category"]) && $cikk["category"] == "Tudomány") {

      $out .= '<div class="articles" id="cikk_' . $cikk["id"] . '">
      <h4 class="category">' . $cikk["category"] . '</h4>
      <a href="#cikk_' . $cikk["id"] . '"><h2 class="title">' . $cikk["title"] . '</h2></a>
      <h4 class="author">Szerző: ' . $cikk["author"] . '</h4>
      <div class="preview_div"><h3 class="preview">' . $cikk["preview"] . '</h3></div>
      <div class="content_container">
          <p>' . $cikk["content_text"] . '</p>
          <a class="close" href="#">Bezárás</a>
      </div>
  </div>';
    }
  }

  $out .= '</div>
</div>';

  return $out;
}

function getContent($url, $connection)
{

  $url = parseUrl($url);

  $out = '<div class="container border rounded shadow mt-5">';

  switch ($url) {
    case '/kezdolap':
      $out = homepage($connection);
      break;

    case '/kulfold':
      $out .= kulfold($connection);
      break;

    case '/gazdasag':
      $out .= gazdasag($connection);
      break;

    case '/tudomany':
      $out .= tudomany($connection);
      break;
  }
  $out .= '</div>';

  return $out;
}

function getFooter()
{
  return '<script src="../cikkphp/scripts/user_script.js"></script>';
}
