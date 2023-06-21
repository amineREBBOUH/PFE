@extends('admin.layout')
@section('content')
<div class="container">

	<div class="card">
				<form class="card-form" action="{{route('product.showPost')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="category"value="{{$product->category_id}}">
                   <input type="hidden" name="id" value="{{$product->id}}">
            <div class="avatar-upload">
                <div class="avatar-edit">
                    <input type='file' id="imageUpload" name="pict" />
                    <label for="imageUpload"></label>
                </div>
                <div class="avatar-preview">
                    <div id="imagePreview" style="background-image: url(data:image/png;base64,{{$product->pict}});">
                    </div>
            </div>
		</div>
			<div class="input">
				<input type="text" class="input-field" value="{{old('name',$product->name)}}" name="name"/>
				<label class="input-label">name of product</label>
                
			</div>
            @error('name')
                <p class="error">{{$message}}</p>
                @enderror
            
            <div class="input">
				<input type="number" class="input-field" value="{{old('old_price', $product->old_price)}}"name="old_price"/>
				<label class="input-label">Old price</label>
               
			</div>
            @error('old_price')
            <p class="error">{{$message}}</p>
            @enderror
            <div class="input">
				<input type="number" class="input-field" value="{{old('new_price',$product->new_price)}}"name="new_price"/>
				<label class="input-label">new Price</label>
               
			</div>
            @error('new_price')
            <p class="error">{{$message}}</p>
            @enderror
			
			<div class="action">
				<button class="action-button" type="submit"> SAVE </button>
            </div>
		</form>
		
	</div>
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js" integrity="sha512-3gJwYpMe3QewGELv8k/BX9vcqhryRdzRMxVfq6ngyWXwo03GFEzjsUm8Q7RZcHPHksttq7/GFoxjCVUjkjvPdw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script>
    function readURL(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = function(e) {
            $('#imagePreview').css('background-image', 'url('+e.target.result +')');
            $('#imagePreview').hide();
            $('#imagePreview').fadeIn(650);
        }
        reader.readAsDataURL(input.files[0]);
    }
}
$("#imageUpload").change(function() {
    readURL(this);
});
</script>
@endsection