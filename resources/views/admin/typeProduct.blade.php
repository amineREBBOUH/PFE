@extends('admin.layout')
@section('content')
<h1>type: {{$category}}</h1>
<div class="productsS">
    @foreach ($products as $product)
    <div class="parent">
        @if ($category=="films")
        <div class="key">
            <div class="hide" onclick="hide(this)"> <i class="fa fa-times"></i></div>  
              <form >
                    <input type="hidden" name="id"value="{{$product->id}}" class="id">
                    {{-- <label for="email">email</label><br>
                    <input type="email" name="email" id="" class="email"><br>
                    <p class="testF error"></p>
                    <label for="password">password</label><br>
                    <input type="text" name="password" id=""class="password">
                    <p class="passwordF error"></p><br>

                    <button onclick="account(this)" type="button">add account</button> --}}
                    <input type="hidden" name="id"value="{{$product->id}}" class="id"> <br>
                    <input type="email" name="email" placeholder="email" id="d" class="email"><br>
                    <p class="emailF error"></p><br>
                    <input type="text" name="password" placeholder="password" id="d" class="password"><br>
                    <p class="passwordF error"></p><br>
                    <p  class="error"></p>

                    <button type="button" onclick="test(this)" >add key</button> 
                </form>
            </div>
        @else
        <div class="key">
            <div class="hide" onclick="hide(this)"> <i class="fa fa-times"></i></div>
            <form   id="myForm">
                
                <input type="hidden" name="id"value="{{$product->id}}" class="id">
                <input type="text" name="key_id" placeholder="key" id="d" class="key_id">
                <button type="button" onclick="hh(this)" >add key</button> 
                <p  class="error"></p>
                 
            </form> 
        </div>  
        @endif

        
     
    <figure class="f">
        <div class="actions">
            <ul>
                <li>
                <form action="{{route('destroy.product')}}" method="post">
                    @method('delete')
                    @csrf
                    <input type="hidden" name="id" value="{{$product->id}}">
                <button onclick="return confirme()" ><i class="fa-solid fa-trash"></i></button>
                 </form>
                </li>
                <a href="{{route('product.showP',$product->id)}}"><li><i class="fa-solid fa-pen-to-square"></i></li></a>
                <li onclick="ga(this)"><i class="fa-solid fa-key" ></i></li>
            </ul>
        </div>
        <img src="data:image/jpeg;base64,{{ $product->pict }}" alt="">
        <figcaption>{{$product->name}}</figcaption>
    </figure>
</div> 
    @endforeach

   
</div>
<script>
    function hide(e) {
        e.parentElement.style.display="none"
    }
    
    function confirme() {
        // Add your logic here
        // For example, you can display a confirmation dialog using JavaScript's built-in confirm() function
        var result = confirm('Are you sure you want to proceed?');
        return result;
    }
    
    async   function hh(e) {
       // e.preventDefault(); // Prevent the form from submitting normally
       const parent=e.parentElement;
        const key=await parent.querySelector(".key_id");
        const id=await parent.querySelector(".id");
        //   const id=id
                var formData = await{
                    _token: "{{ csrf_token() }}",
                    key_id: key.value,
                    id:id.value,
                };
              //  console.log(id);
                $.ajax({
                    url: "{{ route('add_key.product') }}",
                    method: "POST",
                    data: formData,
                    dataType: "json",
                    success: function(response) {
                        // Handle the success response here
                        console.log(response.message);

                        
                            Swal.fire({
                        position: 'top-end',
                        icon: 'success',
                        title: 'Your work has been saved',
                        showConfirmButton: false,
                        timer: 1500
                        });
                        setTimeout(() => {
                            location.reload();

                        }, 600);

                        
                    },
                    error: function(xhr, status, error) {
                        if (xhr.status === 422) {
                            var errors = xhr.responseJSON.errors;
                            // Display the validation errors to the user
                            const error=displayValidationErrors(errors);
                            
                            parent.querySelector(".error").innerHTML=error

                        } else {
                            // Handle other error scenarios
                            //console.log("Error:", error);
                        }
                    }
                });
    }

     
    

    async function test(e) {
        const parent=e.parentElement;
        const email=await parent.querySelector(".email");
        const password=await parent.querySelector(".password");
        const id=await parent.querySelector(".id");

                var formData = await{
                    _token: "{{ csrf_token() }}",
                    email: email.value,
                    password: password.value,
                    id:id.value,
                };
                $.ajax({
                    url: "{{ route('add_account0.product') }}",
                    method: "POST",
                    data: formData,
                    dataType: "json",
                    success: function(response) {
                        // Handle the success response here
                        console.log(response);

                        
                            Swal.fire({
                        position: 'top-end',
                        icon: 'success',
                        title: 'Your work has been saved',
                        showConfirmButton: false,
                        timer: 1500
                        });
                        setTimeout(() => {
                            location.reload();

                        }, 600);

                        
                    },
                    error: function(xhr, status, error) {
                        if (xhr.status === 422) {
                            var errors = xhr.responseJSON.errors;
                            // Display the validation errors to the user
                            // const error=displayValidationErrors(errors);
                            
                            // parent.querySelector(".error").innerHTML=error
                            displayMultyErrors(errors,e);


                        } else {
                            // Handle other error scenarios
                            //console.log("Error:", error);
                        }
                    }
                });
    }
    function displayMultyErrors(errors,e) {
        //console.log(e);
        var errorMessages = "";
        for (var field in errors) {
            if (errors.hasOwnProperty(field)) {
                var fieldErrors = errors[field];
               // console.log(field); // Retrieve the field name
                 const element=e.parentElement.querySelector(`.${field}F`)
                //  console.log(element);
                // console.log(fieldErrors);
                element.innerHTML=fieldErrors

                for (var i = 0; i < fieldErrors.length; i++) {
                    errorMessages += fieldErrors[i] + "<br>";

                }
            }
        }
        // Display the error messages to the user (e.g., in a div element)
        //console.log(errorMessages); 
}
    function displayValidationErrors(errors) {
        var errorMessages = "";
        for (var field in errors) {
            if (errors.hasOwnProperty(field)) {
                var fieldErrors = errors[field];
                for (var i = 0; i < fieldErrors.length; i++) {
                    errorMessages += fieldErrors[i] + "<br>";
                }
            }
        }
        // Display the error messages to the user (e.g., in a div element)
        //console.log(errorMessages); 
        return errorMessages;
}
function ga(e) {
        // var parentElement = e.parentElement;
        // while (parentElement.parentElement.className != "productsS") {

        //     parentElement = parentElement.parentElement;
        // }
        var parentElement=e.parentElement.parentElement.parentElement.parentElement
        console.log(parentElement);
       const el=parentElement.querySelector('.key');
         el.style.display="flex";
    }
</script>
@endsection