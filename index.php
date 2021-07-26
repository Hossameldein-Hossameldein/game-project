
    <?php
    include 'shared/header.php';
    $one = isset($_GET['page']) ? filter_var($_GET['page'], FILTER_SANITIZE_STRING) : 'homepage';
    $pages = array(
        "download" => "page",
        "homepage" => "page",
        "register" => "page",
        "login" => "page",
        "store" => "page",
        "checkout" => "page",
        "account" => "page",
        "ranks" => "page",
		"paynow" => "page",
		"invoice" => "page",
        "logout" => "page",

    );
    $path = !empty($pages[$one]) ? $pages[$one] . '/' : '';
    if (array_key_exists($one, $pages) && file_exists($path . $one . '.php')) {
        require_once($path . $one . '.php');
    } else {
        include 'page/homepage.php';
    }
    include 'shared/footer.php';
    ?>
 