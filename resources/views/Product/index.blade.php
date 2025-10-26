  <!DOCTYPE html>
  <html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
  </head>
<!-- this is the view part of the mvc -->
  <body>

    <h1>Product</h1>
    <a href="{{route('product.create')}}">Create Product</a>
    <div>
        @if(session()->has('success'))
            <div>
                {{session('success')}}
            </div>
        @endif
    </div>
    <div>
        <table border="1">
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Quantity</th>
                <th>Price</th>
                <th>Description</th>
                <th>Edit</th>
                <th>Delete</th>
                @foreach($products as $product)
                    <tr>
                        <td>{{$product->id}}</td>
                        <td>{{$product->name}}</td>
                        <td>{{$product->quantity}}</td>
                        <td>{{$product->price}}</td>
                        <td>{{$product->description}}</td>
                        <td> <!-- the product inside the [] is to know which product ur editing -->
                             <!-- the product which is being arrowed, is the current product in the foreach loop -->
                            <a href="{{route('product.edit', ['product' => $product])}}">Edit</a>
                        </td>
                        <td>
                            <!-- when i say product thingy, it means. what is being affected, it is this(being product this instance) -->
                            <form action="{{route('product.delete', ['product' => $product])}}" method="post">
                                @csrf
                                @method('delete')
                                <input type="submit" value="Delete">
                            </form>
                            
                        </td>
                    </tr>
                @endforeach
            </tr>
        </table>
    </div>


  </body>
  </html>