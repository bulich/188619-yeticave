<?php
require_once("functions.php");
require_once("init.php");

$cur_page = 1;
$page_items = 3;
$items_count =  get_items_count($con);
$pages_count = ceil($items_count / $page_items);

if(isset($_GET['page'])) {
    if(is_numeric($_GET['page']) && $_GET['page'] <= $pages_count ) {
        $cur_page = $_GET['page'];
    }
}

$offset = ($cur_page - 1) * $page_items;
$pages = range(1, $pages_count);




if ($items = get_page_item($con, $page_items, $offset)) {

    $page_content = render_template("index", [
                                                'categories' => get_categories($con),
                                                'items' => $items,
                                                'pages' => $pages,
                                                'pages_count' => $pages_count,
                                                'cur_page' => $cur_page
                                            ]);
}
else {
    $page_content = render_template("error", ['error_message' => mysqli_error($con)]);
}

$layout_content = render_template("layout", ['content' => $page_content, 'title' => "Yeticave",'categories' => get_categories($con)]);

print($layout_content);
