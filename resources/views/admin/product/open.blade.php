@extends('admin.master')
@section('title')
    Product Open | {{env('APP_NAME')}}
@endsection

@section('body')
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <div class="page-title-right">
                    <form class="d-flex">
                        <div class="input-group">
                            <input type="text" class="form-control form-control-light" id="dash-daterange">
                            <span class="input-group-text bg-primary border-primary text-white">
                                                    <i class="mdi mdi-calendar-range font-13"></i>
                                                </span>
                        </div>
                        <a href="javascript: void(0);" class="btn btn-primary ms-2">
                            <i class="mdi mdi-autorenew"></i>
                        </a>
                        <a href="javascript: void(0);" class="btn btn-primary ms-1">
                            <i class="mdi mdi-filter-variant"></i>
                        </a>
                    </form>
                </div>
                <h4 class="page-title">Product Open</h4>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="tab-content">
                        <div class="tab-pane show active" id="alt-pagination-preview">
                            <table id="alternative-page-datatable" class="table table-striped dt-responsive nowrap w-100">
                               <tr>
                                   <td>Product Title</td>
                                   <td>1</td>
                               </tr>
                                <tr>
                                   <td>Category Name</td>
                                   <td>1</td>
                               </tr> <tr>
                                   <td>SubCategory Name</td>
                                   <td>1</td>
                               </tr>
                                <tr>
                                   <td>Brand Name</td>
                                   <td></td>
                               </tr> <tr>
                                   <td>Unit Name</td>
                                   <td></td>
                               </tr>
                                <tr>
                                   <td>Product Size</td>
                                   <td>1</td>
                               </tr> <tr>
                                   <td>Product Color</td>
                                   <td>1</td>
                               </tr>
                                <tr>
                                   <td>Condition</td>
                                   <td>1</td>
                               </tr> <tr>
                                   <td>Regular Price</td>
                                   <td>1</td>
                               </tr> <tr>
                                   <td>Selling Price</td>
                                   <td>1</td>
                               </tr> <tr>
                                   <td>Product Code</td>
                                   <td>1</td>
                               </tr> <tr>
                                   <td>Stock Amount</td>
                                   <td>1</td>
                               </tr> <tr>
                                   <td>Short Description</td>
                                   <td>1</td>
                               </tr> <tr>
                                   <td>Details</td>
                                   <td>1</td>
                               </tr> <tr>
                                   <td>More Detail</td>
                                   <td>1</td>
                               </tr> <tr>
                                   <td>Image</td>
                                   <td>1</td>
                               </tr>
                                <tr>
                                   <td>More Image</td>
                                   <td>1</td>
                               </tr>
                                <tr>
                                   <td>Status</td>
                                   <td>1</td>
                               </tr>
                                
                            </table>
                        </div> <!-- end preview-->
                    </div> <!-- end tab-content-->

                </div> <!-- end card body-->
            </div> <!-- end card -->
        </div><!-- end col-->
    </div> <!-- end row-->
@endsection






