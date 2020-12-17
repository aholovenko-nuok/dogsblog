@extends('admin.layout')

@section('content')

    <div id="content-wrapper">

      <div class="container-fluid">

        <!-- DataTables Example -->
        <div class="card mb-3">
          <div class="card-header">
            <i class="fas fa-table"></i>
            Отримані дані </div>
          <div class="card-body">

<form class="form-horizontal" action="/admin/get-data/create/save" method="post">
    {{ csrf_field() }}

    <form class="well form-inline">
        <table class="table table-bordered">
            <tr>
                <th>Заголовок</th>
                <th>Контент</th>
                <th>Зображення</th>
                <th>Локація</th>
                <th>Категорія</th>
            </tr>




<?php

// Ищем в объекте dom элемент с классом .product-essential, обращаясь к методу find(). Он вмещает в себя все данные о продукте.

foreach($doc as $key => $value){

    $single_page = $value->find("a.newsListItemTextTitle.poiItemTitle")->attr('href');
    $dom1 = hQuery::fromFile($single_page);
?><tr>
    <td><input type="text" name="title[]" style="width: 100%;" value="<?=$value->find("a.newsListItemTextTitle.poiItemTitle")->text();?>">
    </td>
    <td>
        <textarea name="content[]" id="" cols="30" style="width: 100%;">
            <?=preg_replace('/\s?<ins[^>]*?>.*?<\/ins>\s?/si', '', preg_replace('/\s?<script[^>]*?>.*?<\/script>\s?/si', '', preg_replace('/<div.*?>(<div.*?>(?1)*?<\/div>|.)*?<\/div>/is', '', $dom1->find("div.tour-description-text")->html())));?>
        </textarea>
        </td>
        <td>
            @if($dom1->find(".poi-image-holder img"))
            <img src="<?=$dom1->find(".poi-image-holder img")->attr('src');?>" alt="" width="100">
            @else
            <img src="https://lh3.googleusercontent.com/proxy/gtC4F7okwLCMnNSImZc8pvNw11s9bewIzvTt6_mEAdekpFTrxMt_47ZPIEWI181TMrnkHhy5ehgUrOs60tBigd4NuswObUq3XKRIbab7Xw6I_CE" alt="" width="100">
            @endif
            <input type="hidden" name="img[]" value="<?php if($dom1->find(".poi-image-holder img")) { echo $dom1->find(".poi-image-holder img")->attr('src'); } else { echo 'https://lh3.googleusercontent.com/proxy/gtC4F7okwLCMnNSImZc8pvNw11s9bewIzvTt6_mEAdekpFTrxMt_47ZPIEWI181TMrnkHhy5ehgUrOs60tBigd4NuswObUq3XKRIbab7Xw6I_CE';} ?>">
            <?php
                $images = $dom1->find(".thslide_list ul li img");
                $links  = array();
                if($images) {
                    foreach ($images as $key => $a) {
                        $links[$key] = $a->attr('src');
                    }
                }

            ?>
            <input type="hidden" name="images[]" value="{{implode(",", $links)}}">
        </td>
        <td>
            <input type="text" name="location[]" value="<?=$value->find("div.newsListItemIcons.newsListItemTextAddress")->text();?>">
        </td>
        <td><select name="category[]" id="">
            @foreach($categories as $category)
                <option value="{{$category->id}}">{{$category->title}}</option>
            @endforeach

        </select></td>

    </tr>
    <?php
}
?>
</tbody>
</table>
<div class="text-right">
        <button class="btn btn-success">Відправити дані</button>
</div>

</form>
          </div>
        </div>

      </div>

      <!-- /.container-fluid -->

@endsection
