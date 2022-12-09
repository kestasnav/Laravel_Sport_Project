<div class="div_center">
    <h2 class="mb-5">Update Product</h2>

    <form action="{{url('/update_product_confirm',$product->id)}}" method="Post" enctype="multipart/form-data">
        @csrf
        <div class="div_design">
            <label>Product title: </label>
            <input class="p-1" type="text" name="title" placeholder="Write a title" required value="{{$product->title}}">
        </div>
        <div class="div_design">
            <label>Product description: </label>
            <input class="p-1" type="text" name="description" placeholder="Write a description" required value="{{$product->description}}">
        </div>
        <div class="div_design">
            <label>Product price: </label>
            <input class="p-1" type="number" name="price" placeholder="Write a price" required value="{{$product->price}}">
        </div>

        <div class="div_design">
            <label>Discount price: </label>
            <input class="p-1" type="number" name="discount_price" placeholder="Write a discount" value="{{$product->discount_price}}">
        </div>

        <div class="div_design">
            <label>Product quantity: </label>
            <input class="p-1" type="number" name="quantity" min="0" placeholder="Write a quantity" required value="{{$product->quantity}}">
        </div>
        <div class="div_design">
            <label>Product category: </label>
            <select name="category" required>
                <option value="{{$product->category}}" selected="">{{$product->category}}</option>
                @foreach($categories as $category)
                    <option value="{{$category->category_name}}">{{$category->category_name}}</option>
                @endforeach
            </select>
        </div>
        <div class="div_design">
            <label>Current Product image: </label>
            <img class="img_size" src="product/{{$product->image}}">
        </div>
        <div class="div_design">
            <label>Change Product image: </label>
            <input class="p-1" type="file" name="image">
        </div>
        <div class="div_design">
            <input class="btn btn-primary" type="submit" name="submit" value="Update Product">
        </div>
    </form>
</div>
