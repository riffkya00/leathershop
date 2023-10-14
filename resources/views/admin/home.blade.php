<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    @include('admin.css')
  </head>
  <body>
    <div class="container-scroller">
      <!-- Side Bar -->
      @include('admin.sidebar')

      <!-- Header -->
      @include('admin.header')

      <!-- Body -->
        @include('admin.body')

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


        {{-- Tombol Sukses Add Catagory --}}
{{-- <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script text="text/javascript">
$(function(){
$(document).on('click','#Add Catagory', function(e){
e.preventDefault();
var link =$(this).attr("Add Catagory")
      
(css nya)
        Swal.fire({
          position: 'top-end',
          icon: 'success',
          title: 'Catagory Added Successfully',
          showConfirmButton: false,
          timer: 1500
        })
                })
            });
        </script> --}}