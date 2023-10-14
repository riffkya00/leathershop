<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    @include('admin.css')

    {{-- Tombol Catagory --}}
    <style type="text/css">
        .div_category
        {
            text-align: center;
            padding-top: 10px;
        }

        .input_color
        {
            color: black;
        }

        .center
        {
            margin: auto;
            width: 50%;
            text-align: center;
            margin-top: 30px;
            border: 3px solid white;
        }
        
    </style>

    {{-- Tulisan Add Catagory --}}
    <style type="text/css">
        .font
        {
            text-align: left;
            font-size: 35px;
            padding-bottom: 20px;
        }
    </style>

  </head>
  <body>
    <div class="container-scroller">
      <!-- Side Bar -->
      @include('admin.sidebar')

      <!-- Header -->
      @include('admin.header')

      <!-- Body -->
    <div class="main-panel">
        <div class="content-wrapper">
            {{-- Notif Add Catagory Sukses --}}
            @if (session()->has('message'))
            <div class="alert alert-success">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
                {{ session()->get('message') }}
            </div>

            @endif
            {{-- Notif Sukses Delete Notif --}}
            @if (session()->has('delete'))
            <div class="alert alert-success">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
                {{ session()->get('delete') }}
            </div>

            @endif

            <div class="div_category">

                <h2 class="font">Add Catagory</h2>

                <form action="{{ url('add_catagory') }}" method="POST">
                    @csrf
                    <input class="input_color" type="text" name="catagory" placeholder="Catagory Name">
                    <input type="submit" class="btn btn-primary" name="submit" value="Add Catagory">
                </form>
            </div>

            <table class="center">
                <tr>
                    <td>Catagory Name</td>
                    <td>Action</td>
                </tr>

                @foreach ($data as $data)
                <tr>
                    <td>{{ $data->catagory_name }}</td>
                    <td>
                        <a onclick="return confirm('Are You Sure Want to Delete This?')" class="btn btn-danger" href="{{ url('delete_catagory',$data->id) }}">Delete</a>
                    </td>
                </tr>
                @endforeach

            </table>

        </div>
    </div>

        <!-- main-panel ends -->
      </div>
      <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
        @include('admin.script')
    <!-- End custom js for this page -->
  </body>
</html>