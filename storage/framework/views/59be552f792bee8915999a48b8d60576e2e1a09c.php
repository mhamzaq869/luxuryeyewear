<?php $__env->startSection('title', 'Category'); ?>
<?php $__env->startSection('main-content'); ?>

    <!-- DataTales Example -->

    <div class="card shadow mb-4">

        <div class="row">

            <div class="col-md-12">

                <?php echo $__env->make('backend.layouts.notification', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

            </div>

        </div>

        <form method="POST" id="category-form" action="<?php echo e(route('categories.delete')); ?>">
            <?php echo csrf_field(); ?>
            <div class="card-header py-3">

                <div class="row">
                    <div class="col-md-2">
                        <h6 class="m-0 font-weight-bold text-primary float-left"><?php echo $__env->yieldContent('title'); ?> </h6><br>
                        <p class="m-0 font-weight-bold text-primary float-left">EyeGlass:&nbsp;</p>
                        <?php echo e($data['total_eyeglass']); ?><br>
                        <p class="m-0 font-weight-bold text-primary float-left">SunGlass:&nbsp;</p>
                        <?php echo e($data['total_sunglass']); ?>


                    </div>
                    <div class="col-md-10">

                        <a href="<?php echo e(route('category.create')); ?>" class="btn btn-primary btn-sm float-right"
                            data-toggle="tooltip" data-placement="bottom" title="Add Category">
                            <i class="fas fa-plus"></i> Add <?php echo $__env->yieldContent('title'); ?>
                        </a>

                        <a href="<?php echo e(route('category.import.get')); ?>" class="btn btn-primary mr-1 btn-sm float-right"
                            data-toggle="tooltip" data-placement="bottom" title="Import Category"><i
                                class="fas fa-file-import"></i> Import Category</a>

                        <a href="<?php echo e(route('category.export.get')); ?>" class="btn btn-info mx-1 btn-sm float-right"
                        data-toggle="tooltip" data-placement="bottom" title="Import Category"><i
                            class="fas fa-file-import"></i> Export Category</a>

                        <a href="<?php echo e(route('category.export.get',['sample'])); ?>" class="btn btn-secondary  btn-sm float-right"
                        data-toggle="tooltip" data-placement="bottom" title="Import Category"><i
                            class="fas fa-file-import"></i> Sample Category</a>

                        <div class="col-md-6"></div>
                        <div class="col-md-6 custom-section" style="display:none">

                            <div class="d-flex w-75 float-right">
                                <select name="status" class="form-control select-status">
                                    <option selected disabled>--change selected item status--</option>
                                    <option value="0">Inactive</option>
                                    <option value="1">Active</option>
                                </select>
                                <a href="javascript:void(0)" class="btn mx-3 btn-danger d-flex btn-sm multi-delete">
                                    <i class="mr-1 mt-1 fas fa-trash-alt"></i> Delete</a>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

            <style>
                .sorting_asc {
                    width: 10px !important;
                }

                .sortings {
                    width: 15px !important;
                }
            </style>

            <div class="card-body">


                <div class="table-responsive">

                    <?php if(count($data['categories']) > 0): ?>
                        <?php
                            $i = 1000;
                            $cats = \App\Models\Category::with(['brand', 'frame_type'])->get();
                        ?>




                        <table id="banner-dataTable" class="table table-striped table-bordered" style="width:100%">


                            <thead>

                                <tr>

                                    <th>Sl</th>

                                    <th class="sortings">

                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input" id="mainCheck"
                                                name="check">
                                            <label class="custom-control-label" for="mainCheck"></label>
                                        </div>
                                    </th>
                                    <th>Brand</th>
                                    <th>Model Number</th>

                                    <th class="frame_wth">Frame Type</th>

                                    <th class="sortings">Status</th>

                                    <th>Action</th>

                                </tr>

                            </thead>
                            <tbody>



                            </tbody>

                        </table>
                    <?php else: ?>
                        <h6 class="text-center">No Categories found!!! Please create Category</h6>
                    <?php endif; ?>

                </div>

            </div>
        </form>
    </div>

<?php $__env->stopSection(); ?>

<?php
    $total_cat = $data['total_sunglass'] + $data['total_eyeglass'];
    if($cats != null && count($cats) != 0){
        $cats = $cats;
    }else{
        $cats = [];
    }
?>

<?php $__env->startPush('styles'); ?>
    <link href="<?php echo e(asset('backend/vendor/datatables/dataTables.bootstrap4.min.css')); ?>" rel="stylesheet">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.css" />

    <style>
        /*div.dataTables_wrapper div.dataTables_paginate{*/

        /*    display: none;*/

        /*}*/
    </style>
<?php $__env->stopPush(); ?>



<?php $__env->startPush('scripts'); ?>
    <!-- Page level plugins -->

    <script src="<?php echo e(asset('backend/vendor/datatables/jquery.dataTables.min.js')); ?>"></script>
    <script src="<?php echo e(asset('backend/vendor/datatables/dataTables.bootstrap4.min.js')); ?>"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>
    <script src="https://cdn.datatables.net/scroller/2.0.7/js/dataTables.scroller.min.js"></script>



    <!-- Page level custom scripts -->

    <script src="<?php echo e(asset('backend/js/demo/datatables-demo.js')); ?>"></script>

    <script>
        var categories = <?php echo json_encode($cats, 15, 512) ?>

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        // jQuery('#banner-dataTable').DataTable({


        //   "lengthMenu": [ [25, 50, 100, -1], [25, 50, 100, "All"] ],
        //   buttons: [
        //         'copyHtml5',
        //         'excelHtml5',
        //         'csvHtml5',
        //         'pdfHtml5'
        //     ],
        // });


        $(document).ready(function(){
            $('#banner-dataTable').DataTable({
                'processing': true,
                'serverSide': true,
                'serverMethod': 'post',
                "columnDefs": [
                    { "orderable": false, "targets": [1] },
                ],
                lengthMenu: [
                    [25, 50, 100, 150, 250, -1],
                    [25, 50, 100, 150, 250, 'All'],
                ],
                'ajax': {
                    'url':'<?php echo e(route("categories.ajax")); ?>'
                },
                'columns': [
                    { data: 'id' },
                    { data: 'checkbox' },
                    { data: 'brand' },
                    { data: 'model_number' },
                    { data: 'frame_type' },
                    { data: 'status' },
                    { data: 'action' },
                ]
            });
        });

        // $(document).ready(function() {
        //     var data = [];
        //     for (var i = 0; i < categories.length; i++) {
        //         var chekbx = `<div class="custom-control custom-checkbox">
        //                     <input type="checkbox" class="custom-control-input cust-checkbox" id="check` + categories[
        //             i].id + `" value="` + categories[i].id + `" name="checked[]">
        //                     <label class="custom-control-label" for="check` + categories[i].id + `"></label>
        //                 </div>`

        //         var brand = (categories[i].brand != null) ? categories[i].brand.title : ''
        //         var model = categories[i].title
        //         var frame_type = (categories[i].frame_type != null) ? categories[i].frame_type.name : ''
        //         var status = (categories[i].status == 'active') ? '<span class="badge badge-success">' + categories[
        //                 i].status + '</span>' : '<span class="badge badge-warning">' + categories[i].status +
        //             '</span>'
        //         var action = `<a href="<?php echo e(url('/admin/category')); ?>/` + categories[i].id + `/edit" class="btn btn-primary btn-sm float-left mr-1" style="height:30px; width:30px;border-radius:50%" data-toggle="tooltip" title="edit" data-placement="bottom"><i class="fas fa-edit"></i></a>
        //                   <button class="btn btn-danger btn-sm dltBtn" data-id=` + categories[i].id +
        //             ` style="height:30px; width:30px;border-radius:50%" data-toggle="tooltip" data-placement="bottom" title="Delete"><i class="fas fa-trash-alt"></i></button>`
        //         data.push([i, chekbx, brand, model, frame_type, status, action]);
        //     }

        //     $('#banner-dataTable').DataTable({
        //         data: data,
        //         deferRender: true,
        //         scrollY: 430,
        //         scrollCollapse: true,
        //         scroller: true,
        //     });
        // });

        jQuery('#mainCheck').click(function() {
            // make all check box checked/unchecked.
            var all = jQuery('.cust-checkbox');
            if (jQuery(this).is(':checked')) {
                all.each(function(i) {
                    this.checked = true;
                });
            } else {
                all.each(function(i) {
                    this.checked = false;
                });
            }
            if (jQuery('.cust-checkbox:checked').length > 0) {
                jQuery('.custom-section').show()
            } else {
                jQuery('.custom-section').hide()
            }
        });
        jQuery('.cust-checkbox').click(function() {
            if (jQuery('.cust-checkbox').length == jQuery('.cust-checkbox:checked').length) {
                jQuery("#mainCheck").prop('checked', true);
            } else {
                jQuery("#mainCheck").prop('checked', false);
            }
            if (jQuery('.cust-checkbox:checked').length > 0) {
                jQuery('.custom-section').show()
            } else {
                jQuery('.custom-section').hide()
            }
        });

    </script>

    <script>
        $(document).ready(function() {


            $('.dltBtn').click(function(e) {

                var dataID = $(this).data('id');
                var el = '<input type="hidden" name="single_check" value="' + dataID + '">';
                var form = $('#category-form');
                form.append(el)
                e.preventDefault();
                swal({
                        title: "Are you sure?",
                        text: "Once deleted, you will not be able to recover this data!",
                        icon: "warning",
                        buttons: true,
                        dangerMode: true,
                    })

                    .then((willDelete) => {
                        if (willDelete) {
                            form.submit();
                        } else {
                            swal("Your data is safe!");
                        }
                    });
            })
            $('.multi-delete').click(function(e) {
                var form = $('#category-form');
                // alert(dataID);
                e.preventDefault();
                swal({
                        title: "Are you sure You want to delete multiple record?",
                        text: "Once deleted, you will not be able to recover this data!",
                        icon: "warning",
                        buttons: true,
                        dangerMode: true,
                    })

                    .then((willDelete) => {
                        if (willDelete) {
                            debugger
                            form.submit();
                        } else {
                            swal("Your data is safe!");
                        }
                    });
            })
            $('.select-status').change(function(e) {
                var form = $('#category-form');
                // alert(dataID);
                e.preventDefault();
                swal({
                        title: "Are you sure You want to delete multiple record?",
                        text: "Once deleted, you will not be able to recover this data!",
                        icon: "warning",
                        buttons: true,
                        dangerMode: true,
                    })

                    .then((willDelete) => {
                        if (willDelete) {
                            debugger
                            form.submit();
                        } else {
                            swal("Your data is safe!");
                        }
                    });
            })

        })
    </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('backend.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\eyewear\resources\views/backend/category/index.blade.php ENDPATH**/ ?>