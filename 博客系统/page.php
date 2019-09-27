<?php
/**
 * 分页函数
 *
 * @param $rows 信息总数
 * @param $page 当前页
 * @param $page_size 每页显示数
 */
$page = $_GET["page"];
function Page($rows,$page_size){
    global $page,$select_from,$select_limit,$pagenav;
    $page_count = ceil($rows/$page_size);
    if($page <= 1 || $page == '') $page = 1;
    if($page >= $page_count) $page = $page_count;
    $select_limit = $page_size;
    $select_from = ($page - 1) * $page_size.',';
    $pre_page = ($page == 1)? 1 : $page - 1;
    $next_page= ($page == $page_count)? $page_count : $page + 1 ;
    $pagenav .= "<li>第 $page/$page_count 页 </li><li>共 $rows 条</li> ";
    $pagenav .= "<li><a href='?page=1'>首页</a></li> ";
    $pagenav .= "<li><a href='?page=$pre_page'>前一页</a></li> ";
    $pagenav .= "<li><a href='?page=$next_page'>后一页</a></li> ";
    $pagenav .= "<li><a href='?page=$page_count'>末页</a></li>";

}
?>