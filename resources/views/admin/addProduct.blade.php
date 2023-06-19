@extends('admin.layout')
@section('content')
<h1>adding</h1>

    <!-- multistep form -->
    <form id="msform" method="POST" action="{{route('dashboard.storeProduct')}}"enctype="multipart/form-data">
      @csrf
        <!-- progressbar -->
        <ul id="progressbar">
          <li class="active">Info Of Product</li>
          <!-- <li>Social Profiles</li> -->
          <li>Picture Of Product</li>
        </ul>
        <!-- fieldsets -->
        <fieldset>
          <h2 class="fs-title">Create your account</h2>
          <h3 class="fs-subtitle">This is step 1</h3>
          <label for="name">name of product</label><br>
          <input type="text" name="name" placeholder="name" value="{{old('name')}}"/>
          @error('name')
                    <p class="error">{{$message}}</p>
          @enderror
          <label for="category">category</label><br>
          <select name="category" id="">
            <option  disabled>chose category</option>
            @foreach ($categories as $category)
            <option value="{{$category->id}}">{{$category->name}}</option>

            @endforeach
            
          </select><br>
          @error('category')
          <p class="error">{{$message}}</p>
           @enderror
          <label for="old">old price</label><input type="number" name="old_price" id=""value="{{old('old_price')}}"><br>
          @error('old_price')
          <p class="error">{{$message}}</p>
           @enderror
          <label for="new">new price</label><input type="number" name="new_price" id=""value="{{old('new_price')}}"><br>
          @error('new_price')
          <p class="error">{{$message}}</p>
           @enderror

          <input
            type="button"
            name="next"
            class="next action-button"
            value="Next"
          />
        </fieldset>
  
        <fieldset>
          <div class="drag-area">
              <div class="icon"><i class="fas fa-cloud-upload-alt"></i></div>
              <header>Drag & Drop to Upload File</header>
              <span>OR</span>
              <button>Browse File</button>
              <input type="file" id="file" name="file">
              @error('file')
          <p class="error">{{$message}}</p>
           @enderror
            </div>
            <input type="button" name="previous" class="previous action-button" value="Previous" />
            <button type="submit" class="submit action-button" target="_top">submit</button>
        </fieldset>
      </form>

@endsection