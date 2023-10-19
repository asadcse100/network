@extends('admin.admin_layouts.app')

@section('content')

<div class="page-content-wrapper">
    <div class="page-content">
        <div class="row">
            <div class="col-lg-12 ">
                <div class="card">
                    <div class="card-header">
                        <div class="row">
                            <div class="col-lg-6">
                                <h4>All blog posts</h4>
                            </div>
                            <div class="col-lg-6 text-right">
                                <button style="float:right" data-toggle="modal" data-target="#addblog" class="btn btn-outline-info">Add New Post</button>
                            </div>
                        </div>
                    </div>

                    <div class="card-body">

                        <div class="row">
                            <div class="col-lg-12 mt-3  table-responsive">
                                <table class="table table-sm ">
                                    <thead class="thead thead-light">
                                        <tr>
                                            <th class="text-center">#</th>
                                            <th>Title</th>
                                            <th>Category</th>
                                            <th>Short Description</th>
                                            <th>Status</th>
                                            <th>Options</th>
                                        </tr>
                                    </thead>
                                    <tbody class="text-dark">
                                        @foreach ($blogs as $key => $blog)
                                        <tr>
                                            <td>{{ $key + 1 + ($blogs->currentPage() - 1) * $blogs->perPage() }}</td>
                                            <td>{{ $blog->title }}</td>
                                            <td>
                                                @if ($blog->category != null)
                                                {{ $blog->category->category_name }}
                                                @else
                                                --
                                                @endif
                                            </td>
                                            <td>@if(!empty($blog->short_description)){!! Str::words($blog->short_description, 7) !!}@endif</td>
                                            <td>
                                                <label class="aiz-switch aiz-switch-success mb-0">
                                                    <input type="checkbox" onchange="change_status(this)" value="{{ $blog->id }}"
                                                    <?php if ($blog->status == 1) {
                                                        echo 'checked';
                                                    } ?>>
                                                    <span></span>
                                                </label>
                                            </td>

                                            <td>
                                                <a href="#" onclick="editId('{{$blog->id}}')" class="text-success">Edit </a>
                                                |
                                                <a href="{{ route('blog.destroy', $blog->id) }}" class="text-danger">Delete</a>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                {{$blogs->appends(Request::all())->links()}}
                            </div>
                        </div>
                    </div>

                    {{-- Edit & create from here --}}
                    <div class="modal fade bd-example-modal-xl" id="addblog" aria-hidden="true" aria-labelledby="exampleModalToggleLabel" tabindex="-1">
                        <div class="modal-dialog modal-xl">
                            <div class="modal-content">
                                <!-- Start now   -->
                                <div class="modal-header">
                                    <h5 class="modal-title">Blog Information</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="row">
                                    <div class="col-xxl-12 col-xl-12 col-lg-12 col-md-12 col-sm-12 mt-xxl-0">
                                        <div class="widget-content widget-content-area blog-create-section">
                                            <form id="add_form" class="form-horizontal needs-validation" action="{{ route('blog.store') }}" method="POST" novalidate onsubmit="return validateform()" enctype="multipart/form-data">
                                                @csrf
                                                <input type="hidden" name="id" id="id">
                                                <div class="row layout-spacing">
                                                    <div class="col-xxl-12 col-xl-12 col-lg-12 col-md-12 col-sm-12 mt-xxl-0">
                                                        <div class="widget-content widget-content-area blog-create-section">

                                                            <div class="row layout-top-spacing p-3">
                                                                <div class="col-sm-6">
                                                                    <div class="input-group mb-2 required">
                                                                        <span class="input-group-text" id="inputGroup-sizing-sm" for="validationCustom01">Blog
                                                                            Title</span>
                                                                        <input type="text" onkeyup="makeSlug(this.value)" id="title" name="title" class="form-control" required>
                                                                    </div>
                                                                </div>
                                                                <div class="col-sm-6">
                                                                    <div class="input-group mb-2 required">
                                                                        <span class="input-group-text" id="inputGroup-sizing-sm" for="validationCustom02">Category</span>
                                                                        <select class="form-select form-control" name="category_id" id="category_id" data-live-search="true" title="Select category" required>
                                                                            @foreach ($blog_categories as $category)
                                                                            <option value="{{ $category->id }}">
                                                                                {{ $category->category_name }}
                                                                            </option>
                                                                            @endforeach
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                                <div class="col-sm-6">
                                                                    <div class="input-group mb-2 required">
                                                                        <span class="input-group-text" id="inputGroup-sizing-sm" for="validationCustom02">Slug</span>
                                                                        <input type="text" placeholder="Slug" name="slug" id="slug" class="form-control" required>
                                                                    </div>
                                                                </div>

                                                                <div class="col-sm-6">
                                                                    <div class="input-group mb-2 required">
                                                                        <span class="input-group-text" id="inputGroup-sizing-sm">Banner</span>
                                                                        <input class="form-control file-upload-input" type="file" name="banner" id="banner">
                                                                    </div>
                                                                </div>
                                                                <div class="col-sm-12">
                                                                    <div class="mb-2 required">
                                                                        <span>Short Description</span>
                                                                        <textarea name="short_description" id="short_description" rows="2" class="form-control" required=""></textarea>
                                                                    </div>
                                                                </div>
                                                                <div class="col-sm-12">
                                                                    <div class="mb-2 required">
                                                                        <span>Description</span>
                                                                        <textarea name="description" id="description" rows="2" class="form-control" required=""></textarea>
                                                                    </div>
                                                                </div>
                                                                <div class="col-sm-6">
                                                                    <div class="input-group mb-2 required">
                                                                        <span class="input-group-text" id="inputGroup-sizing-sm">Meta
                                                                            Title</span>
                                                                        <input type="text" class="form-control" name="meta_title">
                                                                    </div>
                                                                </div>
                                                                <div class="col-sm-12">
                                                                    <div class="mb-2 required">
                                                                        <span>Meta Description</span>
                                                                        <textarea class="form-control" name="meta_description" id="meta_description" rows="40" cols="50"></textarea>
                                                                    </div>
                                                                </div>
                                                                <div class="col-sm-6">
                                                                    <div class="input-group mb-2 required">
                                                                        <span class="input-group-text" id="inputGroup-sizing-sm">Meta
                                                                            Keywords</span>
                                                                        <input type="text" class="form-control" id="meta_keywords" name="meta_keywords">
                                                                    </div>
                                                                </div>
                                                                <div class="col-sm-6">
                                                                    <div class="input-group mb-2 required">
                                                                        <span class="input-group-text" id="inputGroup-sizing-sm">Meta
                                                                            Image</span>
                                                                        <input class="form-control file-upload-input" type="file" name="meta_img" id="meta_img">
                                                                    </div>
                                                                </div>
                                                                <div class="col-sm-6">
                                                                    <div class="input-group mb-2 required">
                                                                        <span class="input-group-text" id="inputGroup-sizing-sm" for="validationCustom02">Published</span>
                                                                        <select class="form-select form-control" name="published" id="published">
                                                                            <option value="1">Yes </option>
                                                                            <option value="0">No </option>
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <hr>
                                                            <div class="col-md-12 p-2" style="text-align:right;">
                                                                <a href="{{ route('blog.index') }}" class="btn btn-outline-danger mb-2">
                                                                    <span>Discard</span>
                                                                </a>
                                                                <button type="submit" class="btn btn-outline-success mb-2">Save</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    {{-- End Edit & Create this now --}}

                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('js')
