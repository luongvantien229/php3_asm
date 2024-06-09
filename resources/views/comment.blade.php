
<h2 class="bg-success mt-3 p-2 fs-5 text-white"> Bình luận sản phẩm</h2>

<form class="border border-success p-3 m-2" method="post" action="/comment_save">

<p>

<textarea class="form-control shadow-none fs-5"

name="content" rows="4" placeholder="Mời nhập bình luận"></textarea>

</p>

<p class="text-end"> @csrf

<input type="hidden" name="id_product" value="{{$product->id}}">

<button class="btn btn-success "> Gửi bình luận</button>

<p>

</form>


<div id="list_binh_luan">

@foreach($comment_arr as $comment)

<div class="border border-success m-2 p-2">

<p class="d-flex justify-content-between">


<!-- <b>{{$comment->User}}</b> -->
<!-- ->name -->
<span>{{ gmdate('d/m/Y H:m:s', strtotime($comment->date)+3600*7)}}</span>

</p>

<p>{{$comment->content}}</p>

</div>

@endforeach

</div>