<?php
function PrintHead() {
    $head = file_get_contents("templates/head.html");
    print $head;
}

function PrintNavBar() {
    $nav = file_get_contents("templates/navbar.html");
    print $nav;
}

function PrintBanner() {
    $banner = file_get_contents("templates/index_banner.html");
    print $banner;
}

function PrintNavBarAdmin() {
    $adminNav = file_get_contents("templates/navbar_admin.html");
    print $adminNav;
}

function PrintAdd() {
    $add = file_get_contents("templates/add_product.html");
    print $add;
}

function MergeViewWithData( $template, $data )
{
    $returnvalue = "";

    foreach ( $data as $row )
    {
        $output = $template;

        foreach( array_keys($row) as $field )  //eerst "img_id", dan "img_title", ...
        {
            $output = str_replace( "@$field@", $row["$field"], $output );
        }

        $returnvalue .= $output;
    }

    if ( $data == [] )
    {
        $returnvalue = $template;
    }

    return $returnvalue;
}

function MergeViewWithExtraElements( $template, $elements )
{
    foreach ( $elements as $key => $element )
    {
       $template = str_replace( "@$key@", $element, $template );
   }
   return $template;
}

function MergeViewWithErrors( $template, $errors )
{
    foreach ( $errors as $key => $error )
    {
        $template = str_replace( "@$key@", "<p style='color:red'>$error</p>", $template );
    }
    return $template;
}

function RemoveEmptyErrorTags( $template, $data )
{
    foreach ( $data as $row )
    {
        foreach( array_keys($row) as $field )  //eerst "img_id", dan "img_title", ...
        {
            $template = str_replace( "@$field" . "_error@", "", $template );
        }
    }

    return $template;
}