<script type="text/javascript">
	$(function() {
		$('#description').summernote({
			height: 150
		});
        $('#short_description').summernote({
			height: 150
		});
        $('#meta_description').summernote({
			height: 150
		});
    })
            function editId(vid) {
            console.log(vid);

            $("#id").val(vid);
            $.ajax({
                    method: "GET",
                    url: "{{ route('getResourcesAjax') }}",
                    data: {
                        id: vid
                    }
                })
                .done(function(msg) {
                    $('#title').val(msg.title);
                    $('#category_id').val(msg.category_id);
                    $('#slug').val(msg.slug);
                    CKEDITOR.instances['short_description'].setData(msg.short_description);
                    CKEDITOR.instances['description'].setData(msg.long_description);
                    $('#banner').val(msg.image);
                    $('#meta_title').val(msg.meta_title);
                    CKEDITOR.instances['meta_description'].setData(msg.meta_description);
                    $('#meta_keywords').val(msg.meta_keywords);
                    $('#meta_img').val(msg.meta_img);
                    $('#status').val(msg.status);
                    console.log(msg);
                });

            $('#addblog').modal('show');
        }


    function change_status(el) {
        if (el.checked) {
            var status = 1;
        } else {
            var status = 0;
        }
        $.post('{{ route("blog.change-status") }}', {
                _token: '{{ csrf_token() }}',
                id: el.value,
                status: status
            },
            function(data) {
                if (data == 1) {
                    AIZ.plugins.notify('success', 'Change blog status successfully');
                } else {
                    AIZ.plugins.notify('danger', 'Something went wrong');
                }
            });
    }

    window.addEventListener('load', function() {
        // Fetch all the forms we want to apply custom Bootstrap validation styles to
        var forms = document.getElementsByClassName('needs-validation');
        // Loop over them and prevent submission
        var validation = Array.prototype.filter.call(forms, function(form) {
            form.addEventListener('submit', function(event) {
                if (form.checkValidity() === false) {
                    event.preventDefault();
                    event.stopPropagation();
                }
                form.classList.add('was-validated');
            }, false);
        });
    }, false);
</script>
@endsection